<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = ['code', 'area', 'category', 'type', 'value'];

    public static function getSettingsKeyObject()
    {
        $settings = self::all();
        $newArray = [];
        foreach ($settings as $item) {
            $newArray[$item->code] = $item;
        }
        return $newArray;
    }
}
