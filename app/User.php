<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'username',
        'email',
        'password',
        'phone_number',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [];


    public function shifts(){
        return $this->belongsToMany(Shift::class, 'user_shift')->withTimestamps();;
    }

    public function drives(){
        return $this->hasMany(Drive::class, 'driver_id');
    }

    public function images(){
        return $this->morphMany(Image::class, 'imageable');
    }

    public function getFullName() {
        return $this->first_name . ' ' . $this->last_name;

    }

    public function getProfileImageAttribute(){
        $path = 'data/users/' . $this->id . '/';

        if($this->images->where('profile', 1)->count() > 0){
            return $path . $this->images()->where('profile', 1)->first()->image;
        }else{
            return 'images/person.jpg';
        }
    }

    public function getProfileThumbAttribute(){
        $path = 'data/users/' . $this->id . '/';

        if($this->images->where('profile', 1)->count() > 0){
            return $path . $this->images()->where('profile', 1)->first()->thumb;
        }else{
            return 'images/person.jpg';
        }
    }
}
