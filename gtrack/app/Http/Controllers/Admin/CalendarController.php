<?php

namespace App\Http\Controllers\Admin;

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
        return view('admin.schedules.calendar', compact('event','schedule'));
    }
}
