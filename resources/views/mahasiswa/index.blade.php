<!DOCTYPE html> 
<html lang="en"> 
 
<head> 
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Daftar Mahasiswa</title> 
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
          <a class="nav-link active" aria-current="page" href="/">Mahasiswa</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../dosen/">Dosen</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../matakuliah/">Mata Kuliah</a>
        </li>
        
    </div>
  </div>
</nav>
    

    <div class="container mt-5">
         <h2>Daftar Data Mahasiswa</h2> 
        <hr> 
        <a href="{{ route('mahasiswa.create') }}" class="btn btn-primary mb
3">Tambah Mahasiswa</a> 
 
        @if (session('success')) 
        <div class="alert alert-success"> 
            {{ session('success') }} 
        </div> 
        @endif 
 
        <table class="table table-bordered"> 
            <thead class="table-dark"> 
                <tr> 
                    <th>No</th> 
                    <th>Nama</th> 
                    <th>NIM</th> 
                    <th>Jenis Kelamin</th> 
                    <th>Prodi</th> 
                    <th>Angkatan</th> 
                    <th>Tgl Lahir</th> 
                </tr> 
            </thead> 
            <tbody> 
                @forelse ($mahasiswas as $mahasiswa) 
                <tr> 
                    <td>{{ $loop->iteration }}</td> 
                    <td>{{ $mahasiswa->nama }}</td> 
                    <td>{{ $mahasiswa->nim }}</td> 
                    <td>{{ $mahasiswa->jenis_kelamin }}</td> 
                    <td>{{ $mahasiswa->prodi }}</td> 
                    <td>{{ $mahasiswa->tahun_angkatan }}</td> 
                    <td>{{ $mahasiswa->tanggal_lahir }}</td> 
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