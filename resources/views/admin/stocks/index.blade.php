@extends('components.layouts.app')

@section("content")
<!-- Form -->
<div class="flex justify-between">
    <h1 class="text-black font-bold text-4xl">Admin Stocks</h1>
    <div>
        <a href="/admin/stocks/create" class="bg-blue-500 hover:bg-blue-600 text-white p-3 rounded-lg ">CREATE</a>
    </div>
</div>
    <!-- Card -->
    <div class="flex flex-col rounded shadow-sm bg-white overflow-hidden">
        <form method="GET" action="{{ url('/admin/stocks') }}">
        <!-- Card Header -->
      <div class="py-4 px-5 lg:px-6 w-full bg-gray-50 sm:flex sm:justify-between sm:items-center">
        <div class="text-center sm:text-left">
          <h3 class="font-semibold">
            All Stocks
          </h3>
        </div>
        <div class="mt-3 sm:mt-0 text-center sm:text-right sm:w-48">
          <select onchange="this.form.submit()" name="date" class="block border border-gray-200 rounded px-3 py-2 w-full focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50">
            <option value="1">Today</option>
            <option value="7">Last 7 days</option>
            <option value="15">Last 15 days</option>
            <option value="30">Last 30 days</option>
            <option value="365">Last Year</option>
            <option value="3650" selected>All Time</option>
          </select>
        </div>
      </div>
      <div class="p-5 lg:p-6 grow w-full border-b border-gray-100">
        <div class="relative">
          <div class="absolute inset-y-0 left-0 w-10 my-px ml-px flex items-center justify-center pointer-events-none rounded-l text-gray-500">
            <svg fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" class="hi-solid hi-search inline-block w-5 h-5"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
          </div>
          <input name="search" class="block border border-gray-200 rounded pl-10 pr-3 py-2 leading-6 w-full focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50" type="text" placeholder="Search all stocks.." />
        </div>
      </div>
        </form>
        <!-- END Card Header -->

      <!-- Card Body -->
      <div class="p-5 lg:p-6 grow w-full">
        <!-- Responsive Table Container -->
    <div class="border border-gray-200 rounded overflow-x-auto min-w-full bg-white">
        <!-- Alternate Responsive Table -->
        <table class="min-w-full text-sm align-middle">
            <!-- Table Header -->
            <thead>
            <tr class="bg-gray-50">
                <th class="p-3 text-white bg-black font-semibold text-sm tracking-wider uppercase hidden md:table-cell text-center">
                    Image
                </th>
                <th class="p-3 text-white bg-black font-semibold text-sm tracking-wider uppercase text-left">
                    Symbol
                </th>
                <th class="p-3 text-white bg-black font-semibold text-sm tracking-wider uppercase hidden md:table-cell text-left">
                    Name
                </th>
                <th class="p-3 text-white bg-black font-semibold text-sm tracking-wider uppercase text-center">
                    Description
                </th>
                <th class="p-3 text-white bg-black font-semibold text-sm tracking-wider uppercase text-center">
                    Total Shares
                </th>
                <th class="p-3 text-white bg-black font-semibold text-sm tracking-wider uppercase text-center">
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
                        <form id="deleteForm" method="POST" action="/admin/stocks/{{ $stock->symbol }}">
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
    <script>
        const deleteForm = document.querySelector("#deleteForm");
        deleteForm.addEventListener("submit", (e) => {
            e.preventDefault();
            if (confirm("Are you sure you want to delete this stock?")) {
                deleteForm.submit();
            }
        })
    </script>
    <!-- END Responsive Table Container -->
      </div>
      <!-- END Card Body -->
    </div>
    <!-- END Card -->
  <!-- END Form -->

@endsection
