<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Storage;
use App\Helpers\TextHelper;
use File;
use Image;

class ImageAlbumHelper extends ImageHelper
{
    const DIR_OBJECT = "albums/";

    // public static function storeResizedImages($image, $newImageName)
    // {
    //     self::makeMiddle($image, $newImageName);
    //     self::makeIcon($image, $newImageName);
    // }

    // private static function makeMiddle($image, $newImageName)
    // {
    //     $path = self::DIR_OBJECT . self::DIR_MIDDLE;
    //     $image->fit(self::RES_MIDDLE[0], self::RES_MIDDLE[1]);
    //     self::storeResized($image, $path, $newImageName);
    // }  

    // private static function makeIcon($image, $newImageName)
    // {
    //     $path = self::DIR_OBJECT . self::DIR_ICON;
    //     $image->fit(self::RES_ICON[0], self::RES_ICON[1]);
    //     static::storeResized($image, $path, $newImageName);
    // }  
}