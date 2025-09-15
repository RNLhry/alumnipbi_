<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Misalkan Anda memiliki data jumlah alumni sebelumnya dan jumlah alumni saat ini
        $jumlahAlumniSebelumnya = 50;
        $jumlahAlumniSaatIni = Alumni::count();
    
        // Hitung persentase kenaikan
        $persentaseKenaikan = 0;
        if ($jumlahAlumniSebelumnya > 0) {
            $persentaseKenaikan = (($jumlahAlumniSaatIni - $jumlahAlumniSebelumnya) / $jumlahAlumniSebelumnya) * 100;
        }
    
        // Kirim data ke view
        return view('admin.home', [
            'totalAlumni' => $jumlahAlumniSaatIni,
            'persentaseKenaikan' => $persentaseKenaikan,
        ]);
    }
}
