<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TrackerController extends Controller
{
    //
    public function tracker()
    {
        return view('guest.tracker');
    }
}
