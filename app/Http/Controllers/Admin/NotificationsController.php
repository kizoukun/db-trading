<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NotificationsController extends Controller
{
    public function show() {
        $notifications = DB::select("SELECT * FROM notifications");
        return view("admin.Notifications.show", ["notifications" => $notifications]);
    }

    public function create() {
        $users = DB::select("SELECT * FROM users");
        return view("admin.Notifications.create", ["users" => $users]);
    }

    public function createStore(Request $request) {
        $this->validate($request, [
            "userId" => "required",
            "title" => "required",
            "description" => "required"
        ]);
        $userId = $request->input("userId");
        $title = $request->input("title");
        $description = $request->input("description");
        $this->sendNotification($userId, $title, $description);
        return redirect()->intended("/admin/notifications");
    }

    public function delete($id) {
        DB::delete("DELETE FROM notifications WHERE id = ?", [$id]);
        return redirect()->intended("/admin/notifications");
    }

    public static function sendNotification($userId, $title, $description) {
        DB::insert("INSERT INTO notifications (user_id, title, description) VALUES (?, ?, ?)", [$userId, $title, $description]);
    }
}
