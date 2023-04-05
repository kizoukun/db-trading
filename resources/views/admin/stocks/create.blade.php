@extends('components.layouts.app')

@section("content")
<div class="px-0 md:px-12 lg:px-24">
    <form class="space-y-6 bg-white p-3 rounded-md" action="/admin/stocks/create" method="post">
        <h1 class="text-black font-bold text-4xl mb-4">Create Stock</h1>
        @csrf

        <!-- Input with text append alt -->
        <div class="space-y-1">
            <label for="tk-form-input-groups-append-text-addon-normal" class="font-medium">Symbol</label>
            <div class="relative">
                <input name="symbol" class="block border border-gray-200 rounded pr-20 pl-3 py-2 leading-6 w-full focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50" type="text" id="tk-form-input-groups-append-text-addon-normal" placeholder="Stock Symbol" />
                <div class="absolute inset-y-0 right-0 w-16 my-px mr-px flex items-center justify-center pointer-events-none rounded-r text-gray-500 bg-gray-100 border-l border-gray-200">
                    XXXX
                </div>
            </div>
        </div>

        <!-- END Input with text append alt -->
        <div class="space-y-1">
            <label for="tk-form-input-groups-append-text-addon-normal" class="font-medium">Name</label>
            <div class="relative">
                <input name="name" class="block border border-gray-200 rounded pr-20 pl-3 py-2 leading-6 w-full focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50" type="text" id="tk-form-input-groups-append-text-addon-normal" placeholder="Stock Name" />
                <div class="absolute inset-y-0 right-0 w-16 my-px mr-px flex items-center justify-center pointer-events-none rounded-r text-gray-500 bg-gray-100 border-l border-gray-200">
                    Text
                </div>
            </div>
        </div>
        <div class="space-y-1">
            <label for="tk-form-input-groups-append-text-addon-normal" class="font-medium">Image URL</label>
            <div class="relative">
                <input name="image_uri" class="block border border-gray-200 rounded pr-20 pl-3 py-2 leading-6 w-full focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50" type="text" id="tk-form-input-groups-append-text-addon-normal" placeholder="Stock Name" />
                <div class="absolute inset-y-0 right-0 w-16 my-px mr-px flex items-center justify-center pointer-events-none rounded-r text-gray-500 bg-gray-100 border-l border-gray-200">
                    Text
                </div>
            </div>
        </div>
        <div class="space-y-1">
            <label for="tk-form-input-groups-append-text-addon-normal" class="font-medium">Description</label>
            <div class="relative">
                <textarea name="description" class="block border border-gray-200 rounded pr-20 pl-3 py-2 leading-6 w-full focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50" type="text" id="tk-form-input-groups-append-text-addon-normal" placeholder="Stock Description"></textarea>
                <div class="absolute inset-y-0 right-0 w-16 my-px mr-px flex items-center justify-center pointer-events-none rounded-r text-gray-500 bg-gray-100 border-l border-gray-200">
                    Desc
                </div>
            </div>
        </div>
        <!-- Input with text append alt (large) -->
        <div class="space-y-1">
            <label for="tk-form-input-groups-append-text-addon-large" class="font-medium">Total Shares</label>
            <div class="relative">
                <input name="total_shares" class="block border border-gray-200 rounded pr-20 pl-5 py-3 leading-6 w-full focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50" type="number" id="tk-form-input-groups-prepend-large--iconaddon" placeholder="Total Shares" />
                <div class="absolute inset-y-0 right-0 w-16 my-px mr-px flex items-center justify-center pointer-events-none rounded-r text-gray-500 bg-gray-100 border-l border-gray-200">
                    $
                </div>
            </div>
        </div>
        <!-- END Input with text append alt (large) -->
        @if ($errors->any())
            <div class="text-red-500 font-medium">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white rounded-lg p-3 w-full">CREATE</button>
    </form>
</div>
@endsection
