<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumni extends Model
{
    protected $table = "alumni";
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama',
        'nim',
        'email',
        'jenis_kelamin',
        'angkatan',
        'agama',
        'program_studi',
        'tempat_lahir',
        'tanggal_lahir',
        'alamat',
        'no_telp',
        'tahun_masuk',
        'tahun_lulus',
        'ipk',
        'pekerjaan',
        'awal_bekerja',
        'domisili_tempat_kerja',
        'foto',
    ];
}
