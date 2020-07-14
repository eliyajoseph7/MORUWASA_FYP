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

        $phone_check = Customer::where('id', '!=', $id)->where('phone', Input::get('phone'));
        if($phone_check->exists()){
            return redirect ('view/'.$id)->with('err', 'The phone number entered belongs to another customer!');

        }else{
                $edit->name = $request->input('name');
                $edit->phone = $request->input('phone');
                $edit->category = $request->input('category');
                $edit->gender = $request->input('gender');
                $edit->street = $request->input('street');
                
                $edit->save();

                $inputMeter = $request -> input('meter_no');// capturing the entered meter number
                $meter = new Meter;
                $meter = Meter::where('customer_id', $id)->first();
                $usedMeter = Meter::where('customer_id', $id)->first();

                $meter -> meter_no = $inputMeter;
                $meter->save();

                $freemeter = Meter::where('meter_no', $inputMeter)->where('customer_id', null)->first();
                if(!is_null($freemeter)){
                    $freemeter -> meter_no = $usedMeter -> meter_no;
                    $freemeter->save();
                }
                


                return redirect ('view/'.$id)->with('info', 'customer details updated successfully');
            }
        }
            

    public function delete($id){
        Customer::where('id' , $id)
        ->delete();
        $customer = Customer::where('id', $id)->withTrashed()->first();
        $customer->user_id = auth()->user()->id;
        $customer->save();
         return redirect('customers')->with('info','customer deleted successfully');
        //  return ($id);
      }
}
