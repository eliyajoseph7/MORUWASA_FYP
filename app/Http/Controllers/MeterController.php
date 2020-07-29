<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Meter;
class MeterController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function meters()
    {
        $meter = Meter::all();
        return view('meter', ['meter' => $meter]);
    }

    public function add(Request $request){
        $validatedData = $request->validate([
            'meter_no' => ['required', 'min:8', 'max:8'],
            'type' => 'required',
        ]);

        
        $addMeter = new Meter;
        if ($addMeter::where('meter_no', '=', $request->input('meter_no'))->exists()) {
            return redirect('/meter')->with('err','The Meter exists');
        

        }else{
            $addMeter -> meter_no = $request -> input('meter_no');
            $addMeter -> type = $request -> input('type');

            $addMeter->save();// saving the inputs to the meters table

            return redirect('/meter')->with('info', 'Meter registered successfully!');
        }

    }
}
