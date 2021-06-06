<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Favorite as ResourcesFavorite;
use App\Http\Resources\Song;
use App\Models\Favorite;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $check = Favorite::where([
            'user_id' => $request->user_id,
            'song_id' => $request->song_id,
        ])->exists();
        if ($check) {
            return "du ma may";
        }
        $favorite = new Favorite();
        $favorite->user_id = $request->user_id;
        $favorite->song_id = $request->song_id;
        $favorite->save();

        return "Đã thêm bài hát yêu thích";
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $favorite = Favorite::where('user_id', $id)->orderby('id', 'DESC')->get();
        ResourcesFavorite::withoutWrapping();
        return ResourcesFavorite::collection($favorite);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $favorite = Favorite::find($id);
        if ($favorite->delete()) {
            return "Đã xoá bài hát khỏi danh mục yêu thích";
        } else {
            return "deo xoa duoc";
        }
    }
}
