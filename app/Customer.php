<?php

namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'street', 'gender', 'phone', 'metre_no',
    ];



    public function payments(){

        // return $this->hasOne('App\Payment');
        return $this->hasMany(Payment::class);
    }
}
