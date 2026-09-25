<!DOCTYPE html>
<html class="fi" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('partials.head')
    </head>
    <body class="fi-body min-h-screen dark:bg-brand-primary-dark text-base">

        @include('pathfinder.pre-topbar')
        
        @include('pathfinder.header')

        {{ $slot }}

        @include('pathfinder.footer')

        @filamentScripts
        @livewireScripts
        @vite('resources/js/app.js')

    </body>
</html>
