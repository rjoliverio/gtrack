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
       
        $totalton=Event::wherestatus(1)->where('start_date','>',now())->orderBy('start_date','ASC')->limit(3)->get();
        // for(;$ctr<3;$ctr++){
        //     $arrup[$ctr]=$totalton[$ctr];
        // }
        $event=Event::wherestatus(1)->orderBy('start_date', 'DESC')->simplePaginate(8);
        // $event = \DB::select('SELECT * FROM events ORDER BY DATE(created_at) DESC');
    
        return view('guest.seminars',[
            'arr'=>$totalton,
            'arr2'=>$event
        ]);
    }
}
