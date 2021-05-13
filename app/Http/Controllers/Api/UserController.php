<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\User as ResourcesUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Symfony\Component\Console\Input\Input;

class UserController extends Controller
{


    public function register()
    {
        return view("user_register");
    }

    public function check_register(Request $request)
    {
        if (User::where('email', '=', $request->email)->first())
        {
            Session::flash('error', 'Email đã được đăng ký');
            return redirect()->back();
        }


        if ($request->password != $request->re_password)
        {
            Session::flash('error', 'Mật khẩu nhập lại không trùng với mật khẩu');
            return redirect()->back();
        }


        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->save();
        Session::flash('error', 'Đăng ký thành công, vui lòng quay trở lại để đăng nhập');
        return redirect()->back();

    }
    public function login(Request $request)
    {
        $user = User::where('email', '=', $request->email)->where('password', '=', $request->password)->first();

        if ($user) {
            return response()->json([
                "success" => true,
                "user" => $user
            ]);
        } else {
            return response()->json([
                "success" => false,
                "user" => $user
            ]);
        }
    }
}
