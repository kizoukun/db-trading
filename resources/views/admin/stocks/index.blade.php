@extends('components.layouts.app')

@section("content")
    <div class="flex justify-between">
        <h1 class="text-black font-bold text-4xl">Admin Stocks</h1>
        <div>
            <a href="/admin/stocks/create" class="bg-blue-500 hover:bg-blue-600 text-white p-3 rounded-lg ">CREATE</a>
        </div>
    </div>
    <!-- Responsive Table Container -->
    <div class="border border-gray-200 rounded overflow-x-auto min-w-full bg-white">
        <!-- Alternate Responsive Table -->
        <table class="min-w-full text-sm align-middle">
            <!-- Table Header -->
            <thead>
            <tr class="bg-gray-50">
                <th class="p-3 text-gray-700 bg-gray-100 font-semibold text-sm tracking-wider uppercase hidden md:table-cell text-center">
                    Image
                </th>
                <th class="p-3 text-gray-700 bg-gray-100 font-semibold text-sm tracking-wider uppercase text-left">
                    Symbol
                </th>
                <th class="p-3 text-gray-700 bg-gray-100 font-semibold text-sm tracking-wider uppercase hidden md:table-cell text-left">
                    Name
                </th>
                <th class="p-3 text-gray-700 bg-gray-100 font-semibold text-sm tracking-wider uppercase text-center">
                    Description
                </th>
                <th class="p-3 text-gray-700 bg-gray-100 font-semibold text-sm tracking-wider uppercase text-center">
                    Total Shares
                </th>
                <th class="p-3 text-gray-700 bg-gray-100 font-semibold text-sm tracking-wider uppercase text-center">
                    Actions
                </th>
            </tr>
            </thead>
            <!-- END Table Header -->

            <!-- Table Body -->
            <tbody>
            @foreach($stocks as $stock)
                <tr>
                    <td class="p-3 hidden md:table-cell text-center">
                        @if($stock->image_uri)
                            <img src="{{ $stock->image_uri }}" alt="User Avatar" class="inline-block w-10 h-10 rounded-full" />
                        @endif
                    </td>
                    <td class="p-3">
                        {{ $stock->symbol }}
                    </td>
                    <td class="p-3">
                        <p class="font-medium">
                            {{ $stock->name }}
                        </p>
                    </td>
                    <td class="p-3 hidden md:table-cell text-gray-500 text-sm">
                        {{ $stock->description }}
                    </td>
                    <td class="p-3 text-center">
                        {{ number_format($stock->total_shares) }}
                     </td>
                    <td class="p-3 text-center space-y-2    ">
                        <a href="/admin/stocks/{{ $stock->symbol }}" class="inline-flex justify-center items-center space-x-2 border font-semibold focus:outline-none px-2 py-1 leading-5 text-sm rounded border-gray-300 bg-white text-gray-800 shadow-sm hover:text-gray-800 hover:bg-gray-100 hover:border-gray-300 hover:shadow focus:ring focus:ring-gray-500 focus:ring-opacity-25 active:bg-white active:border-white active:shadow-none">
                            <svg class="hi-solid hi-pencil inline-block w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"/></svg>
                            <span class="hidden sm:inline">Edit</span>
                        </a>
                        <form method="POST" action="/admin/stocks/{{ $stock->symbol }}">
                            @csrf
                            @method("DELETE")
                            <button type="submit" class="inline-flex justify-center items-center space-x-2 border font-semibold focus:outline-none px-2 py-1 leading-5 text-sm rounded border-gray-300 bg-white text-gray-800 shadow-sm hover:text-gray-800 hover:bg-gray-100 hover:border-gray-300 hover:shadow focus:ring focus:ring-gray-500 focus:ring-opacity-25 active:bg-white active:border-white active:shadow-none">
                                <svg class="hi-solid hi-pencil inline-block w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"/></svg>
                                <span class="hidden sm:inline">Delete</span>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
            <!-- END Table Body -->
        </table>
        <!-- END Alternate Responsive Table -->
    </div>
    <!-- END Responsive Table Container -->
@endsection
