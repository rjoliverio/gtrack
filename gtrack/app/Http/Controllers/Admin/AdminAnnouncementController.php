<?php

namespace App\Http\Controllers\Admin;

use App\Models\Announcement;
use App\Models\Image;
use Exporter;
use DB;
use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Illuminate\Http\UploadedFile;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Arr;

class AdminAnnouncementController extends Controller
{
    //
    public function index()
    {
        $row=Announcement::all();
       
        return view('admin.announcements.announcements',[
            'row' => $row

        ]);
    }
    public function create(Request $request)
    {
        $this->validate ($request, [
            'title' => 'required',
            'content' => 'required',
            'images' => 'max:4|nullable',
            'images.*'=>'mimes:jpeg,png,jpg'
            ],
            [
             'images.required' => 'File upload empty',
             'images.*.mimes' => 'Only upload jpeg, jpg, png files',
             'images.max' => 'Upload exactly 4 images',
            ]
       );

        if(! is_dir(public_path('/storage/images/uploads'))){
            mkdir(public_path('/storage/images/uploads'), 0777);

        }
        $user=Auth::user();
        
        $announcement = new Announcement();
        $announcement->user_id=$user->user_id;
        $announcement->title = $request->input("title");
        $announcement->content = $request->input("content");
        
        if($request->images!=null){
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
      if($request->hasFile('images')){
        $image = Image::create([
         'image_1' => $original[0],
         'image_2' => $original[1],
         'image_3' => $original[2],
         'image_4' => $original[3],
         ]);
         
        }

        $announcement->image_id = $image->image_id;
        }
      
     
     
     

   

       $announcement->save();

        toast('Announcement added successfully','success');

        return redirect('/admin/announcements');
    }
    public function update(Request $request,$aid)
    {
        $this->validate ($request, [
            'title' => 'required',
            'content' => 'required',
            'images' => 'max:4|nullable',
            'images.*'=>'mimes:jpeg,png,jpg'
            ],
            [
             'images.*.mimes' => 'Only upload jpeg, jpg, png files',
             'images.min' => 'Upload exactly 4 images',
             'images.max' => 'Upload exactly 4 images',
            ]
       );
       $ann=Announcement::find($aid);

        if(! is_dir(public_path('/storage/images/uploads'))){
            mkdir(public_path('/storage/images/uploads'), 0777);

        }
        $announcement = Announcement::find($aid);
            
        $announcement->title = $request->input("title");
        $announcement->content = $request->input("content");
        if($request->images!=null){
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
            $image = Image::find($ann->image_id);
            if($image==null){
                $image = Image::create([
                    'image_1' => $original[0],
                    'image_2' => $original[1],
                    'image_3' => $original[2],
                    'image_4' => $original[3],
                    ]);
            }else{
                $image->image_1 =$original[0];
                $image->image_2 =$original[1];
                $image->image_3 =$original[2];
                $image->image_4 =$original[3];
                $image->save();
            }
            $announcement->image_id = $image->image_id;
        
        }else{
            $announcement->image_id = null;
        }
        //     $image=DB::table('images')
        // ->where('image_id', $announcement->image_id)  // find your user by their email
        // ->limit(1)  // optional - to ensure only one record is updated.
        // ->update(array('image_1' => $original[0],
        // 'image_2' => $original[1],
        // 'image_3' => $original[2],
        // 'image_4' => $original[3]));

        // $info=DB::table('announcements')
        // ->whereannouncement_id($announcement->announcement_id)
        // ->update(array('title' => $request->input("title"),
        // 'content' => $request->input("content")));

           
            
            $announcement->save();

        toast('Announcement successfully updated','success');
        return redirect('/admin/announcements');
        
    }
    public function delete($aid)
    {
        $ann=Announcement::find($aid);
        $image = Image::find($ann->image_id);
        if($image==null){
            $ann->delete();
        }else{
            $image->delete();
        }
          toast('1 Announcement Deleted','error');
          return redirect('/admin/announcements');

    }
 
   
}
