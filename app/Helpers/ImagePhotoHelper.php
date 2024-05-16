<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Storage;
use App\Helpers\TextHelper;
use File;
use Image;

class ImagePhotoHelper extends ImageHelper
{
    const DIR_OBJECT = "photos/";

    // public static function storeResizedImages($image, $albumDirName, $newImageName)
    // {
    //     self::makeMiddle($image, $albumDirName, $newImageName);
    //     self::makeIcon($image, $albumDirName, $newImageName);
    // }

    // private static function makeMiddle($image, $albumDirName, $newImageName)
    // {
    //     $path = self::DIR_OBJECT . $albumDirName . '/' . self::DIR_MIDDLE;
    //     $image->fit(self::RES_MIDDLE[0], self::RES_MIDDLE[1]);
    //     self::storeResized($image, $path, $newImageName);
    // }  

    // private static function makeIcon($image, $albumDirName, $newImageName)
    // {
    //     $path = self::DIR_OBJECT . $albumDirName . '/' . self::DIR_ICON;
    //     $image->fit(self::RES_ICON[0], self::RES_ICON[1]);
    //     self::storeResized($image, $path, $newImageName);
    // }    
}