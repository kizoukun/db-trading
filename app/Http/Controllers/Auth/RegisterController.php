<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class RegisterController extends Controller
{
    public function index() {
        return view("auth.register");
    }

    public function store(Request $request) {
        // Validate the user
        $validate = $request->validate([
            "email" => "required|email",
            "password" => "required|min:6",
            "first_name" => "required",
            "last_name" => "required",
            "phone_number" => "required|numeric",
            "address" => "required"
        ]);
        $email = $validate['email'];
        $result = DB::select("SELECT * FROM users WHERE email = ?", [$email]);
        if(count($result) > 0) {
            //https://stackoverflow.com/questions/47219542/how-can-i-manually-return-or-throw-a-validation-error-exception-in-laravel
            return back()->withErrors('Email already exists');
        }
        $password = bcrypt($validate['password']);
        $first_name = $validate['first_name'];
        $last_name = $validate['last_name'];
        $phone_number = $validate['phone_number'];
        $address = $validate['address'];
        // Store the user
        DB::select("INSERT INTO users (id, email, password, first_name, last_name, phone, address) VALUES (?, ?, ?, ?, ?, ?, ?)", [Str::uuid(),$email, $password, $first_name, $last_name, $phone_number, $address]);
        // Redirect
        return redirect("/auth/login");
    }
}
