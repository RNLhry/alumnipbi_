<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

class AlumniController extends Controller
{
    public function boot()
{
    Paginator::useBootstrap(); // Sesuaikan dengan tampilan Anda

    View::composer('*', function ($view) {
        $alumni = Alumni::paginate(10); // Sesuaikan dengan jumlah item per halaman yang Anda inginkan
        $view->with('alumni', $alumni);
    });
}
public function index(Alumni $alumni,Request $request, )
{
    $angkatan = Alumni::select('angkatan')->distinct()->orderBy('angkatan')->pluck('angkatan');
    $alumnis = Alumni::all();
    Paginator::useBootstrap(); // Sesuaikan dengan tampilan Anda

    View::composer('*', function ($view) {
        $alumni = Alumni::paginate(10); // Sesuaikan dengan jumlah item per halaman yang Anda inginkan
        $view->with('alumni', $alumni);
    });

    return view('admin.alumni.index', compact('alumnis', 'angkatan'));
}


public function store(Request $request)
{
    // Validasi input
    $validatedData = $request->validate([
        'nama' => 'required',
        'nim' => 'required',
        'email' => 'required|email',
        'jenis_kelamin' => 'required',
        'angkatan' => 'required|numeric',
        'agama' => 'required',
        'program_studi' => 'required',
        'tempat_lahir' => 'required',
        'tanggal_lahir' => 'required|date',
        'alamat' => 'required',
        'no_telp' => 'required',
        'tahun_masuk' => 'required|numeric',
        'tahun_lulus' => 'required|numeric',
        'ipk' => 'required',
        'pekerjaan' => 'required',
        'awal_bekerja' => 'required|date',
        'domisili_tempat_kerja' => 'required',
        'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:20048', // Jika foto diupload
    ]);

   
    // Cek apakah ada file foto yang diupload
    if ($request->hasFile('foto')) {
        $fotoName = time().'.'.$request->foto->extension();
        $request->foto->move(public_path('images'), $fotoName);
        $validatedData['foto'] = $fotoName;
    }
    // Simpan data alumni
    Alumni::create($validatedData);
    toastr()->success('Data Alumni berhasil ditambahkan');
    return redirect('/alumni');
}
public function search(Request $request)
{
    $keyword = $request->input('keyword');
    $angkatan = Alumni::select('angkatan')->distinct()->orderBy('angkatan')->pluck('angkatan');

    $alumniQuery = Alumni::query();

    if ($keyword) {
        $alumniQuery->where('nama', 'LIKE', "%$keyword%")
                    ->orWhere('nim', 'LIKE', "%$keyword%");
    }

    $alumnis = $alumniQuery->paginate(10);
    Paginator::useBootstrap(); // Sesuaikan dengan tampilan Anda

    View::composer('*', function ($view) {
        $alumni = Alumni::paginate(10); // Sesuaikan dengan jumlah item per halaman yang Anda inginkan
        $view->with('alumni', $alumni);
    });

    return view('admin.alumni.index', compact('alumnis', 'keyword', 'angkatan'));
}
public function show($id)
{
    $alumni = Alumni::find($id);

    return response()->json($alumni);
}


public function delete(Request $request, $id)
{
    // Cari data Alumni berdasarkan ID
    $alumni = Alumni::findOrFail($id);

    // Hapus data Alumni
    $alumni->delete();
    toastr()->success('Data Alumni berhasil dihapus');

    // Redirect kembali ke halaman sebelumnya atau ke halaman yang Anda inginkan
    return redirect('/alumni');
}
public function edit($id, Request $request){

    $j = $request->segment(2);
    $alumni = Alumni::where('alumni.id', $j)->get();

    return view('admin.alumni.edit')->with([
        'alumni'=> $alumni]);

}

public function update(Request $request)
{
    // Validasi input
    $validator = Validator::make($request->all(), [
        'nama' => 'required',
        'nim' => ['required', Rule::unique('alumni', 'nim')->ignore($request->id)],
        'email' => ['required', 'email', Rule::unique('alumni', 'email')->ignore($request->id)],
        'jenis_kelamin' => 'required',
        'angkatan' => 'required|numeric',
        'agama' => 'required',
        'program_studi' => 'required',
        'tempat_lahir' => 'required',
        'tanggal_lahir' => 'required|date',
        'alamat' => 'required',
        'no_telp' => 'required',
        'tahun_masuk' => 'required|numeric',
        'tahun_lulus' => 'required|numeric',
        'ipk' => 'required',
        'pekerjaan' => 'required',
        'awal_bekerja' => 'required|date',
        'domisili_tempat_kerja' => 'required',
        'foto' => 'image|mimes:jpeg,png,jpg,gif|max:20048', // Jika foto diupload
    ]);
    if ($validator->fails()) {
        toastr()->error('Gagal menyimpan data. Silakan periksa kembali isian formulir.');
        return redirect()->back()->withErrors($validator)->withInput();
    }

    // Cari data alumni yang akan diperbarui
    $alumni = Alumni::find($request->id);

    // Cek apakah ada file foto yang diupload
    if ($request->hasFile('foto')) {
        $fotoName = time().'.'.$request->foto->extension();
        $request->foto->move(public_path('images'), $fotoName);

        // Hapus foto lama jika ada
        if ($alumni->foto) {
            $oldFilePath = public_path('images/' . $alumni->foto);
            if (file_exists($oldFilePath)) {
                unlink($oldFilePath);
            }
        }

        $alumni['foto'] = $fotoName;
    }

    // Perbarui data alumni
    // Perbarui data alumni dengan menggunakan atribut yang diperbarui
$alumni->nama = $request->nama;
$alumni->nim = $request->nim;
$alumni->email = $request->email;
$alumni->jenis_kelamin = $request->jenis_kelamin;
$alumni->angkatan = $request->angkatan;
$alumni->agama = $request->agama;
$alumni->program_studi = $request->program_studi;
$alumni->tempat_lahir = $request->tempat_lahir;
$alumni->tanggal_lahir = $request->tanggal_lahir;
$alumni->alamat = $request->alamat;
$alumni->no_telp = $request->no_telp;
$alumni->tahun_masuk = $request->tahun_masuk;
$alumni->tahun_lulus = $request->tahun_lulus;
$alumni->ipk = $request->ipk;
$alumni->pekerjaan = $request->pekerjaan;
$alumni->awal_bekerja = $request->awal_bekerja;
$alumni->domisili_tempat_kerja = $request->domisili_tempat_kerja;

// Simpan perubahan pada model
$alumni->save();


    toastr()->success('Data Alumni berhasil diubah');
    return redirect('/alumni');
}
public function print(Request $request)
{
    $j = $request->angkatan;
    $alumni = Alumni::where('alumni.angkatan', $j)->get();
    $jumlahData = $alumni->count();

    return view('admin.alumni.print', compact('alumni', 'jumlahData'));
}


}
