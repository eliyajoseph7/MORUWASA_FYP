<?php

namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class WaterBill extends Model
{
    //
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'customer_id', 'units', 'amount', 'name',
    ];
    
    public function customer(){
        return $this->belongsTo(Customer::class);
    }

    public function meter(){
        return $this->belongsTo(Meter::class, 'customer_id');
    }
}
