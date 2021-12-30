<?php

namespace App\Http\Controllers;

use App\Charts\TrailersDashboard;
use App\Http\Requests\StoreTrailerRequest;
use App\Http\Requests\UpdateTrailerRequest;
use App\Models\EquipmentType;
use App\Models\Trailers;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;
use Yajra\DataTables\DataTables;

class TrailersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('permission:trailer-list|trailer-create|trailer-edit|trailer-delete', ['only' => ['index','show']]);
        $this->middleware('permission:trailer-create', ['only' => ['create','store']]);
        $this->middleware('permission:trailer-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:trailer-delete', ['only' => ['destroy']]);
    }

    public function index(): Factory|View|Application
    {
        $equipTypes = \App\Models\EquipmentType::all();

        return view('trailers.index' , compact('equipTypes'));
    }

    public function store(StoreTrailerRequest $request)
    {
        $input['entered_by'] = auth()->user()->id;
        $input = $request->all();

        if (! Gate::allows('trailer-create', $input)) {
            return abort(401);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Trailers $trailer
     * @return Application|Factory|View
     */
    public function edit(Trailers $trailer): View|Factory|Application
    {
        $equipTypes = EquipmentType::all();
        $trailer = Trailers::findOrFail($trailer->id);
        return view('trailers.edit',compact('trailer', 'equipTypes'));
    }

    public function update(UpdateTrailerRequest $request, Trailers $trailer): \Illuminate\Http\RedirectResponse
    {
        if ($request->user()->cannot('trailer-edit', $trailer)) {
            abort (403);
        }
        $trailer->update($request->all());

        return redirect()->route('trailers.index');
    }

    public function create(): View
    {
        $equipTypes = EquipmentType::all();
        return view('trailers.create', compact('equipTypes'));
    }

public function show(Trailers $trailer): View
    {
        $equipTypes = EquipmentType::all();
        return view('trailers.show', compact('trailer', 'equipTypes'));
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
        foreach($trailers as $trailer)
        {
            $response[] = array(
                "id"=>$trailer->id,
                "text"=>$trailer->trailer_id
            );
        }
        return response()->json($response);
    }

    public function destroy(Trailers $trailer): \Illuminate\Http\RedirectResponse
    {
        if ($trailer->user_id !== auth()->user()->id) {
            return abort(403);
        }
        $trailer->delete();

        return redirect()->route('trailers.index');
    }

    public function forAnalytics(): Factory|View|Application
    {
        return view('trailers.dashboard');
    }
}
