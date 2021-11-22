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
}
