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
        $totalton=Event::limit(3)->get();
        $event=Event::orderBy('event_id', 'DESC')->simplePaginate(5);
        // $event = \DB::select('SELECT * FROM events ORDER BY DATE(created_at) DESC');
        return view('guest.seminars',[
            'arr'=>$totalton,
            'arr2'=>$event
        ]);
    }
}
