<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Truck;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
class TrucksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trucks = Truck::where('active',1)->get();
        $inactives = Truck::where('active',0)->get();
        return view('admin.gtruck.index',compact('trucks','inactives'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $drivers = User::where('user_type','Driver')->get();
        return view('admin.gtruck.create',compact('drivers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $truck = new Truck();
      $truck->plate_no = $request->input("plate_no");
      $truck->user_id = $request->input("driver_id");
      $truck->save();
      toast('Truck Created Successfully!','success');
      return view('admin.gtruck.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function maintenance(Request $request,$id)
    {
        
        $truck = Truck::find($id);
        $user = Auth::user();
        if(Hash::check($request->input('password'),$user->password)){
            $truck->active = 0;
            $truck->save();
            toast('Disabling Successful','success');
        }else{
            toast('Failed to Disable. Incorrect Password','error'); 
        }
       
        return redirect('/admin/gtrucks');
    }
    public function repair(Request $request,$id)
    {
        $truck = Truck::find($id);
        $user = Auth::user();
        if(Hash::check($request->input('password'),$user->password)){
            $truck->active = 1;
            $truck->save();
            toast('Successfully Repaired!','success');
        }else{
            toast('Failed to Repair! Incorrect Password','error'); 
        }
       
        return redirect('/admin/gtrucks');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
