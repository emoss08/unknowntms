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
    }
