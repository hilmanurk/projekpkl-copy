<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SekolahController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/* ------------------- Admin Route ------------------ */

Route::prefix('admin')->group(function () {
    Route::get('/login', [AdminController::class, 'Index'])->name('login_form');
    Route::post('/login/owner', [AdminController::class, 'Login'])->name('admin.login');
    Route::get('/dashboard', [AdminController::class, 'Dashboard'])->name('admin.dashboard')->middleware('admin');
    Route::get('/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout')->middleware('admin');
    Route::get('/register', [AdminController::class, 'AdminRegister'])->name('admin.register');
    Route::post('/register/create', [AdminController::class, 'AdminRegisterCreate'])->name('admin.register.create');
    Route::get('/bop/bop_sma', [AdminController::class, 'BOPSekolahSMA'])->name('admin.bop_sma');
    Route::get('/data_sekolah', [AdminController::class, 'DataSekolah'])->name('admin.data_sekolah');
    Route::get('/data_sekolah/create', [AdminController::class, 'DataSekolahCreate'])->name('admin.data_sekolah.create');
    Route::post('/data_sekolah', [AdminController::class, 'DataSekolahStore'])->name('admin.data_sekolah.store');
    Route::get('/data_sekolah/edit', [AdminController::class, 'DataSekolahEdit'])->name('admin.data_sekolah.edit');
    Route::put('/data_sekolah', [AdminController::class, 'DataSekolahDelete'])->name('admin.data_sekolah.update');
    Route::get('/kode_rekening', [AdminController::class, 'KodeRekening'])->name('admin.kode_rekening');
    Route::get('/kode_rekening/create', [AdminController::class, 'KodeRekeningCreate'])->name('admin.kode_rekening.create');
});


/* ------------------- End Admin Route ------------------ */
Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


/* ---------------------- Sekolah ----------------------- */
Route::prefix('sekolah')->group(function () {
    Route::get('/login', [SekolahController::class, 'Index'])->name('login_form');
    Route::post('/login/owner', [SekolahController::class, 'Login'])->name('sekolah.login');
    Route::get('/dashboard', [SekolahController::class, 'Dashboard'])->name('sekolah.dashboard')->middleware('sekolah');
    Route::get('/logout', [SekolahController::class, 'SekolahLogout'])->name('sekolah.logout')->middleware('sekolah');
    Route::get('/register', [SekolahController::class, 'SekolahRegister'])->name('sekolah.register');
    Route::post('/register/create', [SekolahController::class, 'SekolahRegisterCreate'])->name('sekolah.register.create');
    Route::get('/alokasi', [SekolahController::class, 'Alokasi'])->name('sekolah.alokasi');
    Route::get('/alokasi/create', [SekolahController::class, 'AlokasiCreate'])->name('sekolah.alokasi.create');
    Route::post('/alokasi', [SekolahController::class, 'AlokasiStore'])->name('sekolah.alokasi.store');
    Route::put('/alokasi', [SekolahController::class, 'AlokasiDelete'])->name('sekolah.alokasi.update');
    Route::get('/realisasi', [SekolahController::class, 'Realisasi'])->name('sekolah.realisasi');
    Route::get('/realisasi/create', [SekolahController::class, 'RealisasiCreate'])->name('sekolah.realisasi.create');
    Route::post('/realisasi', [SekolahController::class, 'RealisasiStore'])->name('sekolah.realisasi.store');
    Route::put('/realisasi', [SekolahController::class, 'RealisasiDelete'])->name('sekolah.realisasi.update');
});

require __DIR__ . '/auth.php';
