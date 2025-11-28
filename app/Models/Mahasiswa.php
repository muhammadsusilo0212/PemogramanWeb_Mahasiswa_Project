<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'nim',
        'jenis_kelamin',
        'prodi',
        'dosen_wali',
        'tahun_angkatan',
        'tanggal_lahir'
        
    ];
    // Relasi ke model Dosen satu mahasiswa memiliki satu dosen wali
    public function dosen()
    {
        return $this->belongsTo(Dosen::class, 'dosen_wali', 'nidn');
    }
}
