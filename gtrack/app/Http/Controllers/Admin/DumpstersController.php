<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Auth;
use App\Models\Dumpster;
use App\Models\Address;

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
}
