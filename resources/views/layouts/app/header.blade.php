<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('partials.head')
    </head>
    <body class="min-h-screen bg-[url(/public/images/bg.png)] dark:bg-none dark:bg-brand-primary-dark text-base">

        @include('pathfinder.pre-topbar')

        @include('pathfinder.header')

        {{ $slot }}

        @include('pathfinder.footer')

        @filamentScripts
        @livewireScripts
        @vite('resources/js/app.js')

    </body>
</html>
