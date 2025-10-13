<!DOCTYPE html> 
<html lang="en"> 
 
<head> 
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Daftar Matakuliah</title> 
    <link 
href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" 
rel="stylesheet"> 

</head> 
<body> 


<nav class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
  <div class="container-fluid">
    
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../mahasiswa/">Mahasiswa</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../dosen/">Dosen</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/matakuliah">Mata Kuliah</a>
        </li>
        
    </div>
  </div>
</nav>

    <div class="container mt-5">
         <h2>Daftar Data Matakuliah</h2> 
        <hr> 
        <a href="{{ route('matakuliah.showImportForm') }}" class="btn btn-success mb-3">Import dari Excel</a>
        <a href="{{ route('matakuliah.create') }}" class="btn btn-primary mb-3">Tambah Matakuliah</a> 
 
        @if (session('success')) 
        <div class="alert alert-success"> 
            {{ session('success') }} 
        </div> 
        @endif 
 
        <table class="table table-bordered"> 
            <thead class="table-dark"> 
                <tr> 
                    <th>No</th> 
                    <th>Kode_MK</th> 
                    <th>Nama_MK</th> 
                    <th>SKS</th> 
                    <th>Semester</th> 
                    <th>Aksi</th>
                </tr> 
            </thead> 
            <tbody> 
                @forelse ($matakuliahs as $matakuliah) 
                <tr> 
                    <td>{{ $loop->iteration }}</td> 
                    <td>{{ $matakuliah->kode_mk }}</td> 
                    <td>{{ $matakuliah->nama_mk }}</td> 
                    <td>{{ $matakuliah->sks }}</td> 
                    <td>{{ $matakuliah->semester }}</td>
                    <td> 
                        <a href="{{ route('matakuliah.edit', $matakuliah->id) }}" class="btn btn-warning btn-sm">Edit</a> 
 
                        <form action="{{ route('matakuliah.destroy', $matakuliah->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');"> 
                            @csrf 
                            @method('DELETE') 
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button> 
                        </form> 
                    </td>
                </tr> 
                @empty 
                <tr> 
                    <td colspan="7" class="text-center">Belum ada data.</td> 
                </tr> 
                @endforelse 
            </tbody> 
        </table> 
    </div> 
</body> 
</html>