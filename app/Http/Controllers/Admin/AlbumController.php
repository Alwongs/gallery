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
        if ($request->validated()) {

            $album = $request->all();

            if ($request->hasFile('image')) {
                
                $image = $request->file('image');
                $newImageName = ImageAlbumHelper::buildImageName($album['title'], $image->getClientOriginalExtension());
                $image->storeAs('albums/originals', $newImageName);
                $album['image'] = $newImageName;

                    //Создаем миниатюры изображения и сохраняем их
                $thumbnail = Image::make(Storage::path('albums/originals/') . $newImageName);
                ImageAlbumHelper::storeResizedImages($thumbnail, '', $newImageName);

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
        if ($request->hasFile('image')) {

            if($album->image) {
                Storage::delete($album->image);
            }

            $image = $request->file('image');
            $newImageName = TextHelper::buildAlbumImageName($album->title, $image->getClientOriginalExtension());
            $path = $image->storeAs('albums', $newImageName);
            $album->image = $path;
        }

        if (empty($album->image)) {
            return redirect()->back()->with('status', 'Select image!'); 
        }

        $album->title = $request->title;
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
        if (Auth::user()->is_root) {

            if($album->image) {

                foreach (['icons/', 'previews/', 'originals/'] as $item) {

                    $path = 'albums/' . $item . $album->image;

                    if (File::exists(Storage::path($path))) {
                        Storage::delete($path);
                    }
                }

                File::deleteDirectory(Storage::path('photos/' . TextHelper::transliterate($album->title) . '/'));
            }

            $album->delete();

            return redirect()->back()->with('info', 'Запись успешно удалена'); 
        } else {
            return redirect()->back()->with('status', 'Это не ваш пост! Не вам и удалять!');              
        }
    }  
}
