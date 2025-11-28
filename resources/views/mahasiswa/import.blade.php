@extends('layouts.app')

@section('header')
    {{-- Judul halaman --}}
    <h2 class="font-bold text-3xl text-gray-800 dark:text-gray-50 leading-tight">
        {{ __('Import Data Mahasiswa') }}
    </h2>
@endsection

@section('content')
    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            {{-- Kartu Konten Utama --}}
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-xl p-8">
                
                <h3 class="text-2xl font-semibold text-gray-900 dark:text-gray-100 mb-6 border-b pb-2 border-gray-200 dark:border-gray-700">
                    Import Data dari File Excel
                </h3>

                {{-- Notifikasi Error --}}
                @if ($errors->any()) 
                    <div class="bg-red-100 border border-red-400 text-red-700 dark:bg-red-900 dark:border-red-700 dark:text-red-300 px-4 py-3 rounded-lg relative mb-6" role="alert"> 
                        <strong class="font-bold block mb-1">Terjadi Kesalahan:</strong> 
                        <ul class="list-disc ml-5 text-sm"> 
                            @foreach ($errors->all() as $error) 
                                <li>{{ $error }}</li> 
                            @endforeach 
                        </ul> 
                    </div> 
                @endif 

                {{-- Form Import --}}
                <form action="{{ route('mahasiswa.import') }}" method="POST" enctype="multipart/form-data"> 
                    @csrf 
                    <div class="mb-5"> 
                        <label for="file" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2"> 
                            Pilih File Excel (.xlsx, .xls)
                        </label> 
                        <input 
                            class="block w-full text-sm text-gray-900 dark:text-gray-200 
                                border border-gray-300 dark:border-gray-600 
                                rounded-lg cursor-pointer bg-gray-50 dark:bg-gray-700 
                                focus:outline-none p-2.5 
                                file:mr-4 file:py-2 file:px-4
                                file:rounded-lg file:border-0
                                file:text-sm file:font-semibold
                                file:bg-indigo-50 file:text-indigo-700
                                hover:file:bg-indigo-100" 
                            type="file" 
                            id="file" 
                            name="file" 
                            required> 
                        @error('file')
                            <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                        @enderror
                    </div> 

                    <div class="flex gap-3 pt-2">
                        {{-- Tombol Import (Primary -> Indigo) --}}
                        <button type="submit" class="px-5 py-2 bg-indigo-600 text-white text-base font-medium rounded-lg shadow-md hover:bg-indigo-700 transition duration-150 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800">
                            Import Data
                        </button> 
                        
                        {{-- Tombol Kembali (Secondary -> Gray) --}}
                        <a href="{{ route('mahasiswa.index') }}" class="px-5 py-2 bg-gray-500 text-white text-base font-medium rounded-lg shadow-md hover:bg-gray-600 transition duration-150 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800">
                            Kembali
                        </a> 
                    </div>
                </form> 

                {{-- Catatan Penting --}}
                <div class="bg-blue-100 border-l-4 border-blue-500 text-blue-700 dark:bg-blue-900 dark:border-blue-700 dark:text-blue-300 p-4 mt-8 rounded-lg" role="alert"> 
                    <p class="font-bold">Catatan Penting:</p> 
                    <p class="text-sm mt-1">
                        Pastikan file Excel Anda memiliki kolom header berikut pada baris pertama (huruf kecil):
                        <code class="bg-blue-200 dark:bg-blue-800 text-blue-800 dark:text-blue-200 px-1 py-0.5 rounded text-xs font-mono break-all">nama</code>, 
                        <code class="bg-blue-200 dark:bg-blue-800 text-blue-800 dark:text-blue-200 px-1 py-0.5 rounded text-xs font-mono break-all">nim</code>, 
                        <code class="bg-blue-200 dark:bg-blue-800 text-blue-800 dark:text-blue-200 px-1 py-0.5 rounded text-xs font-mono break-all">jenis_kelamin</code>, 
                        <code class="bg-blue-200 dark:bg-blue-800 text-blue-800 dark:text-blue-200 px-1 py-0.5 rounded text-xs font-mono break-all">prodi</code>, 
                        <code class="bg-blue-200 dark:bg-blue-800 text-blue-800 dark:text-blue-200 px-1 py-0.5 rounded text-xs font-mono break-all">dosen_wali</code>,
                        <code class="bg-blue-200 dark:bg-blue-800 text-blue-800 dark:text-blue-200 px-1 py-0.5 rounded text-xs font-mono break-all">tahun_angkatan</code>, 
                        <code class="bg-blue-200 dark:bg-blue-800 text-blue-800 dark:text-blue-200 px-1 py-0.5 rounded text-xs font-mono break-all">tanggal_lahir</code>.
                    </p> 
                </div> 
                
            </div>
        </div>
    </div>
@endsection