@extends('components.layouts.app')

@section('content')
<div class="space-y-4">
    <!-- Slider main container -->
    <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-1 xl:grid-cols-3 gap-5">
        <div class="col-span-1 md:col-span-2 lg:col-span-1 xl:col-span-2" id="4">
            <div class="tradingview-widget-container ">
                <div id="tradingview_88ee4" class="rounded-[20px]" style="height: 500px;border-radius: 20px;"></div>
                <script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script>
                <script type="text/javascript">
                    new TradingView.widget({
                        "autosize": true,
                        "symbol": "IDX:{{$id}}",
                        "interval": "D",
                        "timezone": "Etc/UTC",
                        "theme": "dark",
                        "style": "1",
                        "locale": "id",
                        "toolbar_bg": "#f1f3f6",
                        "enable_publishing": false,
                        "allow_symbol_change": true,
                        "container_id": "tradingview_88ee4"
                    });
                </script>
            </div>
            <!-- TradingVie -->
        </div>
        <div id="5">
            <div class="p-4 rounded-[20px] bg-white " style="height: 500px;">
                <h1 class="font-bold text-lg lg:text-2xl mb-4">Market</h1>
                <div class="space-y-4">

                    @foreach($stocks as $stock)

                    <div class="flex justify-between w-full">
                        <a href="{{ $stock->symbol }}" class="grow">{{ $stock->symbol }}</a>
                        <div class="text-right">Rp.{{ $stock->price }}</div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
        <div  class="bg-white p-4 md:col-span-3 rounded-[20px]"> 
        <h1 class="font-bold text-xl border-b border-b-gray-500">Your Open Orders</h1>
            <table border="1" class="w-full table-auto">
        <thead class="text-left text-lg text-black font-bold border-b-black">
            <th>Price</th>
            <th>Type</th>
            <th>Quantity</th>
            <th>Total Price</th>
            <th>Action</th>
        </thead>
        <tbody class="text-sm">
        @foreach($user_open_orders as $open_order)
            <tr class="border-b-2">
                <td>Rp.{{ number_format($open_order->order_price) }}</td>
                <td>{{ $open_order->order_type }}</td>
                <td>{{ $open_order->order_quantity }}</td>
                <td>Rp.{{ number_format($open_order->order_price * $open_order->order_quantity) }}</td>
                <td>
                    <form method="POST">
                        @csrf
                        @method("DELETE")
                        <input type="hidden" name="order_id" value="{{ $open_order->id }}" />
                        <button type="submit" class="bg-red-500 rounded-lg p-2 text-white">Cancel</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
    <div class="md:col-span-3 grid grid-cols-2 gap-5">  
        <div>

            <form action="/dashboard/stocks/{{$stock->symbol}}" method="post" class="bg-white rounded-[20px] p-4">
                <p class="text-3xl font-bold mb-4">Buy Order</p>
                @csrf
                <input type="hidden" name="stock_symbol" value="{{ $stock->symbol }}" />
                <input type="hidden" name="order_type" value="BUY" />
                <div>
                    <label>
                        Quantity
                        <input type="number" name="order_quantity" class="block border border-gray-200 rounded px-3 py-2 leading-6 w-full focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50" />
                    </label>
                </div>
                <div>
                    <label>
                        Price
                        <input type="number" name="order_price" class="block border border-gray-200 rounded px-3 py-2 leading-6 w-full focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50" />
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
                <br/>
                <button type="submit"  class="inline-flex justify-center items-center space-x-2 border font-semibold focus:outline-none px-3 py-2 leading-5 text-sm rounded border-indigo-700 bg-indigo-700 text-white hover:text-white hover:bg-indigo-800 hover:border-indigo-800 focus:ring focus:ring-indigo-500 focus:ring-opacity-50 active:bg-indigo-700 active:border-indigo-700">Submit</button>
            </form>
        </div>
        <div>

        <form action="/dashboard/stocks/{{$stock->symbol}}" method="post" class="bg-white rounded-[20px] p-4">
            <p class="text-3xl font-bold mb-4">Sell Order</p>
            @csrf
            <input type="hidden" name="stock_symbol" value="{{ $stock->symbol }}" />
            <input type="hidden" name="order_type" value="BUY" />
            <div>
                <label>
                    Quantity
                    <input type="number" name="order_quantity" class="block border border-gray-200 rounded px-3 py-2 leading-6 w-full focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50" />
                </label>
            </div>
            <div>
                <label>
                    Price
                    <input type="number" name="order_price" class="block border border-gray-200 rounded px-3 py-2 leading-6 w-full focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50" />
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
            <br/>
            <button type="submit"  class="inline-flex justify-center items-center space-x-2 border font-semibold focus:outline-none px-3 py-2 leading-5 text-sm rounded border-indigo-700 bg-indigo-700 text-white hover:text-white hover:bg-indigo-800 hover:border-indigo-800 focus:ring focus:ring-indigo-500 focus:ring-opacity-50 active:bg-indigo-700 active:border-indigo-700">Submit</button>
        </form>
        </div>
    </div>
        
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
        <div class="bg-white p-4 rounded-[20px]"> 
        <h1 class="font-bold text-xl border-b border-b-gray-500">Buy Open Orders</h1>
            <table border="1" class="w-full table-auto">
                <thead class="text-left text-lg text-black font-bold border-b-black">
                    <th>Price</th>
                    <th>Type</th>
                    <th>Quantity</th>
                </thead>
                <tbody class="text-sm">
                @foreach($buy_orders as $buy_open)
                    <tr class="border-b-2">
                        <td>Rp.{{ number_format($buy_open->order_price) }}</td>
                        <td>{{ $buy_open->order_type }}</td>
                        <td>{{ $buy_open->order_quantity }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="bg-white p-4 rounded-[20px]">
            <h1 class="font-bold text-xl border-b border-b-gray-500">Sell Open Orders</h1>
            <table border="1" class="w-full table-auto">
                <thead class="text-left text-lg text-black font-bold border-b-black">
                    <th>Price</th>
                    <th>Type</th>
                    <th>Quantity</th>
                </thead>
                <tbody class="text-sm">
                @foreach($sell_orders as $sell_open)
                    <tr class="border-b-2">
                        <td>Rp.{{ number_format($open_order->order_price) }}</td>
                        <td>{{ $sell_open->order_type }}</td>
                        <td>{{ $sell_open->order_quantity }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script>
        const swiper = new Swiper('.swiper', {
            // Optional parameters
            direction: 'horizontal',
            loop: true,
            slidesPerView: 1,
            spaceBetween: 15,
            breakpoints: {
                640: {
                    slidesPerView: 3,
                },
                1024: {
                    slidesPerView: 5,
                },
            },
            // Navigation arrows
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });
    </script>
    @endsection