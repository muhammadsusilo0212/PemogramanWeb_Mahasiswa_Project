<!DOCTYPE html> 
<html lang="en"> 
 
<head> 
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Edit Matakuliah</title> 
    <link 
href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" 
rel="stylesheet"> 
</head> 
 
<body> 
    <div class="container mt-5"> 
        <h2>Form edit Data Matakuliah</h2> 
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
 
        <form action="{{ route('matakuliah.update', $matakuliah->id) }}" method="POST"> 
            @csrf
            @method('PUT') {{-- Method spoofing untuk request PUT --}} 
            <div class="mb-3"> 
                <label for="kode_mk" class="form-label">Kode Matakuliah</label> 
              <input type="text" class="form-control" id="kode_mk" name="kode_mk" value="{{ $matakuliah->kode_mk }}" required> 
            </div>
            <div class="mb-3"> 
                <label for="nama_mk" class="form-label">Nama Matakuliah</label> 
             <input type="text" class="form-control" id="nama_mk" name="nama_mk" value="{{ $matakuliah->nama_mk }}" required> 
            </div> 
            <div class="mb-3"> 
                <label for="sks" class="form-label">SKS</label> 
              <input type="number" class="form-control" id="sks" name="sks" value="{{ $matakuliah->sks }}" required>
            </div>
            <div class="mb-3"> 
                <label for="semester" class="form-label">Semester</label> 
                <input type="text" class="form-control" id="semester" name="semester" value="{{ $matakuliah->semester }}" required> 
            </div>  
            <button type="submit" class="btn btn-primary">Simpan</button> 
            <a href="{{ route('matakuliah.index') }}" class="btn btn-secondary">  
            Kembali</a> 
        </form> 
    </div> 
</body> 
</html> 