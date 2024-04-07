<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <title>ITEC Monitoring</title>
    @vite('resources/css/app.css')
    @livewireChartsScripts
    @livewireStyles
</head>
<body>
    @include('components.session')
    @yield('content')
    <script src="{{asset('js/app.js')}}"></script>
    @livewireScripts
</body>
</html>
