<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTrailerRequest;
use App\Http\Requests\UpdateTrailerRequest;
use App\Models\Trailers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;
use Yajra\DataTables\DataTables;

class TrailersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    function __construct()
    {
        $this->middleware('permission:trailer-list|trailer-create|trailer-edit|trailer-delete', ['only' => ['index','show']]);
        $this->middleware('permission:trailer-create', ['only' => ['create','store']]);
        $this->middleware('permission:trailer-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:trailer-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $equipTypes = \App\Models\EquipmentType::all();

        $trailers = Trailers::latest()->get();

        return view('trailers.index' ,compact('trailers'))->with('equipTypes', $equipTypes);
    }

    public function store(StoreTrailerRequest $request)
    {
        $input['entered_by'] = auth()->user()->id;
        $input = $request->all();

        if (! Gate::allows('trailer-create', $input)) {
            return abort(401);
        }
        Trailers::create($input);
    }

    public function update(UpdateTrailerRequest $request, Trailers $trailer)
    {
        if ($request->user()->cannot('trailer-edit', $trailer)) {
            abort (403);
        }
        $trailer->update($request->all());

        return redirect()->route('trailers.index');
    }

    // Tractor list for DataTables
    public function getTrailers(Request $request)
    {
        $trailers= Trailers::latest()->get();

        return Datatables::of($trailers)
            ->addColumn('Actions', function ($trailers)  {
                return '<button class="btn btn-light btn-active-light-info btn-sm" data-bs-toggle="modal" data-bs-target="#edit-trailers-'.$trailers->id.'" class="menu-link px-3">Edit</button>';
            })
            ->rawColumns(['Actions'])
            ->make(true);
    }

    /* AJAX request */
    public function showTrailerList(Request $request)
    {
        $search = $request->search;
        if($search == ''){
            $trailers = Trailers::orderby('trailer_id','asc')->select('id','trailer_id')->limit(5)->get();
        }else{
            $trailers = Trailers::orderby('trailer_id','asc')->select('id','trailer_id')->where('trailer_id', 'like', '%' .$search . '%')->limit(5)->get();
        }
        $response = array();
        foreach($trailers as $trailer){
            $response[] = array(
                "id"=>$trailer->id,
                "text"=>$trailer->trailer_id
            );
        }
        return response()->json($response);
    }
}
