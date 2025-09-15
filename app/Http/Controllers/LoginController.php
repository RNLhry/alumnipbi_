<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function login()
    {
        if (Auth::check()) {
            return redirect('admin.home');
        }else{
            return view('admin.login');
        }
    }

    public function actionlogin(Request $request)
    {
        $data = [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ];
    
        // Cari user berdasarkan alamat email
        $user = User::where('email', $data['email'])->first();
    
        // Periksa apakah user ditemukan dan apakah password cocok
        if ($user && Auth::attempt(['email' => $data['email'], 'password' => $data['password']])) {
            // Jika autentikasi berhasil, lakukan sesuatu, misalnya redirect ke halaman dashboard
            toastr()->success('Anda Masuk sebagai pengelola data alumni.');

            return redirect('/admin');
        } else {
            // Jika autentikasi gagal, kembalikan ke halaman login dengan pesan error
            return redirect()->route('login')->with('error', 'Email atau password salah.');
        }
    }

    public function actionlogout()
    {
        Auth::logout();
        return redirect('/landingpage');
    }
}
