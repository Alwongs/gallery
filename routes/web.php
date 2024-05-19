<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\AlbumController;
use App\Http\Controllers\Admin\PhotoController;
use App\Http\Controllers\Admin\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery');
Route::get('/album/{id}', [GalleryController::class, 'show'])->name('album');
Route::get('/photo/{id}', [GalleryController::class, 'showPhoto'])->name('photo');

Route::get('/contact-us', [MessageController::class, 'create'])->name('contact-us');
Route::post('/store-message', [MessageController::class, 'store'])->name('store-message');
Route::post('/report', [MessageController::class, 'report'])->name('report');


Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::delete('/dashboard/remove-albums', [DashboardController::class, 'removeAlbumsAndPhotos'])->name('remove-albums');
    Route::post('/dashboard/add-new-thumbnails', [DashboardController::class, 'makeNewThumbnails'])->name('add-new-thumbnails');

    Route::get('/profile/{id}', [ProfileController::class, 'show'])->name('profile');

    Route::middleware(['root'])->group(function () {
        Route::get('/messages', [MessageController::class, 'index'])->name('messages');
        Route::get('/clear-messages', [MessageController::class, 'clear'])->name('clear-messages');
        Route::get('/message/{id}', [MessageController::class, 'show'])->name('message');

        Route::resources([
            'settings' => SettingController::class, 
        ]);
    });

    Route::resources([ 
        'albums'   => AlbumController::class,
        'photos'   => PhotoController::class
    ]);
});























require __DIR__.'/auth.php';
