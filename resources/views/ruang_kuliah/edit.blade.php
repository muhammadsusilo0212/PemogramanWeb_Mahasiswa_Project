@extends('layouts.app')

@section('header')
{{-- Judul halaman yang besar dan tebal, sesuai gaya Laravel Breeze --}}

<h2 class="font-bold text-3xl text-gray-800 dark:text-gray-50 leading-tight">
{{ __('Edit Data Ruang Kuliah') }}
</h2>
@endsection

@section('content')

<div class="py-12">
{{-- Mengatur lebar form menjadi medium (max-w-3xl) agar fokus --}}
<div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
{{-- Kartu Konten Utama dengan gaya yang konsisten --}}
<div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-xl p-8">

        <h3 class="text-2xl font-semibold text-gray-900 dark:text-gray-100 mb-6 border-b pb-2 border-gray-200 dark:border-gray-700">
            Mengubah Detail Ruangan: {{ $ruang_kuliah->nama_ruangan }}
        </h3>

        {{-- Notifikasi Error (Tailwind style) --}}
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

        {{-- Form Edit Ruang Kuliah --}}
        <form action="{{ route('ruang_kuliah.update', $ruang_kuliah->id) }}" method="POST" enctype="multipart/form-data"> 
            @csrf 
            @method('PUT')

            {{-- Input Kode Ruangan --}}
            <div class="mb-5"> 
                <label for="kode_ruangan" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Kode Ruangan</label> 
                <input type="text" 
                    class="w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" 
                    id="kode_ruangan" name="kode_ruangan" 
                    value="{{ old('kode_ruangan', $ruang_kuliah->kode_ruangan) }}" 
                    required placeholder="Contoh: R.401"> 
                @error('kode_ruangan')<p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>@enderror
            </div> 

            {{-- Input Nama Ruangan --}}
            <div class="mb-5"> 
                <label for="nama_ruangan" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Nama Ruangan</label> 
                <input type="text" 
                    class="w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" 
                    id="nama_ruangan" name="nama_ruangan" 
                    value="{{ old('nama_ruangan', $ruang_kuliah->nama_ruangan) }}" 
                    required placeholder="Contoh: Laboratorium Pemrograman"> 
                @error('nama_ruangan')<p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>@enderror
            </div> 

            {{-- Input Foto Ruangan (File) --}}
            <div class="mb-5"> 
                <label for="foto_ruangan" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Foto Ruangan</label> 
                
                {{-- Tampilan Foto Saat Ini --}}
                @if ($ruang_kuliah->foto_ruangan)
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Foto Saat Ini:</p>
                    <div class="mb-3 border border-gray-300 dark:border-gray-600 rounded-lg overflow-hidden w-48 shadow-md">
                        <img src="{{ asset('storage/' . $ruang_kuliah->foto_ruangan) }}" 
                            alt="Foto Ruangan Saat Ini" 
                            class="w-full h-auto object-cover rounded-lg"
                            style="max-height: 200px;">
                    </div>
                @endif

                <input type="file" 
                    class="block w-full text-sm text-gray-900 dark:text-gray-300 border border-gray-300 dark:border-gray-700 rounded-md cursor-pointer bg-gray-50 dark:bg-gray-700 dark:placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 p-2"
                    id="foto_ruangan" name="foto_ruangan"> 
                <small class="block mt-1 text-xs text-gray-500 dark:text-gray-400">
                    Kosongkan jika tidak ingin mengubah foto.
                </small>
                @error('foto_ruangan')<p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>@enderror
            </div> 

            <div class="flex gap-3 pt-2 justify-end">
                {{-- Tombol Kembali (Secondary -> Gray) --}}
                <a href="{{ route('ruang_kuliah.index') }}" class="px-5 py-2 bg-gray-500 text-white text-base font-medium rounded-lg shadow-md hover:bg-gray-600 transition duration-150 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800">
                    Kembali
                </a> 

                {{-- Tombol Simpan Perubahan (Primary -> Success/Indigo) --}}
                <button type="submit" class="px-5 py-2 bg-indigo-600 text-white text-base font-medium rounded-lg shadow-md hover:bg-indigo-700 transition duration-150 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800">
                    Simpan Perubahan
                </button> 
            </div>
        </form> 
        
    </div>
</div>

</div>
@endsection