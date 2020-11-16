<?php

namespace App\Http\Controllers\Admin;

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
        return view('admin.schedules.calendar', compact('trucks','schedules','events'));
    }
}
