@extends('layouts.app')

@section('content')
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <div class="flex flex-col">
        <header class="bg-white border-b border-gray-200">
            <div class="px-4 mx-auto">
                <div class="flex items-center justify-between h-16">
                    <div class="flex items-center -m-2 xl:hidden">
                        <button type="button" class="inline-flex items-center justify-center p-2 text-gray-400 bg-white rounded-lg hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-600">
                            <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"></path>
                            </svg>
                        </button>
                    </div>

                    <div class="flex ml-6 xl:ml-0">
                        <div class="flex items-center flex-shrink-0 font-extrabold text-2xl">
                            ItecMonitoring
                        </div>
                    </div>

                    <div class="flex-1 hidden max-w-xs ml-40 mr-auto lg:block">
                        <label for="" class="sr-only"> Search </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg class="w-5 h-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                            </div>

                            <input type="search" name="" id="" class="block w-full py-2 pl-10 border border-gray-300 rounded-lg focus:ring-indigo-600 focus:border-indigo-600 sm:text-sm" placeholder="Type to search" />
                        </div>
                    </div>

                    <div class="flex items-center justify-end ml-auto space-x-6">
                        <button type="button" class="flex items-center max-w-xs rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-600">
                            <img class="object-cover bg-gray-300 rounded-full w-9 h-9" src="https://landingfoliocom.imgix.net/store/collection/clarity-dashboard/images/previews/dashboards/1/avatar-male.png" alt="" />
                        </button>
                    </div>
                </div>
            </div>
        </header>

        <div class="flex flex-1">
            <div class="hidden xl:flex xl:w-64 xl:flex-col">
                <div class="flex flex-col pt-5 overflow-y-auto">
                    <div class="flex flex-col justify-between flex-1 h-full px-4">
                        <div class="space-y-4">
                            <div>
                                <button
                                    type="button"
                                    class="inline-flex items-center justify-center w-full px-4 py-3 text-sm font-semibold leading-5 text-white transition-all duration-200 bg-indigo-600 border border-transparent rounded-lg focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-600 hover:bg-indigo-500"
                                >
                                    <svg class="w-5 h-5 mr-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                    </svg>
                                    Add a new application
                                </button>
                            </div>

                            <nav class="flex-1 space-y-1">
                                <a href="#" title="" class="flex items-center px-4 py-2.5 text-sm font-medium transition-all duration-200 text-gray-900 rounded-lg hover:bg-gray-200 group">
                                    <svg class="flex-shrink-0 w-5 h-5 mr-4" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                    </svg>
                                    Applications
                                </a>

                                <a href="#" title="" class="flex items-center px-4 py-2.5 text-sm font-medium transition-all duration-200 text-gray-900 rounded-lg hover:bg-gray-200 group">
                                    <svg class="flex-shrink-0 w-5 h-5 mr-4" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                                    </svg>
                                    Tickets
                                    <span class="text-xs uppercase ml-auto font-semibold text-white bg-gray-500 border border-transparent rounded-full inline-flex items-center px-2 py-0.5"> 15 </span>
                                </a>

                                <a href="#" title="" class="flex items-center px-4 py-2.5 text-sm font-medium transition-all duration-200 text-gray-900 rounded-lg hover:bg-gray-200 group">
                                    <svg class="flex-shrink-0 w-5 h-5 mr-4" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 16 16"><path fill="currentColor" d="M5 8.25a.75.75 0 0 1 .75-.75h4a.75.75 0 0 1 0 1.5h-4A.75.75 0 0 1 5 8.25M4 10.5A.75.75 0 0 0 4 12h4a.75.75 0 0 0 0-1.5z"/><path fill="currentColor" d="M13-.005c1.654 0 3 1.328 3 3c0 .982-.338 1.933-.783 2.818c-.443.879-1.028 1.758-1.582 2.588l-.011.017c-.568.853-1.104 1.659-1.501 2.446c-.398.789-.623 1.494-.623 2.136a1.5 1.5 0 1 0 2.333-1.248a.75.75 0 0 1 .834-1.246A3 3 0 0 1 13 16H3a3 3 0 0 1-3-3c0-1.582.891-3.135 1.777-4.506c.209-.322.418-.637.623-.946c.473-.709.923-1.386 1.287-2.048H2.51c-.576 0-1.381-.133-1.907-.783A2.68 2.68 0 0 1 0 2.995a3 3 0 0 1 3-3Zm0 1.5a1.5 1.5 0 0 0-1.5 1.5c0 .476.223.834.667 1.132A.75.75 0 0 1 11.75 5.5H5.368c-.467 1.003-1.141 2.015-1.773 2.963c-.192.289-.381.571-.558.845C2.13 10.711 1.5 11.916 1.5 13A1.5 1.5 0 0 0 3 14.5h7.401A2.989 2.989 0 0 1 10 13c0-.979.338-1.928.784-2.812c.441-.874 1.023-1.748 1.575-2.576l.017-.026c.568-.853 1.103-1.658 1.501-2.448c.398-.79.623-1.497.623-2.143c0-.838-.669-1.5-1.5-1.5m-10 0a1.5 1.5 0 0 0-1.5 1.5c0 .321.1.569.27.778c.097.12.325.227.74.227h7.674A2.737 2.737 0 0 1 10 2.995c0-.546.146-1.059.401-1.5Z"/></svg>
                                    Logs
                                    <span class="text-xs uppercase ml-auto font-semibold text-white bg-gray-500 border border-transparent rounded-full inline-flex items-center px-2 py-0.5"> 15 </span>
                                </a>

                                <a href="#" title="" class="flex items-center px-4 py-2.5 text-sm font-medium transition-all duration-200 text-gray-900 rounded-lg hover:bg-gray-200 group">
                                    <svg class="flex-shrink-0 w-5 h-5 mr-4" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="currentColor" d="M13.07 10.41a5 5 0 0 0 0-5.82A3.39 3.39 0 0 1 15 4a3.5 3.5 0 0 1 0 7a3.39 3.39 0 0 1-1.93-.59M5.5 7.5A3.5 3.5 0 1 1 9 11a3.5 3.5 0 0 1-3.5-3.5m2 0A1.5 1.5 0 1 0 9 6a1.5 1.5 0 0 0-1.5 1.5M16 17v2H2v-2s0-4 7-4s7 4 7 4m-2 0c-.14-.78-1.33-2-5-2s-4.93 1.31-5 2m11.95-4A5.32 5.32 0 0 1 18 17v2h4v-2s0-3.63-6.06-4Z"/></svg>
                                    Account requests
                                    <span class="text-xs uppercase ml-auto font-semibold text-white bg-gray-500 border border-transparent rounded-full inline-flex items-center px-2 py-0.5"> 15 </span>
                                </a>
                            </nav>
                        </div>

                        <div class="pb-4 mt-12">
                            <nav class="flex-1 space-y-1">
                                <a href="{{route('signout')}}" title="" class="flex items-center px-4 py-2.5 text-sm font-medium transition-all duration-200 text-gray-900 rounded-lg hover:bg-gray-200 group">
                                    <svg class="flex-shrink-0 w-5 h-5 mr-4" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                    </svg>
                                    Logout
                                </a>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex flex-col flex-1 overflow-x-hidden">
                <main>
                    <div class="py-6">
                        <div class="px-4 mx-auto sm:px-6 md:px-8">
                            <div class="md:items-center md:flex">
                                <p class="text-base font-bold text-gray-900">Hey {{auth()->user()->name}} -</p>
                                <p class="mt-1 text-base font-medium text-gray-500 md:mt-0 md:ml-2">
                                    here is what is happening with your applications today.
                                </p>
                            </div>
                        </div>

                        <div class="px-4 mx-auto mt-8 sm:px-6 md:px-8">
                            <div class="space-y-5 sm:space-y-6">
{{--                                <div class="grid grid-cols-1 gap-5 sm:gap-6 sm:grid-cols-2 lg:grid-cols-4">--}}
{{--                                    <div class="bg-white border border-gray-200 rounded-xl">--}}
{{--                                        <div class="px-5 py-4">--}}
{{--                                            <p class="text-xs font-medium tracking-wider text-gray-500 uppercase">Today's Sale</p>--}}
{{--                                            <div class="flex items-center justify-between mt-3">--}}
{{--                                                <p class="text-xl font-bold text-gray-900">$12,426</p>--}}

{{--                                                <span class="inline-flex items-center text-sm font-semibold text-green-500">--}}
{{--                                                + 36%--}}
{{--                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 ml-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">--}}
{{--                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M7 11l5-5m0 0l5 5m-5-5v12"></path>--}}
{{--                                                </svg>--}}
{{--                                            </span>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}

{{--                                    <div class="bg-white border border-gray-200 rounded-xl">--}}
{{--                                        <div class="px-5 py-4">--}}
{{--                                            <p class="text-xs font-medium tracking-wider text-gray-500 uppercase">Total Sales</p>--}}
{{--                                            <div class="flex items-center justify-between mt-3">--}}
{{--                                                <p class="text-xl font-bold text-gray-900">$2,38,485</p>--}}

{{--                                                <span class="inline-flex items-center text-sm font-semibold text-red-500">--}}
{{--                                                - 14%--}}
{{--                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 ml-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">--}}
{{--                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M17 13l-5 5m0 0l-5-5m5 5V6" />--}}
{{--                                                </svg>--}}
{{--                                            </span>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}

{{--                                    <div class="bg-white border border-gray-200 rounded-xl">--}}
{{--                                        <div class="px-5 py-4">--}}
{{--                                            <p class="text-xs font-medium tracking-wider text-gray-500 uppercase">Total ORders</p>--}}
{{--                                            <div class="flex items-center justify-between mt-3">--}}
{{--                                                <p class="text-xl font-bold text-gray-900">84,382</p>--}}

{{--                                                <span class="inline-flex items-center text-sm font-semibold text-green-500">--}}
{{--                                                + 36%--}}
{{--                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 ml-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">--}}
{{--                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M7 11l5-5m0 0l5 5m-5-5v12"></path>--}}
{{--                                                </svg>--}}
{{--                                            </span>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}

{{--                                    <div class="bg-white border border-gray-200 rounded-xl">--}}
{{--                                        <div class="px-5 py-4">--}}
{{--                                            <p class="text-xs font-medium tracking-wider text-gray-500 uppercase">Total Customers</p>--}}
{{--                                            <div class="flex items-center justify-between mt-3">--}}
{{--                                                <p class="text-xl font-bold text-gray-900">33,493</p>--}}

{{--                                                <span class="inline-flex items-center text-sm font-semibold text-green-500">--}}
{{--                                                + 36%--}}
{{--                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 ml-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">--}}
{{--                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M7 11l5-5m0 0l5 5m-5-5v12"></path>--}}
{{--                                                </svg>--}}
{{--                                            </span>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}

                                <div class="grid grid-cols-1 gap-5 sm:gap-6 lg:grid-cols-4">
                                    <div class="overflow-hidden bg-white border border-gray-200 rounded-xl lg:col-span-4">
                                        <div class="px-4 pt-5 sm:px-6">
                                            <div class="flex flex-wrap items-center justify-between">
                                                <p class="text-base font-bold text-gray-900 lg:order-1">
                                                    Applications Overview
                                                </p>

                                                <nav class="flex items-center justify-center mt-4 space-x-1 2xl:order-2 lg:order-3 md:mt-0 lg:mt-4 sm:space-x-2 2xl:mt-0">
                                                    <a href="#" title="" class="px-2 py-2 text-xs font-bold text-gray-900 transition-all border border-gray-900 rounded-lg sm:px-4 hover:bg-gray-100 dration-200"> 12 Months </a>

                                                    <a href="#" title="" class="px-2 py-2 text-xs font-bold text-gray-500 transition-all border border-transparent rounded-lg sm:px-4 hover:bg-gray-100 dration-200"> 6 Months </a>

                                                    <a href="#" title="" class="px-2 py-2 text-xs font-bold text-gray-500 transition-all border border-transparent rounded-lg sm:px-4 hover:bg-gray-100 dration-200"> 30 Days </a>

                                                    <a href="#" title="" class="px-2 py-2 text-xs font-bold text-gray-500 transition-all border border-transparent rounded-lg sm:px-4 hover:bg-gray-100 dration-200"> 7 Days </a>
                                                </nav>
                                            </div>

                                            <div id="chart4" class=""></div>
                                        </div>
                                    </div>

                                </div>

                                <div class="grid grid-cols-1 gap-5 sm:gap-6 lg:grid-cols-6 items-start">
                                    <div class="overflow-hidden bg-white border border-gray-200 rounded-xl lg:col-span-3">
                                        <div class="px-4 py-5 sm:p-6">
                                            <div class="sm:flex sm:items-start sm:justify-between">
                                                <div>
                                                    <p class="text-base font-bold text-gray-900">LOGS</p>
                                                    <p class="mt-1 text-sm font-medium text-gray-500">
                                                        Here are the latest logs from your applications.
                                                    </p>
                                                </div>

                                                <div class="mt-4 sm:mt-0">
                                                    <a href="#" title="" class="inline-flex items-center text-xs font-semibold tracking-widest text-gray-500 uppercase hover:text-gray-900">
                                                        See all logs
                                                        <svg class="w-4 h-4 ml-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"></path>
                                                        </svg>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="divide-y divide-gray-200">
                                            <div class="grid grid-cols-3 py-4 gap-y-4 lg:gap-0 lg:grid-cols-5">
                                                <div class="col-span-2 px-4 lg:py-4 sm:px-6 lg:col-span-1">
                                                    <span class="text-xs font-medium text-green-900 bg-green-100 rounded-full inline-flex items-center px-2.5 py-1">
                                                        <svg class="-ml-1 mr-1.5 h-2.5 w-2.5 text-green-500" fill="currentColor" viewBox="0 0 8 8">
                                                            <circle cx="4" cy="4" r="3"></circle>
                                                        </svg>
                                                        200
                                                    </span>
                                                </div>

                                                <div class="px-4 lg:py-4 sm:px-6 lg:col-span-2">
                                                    <p class="text-sm font-bold text-gray-900">
                                                        Tazz.ro
                                                    </p>
                                                    <p class="mt-1 text-sm font-medium text-gray-500">
                                                        GET: /api/v1/users
                                                    </p>
                                                </div>

                                                <div class="px-4 lg:py-4 sm:px-6">
                                                    <p class="text-sm font-bold text-gray-900">
                                                        12:45:34 PM
                                                    </p>
                                                    <p class="mt-1 text-sm font-medium text-gray-500">Jan 17, 2022</p>
                                                </div>

                                                <div class="px-4 lg:py-4 sm:px-6">
                                                    <p class="mt-1 text-sm font-medium text-gray-500">
                                                        200 OK
                                                    </p>
                                                </div>
                                            </div>

                                            <div class="grid grid-cols-3 py-4 gap-y-4 lg:gap-0 lg:grid-cols-5">
                                                <div class="col-span-2 px-4 lg:py-4 sm:px-6 lg:col-span-1">
                                                    <span class="text-xs font-medium text-yellow-900 bg-yellow-100 rounded-full inline-flex items-center px-2.5 py-1">
                                                    <svg class="-ml-1 mr-1.5 h-2.5 w-2.5 text-yellow-400" fill="currentColor" viewBox="0 0 8 8">
                                                        <circle cx="4" cy="4" r="3"></circle>
                                                    </svg>
                                                    302
                                                </span>
                                                </div>

                                                <div class="px-4 lg:py-4 sm:px-6 lg:col-span-2">
                                                    <p class="text-sm font-bold text-gray-900">
                                                        Tazz.ro
                                                    </p>
                                                    <p class="mt-1 text-sm font-medium text-gray-500">
                                                        GET: /api/v1/users
                                                    </p>
                                                </div>

                                                <div class="px-4 lg:py-4 sm:px-6">
                                                    <p class="text-sm font-bold text-gray-900">
                                                        12:45:34 PM
                                                    </p>
                                                    <p class="mt-1 text-sm font-medium text-gray-500">Jan 17, 2022</p>
                                                </div>

                                                <div class="px-4 lg:py-4 sm:px-6">
                                                    <p class="mt-1 text-sm font-medium text-gray-500">
                                                        200 OK
                                                    </p>
                                                </div>
                                            </div>

                                            <div class="grid grid-cols-3 py-4 gap-y-4 lg:gap-0 lg:grid-cols-5">
                                                <div class="col-span-2 px-4 lg:py-4 sm:px-6 lg:col-span-1">
                                                    <span class="text-xs font-medium text-red-900 bg-red-100 rounded-full inline-flex items-center px-2.5 py-1">
                                                        <svg class="-ml-1 mr-1.5 h-2.5 w-2.5 text-red-500" fill="currentColor" viewBox="0 0 8 8">
                                                            <circle cx="4" cy="4" r="3"></circle>
                                                        </svg>
                                                        500
                                                    </span>
                                                </div>

                                                <div class="px-4 lg:py-4 sm:px-6 lg:col-span-2">
                                                    <p class="text-sm font-bold text-gray-900">
                                                        Tazz.ro
                                                    </p>
                                                    <p class="mt-1 text-sm font-medium text-gray-500">
                                                        GET: /api/v1/users
                                                    </p>
                                                </div>

                                                <div class="px-4 lg:py-4 sm:px-6">
                                                    <p class="text-sm font-bold text-gray-900">
                                                        12:45:34 PM
                                                    </p>
                                                    <p class="mt-1 text-sm font-medium text-gray-500">Jan 17, 2022</p>
                                                </div>

                                                <div class="px-4 lg:py-4 sm:px-6">
                                                    <p class="mt-1 text-sm font-medium text-gray-500">
                                                        200 OK
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @if(auth()->user()->role_id == 2)
                                        <div class="overflow-hidden bg-white border border-gray-200 rounded-xl lg:col-span-3">
                                        <div class="px-4 py-5 sm:p-6">
                                            <div>
                                                <p class="text-base font-bold text-gray-900">New account requests</p>
                                                <p class="mt-1 text-sm font-medium text-gray-500">
                                                    New developers are requesting to join ItecMonitoring.
                                                </p>
                                            </div>

                                            <div class="mt-8 space-y-6">
                                                <div class="flex items-center justify-between space-x-5">
                                                    <div class="flex items-center flex-1 min-w-0">
                                                        <img class="flex-shrink-0 object-cover w-10 h-10 rounded-full" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRUWtd12Y4OkXv1DOdUBKLLhjIwAM8AIys8f23zvjmFhw&s" alt="" />
                                                        <div class="flex-1 min-w-0 ml-4">
                                                            <p class="text-sm font-bold text-gray-900">Jenny Wilson</p>
                                                            <p class="mt-1 text-sm font-medium text-gray-500">w.lawson@example.com</p>
                                                        </div>
                                                    </div>

                                                    <div class="text-right flex items-center gap-1">
                                                        <button
                                                            type="button"
                                                            class="inline-flex items-center justify-center w-full px-2 py-1 text-sm font-semibold leading-5 text-white transition-all duration-200 bg-green-600 border border-transparent rounded-lg focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-600 hover:bg-green-500"
                                                        >
                                                            Approve
                                                        </button>

                                                        <button
                                                            type="button"
                                                            class="inline-flex items-center justify-center w-full px-2 py-1 text-sm font-semibold leading-5 text-white transition-all duration-200 bg-red-600 border border-transparent rounded-lg focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-600 hover:bg-red-500"
                                                        >
                                                            Reject
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mt-8">
                                                <a href="#" title="" class="inline-flex items-center text-xs font-semibold tracking-widest text-gray-500 uppercase hover:text-gray-900">
                                                    See all Requests
                                                    <svg class="w-4 h-4 ml-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"></path>
                                                    </svg>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
    </div>

    <script>
        var chart4Options = {
            chart: {
                type: 'area',
                height: 260,
                toolbar: {
                    show: false,
                },
                zoom: {
                    enabled: false,
                },
            },
            series: [
                {
                    name: 'New user',
                    data: [76, 85, 101, 98, 87, 105, 91, 114, 94, 76, 85, 101],
                },
                {
                    name: 'Returning user',
                    data: [44, 55, 57, 56, 61, 58, 63, 60, 66, 44, 55, 57],
                },
            ],
            dataLabels: {
                enabled: false,
            },
            stroke: {
                show: true,
                curve: 'smooth',
                lineCap: 'butt',
                colors: undefined,
                width: 2,
            },
            grid: {
                row: {
                    opacity: 0,
                },
            },
            xaxis: {
                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            },
            yaxis: {
                show: false,
            },
            fill: {
                type: 'solid',
                opacity: [0.05, 0],
            },
            colors: ['#4F46E5', '#818CF8'],
            legend: {
                position: 'bottom',
                markers: {
                    radius: 12,
                    offsetX: -4,
                },
                itemMargin: {
                    horizontal: 12,
                    vertical: 20,
                },
            },
        }

        var chart4 = new ApexCharts(document.querySelector('#chart4'), chart4Options)

        chart4.render()
    </script>

@endsection
