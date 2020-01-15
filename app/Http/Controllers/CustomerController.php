<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use App\Customer;
use App\Http\Resources\CustomerResource;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    //
    public function index(){

        $customers = Customer::all();
        


        return view('customers', ['customers' => $customers]);
    }

    public function update(Customer $customer, Request $request): CustomerResource
    {
        $customer -> update($request -> all());
            return new CustomerResource($customer);
    }

}
