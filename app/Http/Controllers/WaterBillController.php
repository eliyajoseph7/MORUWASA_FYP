<?php

namespace App\Http\Controllers;
use App\ControlNumber;
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
        /* for postgres, the cast(something as data type) must be added otherwise 
        * SQLSTATE[42883]: Undefined function: 7 ERROR: function sum(character varying) does not exist LINE 1: 
        *ty   will be thrown*/
        $usages = Usage::join('consuptions', 'usages.id', '=', 'consuptions.id')
                        ->select('customer_id', DB::raw("SUM(cast(consuptions.consuption as double precision)) as units"))
                        ->groupBy('customer_id')
                        ->get();

    if(date('d') == 28){
        $data = DB::table('customers')
                    ->join('usages', 'customers.id', '=', 'usages.customer_id')
                    ->join('consuptions', 'usages.id', '=', 'consuptions.id')
                    ->whereMonth('consuptions.created_at', date('m'))
                    ->select('customers.id', 'customers.name', DB::raw('cast(customers.category as varchar)'), DB::raw('SUM(cast(consuptions.consuption as double precision)) as units'))
                    ->groupBy('customers.id', 'customers.category')
                    ->get();

        $inserts = [];
        foreach($data as $data){
            if($data->category == 'domestic'){
                $amount = $data -> units * 1600;
            }elseif($data->category == 'industry'){
                $amount = $data -> units * 2900;
            }elseif($data->category == 'commercial'){
                $amount = $data -> units * 2300;
            }elseif($data->category == 'tank'){
                $amount = $data -> units * 1600;
            }elseif($data->category == 'kiosk'){
                $amount = $data -> units * 1500;
            }else{
                $amount = $data -> units * 1900;
            }
            
           $inserts[] = ['customer_id' => $data->id,
                         'units' => $data->units,
                         'name' => $data->name,
                         'amount' => $amount,
                        'created_at' => now()];
        }  
            
          DB::table('water_bills')->insert($inserts);

        $control = new ControlNumber();
        $inserts = [];
        $bill = WaterBill::whereMonth('created_at', date('m'))->get();

        foreach($bill as $bill){
            $result = '';

            for($i = 0; $i < 12; $i++) {
                $result .= mt_rand(0, 9);


            }
            $inserts[] = ['control_no' => $result,
                          'created_at' => now()
            ];

        }
        DB::table('control_numbers')->insert($inserts);
    }    
           

        return view('waterBill', ['bill' => $bill, 'usages' => $usages]);
    }
}
