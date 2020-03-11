<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\WaterBill;
use App\Consuption;
use App\Usage;

class WaterBillController extends Controller
{
    //
    public function index(Request $request){
        $bill = new WaterBill;
        // $usages = Usage::select('id', 'customer_id', 'consuption')
        //                 ->groupBy('customer_id')
        //                 ->sum('consuption');

        // $usages = Usage::select('customer_id', DB::raw("SUM(consuption) as units"))
        //                 ->groupBy(DB::raw("customer_id"))
        //                 ->get();
                        
                // print_r($usages);
        // return $usages; 
        $usages = Usage::join('consuptions', 'usages.id', '=', 'consuptions.id')
                        ->select('customer_id', DB::raw("SUM(consuptions.consuption) as units"))
                        ->groupBy('customer_id')
                        ->get();

        // foreach ($usages->all() as $usage) {
            // $bill -> customer_id = $usages->all() -> customer_id;
            // $bill -> units = $usages->all() -> units;
            // $bill -> save();
        // }
        // return $usages;    

        return view('waterBill', ['bill' => $bill, 'usages' => $usages]);
    }
}
