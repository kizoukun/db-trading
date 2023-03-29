<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    //
    public function index() {
        $result = DB::select("SELECT * FROM stocks");
        return view("dashboard", ["stocks" => $result]);
    }
}
