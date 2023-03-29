<!doctype html>
<html lang="en">
<head>
    @include("components.header")
    <title>Document</title>
    <style>
        th, td {
            border: black;
        }
    </style>
</head>
<body>
    <h1>User Balance Histories</h1>
    <form action="/dashboard/deposit" method="post">
        @csrf
        <div>
            <label>
                Deposit Amount
                <input type="number" name="amount" class="block border border-black" />
            </label>
        </div>
        <button type="submit" class="bg-blue-500 hover:bg-blue-600 p-2 rounded-lg text-white">Submit</button>
    </form>
    @if ($errors->any())
        <div class="text-red-500 font-medium">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <table class="border border-black table-auto">
        <thead>
            <tr>
                <th>After</th>
                <th>Before</th>
                <th>Amount</th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
            @foreach($histories as $history)
            <tr>
                <td>{{ number_format($history->balance_after) }}</td>
                <td>{{ number_format($history->balance_before) }}</td>
                <td>{{ number_format($history->amount) }}</td>
                <td>{{ $history->description }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
