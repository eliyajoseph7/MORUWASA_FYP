<?php

namespace App\Http\Controllers\Api\v1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CustomerResource;
use App\Customer;

class CustomerController extends Controller
{
    //
    public function update(Customer $customer, Request $request): CustomerResource
    {
        $customer -> update($request -> all());
            return new CustomerResource($customer);
    }

    public function store(Request $request): CustomerResource
    {
        $request -> validate([
            'name'=> 'required',
            'meter_no'=> ['required', 'digits_between:8,8']
        ]);

        $name = $request->input('name');
        $meter = $request->input('meter_no');

        $check = Customer::join('meters', 'customers.id', '=', 'meters.customer_id')
                    ->whereRaw('lower(name) = ?', strtolower($name))
                    ->where('meters.meter_no', $meter);
                    

        if($check->exists())
        {
                $token = Customer::where('phone', $check->pluck('phone'))->get('api_token');

                return new CustomerResource($token);
            
        }else{
            return new CustomerResource([404]);
        }
    }

    public function index(){
        $customers = Customer::join('meters', 'customers.id', '=', 'meters.customer_id')->get();

        return $customers;
    }
}
