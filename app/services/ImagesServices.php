<?php

namespace App\Services;

class ImagesServices
{
    public function uploadImage($file, $path)
    {
        $image_name = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('images/' . $path), $image_name);
        return $image_name;
    }
}
