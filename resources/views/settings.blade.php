@extends('components.layouts.app')

@section('content')
    <!-- Content area -->
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

                                <option value="tab-content-notifications">Notifications</option>

                                <option value="tab-content-billing">Billing</option>

                            </select>
                        </div>

                        <div class="hidden lg:block">
                            <div class="border-b border-gray-200">
                                <nav class="-mb-px flex space-x-8">
                                    <!-- Current: "border-purple-500 text-purple-600", Default: "border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700" -->
                                    <a href="#" id="tab-general"
                                        class="whitespace-nowrap border-b-2 border-purple-500 px-1 py-4 text-sm font-medium text-purple-600">General</a>

                                    <a href="#" id="tab-password"
                                        class="whitespace-nowrap border-b-2 border-transparent px-1 py-4 text-sm font-medium text-gray-500 hover:border-gray-300 hover:text-gray-700">Password</a>

                                    <a href="#" id="tab-notifications"
                                        class="whitespace-nowrap border-b-2 border-transparent px-1 py-4 text-sm font-medium text-gray-500 hover:border-gray-300 hover:text-gray-700">Notifications</a>

                                    <a href="#" id="tab-billing"
                                        class="whitespace-nowrap border-b-2 border-transparent px-1 py-4 text-sm font-medium text-gray-500 hover:border-gray-300 hover:text-gray-700">Billing</a>
                                </nav>
                            </div>
                        </div>
                        <div id="tab-content-general" class="py-6">
                            <!-- Description list with inline editing -->
                            <div class="mt-10 divide-y divide-gray-200">
                                <div class="space-y-1">
                                    <h3 class="text-lg font-medium leading-6 text-gray-900">Profile</h3>
                                    <p class="max-w-2xl text-sm text-gray-500">This information will be displayed publicly
                                        so be careful what you share.</p>
                                </div>
                                <div class="mt-6">
                                    <dl class="divide-y divide-gray-200">
                                        <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:py-5">
                                            <dt class="text-sm font-medium text-gray-500">Name</dt>
                                            <dd class="mt-1 flex text-sm text-gray-900 sm:col-span-2 sm:mt-0">
                                                <span class="flex-grow">Chelsea Hagon</span>
                                                <span class="ml-4 flex-shrink-0">
                                                    <button type="button"
                                                        class="rounded-md bg-white font-medium text-purple-600 hover:text-purple-500 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2">Update</button>
                                                </span>
                                            </dd>
                                        </div>
                                        <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:py-5 sm:pt-5">
                                            <dt class="text-sm font-medium text-gray-500">Photo</dt>
                                            <dd class="mt-1 flex text-sm text-gray-900 sm:col-span-2 sm:mt-0">
                                                <span class="flex-grow">
                                                    <img class="h-8 w-8 rounded-full"
                                                        src="https://images.unsplash.com/photo-1550525811-e5869dd03032?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                                        alt="" />
                                                </span>
                                                <span class="ml-4 flex flex-shrink-0 items-start space-x-4">
                                                    <button type="button"
                                                        class="rounded-md bg-white font-medium text-purple-600 hover:text-purple-500 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2">Update</button>
                                                    <span class="text-gray-300" aria-hidden="true">|</span>
                                                    <button type="button"
                                                        class="rounded-md bg-white font-medium text-purple-600 hover:text-purple-500 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2">Remove</button>
                                                </span>
                                            </dd>
                                        </div>
                                        <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:py-5 sm:pt-5">
                                            <dt class="text-sm font-medium text-gray-500">Email</dt>
                                            <dd class="mt-1 flex text-sm text-gray-900 sm:col-span-2 sm:mt-0">
                                                <span class="flex-grow">chelsea.hagon@example.com</span>
                                                <span class="ml-4 flex-shrink-0">
                                                    <button type="button"
                                                        class="rounded-md bg-white font-medium text-purple-600 hover:text-purple-500 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2">Update</button>
                                                </span>
                                            </dd>
                                        </div>
                                        <div
                                            class="py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:border-b sm:border-gray-200 sm:py-5">
                                            <dt class="text-sm font-medium text-gray-500">Job title</dt>
                                            <dd class="mt-1 flex text-sm text-gray-900 sm:col-span-2 sm:mt-0">
                                                <span class="flex-grow">Human Resources Manager</span>
                                                <span class="ml-4 flex-shrink-0">
                                                    <button type="button"
                                                        class="rounded-md bg-white font-medium text-purple-600 hover:text-purple-500 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2">Update</button>
                                                </span>
                                            </dd>
                                        </div>
                                    </dl>
                                </div>
                            </div>

                            <div class="mt-10 divide-y divide-gray-200">
                                <div class="space-y-1">
                                    <h3 class="text-lg font-medium leading-6 text-gray-900">Account</h3>
                                    <p class="max-w-2xl text-sm text-gray-500">Manage how information is displayed on your
                                        account.</p>
                                </div>
                                <div class="mt-6">
                                    <dl class="divide-y divide-gray-200">
                                        <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:py-5">
                                            <dt class="text-sm font-medium text-gray-500">Language</dt>
                                            <dd class="mt-1 flex text-sm text-gray-900 sm:col-span-2 sm:mt-0">
                                                <span class="flex-grow">English</span>
                                                <span class="ml-4 flex-shrink-0">
                                                    <button type="button"
                                                        class="rounded-md bg-white font-medium text-purple-600 hover:text-purple-500 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2">Update</button>
                                                </span>
                                            </dd>
                                        </div>
                                        <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:py-5 sm:pt-5">
                                            <dt class="text-sm font-medium text-gray-500">Date format</dt>
                                            <dd class="mt-1 flex text-sm text-gray-900 sm:col-span-2 sm:mt-0">
                                                <span class="flex-grow">DD-MM-YYYY</span>
                                                <span class="ml-4 flex flex-shrink-0 items-start space-x-4">
                                                    <button type="button"
                                                        class="rounded-md bg-white font-medium text-purple-600 hover:text-purple-500 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2">Update</button>
                                                    <span class="text-gray-300" aria-hidden="true">|</span>
                                                    <button type="button"
                                                        class="rounded-md bg-white font-medium text-purple-600 hover:text-purple-500 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2">Remove</button>
                                                </span>
                                            </dd>
                                        </div>
                                        <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:py-5 sm:pt-5">
                                            <dt class="text-sm font-medium text-gray-500" id="timezone-option-label">
                                                Automatic timezone</dt>
                                            <dd class="mt-1 flex text-sm text-gray-900 sm:col-span-2 sm:mt-0">
                                                <!-- Enabled: "bg-purple-600", Not Enabled: "bg-gray-200" -->
                                                <button type="button"
                                                    class="relative inline-flex h-6 w-11 flex-shrink-0 cursor-pointer rounded-full border-2 border-transparent bg-gray-200 transition-colors duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 sm:ml-auto"
                                                    role="switch" aria-checked="true"
                                                    aria-labelledby="timezone-option-label">
                                                    <!-- Enabled: "translate-x-5", Not Enabled: "translate-x-0" -->
                                                    <span aria-hidden="true"
                                                        class="inline-block h-5 w-5 translate-x-0 transform rounded-full bg-white shadow ring-0 transition duration-200 ease-in-out"></span>
                                                </button>
                                            </dd>
                                        </div>
                                        <div
                                            class="py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:border-b sm:border-gray-200 sm:py-5">
                                            <dt class="text-sm font-medium text-gray-500" id="auto-update-option-label">
                                                Auto-update applicant data</dt>
                                            <dd class="mt-1 flex text-sm text-gray-900 sm:col-span-2 sm:mt-0">
                                                <!-- Enabled: "bg-purple-600", Not Enabled: "bg-gray-200" -->
                                                <button type="button"
                                                    class="relative inline-flex h-6 w-11 flex-shrink-0 cursor-pointer rounded-full border-2 border-transparent bg-gray-200 transition-colors duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 sm:ml-auto"
                                                    role="switch" aria-checked="false"
                                                    aria-labelledby="auto-update-option-label">
                                                    <!-- Enabled: "translate-x-5", Not Enabled: "translate-x-0" -->
                                                    <span aria-hidden="true"
                                                        class="inline-block h-5 w-5 translate-x-0 transform rounded-full bg-white shadow ring-0 transition duration-200 ease-in-out"></span>
                                                </button>
                                            </dd>
                                        </div>
                                    </dl>
                                </div>
                            </div>
                        </div>
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
                                <form onsubmit="return false;" class="space-y-6 md:w-1/2">
                                    <div class="space-y-1">
                                        <label for="tk-form-layouts-multiple-cards-password" class="font-medium">Current
                                            Password</label>
                                        <input
                                            class="block border border-gray-200 rounded px-3 py-2 leading-6 w-full focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50"
                                            type="password" id="tk-form-layouts-multiple-cards-password" />
                                    </div>
                                    <div class="space-y-1">
                                        <label for="tk-form-layouts-multiple-cards-password-new" class="font-medium">New
                                            Password</label>
                                        <input
                                            class="block border border-gray-200 rounded px-3 py-2 leading-6 w-full focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50"
                                            type="password" id="tk-form-layouts-multiple-cards-password-new" />
                                    </div>
                                    <div class="space-y-1">
                                        <label for="tk-form-layouts-multiple-cards-password-new-confirm"
                                            class="font-medium">Confirm Password</label>
                                        <input
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

                    <div id="tab-content-notifications" class="py-6" hidden>
                        <!-- Card: Notifications -->
                        <div class="flex flex-col rounded shadow-sm bg-white overflow-hidden">
                            <!-- Card Header: Notifications -->
                            <div class="py-4 px-5 lg:px-6 w-full bg-gray-50">
                                <h3 class="flex items-center space-x-2">
                                    <svg class="hi-solid hi-speakerphone inline-block w-5 h-5 text-indigo-500"
                                        fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M18 3a1 1 0 00-1.447-.894L8.763 6H5a3 3 0 000 6h.28l1.771 5.316A1 1 0 008 18h1a1 1 0 001-1v-4.382l6.553 3.276A1 1 0 0018 15V3z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    <span>Notifications</span>
                                </h3>
                            </div>
                            <!-- END Card Header: Notifications -->

                            <!-- Card Body: Notifications -->
                            <div class="p-5 lg:p-6 grow w-full md:flex md:space-x-5">
                                <p class="md:flex-none md:w-1/3 text-gray-500 text-sm mb-5">
                                    You have complete control over the notifications you receive from us.
                                </p>
                                <form onsubmit="return false;" class="space-y-6 md:w-1/2">
                                    <div class="space-y-2">
                                        <div class="font-medium">Email Preferences</div>
                                        <div class="space-y-1">
                                            <label class="flex items-center">
                                                <input type="checkbox"
                                                    class="border border-gray-200 rounded h-4 w-4 text-indigo-500 focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50"
                                                    id="tk-form-layouts-multiple-cards-email-1" checked="checked" />
                                                <span class="ml-2">Account related</span>
                                            </label>
                                            <label class="flex items-center">
                                                <input type="checkbox"
                                                    class="border border-gray-200 rounded h-4 w-4 text-indigo-500 focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50"
                                                    id="tk-form-layouts-multiple-cards-email-2" checked="checked" />
                                                <span class="ml-2">Product announcements</span>
                                            </label>
                                            <label class="flex items-center">
                                                <input type="checkbox"
                                                    class="border border-gray-200 rounded h-4 w-4 text-indigo-500 focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50"
                                                    id="tk-form-layouts-multiple-cards-email-3" checked="checked" />
                                                <span class="ml-2">News and promotions</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="space-y-2">
                                        <div class="font-medium">Push Notifications</div>
                                        <div class="space-y-1">
                                            <label class="inline-flex items-center">
                                                <input type="radio"
                                                    class="border border-gray-200 h-4 w-4 text-indigo-500 focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50"
                                                    name="tk-form-layouts-multiple-cards-push"
                                                    id="tk-form-layouts-multiple-cards-push-1" checked="checked" />
                                                <span class="ml-2">Enable</span>
                                            </label>
                                            <label class="inline-flex items-center ml-6">
                                                <input type="radio"
                                                    class="border border-gray-200 h-4 w-4 text-indigo-500 focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50"
                                                    name="tk-form-layouts-multiple-cards-push"
                                                    id="tk-form-layouts-multiple-cards-push-2" />
                                                <span class="ml-2">Disable</span>
                                            </label>
                                        </div>
                                    </div>
                                    <button type="submit"
                                        class="inline-flex justify-center items-center space-x-2 border font-semibold focus:outline-none px-3 py-2 leading-5 text-sm rounded border-indigo-700 bg-indigo-700 text-white hover:text-white hover:bg-indigo-800 hover:border-indigo-800 focus:ring focus:ring-indigo-500 focus:ring-opacity-50 active:bg-indigo-700 active:border-indigo-700">
                                        Update Preferences
                                    </button>
                                </form>
                            </div>
                            <!-- END Card Body: Notifications -->
                        </div>
                        <!-- END Card: Notifications -->
                    </div>

                    <div id="tab-content-billing" class="py-6" hidden>
                        <div class="bg-white shadow sm:rounded-lg">
                            <div class="px-4 py-5 sm:p-6">
                              <h3 class="text-lg font-medium leading-6 text-gray-900">Payment method</h3>
                              <div class="mt-5">
                                <div class="rounded-md bg-gray-50 px-6 py-5 sm:flex sm:items-start sm:justify-between">
                                  <h4 class="sr-only">Visa</h4>
                                  <div class="sm:flex sm:items-start">
                                    <svg class="h-8 w-auto sm:h-6 sm:flex-shrink-0" viewBox="0 0 36 24" aria-hidden="true">
                                      <rect width="36" height="24" fill="#224DBA" rx="4" />
                                      <path fill="#fff" d="M10.925 15.673H8.874l-1.538-6c-.073-.276-.228-.52-.456-.635A6.575 6.575 0 005 8.403v-.231h3.304c.456 0 .798.347.855.75l.798 4.328 2.05-5.078h1.994l-3.076 7.5zm4.216 0h-1.937L14.8 8.172h1.937l-1.595 7.5zm4.101-5.422c.057-.404.399-.635.798-.635a3.54 3.54 0 011.88.346l.342-1.615A4.808 4.808 0 0020.496 8c-1.88 0-3.248 1.039-3.248 2.481 0 1.097.969 1.673 1.653 2.02.74.346 1.025.577.968.923 0 .519-.57.75-1.139.75a4.795 4.795 0 01-1.994-.462l-.342 1.616a5.48 5.48 0 002.108.404c2.108.057 3.418-.981 3.418-2.539 0-1.962-2.678-2.077-2.678-2.942zm9.457 5.422L27.16 8.172h-1.652a.858.858 0 00-.798.577l-2.848 6.924h1.994l.398-1.096h2.45l.228 1.096h1.766zm-2.905-5.482l.57 2.827h-1.596l1.026-2.827z" />
                                    </svg>
                                    <div class="mt-3 sm:mt-0 sm:ml-4">
                                      <div class="text-sm font-medium text-gray-900">Ending with 4242</div>
                                      <div class="mt-1 text-sm text-gray-600 sm:flex sm:items-center">
                                        <div>Expires 12/20</div>
                                        <span class="hidden sm:mx-2 sm:inline" aria-hidden="true">&middot;</span>
                                        <div class="mt-1 sm:mt-0">Last updated on 22 Aug 2017</div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="mt-4 sm:mt-0 sm:ml-6 sm:flex-shrink-0">
                                    <button type="button" class="inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:text-sm">Edit</button>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        <section aria-labelledby="payment-details-heading">
                            <form action="#" method="POST">
                              <div class="shadow sm:overflow-hidden sm:rounded-md">
                                <div class="bg-white py-6 px-4 sm:p-6">
                                  <div>
                                    <h2 id="payment-details-heading" class="text-lg font-medium leading-6 text-gray-900">Payment details</h2>
                                    <p class="mt-1 text-sm text-gray-500">Update your billing information. Please note that updating your location could affect your tax rates.</p>
                                  </div>
                  
                                  <div class="mt-6 grid grid-cols-4 gap-6">
                                    <div class="col-span-4 sm:col-span-2">
                                      <label for="first-name" class="block text-sm font-medium text-gray-700">First name</label>
                                      <input type="text" name="first-name" id="first-name" autocomplete="cc-given-name" class="mt-1 block w-full rounded-md border border-gray-300 py-2 px-3 shadow-sm focus:border-gray-900 focus:outline-none focus:ring-gray-900 sm:text-sm">
                                    </div>
                  
                                    <div class="col-span-4 sm:col-span-2">
                                      <label for="last-name" class="block text-sm font-medium text-gray-700">Last name</label>
                                      <input type="text" name="last-name" id="last-name" autocomplete="cc-family-name" class="mt-1 block w-full rounded-md border border-gray-300 py-2 px-3 shadow-sm focus:border-gray-900 focus:outline-none focus:ring-gray-900 sm:text-sm">
                                    </div>
                  
                                    <div class="col-span-4 sm:col-span-2">
                                      <label for="email-address" class="block text-sm font-medium text-gray-700">Email address</label>
                                      <input type="text" name="email-address" id="email-address" autocomplete="email" class="mt-1 block w-full rounded-md border border-gray-300 py-2 px-3 shadow-sm focus:border-gray-900 focus:outline-none focus:ring-gray-900 sm:text-sm">
                                    </div>
                  
                                    <div class="col-span-4 sm:col-span-1">
                                      <label for="expiration-date" class="block text-sm font-medium text-gray-700">Expration date</label>
                                      <input type="text" name="expiration-date" id="expiration-date" autocomplete="cc-exp" class="mt-1 block w-full rounded-md border border-gray-300 py-2 px-3 shadow-sm focus:border-gray-900 focus:outline-none focus:ring-gray-900 sm:text-sm" placeholder="MM / YY">
                                    </div>
                  
                                    <div class="col-span-4 sm:col-span-1">
                                      <label for="security-code" class="flex items-center text-sm font-medium text-gray-700">
                                        <span>Security code</span>
                                        <!-- Heroicon name: mini/question-mark-circle -->
                                        <svg class="ml-1 h-5 w-5 flex-shrink-0 text-gray-300" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                          <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zM8.94 6.94a.75.75 0 11-1.061-1.061 3 3 0 112.871 5.026v.345a.75.75 0 01-1.5 0v-.5c0-.72.57-1.172 1.081-1.287A1.5 1.5 0 108.94 6.94zM10 15a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd" />
                                        </svg>
                                      </label>
                                      <input type="text" name="security-code" id="security-code" autocomplete="cc-csc" class="mt-1 block w-full rounded-md border border-gray-300 py-2 px-3 shadow-sm focus:border-gray-900 focus:outline-none focus:ring-gray-900 sm:text-sm">
                                    </div>
                  
                                    <div class="col-span-4 sm:col-span-2">
                                      <label for="country" class="block text-sm font-medium text-gray-700">Country</label>
                                      <select id="country" name="country" autocomplete="country-name" class="mt-1 block w-full rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-gray-900 focus:outline-none focus:ring-gray-900 sm:text-sm">
                                        <option>United States</option>
                                        <option>Canada</option>
                                        <option>Mexico</option>
                                      </select>
                                    </div>
                  
                                    <div class="col-span-4 sm:col-span-2">
                                      <label for="postal-code" class="block text-sm font-medium text-gray-700">ZIP / Postal code</label>
                                      <input type="text" name="postal-code" id="postal-code" autocomplete="postal-code" class="mt-1 block w-full rounded-md border border-gray-300 py-2 px-3 shadow-sm focus:border-gray-900 focus:outline-none focus:ring-gray-900 sm:text-sm">
                                    </div>
                                  </div>
                                </div>
                                <div class="bg-gray-50 px-4 py-3 text-right sm:px-6">
                                  <button type="submit" class="inline-flex justify-center rounded-md border border-transparent bg-gray-800 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-gray-900 focus:ring-offset-2">Save</button>
                                </div>
                              </div>
                            </form>
                          </section>
                          <section aria-labelledby="billing-history-heading">
                            <div class="bg-white pt-6 shadow sm:overflow-hidden sm:rounded-md">
                              <div class="px-4 sm:px-6">
                                <h2 id="billing-history-heading" class="text-lg font-medium leading-6 text-gray-900">Billing history</h2>
                              </div>
                              <div class="mt-6 flex flex-col">
                                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                  <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                                    <div class="overflow-hidden border-t border-gray-200">
                                      <table class="min-w-full divide-y divide-gray-200">
                                        <thead class="bg-gray-50">
                                          <tr>
                                            <th scope="col" class="px-6 py-3 text-left text-sm font-semibold text-gray-900">Date</th>
                                            <th scope="col" class="px-6 py-3 text-left text-sm font-semibold text-gray-900">Description</th>
                                            <th scope="col" class="px-6 py-3 text-left text-sm font-semibold text-gray-900">Amount</th>
                                            <!--
                                              `relative` is added here due to a weird bug in Safari that causes `sr-only` headings to introduce overflow on the body on mobile.
                                            -->
                                            <th scope="col" class="relative px-6 py-3 text-left text-sm font-medium text-gray-500">
                                              <span class="sr-only">View receipt</span>
                                            </th>
                                          </tr>
                                        </thead>
                                        <tbody class="divide-y divide-gray-200 bg-white">
                                          <tr>
                                            <td class="whitespace-nowrap px-6 py-4 text-sm font-medium text-gray-900">
                                              <time datetime="2020-01-01">1/1/2020</time>
                                            </td>
                                            <td class="whitespace-nowrap px-6 py-4 text-sm text-gray-500">Business Plan - Annual Billing</td>
                                            <td class="whitespace-nowrap px-6 py-4 text-sm text-gray-500">CA$109.00</td>
                                            <td class="whitespace-nowrap px-6 py-4 text-right text-sm font-medium">
                                              <a href="#" class="text-orange-600 hover:text-orange-900">View receipt</a>
                                            </td>
                                          </tr>
                  
                                          <!-- More payments... -->
                                        </tbody>
                                      </table>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </section>
                    </div>


                </div>
            </div>
        </div>
    </main>

    <script>
        const tabs = document.querySelectorAll('[id^="tab-"]');
        const desktopTabContents = document.querySelectorAll('[id^="tab-content-"]');
        tabs.forEach((tab, index) => {
            tab.addEventListener('click', e => {
                e.preventDefault();
                const currentTab = e.target.id;
                tabs.forEach(tab => tab.classList.remove('border-purple-500', 'text-purple-600'));
                tab.classList.add('border-purple-500', 'text-purple-600');
                desktopTabContents.forEach(content => content.hidden = true);
                document.getElementById(`tab-content-${currentTab.split('-')[1]}`).hidden = false;
            });
            // Set the content hidden by default except for the first tab
            if (index > 0) {
                desktopTabContents[index].hidden = true;
            }
        });
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
