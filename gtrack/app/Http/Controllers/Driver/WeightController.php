<?php

namespace App\Http\Controllers\Driver;
use App\Models\WasteCollection;
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
class WeightController extends Controller
{
    //
    public function index()
    {
        return view('driver.inputweight.inputweight');
    }
    public function input(Request $request)
    {

        $user=Auth::user();
        $weight=new WasteCollection();
        $weight->collector_id=$user->user_id;
        $weight->garbage_weight=$request->weight;
        $weight->save();

        toast('Garbage weight inputted successfully','success');

        return redirect('/driver/weight');
    }
}
