<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class DepositController extends Controller
{
    //
    public function store() {
        $this->validate(request(), [
            "amount" => "required|numeric|min:1"
        ]);
        $amount = request()->input("amount");

        $histories = DB::select("SELECT * FROM balance_histories WHERE user_id = ? ORDER BY created_at DESC LIMIT 1", [auth()->id()]);
        $balance_before = $histories[0]->balance_after ?? 0;
        $balance_after = $balance_before + $amount;
        $description = "Topup hehe suii";
        $insert = DB::insert("INSERT INTO balance_histories (user_id, balance_before, balance_after, amount, description, type) VALUES (?, ?, ?, ?, ?, ?)",
            [auth()->id(), $balance_before, $balance_after, $amount, $description, 1]);
        return redirect()->back();
    }
}
