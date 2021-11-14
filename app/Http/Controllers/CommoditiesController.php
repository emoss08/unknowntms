<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Commodities;

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
        return view('commodities.index',compact('commodities'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('commodities.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'status' => 'required',
            'commodity_id' => 'required|profanity|max:5|min:2|unique:commodities,commodity_id',
            'description' => 'required|profanity|max:50'
        ]);

        $input = $request->all();
        $input['entered_by'] = auth()->user()->id;

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
    public function update(Request $request, Commodities $commodity)
    {

        $request->validate([
            'status' => 'required',
            'commodity_id' => 'required|profanity|max:5|min:2',
            'description' => 'required|profanity|max:50'
        ]);

        $commodity->update($request->all());

        return redirect()->route('commodities.index');
    }
}
