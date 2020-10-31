<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Event;
// use Spatie\GoogleCalendar\Event;

class CalendarController extends Controller
{
    //
    public function index()
    {
        $row = Event::all();
        return view('guest.calendar', compact('row'));
    }
}
