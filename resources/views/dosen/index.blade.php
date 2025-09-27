<!DOCTYPE html> 
<html lang="en"> 
 
<head> 
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Daftar Dosen</title> 
    <link 
href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" 
rel="stylesheet"> 
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
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
          <a class="nav-link active" aria-current="page" href="/dosen">Dosen</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../matakuliah/">Mata Kuliah</a>
        </li>
        
    </div>
  </div>
</nav>

    <div class="container mt-5">
         <h2>Daftar Data Dosen</h2> 
        <hr> 
        <a href="{{ route('dosen.create') }}" class="btn btn-primary mb-3">Tambah Dosen</a> 
 
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
                    <th>NIDN</th> 
                    <th>JABATAN</th> 
                    <th>Email</th>
                    <th>TELEPON</th> 
                </tr> 
            </thead> 
            <tbody> 
                @forelse ($dosens as $dosen) 
                <tr> 
                    <td>{{ $loop->iteration }}</td> 
                    <td>{{ $dosen->nama}}</td> 
                    <td>{{ $dosen->nidn}}</td> 
                    <td>{{ $dosen->jabatan}}</td> 
                    <td>{{ $dosen->email}}</td>
                    <td>{{ $dosen->telepon}}</td> 
                </tr> 
                @empty 
                <tr> 
                    <td colspan="7" class="text-center">Belum ada data.</td> 
                </tr> 
                @endforelse 
            </tbody> 
        </table> 
    </div> 


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js" integrity="sha384-G/EV+4j2dNv+tEPo3++6LCgdCROaejBqfUeNjuKAiuXbjrxilcCdDz6ZAVfHWe1Y" crossorigin="anonymous"></script>
</body> 
</html>