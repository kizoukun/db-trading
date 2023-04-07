@extends('components.layouts.app')
@section('content')
<div class="bg-white w-full max-w-sm rounded-lg shadow-md overflow-hidden mx-auto">
    <div class="px-6 py-4">
      <h2 class="font-bold text-2xl mb-2">Top Up Balance</h2>
      <form action="#" method="POST">
        <div class="mb-4">
          <label class="block text-gray-800 font-bold mb-2" for="amount">
            Amount:
          </label>
          <input
            class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('amount') border-red-500 @enderror"
            id="amount"
            type="number"
            name="amount"
            value="{{ old('amount') }}"
            placeholder="Enter amount"
            required
          />
           @error('amount')
          <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
          @enderror
        </div>
         <button
          class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full focus:outline-none focus:shadow-outline"
          type="submit"
        >
          Top Up
        </button>
      </form>
    </div>
  </div>
@endsection