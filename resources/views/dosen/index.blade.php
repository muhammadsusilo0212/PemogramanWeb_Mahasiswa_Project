@extends('layouts.app')

@section('header')
    {{-- Konsisten dengan design header profesional --}}
    <h2 class="font-bold text-3xl text-gray-800 dark:text-gray-50 leading-tight">
        {{ __('Daftar Data Dosen') }}
    </h2>
@endsection

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-xl p-6">

                @if (session('success'))
                    {{-- Menggunakan alert style Tailwind --}}
                    <div class="bg-teal-100 border border-teal-400 text-teal-700 dark:bg-teal-900 dark:border-teal-700 dark:text-teal-300 px-4 py-3 rounded-lg relative mb-6" role="alert">
                        <strong class="font-bold">Sukses!</strong>
                        <span class="block sm:inline">{{ session('success') }}</span>
                    </div>
                @endif

                {{-- Tombol Aksi (Hanya Tampil untuk Admin) --}}
                @if(Auth::check() && Auth::user()->role == 'admin')
                    <div class="mb-6 flex flex-wrap gap-3 items-center">
                        <a href="{{ route('dosen.create') }}" class="px-4 py-2 bg-indigo-600 text-white text-sm font-medium rounded-lg shadow">
                            Tambah Dosen
                        </a>
                        {{-- Tombol Cetak PDF Dihapus sesuai rute web.php --}}
                    </div>
                @endif

                {{-- Tabel Data --}}
                <div class="shadow-md rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <thead class="bg-gray-50 dark:bg-gray-700">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 dark:text-gray-300 uppercase tracking-wider">No</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 dark:text-gray-300 uppercase tracking-wider">Nama</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 dark:text-gray-300 uppercase tracking-wider">NIDN</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 dark:text-gray-300 uppercase tracking-wider">Jabatan</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 dark:text-gray-300 uppercase tracking-wider">Email</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 dark:text-gray-300 uppercase tracking-wider">Telepon</th>
                                
                                @if(Auth::check() && Auth::user()->role == 'admin')
                                    <th class="px-6 py-3 text-center text-xs font-semibold text-gray-500 dark:text-gray-300 uppercase tracking-wider">Aksi</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                            @forelse ($dosens as $dosen)
                                <tr class="hover:bg-gray-50 dark:hover:bg-gray-700/50 transition duration-150">
                                    {{-- Menggunakan iterasi loop sederhana --}}
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-gray-100">
                                        {{ $loop->iteration }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">{{ $dosen->nama }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-300">{{ $dosen->nidn }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-300">{{ $dosen->jabatan}}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-300">{{ $dosen->email}}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-300">{{ $dosen->telepon}}</td>
                                    
                                    @if(Auth::check() && Auth::user()->role == 'admin')
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-center">
                                            <a href="{{ route('dosen.edit', $dosen->id) }}" class="inline-block px-3 py-1 bg-amber-500 text-white text-xs font-semibold rounded-md hover:bg-amber-600 transition duration-150 mr-2">
                                                Edit
                                            </a>
                                            <form action="{{ route('dosen.destroy', $dosen->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data dosen {{ $dosen->nama }}?');"> 
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
                                    <td colspan="{{ (Auth::check() && Auth::user()->role == 'admin') ? 7 : 6 }}" class="px-6 py-4 whitespace-nowrap text-center text-base text-gray-500 dark:text-gray-400">
                                        Belum ada data dosen.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                
                {{-- Tautan Paginasi Laravel dihapus sesuai permintaan agar tidak membuat "page" --}}

            </div>
        </div>
    </div>
@endsection
