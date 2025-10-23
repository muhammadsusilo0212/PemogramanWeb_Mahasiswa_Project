@extends('layouts.app')

@section('header')
    <div class="flex justify-between items-center">
        <h2 class="text-2xl font-bold leading-tight text-gray-900 dark:text-white">
            Dashboard
        </h2>
        <p class="text-sm text-gray-500 dark:text-gray-400">
            Selamat datang kembali, {{ Auth::user()->name ?? 'Admin' }}
        </p>
    </div>
@endsection

@section('content')
    <div class="py-6 px-4 sm:px-6 lg:px-8">
        {{-- Statistik Cards --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Data Dosen -->
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-medium text-gray-900 dark:text-white">Data Dosen</h3>
                    <svg class="h-6 w-6 text-indigo-500" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <path d="M12 4v16m8-8H4" />
                    </svg>
                </div>
                <p class="text-3xl font-bold text-gray-700 dark:text-gray-200">25</p>
                <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Total dosen terdaftar</p>
            </div>

            <!-- Data Mahasiswa -->
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-medium text-gray-900 dark:text-white">Data Mahasiswa</h3>
                    <svg class="h-6 w-6 text-green-500" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <path d="M5 13l4 4L19 7" />
                    </svg>
                </div>
                <p class="text-3xl font-bold text-gray-700 dark:text-gray-200">120</p>
                <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Mahasiswa aktif saat ini</p>
            </div>

            <!-- Data Ruang Kuliah -->
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-medium text-gray-900 dark:text-white">Data Ruang Kuliah</h3>
                    <svg class="h-6 w-6 text-yellow-500" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <path d="M3 10h18M9 21V3M15 21V3" />
                    </svg>
                </div>
                <p class="text-3xl font-bold text-gray-700 dark:text-gray-200">10</p>
                <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Jumlah ruang kuliah tersedia</p>
            </div>
        </div>

        {{-- Section Tambahan --}}
        <div class="mt-10">
            <h4 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Informasi Sistem</h4>
            <div class="bg-blue-50 dark:bg-blue-900/20 text-blue-800 dark:text-blue-300 p-4 rounded-md">
                <p>Silakan gunakan sidebar untuk mengelola data dosen, mahasiswa, dan ruang kuliah.</p>
            </div>
        </div>
    </div>
@endsection