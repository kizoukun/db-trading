@extends('components.layouts.app')

@section('content')
    <div class="space-y-4">
        <div class="grid grid-cols-5 gap-5">
            <div class="bg-blue-500">
                <h1>ads</h1>
            </div>
            <div class="bg-blue-500">
                <h1>ads</h1>
            </div>
            <div class="bg-blue-500">
                <h1>ads</h1>
            </div>
            <div class="bg-blue-500">
                <h1>ads</h1>
            </div>
            <div class="bg-blue-500">
                <h1>ads</h1>
            </div>
        </div>
        <div class="grid grid-cols-3 gap-5">
            <div class="bg-blue-500">
                <h1>ads</h1>
            </div>
            <div class="bg-blue-500">
                <h1>ads</h1>
            </div>
            <div class="bg-blue-500">
                <h1>ads</h1>
            </div>
            <div class="bg-blue-500 col-span-2">
                <h1>ads</h1>
            </div>
            <div class="bg-blue-500">
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
