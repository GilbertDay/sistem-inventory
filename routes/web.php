<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PengajuanController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\ReparasiBarangController;
use App\Http\Controllers\Controller;

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

Route::redirect('/', 'login');
Route::get('/home', [Controller::class, 'index']);

Route::get('/dashboard',[DashboardController::class, 'index'])->name('dashboard');

Route::get('/dataBarang', [BarangController::class, 'index'])->name('dataBarang');
Route::post('/tambah-barang',[BarangController::class, 'tambahBarang'])->name('tambahBarang');
Route::post('/edit-barang',[BarangController::class, 'editBarang'])->name('editBarang');
Route::post('/hapus-barang',[BarangController::class, 'hapusBarang'])->name('hapusBarang');

Route::get('/barangMasuk', [BarangController::class, 'barangMasuk'])->name('barangMasuk');
Route::post('/tambah-barang-masuk',[BarangController::class, 'tambahBarangMasuk'])->name('tambahBarangMasuk');
Route::post('/edit-barang-masuk',[BarangController::class, 'editBarangMasuk'])->name('editBarangMasuk');
Route::post('/hapus-barang-masuk',[BarangController::class, 'hapusBarangMasuk'])->name('hapusBarangMasuk');

Route::get('/barangKeluar', [BarangController::class, 'barangKeluar'])->name('barangKeluar');
Route::post('/tambah-barang-keluar',[BarangController::class, 'tambahBarangKeluar'])->name('tambahBarangKeluar');
Route::post('/edit-barang-keluar',[BarangController::class, 'editBarangKeluar'])->name('editBarangKeluar');
Route::post('/hapus-barang-keluar',[BarangController::class, 'hapusBarangKeluar'])->name('hapusBarangKeluar');

Route::get('/users', [UserController::class, 'index'])->name('users');
Route::post('/tambah-users', [UserController::class, 'tambahUser'])->name('tambahUser');
Route::post('/edit-users', [UserController::class, 'editUser'])->name('editUser');
Route::post('/hapus-users', [UserController::class, 'hapusUser'])->name('hapusUser');

Route::get('/staffPermohonan', [PengajuanController::class, 'index'])->name('staffPermohonan');
Route::post('/tambah-permohonan', [PengajuanController::class, 'tambahPengajuan'])->name('tambahPermohonan');
Route::put('/pengajuan/{id}/accept', [PengajuanController::class, 'accept'])->name('pengajuanAccept');
Route::put('/pengajuan/{id}/reject', [PengajuanController::class, 'reject'])->name('pengajuanReject');

Route::get('/supplier', [SupplierController::class, 'index'])->name('supplier');
Route::post('/tambah-supplier', [SupplierController::class, 'tambahSupplier'])->name('tambahSupplier');

Route::get('/reparasiBarang', [ReparasiBarangController::class, 'index'])->name('reparasiBarang');
Route::post('/tambah-reparasiBarang', [ReparasiBarangController::class, 'tambahReparasiBarang'])->name('tambahReparasiBarang');

Route::get('/permohonan', [PengajuanController::class, 'index'])->name('permohonan');

Route::get('/tambah-barang', function () {
    return view('pages/staff/permohonan');
})->name('tambahBarang');

Route::get('/jenisBarang', function () {
    return view('pages/admin/jenisBarang');
})->name('jenisBarang');

Route::get('/tambah-jenis-barang', function () {
    return view('pages/staff/permohonan');
})->name('tambahJenisBarang');



Route::get('/stokOpname', function () {
    return view('pages/admin/stokOpname');
})->name('stokOpname');

Route::get('/laporanBarangMasuk', function () {
    return view('pages/admin/laporanBarangMasuk');
})->name('laporanBarangMasuk');

Route::get('/laporanBarangKeluar', function () {
    return view('pages/admin/laporanBarangKeluar');
})->name('laporanBarangKeluar');




Route::get('/peminjam', function () {
    return view('pages/admin/peminjam');
})->name('peminjam');



// Route::get('/supplier', function () {
//     return view('pages/admin/supplier');
// })->name('supplier');

// Route::get('/reparasiBarang', function () {
//     return view('pages/admin/reparasiBarang');
// })->name('reparasiBarang');

Route::get('/penghapusanBarang', function () {
    return view('pages/admin/penghapusanBarang');
})->name('penghapusanBarang');

Route::get('/staffDashboard', function () {
    return view('pages/staff/dashboard');
})->name('staffDashboard');







// Route::middleware(['auth:sanctum', 'user-access:2', 'verified'])->group(function () {
//     Route::get('/users', [UserController::class, 'index'])->name('users');
//     Route::post('/add-users', [UserController::class, 'tambahUser'])->name('addUsers');
//     Route::post('/edit-users', [UserController::class, 'editUser'])->name('editUsers');
//     Route::post('/hapus-users', [UserController::class, 'hapusUser'])->name('hapusUsers');

//     Route::get('/padukuhan', [PadukuhanController::class, 'index'])->name('padukuhan');
//     Route::post('/add-padukuhans', [PadukuhanController::class, 'tambahPadukuhan'])->name('addPadukuhans');
//     Route::post('/edit-padukuhans', [PadukuhanController::class, 'editPadukuhan'])->name('editPadukuhans');
//     Route::post('/hapus-padukuhans', [PadukuhanController::class, 'hapusPadukuhan'])->name('hapusPadukuhans');

//     Route::get('/kelompok', [KelompokController::class, 'index'])->name('kelompok');
//     Route::post('/add-kelompoks', [KelompokController::class, 'tambahKelompok'])->name('addKelompoks');
//     Route::post('/edit-kelompoks', [KelompokController::class, 'editKelompok'])->name('editKelompoks');
//     Route::post('/hapus-kelompoks', [KelompokController::class, 'hapusKelompok'])->name('hapusKelompoks');
//     Route::get('/search-user', [KelompokController::class, 'searchSiswa'])->name('searchUsers');

// });

// Route::middleware(['auth:sanctum', 'user-access:1', 'verified'])->group(function () {
//     Route::get('/cekLaporan', [LaporanController::class, 'cekLaporan'])->name('cekLaporan');
//     Route::get('/cekLogbook', [LaporanController::class, 'cekLogbook'])->name('cekLogbook');
//     Route::get('/tolakLaporan', [LaporanController::class, 'tolakLaporan'])->name('tolakLaporan');

// });

// Route::middleware(['auth:sanctum', 'user-access:0', 'verified'])->group(function () {
//     Route::get('/laporan', [LaporanController::class, 'laporan'])->name('laporan');
//     Route::post('/uploadLaporan', [LaporanController::class, 'uploadLaporan'])->name('uploadLaporan');
//     Route::get('/logbook', [LogbookController::class, 'logbook'])->name('logbook');
//     Route::post('/adddLogbook', [LogbookController::class, 'adddLogbook'])->name('adddLogbook');
// });
Route::post('/viewLaporan', [LaporanController::class, 'viewLaporan'])->name('viewLaporan');

