<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Storage;
use App\Helpers\TextHelper;
use File;
use Image;

abstract class ImageHelper
{
    // RESOLUTIONS
    const RES_NORMAL = [600, 400];
    const RES_MIDDLE = [450, 300];
    const RES_SMALL  = [240, 160];
    const RES_TINY   = [120, 80];
    const RES_ICON   = [60, 40];

    // Resolutions methods
    public static function storeResizedImages($image, $newImageName)
    {
        self::makeMiddle($image, $newImageName);
        self::makeIcon($image, $newImageName);
    }

    private static function makeMiddle($image, $newImageName)
    {
        $image->fit(self::RES_MIDDLE[0], self::RES_MIDDLE[1]);
        self::storeResized($image, static::PATH_MIDDLE, $newImageName);
    }  

    private static function makeIcon($image, $newImageName)
    {
        $image->fit(self::RES_ICON[0], self::RES_ICON[1]);
        self::storeResized($image, static::PATH_ICON, $newImageName);
    }  

    private static function storeResized($image, $path, $newImageName)
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