<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OpenOrdersController extends Controller
{
    //
    public function show() {
        $openOrders = DB::select("SELECT * FROM open_orders ORDER BY id DESC");
        return view("admin.OpenOrders.show", ["openOrders" => $openOrders]);
    }
}
