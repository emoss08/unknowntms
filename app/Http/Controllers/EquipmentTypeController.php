<?php

namespace App\Http\Controllers;

use App\Exports\EquipmentTypeExport;
use App\Http\Requests\EquipmentTypeRequest;
use App\Models\EquipmentType;
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
        $equipmenttype = EquipmentType::all();
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

        if ($request->user()->cannot('equipment-type-create', $input)) {
            abort(403);
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
        $equipmenttype->update($request->all());

        if ($request->user()->cannot('equipment-type-edit', $equipmenttype)) {
            abort (403);
        }

        return redirect()->route('equipmenttypes.index')->with($notification);
    }

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
     * @return \Illuminate\Support\Collection
     */
    public function fileExport()
    {
        return Excel::download(new EquipmentTypeExport(), 'equipment-type-collection.xlsx');
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
