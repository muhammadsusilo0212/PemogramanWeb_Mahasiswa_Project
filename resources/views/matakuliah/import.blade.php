@extends('layouts.app')

@section('header')
{{-- Judul halaman yang besar dan tebal, sesuai gaya Laravel Breeze --}}

<h2 class="font-bold text-3xl text-gray-800 dark:text-gray-50 leading-tight">
{{ __('Import Data Matakuliah dari Excel') }}
</h2>
@endsection

@section('content')

<div class="py-12">
{{-- Mengatur lebar form menjadi medium (max-w-3xl) agar fokus --}}
<div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
{{-- Kartu Konten Utama dengan gaya yang konsisten --}}
<div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-xl p-8">

        <h3 class="text-2xl font-semibold text-gray-900 dark:text-gray-100 mb-6 border-b pb-2 border-gray-200 dark:border-gray-700">
            Unggah File Excel Matakuliah
        </h3>

        {{-- Notifikasi Error (Tailwind style) --}}
        @if ($errors->any()) 
            <div class="bg-red-100 border border-red-400 text-red-700 dark:bg-red-900 dark:border-red-700 dark:text-red-300 px-4 py-3 rounded-lg relative mb-6" role="alert"> 
                <strong class="font-bold block mb-1">Terjadi kesalahan input!</strong> Mohon periksa file Anda.<br>
                <ul class="list-disc ml-5 text-sm"> 
                    @foreach ($errors->all() as $error) 
                        <li>{{ $error }}</li> 
                    @endforeach 
                </ul> 
            </div> 
        @endif 

        {{-- Form Import --}}
        <form action="{{ route('matakuliah.import') }}" method="POST" enctype="multipart/form-data"> 
            @csrf 

            {{-- Input File --}}
            <div class="mb-5"> 
                <label for="file" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Pilih File Excel (.xlsx, .xls)</label> 
                {{-- Styling untuk input type="file" di Tailwind --}}
                <input type="file" 
                    class="block w-full text-sm text-gray-900 dark:text-gray-300 border border-gray-300 dark:border-gray-700 rounded-md cursor-pointer bg-gray-50 dark:bg-gray-700 dark:placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 p-2"
                    id="file" name="file" required> 
                @error('file')<p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>@enderror
            </div> 

            <div class="flex gap-3 pt-2">
                {{-- Tombol Import (Primary -> Indigo) --}}
                <button type="submit" class="px-5 py-2 bg-indigo-600 text-white text-base font-medium rounded-lg shadow-md hover:bg-indigo-700 transition duration-150 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800">
                    Import Data
                </button> 
                
                {{-- Tombol Kembali (Secondary -> Gray) --}}
                <a href="{{ route('matakuliah.index') }}" class="px-5 py-2 bg-gray-500 text-white text-base font-medium rounded-lg shadow-md hover:bg-gray-600 transition duration-150 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800">
                    Kembali
                </a> 
            </div>
        </form> 
        
        {{-- Catatan Penting (Alert info style menggunakan Tailwind) --}}
        <div class="bg-blue-100 dark:bg-blue-900 border-l-4 border-blue-500 dark:border-blue-700 text-blue-700 dark:text-blue-300 p-4 mt-8 rounded-lg" role="alert"> 
            <p class="font-bold">Catatan Penting:</p>
            <p class="text-sm mt-1">
                Pastikan file Excel Anda memiliki kolom header **tepat** sebagai berikut pada baris pertama: 
                <br>
                <code class="font-mono bg-blue-200 dark:bg-blue-800 px-1 py-0.5 rounded text-black dark:text-white text-xs">kode_mk</code>, 
                <code class="font-mono bg-blue-200 dark:bg-blue-800 px-1 py-0.5 rounded text-black dark:text-white text-xs">nama_mk</code>, 
                <code class="font-mono bg-blue-200 dark:bg-blue-800 px-1 py-0.5 rounded text-black dark:text-white text-xs">sks</code>, 
                <code class="font-mono bg-blue-200 dark:bg-blue-800 px-1 py-0.5 rounded text-black dark:text-white text-xs">semester</code>.
            </p>
        </div> 
    </div>
</div>

</div>
@endsection