<?php

namespace App\Http\Controllers\actions;

use App\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CustomerTrashController extends Controller
{
    public function index()
    {
        if(auth()->user()->permission == 'superuser'){
            $customers = Customer::where('deleted_at', '!=', null)->withTrashed()->get();
            return view('actionToCustomers.customerTrash', compact('customers'));
        }
        else{
            return redirect()->back();
        }
    }


    public function restore($id){
        Customer::where('id', $id)->withTrashed()->restore();
        
        return redirect('/customer_trash')->with('info', 'customer restored successfully');
    }

    public function permanentDelete($id){
        Customer::where('id', $id)->withTrashed()->forceDelete();
        return redirect('/customer_trash')->with('info', 'customer permantely deleted successfully');
    }

    public function restoreAll(){
        Customer::where('deleted_at', '!=', null)->withTrashed()->restore();
        return redirect('/customer_trash')->with('info', 'customers restored successfully');
    }

    public function deleteAll(){
        Customer::where('deleted_at', '!=', null)->withTrashed()->forceDelete();
        return redirect('/customer_trash')->with('info', 'customers permantely deleted successfully');
    }
}
