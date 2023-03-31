<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class StocksController extends Controller
{
    //
    public function id($id) {
        $result = DB::select("SELECT * FROM stocks WHERE symbol = ? LIMIT 1", [$id]);
        if(count($result) < 1) {
            return abort(404);
        }
        $buy_open_orders = DB::select("SELECT * FROM open_orders WHERE stock_symbol = ? AND order_type = ? ORDER BY order_price DESC", [$id, "BUY"]);
        $sell_open_orders = DB::select("SELECT * FROM open_orders WHERE stock_symbol = ? AND order_type = ? ORDER BY order_price ASC", [$id, "SELL"]);
        return view("dashboard.stock", ["stock" => $result[0], "buy_orders" => $buy_open_orders, "sell_orders" => $sell_open_orders]);
    }

    public function createOrder($id) {
        $this->validate(request(), [
            "order_type" => "required|in:BUY,SELL",
            "order_price" => "required|numeric|min:1",
            "order_quantity" => "required|numeric|min:1",
        ]);
        $order_type = request()->input("order_type");
        $order_price = request()->input("order_price");
        $request_order_quantity = request()->input("order_quantity");
        $order_quantity = $request_order_quantity;
        $result = DB::select("SELECT * FROM stocks WHERE symbol = ? LIMIT 1", [$id]);
        if(count($result) < 1) {
            return abort(404);
        }
        $stock = $result[0];
        $user = auth()->user();
        if($order_type == "BUY") {
            $total_price = $order_price * $order_quantity;
//            if($total_price > $user->balance) {
//                return back()->withErrors("Insufficient balance");
//            }
//            $take_user_balance = DB::insert("INSERT INTO balance_histories (user_id, balance_before, balance_after, amount, description, type) VALUES (?, ?, ?, ?, ?, ?)",
//                [$user->id, $user->balance, $user->balance - $total_price, $total_price, "BUY_STOCKS: " . $stock->symbol, 1]);

            $sell_order = DB::select("SELECT * FROM open_orders WHERE stock_symbol = ? AND order_type = ? AND order_price <= ? ORDER BY order_price ASC", [$stock->symbol, "SELL", $order_price]);
            $current_num = 0;
            $datas = [];
            foreach($sell_order as $sell) {
                if($current_num >= $order_quantity)
                    break;
                $current_num += $sell->order_quantity;
                $datas[] = $sell;
            }
            $request_order_quantity_update = $request_order_quantity;
            foreach($datas as $data) {
                $order_quantity -= $data->order_quantity;
                if($order_quantity >= 0) {
                    DB::delete("DELETE FROM open_orders WHERE id = ?;", [$data->id]);
                    DB::update("UPDATE orders SET filled_quantity = orders.order_quantity WHERE id = ?;", [$data->order_id]);
                    $request_order_quantity_update -= $data->order_quantity;
                    //give money to user :D
                } else {
                    //give money to user :D
                    DB::update("UPDATE open_orders op JOIN orders o ON o.id = op.order_id SET op.order_quantity = ?, o.filled_quantity = ? WHERE op.id = ?", [$data->order_quantity - $request_order_quantity_update, $request_order_quantity,$data->id]);
                }

            }
            $insertOrders = DB::insert("INSERT INTO orders (user_id, stock_symbol, order_type, order_price, order_quantity, status, filled_quantity) VALUES (?, ?, ?, ?, ?, 'BUY', ?)",
                [$user->id, $stock->symbol, $order_type, $order_price, $request_order_quantity, $order_quantity <= 0 ? $request_order_quantity : $request_order_quantity - $order_quantity]);
            if($order_quantity > 0) {
                $insertedId = DB::getPdo()->lastInsertId();
                $insertOpenOrders = DB::insert("INSERT INTO open_orders (user_id, order_id, stock_symbol, order_type, order_price, order_quantity) VALUES (?, ?, ?, ?, ?, ?)",
                    [$user->id, $insertedId, $stock->symbol, $order_type, $order_price, $order_quantity]);
            }
            return redirect()->back();
        } else if($order_type == "SELL") {

            // Check if user owns the stock

            // Check if user owns enough stocks

            //need to check if sell price is equal or lower than buy price
            //if equal, then just remove the buy order
            //if lower, then remove the buy order and add the difference to the user's balance

            //checking if there is a buy order that is equal or lower than the sell order
            $buy_order = DB::select("SELECT * FROM open_orders WHERE stock_symbol = ? AND order_type = ? AND order_price >= ? ORDER BY order_price DESC", [$stock->symbol, "BUY", $order_price]);
            $current_num = 0;
            $datas = [];
            foreach($buy_order as $buy) {
                if($current_num >= $order_quantity)
                    break;
                $current_num += $buy->order_quantity;
                $datas[] = $buy;
            }
            $request_order_quantity_update = $request_order_quantity;
            foreach($datas as $data) {
                $order_quantity -= $data->order_quantity;
                if($order_quantity >= 0) {
                    DB::delete("DELETE FROM open_orders WHERE id = ?;", [$data->id]);
                    DB::update("UPDATE orders SET filled_quantity = orders.order_quantity WHERE id = ?;", [$data->order_id]);
                    $request_order_quantity_update -= $data->order_quantity;
                    //give money to user :D
                } else {
                    //give money to user :D
                    DB::update("UPDATE open_orders op JOIN orders o ON o.id = op.order_id SET op.order_quantity = ?, o.filled_quantity = ? WHERE op.id = ?", [$data->order_quantity - $request_order_quantity_update, $request_order_quantity,$data->id]);
                }

            }
            $insertOrders = DB::insert("INSERT INTO orders (user_id, stock_symbol, order_type, order_price, order_quantity, status, filled_quantity) VALUES (?, ?, ?, ?, ?, 'SELL', ?)",
                [$user->id, $stock->symbol, $order_type, $order_price, $request_order_quantity, $order_quantity <= 0 ? $request_order_quantity : $request_order_quantity - $order_quantity]);
            if($order_quantity > 0) {
                $insertedId = DB::getPdo()->lastInsertId();
                $insertOpenOrders = DB::insert("INSERT INTO open_orders (user_id, order_id, stock_symbol, order_type, order_price, order_quantity) VALUES (?, ?, ?, ?, ?, ?)",
                    [$user->id, $insertedId, $stock->symbol, $order_type, $order_price, $order_quantity]);
            }
            return redirect()->back();
        } else {
            abort(500);
        }
    }
}
