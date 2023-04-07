<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MarketplaceController extends Controller
{
    //
    public function index(Request $request, string $symbol) {
        $result = DB::select("SELECT *,(select order_price FROM orders WHERE stock_symbol = stocks.symbol  ORDER BY orders.created_at DESC LIMIT 1) as price  FROM stocks");
        return view("marketplace", ["stocks" => $result, 'symbol' => $symbol]);
    }


}
