<?php

namespace App\Http\Controllers\Admin;

use App\Models\Event;
use App\Models\UserDetail;
use App\Models\Address;
use App\Models\Image;
use App\Models\WasteCollection;
use App\Models\User;
use Exporter;
use DB;
use Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Illuminate\Http\UploadedFile;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Arr;

class EventsController extends Controller
{
    //
    public function index()
    {
        $row=Event::all();
        $users=User::whereuser_type('Admin')->get();
        return view('admin.events.events',[
            'row' => $row,
            'user'=>$users

        ]);
       
        // return view('admin.events.events', compact('row'));
    }
    public function create(Request $request)
    {
        $this->validate ($request, [
            'event' => 'required',
            'desc' => 'required',
            'DateTimeS' => 'required',
            'DateTimeE' => 'required',
            'estreet' => 'required',
            'ebrgy' => 'required',
            'etown' => 'required',
            'epost' => 'required',
            'participants' => 'required',
            'images' => 'min:1|max:4|required',
            'images.*'=>'mimes:jpeg,png,jpg'
            
            
            ],
            [
                'images.*.mimes' => 'Only upload jpeg, jpg, png files',
                'images.min' => 'Upload exactly 4 images',
                'images.max' => 'Upload exactly 4 images',
               ]
       );
       if(! is_dir(public_path('/storage/images/uploads'))){
        mkdir(public_path('/storage/images/uploads'), 0777);

    }
    $user=Auth::user();
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
       $data = array(
        'street'=>$request->estreet,
        'barangay'=>$request->ebrgy,
        'town'=>$request->etown,
        'postal_code'=>$request->epost
        
    );

    $last_id = DB::table('addresses')
     ->insertGetId($data);
    //  $data = array(
    //     'street'=>$request->cpstreet,
    //     'barangay'=>$request->cpbrgy,
    //     'town'=>$request->cptown,
    //     'postal_code'=>$request->cppost
        
    // );

    // $last_id_contact = DB::table('addresses')
    //  ->insertGetId($data);
    //  if($file = $request->hasFile('cpimage')) {
    //     $file = $request->file('cpimage') ;
    //     $fileName = $file->getClientOriginalName() ;
    //     $destinationPath = public_path().'/storage/images/uploads' ;
    //     $file->move($destinationPath,$fileName);
    //     $data = array(
    //         'fname'=>$request->cpfname,
    //         'lname'=>$request->cplname,
    //         'image'=>$fileName ,
    //         'contact_no'=>$request->cpconno,
    //         'address_id'=>$last_id_contact,
    //         'age'=>$request->cpage,
    //         'gender'=>$request->gender
            
    //     );
    // }

    

    // $last_id_user = DB::table('user_details')
    //  ->insertGetId($data);
     
        
        $event = new Event();
        $event->address_id = $last_id;
        $event->event_name = $request->event;
        $event->description = $request->desc;
        $event->image_id = $image->image_id;
        $event->participants = $request->participants;
        $event->start_date = $request->DateTimeS;
        $event->end_date = $request->DateTimeE;
        $event->contact_person_id = $request->user_name;
        $event->status=1;
        $event->save();



        toast('Event added successfully','success');

        return redirect('/admin/events');
    }
    public function update(Request $request,Event $event, Address $add,UserDetail $use,$aid,$bid,$cid,$did)
    {
        $this->validate ($request, [
            'event' => 'required',
            'desc' => 'required',
            'DateTimeS' => 'required',
            'DateTimeE' => 'required',
            'estreet' => 'required',
            'ebrgy' => 'required',
            'etown' => 'required',
            'epost' => 'required',
            'participants' => 'required',
            'images' => 'min:1|max:4|required',
            'images.*'=>'mimes:jpeg,png,jpg'
            
            
            ],
            [
                'images.*.mimes' => 'Only upload jpeg, jpg, png files',
                'images.min' => 'Upload exactly 1 - 4 images',
                'images.max' => 'Upload exactly 4 images',
               ]
       );
       $event=Event::find($aid); 
       if(! is_dir(public_path('/storage/images/uploads'))){
            mkdir(public_path('/storage/images/uploads'), 0777);

        }
        $user=Auth::user();
        if($request->hasFile('images')){
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
            $image = Image::find($event->image_id);
                $image->image_1 =$original[0];
                $image->image_2 =$original[1];
                $image->image_3 =$original[2];
                $image->image_4 =$original[3];
                $image->save();
            
        }
        
        //     $image=DB::table('images')
        // ->where('image_id', $announcement->image_id)  // find your user by their email
        // ->limit(1)  // optional - to ensure only one record is updated.
        // ->update(array('image_1' => $original[0],
        // 'image_2' => $original[1],
        // 'image_3' => $original[2],
        // 'image_4' => $original[3]));

        // $info=DB::table('events')
        // ->whereevent_id($announcement->event_id)
        // ->update(array('title' => $request->input("title"),
        // 'content' => $request->input("content")));
        $add = Address::find($bid);
            
        $add->street = $request->input("estreet");
        $add->barangay = $request->input("ebrgy");
        $add->town = $request->input("etown");
        $add->postal_code = $request->input("epost");
        $add->save();
        // $add = Address::find($did);
            
        // $add->street = $request->input("cpstreet");
        // $add->barangay = $request->input("cpbrgy");
        // $add->town = $request->input("cptown");
        // $add->postal_code = $request->input("cppost");
        // $add->save();
        // $use = UserDetail::find($cid);
        // $use->fill($request->except('cpimage'));
            
        // $use->fname = $request->input("cpfname");
        // $use->lname = $request->input("cplname");
        
       
       
        // $use->contact_no = $request->input("cpconno");
        // $use->age = $request->input("cpage");
        // $use->gender = $request->input("gender");
        // if($file = $request->hasFile('cpimage')) {
        //     $file = $request->file('cpimage') ;
        //     $fileName = $file->getClientOriginalName() ;
        //     $destinationPath = public_path().'/storage/images/uploads' ;
        //     $file->move($destinationPath,$fileName);
        //     $use->image = $fileName ;
        // }

        // $use->save();
        // $data = array(
        //     'fname'=>$request->cpfname,
        //     'lname'=>$request->cplname,
        //     'image'=>$request->cpimage,
        //     'contact_no'=>$request->cpconno,
        //     'age'=>$request->cpage,
        //     'gender'=>$request->gender
            
        // );
        // $last_id = DB::table('user_details')->whereuser_detail_id($cid)
        // ->insertGetId($data);

           
            
            $event->event_name = $request->input("event");
            $event->description = $request->input("desc");
            $event->start_date = $request->input("DateTimeS");
            $event->end_date = $request->input("DateTimeE");
            $event->participants = $request->input("participants");
            $event->contact_person_id=$request->user_name;
            $event->image_id = $image->image_id;
            $event->save();

        toast('Event successfully updated','success');
        return redirect('/admin/events');
        
    }
    public function delete(Request $request,$id,$aid)
    {
        $user=Auth::user();
        if(Hash::check($request->input('password'),$user->password)){
            $line=Image::whereimage_id($id)->delete();
            // return dd($line);
            // $bikes=UserDetail::whereuser_detail_id($bid)->delete();
            $event=Address::whereaddress_id($aid)->delete();
            toast('Event Successfully Deleted','success');
        }else{
            toast('Failed to Delete. Incorrect Password','error'); 
        }
          return redirect('/admin/events');

    }
}
