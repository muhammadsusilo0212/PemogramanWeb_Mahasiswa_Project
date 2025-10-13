<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use Illuminate\Http\Request;

class DosenController extends Controller
{
     /**
     * Menampilkan daftar semua mahasiswa.
     */
    public function index()
    {
    $dosens = Dosen::orderBy('created_at', 'DESC')->get();
    return view('dosen.index', compact('dosens')); // Perbaikan di sini
    }


    /**
     * Menampilkan form untuk membuat mahasiswa baru.
     */
    public function create()
    {
        return view('dosen.create');
    }

    /**
     * Menyimpan data dosen baru ke database.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required|string|max:255',
            'nidn' => 'required|string|unique:dosens,nidn|max:10',
            'jabatan' => 'required|string|max:255',
            'email' => 'required|email|unique:dosens,email|max:255',
            'telepon' => 'required|string|max:15',
        ]);

        // Simpan data ke database
        Dosen::create($request->all());

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('dosen.index')
                         ->with('success', 'Data dosen berhasil ditambahkan.');
    }
    /**
     * Menampilkan form untuk mengedit data dosen.
     */
    public function edit(Dosen $dosen)
    {
        return view('dosen.edit', compact('dosen'));    
    }
    /**
     * Mengupdate data dosen.
     */
    public function update(Request $request, Dosen $dosen)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required|string|max:255',
            'nidn' => 'required|string|unique:dosens,nidn,'.$dosen->id.'|max:10',
            'jabatan' => 'required|string|max:255',
            'email' => 'required|email|unique:dosens,email,'.$dosen->id.'|max:255',
            'telepon' => 'required|string|max:15',
        ]);

        // Update data di database
        $dosen->update($request->all());

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('dosen.index')
                         ->with('success', 'Data dosen berhasil diupdate.');
    }
    /**
     * Menghapus data dosen.
     */
    public function destroy(Dosen $dosen)
    {
        $dosen->delete();
        return redirect()->route('dosen.index')
                         ->with('success', 'Data dosen berhasil dihapus.');
    }
}
