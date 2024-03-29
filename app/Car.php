<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $fillable = [
        'brand',
        'model',
        'license_number'
    ];

    public function drives(){
        return $this->hasMany(Drive::class, 'car_id');
    }

}
