<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\RuangKuliahController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\MatakuliahController; // Pastikan ini ada di atas

/*
|--------------------------------------------------------------------------
| 1. PUBLIC ROUTES (Dapat Diakses Siapa Saja)
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
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

    // B. Route MAHASISWA (CRUD, Import, PDF)
    Route::get('/mahasiswa/pdf', [MahasiswaController::class,'cetakPdf'])->name('mahasiswa.cetakPdf');
    Route::get('/mahasiswa/import', [MahasiswaController::class, 'showImportForm'])->name('mahasiswa.showImportForm'); 
    Route::post('/mahasiswa/import', [MahasiswaController::class, 'import'])->name('mahasiswa.import'); 
    // CRUD Mahasiswa (Gunakan resource agar lebih ringkas)
    Route::resource('mahasiswa', MahasiswaController::class);

    // C. Route DOSEN (CRUD)
    // CRUD Dosen (Gunakan resource agar lebih ringkas)
    Route::resource('dosen', DosenController::class);

    // D. Route MATAKULIAH (CRUD, Import)
    Route::get('/matakuliah/import', [MatakuliahController::class, 'showImportForm'])->name('matakuliah.showImportForm'); 
    Route::post('/matakuliah/import', [MatakuliahController::class, 'import'])->name('matakuliah.import');
    // CRUD Matakuliah (Gunakan resource agar lebih ringkas)
    Route::resource('matakuliah', MatakuliahController::class);
    
    // E. Route RUANG KULIAH (CRUD, PDF)
    Route::get('/ruang_kuliah/pdf', [RuangKuliahController::class,'cetakPdf'])->name('ruang_kuliah.cetakPdf');
    // CRUD Ruang Kuliah (Gunakan resource agar lebih ringkas)
    Route::resource('ruang_kuliah', RuangKuliahController::class);
    
});

/*
|--------------------------------------------------------------------------
| 3. AUTH ROUTES (Bawaan Breeze/Laravel)
|--------------------------------------------------------------------------
*/

require __DIR__.'/auth.php';
