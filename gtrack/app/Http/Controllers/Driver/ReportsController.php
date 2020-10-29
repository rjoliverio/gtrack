<?php

namespace App\Http\Controllers\Driver;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Illuminate\Http\UploadedFile;
use App\Models\Image;
use App\Models\Report;
use Auth;
use Illuminate\Support\Arr;
use Kreait\Firebase;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use Kreait\Firebase\Database;
class ReportsController extends Controller
{
    //
    public function index()
    {
        return view('driver.reports.reports');
    }
    public function send(Request $request)
    {
        $user=Auth::user();
        $this->validate ($request, [
            'subject'=>'required',
            'message'=>'required',
            'degree'=>'required',
            'images'=>'required|min:1|max:4',
            'images.*'=>'mimes:jpeg,png,jpg'
            
            ],
            [
            //  'image.max'=>'File size too large',
             'images.*.mimes' => 'Only upload jpeg, jpg, png images',
             'images.*.min' => 'Upload at least 1 image',
             'images.*.max' => 'Upload at most 4 images',
            ]
       );
       $images = Collection::wrap($request->file('images'));
      $original=[];
      $ctr=0;
    //   return dd($images);
      foreach($images as $image){
    //   $images->each(function($image){
          $basename = Str::random();
          $original=Arr::add($original,$ctr,$basename . '.' . $image->getClientOriginalExtension());
          $image->move(public_path('/storage/images/uploads'),$basename . '.' . $image->getClientOriginalExtension());
          $ctr++;
      };
        for(;$ctr!=4;$ctr++){
            $original[$ctr]=null;
        }
       $image = Image::create([
        'image_1' => $original[0],
        'image_2' => $original[1],
        'image_3' => $original[2],
        'image_4' => $original[3],
        ]);

        $report=Report::create([
            'driver_id'=>$user->user_id,
            'image_id'=>$image->image_id,
            'subject'=> $request->subject,
            'message'=> $request->message,
            'latitude'=> $request->latitude,
            'longitude'=> $request->longitude,
            'degree'=> $request->degree,
            'status'=>0
        ]);
        $firebase = (new Factory)
        ->withServiceAccount(app_path().'\Http\Controllers'.'\mapsample-51a36-firebase-adminsdk-5c38e-cf6600b7d0.json');
        // $data = [
        //     'email' => $request->email,
        //     'subject' => $request->subject
        // ];
        $database = $firebase->createDatabase();
        $ref = $database->getReference("reports");
        $key=$ref->push()->getKey();
        $datetime=\Carbon\Carbon::now()->toDateTimeString();
        $ref->getChild($key)->set([
            'name' => $user->userdetail->fname." ".$user->userdetail->lname,
            'data' => json_encode($report),
            'created_at' => \Carbon\Carbon::parse($datetime)->format('g:i A')." ".\Carbon\Carbon::parse($datetime)->format('d F Y'),
            'seen'=> 0
        ]);

        toast('Reported Successfully','success');
        return redirect('/driver/reports');
    }
}
