<?php

namespace App\Http\Controllers\Api\v1;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Consuption;
use App\Http\Resources\ConsuptionResource;
use App\Http\Resources\ResourcesCollections\ConsuptionResourceCollection;
use App\Meter;
use App\Usage;

class ConsuptionController extends Controller
{
    //
    public function store(Request $request): ConsuptionResource
    {
        $request -> validate([  //validating the inputs received from real time meter
            'consuption' => 'required',
            'meter_no' => 'required'
        ]);
        $meter = new Meter;
        if ($meter::where('meter_no', '=', Input::get('meter_no'))->exists()) // checking if the meter number match with any available in the maters table
        {
            $customer = $meter::where('meter_no', Input::get('meter_no'))->pluck('customer_id');// taking a customer id of the matched meter
            foreach($customer as $customer){
                $customer = $customer;
                
            }

            if(is_null($customer))
            {
                return new ConsuptionResource(["Oops!, the meter number is not yet assigned to any customer"]);
            }else{
                        
                $usage = new Usage;
                $usage -> customer_id = $customer;
                $usage->save();

                $units = Consuption::create($request->all());
                return new ConsuptionResource($units);
            }
    

        }else{
            return new ConsuptionResource(["The meter number didn't match with any customer's meter"]);

        }

        
    }

    public function index(): ConsuptionResourceCollection
    {
        return new ConsuptionResourceCollection(Consuption::paginate(5));
    }
}
