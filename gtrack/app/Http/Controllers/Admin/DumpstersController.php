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
        $dumpster->save();
        toast('Dumpster Created Successfully!','success');
      return redirect('admin/dumpsters');
    }
    public function edit(Dumpster $dumpster_id,Address $address_id)
    {
        return view('admin.dumpsters.index',compact('dumpster_id','address_id'));
    }
    public function update(Request $request,Dumpster $dumpter_id,Address $address_id)
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
        $dumpter_id->update([
            'longitude' =>$request->longitude,
            'latitude' =>$request->latitude
        ]);
        toast('Dumpster updated successfully','success');
        return redirect('admin/dumpsters');
    }
    public function destroy(Request $request, Dumpster $dumpter_id)
    {
        $user = Auth::user();
        if(Hash::check($request->input('password'),$user->password)){
            $address = Address::find($dumpter_id->address_id);
            $dumpter_id->delete();
            $address->delete();
            toast('Succesfully Deleted!','success');
        }else{
            toast('Failed to Disable. Incorrect Password','error'); 
        }
       
        return redirect('/admin/dumpsters');
    }
}
