<body>
  <div class="container mt-5">
    <h2>Tambah Ruang Kuliah Baru</h2>
    <hr>

    <form action="{{ route('ruang_kuliah.store') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="mb-3">
        <label for="kode_ruangan" class="form-label">Kode Ruangan</label>
        <input type="text" class="form-control" name="kode_ruangan" required>
      </div>
      <div class="mb-3">
        <label for="nama_ruangan" class="form-label">Nama Ruangan</label>
        <input type="text" class="form-control" name="nama_ruangan" required>
      </div>
      <div class="mb-3">
        <label for="foto_ruangan" class="form-label">Foto Ruangan</label>
        <input class="form-control" type="file" name="foto_ruangan">
      </div>
      <button type="submit" class="btn btn-primary">Simpan</button>
      <a href="{{ route('ruang_kuliah.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
  </div>
</body>
