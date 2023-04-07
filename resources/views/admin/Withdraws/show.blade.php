@extends('components.layouts.app')

@section("content")
    <div class="flex justify-between">
        <h1 class="text-black font-bold text-4xl">Admin Withdraws</h1>
    </div>
    <!-- Responsive Table Container -->
    <div class="border border-gray-200 rounded overflow-x-auto min-w-full bg-white">
        <!-- Alternate Responsive Table -->
        <table class="min-w-[768px] w-full text-sm align-middle">
            <!-- Table Header -->
            <thead>
            <tr class="bg-gray-50">
                <th class="p-3 text-gray-700 bg-gray-100 font-semibold text-sm tracking-wider uppercase text-left">
                    ID
                </th>
                <th class="p-3 text-gray-700 bg-gray-100 font-semibold text-sm tracking-wider uppercase text-left">
                    User Name
                </th>
                <th class="p-3 text-gray-700 bg-gray-100 font-semibold text-sm tracking-wider uppercase text-left">
                    Amount
                </th>
                <th class="p-3 text-gray-700 bg-gray-100 font-semibold text-sm tracking-wider uppercase text-center">
                    Description
                </th>
                <th class="p-3 text-gray-700 bg-gray-100 font-semibold text-sm tracking-wider uppercase text-center">
                    Status
                </th>
                <th class="p-3 text-gray-700 bg-gray-100 font-semibold text-sm tracking-wider uppercase text-center">
                    Actions
                </th>
            </tr>
            </thead>
            <!-- END Table Header -->

            <!-- Table Body -->
            <tbody>
            @foreach($deposits as $deposit)
                <tr>
                    <td class="p-3">
                        {{ $deposit->id}}
                    </td>
                    <td class="p-3">
                        {{ $deposit->first_name}} {{ $deposit->last_name}}
                    </td>
                    <td class="p-3">
                        {{ $deposit->amount}}
                    </td>
                    <td class="p-3">
                        {{ $deposit->description }}
                    </td>
                    <td class="p-3 text-center">
                        @if($deposit->status == "ACCEPTED")
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                            {{ $deposit->status }}
                            </span>
                        @elseif($deposit->status == "REJECTED")
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                              {{ $deposit->status }}
                            </span>
                        @else
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                              {{ $deposit->status }}
                            </span>
                        @endif
                    </td>
                    <td class="p-3 text-center space-y-2    ">
                        <a href="{{ url('/admin/withdraws/' . $deposit->id) }}" class="inline-flex justify-center items-center space-x-2 border font-semibold focus:outline-none px-2 py-1 leading-5 text-sm rounded border-gray-300 bg-white text-gray-800 shadow-sm hover:text-gray-800 hover:bg-gray-100 hover:border-gray-300 hover:shadow focus:ring focus:ring-gray-500 focus:ring-opacity-25 active:bg-white active:border-white active:shadow-none">
                            <svg class="hi-solid hi-pencil inline-block w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"/></svg>
                            <span class="hidden sm:inline">Edit</span>
                        </a>
                        <form id="deleteForm" method="POST" action="{{ url('/admin/withdraws/' . $deposit->id) }}">
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
            if (confirm("Are you sure you want to delete this deposits?")) {
                deleteForm.submit();
            }
        })
    </script>
    <!-- END Responsive Table Container -->
@endsection
