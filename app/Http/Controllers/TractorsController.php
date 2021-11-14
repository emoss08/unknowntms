<?php

namespace App\Http\Controllers;

use App\Exports\TractorsExport;
use App\Imports\TractorsImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Tractors;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use PDF;

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
    return view('tractors.index',compact('tractor'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
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

    public function store(Request $request)
    {
        $request ->validate([
            'status' => 'required',
            'tractor_id' => 'required|unique:tractors,tractor_id',
            'year' => 'required|size:4',
            'make' => 'required',
            'model' => 'required',
            'vin' => 'required|vin_code',
        ]);

        $input = $request->all();
        $input['entered_by'] = auth()->user()->id;

        if ($request->user()->cannot('tractor-create', $input)) {
            abort(403);
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

    public function update(Request $request, Tractors $tractor)
    {
        $request->validate([
            'status' => 'required',
            'tractor_id' => 'required',
            'year' => 'required',
            'make' => 'required',
            'model' => 'required',
            'odometer' => 'min:1',
            'comments' => 'required|profanity'
        ]);

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
     * @return \Illuminate\Support\Collection
     */
    public function fileImport(Request $request)
    {
        Excel::import(new TractorsImport(), $request->file('file')->store('temp'));
        return back()->with('success', 'Uploaded successfully');
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function fileExport()
    {
        return Excel::download(new TractorsExport(), 'tractors-collection.xlsx');
    }

    // Display user data in view
    public function showEmployees(){
        $tractors = Tractors::all();
        return view('index', compact('tractors'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
