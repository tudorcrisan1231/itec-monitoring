<div>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

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
                        <div class="grid grid-cols-2 gap-4 mt-12 text-center sm:mt-16 sm:gap-6 sm:grid-cols-3 xl:grid-cols-6">
                            @foreach($applications as $application)
                                <div class="relative transition-all duration-200 transform bg-white border border-gray-100 rounded-lg hover:-translate-y-1 hover:shadow-lg">
                                    <div class="px-4 pb-5 pt-7 sm:px-6 sm:pb-6 sm:pt-8">
                                        <div class="relative">
                                            <div class="absolute inset-x-0 top-0 transform -translate-y-1/2">
                                                @if($application->status == 'stable')
                                                    <span class="text-xs font-medium text-green-900 bg-green-100 rounded-full inline-flex items-center px-2.5 py-1 uppercase">
                                                        <svg class="-ml-1 mr-1.5 h-2.5 w-2.5 text-green-500" fill="currentColor" viewBox="0 0 8 8">
                                                            <circle cx="4" cy="4" r="3"></circle>
                                                        </svg>
                                                        {{$application->status}}
                                                    </span>
                                                @elseif($application->status == 'unstable')
                                                    <span class="text-xs font-medium text-yellow-900 bg-yellow-100 rounded-full inline-flex items-center px-2.5 py-1 uppercase">
                                                        <svg class="-ml-1 mr-1.5 h-2.5 w-2.5 text-yellow-400" fill="currentColor" viewBox="0 0 8 8">
                                                            <circle cx="4" cy="4" r="3"></circle>
                                                        </svg>
                                                        {{$application->status}}
                                                    </span>
                                                @else
                                                    <span class="text-xs font-medium text-red-900 bg-red-100 rounded-full inline-flex items-center px-2.5 py-1 uppercase">
                                                        <svg class="-ml-1 mr-1.5 h-2.5 w-2.5 text-red-500" fill="currentColor" viewBox="0 0 8 8">
                                                            <circle cx="4" cy="4" r="3"></circle>
                                                        </svg>
                                                        {{$application->status}}
                                                    </span>
                                                @endif
                                            </div>
                                            @if($application->logo)
                                                <img class="object-cover mx-auto rounded-full w-28 h-28" src="{{asset('storage/'.$application->logo)}}" alt="" />
                                            @else
                                                <img class="object-cover mx-auto rounded-full w-28 h-28" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRUWtd12Y4OkXv1DOdUBKLLhjIwAM8AIys8f23zvjmFhw&s" alt="" />
                                            @endif
                                        </div>
                                        <p class="mt-5 text-base font-bold text-gray-900">
                                            <a href="#" title="">
                                                {{$application->name}}
                                                <span class="absolute inset-0" aria-hidden="true"></span>
                                            </a>
                                        </p>
                                        <p class="mt-1 text-sm font-medium text-gray-900 uppercase">
                                            {{$application->endpoints->count()}}
                                            <span class="text-gray-500">Endpoints</span>
                                        </p>
                                    </div>
                                </div>
                            @endforeach

                        </div>


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
                                                New developers are requesting to join ItecMonitor.
                                            </p>
                                        </div>

                                        <div class="mt-8 space-y-6">
                                            @forelse($pendingUsers as $user)
                                                <div class="flex items-center justify-between space-x-5">
                                                    <div class="flex items-center flex-1 min-w-0">
                                                        <img class="flex-shrink-0 object-cover w-10 h-10 rounded-full" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRUWtd12Y4OkXv1DOdUBKLLhjIwAM8AIys8f23zvjmFhw&s" alt="" />
                                                        <div class="flex-1 min-w-0 ml-4">
                                                            <p class="text-sm font-bold text-gray-900">
                                                                {{$user->name}}
                                                            </p>
                                                            <p class="mt-1 text-sm font-medium text-gray-500">
                                                                {{$user->email}}
                                                            </p>
                                                        </div>
                                                    </div>

                                                    <div class="text-right flex items-center gap-1">
                                                        <button
                                                            type="button"
                                                            wire:click="approveUser({{$user->id}})"
                                                            class="inline-flex items-center justify-center w-full px-2 py-1 text-sm font-semibold leading-5 text-white transition-all duration-200 bg-green-600 border border-transparent rounded-lg focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-600 hover:bg-green-500"
                                                        >
                                                            Approve
                                                        </button>

                                                        <button
                                                            type="button"
                                                            wire:click="rejectUser({{$user->id}})"
                                                            class="inline-flex items-center justify-center w-full px-2 py-1 text-sm font-semibold leading-5 text-white transition-all duration-200 bg-red-600 border border-transparent rounded-lg focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-600 hover:bg-red-500"
                                                        >
                                                            Reject
                                                        </button>
                                                    </div>
                                                </div>
                                            @empty
                                                <div class="flex items center justify-center">
                                                    <p class="text-sm font-medium text-gray-500">No new requests</p>
                                                </div>
                                            @endforelse
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
</div>
