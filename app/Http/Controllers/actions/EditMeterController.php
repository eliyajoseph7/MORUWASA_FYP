<?php

namespace App\Http\Controllers\actions;

use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Meter;

class EditMeterController extends Controller
{
    //

    public function meter($id){

        $meter = Meter::find($id);
        // return $meter;
        return view('actionToCustomers/editMeter', compact('meter'));
    }

    public function updateMeter(Request $request, $id){
        $validatedData = $request->validate([
            'meter_no' => ['required', 'min:8', 'max:8'],
        ]);

        if(Meter::where('id', '!=', $id)->where('meter_no', Input::get('meter_no'))->exists()){
            return redirect('editMeter/'.$id)->with('err', 'The meter exists');
        }
        else{
            if(Meter::where('meter_no', Input::get('meter_no'))->where('type', Input::get('type'))->exists()){
                return redirect('editMeter/'.$id)->with('nothing', 'No changes made');
            }
            else{
                $update = Meter::find($id);
                $update->meter_no = $request->input('meter_no');
                $update->type = $request->input('type');
                $update->save();
                return redirect('editMeter/'.$id)->with('info', 'The meter updated successfully'); 
            }
            

        }
    }
}
