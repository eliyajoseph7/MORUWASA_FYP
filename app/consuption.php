<?php

namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class consuption extends Model
{
    //
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'usage_id', 'consuption',
    ];
    protected $primaryKey = 'usage_id';

    // public $incrementing = false;

    public function usage(){
        return $this->belongsTo(Usage::class);
    }
}
