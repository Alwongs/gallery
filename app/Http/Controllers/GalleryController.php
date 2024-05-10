<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\AlbumResource;
use App\Functions\SiteHelper;
use App\Models\Album;
use App\Models\Photo;

class GalleryController extends Controller
{
    public function index()
    {
        $albums = Album::orderBy('created_at', 'desc')->paginate(9);
        return view('pages/site/albums', compact('albums'));
    }

    public function show($id)
    {
        $album = new AlbumResource(Album::with('photos')->findOrFail($id));       
        return view('pages/site/album', compact('album'));
    }

    public function showPhoto($id)
    {
        $photo = Photo::orderBy('created_at', 'desc')->findOrFail($id);
        return view('pages/site/photo', compact('photo'));
    }
}
