<!doctype html>
<html lang="en">
<head>
    @include("components.header")
    <title>Document</title>
</head>
<body>
    <form action="/auth/register" method="post" class="space-y-4">
        @csrf
        <div>
            <label for="email">Email</label>
            <input id="email" name="email" type="email" value="" class="border border-black rounded-md">
        </div>
        <div>
            <label for="first_name">First Name</label>
            <input id="first_name" name="first_name" type="text" value="" class="border border-black rounded-md">
        </div>
        <div>
            <label for="last_name">Last Name</label>
            <input id="last_name" name="last_name" type="text" value="" class="border border-black rounded-md">
        </div>
        <div>
            <label for="phone_number">Phone Number</label>
            <input id="phone_number" name="phone_number" type="text" value="" class="border border-black rounded-md">
        </div>
        <div>
            <label for="address">Address</label>
            <input id="address" name="address" type="text" value="" class="border border-black rounded-md">
        </div>
        <div>
            <label for="password">Password</label>
            <input id="password" name="password" type="password" value="" class="border border-black rounded-md">
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
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Register</button>
    </form>
</body>
</html>
