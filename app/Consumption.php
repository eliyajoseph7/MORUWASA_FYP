<?php

namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Consumption extends Model
{
    //
    //
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'consumption',
    ];

    public function usage(){
        return $this->belongsTo(Usage::class);
    }
}
