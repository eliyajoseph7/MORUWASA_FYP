<?php

namespace App\Http\Controllers;
use App\ControlNumber;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\WaterBill;
use App\Consumption;
use App\Usage;

class WaterBillController extends Controller
{
    //
    public function index(Request $request){
        $bill = new WaterBill;
        // $usages = Usage::select('id', 'customer_id', 'consumption')
        //                 ->groupBy('customer_id')
        //                 ->sum('consumption');

        // $usages = Usage::select('customer_id', DB::raw("SUM(consumption) as units"))
        //                 ->groupBy(DB::raw("customer_id"))
        //                 ->get();
                        
                // print_r($usages);
        // return $usages; 
        /* for postgres, the cast(something as data type) must be added otherwise 
        * SQLSTATE[42883]: Undefined function: 7 ERROR: function sum(character varying) does not exist LINE 1: 
        *ty   will be thrown*/
        $usages = Usage::join('consumptions', 'usages.id', '=', 'consumptions.id')
                        ->select('customer_id', DB::raw("SUM(cast(consumptions.consumption as double precision)) as units"))
                        ->groupBy('customer_id')
                        ->get();
   
           

        return view('waterBill', ['bill' => $bill, 'usages' => $usages]);
    }
}
