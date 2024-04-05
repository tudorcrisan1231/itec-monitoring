<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>ITEC Monitoring AUTH</title>
    @vite('resources/css/app.css')
</head>
<body>
    @include('components.session')
    @yield('content')
</body>
</html>
