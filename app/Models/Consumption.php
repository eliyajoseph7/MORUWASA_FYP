<?php

namespace App\Models;
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

    protected $casts = [
        'consumption' => 'decimal:2',
    ];

    public function usage(){
        return $this->belongsTo(Usage::class);
    }
}
