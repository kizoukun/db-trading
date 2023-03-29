<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    //
    public function index() {
        return view("auth.login");
    }

    public function login() {
        $credentials = request()->validate([
            "email" => "required|email",
            "password" => "required"
        ]);

        $result = DB::select("SELECT * FROM users WHERE email = ?", [$credentials['email']]);
        if(count($result) == 0) {
            return back()->withErrors([
                "email" => "The provided credentials do not match our records."
            ]);
        }
        $user = $result[0];
        if(Hash::check($credentials['password'], $user->password)) {
            Auth::loginUsingId($user->id);
            request()->session()->regenerate();
            return redirect()->intended("/");
        }
        return back()->withErrors([
            "email" => "The provided credentials do not match our records."
        ]);
    }
}
