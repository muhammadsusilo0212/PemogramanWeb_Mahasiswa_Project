@extends('layouts.app')

@section('header')
{{-- Judul halaman yang besar dan tebal, sesuai contoh Breeze --}}

<h2 class="font-bold text-3xl text-gray-800 dark:text-gray-50 leading-tight">
{{ __('Input Data Matakuliah Baru') }}
</h2>
@endsection

@section('content')

<div class="py-12">
{{-- Mengatur lebar form menjadi medium (max-w-3xl) agar fokus --}}
<div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
{{-- Kartu Konten Utama dengan gaya yang disederhanakan --}}
<div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-xl p-8">

        <h3 class="text-2xl font-semibold text-gray-900 dark:text-gray-100 mb-6 border-b pb-2 border-gray-200 dark:border-gray-700">
            Lengkapi Detail Matakuliah
        </h3>

        {{-- Notifikasi Error yang konsisten dengan contoh --}}
        @if ($errors->any()) 
            <div class="bg-red-100 border border-red-400 text-red-700 dark:bg-red-900 dark:border-red-700 dark:text-red-300 px-4 py-3 rounded-lg relative mb-6" role="alert"> 
                <strong class="font-bold block mb-1">Whoops!</strong> Terjadi kesalahan input.<br>
                <ul class="list-disc ml-5 text-sm"> 
                    @foreach ($errors->all() as $error) 
                        <li>{{ $error }}</li> 
                    @endforeach 
                </ul> 
            </div> 
        @endif 

        {{-- Form Tambah Matakuliah --}}
        <form action="{{ route('matakuliah.store') }}" method="POST"> 
            @csrf 

            {{-- Input Kode Matakuliah --}}
            <div class="mb-5"> 
                <label for="kode_mk" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Kode Matakuliah</label> 
                <input type="text" 
                    class="w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" 
                    id="kode_mk" name="kode_mk" value="{{ old('kode_mk') }}" required autofocus placeholder="Contoh: CS401"> 
                @error('kode_mk')<p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>@enderror
            </div> 

            {{-- Input Nama Matakuliah --}}
            <div class="mb-5"> 
                <label for="nama_mk" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Nama Matakuliah</label> 
                <input type="text" 
                    class="w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" 
                    id="nama_mk" name="nama_mk" value="{{ old('nama_mk') }}" required placeholder="Contoh: Algoritma dan Struktur Data"> 
                @error('nama_mk')<p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>@enderror
            </div> 

            {{-- Input SKS --}}
            <div class="mb-5"> 
                <label for="sks" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">SKS</label> 
                <input type="number" 
                    class="w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" 
                    id="sks" name="sks" value="{{ old('sks') }}" required min="1" max="6" placeholder="Masukkan jumlah SKS (1-6)"> 
                @error('sks')<p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>@enderror
            </div> 

            {{-- Input Semester --}}
            <div class="mb-5"> 
                <label for="semester" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Semester</label> 
                <input type="text" 
                    class="w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" 
                    id="semester" name="semester" value="{{ old('semester') }}" required placeholder="Contoh: Ganjil 2024/2025"> 
                @error('semester')<p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>@enderror
            </div> 

            <div class="flex gap-3 pt-2">
                {{-- Tombol Simpan (Primary -> Indigo) --}}
                <button type="submit" class="px-5 py-2 bg-indigo-600 text-white text-base font-medium rounded-lg shadow-md hover:bg-indigo-700 transition duration-150 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800">
                    Simpan Data
                </button> 
                
                {{-- Tombol Kembali (Secondary -> Gray) --}}
                <a href="{{ route('matakuliah.index') }}" class="px-5 py-2 bg-gray-500 text-white text-base font-medium rounded-lg shadow-md hover:bg-gray-600 transition duration-150 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800">
                    Kembali
                </a> 
            </div>
        </form> 
        
    </div>
</div>

</div>
@endsection