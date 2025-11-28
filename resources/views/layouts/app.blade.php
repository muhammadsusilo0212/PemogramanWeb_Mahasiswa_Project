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
    
    {{-- START: PERBAIKAN STRUKTUR UTAMA KE SIDEBAR LAYOUT --}}
    
    {{-- Container utama harus menggunakan FLEX HORIZONTAL dan mengisi seluruh tinggi layar --}}
    <div class="flex h-screen bg-gray-100 dark:bg-gray-900">
        
        {{-- 1. Sidebar Navigasi (W-64, Fixed) --}}
        {{-- File layouts.navigation Anda HARUS berisi kode Sidebar Vertikal yang baru --}}
        @include('layouts.navigation') 

        {{-- 2. Main Content Area (Mengisi sisa ruang, diatur secara vertikal, dan bisa discroll) --}}
        <div class="flex-grow flex flex-col overflow-y-auto">
            
            {{-- Bagian Header Halaman (@yield('header')) dan Konten Utama (@yield('content')) --}}
            {{-- HAPUS: Tag <header> lama yang menyebabkan konten turun --}}
            
            {{-- Header Halaman Didaftar di sini (akan muncul di atas konten) --}}
            @hasSection('header')
                {{-- Menggunakan div sederhana untuk header halaman --}}
                <div class="bg-white dark:bg-gray-800 shadow-sm border-b border-gray-200 dark:border-gray-700">
                    {{-- Container ini HANYA untuk styling header di desktop --}}
                    <div class="py-5 px-6 lg:px-8"> 
                        @yield('header')
                    </div>
                </div>
            @endif

            {{-- Area Konten Utama (Konten Ruang Kuliah) --}}
            {{-- Menggunakan p-6 untuk padding di sekitar konten --}}
            <main class="flex-grow p-6"> 
                @yield('content')
            </main>

            {{-- Footer diletakkan di dalam Main Content Area --}}
            <footer class="bg-gray-50 dark:bg-gray-900 border-t border-gray-200 dark:border-gray-700 mt-auto">
                <div class="py-4 px-6 lg:px-8">
                    <p class="text-center text-xs text-gray-400 dark:text-gray-500">
                        &copy; {{ date('Y') }} {{ config('app.name', 'MuhammadSusilo') }}. Hak Cipta Dilindungi. Versi Tailwind CSS.
                    </p>
                </div>
            </footer>
        </div>
    </div>
    {{-- END: PERBAIKAN STRUKTUR UTAMA KE SIDEBAR LAYOUT --}}
    
</body>
</html>