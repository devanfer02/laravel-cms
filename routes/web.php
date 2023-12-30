<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\BukuController;

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
    return view('index');
});

Route::prefix('/buku')->group(function() {
    Route::get('/', [BukuController::class, 'index']);
    Route::get('/tambah', [BukuController::class, 'create'])->name('buku.tambah.page');
    Route::post('/tambah', [BukuController::class, 'store'])->name('buku.tambah');
    Route::get('/perbarui/{buku}', [BukuController::class, 'edit'])->name('buku.perbarui.page');
    Route::put('/perbarui/{buku}', [BukuController::class, 'update'])->name('buku.perbarui');
    Route::delete('/hapus/{buku}', [BukuController::class, 'destroy'])->name('buku.hapus');
});

Route::prefix('/pegawai')->group(function() {
    Route::get('/', [PegawaiController::class, 'index']);
    Route::get('/tambah', [PegawaiController::class, 'create'])->name('pegawai.tambah.page');
    Route::post('/tambah', [PegawaiController::class, 'store'])->name('pegawai.tambah');
    Route::get('/perbarui/{pegawai}', [PegawaiController::class, 'edit'])->name('pegawai.perbarui.page');
    Route::put('/perbarui/{pegawai}', [PegawaiController::class, 'update'])->name('pegawai.perbarui');
    Route::delete('/hapus/{pegawai}', [PegawaiController::class, 'destroy'])->name('pegawai.hapus');
});
