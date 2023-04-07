<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NotificationsController extends Controller
{
    public function show() {
        $notifications = DB::select("SELECT * FROM notifications WHERE user_id = ?", [auth()->id()]);
        return view("dashboard.notifications", ["notifications" => $notifications]);
    }
}
