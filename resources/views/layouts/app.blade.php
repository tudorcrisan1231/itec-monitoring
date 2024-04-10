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
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-FFX95EG2V1"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-FFX95EG2V1');
</script>
<body>
    @include('components.session')
    @yield('content')
    @vite('resources/js/app.js')
    @livewireScripts
</body>
</html>
