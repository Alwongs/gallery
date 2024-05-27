<?php

namespace App\Helpers;

class Breadcrumbs
{
    public static function buildBreadcrumbs($page, $title = "", $id = 0)
    {
        switch ($page) {

            case 'albums':
                return [
                    ['route' => '', 'value' => __("gallery.albums")],
                ];

            case 'album':
                return [
                    ['route' => route('gallery'), 'value' => __("gallery.albums")],
                    ['route' => '', 'value' => $title]
                ];

            case 'photo':
                return[
                    ['route' => route('gallery'), 'value' => __("gallery.albums")],
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