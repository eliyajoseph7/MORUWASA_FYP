<?php

namespace App\Http\Controllers\actions;
use Illuminate\Support\Facades\Input;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Customer;
use App\Meter;

class UpdateCustomerController extends Controller
{
    //
    public function update(Request $request, $id){
        $edit = Customer::find($id);
        $validatedData = $request->validate([
            'name' => 'required',
            'phone' => 'bail|required|regex:/^(\+255)[0-9]{9}$/',
            'street' => 'required',
            'category' => 'required',
            'meter_no' => 'required',
        ]);

            $edit->name = $request->input('name');
            $edit->phone = $request->input('phone');
            $edit->category = $request->input('category');
            $edit->gender = $request->input('gender');
            $edit->street = $request->input('street');
            
            $edit->save();

            $inputMeter = $request -> input('meter_no');// capturing the entered meter number
            $meter = new Meter;
            $meter = Meter::where('customer_id', $id)->first();
            
            $meter -> meter_no = $inputMeter;
            $meter->save();

            $meter = Meter::where('meter_no', $inputMeter)->where('customer_id', null)->delete();

            return redirect ('view/'.$id)->with('info', 'customer details updated successfully');
    }
}
