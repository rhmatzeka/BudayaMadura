@extends('layouts.app')

@section('title', 'Daftar Produk - E-Ensiklopedia Etnosaing Madura')

@section('content')
<div class="hero">
    <div class="container">
        <h1>Produk Budaya Madura</h1>
        <p>Jelajahi koleksi lengkap produk dan kerajinan tradisional Madura</p>
    </div>
</div>

<div class="container py-5">
    <!-- Search Section -->
    <div class="search-box">
        <form action="{{ route('produk.search') }}" method="GET">
            <div class="row">
                <div class="col-md-8">
                    <input type="text" name="q" class="form-control" placeholder="Cari produk..." value="{{ request('q') }}">
                </div>
                <div class="col-md-4">
                    <button type="submit" class="btn btn-primary w-100">
                        <i class="fas fa-search"></i> Cari
                    </button>
                </div>
            </div>
        </form>
    </div>

    <!-- Filter Kategori -->
    <div class="mb-4">
        <div class="btn-group" role="group">
            <a href="{{ route('produk.index') }}" class="btn btn-outline-primary {{ !request('kategori') ? 'active' : '' }}">
                Semua
            </a>
            <a href="{{ route('produk.kategori', 'Makanan') }}" class="btn btn-outline-primary {{ request('kategori') == 'Makanan' ? 'active' : '' }}">
                Makanan
            </a>
            <a href="{{ route('produk.kategori', 'Kerajinan') }}" class="btn btn-outline-primary {{ request('kategori') == 'Kerajinan' ? 'active' : '' }}">
                Kerajinan
            </a>
            <a href="{{ route('produk.kategori', 'Tekstil') }}" class="btn btn-outline-primary {{ request('kategori') == 'Tekstil' ? 'active' : '' }}">
                Tekstil
            </a>
        </div>
    </div>

    <!-- Produk Grid -->
    <div class="row">
        @forelse($produk as $item)
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
                            @if($item->lokasi_pembuatan)
                                <span class="badge bg-info">{{ $item->lokasi_pembuatan }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="card-footer bg-white border-top-0">
                        <a href="{{ route('produk.show', $item->slug) }}" class="btn btn-primary btn-sm w-100">
                            <i class="fas fa-arrow-right"></i> Lihat Detail
                        </a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-info text-center">
                    <i class="fas fa-info-circle"></i> Tidak ada produk yang ditemukan.
                </div>
            </div>
        @endforelse
    </div>

    <!-- Pagination -->
    <div class="mt-5">
        {{ $produk->links('pagination::bootstrap-5') }}
    </div>
</div>
@endsection
