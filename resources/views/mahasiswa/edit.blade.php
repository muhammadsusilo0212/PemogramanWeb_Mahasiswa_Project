<!DOCTYPE html> 
<html lang="en"> 
 
<head> 
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Edit Mahasiswa</title> 
    <link 
href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" 
rel="stylesheet"> 
</head> 
 
<body> 
    <div class="container mt-5"> 
        <h2>Form Edit Data Mahasiswa</h2> 
        <hr> 
 
        <form action="{{ route('mahasiswa.update', $mahasiswa->id) }}" 
method="POST"> 
            @csrf 
            @method('PUT') {{-- Method spoofing untuk request PUT --}} 
            <div class="mb-3"> 
                <label for="nama" class="form-label">Nama</label> 
                <input type="text" class="form-control" name="nama" value="{{ 
$mahasiswa->nama }}" required> 
            </div> 
            <div class="mb-3"> 
                <label for="nim" class="form-label">NIM</label> 
                <input type="text" class="form-control" name="nim" value="{{ 
$mahasiswa->nim }}" required> 
            </div> 
            <div class="mb-3"> 
                <label class="form-label">Jenis Kelamin</label><br> 
                <div class="form-check form-check-inline"> 
                    <input class="form-check-input" type="radio" 
name="jenis_kelamin" value="Laki-laki" {{ $mahasiswa->jenis_kelamin == 'Laki-laki' ? 
'checked' : '' }}> 
                    <label class="form-check-label">Laki-laki</label> 
                </div> 
                <div class="form-check form-check-inline"> 
                    <input class="form-check-input" type="radio" 
name="jenis_kelamin" value="Perempuan" {{ $mahasiswa->jenis_kelamin == 'Perempuan' ? 
'checked' : '' }}> 
                    <label class="form-check-label">Perempuan</label> 
                </div> 
            </div> 
            <div class="mb-3"> 
                <label for="prodi" class="form-label">Program Studi</label> 
                <input type="text" class="form-control" name="prodi" value="{{ 
$mahasiswa->prodi }}" required> 
            </div> 
            <div class="mb-3"> 
                <label for="tahun_angkatan" class="form-label">Tahun 
Angkatan</label> 
                <select class="form-select" name="tahun_angkatan" required> 
                    @for ($tahun = 2022; $tahun <= 2025; $tahun++) 
                        <option value="{{ $tahun }}" {{ $mahasiswa->tahun_angkatan 
== $tahun ? 'selected' : '' }}>{{ $tahun }}</option> 
                        @endfor 
                </select> 
            </div> 
            <div class="mb-3"> 
                <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label> 
                <input type="date" class="form-control" name="tanggal_lahir" 
value="{{ $mahasiswa->tanggal_lahir }}" required> 
            </div> 
 
            <button type="submit" class="btn btn-primary">Update</button> 
            <a href="{{ route('mahasiswa.index') }}" class="btn btn
secondary">Batal</a> 
        </form> 
    </div> 
</body> 
 
</html> 