<?php

    namespace App\Http\Controllers;

    use App\Models\Tractors;
    use Illuminate\Http\Request;
    use Yajra\DataTables\DataTables;

    class APIController extends Controller
    {
        public function getTractors()
        {
            $tractors = Tractors::select('id', 'status', 'tractor_id', 'year', 'make', 'model','owned_by', 'last_inspection');

            return Datatables::of($tractors)
                ->addColumn('Actions', function($tractors) {
                    return '<a class="btn btn-light btn-active-light-info btn-sm" href="tractors/' . $tractors->id . '/edit" target="_blank" >Edit</a>';
                })
                ->rawColumns(['Actions'])
                ->make(true);
        }
    }
