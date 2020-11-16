<?php

namespace App\Http\Controllers\Driver;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Address;
use App\Models\UserDetail;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Illuminate\Http\UploadedFile;
class ProfileController extends Controller
{
    public function index()
    {
        $user=Auth::user();
        return view('driver.profile',compact('user'));
    }
    public function update(Request $req, $id)
    {
        $user=User::find($id);
        $userd=UserDetail::find($user->user_detail_id);
        $address=Address::find($userd->address_id);
        $this->validate ($req, [
            'fname'=>'required',
            'lname'=>'required',
            'age'=>'required',
            'gender'=>'required',
            'contact_no'=>'required',
            'street'=>'required',
            'barangay'=>'required',
            'town'=>'required',
            'postal_code'=>'required',
            'old_password'=>'nullable|password',
            'password' => ['min:8', 'confirmed','nullable'],
            'image'=>'nullable|mimes:jpeg,png,jpg',
            
            ],
            [
            //  'image.max'=>'File size too large',
             'image.mimes' => 'Only upload jpeg, jpg, png images',
             'password.confirmed'=>'Password did not match'
            ]
       );

       if($req->image!=null)
       {
        $basename = Str::random();
        $req->file('image')->move(public_path('/storage/images/uploads'),$basename . '.' . $req->file('image')->getClientOriginalExtension());
        $userd->image=$basename.".".$req->file('image')->getClientOriginalExtension();
       }
       if($req->password!=null)
       {
        $user->password=Hash::make($req->password);
        $user->save();
       }
       $address->street=$req->street;
       $address->barangay=$req->barangay;
       $address->town=$req->town;
       $address->postal_code=$req->postal_code;
       $address->save();

       $userd->fname=$req->fname;
       $userd->lname=$req->lname;
       $userd->age=$req->age;
       $userd->gender=$req->gender;
       $userd->contact_no=$req->contact_no;
       $userd->save();

       alert()->success('SuccessAlert','Profile updated successfully.');
    
        return redirect('/driver/profile');
    }
}
