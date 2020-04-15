<?php

namespace App\Http\Controllers;
use App\Consuption;
use Illuminate\Http\Request;

class ChartDataController extends Controller
{
    //
    public function getAllMonths()
    {
        $month_array = array();
        $consuptions_dates = Consuption::pluck('created_at');
        $consuptions_dates = json_decode($consuptions_dates);
return $consuptions_dates;
        if (! empty($consuptions_dates)) {
            foreach ($consuptions_dates as $unformatted_date) {
                $date = new \DateTime($unformatted_date->date);
                $month_no = $date->format('m');
                $month_name = $date->format('M');
                $month_array [$month_no] = $month_name;
            }
        }
                            
        return $month_array;
    }    

    public function getMonthlyConsumptionCount($month){
        $monthly_consuption_count = Consuption::whereMonth('created_at', $month)->get()->sum('consuption');
        return($monthly_consuption_count);
    }

    public function getMonthlyConsuptionData(){
        $monthly_consuption_count_array = array();
         $month_array = $this->getAllMonths();
         $month_name_array = array();

         if(! empty($month_array)){
             foreach($month_array as $month_no => $month_name){
                 $monthly_consuptions_count = $this->getMonthlyConsumptionCount($month_no);
                 array_push($monthly_consuption_count_array, $monthly_consuptions_count);
                 array_push($month_name_array, $month_name);
             }
              
         }
         $max_no = max($monthly_consuption_count_array);
         $max = round(( $max_no + 10/2 ) / 10 ) * 10;

         $monthly_consuption_data_array = array(
            'months' => $month_name_array,
            'consuption_count_data' => $monthly_consuption_count_array,
            'max' => $max
         );
    return $monthly_consuption_data_array;

    }

}
