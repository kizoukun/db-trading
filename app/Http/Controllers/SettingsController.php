<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class SettingsController extends Controller
{
    public function index () {
        return view("settings");
    }
    public function save_password(Request $request) {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8|different:current_password',
            'new_password_confirmation' => 'required|same:new_password',
        ]);

        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'The current password is incorrect.']);
        }
        DB::update("UPDATE users SET password = ? WHERE id = ?", [Hash::make($request->new_password), Auth::id()]);
        return redirect()->back();
    }
    public function save_profile(Request $request)
    {
        $request->validate([
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
        ]);

        $user = Auth::user();

        DB::update("UPDATE users SET first_name = ?, last_name = ? WHERE id = ?", [$request->first_name, $request->last_name, Auth::id()]);

        return redirect()->back()->with('success', 'Profile updated successfully.');
    }
}
