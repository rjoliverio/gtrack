<?php

namespace App\Http\Controllers\Driver;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    //
    public function index()
    {
        return view('driver.schedule.schedule');
    }
}
