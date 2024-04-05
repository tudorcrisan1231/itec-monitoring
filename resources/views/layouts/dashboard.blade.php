@extends('layouts.app')

@section('content')
<div>
    <div class="flex flex-col">
        @include('components.dashboard_header')

        <div class="flex flex-1">
            <div class="hidden xl:flex xl:w-64 xl:flex-col">
                @include('components.dashboard_sidebar')
            </div>

            @yield('dashboard_content')
        </div>
    </div>
</div>
@endsection
