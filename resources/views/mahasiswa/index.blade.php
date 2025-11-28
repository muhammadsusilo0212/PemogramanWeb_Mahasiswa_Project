@extends('layouts.app')

@section('header')
{{-- Menggunakan teks yang tebal dan jelas, menyesuaikan dengan layout profesional sebelumnya --}}
<h2 class="font-bold text-3xl text-gray-800 dark:text-gray-50 leading-tight">
{{ __('Daftar Mahasiswa') }}
</h2>
@endsection

@section('content')
<div class="py-12">
<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
<div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-xl p-6">

            {{-- Notifikasi Sukses --}}
            @if (session('success'))
                <div class="bg-teal-100 border border-teal-400 text-teal-700 dark:bg-teal-900 dark:border-teal-700 dark:text-teal-300 px-4 py-3 rounded-lg relative mb-6" role="alert">
                    <strong class="font-bold">Sukses!</strong>
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif
        
            {{-- Tombol Aksi (Button Actions) --}}
            {{-- Asumsi: Tombol-tombol ini hanya muncul untuk Admin, mengikuti pola Dosen/Ruang Kuliah --}}
            @if(Auth::check() && Auth::user()->role == "admin")
            <div class="mb-6 flex flex-wrap gap-3 items-center">
                {{-- Button Impor (Success -> Teal) --}}
                @if(Route::has('mahasiswa.showImportForm'))
                <a href="{{ route('mahasiswa.showImportForm') }}" class="px-4 py-2 bg-teal-600 text-white text-sm font-medium rounded-lg shadow-md hover:bg-teal-700 transition duration-150 focus:outline-none focus:ring-2 focus:ring-teal-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800">
                    Impor dari Excel
                </a>
                @endif
                
                {{-- Button Tambah (Primary -> Indigo) --}}
                <a href="{{ route('mahasiswa.create') }}" class="px-4 py-2 bg-indigo-600 text-white text-sm font-medium rounded-lg shadow-md hover:bg-indigo-700 transition duration-150 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800">
                    Tambah Mahasiswa
                </a>
                
                {{-- Button Cetak (Danger -> Red) --}}
                @if(Route::has('mahasiswa.cetakPdf'))
                <a href="{{ route('mahasiswa.cetakPdf') }}" class="px-4 py-2 bg-red-600 text-white text-sm font-medium rounded-lg shadow-md hover:bg-red-700 transition duration-150 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800" target="_blank">
                    Cetak PDF
                </a>
                @endif
            </div>
            @endif

            {{-- Tabel Data --}}
            <div class="overflow-x-auto shadow-md rounded-lg">
                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                    <thead class="bg-gray-50 dark:bg-gray-700">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 dark:text-gray-300 uppercase tracking-wider">No</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 dark:text-gray-300 uppercase tracking-wider">Nama</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 dark:text-gray-300 uppercase tracking-wider">NIM</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 dark:text-gray-300 uppercase tracking-wider">Jenis Kelamin</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 dark:text-gray-300 uppercase tracking-wider">Prodi</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 dark:text-gray-300 uppercase tracking-wider">Dosen Wali</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 dark:text-gray-300 uppercase tracking-wider">Angkatan</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 dark:text-gray-300 uppercase tracking-wider">Tgl Lahir</th>
                            {{-- Aksi hanya untuk Admin --}}
                            @if(Auth::check() && Auth::user()->role == "admin")
                            <th class="px-6 py-3 text-center text-xs font-semibold text-gray-500 dark:text-gray-300 uppercase tracking-wider">Aksi</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                        @forelse ($mahasiswas as $mahasiswa)
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-700/50 transition duration-150">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-gray-100">{{ $loop->iteration }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">{{ $mahasiswa->nama }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-300">{{ $mahasiswa->nim }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-300">{{ $mahasiswa->jenis_kelamin }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-300">{{ $mahasiswa->prodi }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-300">{{ $mahasiswa->dosen ? $mahasiswa->dosen->nama : 'N/A' }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-300">{{ $mahasiswa->tahun_angkatan }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-300">{{ $mahasiswa->tanggal_lahir }}</td>
                                
                                {{-- Kolom Aksi --}}
                                @if(Auth::check() && Auth::user()->role == "admin")
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-center">
                                    {{-- Button Edit (Warning -> Yellow/Amber) --}}
                                    <a href="{{ route('mahasiswa.edit', $mahasiswa->id) }}" class="inline-block px-3 py-1 bg-amber-500 text-white text-xs font-semibold rounded-md hover:bg-amber-600 transition duration-150 mr-2">
                                        Edit
                                    </a>
                                    
                                    {{-- Form Hapus (Danger -> Red) --}}
                                    <form onsubmit="return confirm('Yakin ingin menghapus data {{ $mahasiswa->nama }}?')" action="{{ route('mahasiswa.destroy', $mahasiswa->id) }}" method="POST" class="inline-block">
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
                                {{-- Menyesuaikan colspan agar mencakup kolom Aksi --}}
                                <td colspan="{{ (Auth::check() && Auth::user()->role == 'admin') ? 8 : 7 }}" class="px-6 py-4 whitespace-nowrap text-center text-base text-gray-500 dark:text-gray-400">
                                    Belum ada data mahasiswa.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div> {{-- End of overflow-x-auto --}}
        </div> {{-- End of bg-white card --}}
    </div>
</div>

@endsection