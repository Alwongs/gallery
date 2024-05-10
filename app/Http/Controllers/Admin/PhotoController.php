<?php

namespace App\Http\Controllers\Admin;

use App\Functions\TextHelper;
use App\Models\Album;
use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Photo\StoreRequest;
use App\Http\Controllers\Controller;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $photos = Photo::orderBy('created_at', 'desc')->paginate(10);
        return view('pages/admin/photos/manage', compact('photos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!Auth::user()->is_root) {
            return redirect()->back()->with('status', 'access denied!'); 
        }

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
                $image = $request->file('image');
                $newImageName = TextHelper::buildAlbumImageName($photo['title'], $image->getClientOriginalExtension());
                $albumDirName = TextHelper::transliterate($album->title);
                $path = $image->storeAs('photos/'.$albumDirName, $newImageName);
                $photo['image'] = $path;
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
        if (!Auth::user()->is_root) {
            return redirect()->back()->with('status', 'access denied!'); 
        }

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

            if($photo->image) {
                Storage::delete($photo->image);
            }

            $image = $request->file('image');
            $newImageName = TextHelper::buildAlbumImageName($request->title, $image->getClientOriginalExtension());
            $album = Album::find($photo->album_id);
            $albumDirName = TextHelper::transliterate($album->title);
            $path = $image->storeAs('photos/'.$albumDirName, $newImageName);
            $photo->image = $path;
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
        if (Auth::user()->is_root) {

            if($photo->image) {
                Storage::delete($photo->image);
            }

            $photo->delete();

            return redirect()->back()->with('info', 'Запись успешно удалена'); 

        } else {
            return redirect()->back()->with('status', 'Это не ваш пост! Не вам и удалять!');              
        }
    }
}
