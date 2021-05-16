<?php

namespace App\Http\Controllers;

use App\Models\Album;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    public function create()
    {
        AuthLogin();
        return view('album.add-album');
    }

    public function store(Request $request)
    {
        $album = new Album();
        $album->name = $request->name;
        $album->year = $request->year;
        $imgUrl = $request->file('image')->storeOnCloudinary('image');
        $album->imageUrl = $imgUrl->getPublicId();
        $album->desc = $request->desc;

        if ($album->save()) {
            $request->session()->flash('success', 'Success');
        } else {
            $request->session()->flash('success', 'Fail');
        }
        return redirect('all-album');
    }

    public function show()
    {
        AuthLogin();
        $album = Album::all();
        return view('album.all-album')->with('album', $album);
    }

    public function edit($id)
    {
        $album = Album::find($id);
        return view("album.edit-album")->with('album', $album);
    }

    public function update(Request $request, $id)
    {
        $album = Album::find($id);
        $album->name = $request->name;
        $album->year = $request->year;
        $album->desc = $request->desc;

        if ($request->hasFile('image')) {
            cloudinary()->uploadApi()->destroy($album->imageUrl);

            $imgUrl = $request->file('image')->storeOnCloudinary('image');
            $album->imageUrl = $imgUrl->getPublicId();
        }
        $album->save();
        return redirect('all-album')->with('success', "Đã cập nhật album");
    }

    public function destroy($id)
    {
        $album = Album::find($id);
        cloudinary()->uploadApi()->destroy($album->imageUrl);

        if ($album->delete()) {
            return redirect('all-album')->with('success', "Đã xoá album");
        } else {
            return redirect('all-album')->with('success', "Deo xoá được album ni :))");
        }
    }
}
