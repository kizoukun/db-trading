<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    //
    public function index() {
        $result = DB::select("SELECT * FROM stocks;");
        $user_stock_amounts = $this->getUserStocksAndAmounts(auth()->id(), false);
        return view("dashboard", ["stocks" => $result, "user_stock_amounts" => $user_stock_amounts]);
    }

    public static function getUserStockAmount($userId, $stockSymbol) {
        $result = DB::select("SELECT SUM(
            IF(orders.order_type = 'BUY', orders.filled_quantity, 0) -
            IF(orders.order_type = 'SELL', IFNULL(open_orders.total_order_quantity, 0) + orders.filled_quantity, 0)
        ) AS amount
        FROM orders
        LEFT JOIN (
            SELECT order_id, SUM(order_quantity) AS total_order_quantity
            FROM open_orders
            GROUP BY order_id
        ) AS open_orders ON orders.id = open_orders.order_id
        WHERE orders.user_id = ? AND orders.stock_symbol = ?",
            [$userId, $stockSymbol]);

        return $result[0]->amount ?? 0;
    }

    public function getUserStocksAndAmounts($userId, $calculateOpenOrder = true): array
    {
        return DB::select("SELECT stocks.*,
            COALESCE((
                SELECT SUM(
                    IF(orders.order_type = 'BUY', orders.filled_quantity, 0) 
                    ".($calculateOpenOrder ?"- IF(orders.order_type = 'SELL', IFNULL(open_orders.total_order_quantity, 0) + orders.filled_quantity, 0)." : "")."
                )
                FROM orders
                LEFT JOIN (
                    SELECT order_id, SUM(order_quantity) AS total_order_quantity
                    FROM open_orders
                    GROUP BY order_id
                ) AS open_orders ON orders.id = open_orders.order_id
                WHERE orders.user_id = ? AND orders.stock_symbol = stocks.symbol
            ), 0) AS amount,
            (SELECT order_price FROM orders WHERE stock_symbol = stocks.symbol AND filled_quantity > 0 LIMIT 1) AS price
        FROM stocks
        HAVING amount > 0;",
        [$userId]);
    }

}
