<?php

namespace App\Http\Controllers\Users;

use App\Image;
use App\Traits\DeleteTrait;

class ImagesController extends AdminController
{
    use DeleteTrait;

    public function delete($id){
        $image = Image::findOrFail($id);

        $this->delete_image($image);

        return back();
    }
}
