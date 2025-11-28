@extends('layouts.app')

@section('title', 'Dashboard')

@section('header')
<div class="flex flex-col sm:flex-row sm:items-center sm:justify-between space-y-2 sm:space-y-0">
    <h2 class="font-extrabold text-3xl text-gray-800 dark:text-gray-50 leading-tight">
        {{ __('Dashboard') }}
    </h2>
    <p class="text-sm text-gray-500 dark:text-gray-400 font-medium">
        Selamat datang kembali, <span class="text-indigo-600 dark:text-indigo-400 font-semibold">{{ Auth::user()->name }}</span>!
    </p>
</div>
@endsection

@section('content')
<div class="pb-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        {{-- Card Summary --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            
            {{-- Card: Data Dosen --}}
            <div class="bg-gradient-to-br from-indigo-500 to-purple-600 dark:from-indigo-700 dark:to-purple-800 rounded-xl shadow-lg p-6 text-white transform hover:scale-102 transition-all duration-300">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-bold">Data Dosen</h3>
                    <div class="bg-indigo-700/50 dark:bg-purple-900/50 p-2 rounded-full">
                        {{-- PERBAIKAN: Menambahkan fill="none" dan stroke="currentColor" --}}
                        <svg class="w-6 h-6 text-indigo-200 dark:text-purple-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A7 7 0 0112 15a7 7 0 016.879 2.804M15 10a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                    </div>
                </div>
                <p class="text-5xl font-extrabold mb-1">{{ $totalDosen ?? 25 }}</p>
                <p class="text-indigo-100 dark:text-purple-200 text-sm opacity-90">Total dosen terdaftar</p>
            </div>

            {{-- Card: Data Mahasiswa --}}
            <div class="bg-gradient-to-br from-green-500 to-teal-600 dark:from-green-700 dark:to-teal-800 rounded-xl shadow-lg p-6 text-white transform hover:scale-102 transition-all duration-300">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-bold">Data Mahasiswa</h3>
                    <div class="bg-green-700/50 dark:bg-teal-900/50 p-2 rounded-full">
                        {{-- Ikon Mahasiswa sudah benar --}}
                        <svg class="w-6 h-6 text-green-200 dark:text-teal-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20v-2c0-.586-.151-1.157-.432-1.666-.28-.51-.685-.92-1.178-1.177C14.898 14.897 14.48 14.75 14 14.75h-4a3 3 0 00-3 3v2h10zM12 12a4 4 0 100-8 4 4 0 000 8z"></path></svg>
                    </div>
                </div>
                <p class="text-5xl font-extrabold mb-1">{{ $totalMahasiswa ?? 120 }}</p>
                <p class="text-green-100 dark:text-teal-200 text-sm opacity-90">Mahasiswa aktif saat ini</p>
            </div>

            {{-- Card: Data Ruang Kuliah --}}
            <div class="bg-gradient-to-br from-yellow-500 to-orange-600 dark:from-yellow-700 dark:to-orange-800 rounded-xl shadow-lg p-6 text-white transform hover:scale-102 transition-all duration-300">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-bold">Data Ruang Kuliah</h3>
                    <div class="bg-yellow-700/50 dark:bg-orange-900/50 p-2 rounded-full">
                        {{-- PERBAIKAN: Menambahkan fill="none" dan stroke="currentColor" --}}
                        <svg class="w-6 h-6 text-yellow-200 dark:text-orange-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-7 0H3m20 0h3"></path></svg>
                    </div>
                </div>
                <p class="text-5xl font-extrabold mb-1">{{ $totalRuangKuliah ?? 10 }}</p>
                <p class="text-yellow-100 dark:text-orange-200 text-sm opacity-90">Jumlah ruang kuliah tersedia</p>
            </div>
        </div>

        {{-- Informasi Sistem Card --}}
        <div class="bg-gray-800 dark:bg-gray-700 rounded-xl shadow-lg p-6 text-gray-50 dark:text-gray-200">
            <h3 class="text-xl font-bold mb-4">Informasi Sistem</h3>
            <p class="text-gray-200 dark:text-gray-300 leading-relaxed">
                Silakan gunakan sidebar untuk mengelola data <span class="font-semibold text-indigo-400">dosen</span>, 
                <span class="font-semibold text-indigo-400">mahasiswa</span>, dan 
                <span class="font-semibold text-indigo-400">ruang kuliah</span>. 
                Sistem ini dirancang untuk memudahkan manajemen akademik Anda.
            </p>
        </div>
    </div>
</div>
@endsection