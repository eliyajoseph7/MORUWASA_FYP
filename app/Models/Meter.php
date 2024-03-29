<?php

namespace App\Models;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Meter extends Model
{
    //
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'customer_id', 'type', 'meter_no',
    ];

    public function customer(){

        return $this->belongsTo(Customer::class);
    }

    public function waterbill(){

        return $this->hasMany(WaterBill::class, 'customer_id');
    }
}
