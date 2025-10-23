<?php

namespace App\Http\Controllers; // Pastikan namespace sesuai dengan struktur direktori Anda

use App\Models\Mahasiswa; // Pastikan Anda telah membuat model Mahasiswa di app/Models
use Illuminate\Http\Request; // Pastikan Anda telah membuat model Mahasiswa di app/Models
use App\Imports\MahasiswasImport; // Pastikan Anda telah membuat import ini di app/Imports
use Maatwebsite\Excel\Facades\Excel; // Pastikan Anda telah menginstal paket Maatwebsite Excel minimal versi 3
use Barryvdh\DomPDF\Facade\Pdf; // Pastikan Anda telah menginstal paket barryvdh/laravel-dompdf

class MahasiswaController extends Controller
{
    /**
     * Menampilkan form untuk impor data mahasiswa dari file Excel.
     */
    public function showImportForm()
    {
        return view('mahasiswa.import');
    }

    /**
     * Mengimpor data mahasiswa dari file Excel.
     */
    public function import(Request $request)
    {
        // Validasi file yang diunggah
        $request->validate([
            'file' => 'required|mimes:xlsx,csv',
        ]);

        // Proses impor data
        Excel::import(new MahasiswasImport, $request->file('file'));

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('mahasiswa.index')
                         ->with('success', 'Data mahasiswa berhasil diimpor.');
    }

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

    /**
     * Menampilkan form untuk mengedit data mahasiswa.
     */
    public function edit(Mahasiswa $mahasiswa)
    {
        return view('mahasiswa.edit', compact('mahasiswa'));    
    }

    /**
     * Mengupdate data mahasiswa.
     */
    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required|string|max:255',
            'nim' => 'required|string|max:10|unique:mahasiswas,nim,' . $mahasiswa->id,
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'prodi' => 'required|string|max:255',
            'tahun_angkatan' => 'required|digits:4',
            'tanggal_lahir' => 'required|date',
        ]);

        // Update data mahasiswa ke database
        $mahasiswa->update($request->all());

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('mahasiswa.index')
                         ->with('success', 'Data mahasiswa berhasil diupdate.');
    }
    
    /**
     * Menghapus data mahasiswa.
     */
    public function destroy(Mahasiswa $mahasiswa)
    {
        //HAPUS DATA MAHASISWA DI DATABASE
        $mahasiswa->delete();
        return redirect()->route('mahasiswa.index')
                         ->with('success', 'Data mahasiswa berhasil dihapus.');
    }
    /**
     * Mencetak daftar mahasiswa ke format PDF.
     */
    public function cetakPdf()
    {
        // 1. ambil data mahasiswa dari database urutan berdasarkan prodi dan nama
        $mahasiswas = Mahasiswa::orderBy('prodi')->orderBy('nama')->get();

        // 2. load view cetak_pdf dan kirim data mahasiswa
        $pdf = PDF::loadView('mahasiswa.pdf',['mahasiswas' => $mahasiswas]);

        // 3. perintahkan untuk mengunduh file pdf dengan nama Laporan_data_mahasiswa.pdf
        return $pdf->stream('Laporan_data_mahasiswa.pdf');
        
    }

}