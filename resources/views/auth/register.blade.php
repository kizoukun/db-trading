<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register - {{ config('app.name', 'Laravel') }}</title>
    @vite('resources/css/app.css')

      <!-- Favicons -->
      <link rel="icon" href="favicon.svg" sizes="any" type="image/svg+xml">
      <link rel="icon" href="favicon.png" type="image/png">

      <!-- Main Stylesheet -->
      <!-- Based on your project, you might need to include the compiled CSS file if it is not automatically injected in your pages -->
      <!-- <link rel="stylesheet" href="css/{main-stylesheet-name}.css"> -->
      
      <!-- Inter web font from Google -->
      <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

      <!-- Alpine.js, uncomment if you would like to use Tailkit’s Alpine JS based components -->
      {{-- <script src="//unpkg.com/alpinejs" defer></script> --}}
</head>
<body>
{{-- <a href="/auth/login" class="text-blue-500 hover:text-blue-600 hover:underline text-lg">Login</a>
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
    </form> --}}

    <!-- Page Container -->
<div id="page-container" class="flex flex-col mx-auto w-full min-h-screen bg-gray-100">
    <!-- Page Content -->
    <main id="page-content" class="flex flex-auto flex-col max-w-full">
      <div class="min-h-screen flex flex-col bg-cover bg-bottom" style="background-image: url('https://source.unsplash.com/9XngoIpxcEo/1920x1200');">
        <!-- Sign Up Section -->
        <div class="flex grow md:w-8/12 lg:w-5/12 xl:w-4/12 bg-white shadow-xl">
          <div class="flex flex-col p-8 lg:p-16 xl:p-20 w-full">
            <!-- Sign Up Content -->
            <div class="grow flex items-center">
              <div class="w-full max-w-lg mx-auto space-y-10">
                <!-- Header -->
                <div>
                  <h1 class="text-4xl font-bold inline-flex items-center mb-1 space-x-3">
                    <svg fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" class="text-indigo-500 hi-solid hi-cube-transparent inline-block w-8 h-8"><path fill-rule="evenodd" d="M9.504 1.132a1 1 0 01.992 0l1.75 1a1 1 0 11-.992 1.736L10 3.152l-1.254.716a1 1 0 11-.992-1.736l1.75-1zM5.618 4.504a1 1 0 01-.372 1.364L5.016 6l.23.132a1 1 0 11-.992 1.736L4 7.723V8a1 1 0 01-2 0V6a.996.996 0 01.52-.878l1.734-.99a1 1 0 011.364.372zm8.764 0a1 1 0 011.364-.372l1.733.99A1.002 1.002 0 0118 6v2a1 1 0 11-2 0v-.277l-.254.145a1 1 0 11-.992-1.736l.23-.132-.23-.132a1 1 0 01-.372-1.364zm-7 4a1 1 0 011.364-.372L10 8.848l1.254-.716a1 1 0 11.992 1.736L11 10.58V12a1 1 0 11-2 0v-1.42l-1.246-.712a1 1 0 01-.372-1.364zM3 11a1 1 0 011 1v1.42l1.246.712a1 1 0 11-.992 1.736l-1.75-1A1 1 0 012 14v-2a1 1 0 011-1zm14 0a1 1 0 011 1v2a1 1 0 01-.504.868l-1.75 1a1 1 0 11-.992-1.736L16 13.42V12a1 1 0 011-1zm-9.618 5.504a1 1 0 011.364-.372l.254.145V16a1 1 0 112 0v.277l.254-.145a1 1 0 11.992 1.736l-1.735.992a.995.995 0 01-1.022 0l-1.735-.992a1 1 0 01-.372-1.364z" clip-rule="evenodd"></path></svg>
                    <span>Radiant</span>
                  </h1>
                  <p class="text-gray-500">
                    Create your account to trade
                  </p>
                </div>
                <!-- END Header -->
  
                <!-- Sign Up Form -->
                <form action="{{ route('registeruser') }}" method="POST" class="space-y-6">
                    @csrf
                  <div class="space-y-1">
                    <label for="first_name" class="font-medium">First Name</label>
                    <input class="block border placeholder-gray-400 px-5 py-3 leading-6 w-full rounded border-gray-200 focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50" type="text" id="first_name" name="first_name" placeholder="Enter your first name" />
                  </div>
                  <div class="space-y-1">
                    <label for="last_name" class="font-medium">Last Name</label>
                    <input class="block border placeholder-gray-400 px-5 py-3 leading-6 w-full rounded border-gray-200 focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50" type="text" id="last_name" name="last_name" placeholder="Enter your last name" />
                  </div>
                  <div class="space-y-1">
                    <label for="email" class="font-medium">Email</label>
                    <input class="block border placeholder-gray-400 px-5 py-3 leading-6 w-full rounded border-gray-200 focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50" type="email" id="email" name="email" placeholder="Enter your email" />
                  </div>
                  <div class="space-y-1">
                    <label for="phone_number" class="font-medium">Phone Number</label>
                    <input class="block border placeholder-gray-400 px-5 py-3 leading-6 w-full rounded border-gray-200 focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50" type="text" id="phone_number" name="phone_number" placeholder="Enter your phone number" />
                  </div>
                  <div class="space-y-1">
                    <label for="address" class="font-medium">Address</label>
                    <input class="block border placeholder-gray-400 px-5 py-3 leading-6 w-full rounded border-gray-200 focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50" type="text" id="address" name="address" placeholder="Enter your last name" />
                  </div>
                  <div class="space-y-1">
                    <label for="password" class="font-medium">Password</label>
                    <input class="block border placeholder-gray-400 px-5 py-3 leading-6 w-full rounded border-gray-200 focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50" type="password" id="password" name="password" placeholder="Choose a strong password" />
                  </div>
                  {{-- <div class="space-y-1">
                    <label for="tk-pages-sign-up-password-confirm" class="font-medium">Confirm Password</label>
                    <input class="block border placeholder-gray-400 px-5 py-3 leading-6 w-full rounded border-gray-200 focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50" type="password" id="password-confirm" placeholder="Confirm your chosen password" />
                  </div> --}}
                    @if ($errors->any())
                    <div class="text-red-500 font-medium">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                  <div class="flex items-center">
                    <input type="checkbox" class="border border-gray-300 rounded h-4 w-4 text-indigo-500 focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50" />
                    <span class="ml-2"> I accept <a href="javascript:void(0)" class="font-medium underline text-gray-600 hover:text-gray-500">terms &amp; conditions</a></span>
                  </div>
                  <button type="submit" class="inline-flex justify-center items-center space-x-2 border font-semibold focus:outline-none w-full px-4 py-3 leading-6 rounded border-indigo-700 bg-indigo-700 text-white hover:text-white hover:bg-indigo-800 hover:border-indigo-800 focus:ring focus:ring-indigo-500 focus:ring-opacity-50 active:bg-indigo-700 active:border-indigo-700">
                    Create Account
                  </button>
                </form>
                <!-- END Sign Up Form -->
  
                <div class="text-sm text-gray-500">
                  <a href="{{ route('login') }}" class="font-medium text-indigo-600 hover:text-indigo-400">Return to Sign In</a>
                </div>
              </div>
            </div>
            <!-- END Sign Up Content -->
  
            <!-- Footer -->
            <div class="text-sm text-gray-500 text- pt-20">
              <a href="https://tailkit.com" class="font-medium text-indigo-600 hover:text-indigo-400" target="_blank">Tailkit</a> by
              <a href="https://pixelcave.com" class="font-medium text-indigo-600 hover:text-indigo-400" target="_blank">pixelcave</a>
            </div>
            <!-- END Footer -->
          </div>
        </div>
        <!-- END Sign Up Section -->
      </div>
    </main>
    <!-- END Page Content -->
  </div>
  <!-- END Page Container -->

</body>
</html>