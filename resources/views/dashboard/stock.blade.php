<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="/dashboard/stocks/{{$stock->symbol}}" method="post">
        @csrf
        <input type="hidden" name="stock_symbol" value="{{ $stock->symbol }}" />
        <div>
            <label>
                Quantity
                <input type="number" name="order_quantity" class="block border border-black" />
            </label>
        </div>
        <div>
            <label>
                Price
                <input type="number" name="order_price" class="block border border-black" />
            </label>
        </div>
        <div>
            <label>
                Type
                <select class="block border border-black" name="order_type">
                    <option value="BUY">Buy</option>
                    <option value="SELL">Sell</option>
                </select>
            </label>
        </div>
        @if ($errors->any())
            <div class="text-red-500 font-medium">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <button type="submit" class="bg-blue-500 hover:bg-blue-600 p-2 rounded-lg text-white">Submit</button>
    </form>
    <h1>Buy Orders</h1>
    <table border="1" width="100%">
        <thead>
            <tr>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total Price</th>
            </tr>
        </thead>
        <tbody>
            @foreach($buy_orders as $buy_order)
                <tr>
                    <td>{{ $buy_order->order_price }}</td>
                    <td>{{ $buy_order->order_quantity }}</td>
                    <td>{{ number_format($buy_order->order_price * $buy_order->order_quantity) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <h1>Sell Orders</h1>
    <table border="1" width="100%">
        <thead>
        <tr>
            <th>Price</th>
            <th>Quantity</th>
            <th>Total Price</th>
        </tr>
        </thead>
        <tbody>
        @foreach($sell_orders as $sell_order)
            <tr>
                <td>{{ $sell_order->order_price }}</td>
                <td>{{ $sell_order->order_quantity }}</td>
                <td>{{ number_format($sell_order->order_price * $sell_order->order_quantity) }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
            <h1>User Open Orders</h1>
            <table border="1" width="100%">
                <thead>
                <tr>
                    <th>Price</th>
                    <th>Type</th>
                    <th>Quantity</th>
                    <th>Total Price</th>
                    <th>Cancel</th>
                </tr>
                </thead>
                <tbody>
                @foreach($user_open_orders as $user_open)
                    <tr>
                        <td>{{ $user_open->order_price }}</td>
                        <td>{{ $user_open->order_type }}</td>
                        <td>{{ $user_open->order_quantity }}</td>
                        <td>{{ number_format($user_open->order_price * $user_open->order_quantity) }}</td>
                        <td>
                            <form method="POST">
                                @csrf
                                @method("DELETE")
                                <input type="hidden" name="order_id" value="{{ $user_open->id }}" />
                                <button type="submit" >Cancel</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
</body>
</html>
