<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    //

    public function customer(){

        // return $this->hasOne('App\Payment');
        return $this->belongsTo(Customer::class);
    }
}