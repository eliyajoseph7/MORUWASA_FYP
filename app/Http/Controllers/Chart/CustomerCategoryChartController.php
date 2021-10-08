<?php

namespace App\Http\Controllers\Chart;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CustomerCategoryChartController extends Controller
{
    //
    public function getAllCategories(){
        $category_array = array();
        $customers_categories = Customer::orderBy('category', 'ASC')->distinct()->pluck('category');
        $customers_categories = json_decode($customers_categories);

        foreach($customers_categories as $customers_categories){
            $category_name = $customers_categories;
            $category_array [] = $category_name;
        }
        return $category_array;
    }

    public function getAllCustomerCategoryCount($category){
        $customers_categories_count = Customer::where('category', $category)->get()->count();

        return $customers_categories_count;
    }

    public function getTotalCategoryData(){
         $category_count_array = array();
         $category_array = $this->getAllCategories();
         $category_name_array = array();

         if(! empty($category_array)){
             foreach($category_array as $category){
                 $customers_count = $this->getAllCustomerCategoryCount($category);
                 array_push($category_count_array, $customers_count);
                 array_push($category_name_array, $category);
             }
              
         }

         $total_customer_data_array = array(
            'category' => $category_name_array,
            'customer_count_data' => $category_count_array
         );

         return $total_customer_data_array;
    }
}
