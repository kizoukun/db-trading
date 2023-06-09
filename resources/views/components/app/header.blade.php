<header  x-data="searchJs" id="page-header"
    class="flex flex-none items-center h-16 bg-white shadow-sm fixed top-0 right-0 left-0 z-30 lg:pl-64 duration-500">
    <div class="flex justify-between max-w-10xl mx-auto px-4 lg:px-8 w-full">
        <!-- Left Section -->
        <div class="flex items-center space-x-2">

            <!-- Toggle Sidebar on Mobile -->
            <div>
                <button type="button" onclick="toggleSidebar()"
                    class="inline-flex justify-center items-center space-x-2 border font-semibold focus:outline-none px-3 py-2 leading-6 rounded border-gray-300 bg-white text-gray-800 shadow-sm hover:text-gray-800 hover:bg-gray-100 hover:border-gray-300 hover:shadow focus:ring focus:ring-gray-500 focus:ring-opacity-25 active:bg-white active:border-white active:shadow-none">
                    <svg class="hi-solid hi-menu-alt-1 inline-block w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h6a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                            clip-rule="evenodd" />
                    </svg>
                </button>
            </div>
            <!-- END Toggle Sidebar on Mobile -->

            <!-- Search -->
            <div>
                <div class="relative text-gray-400 focus-within:text-gray-600">
                    <label for="tk-form-layouts-search" class="sr-only">Search</label>
                    <input type="search" x-model="query" id="tk-form-layouts-search"
                        class="form-input block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md leading-5 bg-white placeholder-gray-500 focus:outline-none focus:placeholder-gray-400 focus:border-blue-300 focus:shadow-outline-blue sm:text-sm transition duration-150 ease-in-out"
                        @input.debounce="search" placeholder="Search ...">
                    <div class="absolute inset-y-0 left-0 flex items-center px-4">
                        <svg class="hi-solid hi-search inline-block w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                </div>
                <div x-show="search_results" class="fixed bg-white p-2  overflow-auto rounded-b-lg">
                    <div class="max-h-[80px]">
                        <template x-for="(search, index) in search_results">
                            <div :key="index">
                                <a :href="'/dashboard/stocks/' + search.symbol" x-text="search.symbol + ' - ' + search.name"></a>
                            </div>
                        </template>
                    </div>
                </div>
            </div>
            <!-- END Search -->
        </div>
        <!-- END Left Section -->

        <!-- Right Section -->
        <div class="flex items-center space-x-2">
            <!-- Notifications -->
            <button type="button"
                class="inline-flex justify-center items-center space-x-2 border font-semibold focus:outline-none px-3 py-2 leading-5 text-sm rounded border-gray-300 bg-white text-gray-800 shadow-sm hover:text-gray-800 hover:bg-gray-100 hover:border-gray-300 hover:shadow focus:ring focus:ring-gray-500 focus:ring-opacity-25 active:bg-white active:border-white active:shadow-none">
                <svg class="hi-outline hi-bell inline-block w-5 h-5" stroke="currentColor" fill="none"
                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                </svg>
                <span class="text-blue-500">•</span>
            </button>
            <!-- END Notifications -->

            <!-- User Dropdown -->
            <div class="relative inline-block">
                <!-- Dropdown Toggle Button -->
                <button type="button"  @click="profileOpen = !profileOpen"
                    class="inline-flex justify-center items-center space-x-2 border font-semibold focus:outline-none px-3 py-2 leading-5 text-sm rounded border-gray-300 bg-white text-gray-800 shadow-sm hover:text-gray-800 hover:bg-gray-100 hover:border-gray-300 hover:shadow focus:ring focus:ring-gray-500 focus:ring-opacity-25 active:bg-white active:border-white active:shadow-none"
                    id="tk-dropdown-layouts-user" aria-haspopup="true" aria-expanded="true">
                    <span>{{ auth()->user()->first_name }} <span class="hidden md:inline">{{ auth()->user()->last_name }}</span></span>
                    <svg class="hi-solid hi-chevron-down inline-block w-5 h-5 opacity-50" fill="currentColor"
                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd" />
                    </svg>
                </button>
                <div role="menu" aria-labelledby="tk-dropdown-layouts-user"
                    class="absolute right-0 origin-top-right mt-2 w-48 shadow-xl rounded z-1">
                    <div id="menus" class="bg-white ring-1 ring-black ring-opacity-5 rounded divide-y divide-gray-100 hidden" :class="profileOpen ? 'block' : 'hidden'">
                        <div class="p-2 space-y-1">
                            <a role="menuitem" href="{{url("/dashboard/notifications")}}"
                                class="flex items-center space-x-2 rounded py-2 px-3 text-sm font-medium text-gray-600 hover:bg-gray-100 hover:text-gray-700 focus:outline-none focus:bg-gray-100 focus:text-gray-700">
                                <svg class="hi-solid hi-inbox inline-block w-5 h-5 opacity-50" fill="currentColor"
                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M5 3a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2V5a2 2 0 00-2-2H5zm0 2h10v7h-2l-1 2H8l-1-2H5V5z"
                                        clip-rule="evenodd" />
                                </svg>
                                <span>Notifications</span>
                            </a>
                        </div>
                        <div class="p-2 space-y-1">
                            <a role="menuitem" href="{{url("/dashboard/settings")}}"
                                class="flex items-center space-x-2 rounded py-2 px-3 text-sm font-medium text-gray-600 hover:bg-gray-100 hover:text-gray-700 focus:outline-none focus:bg-gray-100 focus:text-gray-700">
                                <svg class="hi-solid hi-cog inline-block w-5 h-5 opacity-50" fill="currentColor"
                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z"
                                        clip-rule="evenodd" />
                                </svg>
                                <span>Settings</span>
                            </a>
                        </div>
                        <div class="p-2 space-y-1">
                            <form action="/auth/logout" method="POST">
                                @csrf
                                @method("DELETE")
                                <button type="submit" role="menuitem"
                                    class="w-full text-left flex items-center space-x-2 rounded py-2 px-3 text-sm font-medium text-gray-600 hover:bg-gray-100 hover:text-gray-700 focus:outline-none focus:bg-gray-100 focus:text-gray-700">
                                    <svg class="hi-solid hi-lock-closed inline-block w-5 h-5 opacity-50"
                                        fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    <span>Sign out</span>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- END Dropdown -->
            </div>
            <!-- END User Dropdown -->
        </div>
        <!-- END Right Section -->
    </div>
</header>

<script>
    function searchJs() {
        return {
            init() {
                var menus = document.getElementById("menus");
                menus.classList.remove("hidden");
            },
            query: "",
            search_results: undefined,
            profileOpen: false,
            async search() {
                if(this.query.length < 1) {
                    this.search_results = undefined;
                    return;
                }
                try {
                    const response = await fetch(`/api/v1/search?query=${this.query}`);
                    const stocks = await response.json();

                    if(response.status === 200) {
                        this.search_results = stocks;
                    } else {
                        this.search_results = undefined;
                    }
                } catch (err) {
                    console.error(err);
                }
            }
        }
    }
</script>
