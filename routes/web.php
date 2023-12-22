<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CaptchaServiceController;
use App\Http\Controllers\DosenDashboardController;
use App\Http\Controllers\KelasKuliahController;
use App\Http\Controllers\KurikulumController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\MahasiswaDashboardController;
use App\Http\Controllers\MataKuliahController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\PriodeController;
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
})->name('login')->middleware('guest');




/*
|---------------------------------------------------------------------------------------|
|Captcha Route
|---------------------------------------------------------------------------------------|
*/
Route::controller(CaptchaServiceController::class)->group(function () {
    Route::get('/reload-captcha', 'reloadCaptcha')->name('reloadCaptcha');
});
/*
|-----------------------------------------/ Selesai  /----------------------------------|
*/




/*
|---------------------------------------------------------------------------------------|
|Auth Route
|---------------------------------------------------------------------------------------|
*/
Route::controller(AuthController::class)->group(function () {
    Route::get('/login-index', 'index')->name('auth.index')->middleware('guest');
    Route::post('/auth-login', 'authenticate')->name('auth.login')->middleware('guest');
    Route::get('/auth-logout', 'log_out')->name('auth.signOut')->middleware('auth');
});
/*
|-----------------------------------------/ Selesai  /----------------------------------|
*/




/*
|---------------------------------------------------------------------------------------|
|Admin Route
|---------------------------------------------------------------------------------------|
*/
Route::controller(AdminController::class)->group(function () {
    Route::get('/admin-index', 'index')->name('admin.index');
});
/*
|-----------------------------------------/ Selesai  /----------------------------------|
*/





/*
|---------------------------------------------------------------------------------------|
|Mahasiswa Route
|---------------------------------------------------------------------------------------|
*/
Route::controller(MahasiswaDashboardController::class)->group(function () {
    Route::get('/mahasiswa-dashboard', 'index')->name('mhs.dashboard');
    Route::get('/add-mahasiswa', 'tambah_mahasiswa')->name('add.mhs');
    Route::get('/mahasiswa-detail/{id}', 'detail_mahasiswa')->name('mhs.detail');
    Route::get('/krs-mahasiswa/{id}', 'krs_mahasiswa')->name('mhs.krs');
    Route::get('/aktivitas-mahasiswa/{id}', 'aktivitas_mhs')->name('mhs.activity');
    Route::get('/nilai-mhs/{id}', 'nilai_mhs')->name('mhs.grade');
    Route::get('/transkrip-mhs/{id}', 'transkrip_mhs')->name('mhs.transkrip');
    Route::get('/bimbingan-mhs/{id}', 'bimbingan_mhs')->name('mhs.guidance');
});
/*
|-----------------------------------------/ Selesai  /----------------------------------|
*/




/*
|---------------------------------------------------------------------------------------|
|MataKuliah Route
|---------------------------------------------------------------------------------------|
*/
Route::controller(MataKuliahController::class)->group(function () {
    Route::get('/perkuliahan-matakuliah', 'index')->name('admin.matakuliah');
    Route::get('/result-matakuliah', 'cari_matakuliah')->name('cari.matakuliah');
    Route::get('/add-matakuliah', 'tambah_matakuliah')->name('tambah.matakuliah');
    Route::post('/simpan-matakuliah', 'save_matakuliah')->name('save.matakuliah');
    Route::get('/edit-matakuliah/{id}', 'edit_matakuliah')->name('edit.matakuliah');
    Route::put('/update-matakuliah/{id_mk}', 'update_matakuliah')->name('update.matakuliah');
    Route::get('/delete-matakuliah/{id_mk}', 'delete_matakuliah')->name('delete.matakuliah');
    Route::get('/delete-matakuliah', 'trash_matakuliah')->name('trash.matakuliah');
    Route::get('/pdf', 'pdf')->name('pdf.matakuliah');
});
/*
|-----------------------------------------/ Selesai  /----------------------------------|
*/




/*
|---------------------------------------------------------------------------------------|
|KelasKuliah Route
|---------------------------------------------------------------------------------------|
*/
Route::controller(KelasKuliahController::class)->group(function () {
    Route::get('/perkuliahan-kelas', 'kelas_kuliah')->name('admin.kelas');
    Route::get('/add-kelas-kuliah', 'tambah_kelas_kuliah')->name('add.kelas');
    Route::post('/save-kelas-kuliah', 'simpan_kelas_kuliah')->name('save.kelasKuliah');
    Route::get('/edit-kelas-kuliah/{id}', 'edit_kelas_kuliah')->name('edit.kelasKuliah');
    Route::put('/update-kelas-kuliah/{id}', 'ubah_kelas_kuliah')->name('update.kelasKuliah');
    Route::get('/delete-kelas-kuliah/{id}', 'hapus_kelas_kuliah')->name('delete.kelasKuliah');
});
/*
|-----------------------------------------/ Selesai  /----------------------------------|
*/




/*
|---------------------------------------------------------------------------------------|
|Kurikulum Route
|---------------------------------------------------------------------------------------|
*/
Route::controller(KurikulumController::class)->group(function () {
    Route::get('/perkuliahan-kurukulum', 'index')->name('admin.kurikulum');
    Route::get('/add-kurukulum', 'tambah_kurikulum')->name('add.kurikulum');
    Route::get('/result-kurikulum', 'cari_kurikulum')->name('cari.kurikulum');
    Route::get('/edit-kurukulum/{id}', 'edit_kurikulum')->name('edit.kurikulum');
    Route::post('/update-kurukulum/{id}', 'update_kurikulum')->name('update.kurikulum');
    Route::post('/save-kurikulum', 'simpan_kurikulum')->name('save.kurikulum');
    Route::get('/view-kurikulum/{id}', 'detail_kurikulum')->name('view.kurikulum');
    Route::get('/add-matakuliah-kurikulum/{id}/{prodi}', 'tambah_mk_kurikulum')->name('add.kur.matakuliah');
    Route::post('/save-matakuliah-kurikulum/{id}/{prodi}', 'simpan_mk_kurikulum')->name('save.kur.matakuliah');
    Route::get('/delete-matakuliah-kurikulum/{id}/{id_kur}', 'hapus_mk_kurikulum')->name('delete.kur.matakuliah');
    Route::get('/pdf-kuikulum-matakuliah/{id_kur}', 'pdf')->name('pdf.kur.matakuliah');
});
/*
|-----------------------------------------/ Selesai  /----------------------------------|
*/




/*
|---------------------------------------------------------------------------------------|
|Dosen Route
|---------------------------------------------------------------------------------------|
*/
Route::controller(DosenDashboardController::class)->group(function () {
    Route::get('/dosen-dashboard', 'index')->name('dosen.dashboard');
    Route::get('/dosen-detail/{id}', 'show')->name('dosen.detail');
});
/*
|-----------------------------------------/ Selesai  /----------------------------------|
*/




/*
|---------------------------------------------------------------------------------------|
|Priode Route
|---------------------------------------------------------------------------------------|
*/
Route::controller(PriodeController::class)->group(function () {
    Route::get('/priode', 'index')->name('priode.index');
});
/*
|-----------------------------------------/ Selesai  /----------------------------------|
*/




/*
|---------------------------------------------------------------------------------------|
|Nilai Perkuliahan Route
|---------------------------------------------------------------------------------------|
*/
Route::controller(NilaiController::class)->group(function () {
    Route::get('/nilai-perkuliahan', 'index')->name('nilai.index');
});
/*
|-----------------------------------------/ Selesai  /----------------------------------|
*/





/*
|---------------------------------------------------------------------------------------|
|Log Route
|---------------------------------------------------------------------------------------|
*/
Route::controller(LogController::class)->group(function () {
    Route::get('/log-index', 'index')->name('log.index');
    Route::get('/get-logs-all', 'get_logs')->name('get.log');
    Route::get('/download-logs-all', 'download_logs')->name('download.log');
});
/*
|-----------------------------------------/ Selesai  /----------------------------------|
*/




/*
|---------------------------------------------------------------------------------------|
|Profile
|---------------------------------------------------------------------------------------|
*/
Route::get('/profile', function () {
    return view('pages.profile', [
        'page' => 'Profil Pengguna'
    ]);
})->name('profile');
/*
|-----------------------------------------/ Selesai  /----------------------------------|
*/
