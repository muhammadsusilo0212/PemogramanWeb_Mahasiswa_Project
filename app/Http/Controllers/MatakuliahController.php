<?php

namespace App\Http\Controllers;

use App\Models\matakuliah;
use Illuminate\Http\Request;
use App\Imports\MatakuliahsImport; // Pastikan untuk mengimpor kelas import yang benar
use Maatwebsite\Excel\Facades\Excel; // Pastikan untuk mengimpor fasad Excel

class MatakuliahController extends Controller
{
    // Menampilkan form untuk impor data matakuliah dari file Excel
    public function showImportForm()
    {
        return view('matakuliah.import'); // Pastikan Anda memiliki view ini
    }
    // Menangani proses impor data matakuliah dari file Excel
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv'
        ]);

        $file = $request->file('file');

        Excel::import(new MatakuliahsImport, $file);

        return redirect()->route('matakuliah.index')->with('success', 'Data matakuliah berhasil diimpor.');
    }
    
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
            'kode_mk' => 'required|string|unique:matakuliahs|max:255',
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

    /**
     * Menampilkan form untuk mengedit data matakuliah.
     */
    public function edit(Matakuliah $matakuliah)
    {
        return view('matakuliah.edit', compact('matakuliah'));
    }
    /**
     * Mengupdate data matakuliah.
     */
    public function update(Request $request, Matakuliah $matakuliah)
    {
        // Validasi input
        $request->validate([
            'kode_mk' => 'required|string|max:255',
            'nama_mk' => 'required|string|max:255',
            'sks' => 'required|integer|min:1|max:6',
            'semester' => 'required|integer|min:1|max:14',
        ]);

        // Update data di database
        $matakuliah->update($request->all());

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('matakuliah.index')
                         ->with('success', 'Data matakuliah berhasil diupdate.');
    }
    /**
     * Menghapus data matakuliah.
     */
    public function destroy(Matakuliah $matakuliah)
    {
        $matakuliah->delete();
        return redirect()->route('matakuliah.index')
                         ->with('success', 'Data matakuliah berhasil dihapus.');
    }
}
