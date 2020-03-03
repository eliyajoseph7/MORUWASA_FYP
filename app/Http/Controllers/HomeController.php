<?php

namespace App\Http\Controllers;
use Charts;
use App\Customer;
use App\Payment;
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

        $chart = Charts::create('line', 'highcharts')
                        ->title('My nice chart')
                        ->labels(['First', 'Second', 'Third'])
                        ->values([5,10,20])
                        ->dimensions(0,400);

        $chart1 = Charts::database($customers,'donut', 'morris')
                        ->title(' customer category')
                        ->width( 0 )
                        ->groupBy('category')
                        ->colors(['#ff0000', '#00ff00', '#0000ff', '#ff00ff', '#00f0ff'])
                        ->responsive(true);
    return view('billshome',['chart' => $chart,'count' => $count, 'chart1' => $chart1]);
    }

}
