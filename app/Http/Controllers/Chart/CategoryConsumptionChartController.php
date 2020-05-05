<?php

namespace App\Http\Controllers\Chart;
use Illuminate\Support\Facades\DB;

use App\Customer;
use App\Usage;
use App\Consumption;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryConsumptionChartController extends Controller
{
    //
    public function getAllConsumptions(){
        $category_array = array();
        $customers_categories = Customer::distinct('category')->orderBy('category', 'ASC')->pluck('category');
        $customers_categories = json_decode($customers_categories);
        if (! empty($customers_categories)) {
           
            foreach ($customers_categories as $categories) {
                $category_name = $categories;
                $category_array [] = $category_name;
                 
            }
        }
        return $category_array;
    }

    public function getMonthlyConsumptionCount($category){
        
        $monthly_consumption_count = Usage::join('consumptions', 'usages.id', '=', 'consumptions.id')
                                            ->join('customers', 'usages.customer_id', '=', 'customers.id')
                                            
                                            ->whereMonth('consumptions.created_at', date('m'))
                                            ->where('customers.category', $category)
                                            ->get()->sum('consumption');
        
        // $monthly_consumption_count = Consumption::whereMonth('created_at', $month)->get()->sum('consumption');
        return($monthly_consumption_count);
    }

    public function getMonthlyConsumptionData(){
        $monthly_consumption_count_array = array();
         $category_array = $this->getAllConsumptions();
         $category_name_array = array();

         if(! empty($category_array)){
             foreach($category_array as $category){
                 $monthly_consumptions_count = $this->getMonthlyConsumptionCount($category);
                 array_push($monthly_consumption_count_array, $monthly_consumptions_count);
                 array_push($category_name_array, $category);
             }
              
         }
         $max_no = max($monthly_consumption_count_array);
         $max = round(( $max_no + 10/2 ) / 10 ) * 10;

         $monthly_consumption_data_array = array(
            'category' => $category_name_array,
            'consumption_count_data' => $monthly_consumption_count_array,
            'max' => $max
         );
    return $monthly_consumption_data_array;

    }
}
