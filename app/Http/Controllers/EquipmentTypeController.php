<?php

namespace App\Http\Controllers;

use App\Exports\EquipmentTypeExport;
use App\Http\Requests\EquipmentTypeRequest;
use App\Models\EquipmentType;
use Illuminate\Support\Facades\Gate;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Yajra\Datatables\Datatables;

class EquipmentTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:equipment-type-list|equipment-type-create|equipment-type-edit|equipment-type-delete', ['only' => ['index','show']]);
        $this->middleware('permission:equipment-type-create', ['only' => ['create','store']]);
        $this->middleware('permission:equipment-type-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:equipment-type-delete', ['only' => ['destroy']]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $equipmenttype = EquipmentType::with('user')->get(['id', 'equip_type_id', 'status', 'description']);

        return view('equipmenttype.index', compact('equipmenttype'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('equipmenttype.create');
    }

    public function store(EquipmentTypeRequest $request)
    {
        $request->validate([
            'equip_type_id' => 'required|unique:equipment_type,equip_type_id',
        ]);

        $input = $request->all();
        $input['entered_by'] = auth()->user()->id;

        if (! Gate::allows('equipment-type-create', $input)) {
            return abort(401);
        }
        EquipmentType::create($input);

        return redirect()->route('equipmenttypes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\EquipmentType  $equipmenttype
     * @return \Illuminate\Http\Response
     */
    public function show(EquipmentType $equipmenttype)
    {
        return view('equipmenttypes.show',compact('equipmenttype'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\EquipmentType  $equipmenttype
     * @return Response
     */
    public function edit(EquipmentType $equipmenttype)
    {
        return view('equipmenttypes.edit',compact('equipmenttype'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  \App\EquipmentType  $equipmenttype
     * @return RedirectResponse
     */

    public function update(EquipmentTypeRequest $request, EquipmentType $equipmenttype)
    {
        $notification = array(
            'message' => 'Record Successfully Updated!',
            'alert-type' => 'success',
            'closeButton' => true,

        );

        if ($request->user()->cannot('equipment-type-edit', $equipmenttype)) {
            abort (403);
        }
        $equipmenttype->update($request->all());

        return redirect()->route('equipmenttypes.index')->with($notification);
    }

    //
    public function getEquipTypes(Request $request)
    {
        $equip_types = EquipmentType::latest()->get();

        return Datatables::of($equip_types)
            ->addColumn('Actions', function ($equip_types)  {
            return '<button class="btn btn-light btn-active-light-info btn-sm" data-bs-toggle="modal" data-bs-target="#edit-equipment-type-'.$equip_types->id.'" class="menu-link px-3">Edit</button>';
        })
            ->rawColumns(['Actions'])
            ->make(true);
    }

    /**
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public function fileExport()
    {
        // Notification varaiable
        $notification = toast('Successfully ran command!', 'success')->hideCloseButton();
        return Excel::download(new EquipmentTypeExport(), 'equipment-type-collection.xlsx');
    }

    /* AJAX request */
    public function showEquipTypes(Request $request)
    {
        $search = $request->search;
        if($search == ''){
            $equiptypes = EquipmentType::orderby('equip_type_id','asc')->select('id','equip_type_id')->limit(5)->get();
        }else{
            $equiptypes = EquipmentType::orderby('equip_type_id','asc')->select('id','equip_type_id')->where('equip_type_id', 'like', '%' .$search . '%')->limit(5)->get();
        }
        $response = array();
        foreach($equiptypes as $equiptype){
            $response[] = array(
                "id"=>$equiptype->id,
                "text"=>$equiptype->equip_type_id
            );
        }
        return response()->json($response);
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
        Excel::import(new EquipmentTypeExport(), $request->file('file')->store('temp'));
        return back()->with('success', 'Uploaded successfully');
    }

}
