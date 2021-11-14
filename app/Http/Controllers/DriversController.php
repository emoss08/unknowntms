<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DriversController extends Controller
{
    public function getDrivers()
    {
        $response = Http::accept('application/json')->get('http://example.com/users');
    }
}
