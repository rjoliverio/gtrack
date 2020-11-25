<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Auth;
use App\Models\Dumpster;
use App\Models\Address;
use Illuminate\Support\Facades\Hash;
use Kreait\Firebase;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use Kreait\Firebase\Database;
class DumpstersController extends Controller
{
    
    public function index()
    {
        $dumpsters = Dumpster::all();
        return view('admin.dumpster.index',compact('dumpsters'));
    }
    public function create()
    {
        $address = Address::all();
        return view('admin.dumpster.create');
    }
    public function store(Request $request)
    {
       $this->validate($request,
       [
           'street' => 'required',
           'barangay' => 'required',
           'town' => 'required',
           'postal_code' => 'required|max:4',
           'latitude' => 'required',
           'longitude' => 'required'
       ]);
        $address = Address::create([
            'street'=>$request->input('street'),
            'barangay'=>$request->input('barangay'),
            'town'=>$request->input('town'),
            'postal_code'=>$request->input('postal_code'),
        ]);
        $dumpster = new Dumpster();
        $dumpster->address_id = $address->address_id;
        $dumpster->latitude = $request->input('latitude');
        $dumpster->longitude = $request->input('longitude');
        
        $firebase = (new Factory)
        ->withServiceAccount(app_path().'\Http\Controllers'.'\mapsample-51a36-firebase-adminsdk-5c38e-cf6600b7d0.json');

        $database = $firebase->createDatabase();
        $ref = $database->getReference("dumpsters");
        $key=$ref->push()->getKey();
        $ref->getChild($key)->set([
            'dumpster_id' => $dumpster->dumpster_id,
            'landmark' => $address->street,
            'latitude' => $dumpster->latitude,
            'longitude'=> $dumpster->longitude
        ]);
        $dumpster->firebase_uid=$key;
        $dumpster->save();
        toast('Dumpster Created Successfully!','success');
        return redirect('admin/dumpsters');
    }
    public function edit(Dumpster $dumpster_id,Address $address_id)
    {
        return view('admin.dumpsters.index',compact('dumpster_id','address_id'));
    }
    public function update(Request $request,Dumpster $dumpster_id,Address $address_id)
    {
        $this->validate($request,
        [
            'street' => 'required',
            'barangay' => 'required',
            'town' => 'required',
            'postal_code' => 'required|max:4',
            'latitude' => 'required',
            'longitude' => 'required'
        ]);
        $address_id->update([
            'street' =>$request->street,
            'barangay'=>$request->barangay,
            'town' => $request->town,
        ]);
        $dumpster_id->update([
            'longitude' =>$request->longitude,
            'latitude' =>$request->latitude
        ]);
        $firebase = (new Factory)
        ->withServiceAccount(app_path().'\Http\Controllers'.'\mapsample-51a36-firebase-adminsdk-5c38e-cf6600b7d0.json');

        $database = $firebase->createDatabase();
        $ref = $database->getReference("dumpsters");
        $ref->getChild($dumpster_id->firebase_uid)->set([
            'dumpster_id' => $dumpster_id->dumpster_id,
            'landmark' => $address_id->street,
            'latitude' => $dumpster_id->latitude,
            'longitude'=> $dumpster_id->longitude
        ]);
        toast('Dumpster updated successfully','success');
        return redirect('admin/dumpsters');
    }
    public function destroy(Request $request, Dumpster $dumpster_id)
    {
        $user = Auth::user();
        if(Hash::check($request->input('password'),$user->password)){
            $address = Address::find($dumpster_id->address_id);
            $firebase = (new Factory)
            ->withServiceAccount(app_path().'\Http\Controllers'.'\mapsample-51a36-firebase-adminsdk-5c38e-cf6600b7d0.json');

            $database = $firebase->createDatabase();
            $database->getReference("dumpsters/".$dumpster_id->firebase_uid)->remove();
            $dumpster_id->delete();
            $address->delete();
            toast('Succesfully Deleted!','success');
        }else{
            toast('Failed to Disable. Incorrect Password','error'); 
        }
       
        return redirect('/admin/dumpsters');
    }
}
