<div>
    <div class="flex flex-col flex-1">
        <main>
            <div class="my-6 py-6 bg-white border border-gray-200 rounded-xl">
                <div class="px-4 mx-auto sm:px-6 md:px-8">
                    <h1 class="text-2xl font-bold text-gray-900">
                        @if($isEdit)
                            Edit application
                        @else
                            Add a new application for monitoring
                        @endif
                    </h1>
                </div>

                <div class="px-4 mx-auto mt-8 sm:px-6 md:px-8">

                    <div class="max-w-3xl mt-12">
                        <div class="space-y-8">
                            <div class="sm:grid sm:grid-cols-3 sm:gap-5 sm:items-start">
                                <label for="" class="block text-sm font-bold text-gray-900 sm:mt-px sm:pt-2"> Logo </label>
                                <div class="mt-2 sm:mt-0 sm:col-span-2">
                                    @if($isEdit && $tmpLogo)
                                        <div class="flex items-center space-x-6">
                                            <img class="flex-shrink-0 object-cover w-12 h-12 rounded-lg" src="{{asset('storage/'.$tmpLogo)}}" alt="" />
                                            <button type="button" wire:click="removeTmpLogo" class="text-sm font-semibold text-gray-400 transition-all duration-200 bg-white rounded-md hover:text-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-600">Remove</button>
                                        </div>
                                    @else
                                        <input type="file" name="" id="logo" wire:model="logo" class="border block w-full px-4 py-3 placeholder-gray-500 border-gray-300 rounded-lg focus:ring-lime-600 focus:border-lime-600 sm:text-sm caret-lime-600 min-w-96" />
                                    @endif

                                    @error('logo')
                                        <div class="sm:col-start-2 sm:col-span-2 mt-2 text-sm text-red-600">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="sm:grid sm:grid-cols-3 sm:gap-5 sm:items-start">
                                <label for="" class="block text-sm font-bold text-gray-900 sm:mt-px sm:pt-2"> Name </label>
                                <div class="mt-2 sm:mt-0 sm:col-span-2">
                                    <input type="text" name="" id="name" wire:model="name" placeholder="MyApp.com" class="border block w-full px-4 py-3 placeholder-gray-500 border-gray-300 rounded-lg focus:ring-lime-600 focus:border-lime-600 sm:text-sm caret-lime-600 min-w-96" />
                                    @error('name')
                                        <div class="sm:col-start-2 sm:col-span-2 mt-2 text-sm text-red-600">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="sm:grid sm:grid-cols-3 sm:gap-5 sm:items-start">
                                <label for="" class="block text-sm font-bold text-gray-900 sm:mt-px sm:pt-2"> Short description </label>
                                <div class="mt-2 sm:mt-0 sm:col-span-2">
                                    <textarea
                                        name="description"
                                        id="description"
                                        wire:model="description"
                                        placeholder="Write about your application in a few words"
                                        value=""
                                        rows="4"
                                        class="border block w-full px-4 py-3 placeholder-gray-500 border-gray-300 rounded-lg resize-y focus:ring-lime-600 focus:border-lime-600 sm:text-sm caret-lime-600"
                                        spellcheck="false"
                                    ></textarea>
                                    @error('description')
                                        <div class="sm:col-start-2 sm:col-span-2 mt-2 text-sm text-red-600">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="sm:grid sm:grid-cols-3 sm:gap-5 sm:items-start">
                                <label for="" class="block text-sm font-bold text-gray-900 sm:mt-px sm:pt-2"> URL </label>
                                <div class="mt-2 sm:mt-0 sm:col-span-2">
                                    <div class="relative flex">
                                        <div class="inline-flex items-center px-3 text-gray-900 border border-r-0 border-gray-300 rounded-l-lg bg-gray-50 sm:text-sm">https://</div>

                                        <input
                                            type="url"
                                            name=""
                                            id="url"
                                            wire:model="url"
                                            placeholder=""
                                            value="postcrafts.co"
                                            class="border flex-1 block w-full min-w-0 px-4 py-3 placeholder-gray-500 border-gray-300 rounded-none rounded-r-lg focus:ring-lime-600 focus:border-lime-600 sm:text-sm caret-lime-600"
                                        />
                                        @error('url')
                                            <div class="absolute inset-y-0 right-0 flex items-center pr-3 text-sm text-red-600">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="sm:grid sm:grid-cols-3 sm:gap-5 sm:items-start">
                                <label for="" class="block text-sm font-bold text-gray-900 sm:mt-px sm:pt-2">
                                    Monitoring interval
                                    <span class="text-gray-300 text-xs">(in seconds > 60)</span>
                                </label>
                                <div class="mt-2 sm:mt-0 sm:col-span-2">
                                    <input type="text" name="" id="seconds" wire:model="seconds" placeholder="60" class="border block w-full px-4 py-3 placeholder-gray-500 border-gray-300 rounded-lg focus:ring-lime-600 focus:border-lime-600 sm:text-sm caret-lime-600 min-w-96" />
                                    @error('seconds')
                                    <div class="sm:col-start-2 sm:col-span-2 mt-2 text-sm text-red-600">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="sm:grid sm:grid-cols-3 sm:gap-5 sm:items-start">
                                <label for="" class="block text-sm font-bold text-gray-900 sm:mt-px sm:pt-2"> Endpoints
                                    <span class="text-gray-300 text-xs">
                                        (If you want to add a more complex endpoint, please use the curl option and write the command)
                                    </span>
                                </label>
                                <div class="mt-2 sm:mt-0 sm:col-span-2 flex flex-col gap-2">
                                    @foreach($endpoints as $index => $endpoint)
                                        <div class="flex items-center gap-2" id="endpoint_{{$index}}">
                                            <select name=""
                                                    id="endpoint_method_{{$index}}"
                                                    wire:model="endpoints.{{$index}}.method"
                                                    class="border block px-4 py-3 placeholder-gray-500 border-gray-300 rounded-lg focus:ring-lime-600 focus:border-lime-600 sm:text-sm caret-lime-600">
                                                <option value="get">GET</option>
                                                <option value="post">POST</option>
                                                <option value="put">PUT</option>
                                                <option value="delete">DELETE</option>
                                                <option value="curl">CURL</option>
                                            </select>
                                            <input type="text"
                                                   name=""
                                                   id="endpoint_url_{{$index}}"
                                                   wire:model="endpoints.{{$index}}.url"
                                                   placeholder="https://my-endpoint.com/users"  class="border block w-full px-4 py-3 placeholder-gray-500 border-gray-300 rounded-lg focus:ring-lime-600 focus:border-lime-600 sm:text-sm caret-lime-600" />
                                            @if($loop->index > 0)
                                                <button
                                                    type="submit"
                                                    wire:click="removeEndpoint({{$index}})"
                                                    class="inline-flex items-center justify-center px-4 py-2 text-xl font-semibold leading-5 text-white transition-all duration-200 bg-red-600 border border-transparent rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-600 hover:bg-red-500"
                                                >
                                                    -
                                                </button>
                                            @endif
                                        </div>
                                        @error('endpoints.'.$index.'.url')
                                            <div class="text-sm text-red-600">{{ $message }}</div>
                                        @enderror
                                    @endforeach

                                    <button
                                        type="submit"
                                        wire:click="addEndpoint"
                                        class="inline-flex items-center justify-center px-4 py-2 text-sm font-semibold leading-5 text-white transition-all duration-200 bg-lime-600 border border-transparent rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-lime-600 hover:bg-lime-500 w-max ml-auto"
                                    >
                                        + Add endpoint
                                    </button>
                                </div>
                            </div>

                        </div>

                        <div class="mt-6 sm:mt-12">
                            <button
                                type="submit"
                                wire:click="createApplication"
                                class="inline-flex items-center justify-center px-6 py-3 text-sm font-semibold leading-5 text-white transition-all duration-200 bg-lime-600 border border-transparent rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-lime-600 hover:bg-lime-500"
                            >
                                @if($isEdit)
                                    Update
                                @else
                                    Create
                                @endif
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
