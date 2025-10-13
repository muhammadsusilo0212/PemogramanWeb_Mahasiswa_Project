<?php

namespace App\Imports;

use App\Models\Mahasiswa;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class MahasiswasImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Mahasiswa([
            'nama' => $row['nama'],
            'nim' => $row['nim'],
            'jenis_kelamin' => $row['jenis_kelamin'],
            'prodi' => $row['prodi'],
            'tahun_angkatan' => $row['tahun_angkatan'],
            'tanggal_lahir' => $row['tanggal_lahir'],
            //
        ]);
    }
}
