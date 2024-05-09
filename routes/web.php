<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\VizitController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\Admin\AlbumController;
use App\Http\Controllers\Admin\PhotoController;

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

Route::get('/', function () {
    return view('home');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');



// if (
//     config('site.open') == false
//     && config('app.env') != 'local'
//     && !empty($_SERVER['REMOTE_ADDR']) 
//     && $_SERVER['REMOTE_ADDR'] != "176.116.141.115"
// ) {
//     Route::get('/{any?}', [HomeController::class, 'closeSite'])->name('maintenance');
// }

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/contact-us', [MessageController::class, 'create'])->name('contact-us');
Route::get('/create-message', [MessageController::class, 'create'])->name('create-message');
Route::post('/store-message', [MessageController::class, 'store'])->name('store-message');
Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery');
Route::get('/album/{id}', [GalleryController::class, 'show'])->name('album');
Route::get('/photo/{id}', [GalleryController::class, 'showPhoto'])->name('photo');


Route::middleware('auth')->group(function () {

    Route::get('/profile/{id}', [ProfileController::class, 'show'])->name('profile');

    Route::get('/messages', [MessageController::class, 'index'])->name('messages');
    Route::get('/clear-messages', [MessageController::class, 'clear'])->name('clear-messages');
    Route::get('/message/{id}', [MessageController::class, 'show'])->name('message');

    Route::get('/vizits', [VizitController::class, 'index'])->name('vizits');
    Route::get('/vizit/{id}', [VizitController::class, 'show'])->name('vizit');
    Route::get('/clear-vizits', [VizitController::class, 'clear'])->name('clear-vizits');

    Route::resources([
        'settings' => SettingController::class, 
        'albums'   => AlbumController::class,
        'photos'   => PhotoController::class
    ]);
});























require __DIR__.'/auth.php';
