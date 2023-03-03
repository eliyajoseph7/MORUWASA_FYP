<?php

namespace App\Http\Controllers;
use App\Models\ControlNumber;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Models\WaterBill;
use App\Models\Consumption;
use App\Models\Usage;

class WaterBillController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(Request $request){
        $bill = WaterBill::select(DB::raw("SUM(units) * 1000 as litres"), DB::raw("SUM(amount) as amount"),'created_at')
                            ->groupBy('created_at')
                            ->get();
        // return $bill;
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


        $check = $request->input('filter');
        if($check == "allTime"){
            $usages = Usage::join('consumptions', 'usages.id', '=', 'consumptions.id')
                        ->select('customer_id', DB::raw("SUM(consumptions.consumption) as units"))
                        ->groupBy('customer_id')
                        ->get();
   
           
            return view('waterBill', compact('usages', 'bill'));
        }else{
            $usages = Usage::join('consumptions', 'usages.id', '=', 'consumptions.id')
                        ->select('customer_id', DB::raw("SUM(consumptions.consumption) as units"))
                        ->whereMonth('consumptions.created_at', date('m'))
                        ->groupBy('customer_id')
                        ->get();
   
           

            return view('waterBill', compact('usages', 'bill'));
        }
        
    }
}
