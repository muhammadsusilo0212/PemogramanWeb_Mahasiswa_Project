<?php

namespace App\Imports;

use App\Models\Matakuliah;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class MatakuliahsImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Matakuliah([
            //
            'kode_mk' => $row['kode_mk'],
            'nama_mk' => $row['nama_mk'],
            'sks' => $row['sks'],
            'semester' => $row['semester'],
        ]);
    }
}
