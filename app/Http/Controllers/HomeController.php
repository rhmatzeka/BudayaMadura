<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Glossarium;
use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     */
    public function index(): View
    {
        $produkTerbaru = Produk::latest()->limit(6)->get();
        $produkMakanan = Produk::where('kategori', 'Makanan')->limit(4)->get();
        $jumlahProduk = Produk::count();
        $jumlahGlosarium = Glossarium::count();

        return view('home.index', compact(
            'produkTerbaru',
            'produkMakanan',
            'jumlahProduk',
            'jumlahGlosarium'
        ));
    }

    /**
     * Show Petis Madura detail page
     */
    public function petisMadura(): View
    {
        $produk = Produk::where('slug', 'petis-madura')->firstOrFail();
        $produk->load(['gambar' => function($query) {
            $query->orderBy('urutan', 'asc');
        }, 'video', 'nilaiBudaya']);

        return view('home.petis_madura', compact('produk'));
    }
}
