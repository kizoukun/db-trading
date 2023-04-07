@extends('components.layouts.app')

@section('content')
<div class="flex justify-between">
        <h1 class="text-black font-bold text-4xl">Notifications</h1>
    </div>
    <!-- Responsive Table Container -->
    <div class="border border-gray-200 rounded overflow-x-auto min-w-full bg-white">
        <!-- Alternate Responsive Table -->
        <table class="min-w-[768px] w-full text-sm align-middle">
            <!-- Table Header -->
            <thead>
            <tr class="bg-gray-50">
                <th class="p-3 text-gray-700 bg-gray-100 font-semibold text-sm tracking-wider uppercase text-left">
                    Title
                </th>
                <th class="p-3 text-gray-700 bg-gray-100 font-semibold text-sm tracking-wider uppercase text-center">
                    Description
                </th>
            </tr>
            </thead>
            <!-- END Table Header -->

            <!-- Table Body -->
            <tbody>
            @foreach($notifications as $notification)
                <tr class="border-b border-b-black">
                    <td class="p-3">
                        {{ $notification->title }}
                    </td>
                    <td class="p-3">
                        {{ $notification->description }}
                    </td>
                </tr>
            @endforeach
            </tbody>
            <!-- END Table Body -->
        </table>
        <!-- END Alternate Responsive Table -->
    </div>
@endsection
