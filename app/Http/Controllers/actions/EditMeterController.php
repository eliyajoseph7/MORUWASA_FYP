<?php

namespace App\Http\Controllers\actions;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Meter;

class EditMeterController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function meter($id){

        $meter = Meter::find($id);
        // return $meter;
        return view('actionToCustomers/editMeter', compact('meter'));
    }

    public function updateMeter(Request $request, $id){
        $validatedData = $request->validate([
            'meter_no' => ['required', 'min:8', 'max:8', 'digits_between:8,8'],
        ]);

        if(Meter::where('id', '!=', $id)->where('meter_no', $request->input('meter_no'))->exists()){
            return redirect('editMeter/'.$id)->with('err', 'The meter exists');
        }
        else{
            if(Meter::where('meter_no', $request->input('meter_no'))->where('type', $request->input('type'))->exists()){
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
