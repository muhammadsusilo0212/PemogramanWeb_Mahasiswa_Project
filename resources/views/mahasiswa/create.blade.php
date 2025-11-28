@extends('layouts.app')

@section('header')
    {{-- Judul halaman yang besar dan tebal --}}
    <h2 class="font-bold text-3xl text-gray-800 dark:text-gray-50 leading-tight">
        {{ __('Input Data Mahasiswa Baru') }}
    </h2>
@endsection

@section('content')
    <div class="py-12">
        {{-- Mengatur lebar form menjadi medium (max-w-3xl) agar fokus --}}
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            {{-- Kartu Konten Utama --}}
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-xl p-8">
                
                <h3 class="text-2xl font-semibold text-gray-900 dark:text-gray-100 mb-6 border-b pb-2 border-gray-200 dark:border-gray-700">
                    Lengkapi Detail Mahasiswa
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

                {{-- Form Tambah Mahasiswa --}}
                <form action="{{ route('mahasiswa.store') }}" method="POST"> 
                    @csrf 

                    {{-- Input Nama --}}
                    <div class="mb-5"> 
                        <label for="nama" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Nama</label> 
                        <input type="text" 
                            class="w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" 
                            id="nama" name="nama" value="{{ old('nama') }}" required> 
                        @error('nama')<p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>@enderror
                    </div> 

                    {{-- Input NIM --}}
                    <div class="mb-5"> 
                        <label for="nim" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">NIM</label> 
                        <input type="text" 
                            class="w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" 
                            id="nim" name="nim" value="{{ old('nim') }}" required> 
                        @error('nim')<p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>@enderror
                    </div> 

                    {{-- Input Jenis Kelamin (Radio) --}}
                    <div class="mb-5"> 
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Jenis Kelamin</label>
                        <div class="flex gap-6"> 
                            {{-- Laki-laki --}}
                            <div class="flex items-center"> 
                                <input class="form-radio h-4 w-4 text-indigo-600 transition duration-150 ease-in-out dark:bg-gray-900 dark:border-gray-600" 
                                    type="radio" name="jenis_kelamin" id="laki-laki" value="Laki-laki" 
                                    {{ old('jenis_kelamin') == 'Laki-laki' ? 'checked' : '' }} required> 
                                <label class="ml-2 text-sm text-gray-900 dark:text-gray-300" for="laki-laki">Laki-laki</label> 
                            </div> 
                            {{-- Perempuan --}}
                            <div class="flex items-center"> 
                                <input class="form-radio h-4 w-4 text-indigo-600 transition duration-150 ease-in-out dark:bg-gray-900 dark:border-gray-600" 
                                    type="radio" name="jenis_kelamin" id="perempuan" value="Perempuan"
                                    {{ old('jenis_kelamin') == 'Perempuan' ? 'checked' : '' }}> 
                                <label class="ml-2 text-sm text-gray-900 dark:text-gray-300" for="perempuan">Perempuan</label> 
                            </div> 
                        </div>
                        @error('jenis_kelamin')<p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>@enderror
                    </div> 

                    {{-- Input Program Studi --}}
                    <div class="mb-5"> 
                        <label for="prodi" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Program Studi</label> 
                        <input type="text" 
                            class="w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" 
                            id="prodi" name="prodi" value="{{ old('prodi') }}" required> 
                        @error('prodi')<p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>@enderror
                    </div> 
                    {{-- Input Dosen Wali --}}
                    <div class="mb-5"> 
                        <label for="dosen_wali" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Dosen Wali (NIDN)</label> 
                        <input type="text"  
                            class="w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" 
                            id="dosen_wali" name="dosen_wali" value="{{ old('dosen_wali') }}" required>
                        @error('dosen_wali')<p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>@enderror
                    </div>      
                    {{-- Input Tahun Angkatan (Select) --}}
                    <div class="mb-5"> 
                        <label for="tahun_angkatan" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Tahun Angkatan</label> 
                        <select 
                            class="w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" 
                            id="tahun_angkatan" name="tahun_angkatan" required> 
                            <option value="">Pilih Tahun</option> 
                            @for ($tahun = 2022; $tahun <= date('Y'); $tahun++) 
                                <option value="{{ $tahun }}" {{ old('tahun_angkatan') == $tahun ? 'selected' : '' }}>{{ $tahun }}</option> 
                            @endfor 
                        </select> 
                        @error('tahun_angkatan')<p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>@enderror
                    </div> 

                    {{-- Input Tanggal Lahir --}}
                    <div class="mb-5"> 
                        <label for="tanggal_lahir" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Tanggal Lahir</label> 
                        <input type="date" 
                            class="w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" 
                            id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" required> 
                        @error('tanggal_lahir')<p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>@enderror
                    </div> 

                    <div class="flex gap-3 pt-2">
                        {{-- Tombol Simpan (Primary -> Indigo) --}}
                        <button type="submit" class="px-5 py-2 bg-indigo-600 text-white text-base font-medium rounded-lg shadow-md hover:bg-indigo-700 transition duration-150 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800">
                            Simpan Data
                        </button> 
                        
                        {{-- Tombol Kembali (Secondary -> Gray) --}}
                        <a href="{{ route('mahasiswa.index') }}" class="px-5 py-2 bg-gray-500 text-white text-base font-medium rounded-lg shadow-md hover:bg-gray-600 transition duration-150 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800">
                            Kembali
                        </a> 
                    </div>
                </form> 
                
            </div>
        </div>
    </div>
@endsection