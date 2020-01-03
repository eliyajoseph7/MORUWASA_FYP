<?php

namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Meter extends Model
{
    //
    public function customer(){

        return $this->belongsTo(Customer::class);
    }

}
