<?php

namespace App\Http\Controllers;

use App\Models\matakuliah;
use Illuminate\Http\Request;

class MatakuliahController extends Controller
{
    /**
     * Menampilkan daftar semua matakuliah.
     */
    public function index()
    {
    $matakuliahs = Matakuliah::orderBy('created_at', 'DESC')->get();
    return view('matakuliah.index', compact('matakuliahs')); // Perbaikan di sini
    }

    /**
     * Menampilkan form untuk membuat matakuliah baru.
     */
    public function create()
    {
        return view('matakuliah.create');
    }

    /**
     * Menyimpan data matakuliah baru ke database.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'kode_mk' => 'required|string|max:255',
            'nama_mk' => 'required|string|max:255',
            'sks' => 'required|integer|min:1|max:6',
            'semester' => 'required|integer|min:1|max:14',
        ]);

        // Simpan data ke database
        Matakuliah::create($request->all());

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('matakuliah.index')
                         ->with('success', 'Data matakuliah berhasil ditambahkan.');
    }
}
