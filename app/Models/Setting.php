<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = ['code', 'area', 'category', 'type', 'value'];

    // create new array: key => object
    public static function getSettingsKeyObject()
    {
        $settings = self::all();
        $settingsKeyObj = [];
        foreach ($settings as $item) {
            $settingsKeyObj[$item->code] = $item;
        }
        return $settingsKeyObj;
    }
}
