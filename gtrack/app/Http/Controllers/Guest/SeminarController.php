<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Image;

class SeminarController extends Controller
{
    //
    public function index()
    {
        $totalton=Event::wherestatus(1)->orderBy('start_date','ASC')->limit(3)->get();
        $event=Event::wherestatus(1)->orderBy('event_id', 'DESC')->simplePaginate(8);
        // $event = \DB::select('SELECT * FROM events ORDER BY DATE(created_at) DESC');
        return view('guest.seminars',[
            'arr'=>$totalton,
            'arr2'=>$event
        ]);
    }
}
