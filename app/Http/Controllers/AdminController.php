<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function check_login(Request $request)
    {
        $email = "xmusig@admin.com";
        $pass = "xmusig";

        if ($request->email == $email && $request->password == $pass) {
            session()->put('admin', 'admin');
            return Redirect::to('/dashboard');
        } else {
            Session::flash('error', 'Bạn nhập sai email hoặc mật khẩu');
            return redirect()->back();
        }

    }
}
