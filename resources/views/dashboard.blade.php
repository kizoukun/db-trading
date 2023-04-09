@extends('components.layouts.app')

@section('content')
    <div class="space-y-4">
        <!-- Slider main container -->
        <div class="swiper h-[120px]">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper">
                <!-- Slides -->
                @foreach($user_stock_amounts as $stock)
                <div class="swiper-slide bg-white rounded-lg p-3">
                    <div class="flex justify-between">
                        <div>
                            <p class="font-semibold text-lg">{{ $stock->name }}</p>
                        </div>
                        <div>
                            <p class="text-lg">{{ $stock->symbol }}</p>
                        </div>
                    </div>
                    <div>
                        <p class="text-md md:text-xl text-gray-400">Current Value</p>
                        <p class="text-md md:text-xl text-green-500 font-semibold">Rp.{{ number_format($stock->amount * $stock->price) }} <span class="text-sm">({{ $stock->amount }})</span></p>
                    </div>
                </div>
                @endforeach

            </div>
            <!-- If we need navigation buttons -->
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-1 xl:grid-cols-3 gap-5">
            <div class="col-span-1 md:col-span-2 lg:col-span-1 xl:col-span-2" id="4">
                <div class="tradingview-widget-container ">
                    <div id="tradingview_88ee4" class="rounded-[20px]" style="height: 500px;border-radius: 20px;"></div>
                    <script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script>
                    <script type="text/javascript">
                        new TradingView.widget({
                            "autosize": true,
                            "symbol": "IDX:BBCA",
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
                <div  class="p-4 rounded-[20px] bg-white">
                    <h1 class="font-bold text-lg lg:text-2xl mb-4">My WatchList</h1>
                    <div class="space-y-4">
                        @foreach($user_watchList as $watch)
                            <div class="grid grid-cols-2 gap-5">
                                <div class="flex items-center">
                                    <img src="{{ $watch->image_uri }}" class="rounded-full h-[32px] w-[32px] mr-2">
                                    <a href="{{ url('/dashboard/stocks/' . $watch->stock_symbol) }}">
                                        <p class="font-bold text-lg">{{ $watch->stock_symbol }}</p>
                                        <p
                                            class="text-md lg:text-[8px] font-semibold text-left text-gray-500"
                                        >
                                            {{ $watch->name }}
                                        </p>
                                    </a>
                                </div>
                                <div class="flex items-center justify-end">
                                    <div>
                                        <p class="font-bold text-lg">Rp. {{ number_format($watch->price ?? 0) }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <h1>Stock List</h1>
    @foreach($stocks as $stock)
        <div>
            <a href="/dashboard/stocks/{{$stock->symbol}}">
                {{ $stock->symbol }}
            </a>
        </div>
    @endforeach
    <h1>Your Portfolio</h1>
    @foreach($user_stock_amounts as $user_stock)
        <div>
            <a href="/dashboard/stocks/{{$user_stock->symbol}}">
                {{ $user_stock->symbol }}
            </a>
            <span>Owned: {{ $user_stock->amount }}</span>
        </div>
    @endforeach
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
