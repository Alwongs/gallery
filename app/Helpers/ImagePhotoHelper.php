<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Storage;
use Image;

class ImagePhotoHelper extends ImageHelper
{
    const DIR_OBJECT = "photos/";

    public static function storeImage($image, $albumTitle, $newImageName)
    {
        $image->storeAs(self::DIR_OBJECT . $albumTitle . '/originals', $newImageName);

        $imageFile = Image::make(Storage::path(self::DIR_OBJECT . $albumTitle . '/originals/') . $newImageName);
        parent::makeAndStoreThumbnails($imageFile, $albumTitle, $newImageName); 
    }
}