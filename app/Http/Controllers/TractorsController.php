<?php

namespace App\Http\Controllers;

use App\Exports\TractorsExport;
use App\Http\Requests\TractorsRequest;
use App\Imports\TractorsImport;
use App\Models\User;
use App\Notifications\TractorAdded;
use Illuminate\Support\Facades\Gate;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Tractors;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Notification;
use PDF;
use Yajra\DataTables\DataTables;

class TractorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    function __construct()
    {
        $this->middleware('permission:tractor-list|tractor-create|tractor-edit|tractor-delete', ['only' => ['index','show']]);
        $this->middleware('permission:tractor-create', ['only' => ['create','store']]);
        $this->middleware('permission:tractor-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:tractor-delete', ['only' => ['destroy']]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
    $tractor = Tractors::latest()->paginate(11);
    return view('tractors.index',compact('tractor'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('tractors.create');
    }

    public function store(TractorsRequest $request)
    {
        $request ->validate([
            'tractor_id' => 'required|unique:tractors,tractor_id',
        ]);

        $input = $request->all();
        $input['entered_by'] = auth()->user()->id;

        if (! Gate::allows('tractor-create', $input)) {
            return abort(401);
        }
        Tractors::create($input);

        return redirect()->route('tractors.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tractors  $tractor
     * @return \Illuminate\Http\Response
     */
    public function show(Tractors $tractor)
    {
        return view('tractors.show',compact('tractor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tractors $tractor
     * @return Response
     */
    public function edit(Tractors $tractor)
    {
        return view('tractors.edit',compact('tractor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  \App\Tractor  $tractor
     * @return RedirectResponse
     */

    public function update(TractorsRequest $request, Tractors $tractor)
    {
        if ($request->user()->cannot('tractor-edit', $tractor)) {
            abort (403);
        }
        $tractor->update($request->all());

        return redirect()->route('tractors.index');
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function fileImportExport()
    {
        return view('file-import');
    }

    /**
     * File Import for Tractor
     * @return \Illuminate\Support\Collection
     */
    public function fileImport(Request $request)
    {
        Excel::import(new TractorsImport(), $request->file('file')->store('temp'));
        return back()->with('success', 'Uploaded successfully');
    }

    /**
     *
     * File Export for Tractor
     * @return \Illuminate\Support\Collection
     */
    public function fileExport()
    {
        return Excel::download(new TractorsExport(), 'tractors-collection.xlsx');
    }

    /* AJAX request */
    public function showTractorList(Request $request)
    {
        $search = $request->search;
        if($search == ''){
            $tractors = Tractors::orderby('tractor_id','asc')->select('id','tractor_id')->limit(5)->get();
        }else{
            $tractors = Tractors::orderby('tractor_id','asc')->select('id','tractor_id')->where('tractor_id', 'like', '%' .$search . '%')->limit(5)->get();
        }
        $response = array();
        foreach($tractors as $tractor){
            $response[] = array(
                "id"=>$tractor->id,
                "text"=>$tractor->tractor_id
            );
        }
        return response()->json($response);
    }

    // Tractor list for DataTables
    public function getTractors(Request $request)
    {
        $tractors = Tractors::latest()->get();

        return Datatables::of($tractors)
            ->addColumn('Actions', function ($tractors)  {
                return '<button class="btn btn-light btn-active-light-info btn-sm" data-bs-toggle="modal" data-bs-target="#edit-tractors-'.$tractors->id.'" class="menu-link px-3">Edit</button>';
            })
            ->rawColumns(['Actions'])
            ->make(true);
    }

    // PDF export for Tractor List
    public function createPDF() {
        // retreive all records from db
        $data = [
            'tractors' => Tractors::all()
        ];

        // share data to view
        view()->share('tractors',$data);
        $pdf = PDF::loadView('tractorsPDF', $data)->setPaper('a4', 'landscape');

        // download PDF file with download method

        return $pdf->download('tractors.pdf');
    }

}
