<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>AtomSkills 2020</title>
    @include('layouts.css')
</head>
<body>
    <div data-server-rendered="true" id="__nuxt">
    @yield('content')
    </div>
</body>
</html>
