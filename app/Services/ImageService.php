<?php

namespace App\Services;

class ImageService
{
    public function uploadImage($file, $path): string
    {
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->storeAs('public/'.$path, $filename);
        return asset('storage/'.$path.'/'.$filename);
    }
}
