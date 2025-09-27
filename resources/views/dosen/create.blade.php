<!DOCTYPE html> 
<html lang="en"> 
 
<head> 
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Tambah matakuliah</title> 
    <link 
href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" 
rel="stylesheet"> 
</head> 
 
<body> 
    <div class="container mt-5"> 
        <h2>Form Input Data Dosen</h2> 
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
 
        <form action="{{ route('dosen.store') }}" method="POST"> 
            @csrf 
            <div class="mb-3"> 
                <label for="nama" class="form-label">Nama Dosen</label> 
              <input type="text" class="form-control" id="nama" name="nama" required> 
            </div>
            <div class="mb-3"> 
                <label for="nidn" class="form-label">NIDN</label> 
             <input type="text" class="form-control" id="nidn" name="nidn" required> 
            </div> 
            <div class="mb-3"> 
                <label for="jabatan" class="form-label">Jabatan</label> 
              <input type="text" class="form-control" id="jabatan" name="jabatan" required>
            </div>
            <div class="mb-3"> 
                <label for="email" class="form-label">Email</label> 
                <input type="email" class="form-control" id="email" name="email" required> 
            </div> 
            <div class="mb-3"> 
                <label for="telepon" class="form-label">Telepon</label> 
                <input type="text" class="form-control" id="telepon" name="telepon" required> 
            </div> 
            <button type="submit" class="btn btn-primary">Simpan</button> 
            <a href="{{ route('dosen.index') }}" class="btn btn-secondary">  
            Kembali</a> 
        </form> 
    </div> 
</body> 
</html> 