@extends('components.layouts.app')

@section("content")
    <div class="px-0 md:px-12 lg:px-24">
        <form class="space-y-6 bg-white p-3 rounded-md" action="{{ url('/admin/bank-list/' . $bank->code) }}" method="post">
            <h1 class="text-black font-bold text-4xl mb-4">Edit Bank</h1>
            @csrf
            @method("PUT")
            <!-- END Input with text append alt -->
{{--            <div class="space-y-1">--}}
{{--                <label for="tk-form-input-groups-append-text-addon-normal" class="font-medium">Code</label>--}}
{{--                <div class="relative">--}}
{{--                    <input name="code" type="number" placeholder="Bank Code" class="block border border-gray-200 rounded pr-20 pl-3 py-2 leading-6 w-full focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50" id="tk-form-input-groups-append-text-addon-normal" />--}}
{{--                    <div class="absolute inset-y-0 right-0 w-16 my-px mr-px flex items-center justify-center pointer-events-none rounded-r text-gray-500 bg-gray-100 border-l border-gray-200">--}}
{{--                        Int--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
            <div class="space-y-1">
                <label for="tk-form-input-groups-append-text-addon-normal" class="font-medium">Name</label>
                <div class="relative">
                    <input name="name" type="text" placeholder="Bank Name" value="{{ $bank->name ?? '' }}" class="block border border-gray-200 rounded pr-20 pl-3 py-2 leading-6 w-full focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50" id="tk-form-input-groups-append-text-addon-normal" />
                    <div class="absolute inset-y-0 right-0 w-16 my-px mr-px flex items-center justify-center pointer-events-none rounded-r text-gray-500 bg-gray-100 border-l border-gray-200">
                        Text
                    </div>
                </div>
            </div>
            <div class="space-y-1">
                <label for="tk-form-input-groups-append-text-addon-normal" class="font-medium">Min Withdraw</label>
                <div class="relative">
                    <input name="minWithdraw" type="number" placeholder="Minimum Withdraw" value="{{ (int) $bank->min_withdraw ?? '' }}" class="block border border-gray-200 rounded pr-20 pl-3 py-2 leading-6 w-full focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50" id="tk-form-input-groups-append-text-addon-normal" />
                    <div class="absolute inset-y-0 right-0 w-16 my-px mr-px flex items-center justify-center pointer-events-none rounded-r text-gray-500 bg-gray-100 border-l border-gray-200">
                        Int
                    </div>
                </div>
            </div>
            <div class="space-y-1">
                <label for="tk-form-input-groups-append-text-addon-normal" class="font-medium">Max Withdraw</label>
                <div class="relative">
                    <input name="maxWithdraw" type="number" placeholder="Maximum Withdraw" value="{{ (int) $bank->max_withdraw ?? '' }}" class="block border border-gray-200 rounded pr-20 pl-3 py-2 leading-6 w-full focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50" id="tk-form-input-groups-append-text-addon-normal" />
                    <div class="absolute inset-y-0 right-0 w-16 my-px mr-px flex items-center justify-center pointer-events-none rounded-r text-gray-500 bg-gray-100 border-l border-gray-200">
                        Int
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
