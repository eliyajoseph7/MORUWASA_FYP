<?php

namespace App\Http\Controllers\Invoice;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use GuzzleHttp\Client;

class BillComplaintsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $client = new Client();
        $response = $client->get('http://tranquil-escarpment-98859.herokuapp.com/complaints');
        
        $resp = json_decode($response->getBody());
// return $resp;
        return view('actionToCustomers\viewComplaints', compact('resp'));
    }

}
