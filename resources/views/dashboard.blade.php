@extends('components.layouts.app')
@section('content')
    <h1>Stock List</h1>
    @foreach ($stocks as $stock)
        <a href="/dashboard/stocks/{{ $stock->symbol }}">
            {{ $stock->symbol }}
        </a>

        <div>
            <a href="/dashboard/stocks/{{ $stock->symbol }}">
                {{ $stock->symbol }}
            </a>
        </div>
    @endforeach
    <h1>Your Portfolio</h1>
    @foreach ($user_stock_amounts as $user_stock)
        <div>
            <a href="/dashboard/stocks/{{ $user_stock->symbol }}">
                {{ $user_stock->symbol }}
            </a>
            <span>Owned: {{ $user_stock->amount }}</span>
        </div>
    @endforeach
@endsection
