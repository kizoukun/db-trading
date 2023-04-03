@extends('components.layouts.app')

@section('content')
    <div class="space-y-4">
        <div class="grid grid-cols-5 gap-5">
          <div class="flex flex-col h-28 px-3 py-4 bg-[#F2C8C4] rounded-lg space-y-4">
            <div class="flex justify-between items-center gap-28">
              <div class="flex justify-start items-center w-16 space-x-1">
                <p class="text-xs font-medium text-left text-[#242624]">Nvidia</p>
              </div>
              <div class="flex flex-col justify-center items-end w-8 space-y-1">
                <p class="text-xs text-right uppercase text-[#242624]">NVDA</p>
                <p class="text-xs text-right uppercase text-green-500">+5.63</p>
              </div>
            </div>
            <div class="flex justify-start items-center gap-8">
              <div class="flex flex-col justify-start items-start space-y-0">
                <p class="text-xs text-left text-[#A68F8F]">
                  Current Value
                </p>
                <p class="text-lg font-medium text-left text-green-500">
                  $203.65
                </p>
              </div>
              <svg
                width="80"
                height="25"
                viewBox="0 0 80 25"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
                class="w-20 h-6"
              >
                <!-- SVG code -->
              </svg>
            </div>
          </div>
          <div class="flex flex-col h-28 px-3 py-4 bg-[#F2C8C4] rounded-lg space-y-4">
            <div class="flex justify-between items-center gap-28">
              <div class="flex justify-start items-center w-16 space-x-1.5">
                <svg
                  width="24"
                  height="24"
                  viewBox="0 0 24 24"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg"
                  class="w-6 h-6"
                >
                  <!-- SVG code -->
                </svg>
                <p class="text-xs font-medium text-left text-[#242426]">Meta</p>
              </div>
              <div class="flex flex-col justify-center items-end w-8 space-y-1">
                <p class="text-xs text-right uppercase text-[#242624]">META</p>
                <p class="text-xs text-right uppercase text-red-500">-4.4</p>
              </div>
            </div>
            <div class="flex justify-start items-center gap-8">
              <div class="flex flex-col justify-start items-start space-y-0">
                <p class="text-xs text-left text-[#A68F8F]">
                  Current Value
                </p>
                <p class="text-lg font-medium text-left text-red-500">
                  $151.74
                </p>
              </div>
              <svg
                width="80"
                height="25"
                viewBox="0 0 80 25"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
                class="w-20 h-6"
              >
                <!-- SVG code -->
              </svg>
            </div>
          </div>
          <div class="flex flex-col h-28 px-3 py-4 bg-[#F2C8C4] rounded-lg space-y-4">
            <div class="flex justify-between items-center gap-28">
              <div class="flex justify-start items-center w-16 space-x-1.5">
                <svg
                  width="24"
                  height="24"
                  viewBox="0 0 24 24"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg"
                  class="w-6 h-6"
                >
                  <!-- SVG code -->
                </svg>
                <p class="text-xs font-medium text-left text-[#242426]">Tesla inc</p>
              </div>
              <div class="flex flex-col justify-center items-end w-8 space-y-1">
                <p class="text-xs text-right uppercase text-[#242624]">TSLA</p>
                <p class="text-xs text-right uppercase text-green-500">+17.63</p>
              </div>
            </div>
            <div class="flex justify-start items-center gap-8">
              <div class="flex flex-col justify-start items-start space-y-0">
                <p class="text-xs text-left text-[#A68F8F]">
                  Current Value
                </p>
                <p class="text-lg font-medium text-left text-green-500">
                  $151.74
                </p>
              </div>
              <svg
                width="80"
                height="25"
                viewBox="0 0 80 25"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
                class="w-20 h-6"
              >
                <!-- SVG code -->
              </svg>
            </div>
          </div>
          <div class="flex flex-col h-28 px-3 py-4 bg-[#F2C8C4] rounded-lg space-y-4">
            <div class="flex justify-between items-center gap-28">
              <div class="flex justify-start items-center w-16 space-x-1.5">
                <svg
                  width="24"
                  height="24"
                  viewBox="0 0 24 24"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg"
                  class="w-6 h-6"
                >
                  <!-- SVG code -->
                </svg>
                <p class="text-xs font-medium text-left text-[#242426]">Apple inc</p>
              </div>
              <div class="flex flex-col justify-center items-end w-8 space-y-1">
                <p class="text-xs text-right uppercase text-[#242624]">AAPL</p>
                <p class="text-xs text-right uppercase text-green-500">+23.41</p>
              </div>
            </div>
            <div class="flex justify-start items-center gap-8">
              <div class="flex flex-col justify-start items-start space-y-0">
                <p class="text-xs text-left text-[#A68F8F]">
                  Current Value
                </p>
                <p class="text-lg font-medium text-left text-green-500">
                  $151.74
                </p>
              </div>
              <svg
                width="80"
                height="25"
                viewBox="0 0 80 25"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
                class="w-20 h-6"
              >
                <!-- SVG code -->
              </svg>
            </div>
          </div>
          <div class="flex flex-col h-28 px-3 py-4 bg-[#F2C8C4] rounded-lg space-y-4">
            <div class="flex justify-between items-center gap-28">
              <div class="flex justify-start items-center w-16 space-x-1.5">
                <svg
                  width="24"
                  height="24"
                  viewBox="0 0 24 24"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg"
                  class="w-6 h-6"
                >
                  <!-- SVG code -->
                </svg>
                <p class="text-xs font-medium text-left text-[#242426]">Netflix</p>
              </div>
              <div class="flex flex-col justify-center items-end w-8 space-y-1">
                <p class="text-xs text-right uppercase text-[#242624]">NFLX</p>
                <p class="text-xs text-right uppercase text-green-500">+2.08</p>
              </div>
            </div>
            <div class="flex justify-start items-center gap-8">
              <div class="flex flex-col justify-start items-start space-y-0">
                <p class="text-xs text-left text-[#A68F8F]">
                  Current Value
                </p>
                <p class="text-lg font-medium text-left text-green-500">
                  $345.48
                </p>
              </div>
              <svg
                width="80"
                height="25"
                viewBox="0 0 80 25"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
                class="w-20 h-6"
              >
                <!-- SVG code -->
              </svg>
            </div>
          </div>
        </div>
        <div class="grid grid-cols-3 gap-5">
          <div class="flex flex-col justify-start items-start h-[436px] w-[340px] gap-5 px-3 py-5 rounded-lg bg-white relative">
            <div class="gap-24 absolute left-3 top-[218px]">
              <div class="flex flex-col justify-start items-start gap-1 relative">
                <p class="text-xs text-left capitalize text-[#838383] w-[70px] h-[18px]">Top Stock</p>
                <div class="flex flex-col justify-center items-center gap-4 px-3 py-4 rounded-lg bg-white">
                  <div class="flex justify-start items-center gap-8">
                    <div class="flex flex-row items-center gap-1.5">
                      <!-- SVG icon -->
                      <p class="text-xs font-medium text-left text-[#2c2c2c]">Tesla Inc</p>
                    </div>
                    <div class="flex flex-col justify-center items-end w-[33px] relative">
                      <p class="text-xs text-right uppercase text-[#2c2c2c]">TSLA</p>
                      <p class="text-xs text-right uppercase text-[#77b900]">+17.63</p>
                    </div>
                  </div>
                  <div class="flex justify-start items-center gap-8">
                    <div class="flex flex-col justify-start items-start gap-1">
                      <p class="text-xs text-left capitalize text-[#838383]">Invested Value</p>
                      <p class="text-sm font-medium text-left capitalize text-[#2c2c2c]">$29.34</p>
                    </div>
                    <div class="flex flex-col justify-start items-start gap-1">
                      <p class="text-xs text-left capitalize text-[#838383]">Current Value</p>
                      <p class="text-sm font-medium text-left capitalize text-[#2c2c2c]">$177.90</p>
                    </div>
                    <!-- SVG chart -->
                  </div>
                </div>
              </div>
            </div>
            <div class="absolute left-3 top-[371px] overflow-hidden gap-24"></div>
            <div class="flex flex-col justify-start items-start gap-1.5">
              <p class="text-sm font-medium text-center text-[#2c2c2c]">Balance</p>
              <div class="flex flex-col justify-start items-start gap-1.5">
                <div class="bg-[#6425fe] py-4 px-5 w-[252px] rounded-lg">
                  <p class="text-xl font-medium text-left text-white">$14,032.56</p>
                </div>
              </div>
            </div>
            <div class="flex flex-col justify-start items-start gap-1.5 relative">
              <p class="text-sm font-medium text-center text-[#2c2c2c]">Invested</p>
              <div class="bg-[#2c2c2c] py-4 px-5 w-[316px] rounded-lg">
                <p class="text-xl font-medium text-left text-white">$7,532.21</p>
              </div>
              <div class="w-10 h-10 gap-2.5 p-2.5 bg-[#6425fe] rounded-lg absolute left-[268px] top-[31px]">
                <!-- SVG icon -->
              </div>
            </div>
            <div class="w-[316px] h-[50px] bg-gradient-to-b from-white via-white to-transparent"></div>
            <div class="w-14 h-14 bg-[#c7ffa5] rounded-lg absolute left-[272px] top-[43px] flex items-center justify-center">
              <p class="text-sm text-center uppercase text-[#2c2c2c]">+5.63%</p>
            </div>
            <div class="w-10 h-10 bg-[#6425fe] rounded-lg absolute left-48 top-[376px] flex items-center justify-center">
              <!-- SVG icon -->
            </div>
          </div>
            <div class="bg-green-500" id="2">
                <h1>ads</h1>
            </div>
            <div class="bg-red-500" id="3">
                <h1>ads</h1>
            </div>
            <div class="bg-blue-500 col-span-2" id="4">
                <h1>ads</h1>
            </div>
            <div class="bg-blue-500" id="5">
                <h1>ads</h1>
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
@endsection
