<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="theme-color" content="#1e3a5f">

        <title>{{ config('app.name', 'Chama Platform') }}</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=plus-jakarta-sans:400,500,600,700,800&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
        <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.8/dist/chart.umd.min.js"></script>

        @vite(['resources/css/app.css', 'resources/css/custom.css', 'resources/js/app.js'])

        @stack('styles')
    </head>
    <body x-data="{ sidebarOpen: false, profileOpen: false }" class="min-h-screen font-sans text-slate-900 antialiased">
        <div class="relative min-h-screen overflow-hidden">
            <div class="pointer-events-none absolute inset-x-0 top-0 h-[32rem] bg-[radial-gradient(circle_at_top_left,_rgba(16,185,129,0.16),_transparent_30%),radial-gradient(circle_at_top_right,_rgba(212,175,55,0.12),_transparent_28%)]"></div>

            @include('layouts.sidebar', ['mobile' => true])
            @include('layouts.sidebar')

            <div class="relative z-10 lg:pl-80">
                @include('layouts.navbar')

                <main class="min-h-[calc(100vh-5rem)]">
                    <div class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8">
                        {{ $slot }}
                    </div>
                </main>

                @include('layouts.footer')
            </div>
        </div>

        @stack('scripts')
    </body>
</html>
