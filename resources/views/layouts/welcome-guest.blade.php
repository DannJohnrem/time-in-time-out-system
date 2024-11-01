<!DOCTYPE html>
<html x-data="data" lang="en">
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <!-- Scripts -->
        <script src="{{ asset('js/init-alpine.js') }}"></script>
</head>
<body>

    <div class="bg-white">
        @include('layouts.top-menu-guest')

        <div class="relative px-6 isolate pt-14 lg:px-8">
            {{ $slot }}
        </div>

    </div>

</body>
</html>
