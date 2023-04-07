@extends('components.layouts.app')

@section('content')
    <!-- Card -->
    <div class="flex flex-col rounded shadow-sm bg-white overflow-hidden">
        <!-- Card Header -->
        <div class="py-4 px-5 lg:px-6 w-full border-b border-gray-200">
            <nav class="flex items-center space-x-1 md:space-x-2">
                <a href="#deposit" id="tab-nav-deposit"
                    class="px-3 md:px-5 font-medium flex items-center space-x-2 py-2 rounded text-gray-500">
                    Deposit
                </a>
                <a href="#withdraw" id="tab-nav-withdraw"
                    class="px-3 md:px-5 font-medium flex items-center space-x-2 py-2 rounded text-gray-500">
                    Withdraw
                </a>
                <a href="#balance" id="tab-nav-balance"
                    class="px-3 md:px-5 font-medium flex items-center space-x-2 py-2 rounded text-gray-500 ">
                    Balance History
                </a>
            </nav>
        </div>
        <!-- END Card Header -->

        <!-- Card Body -->
        <div class="p-5 lg:p-6 grow w-full">
            <!-- Deposit Tab Content -->
            <div id="tab-content-deposit" class="tab-content">
            <table class="divide-y divide-gray-300 table-auto w-full">
                    <thead class="bg-gray-50">
                      <tr>
                        <th scope="col" class="whitespace-nowrap py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">Date</th>
                        <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">Amount</th>
                        <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">Description</th>
                        <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">Status</th>
                      </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 bg-white">
                        @foreach($user_deposits as $user_deposit)
                        <tr>
                            <td class="whitespace-nowrap py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-6">{{ $user_deposit->created_at }}</td>
                            <td class="whitespace-nowrap px-2 py-2 text-sm font-medium text-gray-900">{{ number_format($user_deposit->amount) }}</td>
                            <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">{{ $user_deposit->description }}</td>
                            <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">
                                @if($user_deposit->status == "ACCEPTED")
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                    {{ $user_deposit->status }}
                                    </span>
                                @elseif($user_deposit->status == "REJECTED")
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                    {{ $user_deposit->status }}
                                    </span>
                                @else
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                    {{ $user_deposit->status }}
                                    </span>
                                @endif
                            </td>

                        </tr>
                        @endforeach
                      <!-- More transactions... -->
                    </tbody>
                </table>
            </div>
            <!-- Withdraw Tab Content -->
            <div id="tab-content-withdraw" class="tab-content" hidden>
                <table class="divide-y divide-gray-300 table-auto w-full">
                    <thead class="bg-gray-50">
                      <tr>
                        <th scope="col" class="whitespace-nowrap py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">Date</th>
                        <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">Amount</th>
                        <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">Description</th>
                        <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">Status</th>
                      </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 bg-white">
                        @foreach($user_withdraws as $user_withdraw)
                        <tr>
                            <td class="whitespace-nowrap py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-6">{{ $user_withdraw->created_at }}</td>
                            <td class="whitespace-nowrap px-2 py-2 text-sm font-medium text-gray-900">{{ number_format($user_withdraw->amount) }}</td>
                            <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">{{ $user_withdraw->description }}</td>
                            <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">
                                @if($user_withdraw->status == "ACCEPTED")
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                    {{ $user_withdraw->status }}
                                    </span>
                                @elseif($user_withdraw->status == "REJECTED")
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                    {{ $user_withdraw->status }}
                                    </span>
                                @else
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                    {{ $user_withdraw->status }}
                                    </span>
                                @endif
                            </td>

                        </tr>
                        @endforeach
                      <!-- More transactions... -->
                    </tbody>
                </table>
            </div>
            <!-- Balance History Tab Content -->
            <div id="tab-content-balance" class="tab-content" hidden>
                <table class="divide-y divide-gray-300 table-auto w-full">
                    <thead class="bg-gray-50">
                      <tr>
                        <th scope="col" class="whitespace-nowrap py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">Date</th>
                        <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">Balance Before</th>
                        <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">Balance After</th>
                        <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">Amount</th>
                        <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">Description</th>
                      </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 bg-white">
                        @foreach($user_balances as $user_bal)
                        <tr>
                            <td class="whitespace-nowrap py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-6">{{ $user_bal->created_at }}</td>
                            <td class="whitespace-nowrap px-2 py-2 text-sm font-medium text-gray-900">{{ number_format($user_bal->balance_before) }}</td>
                            <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-900">{{ number_format($user_bal->balance_after) }}</td>
                            <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">
                                @if($user_bal->type == 1)
                                <span class="font-semibold text-green-500">+{{ number_format($user_bal->amount) }}</span>
                                @else
                                <span class="font-semibold text-red-500">-{{ number_format($user_bal->amount) }}</span>
                                @endif
                            </td>
                            <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">{{ $user_bal->description }}</td>
                        </tr>
                        @endforeach
                      <!-- More transactions... -->
                    </tbody>
                </table>
            </div>
        </div>
        <!-- END Card Body -->
    </div>
    <!-- END Card -->

    <script>
        const tabs = document.querySelectorAll('[id^="tab-nav"]');
        const desktopTabContents = document.querySelectorAll('[id^="tab-content-"]');
        tabs.forEach((tab, index) => {
            tab.addEventListener('click', e => {
                const currentTab = e.target.id;
                tabs.forEach(tab => tab.classList.remove('text-indigo-500', 'bg-indigo-100'));
                tab.classList.add('text-indigo-500', 'bg-indigo-100');
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
                tabs.forEach(tab => tab.classList.remove('text-indigo-500', 'bg-indigo-100'));
                desktopTabContents.forEach(content => content.hidden = true);

                document.getElementById(`tab-nav-${tabName}`).classList.add('text-indigo-500', 'bg-indigo-100');
                document.getElementById(`tab-content-${tabName}`).hidden = false;
            }
        }, 200)
        //Mobile
    </script>
@endsection
