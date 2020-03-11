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
}
