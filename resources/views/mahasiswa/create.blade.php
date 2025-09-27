<!DOCTYPE html> 
<html lang="en"> 
 
<head> 
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Tambah Mahasiswa</title> 
    <link 
href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" 
rel="stylesheet"> 
</head> 
 
<body> 
    <div class="container mt-5"> 
        <h2>Form Input Data Mahasiswa</h2> 
        <hr> 
 
        @if ($errors->any()) 
        <div class="alert alert-danger"> 
            <strong>Whoops!</strong> Terjadi kesalahan input.<br><br> 
            <ul> 
                @foreach ($errors->all() as $error) 
                <li>{{ $error }}</li> 
                @endforeach 
            </ul> 
        </div> 
        @endif 
 
        <form action="{{ route('mahasiswa.store') }}" method="POST"> 
            @csrf 
            <div class="mb-3"> 
                <label for="nama" class="form-label">Nama</label> 
             <input type="text" class="form-control" id="nama" name="nama" required> 
            </div> 
            <div class="mb-3"> 
                <label for="nim" class="form-label">NIM</label> 
              <input type="text" class="form-control" id="nim" name="nim" required> 
            </div> 
            <div class="mb-3">  
                <label class="form-label">Jenis Kelamin</label><br> 
                <div class="form-check form-check-inline"> 
                    <input class="form-check-input" type="radio"  
                     name="jenis_kelamin" id="laki-laki" value="Laki-laki" required> 
                    <label class="form-check-label" for="laki-laki">Laki-laki  
                    </label> 
                </div> 
                <div class="form-check form-check-inline"> 
                    <input class="form-check-input" type="radio"  
                     name="jenis_kelamin" id="perempuan" value="Perempuan"> 
                    <label class="form-check-label"  
                     for="perempuan">Perempuan</label> 
                </div> 
            </div> 
            <div class="mb-3"> 
                <label for="prodi" class="form-label">Program Studi</label> 
                <input type="text" class="form-control" id="prodi" name="prodi"  
                 required> 
            </div> 
            <div class="mb-3"> 
                <label for="tahun_angkatan" class="form-label"> 
                Tahun Angkatan</label> 
                <select class="form-select" id="tahun_angkatan"  
                name="tahun_angkatan" required> 
                    <option value="">Pilih Tahun</option> 
                    @for ($tahun = 2022; $tahun <= 2025; $tahun++) 
                        <option value="{{ $tahun }}">{{ $tahun }}</option> 
                        @endfor 
                </select> 
            </div> 
            <div class="mb-3"> 
                <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label> 
                <input type="date" class="form-control" id="tanggal_lahir"  
                 name="tanggal_lahir" required> 
            </div> 
            <button type="submit" class="btn btn-primary">Simpan</button> 
            <a href="{{ route('mahasiswa.index') }}" class="btn btn-secondary">  
            Kembali</a> 
        </form> 
    </div> 
</body> 
</html> 