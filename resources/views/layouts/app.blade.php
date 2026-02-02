<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', config('app.name', 'Laravel'))</title>

    {{-- Global Vite assets --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- Page-specific head content can be pushed onto this stack --}}
    @stack('head')
</head>
<body class="{{ trim($__env->yieldContent('body-class', 'antialiased')) }}">
    @yield('content')

    {{-- Page-specific scripts can be pushed onto this stack --}}
    @stack('scripts')
</body>
</html>
