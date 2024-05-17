<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Storage;
use App\Helpers\TextHelper;
use File;

abstract class ImageHelper
{
    const RESOLUTIONS = [
        "previews/" => [450, 300],
        "icons/" => [60, 40],
    ];

    // call diff funcs to make some thumbnails
    public static function makeAndStoreThumbnails($image, $albumDirName = '', $newImageName)
    {
        foreach (self::RESOLUTIONS as $dirName => $res) {

            if (empty($albumDirName)) {
                $path = static::DIR_OBJECT . $dirName;
            } else {
                $path = static::DIR_OBJECT . $albumDirName . '/' . $dirName;
            }

            $image->fit($res[0], $res[1]);
            self::storeResized($image, $path, $newImageName);
        }
    }

    public static function storeResized($image, $path, $newImageName)
    {
        if (!File::exists(Storage::path($path))){
            File::makeDirectory(Storage::path($path));
        }
        $image->save(Storage::path($path) . $newImageName);
    }


    public static function removeImagesFromStorage($albumTitle = '', $imageName)
    {
        $thumbnailDirs = array_keys(self::RESOLUTIONS);
        array_push($thumbnailDirs, "originals");

        foreach ($thumbnailDirs as $thumbnailDir) {

            $albumDirName = !empty($albumTitle) ? $albumTitle . '/' : '';
            $path = static::DIR_OBJECT . $albumDirName . $thumbnailDir . $imageName;

            if (File::exists(Storage::path($path))) {
                Storage::delete($path);
            }
        }     
    }  

    // filename builder
    public static function buildImageName($name, $extension)
    {
        return TextHelper::transliterate($name) . '_' . date('d-m-Y_h-i-s', time()) . '_image.' . $extension;
    }
}
