<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Album\StoreRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Helpers\TextHelper;
use App\Helpers\Settings;
use App\Helpers\ImageAlbumHelper;
use App\Models\Album;
use File;
use Image;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $albums = Album::orderBy('created_at', 'desc')->paginate(Settings::getValue("admin_items_per_page"));
        return view('pages/admin/albums/manage', compact('albums'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('pages/admin/albums/update');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        if (!Auth::user()->is_root) {
            return redirect()->back()->with('status', 'access denied!');              
        }

        if ($request->validated()) {

            $album = $request->all();

            if ($request->hasFile('image')) {
                
                $requestImage = $request->file('image');
                $newImageName = TextHelper::buildAlbumImageName($album['title'], $requestImage->getClientOriginalExtension());
                ImageAlbumHelper::storeImage($requestImage, $album['title'], $newImageName);  

                $album['image'] = $newImageName;
            } else {
                return redirect()->back()->with('status', 'Select image!'); 
            }

            Album::create($album);
            
            return redirect()->route('albums.index')->with('info', 'Album has been added!'); 
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function show(Album $album)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function edit(Album $album)
    {
        return view('pages/admin/albums/update', compact('album')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Album $album)
    {
        if (!Auth::user()->is_root) {
            return redirect()->back()->with('status', 'access denied!');              
        }

        if ($request->hasFile('image')) {

            if($album->image) {
                ImageAlbumHelper::removeImagesFromStorage('', $album->image);
            }

            $requestImage = $request->file('image');
            $newImageName = TextHelper::buildAlbumImageName($album->title, $requestImage->getClientOriginalExtension());
            ImageAlbumHelper::storeImage($requestImage, $album->title, $newImageName); // возможно не нужен album->title

            $album->image = $newImageName;
        }

        if (empty($album->image)) {
            return redirect()->back()->with('status', 'Select image!'); 
        }

        $album->description = $request->description;
        $album->update();

        return redirect()->route('albums.edit', compact('album'))->with('info', 'Album has been updated!'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function destroy(Album $album)
    {
        if (!Auth::user()->is_root) {
            return redirect()->back()->with('status', 'access denied!');              
        }

        if($album->image) {
            ImageAlbumHelper::removeImagesFromStorage('', $album->image);
            File::deleteDirectory(Storage::path('photos/' . TextHelper::transliterate($album->title) . '/'));
        }

        $album->delete();

        return redirect()->back()->with('info', 'Запись успешно удалена'); 

    }  
}
