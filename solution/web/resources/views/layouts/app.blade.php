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
<div class="Grid">
    @include('layouts.header')
    @include('layouts.menu')
    <div class="Main">
        @yield('content')
    </div>
</div>
<script type="text/javascript" src="/js/jquery.js"></script>
<script type="text/javascript" src="/js/jquery.maskedinput.min.js"></script>
<script type="text/javascript" src="/js/jquery.contextMenu.min.js"></script>
<script type="text/javascript" src="/js/app.js"></script>
</body>
</html>
