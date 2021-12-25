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

    class CompaniesController extends Controller
    {
        public function index()
        {
            $commodities = Commodities::all();
            return view('commodities.index',compact('commodities'));
        }
    }
