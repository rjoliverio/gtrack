<?php

namespace App\Http\Controllers\Driver;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Schedule;
use App\Models\TruckAssignment;

class CalendarController extends Controller
{
    //
    public function index()
    {
        $trucks = TruckAssignment::where('active', 1)->get();
        $schedules=Schedule::all();
        $events=Event::where('status', 1)->get();
        return view('driver.schedule.calendar', compact('trucks','schedules','events'));
    }
}
