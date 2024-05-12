<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\AlbumResource;
use App\Functions\SiteHelper;
use App\Models\Album;
use App\Models\Photo;
use App\Functions\Breadcrumbs;

class GalleryController extends Controller
{
    public function index()
    {
        $albums = Album::orderBy('created_at', 'desc')->paginate(9);
        $breadcrumbs = Breadcrumbs::buildBreadcrumps('albums');

        return view('pages/site/albums', compact('albums', 'breadcrumbs'));
    }

    public function show($id)
    {
        $album = new AlbumResource(Album::with('photos')->findOrFail($id)); 
        $photos = Photo::where('album_id', $id)->paginate(9);
        $breadcrumbs = Breadcrumbs::buildBreadcrumps('album', $album->title);

        return view('pages/site/album', compact('album', 'photos', 'breadcrumbs'));
    }

    public function showPhoto($id)
    {
        $photo = Photo::with('album')->orderBy('created_at', 'desc')->findOrFail($id);
        $breadcrumbs = Breadcrumbs::buildBreadcrumps('photo', $photo->album->title, $photo->album->id);

        return view('pages/site/photo', compact('photo', 'breadcrumbs'));
    }
}
