@extends('layouts.app')

@section('header')

<h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
{{ __('Profile') }}
</h2>
@endsection

@section('content')

<div class="py-12">
{{-- Container utama dan spacing --}}
<div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

    {{-- START: TATA LETAK DUA KOLOM (KIRI: 2/3, KANAN: 1/3) --}}
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        {{-- KOLOM KIRI (2/3) - Informasi Utama dan Password --}}
        <div class="lg:col-span-2 space-y-6">
            
            {{-- CARD 1: Profile Information --}}
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    {{-- Memanggil Partial Form Informasi Profil --}}
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            {{-- CARD 2: Update Password --}}
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    {{-- Memanggil Partial Form Update Password --}}
                    @include('profile.partials.update-password-form')
                </div>
            </div>

        </div>
        
        {{-- KOLOM KANAN (1/3) - Delete Account (Diposisikan di sini) --}}
        <div class="lg:col-span-1 space-y-6">

            {{-- CARD 3: Delete Account --}}
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg lg:mt-0">
                <div class="max-w-xl">
                    {{-- Memanggil Partial Form Delete Akun --}}
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        
        </div>
    </div>
    {{-- END: TATA LETAK DUA KOLOM --}}

</div>

</div>
@endsection