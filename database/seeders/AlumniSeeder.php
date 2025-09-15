<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AlumniSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 20; $i++) {
            DB::table('alumni')->insert([
                'nama' => 'Alumni ' . $i,
                'nim' => 'NIM ' . $i,
                'email' => 'alumni' . $i . '@gmail.com',
                'jenis_kelamin' => 'laki-laki', // atau 'perempuan'
                'angkatan' => 2018,
                'agama' => 'Islam',
                'program_studi' => 'Teknik Informatika',
                'tempat_lahir' => 'Jakarta',
                'tanggal_lahir' => '1990-01-01',
                'alamat' => 'Jl. Contoh No. ' . $i,
                'no_telp' => '0812345678' . $i,
                'tahun_masuk' => 2015,
                'tahun_lulus' => 2019,
                'ipk' => '3.75',
                'pekerjaan' => 'Programmer',
                'awal_bekerja' => '2019-06-01',
                'domisili_tempat_kerja' => 'Jakarta',
                'foto' => 'alumni' . $i . '.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
