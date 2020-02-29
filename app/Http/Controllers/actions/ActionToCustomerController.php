<?php

namespace App\Http\Controllers\actions;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Customer;
use App\Usage;

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
        $daily_consuption = Usage::join('consuptions', 'usages.id', '=', 'consuptions.id')
                                    ->where('usages.customer_id', $id)
                                    ->whereYear('consuptions.created_at', date('Y'))
                                    // ->whereMonth('consuptions.created_at', date('m'))
                                    ->select('consuptions.created_at',DB::raw('SUM(cast(consuptions.consuption as double precision))'))
                                    ->groupBy('consuptions.created_at')
                                    ->get();
        // return $daily_consuption;                            
        return view('actionToCustomers/view', compact('view','daily_consuption'));
    }
}
