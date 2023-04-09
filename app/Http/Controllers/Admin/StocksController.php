<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class StocksController extends Controller
{
    public function show(Request $request) {
        $search = $request->query("search") ?? "";
        $max_date = $request->query("date") ?? "3650";
        $date = date("Y-m-d", strtotime("-$max_date days"));
        $stocks = DB::select("SELECT * FROM stocks WHERE symbol LIKE ? OR name LIKE ? AND created_at <= ?", ["%$search%", "%$search%", "$date"]);
        return view("admin.stocks.index", ["stocks" => $stocks]);
    }

    public function create() {
        return view("admin.stocks.create");
    }

    public function createStore(Request $request) {
        $this->validate($request, [
            "symbol" => "required|string|min:4|max:4",
            "name" => "required|string",
            "description" => "required|string",
            "total_shares" => "required|numeric|min:1",
            "image_uri" => "nullable|min:1"
        ]);
        $symbol = $request->input("symbol");
        $name = $request->input("name");
        $description = $request->input("description");
        $total_shares = $request->input("total_shares");
        $image_uri = $request->input("image_uri");
        $insert = DB::insert("INSERT INTO stocks (symbol, name, description, total_shares, image_uri) VALUES (?, ?, ?, ?, ?)", [strtoupper($symbol), $name, $description, $total_shares, $image_uri]);
        return redirect()->intended("/admin/stocks");
    }

    public function edit($id) {
        $stock = DB::select("SELECT * FROM STOCKS WHERE symbol = ?", [$id]);
        return view("admin.stocks.edit", ["stock" => $stock[0]]);
    }

    function update($id, Request $request) {
        $this->validate($request, [
            "name" => "required|string",
            "description" => "required|string",
            "total_shares" => "required|numeric|min:1",
            "image_uri" => "nullable|min:1"
        ]);
        $stock = DB::select("SELECT * FROM STOCKS WHERE symbol = ?", [$id]);
        $name = $request->input("name");
        $description = $request->input("description");
        $total_shares = $request->input("total_shares");
        $image_uri = $request->input("image_uri");
        DB::update("UPDATE STOCKS SET name = ?, description = ?, total_shares = ?, image_uri = ? WHERE symbol = ?", [$name, $description, $total_shares, $image_uri, $id]);

        return redirect()->intended("/admin/stocks");
    }

    public function delete($id) {
        DB::delete("DELETE FROM stocks WHERE symbol = ?", [$id]);
        return redirect()->intended("/admin/stocks");
    }
}
