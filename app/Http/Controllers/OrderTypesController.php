<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderTypeStoreRequest;
use App\Http\Requests\UpdateOrderTypeRequest;
use App\Models\User;
use Auth;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\OrderTypes;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Redis;
use Yajra\DataTables\DataTables;

class OrderTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function __construct()
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
    public function index(): View|Factory|Application
    {
        $ordertype = ordertypes::all();
        return view('ordertypes.index',compact('ordertype'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(): View|Factory|Application
    {
        return view('ordertypes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param OrderTypeStoreRequest $request
     * @return RedirectResponse
     */
    public function store(OrderTypeStoreRequest $request): RedirectResponse
    {

        $input = $request->all();
        $input['user_id'] = auth()->user()->id;

        OrderTypes::create($input);

        return redirect()->route('ordertypes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  OrderTypes $ordertype
     * @return Application|Factory|View
     */
    public function show(OrderTypes $ordertype): View|Factory|Application
    {
        return view('ordertypes.show',compact('ordertype'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param OrderTypes $ordertype
     * @return Application|Factory|View
     */
    public function edit(OrderTypes $ordertype): View|Factory|Application
    {
        return view('ordertypes.edit',compact('ordertype'));
    }

    public function destroy(OrderTypes $ordertype): RedirectResponse
    {
        $ordertype->delete();
        return redirect()->route('ordertypes.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateOrderTypeRequest $request
     * @param OrderTypes $ordertype
     * @return RedirectResponse
     */
    public function update(UpdateOrderTypeRequest $request, OrderTypes $ordertype): RedirectResponse
    {

        $ordertype->update($request->all());

        return redirect()->route('ordertypes.index');
    }

    //
    public function getOrderTypes(Request $request)
    {
        $order_types = OrderTypes::latest()->get();

        return Datatables::of($order_types)
            ->addColumn('Actions', function ($order_types)  {
                return '<button class="btn btn-light btn-active-light-info btn-sm" data-bs-toggle="modal" data-bs-target="#edit-order-type-'.$order_types->id.'" class="menu-link px-3">Edit</button>';
            })
            ->rawColumns(['Actions'])
            ->make(true);
    }

    /* AJAX request */
    public function showOrderTypesList(Request $request): \Illuminate\Http\JsonResponse
    {
        $search = $request->search;
        if($search === ''){
            $ordertypes = OrderTypes::orderby('order_type_id','asc')->select('id','order_type_id')->limit(5)->get();
        }else{
            $ordertypes = OrderTypes::orderby('order_type_id','asc')->select('id','order_type_id')->where('order_type_id', 'like', '%' .$search . '%')->limit(5)->get();
        }
        $response = array();
        foreach($ordertypes as $ordertype){
            $response[] = array(
                "id"=>$ordertype->id,
                "text"=>$ordertype->order_type_id
            );
        }
        return response()->json($response);
    }
}
