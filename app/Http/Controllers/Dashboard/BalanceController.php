<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BalanceController extends Controller
{
    public function index() {
        $balances = DB::select("SELECT * FROM balance_histories WHERE user_id = ?", [auth()->id()]);
        return view("dashboard.balance", ["histories" => $balances]);
    }

    public static function getUserBalance() {
        $balance = DB::select("SELECT * FROM balance_histories WHERE user_id = ? ORDER BY created_at DESC LIMIT 1", [auth()->id()]);
        return $balance[0]->balance ?? 0;
    }
}
