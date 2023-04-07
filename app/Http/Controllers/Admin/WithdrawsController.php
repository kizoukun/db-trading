<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WithdrawsController extends Controller
{
    public function show() {
        $deposits = DB::select("SELECT wh.id, wh.amount, wh.status, wh.description, user.first_name, user.last_name, user.email  FROM withdraw_histories wh JOIN users user ON user.id = wh.user_id");
        return view("admin.Withdraws.show", ["deposits" => $deposits]);
    }

    public function edit($id) {
        $deposit = DB::select("SELECT wh.id, wh.amount, wh.status, wh.description, user.first_name, user.last_name, user.email FROM withdraw_histories wh JOIN users user ON user.id = wh.user_id WHERE wh.id = ?", [$id]);
        if(count($deposit) == 0) {
            return redirect()->intended("/admin/deposits");
        }
        $deposit = $deposit[0];
        return view("admin.Withdraws.edit", ["deposit" => $deposit]);
    }

    public function update($id, Request $request) {
        $this->validate($request, [
            "status" => "required|in:PENDING,ACCEPTED,REJECTED",
            "description" => "required|string",
            "amount" => "required|numeric"
        ]);
        DB::update("UPDATE withdraw_histories SET status = ?, description = ?, amount = ? WHERE id = ?", [$request->input("status"), $request->input("description"), $request->input("amount"), $id]);
        if($request->input("status") == "ACCEPTED") {
            $data = DB::select("SELECT user_id, description FROM withdraw_histories WHERE id = ?", [$id]);
            \App\Http\Controllers\Dashboard\StocksController::takeUserBalance($data[0]->user_id, $request->input("amount"), $data[0]->description);
        }
        return redirect()->intended("/admin/withdraws");
    }
}
