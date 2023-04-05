<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BankListController extends Controller
{
    public function show() {
        $bankLists = DB::select("SELECT * FROM bank_list ORDER BY created_at ASC");
        return view("admin.BankList.show", ["bankLists" => $bankLists]);
    }

    public function create() {
        return view("admin.BankList.create");
    }

    public function createStore(Request $request) {
        $this->validate($request, [
            "code" => "required|min:3",
            "name" => "required",
            "minWithdraw" => "required",
            "maxWithdraw" => "required"
        ]);

        $code = $request->input("code");
        $name = $request->input("name");
        $minWithdraw = $request->input("minWithdraw");
        $maxWithdraw = $request->input("maxWithdraw");
        DB::insert("INSERT INTO bank_list (code, name, min_withdraw, max_withdraw) VALUES (?, ?, ?, ?)", [$code, $name, $minWithdraw, $maxWithdraw]);
        return redirect()->intended("/admin/bank-list");
    }

    public function delete($id) {
        DB::delete("DELETE FROM bank_list WHERE code = ?", [$id]);
        return redirect()->intended("/admin/bank-list");
    }

    public function edit($id) {
        $bank = DB::select("SELECT * FROM bank_list WHERE code = ?", [$id]);
        if(count($bank) == 0) {
            return redirect()->intended("/admin/bank-list");
        }
        $bank = $bank[0];
        return view("admin.BankList.edit", ["bank" => $bank]);
    }

    public function update(Request $request, $id) {
        $this->validate($request, [
            "name" => "required",
            "minWithdraw" => "required",
            "maxWithdraw" => "required"
        ]);

        $name = $request->input("name");
        $minWithdraw = $request->input("minWithdraw");
        $maxWithdraw = $request->input("maxWithdraw");
        DB::update("UPDATE bank_list SET name = ?, min_withdraw = ?, max_withdraw = ? WHERE code = ?", [$name, $minWithdraw, $maxWithdraw, $id]);
        return redirect()->intended("/admin/bank-list");
    }
}
