<?php

namespace App\Http\Controllers;

use App\Models\Album;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    public function add_album()
    {
        return view('album.add-album');
    }

    public function save_album(Request $request)
    {
        $album = new Album();
        $album->name = $request->name;
        $imgUrl = $request->file('image')->storeOnCloudinary('image');
        $album->imageUrl = $imgUrl->getPublicId();
        $album->desc = $request->desc;

        if($album->save()) {
            $request->session()->flash('success', 'Success');
        } else {
            $request->session()->flash('success', 'Fail');
        }
        return redirect('admin/all-album');
    }

    public function all_album()
    {
        $album = Album::all();
        return view('album.all-album')->with('album', $album);
    }
}
