<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\WaterBill;
use App\Consuption;
use App\Usage;

class WaterBillController extends Controller
{
    //
    public function index(){
        $bill = WaterBill::all();
        // $usage = Usage::all()->groupBy('customer_id');
        // return $usage;
        $result = DB::table('usages')
                        ->join('consuptions', 'usages.id', '=', 'consuptions.usage_id')
                        ->select('usages.id', 'customer_id', 'consuptions.consuption')
                        ->get();

        // $data = $result -> customer_id;
        return $result;    

        return view('waterBill', ['bill' => $bill, 'result' => $result]);
    }
}
