@extends('components.layouts.app')

@section('content')
    <!-- Content area -->
    
    <!-- Main modal -->
    <div id="new-bank-modal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] md:h-full">
        <div class="relative w-full h-full max-w-md md:h-auto">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow">
                <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" data-modal-hide="new-bank-modal">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="px-6 py-6 lg:px-8">
                    <h3 class="mb-4 text-xl font-medium text-gray-900">Sign in to our platform</h3>
                    <form class="space-y-6" action="{{url('/dashboard/settings/banks')}}" method="POST">
                        @csrf
                        <div>
                            <label for="account_no" class="block mb-2 text-sm font-medium text-gray-900">Account Number</label>
                            <input type="text" name="account_no" id="account_no" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="account number" required>
                        </div>
                        <div>
                            <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Select Bank</label>
                            <select name="bank_code" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                                @foreach($bank_list as $bank)
                                <option value="{{$bank->code}}">{{$bank->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Add Bank</button>
                    </form>
                </div>
            </div>
        </div>
    </div> 

    <main class="flex-1">
        <div class="relative mx-auto max-w-4xl md:px-8 xl:px-0">
            <div class="pb-16 pt-10">
                <div class="px-4 sm:px-6 md:px-0">
                    <h1 class="text-3xl font-bold tracking-tight text-gray-900">Settings</h1>
                </div>
                <div class="px-4 sm:px-6 md:px-0">
                    <div class="py-6">
                        <!-- Tabs -->
                        <div class="lg:hidden">
                            <label for="selected-tab" class="sr-only">Select a tab</label>
                            <select id="selected-tab" name="selected-tab"
                                class="mt-1 block w-full rounded-md border-gray-300 py-2 pl-3 pr-10 text-base focus:border-purple-500 focus:outline-none focus:ring-purple-500 sm:text-sm">
                                <option value="tab-content-general" selected>General</option>
                                <option value="tab-content-password">Password</option>
                                <option value="tab-content-banks">Bank List</option>
                            </select>
                        </div>

                        <div class="hidden lg:block">
                            <div class="border-b border-gray-200">
                                <nav class="-mb-px flex space-x-8">
                                    <!-- Current: "border-purple-500 text-purple-600", Default: "border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700" -->
                                    <a href="#general" id="tab-nav-general"
                                        class="whitespace-nowrap border-b-2 border-purple-500 px-1 py-4 text-sm font-medium text-purple-600">General</a>

                                    <a href="#password" id="tab-nav-password"
                                        class="whitespace-nowrap border-b-2 border-transparent px-1 py-4 text-sm font-medium text-gray-500 hover:border-gray-300 hover:text-gray-700">Password</a>
                                    <a href="#banks" id="tab-nav-banks"
                                        class="whitespace-nowrap border-b-2 border-transparent px-1 py-4 text-sm font-medium text-gray-500 hover:border-gray-300 hover:text-gray-700">Bank List</a>
                                   
                                </nav>
                            </div>
                        </div>
                        <div id="tab-content-general" class="py-6">
                        <div class="flex flex-col rounded shadow-sm bg-white overflow-hidden">
                            <!-- Card Header: Change Password -->
                            <div class="py-4 px-5 lg:px-6 w-full bg-gray-50">
                                <h3 class="flex items-center space-x-2">
                                    <svg class="hi-solid hi-lock-open inline-block w-5 h-5 text-indigo-500"
                                        fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M10 2a5 5 0 00-5 5v2a2 2 0 00-2 2v5a2 2 0 002 2h10a2 2 0 002-2v-5a2 2 0 00-2-2H7V7a3 3 0 015.905-.75 1 1 0 001.937-.5A5.002 5.002 0 0010 2z" />
                                    </svg>
                                    <span>Change Profile</span>
                                </h3>
                            </div>
                            <!-- END Card Header: Change Password -->

                            <!-- Card Body: Change Password -->
                            <div class="p-5 lg:p-6 grow w-full md:flex md:space-x-5">
                                
             
                                <form method="post" action="settings/profile" class="space-y-6 md:w-full">
                                    @csrf
                                    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
 
                                    <div class="space-y-1">
                                        <label for="tk-form-layouts-multiple-cards-password" class="font-medium">
                                            First Name</label>
                                        <input
                                            name="first_name"
                                            value="{{ auth()->user()->first_name }}"
                                            class="block border border-gray-200 rounded px-3 py-2 leading-6 w-full focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50"
                                            type="text" id="tk-form-layouts-multiple-cards-password" />
                                    </div>
                                    <div class="space-y-1">
                                        <label for="tk-form-layouts-multiple-cards-password" class="font-medium">
                                            Last Name</label>
                                        <input
                                            name="last_name"
                                            value="{{ auth()->user()->last_name }}"
                                            class="block border border-gray-200 rounded px-3 py-2 leading-6 w-full focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50"
                                            type="text" id="tk-form-layouts-multiple-cards-password" />
                                    </div>
  
                                    <button type="submit"
                                        class="inline-flex justify-center items-center space-x-2 border font-semibold focus:outline-none px-3 py-2 leading-5 text-sm rounded border-indigo-700 bg-indigo-700 text-white hover:text-white hover:bg-indigo-800 hover:border-indigo-800 focus:ring focus:ring-indigo-500 focus:ring-opacity-50 active:bg-indigo-700 active:border-indigo-700">
                                        Update
                                    </button>
                                </form>
                            </div>
                            <!-- END Card Body: Change Password -->
                        </div>
                        <!-- END Card: Change Password -->
                    </div>

                    <div id="tab-content-password" class="py-6" hidden>
                        <!-- Card: Change Password -->
                        <div class="flex flex-col rounded shadow-sm bg-white overflow-hidden">
                            <!-- Card Header: Change Password -->
                            <div class="py-4 px-5 lg:px-6 w-full bg-gray-50">
                                <h3 class="flex items-center space-x-2">
                                    <svg class="hi-solid hi-lock-open inline-block w-5 h-5 text-indigo-500"
                                        fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M10 2a5 5 0 00-5 5v2a2 2 0 00-2 2v5a2 2 0 002 2h10a2 2 0 002-2v-5a2 2 0 00-2-2H7V7a3 3 0 015.905-.75 1 1 0 001.937-.5A5.002 5.002 0 0010 2z" />
                                    </svg>
                                    <span>Change Password</span>
                                </h3>
                            </div>
                            <!-- END Card Header: Change Password -->

                            <!-- Card Body: Change Password -->
                            <div class="p-5 lg:p-6 grow w-full md:flex md:space-x-5">
                                
                                <p class="md:flex-none md:w-1/3 text-gray-500 text-sm mb-5">
                                    Changing your sign in password is an easy way to keep your account secure.
                                </p>
                                <form method="post" action="settings/password" class="space-y-6 md:w-1/2">
                                    @csrf
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
 
                                    <div class="space-y-1">
                                        <label for="tk-form-layouts-multiple-cards-password" class="font-medium">Current
                                            Password</label>
                                        <input
                                            name="current_password"
                                            class="block border border-gray-200 rounded px-3 py-2 leading-6 w-full focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50"
                                            type="password" id="tk-form-layouts-multiple-cards-password" />
                                    </div>
                                    <div class="space-y-1">
                                        <label for="tk-form-layouts-multiple-cards-password-new" class="font-medium">New
                                            Password</label>
                                        <input
                                            name="new_password"
                                            class="block border border-gray-200 rounded px-3 py-2 leading-6 w-full focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50"
                                            type="password" id="tk-form-layouts-multiple-cards-password-new" />
                                    </div>
                                    <div class="space-y-1">
                                        <label for="tk-form-layouts-multiple-cards-password-new-confirm"
                                            class="font-medium">Confirm Password</label>
                                        <input
                                           name="new_password_confirmation"
                                            class="block border border-gray-200 rounded px-3 py-2 leading-6 w-full focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50"
                                            type="password" id="tk-form-layouts-multiple-cards-password-new-confirm" />
                                    </div>
                                    <button type="submit"
                                        class="inline-flex justify-center items-center space-x-2 border font-semibold focus:outline-none px-3 py-2 leading-5 text-sm rounded border-indigo-700 bg-indigo-700 text-white hover:text-white hover:bg-indigo-800 hover:border-indigo-800 focus:ring focus:ring-indigo-500 focus:ring-opacity-50 active:bg-indigo-700 active:border-indigo-700">
                                        Update Password
                                    </button>
                                </form>
                            </div>
                            <!-- END Card Body: Change Password -->
                        </div>
                        <!-- END Card: Change Password -->
                    </div>


                    <div id="tab-content-banks" class="py-6" hidden>
                        <!-- Card: Change Banks -->
                        <div class="flex flex-col rounded shadow-sm bg-white overflow-hidden">
                            <!-- Card Header: Change Banks -->
                            <div class="flex justify-between items-center">
                                <div class="py-4 px-5 lg:px-6 w-full bg-gray-50">
                                    <h3 class="flex items-center space-x-2">
                                        <svg class="hi-solid hi-lock-open inline-block w-5 h-5 text-indigo-500"
                                            fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M10 2a5 5 0 00-5 5v2a2 2 0 00-2 2v5a2 2 0 002 2h10a2 2 0 002-2v-5a2 2 0 00-2-2H7V7a3 3 0 015.905-.75 1 1 0 001.937-.5A5.002 5.002 0 0010 2z" />
                                        </svg>
                                        <span>Bank List</span>
                                    </h3>
                                </div>
                                <div class="py-4 px-5 lg:px-6 w-full bg-gray-50 flex justify-end">
                                    <button data-modal-target="new-bank-modal" data-modal-toggle="new-bank-modal" type="button" class="bg-blue-500 hover:bg-blue-600 text-white rounded-lg p-2" >NEW BANK</button>
                                </div>
                            </div>
                            <!-- END Card Header: Change Banks -->

                            <!-- Card Body: Change Banks -->
                            <div class="p-5 lg:p-6 grow w-full md:flex md:space-x-5">
                                
                                <table class="w-full table-auto">
                                    <thead>
                                        <tr>
                                            <th class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">Bank Code</th>
                                            <th class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">Bank Name</th>
                                            <th class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">Bank No</th>
                                            <th class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($user_banks as $ubank)
                                        <tr>
                                            <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">{{ $ubank->bank_code }}</td>
                                            <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">{{ $ubank->name }}</td>
                                            <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">{{ $ubank->account_no }}</td>
                                            <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">
                                                <form method="POST" action="/dashboard/settings/banks">
                                                    @csrf
                                                    @method("DELETE")
                                                    <input hidden name="account_no" value="{{ $ubank->account_no }}" />
                                                    <button type="submit" class="bg-red-500 hover:bg-red-600 p-2 text-white rounded-lg">REMOVE</button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- END Card Body: Change Banks -->
                        </div>
                        <!-- END Card: Banks -->
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script>
        const tabs = document.querySelectorAll('[id^="tab-nav"]');
        const desktopTabContents = document.querySelectorAll('[id^="tab-content-"]');
        tabs.forEach((tab, index) => {
            tab.addEventListener('click', e => {
                const currentTab = e.target.id;
                tabs.forEach(tab => tab.classList.remove('border-purple-500', 'text-purple-600'));
                tab.classList.add('border-purple-500', 'text-purple-600');
                desktopTabContents.forEach(content => content.hidden = true);
                document.getElementById(`tab-content-${currentTab.split('-')[2]}`).hidden = false;
            });
            // Set the content hidden by default except for the first tab
            if (index > 0) {
                desktopTabContents[index].hidden = true;
            }
        });
        setTimeout(() => {
      
            if(window.location.hash.indexOf('#') > -1) {
                let tabName = window.location.hash.replace('#', '')
                tabs.forEach(tab => tab.classList.remove('border-purple-500', 'text-purple-600'));
                desktopTabContents.forEach(content => content.hidden = true);

                document.getElementById(`tab-nav-${tabName}`).classList.add('border-purple-500', 'text-purple-600');
                document.getElementById(`tab-content-${tabName}`).hidden = false;
            }
        }, 200)
        //Mobile
        const select = document.getElementById('selected-tab');
        const mobileTabContents = document.querySelectorAll(
            '#tab-content-general, #tab-content-password, #tab-content-notifications, #tab-content-billing');
        select.addEventListener('change', e => {
            const currentTab = e.target.value;
            mobileTabContents.forEach(content => content.hidden = true);
            document.getElementById(currentTab).hidden = false;
        });
    </script>
@endsection
