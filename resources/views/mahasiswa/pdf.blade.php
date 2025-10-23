<!DOCTYPE html> 
<html> 
<head> 
<title>Laporan Data Mahasiswa</title> 
<style> 
    body { 
        font-family: sans-serif; 
        font-size: 10pt; /* Ukuran font standar diperkecil untuk PDF */
    } 
    .header-table, .data-table { 
        width: 100%; 
        border-collapse: collapse; 
        margin-bottom: 10px;
    } 
    .data-table, .data-table th, .data-table td { 
        border: 1px solid #333; /* Warna border yang lebih gelap */
    } 
    .data-table th, .data-table td { 
        padding: 6px 8px; 
        text-align: left; 
    } 
    .data-table th { 
        background-color: #e6e6e6; /* Latar belakang header lebih gelap */
        font-size: 10pt;
        text-transform: uppercase;
    } 
    .header-table td { 
        border: 0; 
        vertical-align: middle; /* Mengatur logo dan teks agar sejajar di tengah */
    } 
    .logo { 
        width: 80px; 
        height: auto;
    } 
    .header-text { 
        text-align: center; 
    } 
    .header-text h2 {
        font-size: 14pt;
        margin: 0;
        padding: 0;
        font-weight: 900; /* Extra bold untuk judul utama */
    }
    .header-text h3 {
        font-size: 12pt;
        margin: 0;
        padding: 0;
        font-weight: 900; /* Extra bold untuk sub judul */
    }
    .header-text p {
        font-size: 9pt;
        margin-top: 5px; /* Sedikit jarak dari sub judul */
        padding: 0;
        font-weight: normal; /* Alamat lebih ringan */
    }
    .divider {
        border-top: 3px solid #000;
        margin: 10px 0 20px 0;
    }
    .report-title { 
        text-align: center; 
        font-size: 16pt;
        font-weight: bold;
        margin-bottom: 20px;
    } 
</style> 
</head> 
<body> 
    <table class="header-table">
        <tr>
            <td style="width: 15%;">
                {{-- Mengambil path logo dan mengubahnya menjadi base64 --}}
                @php
                    // Pastikan path ke logo sudah benar (misalnya images/polbeng-bg.png)
                    $logoPath = public_path('images/polbeng-bg.png');
                    // Cek apakah file ada sebelum mencoba encode
                    if (file_exists($logoPath)) {
                        $logoData = base64_encode(file_get_contents($logoPath));
                        $logoSrc = 'data:image/png;base64,' . $logoData;
                    } else {
                        // Placeholder jika logo tidak ditemukan (PENTING untuk PDF generation)
                        $logoSrc = 'https://via.placeholder.com/80x80?text=LOGO';
                    }
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

    <div class="divider"></div>

    <div class="report-title">
        LAPORAN DATA MAHASISWA
    </div>

    <table class="data-table">
        <thead>
            <tr>
                <th style="width: 5%;">No</th>
                <th style="width: 25%;">Nama</th>
                <th style="width: 10%;">NIM</th>
                <th style="width: 15%;">Jenis Kelamin</th>
                <th style="width: 20%;">Prodi</th>
                <th style="width: 10%;">Angkatan</th>
                <th style="width: 15%;">Tgl Lahir</th>
            </tr>
        </thead>
        <tbody>
            {{-- Pastikan variabel $mahasiswas tersedia saat me-render view ini --}}
            @foreach ($mahasiswas as $mahasiswa)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $mahasiswa->nama }}</td>
                    <td>{{ $mahasiswa->nim }}</td>
                    <td>{{ $mahasiswa->jenis_kelamin }}</td>
                    <td>{{ $mahasiswa->prodi }}</td>
                    <td>{{ $mahasiswa->tahun_angkatan }}</td>
                    <td>{{ $mahasiswa->tanggal_lahir }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body> 
</html>
