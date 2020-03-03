<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use App\Customer;
use App\Meter;
use App\Http\Resources\CustomerResource;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    //
    public function index(){

        $customers = Customer::all();
        $meter = Meter::where('customer_id',null)
                        ->get();

// return $meter;
        return view('customers', ['customers' => $customers, 'meter'=>$meter]);
    }

    public function add(Request $request){
        $validatedData = $request->validate([
            'name' => 'required',
            'phone' => 'required|regex:/^(\+255)[0-9]{9}$/',
            'street' => 'required',
            'category' => 'required',
        ]);

        $addCustomer = new Customer;
        if ($addCustomer::where('phone', '=', Input::get('phone'))->exists()) {
            return redirect('/customers')->with('err','The customer exists');
        

        }else{
            $addCustomer -> name = $request -> input('name');
            $addCustomer -> phone = $request -> input('phone');
            $addCustomer -> street = $request -> input('street');
            $addCustomer -> category = $request -> input('category');
            $addCustomer -> gender = $request -> input('gender');

            $addCustomer->save();// saving the inputs to the customers table

            $inputMeter = $request -> input('meter_no');// capturing the entered meter number
            $customerID = Customer::where('phone', $addCustomer -> phone)->pluck('id')->first(); //plucking the id of the added customer
            $meter = new Meter;
            // $matchThese = ['meter_no' => $inputMeter, 'customer_id' => null];

            $meter = $meter::where('meter_no', $inputMeter)->first();/*selecting from meters table where 
                                                                        the available meter number match the entered meter number*/

            $meter -> customer_id  = $customerID;//updating the customer_id with an id from customers table 
             $meter->save();

            return redirect('/customers')->with('info', 'customer added successfully!');
        }

    }

    public function update(Customer $customer, Request $request): CustomerResource
    {
        $customer -> update($request -> all());
            return new CustomerResource($customer);
    }

}
