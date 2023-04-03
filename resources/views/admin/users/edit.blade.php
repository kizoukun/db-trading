@extends('components.layouts.app')

@section("content")
    <div class="px-24">
        <form class="space-y-6 bg-white p-3 rounded-md" action="/admin/users/{{ $user->id }}" method="post">
            <h1 class="text-black font-bold text-4xl mb-4">Edit Stock</h1>
            @csrf
            @method("PUT")

            <!-- Input with text append alt -->
            <div class="space-y-1">
                <label for="tk-form-input-groups-append-text-addon-normal" class="font-medium">Email</label>
                <div class="relative">
                    <input name="email" value="{{ $user->email }}" class="block border border-gray-200 rounded pr-20 pl-3 py-2 leading-6 w-full focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50" type="text" id="tk-form-input-groups-append-text-addon-normal" placeholder="Email" />
                    <div class="absolute inset-y-0 right-0 w-16 my-px mr-px flex items-center justify-center pointer-events-none rounded-r text-gray-500 bg-gray-100 border-l border-gray-200">
                        @
                    </div>
                </div>
            </div>

            <!-- END Input with text append alt -->
            <div class="space-y-1">
                <label for="tk-form-input-groups-append-text-addon-normal" class="font-medium">First Name</label>
                <div class="relative">
                    <input name="firstName" value="{{ $user->first_name ?? '' }}" class="block border border-gray-200 rounded pr-20 pl-3 py-2 leading-6 w-full focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50" type="text" id="tk-form-input-groups-append-text-addon-normal" placeholder="First Name" />
                    <div class="absolute inset-y-0 right-0 w-16 my-px mr-px flex items-center justify-center pointer-events-none rounded-r text-gray-500 bg-gray-100 border-l border-gray-200">
                        Text
                    </div>
                </div>
            </div>
            <div class="space-y-1">
                <label for="tk-form-input-groups-append-text-addon-normal" class="font-medium">Last Name</label>
                <div class="relative">
                    <input name="lastName" value="{{ $user->last_name ?? '' }}" class="block border border-gray-200 rounded pr-20 pl-3 py-2 leading-6 w-full focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50" type="text" id="tk-form-input-groups-append-text-addon-normal" placeholder="Last Name" />
                    <div class="absolute inset-y-0 right-0 w-16 my-px mr-px flex items-center justify-center pointer-events-none rounded-r text-gray-500 bg-gray-100 border-l border-gray-200">
                        Text
                    </div>
                </div>
            </div>
            <div class="space-y-1">
                <label for="tk-form-input-groups-append-text-addon-normal" class="font-medium">Phone Number</label>
                <div class="relative">
                    <input name="phone" value="{{ $user->phone ?? '' }}" class="block border border-gray-200 rounded pr-20 pl-3 py-2 leading-6 w-full focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50" type="text" id="tk-form-input-groups-append-text-addon-normal" placeholder="Phone Number" />
                    <div class="absolute inset-y-0 right-0 w-16 my-px mr-px flex items-center justify-center pointer-events-none rounded-r text-gray-500 bg-gray-100 border-l border-gray-200">
                        +62
                    </div>
                </div>
            </div>
            <div class="space-y-1">
                <label for="tk-form-input-groups-append-text-addon-normal" class="font-medium">Address</label>
                <div class="relative">
                    <textarea type="text" name="address" class="block border border-gray-200 rounded pr-20 pl-3 py-2 leading-6 w-full focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50" id="tk-form-input-groups-append-text-addon-normal" placeholder="Address">{{ $user->address }}</textarea>
                    <div class="absolute inset-y-0 right-0 w-16 my-px mr-px flex items-center justify-center pointer-events-none rounded-r text-gray-500 bg-gray-100 border-l border-gray-200">
                        Desc
                    </div>
                </div>
            </div>
            <!-- Input with text append alt (large) -->
            <div class="space-y-1">
                <label for="tk-form-input-groups-append-text-addon-large" class="font-medium">Role</label>
                <div class="relative">
                    <select name="roleId" value="{{ $user->role_id }}" class="block border border-gray-200 rounded pr-20 pl-5 py-3 leading-6 w-full focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50" type="number" id="tk-form-input-groups-prepend-large--iconaddon" placeholder="Roles">
                        @foreach($roles as $role)
                            <option {{ $role->id == $user->role_id ? 'selected' : '' }} value="{{ $role->id }}">{{ $role->name }}</option>
                        @endforeach
                    </select>
                    <div class="absolute inset-y-0 right-0 w-16 my-px mr-px flex items-center justify-center pointer-events-none rounded-r text-gray-500 bg-gray-100 border-l border-gray-200">
                        Role
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
            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white rounded-lg p-3 w-full">Update</button>
        </form>
    </div>
@endsection

