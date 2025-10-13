<?php

namespace App\Http\Controllers;
use App\Models\RuangKuliah;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class RuangKuliahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
          $ruangKuliahs = RuangKuliah::latest()->get();
          return view('ruang_kuliah.index', compact('ruangKuliahs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('ruang_kuliah.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 1. Validasi Input
    $request->validate([
    'kode_ruangan'  => 'required|string|unique:ruang_kuliahs,kode_ruangan',
    'nama_ruangan'  => 'required|string|max:255',
    'foto_ruangan'  => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048' // Validasi untuk gambar
    ]);

    $path = null;

    // 2. Handle File Upload
    if ($request->hasFile('foto_ruangan')) {
    // Simpan gambar ke storage/app/public/foto_ruangan
    // Nama file akan di-generate secara acak untuk menghindari duplikasi
    $path = $request->file('foto_ruangan')->store('foto_ruangan', 'public');
}

    // 3. Simpan Data ke Database
    RuangKuliah::create([
    'kode_ruangan'  => $request->kode_ruangan,
    'nama_ruangan'  => $request->nama_ruangan,
    'foto_ruangan'  => $path // Simpan path file ke database
    ]);

    // 4. Redirect dengan pesan sukses
    return redirect()->route('ruang_kuliah.index')
                 ->with('success', 'Ruang kuliah baru berhasil ditambahkan.');


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Ambil data ruang kuliah berdasarkan ID
        $ruang_kuliah = RuangKuliah::findOrFail($id);
        return view('ruang_kuliah.edit', compact('ruang_kuliah'));

    }
        
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        // Validasi input
        $request->validate([
            'kode_ruangan' => 'required|string|unique:ruang_kuliahs,kode_ruangan,'.$id,
            'nama_ruangan' => 'required|string|max:255',
            'foto_ruangan' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048' // Validasi untuk gambar
        ]);
        // Ambil data ruang kuliah berdasarkan ID
        $ruang = RuangKuliah::findOrFail($id);
        $path = $ruang->foto_ruangan; // Simpan path lama
        // Handle File Upload
        if ($request->hasFile('foto_ruangan')) {
            // Hapus file foto lama jika ada
            if ($ruang->foto_ruangan) {
                Storage::disk('public')->delete($ruang->foto_ruangan);
            }
            // Simpan gambar baru ke storage/app/public/foto_ruangan
            $path = $request->file('foto_ruangan')->store('foto_ruangan', 'public');
        }
        // Update data di database
        $ruang->update([
            'kode_ruangan' => $request->kode_ruangan,
            'nama_ruangan' => $request->nama_ruangan,
            'foto_ruangan' => $path // Update path file di database
        ]);
        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('ruang_kuliah.index')
                         ->with('success', 'Ruang kuliah berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Hapus data ruang kuliah berdasarkan ID
        $ruang = RuangKuliah::findOrFail($id);
        // Hapus file foto jika ada
        if ($ruang->foto_ruangan) {
            Storage::disk('public')->delete($ruang->foto_ruangan);
        }

        // Hapus data ruang kuliah dari database
        $ruang->delete();

        // Redirect dengan pesan sukses
        return redirect()->route('ruang_kuliah.index')
            ->with('success', 'Ruang kuliah berhasil dihapus.');
    }
    public function cetakPdf()
    {
        $ruangKuliahs = RuangKuliah::all();
        $pdf = app('dompdf.wrapper');
        $pdf->loadView('ruang_kuliah.pdf', compact('ruangKuliahs'));
        return $pdf->download('ruang_kuliah.pdf');
    }
}
