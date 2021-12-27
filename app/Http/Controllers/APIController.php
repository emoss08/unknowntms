<?php

    namespace App\Http\Controllers;

    use App\Models\Tractors;
    use App\Models\Trailers;
    use Carbon\Carbon;
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
        // CUSTOM ROW CLASSES
                ->editColumn('owned_by', function($tractors) {
                    return '<span class="badge badge-pill badge-light">' . $tractors->owned_by . '</span>';
                })
                ->editColumn('last_inspection', function($tractors) {
                    return '<span class="badge badge-pill badge-light">' . $tractors->last_inspection . '</span>';
                })
                ->rawColumns(['Actions', 'status', 'owned_by', 'last_inspection'])
                ->make(true);
        }
        //        ->setRowClass(function ($tractors) {
        //            return $tractors->status === 'Active' ? '' : 'alert-danger';
        //        })

        // Tractor list for DataTables
        public function getTrailers(Request $request)
        {
            $trailers = Trailers::select('id', 'status', 'trailer_id', 'year', 'make', 'model','owned_by', 'last_inspection');

            return Datatables::of($trailers)
                ->addColumn('Actions', function ($trailers)  {
                    return '<a class="btn btn-light btn-active-light-info btn-sm" href="trailers/' . $trailers->id . '/edit" target="_blank" >Edit</a>';
                })
                // CUSTOM ROW CLASSES
                ->editColumn('owned_by', function($trailers) {
                    return '<span class="badge badge-pill badge-light">' . $trailers->owned_by . '</span>';
                })
                ->editColumn('last_inspection', function($trailers) {
                    return '<span class="badge badge-pill badge-light">' . $trailers->last_inspection . '</span>';
                })
                ->rawColumns(['Actions', 'status', 'owned_by', 'last_inspection'])
                ->make(true);
        }
    }
