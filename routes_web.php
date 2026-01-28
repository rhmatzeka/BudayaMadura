<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\GlosariumController;

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

// Homepage
Route::get('/', [HomeController::class, 'index'])->name('home');

// Produk Routes
Route::prefix('produk')->name('produk.')->group(function () {
    Route::get('/', [ProdukController::class, 'index'])->name('index');
    Route::get('/search', [ProdukController::class, 'search'])->name('search');
    Route::get('/kategori/{kategori}', [ProdukController::class, 'kategori'])->name('kategori');
    Route::get('/galeri', [ProdukController::class, 'galeri'])->name('galeri');
    Route::get('/{produk}', [ProdukController::class, 'show'])->name('show');
});

// Glossarium Routes
Route::prefix('glossarium')->name('glossarium.')->group(function () {
    Route::get('/', [GlosariumController::class, 'index'])->name('index');
    Route::get('/search', [GlosariumController::class, 'search'])->name('search');
    Route::get('/kategori/{kategori}', [GlosariumController::class, 'kategori'])->name('kategori');
});

// API Routes (opsional untuk AJAX)
Route::prefix('api')->name('api.')->group(function () {
    Route::get('/produk/search', [ProdukController::class, 'search']);
    Route::get('/glossarium/search', [GlosariumController::class, 'search']);
});
