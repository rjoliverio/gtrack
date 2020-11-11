<?php

namespace App\Http\Controllers\Driver;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Schedule;

class CalendarController extends Controller
{
    //
    public function index()
    {
        $event = Event::all();
        $schedule = Schedule::all();
        return view('driver.schedule.calendar', compact('event','schedule'));
    }
}
