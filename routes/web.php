<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;

Route::get('/', function () {
    return redirect()->route('mahasiswa.index');
});

Route::get('/mahasiswa', [MahasiswaController::class, 'index'])->name('mahasiswa.index');
Route::get('/mahasiswa/create', [MahasiswaController::class, 'create'])->name('mahasiswa.create');
Route::post('/mahasiswa', [MahasiswaController::class, 'store'])->name('mahasiswa.store');
// Tambahkan rute untuk matakuliah jika diperlukan
 use App\Http\Controllers\MatakuliahController;
 Route::get('/matakuliah', [MatakuliahController::class, 'index'])->name('matakuliah.index');
 Route::get('/matakuliah/create', [MatakuliahController::class, 'create'])->name('matakuliah.create');
 Route::post('/matakuliah', [MatakuliahController::class, 'store'])->name('matakuliah.store');
// Tambahkan rute untuk dosen jika diperlukan
 use App\Http\Controllers\DosenController;
 Route::get('/dosen', [DosenController::class, 'index'])->name('dosen.index');
 Route::get('/dosen/create', [DosenController::class, 'create'])->name('dosen.create');
 Route::post('/dosen', [DosenController:: class, 'store'])->name('dosen.store');    