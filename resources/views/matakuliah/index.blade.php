@extends('layouts.app')

@section('title', 'Daftar Matakuliah')

@section('header')
{{-- Menggunakan styling header yang lebih besar dan bold --}}
<h2 class="font-bold text-3xl text-gray-800 dark:text-gray-50 leading-tight">
{{ __('Daftar Data Matakuliah') }}
</h2>
@endsection

@section('content')

<div class="py-12">
<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
{{-- Menggunakan shadow-xl dan rounded-xl --}}
<div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-xl p-6">

        @if (session('success'))
            {{-- Menggunakan alert style Tailwind yang lebih detail (teal) --}}
            <div class="bg-teal-100 border border-teal-400 text-teal-700 dark:bg-teal-900 dark:border-teal-700 dark:text-teal-300 px-4 py-3 rounded-lg relative mb-6" role="alert">
                <strong class="font-bold">Sukses!</strong>
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        {{-- Tombol Aksi (Hanya Tampil untuk Admin) --}}
        @if(Auth::check() && Auth::user()->role == "admin")
            <div class="mb-6 flex flex-wrap gap-3 items-center">
                {{-- Styling tombol diubah menjadi lebih compact --}}
                <a href="{{ route('matakuliah.showImportForm') }}" class="px-4 py-2 bg-green-600 text-white text-sm font-medium rounded-lg shadow hover:bg-green-700 transition">
                    Import dari Excel
                </a>
                <a href="{{ route('matakuliah.create') }}" class="px-4 py-2 bg-indigo-600 text-white text-sm font-medium rounded-lg shadow hover:bg-indigo-700 transition">
                    Tambah Matakuliah
                </a>
                
                @if(Route::has('matakuliah.cetakPdf'))
                    <a href="{{ route('matakuliah.cetakPdf') }}" class="px-4 py-2 bg-red-600 text-white text-sm font-medium rounded-lg shadow hover:bg-red-700 transition">
                        Cetak PDF Matakuliah
                    </a>
                @endif
            </div>
        @endif
        
        {{-- Tabel Data dengan Wrapper Shadow --}}
        <div class="shadow-md rounded-lg overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700"> 
                <thead class="bg-gray-50 dark:bg-gray-700"> 
                    <tr> 
                        {{-- Menggunakan font-semibold seperti contoh --}}
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 dark:text-gray-300 uppercase tracking-wider">No</th> 
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 dark:text-gray-300 uppercase tracking-wider">Kode MK</th> 
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 dark:text-gray-300 uppercase tracking-wider">Nama MK</th> 
                        <th class="px-6 py-3 text-center text-xs font-semibold text-gray-500 dark:text-gray-300 uppercase tracking-wider">SKS</th> 
                        <th class="px-6 py-3 text-center text-xs font-semibold text-gray-500 dark:text-gray-300 uppercase tracking-wider">Semester</th> 
                        
                        {{-- Header Aksi hanya ditampilkan jika Admin --}}
                        @if(Auth::check() && Auth::user()->role == "admin")
                            <th class="px-6 py-3 text-center text-xs font-semibold text-gray-500 dark:text-gray-300 uppercase tracking-wider">Aksi</th>
                        @endif
                    </tr> 
                </thead> 
                <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700"> 
                    @forelse ($matakuliahs as $matakuliah) 
                    {{-- Menghilangkan even:bg-gray-50, hanya pakai hover --}}
                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-700/50 transition duration-150"> 
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-gray-100">{{ $loop->iteration }}</td> 
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">{{ $matakuliah->kode_mk }}</td> 
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-300">{{ $matakuliah->nama_mk }}</td> 
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-300 text-center">{{ $matakuliah->sks }}</td> 
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-300 text-center">{{ $matakuliah->semester }}</td>
                        
                        @if(Auth::check() && Auth::user()->role == "admin")
                            {{-- Menggunakan styling tombol aksi yang compact --}}
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-center"> 
                                <a href="{{ route('matakuliah.edit', $matakuliah->id) }}" class="inline-block px-3 py-1 bg-amber-500 text-white text-xs font-semibold rounded-md hover:bg-amber-600 transition duration-150 mr-2">
                                    Edit
                                </a> 

                                <form action="{{ route('matakuliah.destroy', $matakuliah->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data matakuliah {{ $matakuliah->nama_mk }}?');"> 
                                    @csrf 
                                    @method('DELETE') 
                                    <button type="submit" class="px-3 py-1 bg-red-600 text-white text-xs font-semibold rounded-md hover:bg-red-700 transition duration-150">
                                        Hapus
                                    </button> 
                                </form> 
                            </td>
                        @endif
                    </tr> 
                    @empty 
                    <tr> 
                        {{-- Colspan disesuaikan: 5 jika bukan admin, 6 jika admin --}}
                        <td colspan="{{ (Auth::check() && Auth::user()->role == 'admin') ? 6 : 5 }}" class="px-6 py-4 whitespace-nowrap text-center text-base text-gray-500 dark:text-gray-400 italic">Belum ada data matakuliah.</td> 
                    </tr> 
                    @endforelse 
                </tbody> 
            </table> 
        </div>
    </div>
</div>

</div>
@endsection