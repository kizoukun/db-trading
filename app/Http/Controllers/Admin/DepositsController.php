<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class DepositsController extends Controller
{
    public function show() {
        $deposits = DB::select("SELECT dh.id, dh.amount, dh.status, dh.description, user.first_name, user.last_name, user.email  FROM deposit_histories dh JOIN users user ON user.id = dh.user_id");
        return view("admin.Deposits.show", ["deposits" => $deposits]);
    }

    public function edit($id) {
        $deposit = DB::select("SELECT dh.id, dh.amount, dh.status, dh.description, user.first_name, user.last_name, user.email FROM deposit_histories dh JOIN users user ON user.id = dh.user_id WHERE dh.id = ?", [$id]);
        if(count($deposit) == 0) {
            return redirect()->intended("/admin/deposits");
        }
        $deposit = $deposit[0];
        return view("admin.Deposits.edit", ["deposit" => $deposit]);
    }

    public function update($id, Request $request) {
        $this->validate($request, [
            "status" => "required|in:PENDING,ACCEPTED,REJECTED",
            "description" => "required|string",
            "amount" => "required|numeric"
        ]);
        DB::update("UPDATE deposit_histories SET status = ?, description = ?, amount = ? WHERE id = ?", [$request->input("status"), $request->input("description"), $request->input("amount"), $id]);
        if($request->input("status") == "ACCEPTED") {
            $data = DB::select("SELECT user_id, description FROM deposit_histories WHERE id = ?", [$id]);
            \App\Http\Controllers\Dashboard\StocksController::addUserBalance($data[0]->user_id, $request->input("amount"), $data[0]->description);
        }
        return redirect()->intended("/admin/deposits");
    }
}
