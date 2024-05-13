<?php

namespace App\Helpers;

class Breadcrumbs
{
    public static function buildBreadcrumbs($page, $title = "", $id = 0)
    {
        switch ($page) {

            case 'albums':
                return [
                    ['route' => '', 'value' => 'albums'],
                ];

            case 'album':
                return [
                    ['route' => route('gallery'), 'value' => 'albums'],
                    ['route' => '', 'value' => $title]
                ];

            case 'photo':
                return[
                    ['route' => route('gallery'), 'value' => 'albums'],
                    ['route' => route('album', $id), 'value' => $title]
                ];

            case 'contact_us':
                return [
                    ['route' => '', 'value' => $title]
                ];
               
            default:
                return [
                    ['route' => '', 'value' => 'default case']
                ];             
        }
    }    
}