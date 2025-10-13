<!DOCTYPE html> 
<html lang="en"> 
 
<head> 
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Import Data Matakuliah</title> 
    <link 
href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" 
rel="stylesheet"> 
</head> 
 
<body> 
    <div class="container mt-5"> 
        <h2>Import Data Matakuliah dari Excel</h2> 
        <hr> 
 
        @if ($errors->any()) 
        <div class="alert alert-danger"> 
            <ul> 
                @foreach ($errors->all() as $error) 
                <li>{{ $error }}</li> 
                @endforeach 
            </ul> 
        </div> 
        @endif 
 
        <form action="{{ route('matakuliah.import') }}"  
          method="POST" enctype="multipart/form-data"> 
            @csrf 
            <div class="mb-3"> 
                <label for="file" class="form-label"> 
                  Pilih File Excel (.xlsx, .xls)</label> 
                <input class="form-control" type="file" id="file" name="file" required> 
            </div> 
            <button type="submit" class="btn btn-primary">Import Data</button> 
            <a href="{{ route('matakuliah.index') }}"  
             class="btn btn-secondary">Kembali</a> 
        </form> 
 
        <div class="alert alert-info mt-4"> 
            <strong>Catatan:</strong>  
           Pastikan file Excel Anda memiliki kolom header berikut pada baris pertama: 
Pemograman	Web	Framework	
	
<code>kode_mk</code>, <code>nama_mk</code>, <code>sks</code>,   
<code>semester</code>. 
</div> 
</div> 
</body> 
</html> 