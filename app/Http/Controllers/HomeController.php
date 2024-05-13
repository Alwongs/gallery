<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Helpers\VizitHelper;
use App\Helpers\Settings;
use App\Models\Setting;

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

        return view('home');
    }
}
