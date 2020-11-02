<?php

namespace App\Http\Controllers\Driver;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TrackerController extends Controller
{
    //
    public function index()
    {
        return view('driver.tracker.tracker');
    }
}
