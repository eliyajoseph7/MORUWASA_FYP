<?php

namespace App\Http\Controllers\Api\v1;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Consumption;
use App\Http\Resources\ConsumptionResource;
use App\Http\Resources\ResourcesCollections\ConsumptionResourceCollection;
use App\Meter;
use App\Usage;

class ConsumptionController extends Controller
{
    //
    public function store(Request $request): ConsumptionResource
    {
        $request -> validate([  //validating the inputs received from real time meter
            'consumption' => ['required', 'digits_between:0,1000'],
            'meter_no' => ['required', 'digits_between:8,8']
        ]);
        $meter = new Meter;
        if ($meter::where('meter_no', '=', $request->input('meter_no'))->exists()) // checking if the meter number match with any available in the maters table
        {
            $customer = $meter::where('meter_no', $request->input('meter_no'))->pluck('customer_id');// taking a customer id of the matched meter
            foreach($customer as $customer){
                $customer = $customer;
                
            }

            if(is_null($customer))
            {
                return new ConsumptionResource(["Oops!, the meter number is not yet assigned to any customer"]);
            }else{
                        
                $usage = new Usage;
                $usage -> customer_id = $customer;
                $usage->save();

                $units = Consumption::create($request->all());
                return new ConsumptionResource($units);
            }
    

        }else{
            return new ConsumptionResource(["The meter number didn't match with any customer's meter"]);

        }

        
    }

    public function index(): ConsumptionResourceCollection
    {
        return new ConsumptionResourceCollection(Consumption::paginate(5));
    }

    public function show( $consumption): ConsumptionResource
    {
        $meter = new Meter;
        if($meter::where('meter_no', '=', $consumption)->exists()){
            $customer = $meter::where('meter_no', '=', $consumption)->pluck('customer_id');
            $consumed = Usage::join('consumptions', 'usages.id', '=', 'consumptions.id')
                            ->where('usages.customer_id', $customer)
                            ->orderBy('consumptions.created_at')
                            ->get('consumptions.consumption');
        return new ConsumptionResource($consumed);
        }else{
            return new ConsumptionResource(["The meter number seems to be invalid"]);
        }
        
    }
}
