<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataFeedController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PadukuhanController;
use App\Http\Controllers\KelompokController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\LogbookController;
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


Route::get('/dashboard', function () {
    return view('pages/admin/dashboard');
})->name('dashboard');

Route::get('/dataBarang', function () {
    return view('pages/admin/dataBarang');
})->name('dataBarang');
Route::get('/jenisBarang', function () {
    return view('pages/admin/jenisBarang');
})->name('jenisBarang');

Route::get('/barangMasuk', function () {
    return view('pages/admin/barangMasuk');
})->name('barangMasuk');
Route::get('/barangKeluar', function () {
    return view('pages/admin/barangKeluar');
})->name('barangKeluar');

Route::get('/laporanStok', function () {
    return view('pages/admin/laporanStok');
})->name('laporanStok');
Route::get('/laporanBarangMasuk', function () {
    return view('pages/admin/laporanBarangMasuk');
})->name('laporanBarangMasuk');
Route::get('/laporanBarangKeluar', function () {
    return view('pages/admin/laporanBarangKeluar');
})->name('laporanBarangKeluar');

Route::get('/users', function () {
    return view('pages/admin/users');
})->name('users');

Route::get('/peminjam', function () {
    return view('pages/admin/peminjam');
})->name('peminjam');
Route::get('/supplier', function () {
    return view('pages/admin/supplier');
})->name('supplier');

Route::get('/permohonan', function () {
    return view('pages/admin/permohonan');
})->name('permohonan');




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

