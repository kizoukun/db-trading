@extends('components.layouts.app')

@section('content')
    <!-- Form -->
    <form onsubmit="return false;">
        <!-- Card -->
        <div class="flex flex-col rounded shadow-sm bg-white overflow-hidden">
            <!-- Card Header -->
            <div class="py-4 px-5 lg:px-6 w-full bg-gray-50 sm:flex sm:justify-between sm:items-center">
                <div class="text-center sm:text-left">
                    <h3 class="font-semibold">
                        All Orders
                    </h3>
                    <h4 class="text-gray-500 text-sm">
                        You have <a href="javascript:void(0)" class="text-indigo-600 hover:text-indigo-400">10 new orders</a>
                    </h4>
                </div>
                <div class="mt-3 sm:mt-0 text-center sm:text-right sm:w-48">
                    <select
                        class="block border border-gray-200 rounded px-3 py-2 w-full focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50">
                        <option>Today</option>
                        <option>Last 7 days</option>
                        <option>Last 15 days</option>
                        <option selected="selected">Last 30 days</option>
                        <option>Last Year</option>
                    </select>
                </div>
            </div>
            <div class="p-5 lg:p-6 grow w-full border-b border-gray-100">
                <div class="relative">
                    <div
                        class="absolute inset-y-0 left-0 w-10 my-px ml-px flex items-center justify-center pointer-events-none rounded-l text-gray-500">
                        <svg fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"
                            class="hi-solid hi-search inline-block w-5 h-5">
                            <path fill-rule="evenodd"
                                d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <input
                        class="block border border-gray-200 rounded pl-10 pr-3 py-2 leading-6 w-full focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50"
                        type="text" placeholder="Search all orders.." />
                </div>
            </div>
            <!-- END Card Header -->

            <!-- Card Body -->
            <div class="p-5 lg:p-6 grow w-full">
                <!-- Placeholder -->
                <div class="border border-gray-200 rounded overflow-x-auto min-w-full bg-white">
                    <!-- Alternate Responsive Table -->
                    <table class="min-w-[768px] w-full text-sm align-middle">
                        <!-- Table Header -->
                        <thead>
                            <tr class="bg-gray-50">
                                <th
                                    class="p-3 text-gray-700 bg-gray-100 font-semibold text-sm tracking-wider uppercase text-left">
                                    ID
                                </th>
                                <th
                                    class="p-3 text-gray-700 bg-gray-100 font-semibold text-sm tracking-wider uppercase text-left">
                                    Order ID
                                </th>
                                <th
                                    class="p-3 text-gray-700 bg-gray-100 font-semibold text-sm tracking-wider uppercase text-left">
                                    Stock Symbol
                                </th>
                                <th
                                    class="p-3 text-gray-700 bg-gray-100 font-semibold text-sm tracking-wider uppercase text-center">
                                    Order Type
                                </th>
                                <th
                                    class="p-3 text-gray-700 bg-gray-100 font-semibold text-sm tracking-wider uppercase text-center">
                                    Order Quantity
                                </th>
                                <th
                                    class="p-3 text-gray-700 bg-gray-100 font-semibold text-sm tracking-wider uppercase text-center">
                                    Price
                                </th>
                                <th
                                    class="p-3 text-gray-700 bg-gray-100 font-semibold text-sm tracking-wider uppercase text-center">
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <!-- END Table Header -->

                        <!-- Table Body -->
                        <tbody>
                            @foreach ($openOrders as $open)
                                <tr>
                                    <td class="p-3">
                                        {{ $open->id }}
                                    </td>
                                    <td class="p-3">
                                        {{ $open->order_id }}
                                    </td>
                                    <td class="p-3">
                                        {{ $open->stock_symbol }}
                                    </td>
                                    <td class="p-3">
                                        {{ $open->order_type }}
                                    </td>
                                    <td class="p-3">
                                        {{ $open->order_quantity }}
                                    </td>
                                    <td class="p-3">
                                        {{ $open->order_price }}
                                    </td>
                                    <td class="p-3 text-center space-y-2    ">
                                        <form id="deleteForm" method="POST"
                                            action="/admin/open-orders/{{ $open->id }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="inline-flex justify-center items-center space-x-2 border font-semibold focus:outline-none px-2 py-1 leading-5 text-sm rounded border-gray-300 bg-white text-gray-800 shadow-sm hover:text-gray-800 hover:bg-gray-100 hover:border-gray-300 hover:shadow focus:ring focus:ring-gray-500 focus:ring-opacity-25 active:bg-white active:border-white active:shadow-none">
                                                <svg class="hi-solid hi-pencil inline-block w-4 h-4" fill="currentColor"
                                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                                </svg>
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
            </div>
            <!-- END Card Body -->
        </div>
        <!-- END Card -->
    </form>

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
@endsection
