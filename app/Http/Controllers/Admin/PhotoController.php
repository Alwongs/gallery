<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Photo\StoreRequest;
use App\Http\Controllers\Controller;
use App\Http\Middleware\RootAdminMiddleware;
use App\Helpers\ImagePhotoHelper;
use App\Helpers\TextHelper;
use App\Helpers\Settings;
use App\Models\Album;
use App\Models\Photo;
use File;
use Image;

class PhotoController extends Controller
{
    public function __construct()
    {
        $this->middleware(RootAdminMiddleware::class)->only(['store', 'update', 'destroy']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $photos = Photo::orderBy('title', 'asc')->paginate(Settings::getValue("admin_items_per_page"));
        return view('pages/admin/photos/manage', compact('photos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $albums = Album::all();

        if (count($albums) == 0) {
            return redirect()->route('albums.create')->with('status', 'Create at least one album!'); 
        }

        return view('pages/admin/photos/update', compact('albums'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        if ($request->validated()) {

            $photo = $request->all();
            $album = Album::find($photo['album_id']);

            if ($request->hasFile('image')) {

                $requestImage = $request->file('image');
                $newImageName = ImagePhotoHelper::buildImageName($photo['title'], $requestImage->getClientOriginalExtension());
                ImagePhotoHelper::storeImage($requestImage, TextHelper::transliterate($album->title), $newImageName);                 

                $photo['image'] = $newImageName;

            } else {
                return redirect()->back()->with('status', 'Select image!'); 
            }

            Photo::create($photo);
            
            return redirect()->route('photos.index')->with('info', 'Photo has been added!'); 
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function show(Photo $photo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function edit(Photo $photo)
    {
        $albums = Album::all();

        return view('pages/admin/photos/update', compact('albums', 'photo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Photo $photo)
    {
        if ($request->hasFile('image')) {

            $album = Album::find($photo->album_id);
            $albumDirName = TextHelper::transliterate($album->title);

            if($photo->image) {
                ImagePhotoHelper::removeImagesFromStorage($albumDirName, $photo->image);
            }

            $requestImage = $request->file('image');
            $newImageName = ImagePhotoHelper::buildImageName($photo->title, $requestImage->getClientOriginalExtension());
            ImagePhotoHelper::storeImage($requestImage, TextHelper::transliterate($album->title), $newImageName);  

            $photo->image = $newImageName;
        }

        if (empty($photo->image)) {
            return redirect()->back()->with('status', 'Select image!'); 
        }

        $photo->album_id = $request->album_id;
        $photo->title = $request->title;
        $photo->description = $request->description;
        $photo->update();

        return redirect()->route('photos.edit', compact('photo'))->with('info', 'Photo has been updated!'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Photo $photo)
    {
        if($photo->image) {
            ImagePhotoHelper::removeImagesFromStorage(TextHelper::transliterate($photo->album->title), $photo->image);
        }
        $photo->delete();

        return redirect()->back()->with('info', 'Запись успешно удалена'); 
    }
}
