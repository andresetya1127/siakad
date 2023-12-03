<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CaptchaServiceController;
use App\Http\Controllers\DosenDashboardController;
use App\Http\Controllers\MahasiswaDashboardController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('auth.login');
})->middleware('guest');

// Captcha Controller
Route::controller(CaptchaServiceController::class)->group(function () {
    Route::get('/reload-captcha', 'reloadCaptcha')->name('reloadCaptcha');
});

// Auth Controller
Route::controller(AuthController::class)->group(function () {
    Route::get('/login-index', 'index')->name('auth.index')->middleware('guest');
    Route::post('/auth-login', 'authenticate')->name('auth.login')->middleware('guest');
    Route::get('/auth-logout', 'log_out')->name('auth.signOut')->middleware('auth');
});


//Admin Controller
Route::controller(AdminController::class)->group(function () {
    Route::get('/admin-index', 'index')->name('admin.index');
});

// mahasiswa Dashboard
Route::controller(MahasiswaDashboardController::class)->group(function () {
    Route::get('/mahasiswa-dashboard', 'index')->name('mhs.dashboard');
    Route::get('/mahasiswa-detail/{id}', 'detail_mahasiwa')->name('mhs.detail');
    Route::get('/krs-mahasiswa/{id}', 'krs_mahasiswa')->name('mhs.krs');
    Route::get('/aktivitas-mahasiswa/{id}', 'aktivitas_mhs')->name('mhs.activity');
    Route::get('/nilai-mhs/{id}', 'nilai_mhs')->name('mhs.grade');
    Route::get('/transkrip-mhs/{id}', 'transkrip_mhs')->name('mhs.transkrip');
    Route::get('/bimbingan-mhs/{id}', 'bimbingan_mhs')->name('mhs.guidance');
    Route::get('/perkuliahan-matakuliah', 'matakuliah')->name('admin.matakuliah');
    Route::get('/perkuliahan-kurukulum', 'kurikulum')->name('admin.kurikulum');
    Route::get('/perkuliahan-kelas', 'kelas_kuliah')->name('admin.kelas');
});

// Dosen Dashboard
Route::controller(DosenDashboardController::class)->group(function () {
    Route::get('/dosen-dashboard', 'index')->name('dosen.dashboard');
    Route::get('/dosen-detail/{id}', 'show')->name('dosen.detail');
});