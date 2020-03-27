<?php

namespace App\Http\Controllers\Chart;
use DateTime;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Consuption;
class InteractiveConsuptionChartController extends Controller
{
    //
    public function getAllConsuptions(){
        $consuption_array = array();
        $consuption_time = Consuption::whereMonth('created_at', date('m'))->orderBy('created_at', 'ASC')->get('created_at');
        $consuption_time = json_decode($consuption_time);

        foreach($consuption_time as $unformatted_date){
            $date = new DateTime($unformatted_date->created_at);
            $units_key = $date->format('d');
            $units_value = $date->format('D');
            $consuption_array [$units_key] = $units_value;
        }
        return $consuption_array;
    }

    public function getAllConsuptionsCount($time)
    {
        
        $units = Consuption::whereDay('created_at', $time)->whereMonth('created_at', date('m'))->get()->sum('consuption');

        return $units;
        
    }

    public function getAllLiveConsuption()
    {
        $live_consuption_array = array();
        $consuption_array = $this->getAllConsuptions();
        $consuption_time = array();

        if(! empty($consuption_array)){
            foreach($consuption_array as $consuption_array => $name){
                $time_consuption_data_count = $this->getAllConsuptionsCount($consuption_array);
                array_push($live_consuption_array, $time_consuption_data_count);
                array_push($consuption_time, $consuption_array);
            }
        }

        $live_consuption_array_data = array(
            'time' => $consuption_time,
            'units' => $live_consuption_array
        );

        return $live_consuption_array_data;
    }
}
