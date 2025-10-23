<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use App\Models\User; // Penting: Pastikan model User di-import

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // ----------------------------------------------------
        // DEFINISI GATE KUSTOM UNTUK ROLE ADMIN (admin-access)
        // DITAMBAHKAN DI SINI KARENA AuthServiceProvider.php TIDAK ADA
        // ----------------------------------------------------
        // Gate ini memverifikasi bahwa user yang login memiliki role 'admin'.
        // Ini adalah alasan mengapa Anda mendapatkan 403 jika ini tidak benar.
        
        Gate::define('admin-access', function (User $user) {
            // VERIFIKASI: Pastikan kolom user->role memiliki nilai 'admin' 
            // di database (perhatikan huruf besar/kecil)
            return $user->role === 'admin';
        });

    }
}

