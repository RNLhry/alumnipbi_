<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use App\Models\Testimoni;
use Illuminate\Http\Request;

class BerandaController extends Controller
{
    public function index() {
        // Ambil daftar angkatan yang unik
        $angkatan = Alumni::select('angkatan')->distinct()->orderBy('angkatan')->pluck('angkatan');

        $testimoni = Testimoni::leftJoin('alumni', 'testimoni.alumni_id', '=', 'testimoni.id')
                    // ->select('alumni.*')
                    ->get();
    
        // Inisialisasi larik asosiatif untuk menyimpan jumlah alumni per angkatan
        $jumlahAlumniPerAngkatan = [];
    
        // Iterasi melalui setiap angkatan
        foreach ($angkatan as $tahun) {
            // Hitung jumlah alumni untuk angkatan saat ini
            $jumlahAlumni = Alumni::where('angkatan', $tahun)->count();
    
            // Simpan jumlah alumni ke dalam larik asosiatif
            $jumlahAlumniPerAngkatan[$tahun] = $jumlahAlumni;
        }
    
        // Kirim data ke tampilan
        return view('master2', compact('angkatan', 'jumlahAlumniPerAngkatan', 'testimoni'));
    }
    
}
