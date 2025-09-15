<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use App\Models\Testimoni;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Livewire\Component;

class TestimoniController extends Controller
{
    public function index(Testimoni $testimoni,Request $request, )
    {
        $testimonis = Testimoni::leftJoin('alumni', 'testimoni.alumni_id', '=', 'alumni.id')
        ->select('testimoni.*')
        ->get();
        $alumnis = Alumni::all();
        Paginator::useBootstrap(); // Sesuaikan dengan tampilan Anda
    // dd($testimonis);
        View::composer('*', function ($view) {
            $testimoni = Testimoni::paginate(10); // Sesuaikan dengan jumlah item per halaman yang Anda inginkan
            $view->with('testimoni', $testimoni);
        });
    
        return view('admin.testimoni.index', compact('testimonis', 'alumnis'));
    }

    public function getDetail($id)
    {
        $mahasiswa = Alumni::find($id);
    
        if (!$mahasiswa) {
            return response()->json(['error' => 'Mahasiswa not found'], 404);
        }
    
        return response()->json([
            'nim' => $mahasiswa->nim,
            'alamat' => $mahasiswa->alamat,
        ]);
    }
    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'alumni_id' => 'required',
            'testimoniy' => 'required',
        ]);
    
        // Cek apakah sudah ada testimoni untuk alumni tersebut
        // $testimoni = Testimoni::where('alumni_id', $validatedData['alumni_id'])->first();
        $testimoni = Testimoni::find($request->id);
    
        // Jika testimoni untuk alumni tersebut sudah ada, tidak perlu menambahkan lagi
        
    
        $testimoni->update($validatedData);
             // Jika testimoni belum ada, tambahkan testimoni baru
    
        toastr()->success('Testimoni Alumni berhasil diedit');
        return redirect('/testimoni');
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'alumni_id' => 'required',
            'testimoniy' => 'required',
        ]);
    
        // Cek apakah sudah ada testimoni untuk alumni tersebut
        $testimoni = Testimoni::where('alumni_id', $validatedData['alumni_id'])->first();
    
        // Jika testimoni untuk alumni tersebut sudah ada, tidak perlu menambahkan lagi
        if ($testimoni) {
            toastr()->error('Testimoni untuk alumni ini sudah ada');
            return redirect('/testimoni');
        }
    
        // Jika testimoni belum ada, tambahkan testimoni baru
        Testimoni::create($validatedData);
    
        toastr()->success('Testimoni Alumni berhasil ditambahkan');
        return redirect('/testimoni');
    }
   
    public function delete(Request $request, $id)
{
  
    $testimoni = Testimoni::findOrFail($id);

    // Hapus data Alumni
    $testimoni->delete();
    toastr()->success('Data Alumni berhasil dihapus');

    // Redirect kembali ke halaman sebelumnya atau ke halaman yang Anda inginkan
    return redirect('/testimoni');
}
public function show($id)
{
    $testimoni = Testimoni::leftJoin('alumni', 'testimoni.alumni_id', '=', 'alumni.id')
                           ->select('alumni.*', 'testimoni.*')
                           ->where('testimoni.alumni_id', $id)
                           ->find($id);
                           
    return response()->json($testimoni);
}
public function edit($id, Request $request){

    $j = $request->segment(3);
    // $testimoni = Testimoni::where('testimoni.id', $j)->get();
    $testimoni = Testimoni::leftJoin('alumni', 'testimoni.alumni_id', '=', 'alumni.id')
                           ->select('alumni.*', 'testimoni.*')
                           ->where('testimoni.alumni_id', $j)
                           ->get();
            
    return view('admin.testimoni.edit')->with([
        'testimoni'=> $testimoni]);

}


    
}
