<?php

namespace App;

class Image extends BaseModel
{
    protected $fillable = [
        'basename',
        'image',
        'thumb',
        'path',
        'profile',
    ];

    public function imageable(){
        return $this->morphTo('imageable');
    }

    public function get_type($type = 'basename'){
        return $this->path . $this->$type;
    }

}
