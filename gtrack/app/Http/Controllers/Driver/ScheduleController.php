<?php

namespace App\Http\Controllers\Driver;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Schedule;
use App\Models\TruckAssignment;

class ScheduleController extends Controller
{
    //
    public function index()
    {
        $assignments = TruckAssignment::where('active', 1)->orderBy('schedule_id','asc')->get();
        $schedules = Schedule::orderBy('schedule','desc')->get();
        return view('driver.schedule.schedule',compact('assignments','schedules'));
    }
}
