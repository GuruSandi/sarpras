<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BarangKeluarController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PengembalianController;
use App\Http\Controllers\PrasaranaController;
use App\Http\Controllers\SaranaController;
use App\Http\Controllers\SebaranSarprasController;

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

Route::middleware(['guest'])->group(function () {
    Route::get('/', [AuthController::class, 'login'])->name('login');
    Route::post('/postlogin', [AuthController::class, 'postlogin'])->name('postlogin');
});
//auth
Route::middleware(['auth'])->group(function () {
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/dashboard', [MenuController::class, 'menu'])->name('menu');
    Route::get('/profile', [AuthController::class, 'profile'])->name('profile');
    Route::post('/updateprofile', [AuthController::class, 'updateprofile'])->name('updateprofile');

    //menu sarana
    Route::get('/menusarana', [SaranaController::class, 'homesarana'])->name('homesarana');
    Route::get('/tambahsarana', [SaranaController::class, 'tambahsarana'])->name('tambahsarana');
    Route::post('/posttambahsarana', [SaranaController::class, 'posttambahsarana'])->name('posttambahsarana');
    Route::get('/editsarana/{id}', [SaranaController::class, 'editsarana'])->name('editsarana');
    Route::post('/posteditsarana/{sarpras}', [SaranaController::class, 'posteditsarana'])->name('posteditsarana');
    Route::get('/hapussarana/{sarpras}', [SaranaController::class, 'hapussarana'])->name('hapussarana');
    Route::get('/detailsarana/{sarpras}', [SaranaController::class, 'detailsarana'])->name('detailsarana');
    Route::get('/exportDataSarana', [SaranaController::class, 'exportDataSarana'])->name('exportDataSarana');
    Route::get('/cetakpdf', [SaranaController::class, 'cetakpdf'])->name('cetakpdf');

    //menu prasarana
    Route::get('/menuprasarana', [PrasaranaController::class, 'homeprasarana'])->name('homeprasarana');
    Route::get('/tambahprasarana', [PrasaranaController::class, 'tambahprasarana'])->name('tambahprasarana');
    Route::post('/posttambahprasarana', [PrasaranaController::class, 'posttambahprasarana'])->name('posttambahprasarana');
    Route::get('/editprasarana/{sarpras}', [PrasaranaController::class, 'editprasarana'])->name('editprasarana');
    Route::post('/posteditprasarana/{sarpras}', [PrasaranaController::class, 'posteditprasarana'])->name('posteditprasarana');
    Route::get('/hapusprasarana/{sarpras}', [PrasaranaController::class, 'hapusprasarana'])->name('hapusprasarana');
    Route::get('/detailprasarana/{sarpras}', [PrasaranaController::class, 'detailprasarana'])->name('detailprasarana');
    Route::get('/exportDataPrasarana', [PrasaranaController::class, 'exportDataPrasarana'])->name('exportDataPrasarana');
    Route::get('/cetak-pdf', [PrasaranaController::class, 'cetakpdf'])->name('cetak-pdf');

    //input peminjaman
    Route::get('/input-peminjaman', [PeminjamanController::class, 'inputpeminjaman'])->name('inputpeminjaman');
    Route::get('/pilihbarang/{id}', [PeminjamanController::class, 'pilihbarang'])->name('pilihbarang');
    Route::post('/createpeminjaman', [PeminjamanController::class, 'createpeminjaman'])->name('createpeminjaman');
    Route::get('/editpeminjaman/{id}', [PeminjamanController::class, 'editpeminjaman'])->name('editpeminjaman');
    Route::post('/updatepeminjaman/{id}', [PeminjamanController::class, 'updatepeminjaman'])->name('updatepeminjaman');
    Route::get('/hapuspeminjaman/{id}', [PeminjamanController::class, 'hapuspeminjaman'])->name('hapuspeminjaman');
    Route::get('/laporan-peminjaman', [PeminjamanController::class, 'laporanpeminjaman'])->name('laporanpeminjaman');
    Route::get('/filter', [PeminjamanController::class, 'filter'])->name('filter');


    //inputpengembalian
    Route::get('/input-pengembalian', [PengembalianController::class, 'inputpengembalian'])->name('inputpengembalian');
    Route::get('/posteditpengembalian/{id}', [PengembalianController::class, 'posteditpengembalian'])->name('posteditpengembalian');
    Route::get('/laporan-pengembalian', [PengembalianController::class, 'laporanpengembalian'])->name('laporanpengembalian');
    Route::get('/filterkembali', [PengembalianController::class, 'filterkembali'])->name('filterkembali');

    //barangkeluar
    Route::get('/input-barangkeluar', [BarangKeluarController::class, 'inputbarangkeluar'])->name('inputbarangkeluar');
    Route::get('/pilihbarangkeluar/{id}', [BarangKeluarController::class, 'pilihbarangkeluar'])->name('pilihbarangkeluar');
    Route::post('/createbarangkeluar', [BarangKeluarController::class, 'createbarangkeluar'])->name('createbarangkeluar');
    Route::get('/editbarangkeluar/{id}', [BarangKeluarController::class, 'editbarangkeluar'])->name('editbarangkeluar');
    Route::post('/updatebarangkeluar/{id}', [BarangKeluarController::class, 'updatebarangkeluar'])->name('updatebarangkeluar');
    Route::get('/hapusbarangkeluar/{id}', [BarangKeluarController::class, 'hapusbarangkeluar'])->name('hapusbarangkeluar');
    Route::get('/laporan-barangkeluar', [BarangKeluarController::class, 'laporanbarangkeluar'])->name('laporanbarangkeluar');
    Route::get('/filterkeluar', [BarangKeluarController::class, 'filterkeluar'])->name('filterkeluar');

    //sebaransarpras
    //databelumkembali
    Route::get('/databelumkembali', [SebaranSarprasController::class, 'databelumkembali'])->name('databelumkembali');

    //datapengguna
    Route::get('/menudatapengguna', [AuthController::class, 'menudatapengguna'])->name('menudatapengguna');
    Route::get('/tambahpengguna', [AuthController::class, 'tambahpengguna'])->name('tambahpengguna');
    Route::post('/posttambahpengguna', [AuthController::class, 'posttambahpengguna'])->name('posttambahpengguna');
    Route::get('/editpengguna/{user}', [AuthController::class, 'editpengguna'])->name('editpengguna');
    Route::post('/posteditpengguna/{user}', [AuthController::class, 'posteditpengguna'])->name('posteditpengguna');
    Route::get('/hapuspengguna/{user}', [AuthController::class, 'hapuspengguna'])->name('hapuspengguna');
    Route::get('/detailpengguna/{user}', [AuthController::class, 'detailpengguna'])->name('detailpengguna');
});
