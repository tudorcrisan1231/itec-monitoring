<div class="w-full mt-6 px-4 mx-auto sm:px-6 md:px-8">
    <div class="flex items-center justify-between mb-10">
        <h1 class="text-2xl font-bold text-gray-900">
            "{{ $application->name }}" endpoints health

        </h1>
        <div class="flex items-center gap-4">
            <a href="{{ route('addApplication') }}?edit={{ $application->id }}}}"
               class="inline-flex items-center justify-center px-6 py-3 text-sm font-semibold leading-5 text-white transition-all duration-200 bg-lime-600 border border-transparent rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-lime-600 hover:bg-lime-500"
            >
                Edit application
            </a>
            <div
                wire:confirm="Are you sure you want to delete this application? This action is irreversible."
                wire:click="deleteApplication"
                class="inline-flex items-center cursor-pointer justify-center px-6 py-3 text-sm font-semibold leading-5 text-white transition-all duration-200 bg-red-600 border border-transparent rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-600 hover:bg-red-500"
            >
                Remove
            </div>
        </div>
    </div>
    <div class="grid grid-cols-1 gap-4 text-center sm:gap-6 sm:grid-cols-2 xl:grid-cols-3 w-full">
        @forelse($application->endpoints as $endpoint)
            <div class="">
                <div class="overflow-hidden bg-white border border-gray-200 rounded-xl">
                    <div class="px-4 py-5 sm:p-3">
                        <div class="">
                            <p class="text-sm font-semibold text-gray-500 uppercase">
                                {{ $endpoint->method }}
                            </p>
                            <p class="text-base font-bold text-gray-900">
                                {{ $endpoint->url }}
                            </p>
                        </div>

                        <livewire:livewire-pie-chart
                            key="{{ $pieChartModel[$endpoint->id]->reactiveKey() }}"
                            :pie-chart-model="$pieChartModel[$endpoint->id]"
                        />
                    </div>
                </div>
            </div>
        @empty
            <div class="p-6 text-center">
                <p class="text-lg text-gray-500">
                    No endpoints found.
                </p>
            </div>
        @endforelse
    </div>
</div>
