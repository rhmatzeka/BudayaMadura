<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Gambar;
use App\Models\Video;
use App\Models\NilaiBudaya;
use Illuminate\View\View;

class ProdukController extends Controller
{
    /**
     * Display a listing of the produk.
     */
    public function index(): View
    {
        $produk = Produk::paginate(12);
        return view('produk.index', compact('produk'));
    }

    /**
     * Display the specified produk with all relationships
     */
    public function show(Produk $produk): View
    {
        $produk->load(['gambar' => function($query) {
            $query->orderBy('urutan', 'asc');
        }, 'video', 'nilaiBudaya']);
        
        $produkRelated = Produk::where('kategori', $produk->kategori)
            ->where('id', '!=', $produk->id)
            ->limit(4)
            ->get();

        return view('produk.show', compact('produk', 'produkRelated'));
    }

    /**
     * Display gallery view for produk
     */
    public function galeri(): View
    {
        $produk = Produk::with(['gambar'])->get();
        return view('produk.galeri', compact('produk'));
    }

    /**
     * Search produk
     */
    public function search()
    {
        $search = request('q');
        
        if (strlen($search) < 2) {
            return view('produk.index', ['produk' => collect()]);
        }

        $produk = Produk::where('nama_produk', 'LIKE', "%{$search}%")
            ->orWhere('deskripsi', 'LIKE', "%{$search}%")
            ->orWhere('kategori', 'LIKE', "%{$search}%")
            ->paginate(12)
            ->appends(['q' => $search]);

        return view('produk.index', compact('produk', 'search'));
    }

    /**
     * Filter produk by category
     */
    public function kategori($kategori): View
    {
        $produk = Produk::where('kategori', $kategori)->paginate(12);
        return view('produk.index', compact('produk', 'kategori'));
    }
}
