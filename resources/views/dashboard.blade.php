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
</body>
</html>
