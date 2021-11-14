<?php

namespace App\Http\Controllers;

use App\Models\User;
use Auth;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\OrderTypes;

class OrderTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:order_type-list|order_type-create|order_type-edit|order_type-delete', ['only' => ['index','show']]);
        $this->middleware('permission:order_type-create', ['only' => ['create','store']]);
        $this->middleware('permission:order_type-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:order_type-delete', ['only' => ['destroy']]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $ordertype = OrderTypes::all();
        return view('ordertypes.index',compact('ordertype'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ordertypes.create');
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
            'is_active' => 'required',
            'order_type_id' => 'required|profanity|max:5|min:2|unique:order_types,order_type_id',
            'description' => 'required|profanity|max:50'
        ]);

        $input = $request->all();
        $input['entered_by'] = auth()->user()->id;

        OrderTypes::create($input);

        return redirect()->route('ordertypes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\OrderTypes $ordertype
     * @return \Illuminate\Http\Response
     */
    public function show(OrderTypes $ordertype)
    {
        return view('ordertypes.show',compact('ordertype'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\OrderTypes  $ordertype
     * @return \Illuminate\Http\Response
     */
    public function edit(OrderTypes $ordertype)
    {
        return view('ordertypes.edit',compact('ordertype'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  \App\OrderTypes  $ordertype
     * @return RedirectResponse
     */
    public function update(Request $request, OrderTypes $ordertype)
    {

        $request->validate([
            'is_active' => 'required',
            'order_type_id' => 'required|profanity|max:5|min:2',
            'description' => 'required|profanity|max:50'
        ]);

        $ordertype->update($request->all());

        return redirect()->route('ordertypes.index');
    }
}
