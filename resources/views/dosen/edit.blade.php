@extends('layouts.app')

@section('header')
    {{-- Judul halaman yang besar dan tebal --}}
    <h2 class="font-bold text-3xl text-gray-800 dark:text-gray-50 leading-tight">
        {{ __('Edit Data Dosen') }}
    </h2>
@endsection

@section('content')
    <div class="py-12">
        {{-- Mengatur lebar form menjadi medium (max-w-3xl) agar fokus --}}
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            {{-- Kartu Konten Utama --}}
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-xl p-8">
                
                <h3 class="text-2xl font-semibold text-gray-900 dark:text-gray-100 mb-6 border-b pb-2 border-gray-200 dark:border-gray-700">
                    Ubah Detail Dosen
                </h3>

                {{-- Notifikasi Error --}}
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

                {{-- Form Edit Dosen --}}
                <form action="{{ route('dosen.update', $dosen->id) }}" method="POST"> 
                    @csrf 
                    @method('PUT') {{-- Method spoofing untuk request PUT --}}

                    {{-- Input Nama --}}
                    <div class="mb-5"> 
                        <label for="nama" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Nama Dosen</label> 
                        <input type="text" 
                            class="w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" 
                            id="nama" name="nama" value="{{ old('nama', $dosen->nama) }}" required> 
                        @error('nama')<p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>@enderror
                    </div> 

                    {{-- Input NIDN --}}
                    <div class="mb-5"> 
                        <label for="nidn" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">NIDN</label> 
                        <input type="text" 
                            class="w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" 
                            id="nidn" name="nidn" value="{{ old('nidn', $dosen->nidn) }}" required> 
                        @error('nidn')<p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>@enderror
                    </div> 

                    {{-- Input Jabatan Fungsional --}}
                    <div class="mb-5"> 
                        <label for="jabatan" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Jabatan Fungsional</label> 
                        <input type="text" 
                            class="w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" 
                            id="jabatan" name="jabatan" value="{{ old('jabatan', $dosen->jabatan) }}" required> 
                        @error('jabatan')<p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>@enderror
                    </div> 

                    {{-- Input Email --}}
                    <div class="mb-5"> 
                        <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Email</label> 
                        <input type="email" 
                            class="w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" 
                            id="email" name="email" value="{{ old('email', $dosen->email) }}" required> 
                        @error('email')<p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>@enderror
                    </div> 

                    {{-- Input Telepon --}}
                    <div class="mb-5"> 
                        <label for="telepon" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Telepon/HP</label> 
                        <input type="text" 
                            class="w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" 
                            id="telepon" name="telepon" value="{{ old('telepon', $dosen->telepon) }}" required> 
                        @error('telepon')<p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>@enderror
                    </div> 

                    <div class="flex gap-3 pt-2">
                        {{-- Tombol Simpan (Primary -> Indigo) --}}
                        <button type="submit" class="px-5 py-2 bg-indigo-600 text-white text-base font-medium rounded-lg shadow-md hover:bg-indigo-700 transition duration-150 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800">
                            Update Data
                        </button> 
                        
                        {{-- Tombol Kembali (Secondary -> Gray) --}}
                        <a href="{{ route('dosen.index') }}" class="px-5 py-2 bg-gray-500 text-white text-base font-medium rounded-lg shadow-md hover:bg-gray-600 transition duration-150 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800">
                            Kembali
                        </a> 
                    </div>
                </form> 
                
            </div>
        </div>
    </div>
@endsection