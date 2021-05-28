<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\Api\UserController;
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
    AuthLogin();
    return view('admin');
});
Route::get('/dashboard', function () {
    AuthLogin();
    return view('admin');
});

Route::get('download', [AdminController::class, 'download']);

Route::get('register', [UserController::class, 'register']);
Route::post('check-register', [UserController::class, 'check_register']);

Route::get('login', [AdminController::class, 'login']);
Route::post('check-login', [AdminController::class, 'check_login']);

Route::get('user', [AdminController::class, 'show']);

Route::get('add-album', [AlbumController::class, 'create']);
Route::post('save-album', [AlbumController::class, 'store']);
Route::get('all-album', [AlbumController::class, 'show']);
Route::get('edit-album/{id}', [AlbumController::class, 'edit']);
Route::post('update-album/{id}', [AlbumController::class, 'update']);
Route::get('destroy-album/{id}', [AlbumController::class, 'destroy']);

Route::get('add-song', [SongController::class, 'create']);
Route::post('save-song', [SongController::class, 'store']);
Route::get('all-song', [SongController::class, 'show']);
Route::get('edit-song/{id}', [SongController::class, 'edit']);
Route::post('update-song/{id}', [SongController::class, 'update']);
Route::get('destroy-song/{id}', [SongController::class, 'destroy']);

