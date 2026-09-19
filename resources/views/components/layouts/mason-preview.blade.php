<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name') }}</title>

        <!-- Styles / Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @livewireStyles
        @masonStyles
    </head>
    <body>
        @yield('header')
        <main>
            @include('mason::iframe-preview-content', ['blocks' => $blocks])
        </main>
        
        @yield('footer')

        @filamentScripts
        @livewireScripts
        @stack('scripts')
        <script src="https://cdn.jsdelivr.net/npm/@tailwindplus/elements@1" type="module"></script>
    </body>
</html>
