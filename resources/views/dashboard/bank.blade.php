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
<form action="/dashboard/bank" method="post">
    @csrf
    <div>
        <label>
            Select Bank
            <select class="block border border-black" name="bank_code">
                @foreach($bank_list as $bank)
                    <option value="{{ $bank->code }}">{{ $bank->name }}</option>
                @endforeach
            </select>
        </label>
        <label>
            Account Number
            <input type="text" name="account_number" class="block border border-black" />
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
        <th>Code</th>
        <th>Account No</th>
    </tr>
    </thead>
    <tbody>
    @foreach($user_banks as $user_bank)
        <tr>
            <td>{{ $user_bank->bank_code }}</td>
            <td>{{ $user_bank->account_no }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
</body>
</html>
