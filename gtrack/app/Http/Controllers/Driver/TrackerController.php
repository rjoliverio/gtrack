<?php

namespace App\Http\Controllers\Driver;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TruckAssignment;
use App\Models\Truck;
use Auth;
class TrackerController extends Controller
{
    //
    public function index()
    {
        $truck=Truck::where('user_id',Auth::user()->user_id)->first();
        $assignment=TruckAssignment::where('truck_id',$truck->truck_id)->first();
        $uid=$assignment->firebase_uid;
        return view('driver.tracker.tracker',compact('uid'));
    }
}
