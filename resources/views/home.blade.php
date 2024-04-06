@extends('layouts.app')

@section('content')
<div>
    <!-- Banner -->
    <div class="flex flex-col flex-1 overflow-x-hidden">
        <section class="relative py-12 bg-gray-900 sm:py-16 lg:py-20 xl:py-32">
            <div class="absolute inset-0">
                <img class="object-cover w-full h-full" src="https://akuwa.com/wp-content/uploads/2018/11/monitoring.jpg" alt="" />
            </div>
            <div class="absolute inset-0 bg-gray-800/70 lg:bg-gray-900/50"></div>
            <div class="relative px-4 mx-auto sm:px-6 lg:px-8 max-w-7xl">
                <div class="text-center">
                    <h1 class="text-2xl font-bold  text-lime-300 sm:text-3xl lg:text-5xl">iTecMonitoring</h1>
                    <p class="max-w-3xl mx-auto mt-4 text-lg  text-white sm:text-xl lg:text-2xl">Monitor your applications and endpoints health in <b>real time</b> seconds by seconds</p>
                </div>
            </div>
        </section>
       
    </div>

    <!-- Search Bar -->
    <div class="flex  max-w-full items-center justify-center p-10">
        <label for="" class="sr-only"> Search </label>
        <div class="relative w-1/2">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                <svg class="w-5 h-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
            </div>

            <input type="search" name="" id="" class="block w-full py-2 pl-10 border border-gray-300 rounded-lg focus:ring-lime-600 focus:border-lime-600 sm:text-sm" placeholder="Type to search" />
        </div>
    </div>

    <!-- Applications cards -->
    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
        <!-- Add foreach -->
        <div class=" relative transition-all duration-200 transform bg-white border border-gray-100 rounded-lg hover:-translate-y-1 hover:shadow-lg">
            <div class="px-4 pb-5 pt-7 sm:px-6 sm:pb-6 sm:pt-8">
                <div class="relative">
                    <div class=" inset-x-0 top-0 transform -translate-y-1/2">
                    
                            <span class="text-xs font-medium text-green-900 bg-green-100 rounded-full inline-flex items-center px-2.5 py-1 uppercase">
                            <svg class="-ml-1 mr-1.5 h-2.5 w-2.5 text-green-500" fill="currentColor" viewBox="0 0 8 8">
                                <circle cx="4" cy="4" r="3"></circle>
                            </svg>
                        
                        </span>
                    
                    </div>
                    <img class="object-cover mx-auto rounded-full w-28 h-28" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRUWtd12Y4OkXv1DOdUBKLLhjIwAM8AIys8f23zvjmFhw&s" alt="" />
        
                </div>
                <div class="grid grid-cols-2 justify-between items-center ">
                    <div class="flex-1 items-center justify-center ml-3">
                        <p class=" text-base font-bold text-gray-900">
                        <a href="" title="">
                            <span aria-hidden="true">Tazz.ro</span>
                        </a>
                        </p>
                        <p class="mt-1 text-sm font-medium text-gray-900 uppercase">
                            50
                            <span class="text-gray-500">Endpoints</span>
                        </p>
                    </div>
                    <div class="flex items-center justify-center">
                        <button
                            type="submit"
                            wire:click="createApplication"
                            class="inline-flex items-center justify-center p-2 text-sm font-semibold leading-5 text-white transition-all duration-200 bg-lime-400 border border-transparent rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-lime-600 hover:bg-lime-600"
                        >
                            Report a bug
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- End foreach -->
    </div>
</div>
@endsection
