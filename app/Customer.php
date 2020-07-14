<?php

namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'street', 'gender', 'phone', 'category', 'user_id'
    ];



    public function payments(){

        // return $this->hasOne('App\Payment');
        return $this->hasMany(Payment::class);
    }

    public function meter(){

        return $this->hasOne(Meter::class);
    }

    public function usage(){

        return $this->hasMany(Usage::class);
    }

    public function user(){

        return $this->belongsTo(User::class);
    }
}
