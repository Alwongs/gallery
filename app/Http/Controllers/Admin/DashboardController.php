<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Middleware\RootAdminMiddleware;
use App\Models\Setting;
use App\Models\User;
use App\Models\Message;
use App\Models\Album;
use App\Models\Photo;
use App\Helpers\Settings;
use App\Helpers\ImageHelper;
use App\Helpers\TextHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use File;
use Image;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(RootAdminMiddleware::class)->only(['removeAlbumsAndPhotos', 'makeNewThumbnails']);
    }

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

        // DB::statement("SET foreign_key_checks=0");
        // Album::truncate();
        // Photo::truncate();
        // DB::statement("SET foreign_key_checks=1");

        // if (File::exists(Storage::path('albums'))) {
        //     File::deleteDirectory(Storage::path('albums'));
        // }

        // if (File::exists(Storage::path('photos'))) {
        //     File::deleteDirectory(Storage::path('photos'));
        // }

        // return redirect()->route("dashboard");
    }


    public function makeNewThumbnails()
    {
        $resolution = [300, 200];
        $photos = Photo::all();

        foreach ($photos as $photo) {

            $albumTitle = TextHelper::transliterate($photo->album->title);

            $originalPath = 'photos/' . $albumTitle. '/originals/';

            if (!empty($photo->image) && File::exists(Storage::path($originalPath) . $photo->image)) {

                $imageFile = Image::make(Storage::path($originalPath) . $photo->image);
                $imageFile->fit($resolution[0], $resolution[1]);

                $thumbnailPath = 'photos/' . $albumTitle . '/previews_small/';

                ImageHelper::storeResized($imageFile, $thumbnailPath, $photo->image);
            } 
        }

        return redirect()->route('dashboard')->with('info', 'Success, thumbnails added!'); 
    }
}