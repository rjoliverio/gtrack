<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserDetail;
use App\Models\Address;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Auth;
class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $drivers = User::where('user_type','Driver')->where('active',1)->get();
        $admins  = User::where('user_type','Admin')->get();
        $inactives = User::where('active',0)->get();
        return view('admin.employee.index',compact('drivers','admins','inactives'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('admin');
    }
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'lname' => ['required', 'string', 'max:255'],
            'fname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    } 
    public function create()
    {
        return view('admin.employee.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validator($request->all())->validate();
        $address = Address::create([
            'street'=>$request->input('street'),
            'barangay'=>$request->input('barangay'),
            'town'=>$request->input('town'),
            'postal_code'=>$request->input('postal_code'),
        ]);
        $getid=UserDetail::create([
            'fname'=>$request->input('fname'),
            'lname'=>$request->input('lname'),
            'email'=>$request->input('email'),
            'contact_no'=>$request->input('contact_no'),
            'address_id'=>$address->address_id,
            'age'=>$request->input('age'),
            'gender'=>$request->input('gender'),
        ]);
        
        $user = new User();
        $user->user_detail_id = $getid->user_detail_id;
        $user->email = $request->input('email');
        $user->user_type =  $request->input('user_type');
        $user->password = Hash::make($request->input('password'));
       
        
        $user->save();
        toast('Registration Successful. You may now log in.','success');
        return redirect('admin/employees');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $account = User::find($id);
        return view('admin.employee.show',compact('account'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function disable(Request $request ,$id)
    {
        $account = User::find($id);
        $user = Auth::user();
        if(Hash::check($request->input('password'),$user->password)){
            $account->active = 0;
            $account->save();
            toast('Disabling Successful','success');
        }else{
            toast('Failed to Disable. Incorrect Password','error'); 
        }
       
        return redirect('/admin/employees');
    }
    public function reactivate(Request $request,$id)
    {
        $account = User::find($id);
        $user = Auth::user();
        if(Hash::check($request->input('password'),$user->password)){
            $account->active = 1;
            $account->save();
            toast('Succesfully Reactivated!','success');
        }else{
            toast('Failed to Disable. Incorrect Password','error'); 
        }
       
        return redirect('/admin/employees');
    }
}
