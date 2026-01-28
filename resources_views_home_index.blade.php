@extends('layouts.app')

@section('title', 'Beranda - E-Ensiklopedia Etnosaing Madura')

@section('content')
<div class="hero">
    <div class="container">
        <h1>E-Ensiklopedia Etnosaing Madura</h1>
        <p>Melestarikan Warisan Budaya Nusantara</p>
    </div>
</div>

<div class="container py-5">
    <!-- Statistics -->
    <div class="row mb-5">
        <div class="col-md-3 mb-4">
            <div class="card text-center">
                <div class="card-body">
                    <h3 class="text-primary">{{ $jumlahProduk }}</h3>
                    <p class="text-muted">Produk Budaya</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-4">
            <div class="card text-center">
                <div class="card-body">
                    <h3 class="text-primary">{{ $jumlahGlosarium }}</h3>
                    <p class="text-muted">Istilah Budaya</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-4">
            <div class="card text-center">
                <div class="card-body">
                    <h3 class="text-primary">100+</h3>
                    <p class="text-muted">Video Tutorial</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-4">
            <div class="card text-center">
                <div class="card-body">
                    <h3 class="text-primary">50+</h3>
                    <p class="text-muted">Gambar Dokumentasi</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Search Section -->
    <div class="search-box">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h4 class="mb-3">Cari Produk Budaya</h4>
                <form action="{{ route('produk.search') }}" method="GET" class="input-group input-group-lg">
                    <input type="text" name="q" class="form-control" placeholder="Ketik nama produk, makanan, atau kerajinan..." required>
                    <button class="btn btn-primary" type="submit">
                        <i class="fas fa-search"></i> Cari
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Produk Terbaru -->
    <section class="mb-5">
        <h2 class="section-title">Produk Terbaru</h2>
        <div class="row">
            @foreach($produkTerbaru as $item)
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    @if($item->gambar->count() > 0)
                        <img src="{{ asset('images/produk/' . $item->gambar->first()->path_gambar) }}" 
                             alt="{{ $item->nama_produk }}" class="card-img-top produk-image">
                    @else
                        <div class="produk-image bg-secondary d-flex align-items-center justify-content-center">
                            <i class="fas fa-image text-white" style="font-size: 3rem;"></i>
                        </div>
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->nama_produk }}</h5>
                        <p class="card-text text-muted">{{ Str::limit($item->deskripsi, 100) }}</p>
                        <div class="mb-3">
                            <span class="badge badge-kategori">{{ $item->kategori }}</span>
                        </div>
                    </div>
                    <div class="card-footer bg-white border-top-0">
                        <a href="{{ route('produk.show', $item->slug) }}" class="btn btn-primary btn-sm w-100">
                            <i class="fas fa-arrow-right"></i> Lihat Detail
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="text-center">
            <a href="{{ route('produk.index') }}" class="btn btn-outline-primary btn-lg">
                Lihat Semua Produk <i class="fas fa-arrow-right"></i>
            </a>
        </div>
    </section>

    <!-- Makanan Madura -->
    <section class="mb-5">
        <h2 class="section-title">Makanan Tradisional Madura</h2>
        <div class="row">
            @foreach($produkMakanan as $item)
            <div class="col-md-6 mb-4">
                <div class="card">
                    <div class="row g-0">
                        <div class="col-md-4">
                            @if($item->gambar->count() > 0)
                                <img src="{{ asset('images/produk/' . $item->gambar->first()->path_gambar) }}" 
                                     alt="{{ $item->nama_produk }}" class="img-fluid h-100" style="object-fit: cover;">
                            @else
                                <div class="bg-secondary h-100 d-flex align-items-center justify-content-center">
                                    <i class="fas fa-image text-white"></i>
                                </div>
                            @endif
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">{{ $item->nama_produk }}</h5>
                                <p class="card-text text-muted small">{{ Str::limit($item->deskripsi, 80) }}</p>
                                <a href="{{ route('produk.show', $item->slug) }}" class="btn btn-sm btn-primary">
                                    Selengkapnya
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>

    <!-- Quick Links -->
    <section class="mb-5">
        <div class="row">
            <div class="col-md-3 mb-3">
                <div class="card text-center">
                    <div class="card-body">
                        <i class="fas fa-image" style="font-size: 2.5rem; color: var(--primary);"></i>
                        <h5 class="mt-3">Galeri Foto</h5>
                        <p class="text-muted">Lihat koleksi foto produk budaya</p>
                        <a href="{{ route('produk.galeri') }}" class="btn btn-outline-primary btn-sm">Buka</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="card text-center">
                    <div class="card-body">
                        <i class="fas fa-video" style="font-size: 2.5rem; color: var(--primary);"></i>
                        <h5 class="mt-3">Tutorial Video</h5>
                        <p class="text-muted">Tonton cara membuat produk</p>
                        <a href="{{ route('produk.index') }}" class="btn btn-outline-primary btn-sm">Lihat</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="card text-center">
                    <div class="card-body">
                        <i class="fas fa-book" style="font-size: 2.5rem; color: var(--primary);"></i>
                        <h5 class="mt-3">Glosarium</h5>
                        <p class="text-muted">Istilah budaya Madura</p>
                        <a href="{{ route('glossarium.index') }}" class="btn btn-outline-primary btn-sm">Jelajahi</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="card text-center">
                    <div class="card-body">
                        <i class="fas fa-heart" style="font-size: 2.5rem; color: var(--primary);"></i>
                        <h5 class="mt-3">Nilai Budaya</h5>
                        <p class="text-muted">Pelajari filosofi budaya</p>
                        <a href="{{ route('produk.index') }}" class="btn btn-outline-primary btn-sm">Pelajari</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
