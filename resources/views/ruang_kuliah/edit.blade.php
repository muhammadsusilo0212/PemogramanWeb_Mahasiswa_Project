<!DOCTYPE html> 
<html lang="en"> 
<head> 
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Edit Ruang Kuliah</title> 
    <link 
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" 
        rel="stylesheet"> 
    <style>
        /* Gaya untuk gambar preview agar rapi */
        .img-preview {
            max-width: 100%;
            height: auto;
            max-height: 200px;
            display: block;
            margin-top: 5px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        
        /* Penyesuaian tampilan form control saat fokus */
        .form-control:focus {
            border-color: #0d6efd; /* Warna biru primary Bootstrap */
            box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
            transition: all 0.2s ease-in-out;
        }

        /* Efek hover pada tombol Simpan */
        .btn-success {
            transition: all 0.3s ease;
        }
        .btn-success:hover {
            transform: translateY(-2px); /* Mengangkat tombol sedikit */
            box-shadow: 0 4px 8px rgba(25, 135, 84, 0.4); /* Menambahkan bayangan yang menonjol */
        }
        
        /* Hilangkan border default pada card dan buat rounded lebih menonjol */
        .card {
            border: none; 
        }
    </style>
</head> 
<body> 
    <div class="container mt-5 mb-5">
        <div class="row">
            {{-- Menggunakan col-lg-6 dan offset-lg-3 untuk tampilan yang lebih ramping di desktop --}}
            <div class="col-md-8 offset-md-2 col-lg-6 offset-lg-3">
                {{-- Menggunakan shadow-lg dan rounded-3 untuk tampilan kartu yang lebih baik --}}
                <div class="card shadow-lg rounded-3">
                    <div class="card-header bg-primary text-white rounded-top-3">
                        <h4 class="mb-0 text-center">Edit Data Ruang Kuliah: {{ $ruang_kuliah->nama_ruangan }}</h4>
                    </div>
                    <div class="card-body p-4">
                        
                        {{-- Menampilkan semua error validasi jika ada --}}
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <strong>Oops!</strong> Ada masalah dengan inputan kamu:<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('ruang_kuliah.update', $ruang_kuliah->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            {{-- Kode Ruangan --}}
                            <div class="mb-3">
                                <label for="kode_ruangan" class="form-label fw-bold">Kode Ruangan</label>
                                {{-- Menambahkan kelas is-invalid dan pesan error spesifik --}}
                                <input type="text" name="kode_ruangan" class="form-control @error('kode_ruangan') is-invalid @enderror" 
                                       value="{{ old('kode_ruangan', $ruang_kuliah->kode_ruangan) }}" required>
                                @error('kode_ruangan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Nama Ruangan --}}
                            <div class="mb-3">
                                <label for="nama_ruangan" class="form-label fw-bold">Nama Ruangan</label>
                                {{-- Menambahkan kelas is-invalid dan pesan error spesifik --}}
                                <input type="text" name="nama_ruangan" class="form-control @error('nama_ruangan') is-invalid @enderror" 
                                       value="{{ old('nama_ruangan', $ruang_kuliah->nama_ruangan) }}" required>
                                @error('nama_ruangan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Foto Ruangan --}}
                            <div class="mb-3">
                                <label for="foto_ruangan" class="form-label fw-bold">Foto Ruangan</label><br>

                                @if ($ruang_kuliah->foto_ruangan)
                                    <p class="mt-2 text-muted small">Foto Saat Ini:</p>
                                    {{-- Menggunakan $ruang_kuliah --}}
                                    <img src="{{ asset('storage/' . $ruang_kuliah->foto_ruangan) }}" 
                                         alt="Foto Ruangan Saat Ini" 
                                         class="img-preview mb-2"
                                         width="150">
                                    <br>
                                @endif

                                <input type="file" name="foto_ruangan" class="form-control @error('foto_ruangan') is-invalid @enderror">
                                <small class="text-muted">Kosongkan jika tidak ingin mengubah foto</small>
                                @error('foto_ruangan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="d-flex justify-content-end pt-3">
                                <a href="{{ route('ruang_kuliah.index') }}" class="btn btn-secondary me-2">Kembali</a>
                                <button type="submit" class="btn btn-success">Simpan Perubahan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body> 
</html>