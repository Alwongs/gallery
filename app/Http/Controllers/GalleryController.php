<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\AlbumResource;
use App\Models\Album;
use App\Models\Photo;
use App\Models\Comment;
use App\Helpers\Breadcrumbs;
use App\Helpers\Settings;

class GalleryController extends Controller
{
    public function index()
    {
        $albums = Album::orderBy('created_at', 'asc')->paginate(Settings::getValue("site_items_per_page"));
        $breadcrumbs = Breadcrumbs::buildBreadcrumbs('albums');

        return view('pages/site/albums', compact('albums', 'breadcrumbs'));
    }

    public function show($id)
    {
        $album = new AlbumResource(Album::with('photos')->findOrFail($id)); 
        $photos = Photo::where('album_id', $id)->orderBy('created_at', 'desc')->paginate(Settings::getValue("site_items_per_page"));
        $breadcrumbs = Breadcrumbs::buildBreadcrumbs('album', $album->title);

        return view('pages/site/album', compact('album', 'photos', 'breadcrumbs'));
    }

    public function showPhoto($id)
    {
        $photo = Photo::with('album')->orderBy('created_at', 'desc')->findOrFail($id);
        $comments = Comment::where('photo_id', $id)->orderBy('created_at', 'desc')->get();
        $breadcrumbs = Breadcrumbs::buildBreadcrumbs('photo', $photo->album->title, $photo->album->id);

        return view('pages/site/photo', compact('photo', 'breadcrumbs', 'comments'));
    }
}
