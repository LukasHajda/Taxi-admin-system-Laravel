<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Drive extends Model
{
    protected $fillable = [
        'place_from',
        'place_to',
        'phone_number',
        'salary',
        'distance',
        'driver_id',
        'shift_id',
        'car_id'
    ];

    public function car() {
        return $this->belongsTo('App\Car', 'car_id');
    }

    public function driver() {
        return $this->belongsTo('App\User', 'driver_id');
    }

    public function shift() {
        return $this->belongsTo('App\Shift', 'shift_id');
    }
}
