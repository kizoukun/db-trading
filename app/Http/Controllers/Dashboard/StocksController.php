<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers;
class StocksController extends Controller
{
    //
    public function id($id) {
        $result = DB::select("SELECT *,(select order_price FROM orders WHERE stock_symbol = stocks.symbol  ORDER BY orders.created_at DESC LIMIT 1) as price FROM stocks WHERE symbol = ? LIMIT 1", [$id]);
        if(count($result) < 1) {
            abort(404);
        }
        $buy_open_orders = DB::select("SELECT * FROM open_orders WHERE stock_symbol = ? AND order_type = ? AND user_id != ? ORDER BY order_price DESC", [$id, "BUY", auth()->id()]);
        $sell_open_orders = DB::select("SELECT * FROM open_orders WHERE stock_symbol = ? AND order_type = ? AND user_id != ? ORDER BY order_price ASC", [$id, "SELL", auth()->id()]);

        $user_open_orders = DB::select("SELECT * FROM open_orders WHERE stock_symbol = ? AND user_id = ? ORDER BY order_price DESC", [$id, auth()->id()]);
        return view("marketplace", ["stock" => $result[0], "buy_orders" => $buy_open_orders, "sell_orders" => $sell_open_orders, "user_open_orders" => $user_open_orders, 'id' => $id, 'stocks' => $result]);
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
        $result = DB::select("SELECT * FROM stocks WHERE symbol = ?", [$id]);
        if(count($result) < 1) {
            abort(404);
        }
        $stock = $result[0];
        $user = auth()->user();
        if($order_type == "BUY") {
            $total_price = $order_price * $order_quantity;
            if($total_price > ($user->balance ?? 0)) {
                return back()->with("toast_error", "Insufficient balance");
            }
            $sell_order = DB::select("SELECT * FROM open_orders WHERE stock_symbol = ? AND order_type = ? AND order_price <= ? AND user_id != ? ORDER BY order_price ASC", [$stock->symbol, "SELL", $order_price, $user->getAuthIdentifier()]);
            $current_num = 0;
            $datas = [];
            foreach($sell_order as $sell) {
                if($current_num >= $order_quantity)
                    break;
                $current_num += $sell->order_quantity;
                $datas[] = $sell;
            }
            $request_order_quantity_update = $request_order_quantity;
            $price_data = [];
            foreach($datas as $data) {
                $order_quantity -= $data->order_quantity;
                if($order_quantity >= 0) {
                    //deleting order from open orders because it get filled fully
                    DB::delete("DELETE FROM open_orders WHERE id = ?;", [$data->id]);
                    //updating order quantity
                    DB::update("UPDATE orders SET filled_quantity = orders.order_quantity WHERE id = ?;", [$data->order_id]);
                    $request_order_quantity_update -= $data->order_quantity;
                    //not used currently
                    $price_data[] = [
                        "price" => $data->order_price,
                        "quantity" => $data->order_quantity,
                    ];
                    $this->takeUserBalance($user->id, $data->order_price * $data->order_quantity, "BUY INSTANT FILLED : " . $stock->symbol . " Amount: " . $data->order_quantity . " at price: " . $data->order_price);
                    //give money to user :D
                    Controllers\Admin\NotificationsController::sendNotification($data->user_id, "SELL STOCK Filled" , "SELL STOCK FILLED: " . $stock->symbol . " Amounts: " . $data->order_quantity . " at price: " . $data->order_price);
                    $this->addUserBalance($data->user_id, $data->order_price * $data->order_quantity, "SELL STOCK FILLED: " . $stock->symbol . " Amounts: " . $data->order_quantity);
                } else {
                    //not used currently
                    $price_data[] = [
                        "price" => $data->order_price,
                        "quantity" => $request_order_quantity_update,
                    ];
                    //updating order quantity
                    DB::update("UPDATE open_orders op JOIN orders o ON o.id = op.order_id SET op.order_quantity = ?, o.filled_quantity = ? WHERE op.id = ?", [$data->order_quantity - $request_order_quantity_update, $request_order_quantity,$data->id]);
                    $this->takeUserBalance($user->getAuthIdentifier(), $data->order_price * $request_order_quantity_update, "BUY INSTANT FILLED : " . $stock->symbol . " Amount: " . $request_order_quantity_update . " at price: " . $data->order_price);
                    //give money to user :D
                    Controllers\Admin\NotificationsController::sendNotification($data->user_id, "SELL STOCK Filled" , "SELL STOCK FILLED: " . $stock->symbol . " Amount: " . $request_order_quantity_update . " at price: " . $data->order_price);
                    $this->addUserBalance($data->user_id, $data->order_price * $request_order_quantity_update, "SELL STOCK FILLED: " . $stock->symbol . " Amount: " . $request_order_quantity_update);
                }

            }

            $insertOrders = DB::insert("INSERT INTO orders (user_id, stock_symbol, order_type, order_price, order_quantity, status, filled_quantity) VALUES (?, ?, ?, ?, ?, 'BUY', ?)",
                [$user->id, $stock->symbol, $order_type, $order_price, $request_order_quantity, $order_quantity <= 0 ? $request_order_quantity : $request_order_quantity - $order_quantity]);
            if($order_quantity > 0) {
                $insertedId = DB::getPdo()->lastInsertId();
                $insertOpenOrders = DB::insert("INSERT INTO open_orders (user_id, order_id, stock_symbol, order_type, order_price, order_quantity) VALUES (?, ?, ?, ?, ?, ?)",
                    [$user->id, $insertedId, $stock->symbol, $order_type, $order_price, $order_quantity]);
                $this->takeUserBalance($user->getAuthIdentifier(), $order_price * $order_quantity, "BUY OPEN ORDER : " . $stock->symbol . " Amount: " . $order_quantity . " at price: " . $order_price);
            }
            return redirect()->back();
        } else if($order_type == "SELL") {
            $userOwnedStock = DashboardController::getUserStockAmount($user->id, $stock->symbol);
            if($userOwnedStock - $request_order_quantity < 0) {
                return back()->with("toast_error", "You don't have enough this stock");
            }
            $buy_order = DB::select("SELECT * FROM open_orders WHERE stock_symbol = ? AND order_type = ? AND order_price >= ? AND user_id != ? ORDER BY order_price DESC", [$stock->symbol, "BUY", $order_price, $user->getAuthIdentifier()]);
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
                    $this->addUserBalance($user->getAuthIdentifier(), $data->order_price * $data->order_quantity, "SELL STOCK INSTANT FILLED: " . $stock->symbol . " Amount: " . $data->order_quantity);
                    Controllers\Admin\NotificationsController::sendNotification($data->user_id, "SELL STOCK Filled" , "BUY STOCK FILLED: " . $stock->symbol . " Amount: " . $data->order_quantity . " at price: " . $data->order_price);
                } else {
                    //give money to user :D
                    $this->addUserBalance($user->getAuthIdentifier(), $data->order_price * $request_order_quantity_update, "SELL STOCK INSTANT FILLED: " . $stock->symbol . " Amount: " . $request_order_quantity_update);
                    Controllers\Admin\NotificationsController::sendNotification($data->user_id, "SELL STOCK Filled" , "BUY STOCK FILLED: " . $stock->symbol . " Amounts: " . $request_order_quantity_update . " at price: " . $data->order_price);
                    DB::update("UPDATE open_orders op JOIN orders o ON o.id = op.order_id SET op.order_quantity = ?, o.filled_quantity = ? WHERE op.id = ?", [$data->order_quantity - $request_order_quantity_update, $request_order_quantity_update,$data->id]);
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


    public function cancelBuyOpenOrders(Request $request) {
        $id = $request->input('order_id');
        $order = DB::select("SELECT * FROM open_orders WHERE id = ?;", [$id]);
        $order = $order[0];
        if($order->order_type == "BUY") {
            $this->addUserBalance($order->user_id, $order->order_price * $order->order_quantity, "CANCEL BUY OPEN ORDER : " . $order->stock_symbol . " Amount: " . $order->order_quantity . " at price: " . $order->order_price);
        }
        DB::delete("DELETE FROM open_orders WHERE id = ? AND user_id = ?;", [$id, auth()->id()]);
        return redirect()->back();
    }

    public function saveWatchList(String $symbol) {
        $result = DB::select("SELECT * FROM watch_lists WHERE user_id = ? AND stock_symbol = ?", [auth()->id(), $symbol]);
        if(count($result) > 0) {
            DB::delete("DELETE FROM watch_lists WHERE user_id = ? AND stock_symbol = ?", [auth()->id(), $symbol]);
            return redirect()->back()->with("toast_success", "Successfully remove from watch list");
        } else {
            DB::insert("INSERT INTO watch_lists (user_id, stock_symbol) VALUES (?, ?)", [auth()->id(), $symbol]);
            return redirect()->back()->with("toast_success", "Successfully add to watch list");
        }
    }


    public static function addUserBalance($userId, $amount, $description) {
        DB::insert("INSERT INTO balance_histories (user_id, balance_before, balance_after, amount, description, type)
            SELECT
              user_id,
              IFNULL(balance_after, 0) AS balance_before,
              IFNULL(balance_after, 0) + ? AS balance_after,
              ? AS amount,
              ? AS description,
              1 AS type
            FROM
              balance_histories
            WHERE
              user_id = ?
            ORDER BY
              id DESC
            LIMIT
              1;
        ", [$amount, $amount, $description, $userId]);
    }

    public static function takeUserBalance($userId, $amount, $description) {
        DB::insert("INSERT INTO balance_histories (user_id, balance_before, balance_after, amount, description, type)
            SELECT
              user_id,
              IFNULL(balance_after, 0) AS balance_before,
              IFNULL(balance_after, 0) - ? AS balance_after,
              ? AS amount,
              ? AS description,
              0 AS type
            FROM
              balance_histories
            WHERE
              user_id = ?
            ORDER BY
              id DESC
            LIMIT
              1;
        ", [$amount, $amount, $description, $userId]);
    }
}
