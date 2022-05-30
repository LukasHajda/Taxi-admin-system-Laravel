<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shift extends Model
{
    protected $fillable = [
        'started_at',
    ];

    public function users() {
        return $this->belongsToMany(User::class, 'user_shift')->withTimestamps();;
    }

    public function drives() {
        return $this->hasMany(Drive::class, 'shift_id');
    }

}
