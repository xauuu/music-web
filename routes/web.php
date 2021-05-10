<?php

use App\Http\Controllers\AlbumController;
use App\Http\Controllers\ImageUploadController;
use App\Http\Controllers\SongController;
use Illuminate\Support\Facades\Route;

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
    return view('admin');
});
Route::get('/dashboard', function () {
    return view('admin');
});
Route::get('add-album', [AlbumController::class, 'add_album']);
Route::post('save-album', [AlbumController::class, 'save_album']);
Route::get('all-album', [AlbumController::class, 'all_album']);

Route::get('add-song', [SongController::class, 'add_song']);
Route::post('save-song', [SongController::class, 'save_song']);
Route::get('all-song', [SongController::class, 'all_song']);
