@extends('components.layouts.app')

@section('content')
    <h1>User Balance Histories</h1>

    <!-- Card -->
    <div class="flex flex-col rounded shadow-sm bg-white overflow-hidden">
        <!-- Card Header -->
        <div class="py-4 px-5 lg:px-6 w-full border-b border-gray-200">
            <nav class="flex items-center space-x-1 md:space-x-2">
                <a href="javascript:void(0)"
                    class="px-3 md:px-5 font-medium flex items-center space-x-2 py-2 rounded text-indigo-500 bg-indigo-100">
                    Deposit
                </a>
                <a href="javascript:void(0)"
                    class="px-3 md:px-5 font-medium flex items-center space-x-2 py-2 rounded text-gray-500 hover:text-indigo-500 hover:bg-indigo-100 active:bg-transparent">
                    Withdraw
                </a>
                <a href="javascript:void(0)"
                    class="px-3 md:px-5 font-medium flex items-center space-x-2 py-2 rounded text-gray-500 hover:text-indigo-500 hover:bg-indigo-100 active:bg-transparent">
                    Balance History
                </a>
            </nav>
        </div>
        <!-- END Card Header -->

        <!-- Card Body -->
        <div class="p-5 lg:p-6 grow w-full">
            <!-- Deposit Tab Content -->
            <div id="deposit-tab" class="tab-content">
                <table class="min-w-full divide-y divide-gray-300">
                    <thead class="bg-gray-50">
                      <tr>
                        <th scope="col" class="whitespace-nowrap py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">Deposit ID</th>
                        <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">Gatau apa</th>
                        <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">Gatau apa</th>
                        <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">Gatau Juga</th>
                        <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">Emm</th>
                        <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">Yauda Gitu</th>
                        <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">Gitu dah bang</th>
                        <th scope="col" class="relative whitespace-nowrap py-3.5 pl-3 pr-4 sm:pr-6">
                          <span class="sr-only">Edit</span>
                        </th>
                      </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 bg-white">
                      <tr>
                        <td class="whitespace-nowrap py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-6">AAPS0L</td>
                        <td class="whitespace-nowrap px-2 py-2 text-sm font-medium text-gray-900">Chase &amp; Co.</td>
                        <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-900">CAC</td>
                        <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">+$4.37</td>
                        <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">$3,509.00</td>
                        <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">12.00</td>
                        <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">$4,397.00</td>
                        <td class="relative whitespace-nowrap py-2 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                          <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit<span class="sr-only">, AAPS0L</span></a>
                        </td>
                      </tr>
        
                      <!-- More transactions... -->
                    </tbody>
                  </table>
            </div>
            <!-- Withdraw Tab Content -->
            <div id="withdraw-tab" class="tab-content hidden">
                <h2>Withdraw Tab</h2>
                <p>This is the content for the Withdraw tab.</p>
            </div>
            <!-- Balance History Tab Content -->
            <div id="balance-history-tab" class="tab-content hidden">
                <h2>Balance History Tab</h2>
                <p>This is the content for the Balance History tab.</p>
            </div>
        </div>
        <!-- END Card Body -->
    </div>
    <!-- END Card -->

    <script>
        // Add click event listener to each tab link
        document.querySelector('#deposit-tab-link').addEventListener('click', function(event) {
            // Hide all tab content
            document.querySelectorAll('.tab-content').forEach(function(tabContent) {
                tabContent.classList.add('hidden');
            });
            // Show Deposit tab content
            document.querySelector('#deposit-tab').classList.remove('hidden');
        });

        document.querySelector('#withdraw-tab-link').addEventListener('click', function(event) {
            // Hide all tab content
            document.querySelectorAll('.tab-content').forEach(function(tabContent) {
                tabContent.classList.add('hidden');
            });
            // Show Withdraw tab content
            document.querySelector('#withdraw-tab').classList.remove('hidden');
        });

        document.querySelector('#balance-history-tab-link').addEventListener('click', function(event) {
            // Hide all tab content
            document.querySelectorAll('.tab-content').forEach(function(tabContent) {
                tabContent.classList.add('hidden');
            });
            // Show Balance History tab content
            document.querySelector('#balance-history-tab').classList.remove('hidden');
        });
    </script>
@endsection
