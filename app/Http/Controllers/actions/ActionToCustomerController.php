<?php

namespace App\Http\Controllers\actions;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Customer;
use App\Usage;
use App\Meter;

class ActionToCustomerController extends Controller
{
    //
    public function view(Request $request, $id){
        $data = [
            'name' => $request -> input('name'),
            'meter_no' => $request -> input('meter_no'),
            'phone' => $request -> input('phone'),
            'category' => $request -> input('category'),
            'gender' => $request -> input('gender'),
            'street' => $request -> input('street'),
        ];
        $view = Customer::find($id);
        $daily_consumption = Usage::join('consumptions', 'usages.id', '=', 'consumptions.id')
                                    ->where('usages.customer_id', $id)
                                    // ->whereMonth('consumptions.created_at', date('m'))
                                    ->select('consumptions.created_at',DB::raw('SUM(cast(consumptions.consumption as double precision))'))
                                    ->groupBy('consumptions.created_at')
                                    ->get();
        // return $daily_consumption;  

        $meter = Meter::where('customer_id',null)
                        ->get();
        return view('actionToCustomers/view', compact('view','daily_consumption','meter'));
    }
}
