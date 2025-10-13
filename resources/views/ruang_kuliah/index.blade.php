<!DOCTYPE html> 
<html lang="en"> 
<head> 
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Daftar Ruang Kuliah</title> 
    <link 
href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" 
rel="stylesheet"> 
    <style> 
        .card-img-top { 
            width: 100%; 
            height: 200px; 
            object-fit: cover; 
        } 
    </style> 
</head> 
 
<body> 
    <div class="container mt-5"> 
        <div class="d-flex justify-content-between align-items-center mb-4"> 
            <h2>Daftar Ruang Kuliah</h2> 
            <a href="{{ route('ruang_kuliah.create') }}"  class="btn btn-primary mb-3">Tambah Data Ruang</a>
            
               
        </div> 
        <div class="d-flex justify-content-end mb-3">
            <a href="{{ route('ruang_kuliah.cetakPdf') }}" class="btn btn-danger" target="_blank">Cetak PDF</a>
        </div>
 
        @if (session('success')) 
        <div class="alert alert-success"> 
            {{ session('success') }} 
        </div> 
        @endif 
 
        <div class="row"> 
            @forelse ($ruangKuliahs as $ruang) 
            <div class="col-md-4 mb-4"> 
                <div class="card h-100"> 
                    @if($ruang->foto_ruangan) 
                    <img src="{{ Storage::url($ruang->foto_ruangan) }}"   
                        class="card-img-top" alt="Foto {{ $ruang->nama_ruangan }}"> 
                    @else 
                    <img        
                    src="https://via.placeholder.com/400x250.png?text=Tidak+Ada+Gambar"  
                  class="card-img-top" alt="Tidak ada gambar"> 
                    @endif 
                    <div class="card-body"> 
                        <h5 class="card-title"> 
                         {{ $ruang->nama_ruangan }}</h5> 
                        <p class="card-text text-muted"> 
                         {{ $ruang->kode_ruangan }}</p> 
                    </div> 
                    <div class="card-footer bg-white border-top-0"> 
                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" 
action="{{ route('ruang_kuliah.destroy', $ruang->id) }}" method="POST"> 
                        <a href="{{ route('ruang_kuliah.edit', $ruang->id) }}"  
                         class="btn btn-sm btn-warning">EDIT</a> 
                            @csrf 
                            @method('DELETE') 
                        <button type="submit" class="btn btn-sm btn-danger">          
                          HAPUS 
                        </button> 
                        </form> 
                    </div> 
                </div> 
            </div> 
            @empty 
            <div class="col"> 
                <div class="alert alert-secondary text-center"> 
                    Belum ada data ruang kuliah. 
                </div> 
            </div> 
            @endforelse 
        </div> 
    </div> 
</body> 
</html>