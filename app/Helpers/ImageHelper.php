<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Storage;
use App\Helpers\TextHelper;
use File;
use Image;

abstract class ImageHelper
{
    const DIR_MIDDLE = "previews/";
    const DIR_ICON = "icons/";
    
    // RESOLUTIONS
    const RES_NORMAL = [600, 400];
    const RES_MIDDLE = [450, 300];
    const RES_SMALL  = [240, 160];
    const RES_TINY   = [120, 80];
    const RES_ICON   = [60, 40];

    public static function storeResizedImages($image, $albumDirName = '', $newImageName)
    {
        self::makeMiddle($image, $albumDirName, $newImageName);
        self::makeIcon($image, $albumDirName, $newImageName);
    }

    private static function makeMiddle($image, $albumDirName = '', $newImageName)
    {
        if (empty($albumDirName)) {
            $path = static::DIR_OBJECT . self::DIR_MIDDLE;
        } else {
            $path = static::DIR_OBJECT . $albumDirName . '/' . self::DIR_MIDDLE;
        }

        $image->fit(self::RES_MIDDLE[0], self::RES_MIDDLE[1]);
        self::storeResized($image, $path, $newImageName);
    }  

    private static function makeIcon($image, $albumDirName = '', $newImageName)
    {
        if (empty($albumDirName)) {
            $path = static::DIR_OBJECT . self::DIR_ICON;
        } else {
            $path = static::DIR_OBJECT . $albumDirName . '/' . self::DIR_ICON;
        }

        $image->fit(self::RES_ICON[0], self::RES_ICON[1]);
        self::storeResized($image, $path, $newImageName);
    }  


    public static function storeResized($image, $path, $newImageName)
    {
        if (!File::exists(Storage::path($path))){
            File::makeDirectory(Storage::path($path));
        }
        $image->save(Storage::path($path) . $newImageName);
    }



    // file name builders
    public static function buildImageName($name, $extension)
    {
        return TextHelper::transliterate($name) . '_' . date('d-m-Y_h-i-s', time()) . '_image.' . $extension;
    }
}