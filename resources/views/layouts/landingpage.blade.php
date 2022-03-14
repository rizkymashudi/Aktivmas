<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Masjid Agung Batam</title>

    @stack('prepend-style')
    @include('includes.Front-end.style')
    @stack('addon-style')
</head>
<body>

    @include('includes.Front-end.navbar')

    <div class="content">
        @yield('content')
    </div>
    

    {{-- Script --}}
    @stack('prepend-script')
    @include('includes.Front-end.script')
    @stack('addon-script')
</body>
</html>