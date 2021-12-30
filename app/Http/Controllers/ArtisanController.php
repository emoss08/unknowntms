<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArtisanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:artisan-list|artisan-fire', ['only' => ['index','show']]);
        $this->middleware('permission:artisan-fire', ['only' => ['create','store']]);
    }


public function index() {
    return view('artisan.index');
    }

    public function create() {
        return view('artisan.create');
    }

    public function store(Request $request) {
        $this->validate($request, [
            'command' => 'required',
        ]);

        $command = $request->input('command');
        $output = shell_exec($command);

        return redirect()->route('artisan.index')->with('success', 'Command executed successfully');
    }

    public function show($id) {
        return view('artisan.show');
    }

    public function edit($id) {
        return view('artisan.edit');
    }

    public function update(Request $request, $id) {
        return redirect()->route('artisan.index')->with('success', 'Command executed successfully');
    }

    public function destroy($id) {
        return redirect()->route('artisan.index')->with('success', 'Command executed successfully');
    }


}
