<!DOCTYPE html>

<html>
<head>
<title>Laporan Data Ruang Kuliah</title>
<style>
/* BASE STYLES */
body {
font-family: 'Arial', sans-serif;
margin: 0;
padding: 0;
color: #333;
}

    /* HEADER STYLES: Mengatur tata letak header institusi */
    .header-table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
    }
    .header-table td {
        border: none;
        padding: 0;
    }
    .logo {
        width: 90px; /* Ukuran logo yang jelas */
        height: auto;
        display: block;
        margin-right: 20px;
    }
    .header-text {
        text-align: center;
        line-height: 1.2;
    }
    .header-text h2 {
        font-size: 18pt;
        margin: 0;
        font-weight: bold;
        text-transform: uppercase;
    }
    .header-text h3 {
        font-size: 14pt;
        margin: 0;
        font-weight: 600;
        text-transform: uppercase;
    }
    .header-text p {
        font-size: 10pt;
        margin: 0;
    }

    /* SEPARATOR: Garis pemisah tebal setelah header */
    .separator {
        border: none;
        height: 2px;
        background-color: #333;
        margin: 10px 0 20px 0;
    }

    /* REPORT TITLE */
    .report-title {
        text-align: center;
        font-size: 16pt;
        font-weight: bold;
        margin-top: 20px;
        margin-bottom: 30px;
        text-transform: uppercase;
    }

    /* DATA TABLE STYLES: Tabel data yang rapi */
    .data-table {
        width: 100%;
        border-collapse: collapse;
        font-size: 10pt;
    }
    .data-table th, .data-table td {
        border: 1px solid #999; /* Garis yang lebih tipis dan lembut */
        padding: 10px 8px;
    }
    .data-table th {
        background-color: #e6e6e6; 
        font-weight: bold;
        text-align: center;
        vertical-align: middle;
    }
    .data-table td {
        vertical-align: top;
        text-align: left;
    }
    .data-table tbody tr:nth-child(even) {
        background-color: #f9f9f9; /* Efek zebra striping */
    }

    /* IMAGE STYLES */
    .ruangan-foto {
        width: 100px;
        height: auto;
        max-height: 80px;
        object-fit: cover;
        display: block;
        margin: auto;
        border-radius: 4px;
    }
</style>

</head>
<body>
<table class="header-table">
<tr>
{{-- Kolom Logo --}}
<td style="width: 15%; text-align: left; vertical-align: top;">
@php
// Logika base64 untuk logo (diperlukan untuk PDF)
$logoPath = public_path('images/polbeng-bg.png');
$logoData = file_exists($logoPath) ? base64_encode(file_get_contents($logoPath)) : null;
$logoSrc = $logoData ? 'data:image/png;base64,' . $logoData : null;
@endphp
@if($logoSrc)
<img src="{{ $logoSrc }}" class="logo" alt="Logo Polbeng">
@endif
</td>
{{-- Kolom Teks Header Institusi --}}
<td class="header-text" style="width: 70%;">
<h2>POLITEKNIK NEGERI BENGKALIS</h2>
<h3>JURUSAN TEKNIK INFORMATIKA</h3>
<p>Jalan Bathin Alam, Sungai Alam, Bengkalis, Riau 28711</p>
</td>
{{-- Kolom Kosong untuk Jarak --}}
<td style="width: 15%;"></td>
</tr>
</table>

<hr class="separator">

<div class="report-title">
    Laporan Data Ruang Kuliah
</div>

<table class="data-table">
    <thead>
        <tr>
            <th style="width: 5%;">No</th>
            <th style="width: 20%;">Kode Ruangan</th>
            <th style="width: 30%;">Nama Ruangan</th>
            <th style="width: 15%;">Foto Ruangan</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($ruangKuliahs as $ruang)
            <tr>
                <td style="text-align: center;">{{ $loop->iteration }}</td>
                <td>{{ $ruang->kode_ruangan }}</td>
                <td>{{ $ruang->nama_ruangan }}</td>
                <td style="text-align: center;">
                    @if($ruang->foto_ruangan)
                        @php
                            $fotoPath = storage_path('app/public/' . $ruang->foto_ruangan);
                            $fotoSrc = null;
                            // Pengecekan file dan konversi ke base64
                            if (file_exists($fotoPath)) {
                                $fotoData = base64_encode(file_get_contents($fotoPath));
                                $mimeType = mime_content_type($fotoPath) ?: pathinfo($fotoPath, PATHINFO_EXTENSION);
                                $fotoSrc = 'data:image/' . $mimeType . ';base64,' . $fotoData;
                            }
                        @endphp
                        @if($fotoSrc)
                            <img src="{{ $fotoSrc }}" alt="Foto {{ $ruang->nama_ruangan }}" class="ruangan-foto">
                        @else
                            Foto tidak tersedia
                        @endif
                    @else
                        Tidak ada gambar
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

</body>
</html>