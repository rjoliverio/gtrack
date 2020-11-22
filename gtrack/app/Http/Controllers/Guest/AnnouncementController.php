<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Announcement;
use App\Models\Image;

class AnnouncementController extends Controller
{
    //
    public function index()
    {
        $ann=Announcement::simplePaginate(5);
        return view('guest.announcements',compact('ann'));
    }
}
