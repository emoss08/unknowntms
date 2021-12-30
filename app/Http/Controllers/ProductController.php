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
    use Illuminate\Support\Facades\Redis;
    use Yajra\DataTables\DataTables;

    class ProductController extends Controller
    {
        /**
         * Show the form for creating a new resource.
         *
         * @return Application|Factory|View
         */
        public function index()
        {
            return view('products');
        }

        public function create()
        {
            return view('products.create');
        }

        public function store(Request $request)
        {
            $request->validate([
                'name' => 'required|unique:order_types',
                'description' => 'required',
            ]);
            $orderType = new OrderTypes();
            $orderType->name = $request->name;
            $orderType->description = $request->description;
            $orderType->save();
            return redirect()->route('order-types.index')->with('success', 'Order Type created successfully');
        }

        public function edit($id)
        {
            $orderType = OrderTypes::find($id);
            return view('products.edit', compact('orderType'));
        }

        public function update(UpdateOrderTypeRequest $request, $id)
        {
            $orderType = OrderTypes::find($id);
            $orderType->name = $request->name;
            $orderType->description = $request->description;
            $orderType->save();
            return redirect()->route('order-types.index')->with('success', 'Order Type updated successfully');
        }

        public function destroy($id)
        {
            $orderType = OrderTypes::find($id);
            $orderType->delete();
            return redirect()->route('order-types.index')->with('success', 'Order Type deleted successfully');
        }

        public function getOrderTypes()
        {
            $orderTypes = OrderTypes::all();
            return DataTables::of($orderTypes)
                ->addColumn('action', function ($orderType) {
                    return '<a href="'.route('order-types.edit', $orderType->id).'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                            <a href="'.route('order-types.destroy', $orderType->id).'" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        public function show($id)
        {
            $orderType = OrderTypes::find($id);
            return view('products.show', compact('orderType'));
        }
    }
