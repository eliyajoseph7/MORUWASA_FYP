<?php

namespace App\Http\Controllers\Invoice;
use App\Models\WaterBill;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InvoiceController extends Controller
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
    
    public function invoice(){
        $invoice = WaterBill::join('customers', 'water_bills.customer_id', '=', 'customers.id')
                            ->whereMonth('water_bills.created_at', date('m', strtotime('-1 month')))
                            ->orderBy('water_bills.created_at', 'ASC')
                            ->get();
        // return $invoice;
        return view('invoices', compact('invoice'));
    }
}
