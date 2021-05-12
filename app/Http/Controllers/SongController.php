<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Song;
use Illuminate\Http\Request;

class SongController extends Controller
{
    public function add_song()
    {
        AuthLogin();
        $album = Album::all();
        return view('song.add-song')->with('album', $album);
    }

    public function save_song(Request $request)
    {
        $song = new Song();
        $song->album_id = $request->album_id;
        $song->name = $request->name;
        $song->artist = $request->singer;

        $imgUrl = $request->file('image')->storeOnCloudinary('image');
        $song->imageUrl = $imgUrl->getPublicId();

        $songUrl = $request->file('song')->storeOnCloudinary('song');
        $song->songUrl = $songUrl->getPublicId();

        if($song->save()) {
            $request->session()->flash('success', 'Success');
        } else {
            $request->session()->flash('success', 'Fail');
        }
        return redirect('all-song');

    }

    public function all_song()
    {
        AuthLogin();
        $song = Song::all();
        return view('song.all-song')->with('song', $song);
    }
}
