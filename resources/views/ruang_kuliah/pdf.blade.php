<!DOCTYPE html>  
<html>  
<head> 
<title>Laporan Data Mahasiswa</title>  
<style>  
body { font-family: sans-serif; } .header-table, .data-table { width: 100%; 
border-collapse: collapse; } .data-table, .data-table th, .data-table td { 
border: 1px solid black; } .data-table th, .data-table td { padding: 8px; text
align: left; } .data-table th { background-color: #f2f2f2; } .header-table td { 
border: 0; } .logo { width: 80px; } .header-text { text-align: center; } 
.report-title { text-align: center; margin-top: 20px; margin-bottom: 20px;} 
</style>  
</head> 
<body> 
    <table class="header-table">
    <tr>
        <td style="width: 15%;">
            {{-- Mengambil path logo dan mengubahnya menjadi base64 --}}
            @php
                $logoPath = public_path('images/polbeng-bg.png');
                $logoData = base64_encode(file_get_contents($logoPath));
                $logoSrc = 'data:image/png;base64,' . $logoData;
            @endphp
            <img src="{{ $logoSrc }}" class="logo" alt="Logo Polbeng">
        </td>
        <td class="header-text">
            <h2>POLITEKNIK NEGERI BENGKALIS</h2>
            <h3>JURUSAN TEKNIK INFORMATIKA</h3>
            <p>Jalan Bathin Alam, Sungai Alam, Bengkalis, Riau 28711</p>
        </td>
    </tr>
</table>

<hr>

<h1>Laporan Data Mahasiswa</h1>

<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Kode Ruangan</th>
            <th>Nama Ruangan</th>
            <th>Foto Ruangan</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($ruangKuliahs as $ruang)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $ruang->kode_ruangan }}</td>
                <td>{{ $ruang->nama_ruangan }}</td>
                <td>
                    @if($ruang->foto_ruangan)
                        @php
                            $fotoPath = storage_path('app/public/' . $ruang->foto_ruangan);
                            if (file_exists($fotoPath)) {
                                $fotoData = base64_encode(file_get_contents($fotoPath));
                                $fotoSrc = 'data:image/' . pathinfo($fotoPath, PATHINFO_EXTENSION) . ';base64,' . $fotoData;
                            } else {
                                $fotoSrc = null;
                            }
                        @endphp
                        @if($fotoSrc)
                            <img src="{{ $fotoSrc }}" alt="Foto {{ $ruang->nama_ruangan }}" style="width: 100px; height: auto;">
                        @else
                            Tidak ada gambar
                        @endif
                    @else
                        Tidak ada gambar
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
