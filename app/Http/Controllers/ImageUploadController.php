<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SebastianBergmann\FileIterator\Facade;

class ImageUploadController extends Controller
{
    public function home()
    {
        $cloudinary = cloudinary()->uploadApi()->destroy('image/bbudwgiojsr0knsc5d6e');
        dd($cloudinary);
        //  return view('home');
    }

    public function upload(Request $request)
    {
        $result = $request->file('image_name')->storeOnCloudinary('image');
        dd($result->getPublicId());
    }
}
