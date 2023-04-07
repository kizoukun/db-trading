<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use RealRashid\SweetAlert\Facades\Alert;

class BalanceController extends Controller
{

    public function show() {
        $user_balances = DB::select("SELECT * FROM balance_histories WHERE user_id = ? ORDER BY id DESC", [auth()->id()]);
        $user_deposits = DB::select("SELECT * FROM deposit_histories WHERE user_id = ? ORDER BY id DESC", [auth()->id()]);
        $user_withdraws = DB::select("SELECT * FROM withdraw_histories WHERE user_id = ? ORDER BY id DESC", [auth()->id()]);
        return view("dashboard.balance", ["user_balances" => $user_balances, "user_deposits" => $user_deposits, "user_withdraws" => $user_withdraws]);
    }

    public function storeDeposit(Request $request) {
        $amount = $request->input("amount");
        if($amount == null || $amount < 1) {
            return redirect()->back()->with("toast_error", "Invalid amount");
        }
        if($amount < 10000) {
            return redirect()->back()->with("toast_error", "Minimum deposit is 10,000");
        }
        DB::insert("INSERT INTO deposit_histories(user_id, amount, status, description) VALUES (?, ?, ?, ?)", [auth()->id(), $request->input("amount"), "PENDING", "Deposit"]);
        return redirect()->intended("/dashboard/balance#deposit")->with("toast_success", "Deposit request sent");
    }

    public function storeWithdraw(Request $request) {
        $amount = $request->input("amount");
        $account_no = $request->input("account_no");
        Log::debug($account_no);
        if($account_no == null) {
            return redirect()->back()->with("toast_error", "Invalid account");
        }
        $bank = DB::select("SELECT * FROM users_bank_list WHERE user_id = ? AND account_no = ?", [auth()->id(), $account_no]);
        if(count($bank) < 1) {
            return redirect()->back()->with("toast_error", "Account not found");
        }
        if($amount == null || $amount < 1) {
            return redirect()->back()->with("toast_error", "Invalid amount");
        }
        if($amount < 10000) {
            return redirect()->back()->with("toast_error", "Minimum withdraw is 10,000");
        }
        $user_balance = self::getUserBalance();
        Log::debug($bank);
        if($user_balance < $amount) {
            return redirect()->back()->with("toast_error", "Insufficient balance");
        }
        DB::insert("INSERT INTO withdraw_histories(user_id, amount, status, description, user_bank_id) VALUES (?, ?, ?, ?, ?)", [auth()->id(), $request->input("amount"), "PENDING", "Withdraw", $bank[0]->id]);
        return redirect()->intended("/dashboard/balance#withdraw")->with("toast_success", "Withdraw request sent");
    }

    public static function getUserBalance() {
        $balance = DB::select("SELECT * FROM balance_histories WHERE user_id = ? ORDER BY id DESC LIMIT 1", [auth()->id()]);
        return $balance[0]->balance_after ?? 0;
    }
}
