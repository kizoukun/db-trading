@extends('components.layouts.app')

@section("content")
    <div class="px-0 md:px-12 lg:px-24">
        <form class="space-y-6 bg-white p-3 rounded-md" action="{{ url('/admin/withdraws/' . $deposit->id) }}" method="post">
            <h1 class="text-black font-bold text-4xl mb-4">Edit Deposit</h1>
            @csrf
            @method("PUT")
            <!-- END Input with text append alt -->
            <div class="space-y-1">
                <label for="tk-form-input-groups-append-text-addon-normal" class="font-medium">ID</label>
                <div class="relative">
                    <input name="id" type="text" placeholder="Bank Name" readonly value="{{ $deposit->id }}" class="block border border-gray-200 rounded pr-20 pl-3 py-2 leading-6 w-full focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50" id="tk-form-input-groups-append-text-addon-normal" />
                    <div class="absolute inset-y-0 right-0 w-16 my-px mr-px flex items-center justify-center pointer-events-none rounded-r text-gray-500 bg-gray-100 border-l border-gray-200">
                        ID
                    </div>
                </div>
            </div>
            <div class="space-y-1">
                <label for="tk-form-input-groups-append-text-addon-normal" class="font-medium">Amount</label>
                <div class="relative">
                    <input name="amount" type="number" placeholder="Deposit Amount" value="{{ (int)  $deposit->amount }}" class="block border border-gray-200 rounded pl-3 py-2 leading-6 w-full focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50" id="tk-form-input-groups-append-text-addon-normal" />
                </div>
            </div>
            <div class="space-y-1">
                <label for="tk-form-input-groups-append-text-addon-normal" class="font-medium">Description</label>
                <div class="relative">
                    <textarea name="description" class="block border border-gray-200 rounded pl-3 py-2 leading-6 w-full focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50" type="text" id="tk-form-input-groups-append-text-addon-normal" placeholder="Description">{{ $deposit->description ?? '' }}</textarea>
                </div>
            </div>
            <div class="space-y-1">
                <label for="tk-form-input-groups-append-text-addon-normal" class="font-medium">Status</label>
                <div class="relative">
                    <select name="status" class="block border border-gray-200 rounded pl-5 py-3 leading-6 w-full focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50" type="number" id="tk-form-input-groups-prepend-large--iconaddon" placeholder="User ID">
                        <option value="PENDING">PENDING</option>
                        <option value="ACCEPTED">ACCEPTED</option>
                        <option value="REJECTED">REJECTED</option>
                    </select>
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
            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white rounded-lg p-3 w-full">UPDATE</button>
        </form>
    </div>
@endsection
