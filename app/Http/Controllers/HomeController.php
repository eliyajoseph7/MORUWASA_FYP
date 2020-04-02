<?php

namespace App\Http\Controllers;
use Charts;
use App\Customer;
use App\Payment;
use App\WaterBill;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $customers = Customer::all();
        $count = count($customers);

         $amount = WaterBill::whereMonth('created_at', date('03'))->get()->sum('amount');
    return view('billshome',compact('count', 'amount'));
    }

}
