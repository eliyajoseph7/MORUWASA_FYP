<?php

namespace App\Models;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Usage extends Model
{
    //
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'customer_id',
    ];
    public function customer(){
        return $this->belongsTo(Customer::class);
    }

    public function consumption(){
        return $this->hasOne(Consumption::class);
    }
}
