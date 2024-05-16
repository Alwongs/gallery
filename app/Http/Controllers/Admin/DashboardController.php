<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Models\User;
use App\Models\Message;
use App\Models\Album;
use App\Models\Photo;
use App\Helpers\Settings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use File;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // session(["settings" => Setting::orderBy('area', 'asc')->get()]);

        $messageCount = Message::count();
        $userCount = User::count();
        $albumCount = Album::count();
        $photoCount = Photo::count();

        session([
            'messageCount' => $messageCount,
            'userCount'    => $userCount,
            'albumCount'    => $albumCount,
            'photoCount'    => $photoCount,
        ]);

        return view('dashboard');
    }

    public function removeAlbumsAndPhotos()
    {
        DB::statement("SET foreign_key_checks=0");
        Album::truncate();
        Photo::truncate();
        DB::statement("SET foreign_key_checks=1");

        if (File::exists(Storage::path('albums'))) {
            File::deleteDirectory(Storage::path('albums'));
        }

        if (File::exists(Storage::path('photos'))) {
            File::deleteDirectory(Storage::path('photos'));
        }

        return redirect()->route("dashboard");
    }
}