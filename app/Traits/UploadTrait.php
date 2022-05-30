<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

trait UploadTrait{

    public function upload_image(Request $request, $file_input, $dir, Model $model, $column = null){
        $config = $this->settings($dir);

        $file = $request->hasFile($file_input) ? $request->file($file_input) : null;
        if(!isset($file)) return;

        $path = $file->store($dir . '/' . $model->id);

        $basename = basename($path); // Image name
        $dir_name = public_path('data/' . $dir . '/' . $model->id . '/');

        $data = [
            'basename' => $basename,
            'path' => 'data/' . $dir . '/' . $model->id . '/',
        ];
        if(isset($column)) $data[$column] = 1;

        // Create Images according to config
        foreach ($config as $type => $settings){
            $type_name = $type . '_' . $basename;

            $img = Image::make($dir_name . $basename); // Open image

            $img = $this->transform($img, $settings);

            $img->save($dir_name . $type_name); // Save image

            $data[$type] = $type . '_' . $basename;
        }

        // Create or update images of model
        if(isset($column) && $model->images()->where($column, 1)->count() > 0){
            $image = $model->images()->where($column, 1)->first();
            $files = scandir($image->path);
            foreach($files as $filename){
                if(str_contains($filename, $image->basename)) unlink($image->path.$filename);
            }
            $image->update($data);
        }else{
            $model->images()->create($data);
        }

    }

    /**
     * Build settings for $key from config/images.php
     * @param $key string
     * @return array
     */
    private function settings($key){
        $images = config('images');
        $default = $images['_default'];

        if(!array_key_exists($key, $images)) return $default; // First rule
        $settings = $images[$key];

        foreach ($settings as $type => $type_settings){
            if($type_settings === true){ // Third rule
                $settings[$type] = $default[$type];
            }else{
                if(!array_key_exists('width', $type_settings)) $settings[$type]['width'] = $default[$type]['width']; // Fourth rule
                if(!array_key_exists('height', $type_settings)) $settings[$type]['height'] = $default[$type]['height']; // Fourth rule
                if(!array_key_exists('transformation', $type_settings)) $settings[$type]['transformation'] = false; // Fifth rule
            }
        }
        return $settings;
    }

    /**
     * Transform $image according to $settings
     * @param $image \Intervention\Image\Image
     * @param $settings array
     * @return \Intervention\Image\Image
     */
    private function transform($image, $settings){
        switch($settings['transformation']){
            case 'crop':
                $image->resize($settings['width'], $settings['height'],function ($constraint){
                    $constraint->aspectRatio();
                })->resizeCanvas($settings['width'], $settings['height'], 'center', false, 'ffffff');
                //$image->crop($settings['width'], $settings['height']);
                break;
            case 'scale':
                $image->fit($settings['width'], $settings['height']);
                break;
        }
        return $image;
    }

}
