<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\RuangKuliahController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\MatakuliahController;

/*
|--------------------------------------------------------------------------
| 1. PUBLIC ROUTES (Dapat Diakses Siapa Saja)
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('auth.login');
});


/*
|--------------------------------------------------------------------------
| 2. PROTECTED ROUTES (HANYA BISA DIAKSES SETELAH LOGIN)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {

    // A. Route Profil dan Dashboard (Bawaan Breeze)
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // B. Route MAHASISWA (Lihat Saja - Akses Umum)
    Route::get('mahasiswa', [MahasiswaController::class, 'index'])->name('mahasiswa.index');
    
    // C. Route DOSEN (Lihat Saja - Akses Umum)
    Route::get('dosen', [DosenController::class, 'index'])->name('dosen.index');

    // D. Route MATAKULIAH (Lihat Saja - Akses Umum)
    Route::get('matakuliah', [MatakuliahController::class, 'index'])->name('matakuliah.index');
    
    // E. Route RUANG KULIAH (Lihat Saja - Akses Umum)
    Route::get('ruang_kuliah', [RuangKuliahController::class, 'index'])->name('ruang_kuliah.index');

});


/*
|--------------------------------------------------------------------------
| 3. PROTECTED ADMIN ACCESS (CRUD, IMPORT, PDF)
|--------------------------------------------------------------------------
*/

// Middleware 'can:admin-access' menggunakan Gate yang harus Anda definisikan di AuthServiceProvider
Route::middleware(['auth', 'can:admin-access'])->group(function () {

    // A. Mahasiswa (Admin)
    Route::get('/mahasiswa/pdf', [MahasiswaController::class, 'cetakPdf'])->name('mahasiswa.cetakPdf');
    Route::get('/mahasiswa/import-form', [MahasiswaController::class, 'showImportForm'])->name('mahasiswa.showImportForm'); 
    Route::post('/mahasiswa/import', [MahasiswaController::class, 'import'])->name('mahasiswa.import'); 
    Route::resource('mahasiswa', MahasiswaController::class)->except(['index']);

    // B. Dosen (Admin)
    Route::get('/dosen/pdf', [DosenController::class, 'cetakPdf'])->name('dosen.cetakPdf'); 
    // CRUD Dosen (Hanya Admin yang bisa CRUD)
    Route::resource('dosen', DosenController::class)->except(['index']);

    // C. Matakuliah (Admin)
    Route::get('/matakuliah/import-form', [MatakuliahController::class, 'showImportForm'])->name('matakuliah.showImportForm'); 
    Route::post('/matakuliah/import', [MatakuliahController::class, 'import'])->name('matakuliah.import');
    Route::resource('matakuliah', MatakuliahController::class)->except(['index']);
    
    // D. Ruang Kuliah (Admin)
    Route::get('/ruang_kuliah/pdf', [RuangKuliahController::class, 'cetakPdf'])->name('ruang_kuliah.cetakPdf');
    Route::resource('ruang_kuliah', RuangKuliahController::class)->except(['index']);
    
});

/*
|--------------------------------------------------------------------------
| 4. AUTH ROUTES (Bawaan Breeze/Laravel)
|--------------------------------------------------------------------------
*/

require __DIR__.'/auth.php';