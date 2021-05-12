<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\User as ResourcesUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function register(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
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
