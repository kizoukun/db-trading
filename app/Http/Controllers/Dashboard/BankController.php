<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BankController extends Controller
{
    public function index() {
        $bank_list = DB::select("SELECT * FROM bank_list");
        $user_banks = DB::select("SELECT * FROM users_bank_list WHERE user_id = ?", [auth()->id()]);
        return view("dashboard.bank", ["bank_list" => $bank_list, "user_banks" => $user_banks]);
    }

    public function store() {
        $this->validate(request(), [
            "bank_code" => "required|numeric|min:1",
            "account_number" => "required|numeric|min:1",
        ]);
        $bank_code = request()->input("bank_code");
        $valid = DB::select("SELECT * FROM bank_list WHERE code = ?", [$bank_code]);
        if(count($valid) < 1) {
            return back()->withErrors('Bank Code does not exists');
        }
        $account_no = request()->input("account_number");
        $second_valid = DB::select("SELECT * FROM users_bank_list WHERE user_id = ? AND bank_code = ? AND account_no = ?",
            [auth()->id(), $bank_code, $account_no]);
        if(count($second_valid) > 0) {
            return back()->withErrors("Bank account already exists");
        }
        $insert = DB::insert("INSERT INTO users_bank_list (user_id, bank_code, account_no) VALUES (?, ?, ?)",
            [auth()->id(), $bank_code, $account_no]);
        return redirect()->back();
    }
}
