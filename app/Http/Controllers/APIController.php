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
            $tractors = Tractors::select('id', 'status', 'tractor_id', 'year', 'make', 'model', 'owned_by', 'last_inspection');

            return Datatables::of($tractors)
                ->addColumn('Actions', function($tractors) {
                    return '<a class="btn btn-light btn-active-light-info btn-sm" href="tractors/' . $tractors->id . '/edit" target="_blank" >Edit</a>';
                })
                // CUSTOM ROW CLASSES
                ->editColumn('last_inspection', function($tractors) {
                    if($tractors->last_inspection < Carbon::now()->toDateString()) {
                        return '<span class="badge badge-pill badge-light-danger">' . 'Inspection Past Due' . '</span>';
                    } else {
                        return '<span class="badge badge-pill badge-light-success">' . $tractors->last_inspection . '</span>';
                    }
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
            $trailers = Trailers::select('id', 'status', 'trailer_id', 'year', 'make', 'model', 'owned_by', 'last_inspection');

            return Datatables::of($trailers)
                ->addColumn('Actions', function($trailers) {
                    return '<a class="btn btn-light btn-active-light-info btn-sm" href="trailers/' . $trailers->id . '/edit" target="_blank" >Edit</a>';
                })
                // CUSTOM ROW CLASSES
                ->editColumn('last_inspection', function($trailers) {
                    if($trailers->last_inspection < Carbon::now()->toDateString()) {
                        return '<span class="badge badge-pill badge-light-danger">' . 'Inspection Past Due' . '</span>';
                    } else {
                        return '<span class="badge badge-pill badge-light-success">' . $trailers->last_inspection . '</span>';
                    }
                })
                ->rawColumns(['Actions', 'status', 'owned_by', 'last_inspection'])
                ->make(true);
        }
    }
