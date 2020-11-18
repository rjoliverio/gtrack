<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Truck;
use App\Models\User;
use App\Models\Dumpster;
use App\Models\WasteCollection;
use DB;
use PDF;
use Carbon;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $totalton = \DB::select('SELECT DATE(created_at) date,SUM(garbage_weight) total FROM waste_collections GROUP BY DATE(created_at) ORDER BY DATE(created_at) DESC LIMIT 4');
        $arrton=array();
        $arrton2=array();
        $arrd2=array();
        $arrd=array();
        if($totalton!=null){
            foreach($totalton as $col){
         
                $arrton2[]=$col->total;
                $arrd2[]=$col->date;
                
            }
            for($x=0,$y=3;$x<4 && $y<4;$x++,$y--){
                $arrton[$x]=$arrton2[$y];
                $arrd[$x]=$arrd2[$y];
            }
        }else{
            for($x=0;$x<4;$x++){
                $arrton[$x]=null;
                $arrd[$x]=null;
            }
        }
        
        $trucks=Truck::whereactive(1)->count();
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
    public function export()
    {
        $totalton = \DB::select('SELECT DATE(created_at) date,SUM(garbage_weight) total FROM waste_collections GROUP BY DATE(created_at) ORDER BY DATE(created_at) DESC LIMIT 4');
        $arrton=array();
        $arrton2=array();
        $arrd2=array();
        $arrd=array();
        if($totalton!=null){
            foreach($totalton as $col){
         
                $arrton2[]=$col->total;
                $arrd2[]=$col->date;
                
            }
            for($x=0,$y=3;$x<4 && $y<4;$x++,$y--){
                $arrton[$x]=$arrton2[$y];
                $arrd[$x]=$arrd2[$y];
            }
        }else{
            for($x=0;$x<4;$x++){
                $arrton[$x]=null;
                $arrd[$x]=null;
            }
        }
        $date=Carbon\Carbon::now();
      
        $trucks=Truck::whereactive(1)->count();
        $driver=User::whereuser_type('Driver')->whereactive(1)->count();
        $dump=Dumpster::all()->count();
        $collect=WasteCollection::all()->count();
     $ffff=PDF::loadView('admin.pdf',[
        'result'=> $arrton,
        'result2'=> $arrd,
        'trucks'=>$trucks,
        'driver'=>$driver,
        'dump'=>$dump,
        'collect'=>$collect,
        'date'=>$date

    ]);
     return $ffff->stream();
    }

}
