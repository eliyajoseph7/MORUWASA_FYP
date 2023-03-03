<?php

namespace App\Http\Controllers;
use Charts;
use App\Models\Customer;
use App\Models\Payment;
use App\Models\WaterBill;
use App\Models\Meter;
use App\Models\Consumption;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

         $water_consumed = Consumption::whereMonth('created_at', date('m'))->get('consumption')->sum('consumption') * 1000;


         $high_consumption_street = Consumption::join('usages', 'consumptions.id', '=', 'usages.id')
                                                ->join('customers', 'usages.customer_id', '=', 'customers.id')
                                                ->select('customers.street', DB::raw("SUM(consumptions.consumption) as units"))
                                                ->groupBy('customers.street')
                                                ->orderBy('units', 'DESC')
                                                ->first();

    return view('billshome',compact('count', 'amount','count_meter','free_meter', 'water_consumed', 'high_consumption_street'));
    }

}
