<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

trait DeleteTrait{

    public function delete_images($image_collection){
        foreach ($image_collection as $image){
            $files = scandir($image->path);
            foreach($files as $filename){
                if(str_contains($filename, $image->basename)) unlink($image->path.$filename);
            }
            $image->delete();
        }
    }

    public function delete_image($image){
        $files = scandir($image->path);
        foreach($files as $filename){
            if(str_contains($filename, $image->basename)) unlink($image->path.$filename);
        }
        $image->delete();
    }

}
