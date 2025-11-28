<div class="flex h-screen bg-gray-100 dark:bg-gray-900" x-data="{ open: false }">
    
    {{-- 1. Sidebar Navigasi (Desktop & Mobile Drawer) --}}
    <div :class="{'block': open, 'hidden': ! open}" 
         class="fixed inset-y-0 left-0 z-50 md:relative md:flex md:flex-col w-64 bg-white dark:bg-gray-800 border-r border-gray-200 dark:border-gray-700 shadow-xl transition-all duration-300 transform md:translate-x-0" 
         x-transition:enter="transition ease-out duration-300 transform" 
         x-transition:enter-start="-translate-x-full" 
         x-transition:enter-end="translate-x-0" 
         x-transition:leave="transition ease-in duration-300 transform" 
         x-transition:leave-start="translate-x-0" 
         x-transition:leave-end="-translate-x-full">
        
       {{-- Sidebar Header: Logo dan Nama Aplikasi --}}
        <div class="flex items-center justify-between h-16 border-b border-gray-200 dark:border-gray-700 px-4"> 
            <a href="{{ route('dashboard') }}" class="flex items-center space-x-2">
                <x-application-logo class="h-8 w-auto fill-current text-indigo-600 dark:text-indigo-400" />
                {{-- PERUBAHAN DI SINI: Mengganti text-xl menjadi text-2xl dan font-extrabold --}}
                <span class="text-2xl font-extrabold text-gray-900 dark:text-gray-100 tracking-tight hidden lg:inline">
                    Laravel
                </span>
            </a>
            
            {{-- Tombol Tutup Mobile (Hanya di Mobile) --}}
            <button @click="open = false" class="md:hidden p-2 text-gray-500 hover:text-indigo-600">
                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
            </button>
        </div>

        {{-- Main Navigation Links --}}
        <div class="flex flex-col flex-grow p-4 space-y-2 overflow-y-auto">
            
            {{-- Link: Dashboard --}}
            <a href="{{ route('dashboard') }}" 
               class="flex items-center space-x-3 p-3 rounded-lg text-gray-600 dark:text-gray-300 hover:bg-indigo-50 dark:hover:bg-gray-700 hover:text-indigo-600 dark:hover:text-indigo-400 transition duration-150 
                      {{ request()->routeIs('dashboard') ? 'bg-indigo-100 dark:bg-indigo-900/50 text-indigo-700 dark:text-indigo-300 font-semibold shadow-sm' : '' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0h6m-6 0h-2a1 1 0 00-1 1v-10h4"></path></svg>
                <span>{{ __('Dashboard') }}</span>
            </a>

            {{-- Judul Menu Admin (Opsional) --}}
            @if(Auth::check())
                <div class="pt-4 pb-2 text-xs font-semibold uppercase text-gray-400 dark:text-gray-500 tracking-wider border-t border-gray-100 dark:border-gray-700 mt-4"> 
                    DATA AKADEMIK
                </div>

                {{-- Mahasiswa (Menggunakan ikon user group) --}}
                <a href="{{ route('mahasiswa.index') }}" 
                   class="flex items-center space-x-3 p-3 rounded-lg text-gray-600 dark:text-gray-300 hover:bg-indigo-50 dark:hover:bg-gray-700 hover:text-indigo-600 dark:hover:text-indigo-400 transition duration-150 
                          {{ request()->routeIs('mahasiswa.*') ? 'bg-indigo-100 dark:bg-indigo-900/50 text-indigo-700 dark:text-indigo-300 font-semibold shadow-sm' : '' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20v-2c0-.586-.151-1.157-.432-1.666-.28-.51-.685-.92-1.178-1.177C14.898 14.897 14.48 14.75 14 14.75h-4a3 3 0 00-3 3v2h10zM12 12a4 4 0 100-8 4 4 0 000 8z"></path></svg>
                    <span>{{ __('Mahasiswa') }}</span>
                </a>
                
                {{-- Dosen (Menggunakan ikon user tie/profile profesional) --}}
                <a href="{{ route('dosen.index') }}" 
                   class="flex items-center space-x-3 p-3 rounded-lg text-gray-600 dark:text-gray-300 hover:bg-indigo-50 dark:hover:bg-gray-700 hover:text-indigo-600 dark:hover:text-indigo-400 transition duration-150 
                          {{ request()->routeIs('dosen.*') ? 'bg-indigo-100 dark:bg-indigo-900/50 text-indigo-700 dark:text-indigo-300 font-semibold shadow-sm' : '' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A7 7 0 0112 15a7 7 0 016.879 2.804M15 10a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                    <span>{{ __('Dosen') }}</span>
                </a>

                {{-- Matakuliah (Menggunakan ikon book/buku atau stack) --}}
                <a href="{{ route('matakuliah.index') }}" 
                   class="flex items-center space-x-3 p-3 rounded-lg text-gray-600 dark:text-gray-300 hover:bg-indigo-50 dark:hover:bg-gray-700 hover:text-indigo-600 dark:hover:text-indigo-400 transition duration-150 
                          {{ request()->routeIs('matakuliah.*') ? 'bg-indigo-100 dark:bg-indigo-900/50 text-indigo-700 dark:text-indigo-300 font-semibold shadow-sm' : '' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.467 9.58 5 8.25 5c-1.956 0-3.5 1.5-3.5 3.5 0 2.115 2.3 3.6 4 5.5l.498.535l-.498.534c-1.7 1.9-4 3.385-4 5.5 0 2 1.544 3.5 3.5 3.5 1.33 0 2.582-.467 3.75-1.253M12 6.253C13.168 5.467 14.42 5 15.75 5c1.956 0 3.5 1.5 3.5 3.5 0 2.115-2.3 3.6-4 5.5l-.498.535l.498.534c1.7 1.9 4 3.385 4 5.5 0 2-1.544 3.5-3.5 3.5-1.33 0-2.582-.467-3.75-1.253"></path></svg>
                    <span>{{ __('Matakuliah') }}</span>
                </a>

                {{-- Ruang Kuliah (Menggunakan ikon building/gedung) --}}
                <a href="{{ route('ruang_kuliah.index') }}" 
                   class="flex items-center space-x-3 p-3 rounded-lg text-gray-600 dark:text-gray-300 hover:bg-indigo-50 dark:hover:bg-gray-700 hover:text-indigo-600 dark:hover:text-indigo-400 transition duration-150 
                          {{ request()->routeIs('ruang_kuliah.*') ? 'bg-indigo-100 dark:bg-indigo-900/50 text-indigo-700 dark:text-indigo-300 font-semibold shadow-sm' : '' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-7 0H3m20 0h3"></path></svg>
                    <span>{{ __('Ruang Kuliah') }}</span>
                </a>
            @endif
        </div>

        {{-- Profil dan Logout (diletakkan di bagian paling bawah Sidebar) --}}
        <div class="p-4 border-t border-gray-200 dark:border-gray-700">
            <a href="{{ route('profile.edit') }}" class="flex items-center space-x-3 p-3 rounded-lg text-gray-600 dark:text-gray-300 hover:bg-indigo-50 dark:hover:bg-gray-700 hover:text-indigo-600 dark:hover:text-indigo-400 transition duration-150 ease-in-out">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14c-5.148 0-7.252 2.73-8 5h16c-.748-2.27-2.852-5-8-5z"></path></svg>
                <div class="flex flex-col">
                    <span class="text-sm font-semibold truncate">{{ Auth::user()->name }}</span>
                    <span class="text-xs text-gray-400 dark:text-gray-500">{{ __('Profile') }}</span>
                </div>
            </a>

            <form method="POST" action="{{ route('logout') }}" class="mt-2">
                @csrf
                <button type="submit" class="flex items-center space-x-3 w-full p-3 rounded-lg text-red-600 dark:text-red-400 hover:bg-red-50 dark:hover:bg-gray-700 transition duration-150 ease-in-out">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                    <span>{{ __('Log Out') }}</span>
                </button>
            </form>
        </div>
    </div>
    
    {{-- Mobile Overlay dan Main Content Area (Sisanya tidak diubah) --}}
    </div>