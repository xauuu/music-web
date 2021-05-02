<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Album;
use App\Models\Song;
use Illuminate\Http\Request;
use App\Http\Resources\Song as SongResources;
use App\Http\Resources\Album as AlbumResources;
use Response;
class MusicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $song = Song::orderBy('name', 'ASC')->get();
        SongResources::withoutWrapping();
		return SongResources::collection($song);
    }
    public function album()
    {
        $album = Album::orderBy('name', 'ASC')->get();
        AlbumResources::withoutWrapping();
        return AlbumResources::collection($album);
    }
    public function songInalbum($id)
    {
        $song = Song::where('album_id', $id)->orderBy('name', 'ASC')->get();
        SongResources::withoutWrapping();
		return SongResources::collection($song);
    }

    public function update_view($id)
    {
    	$song = Song::find($id);
    	$song->views += 1;
    	$song->save();
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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
        //
    }
}
