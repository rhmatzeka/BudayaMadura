<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\GlosariumController;
use App\Http\Controllers\ModulController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Homepage - Sampul Depan
Route::get('/', [ModulController::class, 'show'])->defaults('slug', 'sampul-depan')->name('home');

// Modul Routes - Daftar Isi
Route::get('/modul', [ModulController::class, 'index'])->name('modul.index');
Route::get('/modul/{slug}', [ModulController::class, 'show'])->name('modul.show');

// Produk Routes
Route::prefix('produk')->name('produk.')->group(function () {
    Route::get('/', [ProdukController::class, 'index'])->name('index');
    Route::get('/search', [ProdukController::class, 'search'])->name('search');
    Route::get('/kategori/{kategori}', [ProdukController::class, 'kategori'])->name('kategori');
    Route::get('/galeri', [ProdukController::class, 'galeri'])->name('galeri');
    Route::get('/{produk}', [ProdukController::class, 'show'])->name('show');
});

// Glossarium Routes - Sebagai halaman biasa dengan navigasi
Route::get('/glossarium', [GlosariumController::class, 'index'])->name('glossarium.index');
Route::get('/glossarium/{id}', [GlosariumController::class, 'show'])->name('glossarium.show');

// Tentang Routes
use App\Http\Controllers\TentangController;
Route::prefix('tentang')->name('tentang.')->group(function () {
    Route::get('/', [TentangController::class, 'index'])->name('index');
    Route::get('/tujuan', [TentangController::class, 'tujuan'])->name('tujuan');
    Route::get('/target-pengguna', [TentangController::class, 'targetPengguna'])->name('target-pengguna');
    Route::get('/keunggulan', [TentangController::class, 'keunggulan'])->name('keunggulan');
    Route::get('/petunjuk-penggunaan', [TentangController::class, 'petunjukPenggunaan'])->name('petunjuk-penggunaan');
    Route::get('/pengenalan-etnosains', [TentangController::class, 'pengenalanEtnosains'])->name('pengenalan-etnosains');
});
