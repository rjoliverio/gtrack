<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Schedule;
use App\Models\TruckAssignment;
use App\Models\Event;

class CalendarController extends Controller
{
    //
    public function index()
    {
        $trucks = TruckAssignment::where('active', 1)->get();
        $schedules=Schedule::all();
        $events=Event::where('status', 1)->get();
        return view('guest.calendar',compact('trucks','schedules','events'));
    }
}