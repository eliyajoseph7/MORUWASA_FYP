<?php

namespace App\Http\Controllers\Chart;
use Illuminate\Support\Facades\DB;

use App\Customer;
use App\Usage;
use App\Consuption;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryConsuptionChartController extends Controller
{
    //
    public function getAllConsuptions(){
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
        
        $monthly_consuption_count = Usage::join('consuptions', 'usages.id', '=', 'consuptions.id')
                                            ->join('customers', 'usages.customer_id', '=', 'customers.id')
                                            
                                            ->whereMonth('consuptions.created_at', date('m'))
                                            ->where('customers.category', $category)
                                            ->get()->sum('consuption');
        
        // $monthly_consuption_count = Consuption::whereMonth('created_at', $month)->get()->sum('consuption');
        return($monthly_consuption_count);
    }

    public function getMonthlyConsuptionData(){
        $monthly_consuption_count_array = array();
         $category_array = $this->getAllConsuptions();
         $category_name_array = array();

         if(! empty($category_array)){
             foreach($category_array as $category){
                 $monthly_consuptions_count = $this->getMonthlyConsumptionCount($category);
                 array_push($monthly_consuption_count_array, $monthly_consuptions_count);
                 array_push($category_name_array, $category);
             }
              
         }
         $max_no = max($monthly_consuption_count_array);
         $max = round(( $max_no + 10/2 ) / 10 ) * 10;

         $monthly_consuption_data_array = array(
            'category' => $category_name_array,
            'consuption_count_data' => $monthly_consuption_count_array,
            'max' => $max
         );
    return $monthly_consuption_data_array;

    }
}
