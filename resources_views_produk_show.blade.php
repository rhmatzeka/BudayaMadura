@extends('layouts.app')

@section('title', $produk->nama_produk . ' - E-Ensiklopedia Etnosaing Madura')

@section('content')
<div class="container py-5">
    <div class="row">
        <!-- Main Content -->
        <div class="col-lg-8">
            <!-- Breadcrumb -->
            <nav aria-label="breadcrumb" class="mb-4">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('produk.index') }}">Produk</a></li>
                    <li class="breadcrumb-item active">{{ $produk->nama_produk }}</li>
                </ol>
            </nav>

            <!-- Title -->
            <h1 class="mb-3">{{ $produk->nama_produk }}</h1>
            <div class="mb-4">
                <span class="badge badge-kategori">{{ $produk->kategori }}</span>
                @if($produk->lokasi_pembuatan)
                    <span class="badge bg-info"><i class="fas fa-map-marker-alt"></i> {{ $produk->lokasi_pembuatan }}</span>
                @endif
                @if($produk->nama_pembuat)
                    <span class="badge bg-warning"><i class="fas fa-user"></i> {{ $produk->nama_pembuat }}</span>
                @endif
            </div>

            <!-- Gallery -->
            @if($produk->gambar->count() > 0)
            <div class="mb-5">
                <h3 class="mb-3">Galeri Foto</h3>
                <div id="produkCarousel" class="carousel slide mb-4" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        @foreach($produk->gambar as $index => $gambar)
                        <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                            <img src="{{ asset('images/produk/' . $gambar->path_gambar) }}" 
                                 class="d-block w-100" alt="{{ $gambar->judul_gambar ?? $produk->nama_produk }}" 
                                 style="height: 400px; object-fit: cover;">
                        </div>
                        @endforeach
                    </div>
                    @if($produk->gambar->count() > 1)
                    <button class="carousel-control-prev" type="button" data-bs-target="#produkCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#produkCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </button>
                    @endif
                </div>
                <div class="row">
                    @foreach($produk->gambar as $gambar)
                    <div class="col-md-3 mb-2">
                        <img src="{{ asset('images/produk/' . $gambar->path_gambar) }}" 
                             class="img-thumbnail" alt="{{ $gambar->judul_gambar ?? $produk->nama_produk }}" 
                             style="height: 100px; object-fit: cover;">
                    </div>
                    @endforeach
                </div>
            </div>
            @endif

            <!-- Deskripsi -->
            <div class="mb-5">
                <h3 class="mb-3">Deskripsi</h3>
                <p class="lead">{{ $produk->deskripsi }}</p>
            </div>

            <!-- Proses Produksi -->
            @if($produk->proses_produksi)
            <div class="mb-5">
                <h3 class="mb-3">Proses Produksi</h3>
                <div class="alert alert-light border">
                    {{ $produk->proses_produksi }}
                </div>
            </div>
            @endif

            <!-- Manfaat Budaya -->
            @if($produk->manfaat_budaya)
            <div class="mb-5">
                <h3 class="mb-3">Manfaat & Makna Budaya</h3>
                <div class="alert alert-info">
                    <i class="fas fa-lightbulb"></i> {{ $produk->manfaat_budaya }}
                </div>
            </div>
            @endif

            <!-- Video -->
            @if($produk->video->count() > 0)
            <div class="mb-5">
                <h3 class="mb-3">Video Tutorial</h3>
                <div class="row">
                    @foreach($produk->video as $vid)
                    <div class="col-md-6 mb-4">
                        <div class="card">
                            <div class="video-container">
                                <iframe src="{{ $vid->embed_url }}" allowfullscreen></iframe>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">{{ $vid->judul_video }}</h5>
                                @if($vid->deskripsi_video)
                                    <p class="card-text text-muted small">{{ $vid->deskripsi_video }}</p>
                                @endif
                                <a href="{{ $vid->link_youtube }}" target="_blank" class="btn btn-sm btn-danger">
                                    <i class="fab fa-youtube"></i> Buka di YouTube
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif

            <!-- Nilai Budaya -->
            @if($produk->nilaiBudaya->count() > 0)
            <div class="mb-5">
                <h3 class="mb-3">Nilai & Filosofi Budaya</h3>
                <div class="row">
                    @foreach($produk->nilaiBudaya as $nilai)
                    <div class="col-md-6 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <h6 class="card-title text-primary">{{ $nilai->nama_nilai }}</h6>
                                <p class="card-text small">{{ $nilai->deskripsi_nilai }}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif
        </div>

        <!-- Sidebar -->
        <div class="col-lg-4">
            <!-- Info Card -->
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="mb-0">Informasi Produk</h5>
                </div>
                <div class="card-body">
                    @if($produk->harga)
                    <div class="mb-3">
                        <strong>Harga:</strong><br>
                        Rp {{ number_format($produk->harga, 0, ',', '.') }}
                    </div>
                    @endif
                    @if($produk->lokasi_pembuatan)
                    <div class="mb-3">
                        <strong><i class="fas fa-map-marker-alt"></i> Lokasi:</strong><br>
                        {{ $produk->lokasi_pembuatan }}
                    </div>
                    @endif
                    @if($produk->nama_pembuat)
                    <div class="mb-3">
                        <strong><i class="fas fa-user"></i> Pembuat:</strong><br>
                        {{ $produk->nama_pembuat }}
                    </div>
                    @endif
                    <div class="mb-3">
                        <strong><i class="fas fa-images"></i> Galeri:</strong><br>
                        {{ $produk->gambar->count() }} foto
                    </div>
                    @if($produk->video->count() > 0)
                    <div class="mb-3">
                        <strong><i class="fas fa-video"></i> Video:</strong><br>
                        {{ $produk->video->count() }} video
                    </div>
                    @endif
                </div>
            </div>

            <!-- Produk Terkait -->
            @if($produkRelated->count() > 0)
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Produk Terkait</h5>
                </div>
                <div class="card-body">
                    @foreach($produkRelated as $item)
                    <div class="mb-3 pb-3 border-bottom">
                        @if($item->gambar->count() > 0)
                            <img src="{{ asset('images/produk/' . $item->gambar->first()->path_gambar) }}" 
                                 class="img-fluid rounded mb-2" alt="{{ $item->nama_produk }}" style="height: 150px; object-fit: cover; width: 100%;">
                        @endif
                        <h6><a href="{{ route('produk.show', $item->slug) }}" class="text-decoration-none">{{ $item->nama_produk }}</a></h6>
                        <p class="text-muted small">{{ Str::limit($item->deskripsi, 60) }}</p>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif

            <!-- Share -->
            <div class="card mt-4">
                <div class="card-body text-center">
                    <h6 class="mb-3">Bagikan</h6>
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ url()->current() }}" target="_blank" class="btn btn-sm btn-primary">
                        <i class="fab fa-facebook"></i>
                    </a>
                    <a href="https://twitter.com/intent/tweet?url={{ url()->current() }}&text={{ $produk->nama_produk }}" target="_blank" class="btn btn-sm btn-info">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="https://wa.me/?text={{ url()->current() }}" target="_blank" class="btn btn-sm btn-success">
                        <i class="fab fa-whatsapp"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
