<div class="flex flex-col gap-4 mt-6 px-8 pb-10">
    <div class="flex items-center justify-between mb-10">
        <h1 class="text-2xl font-bold text-gray-900">
            LOGS
        </h1>
        <div class="flex items-center gap-4">
            <select name=""
                    id="endpoint_method"
                    wire:change="filterLogs"
                    wire:model="selectedMethod"
                    class="border block px-4 py-3 placeholder-gray-500 border-gray-300 rounded-lg focus:ring-lime-600 focus:border-lime-600 sm:text-sm caret-lime-600">
                <option value="all">All</option>
                <option value="get">GET</option>
                <option value="post">POST</option>
                <option value="put">PUT</option>
                <option value="delete">DELETE</option>
                <option value="curl">CURL</option>
            </select>

            <select name=""
                    id="endpoint_method"
                    wire:change="filterLogs"
                    wire:model="selectedApplication"
                    class="border block px-4 py-3 placeholder-gray-500 border-gray-300 rounded-lg focus:ring-lime-600 focus:border-lime-600 sm:text-sm caret-lime-600">
                <option value="all">All</option>
                @foreach($applications as $app)
                    <option value="{{$app->id}}">{{$app->name}}</option>
                @endforeach
            </select>
        </div>
    </div>

    @forelse($logs as $log)
        <div class="grid grid-cols-3 py-4 gap-y-4 lg:gap-0 lg:grid-cols-5 border border-gray-300 rounded">
            <div class="col-span-2 px-4 lg:py-4 sm:px-6 lg:col-span-1">
                @if($log->status >= 200 && $log->status < 300)
                    <span class="text-xs font-medium text-green-900 bg-green-100 rounded-full inline-flex items-center px-2.5 py-1 uppercase">
                        <svg class="-ml-1 mr-1.5 h-2.5 w-2.5 text-green-500" fill="currentColor" viewBox="0 0 8 8">
                            <circle cx="4" cy="4" r="3"></circle>
                        </svg>
                        {{$log->status}}
                    </span>
                @elseif($log->status >= 300 && $log->status < 400)
                    <span class="text-xs font-medium text-yellow-900 bg-yellow-100 rounded-full inline-flex items-center px-2.5 py-1 uppercase">
                        <svg class="-ml-1 mr-1.5 h-2.5 w-2.5 text-yellow-400" fill="currentColor" viewBox="0 0 8 8">
                            <circle cx="4" cy="4" r="3"></circle>
                        </svg>
                        {{$log->status}}
                    </span>
                @else
                    <span class="text-xs font-medium text-red-900 bg-red-100 rounded-full inline-flex items-center px-2.5 py-1 uppercase">
                        <svg class="-ml-1 mr-1.5 h-2.5 w-2.5 text-red-500" fill="currentColor" viewBox="0 0 8 8">
                            <circle cx="4" cy="4" r="3"></circle>
                        </svg>
                        {{$log->status}}
                    </span>
                @endif
            </div>

            <div class="px-4 lg:py-4 sm:px-6 lg:col-span-2">
                <a href="{{route('application', ['name' => $log->application->name])}}" class="text-sm font-bold text-gray-900">
                    {{$log->application ? $log->application->name : ''}}
                </a>
                <div class="mt-1 text-sm font-medium text-gray-500" title="{{$log->endpoint->url ?? ''}}">
                   <b class="uppercase">
                       {{$log->method}}:
                   </b>
                    <span class="line-clamp-2">
                        {{$log->endpoint->url ?? ''}}
                    </span>
                </div>
            </div>

            <div class="px-4 lg:py-4 sm:px-6">
                <p class="text-sm font-bold text-gray-900">
                    {{$log->created_at->diffForHumans()}}
                </p>
                <p class="mt-1 text-sm font-medium text-gray-500">
                    {{$log->created_at->format('d M, Y: h:i A')}}
                </p>
            </div>

            <div class="px-4 lg:py-4 sm:px-6">
                <p class="mt-1 text-sm font-medium text-gray-500">
                    Correlation ID: {{$log->id}}
                </p>
            </div>
        </div>
    @empty
        <div class="p-6 text-center">
            <p class="text-lg text-gray-500">
                No logs found.
            </p>
        </div>
    @endforelse
    <div class="mt-6">
        {{$logs->links()}}
    </div>
</div>
