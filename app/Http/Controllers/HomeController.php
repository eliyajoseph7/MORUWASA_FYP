<?php

namespace App\Http\Controllers;
use Charts;
use App\Customer;
use App\Payment;
use App\WaterBill;
use App\Meter;
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

        $meters = Meter::all();
        $count_meter = count($meters);

        $free_meter = Meter::where('customer_id', null)->get()->count();

         $amount = WaterBill::whereMonth('created_at', date('m', strtotime('-1 month')))->get()->sum('amount');
    return view('billshome',compact('count', 'amount','count_meter','free_meter'));
    }

}
