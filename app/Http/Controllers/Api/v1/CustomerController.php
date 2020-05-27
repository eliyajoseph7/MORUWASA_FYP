<?php

namespace App\Http\Controllers\Api\v1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\Http\Resources\CustomerResource;
use App\Customer;
use App\Meter;

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
            'phone'=> 'required',
            'meter_no'=> 'required'
        ]);

        $phone = $request->input('phone');
        $meter = $request->input('meter_no');

        if(Customer::where('phone', $phone)->exists())
        {
            if(Meter::where('meter_no', $meter)->exists())
            {
                return new CustomerResource(["Login successfully"]);
            }
        }else{
            return new CustomerResource(["Either phone or meter number was incorrect"]);
        }
    }
}
