<?php

use App\Http\Controllers\AlumniController;
use App\Http\Controllers\BerandaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TestimoniController;
use App\Http\Controllers\FeedbackController;




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/profil', function () {
    return view('profil');
});
Route::get('/', function () {
    return redirect()->route('beranda');
});
Route::get('/landingpage', [BerandaController::class, 'index'])->name('beranda');
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('actionlogin', [LoginController::class, 'actionlogin'])->name('actionlogin');

Route::get('/admin', [HomeController::class, 'index'])->name('home')->middleware('auth');
Route::get('/actionlogout', [LoginController::class, 'actionlogout'])->name('actionlogout')->middleware('auth');

// =============================ALUMNI===============================================
Route::get('/alumni', [AlumniController::class, 'index'])->name('alumni_tb')->middleware('auth');
Route::get('/hapus/{id}', [AlumniController::class, 'delete'])->name('alumni.delete')->middleware('auth');
Route::get('/edit/{id}', [AlumniController::class, 'edit'])->name('alumni.edit')->middleware('auth');
Route::post('/alumnistore', [AlumniController::class, 'store'])->name('alumni.store')->middleware('auth');
Route::post('/alumniupdate', [AlumniController::class, 'update'])->name('alumni.update')->middleware('auth');
Route::get('/alumni/search', [AlumniController::class, 'search'])->name('alumni.search')->middleware('auth');
Route::get('/show/{id}', [AlumniController::class, 'show'])->name('alumni.show')->middleware('auth');
Route::get('/alumni/print', [AlumniController::class, 'print'])->name('alumni.extractPDF')->middleware('auth');

// ======================================TESTIMONI===============================================
Route::get('/testimoni', [TestimoniController::class, 'index'])->name('testimoni_tb')->middleware('auth');
Route::get('/testimonis', [TestimoniController::class, 'select'])->name('testimoni.select')->middleware('auth');

Route::get('/getMahasiswaDetail/{id}', [TestimoniController::class, 'getDetail']);


Route::post('/testimoni/update', [TestimoniController::class, 'update'])->name('testimoni.update')->middleware('auth');
Route::get('/testimoni/hapus/{id}', [TestimoniController::class, 'delete'])->name('testimoni.delete')->middleware('auth');
Route::get('/testimoni/edit/{id}', [TestimoniController::class, 'edit'])->name('testimoni.edit')->middleware('auth');
Route::post('/testimoni/store', [TestimoniController::class, 'store'])->name('testimoni.store')->middleware('auth');
Route::get('/search', [TestimoniController::class, 'search'])->name('testimoni.search')->middleware('auth');
// Route::get('/search/mahasiswa', [TestimoniController::class, 'search'])->name('testimoni.searchs')->middleware('auth');
Route::get('/search/mahasiswa', [TestimoniController::class, 'selectSearch'])->name('testimoni.searchs')->middleware('auth');
Route::get('/testimoni/show/{id}', [TestimoniController::class, 'show'])->name('testimoni.show')->middleware('auth');
Route::get('/testimoni/print', [TestimoniController::class, 'print'])->name('testimoni.extractPDF')->middleware('auth');

// ==============================FEEDBACK=====================================================================
Route::get('/feedback/search', [FeedbackController::class, 'search'])->name('feedback.search')->middleware('auth');
Route::get('/feedback', [FeedbackController::class, 'index'])->name('feedback.index');
// Route::post('/feedback/store', [FeedbackControlller::class, 'store'])->name('feedback.store');
Route::post('/feedback/store', [FeedbackController::class, 'store'])->name('feedback.store');


Route::get('/feedback/show/{id}', [FeedbackController::class, 'show'])->name('feedback.show')->middleware('auth');
Route::delete('/feedback/hapus/{id}', [FeedbackController::class, 'delete'])->name('feedback.delete')->middleware('auth');