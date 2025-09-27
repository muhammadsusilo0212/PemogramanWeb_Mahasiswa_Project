<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Menampilkan daftar semua mahasiswa.
     */
    public function index()
    {
    $mahasiswas = Mahasiswa::orderBy('created_at', 'DESC')->get();
    return view('mahasiswa.index', compact('mahasiswas')); // Perbaikan di sini
    }


    /**
     * Menampilkan form untuk membuat mahasiswa baru.
     */
    public function create()
    {
        return view('mahasiswa.create');
    }

    /**
     * Menyimpan data mahasiswa baru ke database.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required|string|max:255',
            'nim' => 'required|string|unique:mahasiswas,nim|max:10',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'prodi' => 'required|string|max:255',
            'tahun_angkatan' => 'required|digits:4',
            'tanggal_lahir' => 'required|date',
        ]);

        // Simpan data ke database
        Mahasiswa::create($request->all());

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('mahasiswa.index')
                         ->with('success', 'Data mahasiswa berhasil ditambahkan.');
    }
}
