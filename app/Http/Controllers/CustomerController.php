<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use App\Customer;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    //
    public function index(){

        $customers = Customer::all();
        


        return view('customers', ['customers' => $customers]);
    }

}
