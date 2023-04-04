<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BankListController extends Controller
{
    public function show() {
        $bankLists = DB::select("SELECT * FROM bank_list");
        return view("admin.BankList.show", ["bankLists" => $bankLists]);
    }
}
