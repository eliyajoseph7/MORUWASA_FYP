<?php

namespace App\Http\Controllers\Chart;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Consumption;
class TrendsChartController extends Controller
{
    //
    public function getAllDays(){
        $days_array = array();
        $month_dates = Consumption::whereMonth('created_at', date('m'))->orderBy('created_at', 'ASC')->get('created_at');
        $month_dates = json_decode($month_dates);
        if(!empty($month_dates)){
            foreach($month_dates as $unformatedDate){
                $date = new \DateTime($unformatedDate->created_at);
                $day_no = $date->format('d');
                $day_name = $date->format('D');
                $days_array [$day_no] = $day_name;
            }
        }
        return $days_array;
    }

    public function getAllDaysCount($day, $id){
        $day_count_consumptions = Consumption::join('usages', 'usages.id', '=', 'consumptions.id')
                                                ->where('usages.customer_id', $id)
                                                ->whereMonth('consumptions.created_at', date('m'))
                                                ->whereDay('consumptions.created_at', $day)
                                                ->get()->sum('consumption');
        return ($day_count_consumptions);                                        
    }

    public function getAllDaysData($id){
        $day_consumption_array_count = array();
        $days_array = $this->getAllDays();
        $day_name_array = array();

        if(!empty($days_array)){
            foreach($days_array as $days => $day){
                $day_consumption_count = $this->getAllDaysCount($days, $id);
                array_push($day_consumption_array_count, $day_consumption_count);
                array_push($day_name_array, $days);
            }
        }
        $max_no = max($day_consumption_array_count);
        $max = round(( $max_no + 10/2 ) / 10 ) * 10;

        $day_consumption_data_array = array(
            'day' => $day_name_array,
            'consumption_count_data' => $day_consumption_array_count,
            'max' => $max
        );
        return $day_consumption_data_array;
    }
}
