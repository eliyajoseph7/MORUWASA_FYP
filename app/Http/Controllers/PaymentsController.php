<?php

namespace App\Http\Controllers;
use App\Payment;
use Illuminate\Http\Request;

class PaymentsController extends Controller
{
    //
    public function index(){

        $pay = Payment::all();

        return view('customers', ['pay' => $pay]);
    }

}
