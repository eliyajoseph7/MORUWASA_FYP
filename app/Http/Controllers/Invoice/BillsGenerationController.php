<?php

namespace App\Http\Controllers\Invoice;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\WaterBill;
use App\ControlNumber;
class BillsGenerationController extends Controller
{
    //
    public function generateBill(){
        if(date('d') == 30){
            $data = DB::table('customers')
                        ->join('usages', 'customers.id', '=', 'usages.customer_id')
                        ->join('consuptions', 'usages.id', '=', 'consuptions.id')
                        ->whereMonth('consuptions.created_at', date('m'))
                        ->select('customers.id', 'customers.name', DB::raw('cast(customers.category as varchar)'), DB::raw('SUM(cast(consuptions.consuption as double precision)) as units'))
                        ->groupBy('customers.id', 'customers.category')
                        ->get();
    
            $check = new WaterBill;
    
            if($check::whereMonth('created_at', date('m'))->exists()){
    
            }else{
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
        
        } 
    }
}
