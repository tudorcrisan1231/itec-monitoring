<div class="flex flex-col gap-4 mt-6 px-8 pb-10">
    <div class="flex items-center justify-between mb-10">
        <h1 class="text-2xl font-bold text-gray-900">
            Open Tickets
        </h1>
    </div>

    @forelse($tickets as $ticket)
        <div class="grid grid-cols-3 py-4 gap-y-4 lg:gap-0 lg:grid-cols-5 border border-gray-300 rounded">
            <div class="px-4 lg:py-4 sm:px-6">
                <a href="{{$ticket->application ? route('application', ['name' => $ticket->application->name]) : '#'}}" class="text-sm font-bold text-gray-900">
                    {{$ticket->application ? $ticket->application->name : ''}}
                </a>
            </div>

            <div class="px-4 lg:py-4 sm:px-6 text-sm font-medium text-gray-500">
                {{$ticket->description}}
            </div>

            <div class="px-4 lg:py-4 sm:px-6">
                <p class="text-sm font-bold text-gray-900">
                    {{$ticket->created_at->diffForHumans()}}
                </p>
                <p class="mt-1 text-sm font-medium text-gray-500">
                    {{$ticket->created_at->format('d M, Y: h:i A')}}
                </p>
            </div>

            <div class="px-4 lg:py-4 sm:px-6">
                <p class="mt-1 text-sm font-medium text-gray-500">
                    Correlation ID: {{$ticket->id}}
                </p>
            </div>

            <div class="px-4 lg:py-4 sm:px-6 flex items-center gap-4">
                <button wire:confirm="Are you sure that everything works fine?" wire:click="closeTicket({{$ticket->id}})" class="inline-flex items-center justify-center w-full px-4 py-3 text-sm font-semibold leading-5 text-white transition-all duration-200 bg-lime-600 border border-transparent rounded-lg focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-lime-600 hover:bg-lime-500">
                    Mark as Resolved
                </button>
            </div>
        </div>
    @empty
        <div class="p-6 text-center">
            <p class="text-lg text-gray-500">
                No open tickets found.
            </p>
        </div>
    @endforelse
</div>
