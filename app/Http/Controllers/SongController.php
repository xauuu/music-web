<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Song;
use Illuminate\Http\Request;

class SongController extends Controller
{
    public function create()
    {
        AuthLogin();
        $album = Album::all();
        return view('song.add-song')->with('album', $album);
    }

    public function store(Request $request)
    {
        $song = new Song();
        $song->album_id = $request->album_id;
        $song->name = $request->name;
        $song->artist = $request->artist;

        $imgUrl = $request->file('image')->storeOnCloudinary('image');
        $song->imageUrl = $imgUrl->getPublicId();

        $songUrl = $request->file('song')->storeOnCloudinary('song');
        $song->songUrl = $songUrl->getPublicId();

        if ($song->save()) {
            $request->session()->flash('success', 'Success');
        } else {
            $request->session()->flash('success', 'Fail');
        }
        return redirect('all-song');
    }

    public function show()
    {
        AuthLogin();
        $song = Song::all();
        return view('song.all-song')->with('song', $song);
    }

    public function edit($id)
    {
        $album = Album::all();
        $song = Song::find($id);
        return view('song.edit-song')->with('song', $song)->with('album', $album);
    }

    public function update(Request $request, $id)
    {
        $song = Song::find($id);
        $song->album_id = $request->album_id;
        $song->name = $request->name;
        $song->artist = $request->artist;

        if ($request->hasFile('image')) {
            cloudinary()->uploadApi()->destroy($song->imageUrl);

            $imgUrl = $request->file('image')->storeOnCloudinary('image');
            $song->imageUrl = $imgUrl->getPublicId();
        }
        if ($request->hasFile('song')) {
            cloudinary()->uploadApi()->destroy($song->songUrl);

            $songUrl = $request->file('song')->storeOnCloudinary('song');
            $song->songUrl = $songUrl->getPublicId();
        }
        $song->save();
        return redirect('all-song')->with('success', "Đã cập nhật bài hát");
    }

    public function destroy($id)
    {
        $song = Song::find($id);
        cloudinary()->uploadApi()->destroy($song->imageUrl);
        cloudinary()->uploadApi()->destroy($song->songUrl);

        $song->delete();

        return redirect('all-song')->with('success', "Đã xoá bài hát");
    }
}
