<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Truck;
use App\Models\User;
use App\Models\Dumpster;
use App\Models\WasteCollection;
use DB;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $totalton = \DB::select('SELECT DATE(created_at) date,SUM(garbage_weight) total FROM waste_collections GROUP BY DATE(created_at) ORDER BY DATE(created_at) DESC LIMIT 5');
        $arrton=array();
        $arrd=array();
        if($totalton!=null){
            foreach($totalton as $col){
         
                $arrton[]=$col->total;
                $arrd[]=$col->date;
                
            }
        }else{
            for($x=0;$x<5;$x++){
                $arrton[$x]=null;
                $arrd[$x]=null;
            }
        }
        
        $trucks=Truck::all()->count();
        $driver=User::whereuser_type('Driver')->whereactive(1)->count();
        $dump=Dumpster::all()->count();
        $collect=WasteCollection::all()->count();
        return view('admin.dashboard',[
            'result'=> $arrton,
            'result2'=> $arrd,
            'trucks'=>$trucks,
            'driver'=>$driver,
            'dump'=>$dump,
            'collect'=>$collect,

        ]);
    }
}
