@extends('layouts.app')

@section('title', 'Galeri Produk - E-Ensiklopedia Etnosaing Madura')

@section('content')
<div class="hero">
    <div class="container">
        <h1>Galeri Produk</h1>
        <p>Koleksi foto lengkap produk budaya Madura</p>
    </div>
</div>

<div class="container py-5">
    <div class="row">
        @forelse($produk as $item)
            @foreach($item->gambar as $gambar)
            <div class="col-md-3 mb-4">
                <div class="card h-100 overflow-hidden">
                    <img src="{{ asset('images/produk/' . $gambar->path_gambar) }}" 
                         class="card-img-top" alt="{{ $gambar->judul_gambar ?? $item->nama_produk }}"
                         style="height: 250px; object-fit: cover; cursor: pointer;"
                         data-bs-toggle="modal" data-bs-target="#imageModal"
                         onclick="setModalImage('{{ asset('images/produk/' . $gambar->path_gambar) }}', '{{ $item->nama_produk }}')">
                    <div class="card-body">
                        <h6 class="card-title">{{ $item->nama_produk }}</h6>
                        @if($gambar->deskripsi_gambar)
                            <p class="card-text small text-muted">{{ $gambar->deskripsi_gambar }}</p>
                        @endif
                    </div>
                    <div class="card-footer bg-white">
                        <a href="{{ route('produk.show', $item->slug) }}" class="btn btn-sm btn-primary">
                            Lihat Produk
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        @empty
            <div class="col-12">
                <div class="alert alert-info text-center">
                    <i class="fas fa-info-circle"></i> Tidak ada galeri yang tersedia.
                </div>
            </div>
        @endforelse
    </div>
</div>

<!-- Image Modal -->
<div class="modal fade" id="imageModal" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitle">Gambar Produk</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body text-center">
                <img id="modalImage" src="" class="img-fluid" alt="Gambar" style="max-height: 500px; object-fit: cover;">
            </div>
        </div>
    </div>
</div>

@section('extra-js')
<script>
function setModalImage(imageSrc, productName) {
    document.getElementById('modalImage').src = imageSrc;
    document.getElementById('modalTitle').textContent = productName;
}
</script>
@endsection
@endsection
