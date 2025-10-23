@extends('layouts.app')

@section('title', 'Daftar Ruang Kuliah')

@section('header')
{{-- Konsisten dengan design header profesional --}}
<h2 class="font-bold text-3xl text-gray-800 dark:text-gray-50 leading-tight">
{{ __('Daftar Data Ruang Kuliah') }}
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

        {{-- Tombol Aksi (Diasumsikan hanya Tampil untuk Admin) --}}
        @if(Auth::check() && Auth::user()->role == "admin")
            <div class="mb-6 flex flex-wrap gap-3 items-center">
                {{-- Tambah Data Ruang --}}
                <a href="{{ route('ruang_kuliah.create') }}" class="px-4 py-2 bg-indigo-600 text-white text-sm font-medium rounded-lg shadow hover:bg-indigo-700 transition">
                    Tambah Data Ruang
                </a>
                {{-- Cetak PDF Ruangan --}}
                @if(Route::has('ruang_kuliah.cetakPdf'))
                    <a href="{{ route('ruang_kuliah.cetakPdf') }}" class="px-4 py-2 bg-red-600 text-white text-sm font-medium rounded-lg shadow hover:bg-red-700 transition" target="_blank">
                        Cetak PDF
                    </a>
                @endif
            </div>
        @endif
        
        {{-- GRID CARD VIEW untuk Ruang Kuliah --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse ($ruangKuliahs as $ruang)
            <div class="bg-white dark:bg-gray-700 rounded-xl shadow-lg hover:shadow-2xl transition duration-300 flex flex-col h-full overflow-hidden">
                
                {{-- Foto Ruangan --}}
                <div class="w-full h-48 overflow-hidden bg-gray-200 dark:bg-gray-600">
                    @if($ruang->foto_ruangan)
                        {{-- Menggunakan asset dari Storage Laravel --}}
                        <img src="{{ Storage::url($ruang->foto_ruangan) }}" 
                            class="w-full h-full object-cover" 
                            alt="Foto {{ $ruang->nama_ruangan }}"
                            onerror="this.onerror=null; this.src='https://placehold.co/400x250/ef4444/ffffff?text=FOTO+RUSAK';">
                    @else 
                        {{-- Placeholder jika tidak ada foto --}}
                        <img src="https://placehold.co/400x250/374151/ffffff?text=Tidak+Ada+Foto+Ruangan" 
                            class="w-full h-full object-cover" 
                            alt="Tidak ada gambar">
                    @endif 
                </div>
                
                {{-- Card Body (Detail Ruangan) --}}
                <div class="p-5 flex-grow">
                    {{-- Nama Ruangan (Card Title) --}}
                    <h3 class="text-xl font-bold text-gray-900 dark:text-gray-100 mb-1 leading-tight">{{ $ruang->nama_ruangan }}</h3>
                    {{-- Kode Ruangan (Card Text Muted) --}}
                    <p class="text-sm font-medium text-gray-500 dark:text-gray-300 mb-4">{{ $ruang->kode_ruangan }}</p>
                </div>
                
                {{-- Card Footer (Actions) --}}
                @if(Auth::check() && Auth::user()->role == "admin")
                <div class="p-4 border-t border-gray-100 dark:border-gray-600 flex justify-end gap-2">
                    {{-- Tombol Edit --}}
                    <a href="{{ route('ruang_kuliah.edit', $ruang->id) }}" class="inline-block px-3 py-1 bg-amber-500 text-white text-xs font-semibold rounded-md hover:bg-amber-600 transition duration-150">
                        EDIT
                    </a> 

                    {{-- Tombol Hapus --}}
                    <form onsubmit="return confirm('Apakah Anda yakin ingin menghapus ruangan {{ $ruang->nama_ruangan }}?');" 
                        action="{{ route('ruang_kuliah.destroy', $ruang->id) }}" method="POST" class="inline-block"> 
                        @csrf 
                        @method('DELETE') 
                        <button type="submit" class="px-3 py-1 bg-red-600 text-white text-xs font-semibold rounded-md hover:bg-red-700 transition duration-150">
                            HAPUS
                        </button> 
                    </form> 
                </div>
                @else
                <div class="p-4 border-t border-gray-100 dark:border-gray-600 text-center text-gray-400 italic text-sm">
                    Lihat Detail
                </div>
                @endif
            </div>
            @empty
            {{-- Empty State untuk Grid --}}
            <div class="col-span-full">
                <div class="p-6 text-center text-base text-gray-500 dark:text-gray-400 italic border border-dashed border-gray-300 dark:border-gray-600 rounded-lg">
                    Belum ada data ruang kuliah.
                </div>
            </div>
            @endforelse
        </div>

    </div>
</div>

</div>
@endsection