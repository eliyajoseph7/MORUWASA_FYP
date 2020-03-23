<?php

namespace App\Http\Controllers\Invoice;
use App\WaterBill;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InvoiceController extends Controller
{
    //
    public function invoice(){
        $invoice = WaterBill::whereMonth('created_at', date('m'))->orderBy('created_at', 'ASC')->get();
        // return $invoice;
        return view('invoices', compact('invoice'));
    }
}
