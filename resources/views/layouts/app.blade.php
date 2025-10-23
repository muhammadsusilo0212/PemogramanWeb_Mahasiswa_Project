<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased h-full">
    {{-- Menggunakan dark:bg-gray-900 di sini sudah tepat --}}
    <div class="min-h-screen bg-gray-50 dark:bg-gray-900 flex flex-col">
        @include('layouts.navigation')

        @hasSection('header')
            {{-- Ditingkatkan: Menggunakan shadow-xl untuk bayangan yang lebih tegas dan border yang lebih tipis --}}
            <header class="bg-white dark:bg-gray-800 shadow-xl border-b border-indigo-500/10 dark:border-indigo-500/5">
                <div class="max-w-7xl mx-auto py-5 px-4 sm:px-6 lg:px-8">
                    @yield('header')
                </div>
            </header>
        @endif

        <main class="flex-grow">
            @yield('content')
        </main>

        {{-- Ditingkatkan: Border dan latar belakang yang sangat netral --}}
        <footer class="bg-gray-50 dark:bg-gray-900 border-t border-gray-200 dark:border-gray-700 mt-auto">
            <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8">
                <p class="text-center text-xs text-gray-400 dark:text-gray-500">
                    &copy; {{ date('Y') }} {{ config('app.name', 'MuhammadSusilo') }}. Hak Cipta Dilindungi. Versi Tailwind CSS.
                </p>
            </div>
        </footer>
    </div>
</body>
</html>