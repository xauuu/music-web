<?php

use App\Http\Controllers\Api\FavoriteController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('music', 'App\Http\Controllers\Api\MusicController@index');
Route::get('album', 'App\Http\Controllers\Api\MusicController@album');
Route::get('album/{id}', 'App\Http\Controllers\Api\MusicController@songInalbum');
Route::put('update-view/{id}', 'App\Http\Controllers\Api\MusicController@update_view');

Route::get('search/{keyword}', 'App\Http\Controllers\Api\MusicController@search');

Route::post('login', [UserController::class, 'login']);

Route::post('favorite', [FavoriteController::class, 'store']);
Route::get('favorite/{id}', [FavoriteController::class, 'show']);
Route::delete('favorite/{id}', [FavoriteController::class, 'destroy']);

