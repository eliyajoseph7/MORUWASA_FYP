<?php

namespace App\Http\Controllers\Chart;
use DateTime;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Consumption;
class InteractiveConsumptionChartController extends Controller
{
    //
    public function getAllConsumptions(){
        $consumption_array = array();
        $consumption_time = Consumption::whereMonth('created_at', date('m'))->orderBy('created_at', 'ASC')->get('created_at');
        $consumption_time = json_decode($consumption_time);

        foreach($consumption_time as $unformatted_date){
            $date = new DateTime($unformatted_date->created_at);
            $units_key = $date->format('d');
            $units_value = $date->format('D');
            $consumption_array [$units_key] = $units_value;
        }
        return $consumption_array;
    }

    public function getAllConsumptionsCount($time)
    {
        
        $units = Consumption::whereDay('created_at', $time)->whereMonth('created_at', date('m'))->get()->sum('consumption');

        return $units;
        
    }

    public function getAllLiveConsumption()
    {
        $live_consumption_array = array();
        $consumption_array = $this->getAllConsumptions();
        $consumption_time = array();

        if(! empty($consumption_array)){
            foreach($consumption_array as $consumption_array => $name){
                $time_consumption_data_count = $this->getAllConsumptionsCount($consumption_array);
                array_push($live_consumption_array, $time_consumption_data_count);
                array_push($consumption_time, $consumption_array);
            }
        }

        $live_consumption_array_data = array(
            'time' => $consumption_time,
            'units' => $live_consumption_array
        );

        return $live_consumption_array_data;
    }
}
