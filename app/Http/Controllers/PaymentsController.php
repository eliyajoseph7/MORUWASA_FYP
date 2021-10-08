<?php

namespace App\Http\Controllers;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentsController extends Controller
{
    //
    public function index(){

        $pay = Payment::all();

        return view('customers', ['pay' => $pay]);
    }

}
