<?php

namespace App\Http\Controllers;

use App\Helpers\VizitHelper;
use App\Helpers\Settings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Setting;
use App\Models\Photo;
use Illuminate\Support\Facades\App;

class HomeController extends Controller
{
    public function index()
    {
        if (empty(session("settings"))) {
            session(["settings" => Setting::getSettingsKeyObject()]);
        }

        if (session("settings.is_site_open.value") == 'N') {
            return view('maintenance');
        }

        $photos = Photo::take(6)->get();

        return view('home', compact('photos'));
    }

    public function changeLocale($locale)
    {
        session(['locale' => $locale]);
        App::setLocale($locale);
        return redirect()->back();
    }
}
