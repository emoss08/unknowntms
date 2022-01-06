<?php

namespace App\Http\Controllers;

use App\Exports\TractorsExport;
use App\Http\Requests\TractorsRequest;
use App\Imports\TractorsImport;
use App\Mail\NewTractorNotification;
use App\Models\TemporaryFile;
use App\Models\Trailers;
use App\Models\User;
use App\Notifications\TractorAdded;
use App\Tractor;
use Exception;
use Illuminate\Support\Facades\Gate;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Tractors;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Mail;
use Notification;
use PDF;
use Uuid;

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
    return view('tractors.index');
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

    /**
     * @throws Exception
     */
    public function store(TractorsRequest $request)
    {
        $request ->validate([
            'tractor_id' => 'required|unique:tractors,tractor_id',
        ]);
        $input = $request->all();
        if (! Gate::allows('tractor-create', $input)) {
            return abort(401);
        }

       $tractor = Tractors::create($input + ['user_id' => auth()->id()] + ['uuid' => Uuid::generate(4)->string]);

        $temporaryFIle = TemporaryFile::where('folder', $request->attachments)->first();
        if ($temporaryFIle) {
            $tractor->addMedia(storage_path('app/tractors/tmp/' . $request->attachments . '/' . $temporaryFIle->filename))
                ->toMediaCollection('attachments');
            rmdir(storage_path('app/tractors/tmp/' . $request->attachments));
            $temporaryFIle->delete();
        }

        $tractorData = [
            'id' => $request->tractor_id,
        ];

        Notification::send(User::find(1), new TractorAdded($tractorData));
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
     * @return Application|Factory|View
     */
    public function edit(Tractors $tractor): View|Factory|Application
    {
        $tractor = Tractors::findOrFail($tractor->id);
        return view('tractors.edit',compact('tractor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param TractorsRequest $request
     * @param Tractors $tractor
     * @return RedirectResponse
     * @throws Exception
     */

    public function update(TractorsRequest $request, Tractors $tractor): RedirectResponse
    {
        if ($request->user()->cannot('tractor-edit', $tractor)) {
            abort (403);
        }
        $tractor->update($request->all());

        return redirect()->route('tractors.index');
    }

    public function destroy($id)
    {
        Tractors::find($id)->delete();
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
