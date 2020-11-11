<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Schedule;
use App\Models\TruckAssignment;

class CalendarController extends Controller
{
    //
    public function index()
    {
        $schedule = TruckAssignment::where('active', 1)->get();
        return view('guest.calendar')->with('schedule', $schedule);
    }
}