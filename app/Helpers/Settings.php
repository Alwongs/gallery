<?php

namespace App\Helpers;

use App\Models\Setting;

class Settings
{
    public static function getValue($code)
    {
        if (empty(session("settings"))) {
            session(["settings" => Setting::getSettingsKeyObject()]);
        }
        return session("settings.$code.value");
    }


    public static function getType($code)
    {
        if (empty(session("settings"))) {
            session(["settings" => Setting::getSettingsKeyObject()]);
        }
        return session("settings.$code.type");
    }
}