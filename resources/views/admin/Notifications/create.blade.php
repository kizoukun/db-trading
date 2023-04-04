@extends('components.layouts.app')

@section("content")
    <div class="px-0 md:px-12 lg:px-24">
        <form class="space-y-6 bg-white p-3 rounded-md" action="{{ url('/admin/notifications/create') }}" method="post">
            <h1 class="text-black font-bold text-4xl mb-4">Create Notifications</h1>
            @csrf

            <!-- END Input with text append alt -->
            <div class="space-y-1">
                <label for="tk-form-input-groups-append-text-addon-large" class="font-medium">User</label>
                <div class="relative">
                    <select name="userId" class="block border border-gray-200 rounded pr-20 pl-5 py-3 leading-6 w-full focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50" type="number" id="tk-form-input-groups-prepend-large--iconaddon" placeholder="User ID">
                        @foreach($users as $user)
                            <option value="{{ $user->id }}">{{ $user->first_name }} {{ $user->last_name }}</option>
                        @endforeach
                    </select>
                    <div class="absolute inset-y-0 right-0 w-16 my-px mr-px flex items-center justify-center pointer-events-none rounded-r text-gray-500 bg-gray-100 border-l border-gray-200">
                        User
                    </div>
                </div>
            </div>
            <div class="space-y-1">
                <label for="tk-form-input-groups-append-text-addon-normal" class="font-medium">Title</label>
                <div class="relative">
                    <input name="title" class="block border border-gray-200 rounded pr-20 pl-3 py-2 leading-6 w-full focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50" type="text" id="tk-form-input-groups-append-text-addon-normal" placeholder="Title" />
                    <div class="absolute inset-y-0 right-0 w-16 my-px mr-px flex items-center justify-center pointer-events-none rounded-r text-gray-500 bg-gray-100 border-l border-gray-200">
                        Text
                    </div>
                </div>
            </div>
            <div class="space-y-1">
                <label for="tk-form-input-groups-append-text-addon-normal" class="font-medium">Description</label>
                <div class="relative">
                    <textarea name="description" class="block border border-gray-200 rounded pr-20 pl-3 py-2 leading-6 w-full focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50" type="text" id="tk-form-input-groups-append-text-addon-normal" placeholder="Description"></textarea>
                    <div class="absolute inset-y-0 right-0 w-16 my-px mr-px flex items-center justify-center pointer-events-none rounded-r text-gray-500 bg-gray-100 border-l border-gray-200">
                        Desc
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
