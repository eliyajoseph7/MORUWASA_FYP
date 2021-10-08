<?php

namespace App\Http\Controllers\Chart;
use App\Models\Consumption;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DateTime;

class ChartDataController extends Controller
{
    //
    public function getAllMonths()
    {
        $month_array = array();
        $consumptions_dates = Consumption::select('created_at')->orderBy('created_at', 'ASC')->get();
        $consumptions_dates = json_decode($consumptions_dates);

        if (! empty($consumptions_dates)) {
            foreach ($consumptions_dates as $unformatted_date) {
                $date = new DateTime($unformatted_date->created_at);
                $month_no = $date->format('m');
                $month_name = $date->format('M');
                $month_array [$month_no] = $month_name;
            }
        }
                            
        return $month_array;
    }    

    public function getMonthlyConsumptionCount($month){
        $monthly_consumption_count = Consumption::whereMonth('created_at', $month)->get()->sum('consumption');
        return($monthly_consumption_count);
    }

    public function getMonthlyConsumptionData(){
        $monthly_consumption_count_array = array();
         $month_array = $this->getAllMonths();
         $month_name_array = array();

         if(! empty($month_array)){
             foreach($month_array as $month_no => $month_name){
                 $monthly_consumptions_count = $this->getMonthlyConsumptionCount($month_no);
                 array_push($monthly_consumption_count_array, $monthly_consumptions_count);
                 array_push($month_name_array, $month_name);
             }
              
         }
         $max_no = max($monthly_consumption_count_array);
         $max = round(( $max_no + 10/2 ) / 10 ) * 10;

         $monthly_consumption_data_array = array(
            'months' => $month_name_array,
            'consumption_count_data' => $monthly_consumption_count_array,
            'max' => $max
         );
    return $monthly_consumption_data_array;

    }

}

