<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function show()
    {
        $user = User::all();
        return view('user')->with('user', $user);
    }

    public function download()
    {
        return view('download');
    }

    public function login()
    {
        return view('login');
    }

    public function check_login(Request $request)
    {
        $email = "gians@admin.com";
        $pass = "123456";

        if ($request->email == $email && $request->password == $pass) {
            session()->put('admin', 'admin');
            return Redirect::to('/dashboard');
        } else {
            Session::flash('error', 'Bạn nhập sai email hoặc mật khẩu');
            return redirect()->back();
        }

    }
}
