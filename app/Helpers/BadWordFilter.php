<?php

namespace App\Helpers;

class BadWordFilter {

    public const WORDS = [
        "нихуя",
        "охуительно"
    ];

    public static function clear($comment)
    {
        $filteredComment = ObsceneCensorRus::getFiltered($comment);

        $array = explode(" ", $filteredComment);

        foreach($array as &$item) {
            if (in_array($item, self::WORDS)) {
                $item = str_repeat("*", mb_strlen($item));
            }
        }

        return implode(" ", $array);
    }
}
