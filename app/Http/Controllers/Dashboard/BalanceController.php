<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class BalanceController extends Controller
{

    public function show() {
        $user_balances = DB::select("SELECT * FROM balance_histories WHERE user_id = ? ORDER BY id DESC", [auth()->id()]);
        $user_deposits = DB::select("SELECT * FROM deposit_histories WHERE user_id = ? ORDER BY id DESC", [auth()->id()]);
        $user_withdraws = DB::select("SELECT * FROM withdraw_histories WHERE user_id = ? ORDER BY id DESC", [auth()->id()]);
        return view("dashboard.balance", ["user_balances" => $user_balances, "user_deposits" => $user_deposits, "user_withdraws" => $user_withdraws]);
    }

    public static function getUserBalance() {
        $balance = DB::select("SELECT * FROM balance_histories WHERE user_id = ? ORDER BY created_at DESC LIMIT 1", [auth()->id()]);
        return $balance[0]->balance ?? 0;
    }
}
