<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommodityStoreRequest;
use App\Http\Requests\CommodityUpdateRequest;
use App\Http\Requests\EquipmentTypeRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Commodities;
use Illuminate\Support\Facades\Gate;
use Yajra\DataTables\DataTables;

class CommoditiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:commodities-list|commodities-create|commodities-edit|commodities-delete', ['only' => ['index','show']]);
        $this->middleware('permission:commodities-create', ['only' => ['create','store']]);
        $this->middleware('permission:commodities-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:commodities-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $commodities = Commodities::all();

        return view('commodities.index', (compact('commodities')));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CommodityStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CommodityStoreRequest $request)
    {

        $input = $request->validated();
        $input['entered_by'] = auth()->user()->id;

        abort_unless(\Gate::allows('commodities-create'), 403);

        Commodities::create($input);

        return redirect()->route('commodities.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Commodities  $commodity
     * @return \Illuminate\Http\Response
     */
    public function edit(Commodities $commodity)
    {
        return view('commodities.edit',compact('commodity'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  \App\Commodities  $commodity
     * @return RedirectResponse
     */
    public function update(CommodityUpdateRequest $request, Commodities $commodity)
    {
        $input = $request->validated();

        $commodity->update($input);

        return redirect()->route('commodities.index');
    }

    //
    public function getCommodities(Request $request)
    {
        if (request()->ajax()) {
            $commodity = Commodities::query();
            $table = DataTables::of($commodity);

            $table->addColumn('Actions', function ($commodity) {
                return '<button class="btn btn-light btn-active-light-info btn-sm" data-bs-toggle="modal" data-bs-target="#edit-commodity-'.$commodity->id.'">Edit</button>';
            });
            $table->rawColumns(['Actions']);
            return $table->make(true);
        }

        return view('commodities.ajax.index');
    }

    /* AJAX request */
    public function showCommoditiesList(Request $request)
    {
        $search = $request->search;
        if($search == ''){
            $commodities = Commodities::orderby('commodity_id','asc')->select('id','commodity_id')->limit(5)->get();
        }else{
            $commodities = Commodities::orderby('commodity_id','asc')->select('id','commodity_id')->where('commodity_id', 'like', '%' .$search . '%')->limit(5)->get();
        }
        $response = array();
        foreach($commodities as $commodity){
            $response[] = array(
                "id"=>$commodity->id,
                "text"=>$commodity->commodity_id
            );
        }
        return response()->json($response);
    }
}
