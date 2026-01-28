@extends('layouts.app')

@section('title', 'Beranda - E-Ensiklopedia Etnosains Madura')

@section('content')
<!-- Hero Section dengan Ilustrasi Produk -->
<div class="text-center mb-5">
    <div class="row align-items-center">
        <div class="col-md-6">
            <h1 class="section-title-vintage">E-ENSIKLOPEDIA ETNOSAINS MADURA</h1>
            <p class="lead" style="color: var(--primary-brown); font-size: 1.1rem; line-height: 1.8;">
                Pembelajaran IPAS Berbasis Budaya Lokal untuk Siswa Sekolah Dasar
            </p>
            <div class="mt-4">
                <a href="{{ route('produk.index') }}" class="btn-vintage me-2">
                    <i class="fas fa-play-circle me-2"></i>Mulai Eksplorasi
                </a>
                <a href="{{ route('glossarium.index') }}" class="btn-vintage-outline">
                    <i class="fas fa-book me-2"></i>Buka Glosarium
                </a>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card-vintage">
                <div style="background: linear-gradient(135deg, #FFF8DC 0%, #F5DEB3 100%); padding: 30px; border-radius: 10px;">
                    <h4 style="color: var(--primary-brown); text-align: center; margin-bottom: 20px;">
                        <i class="fas fa-palette me-2"></i>Gambar Ilustrasi Kumpulan Produk Budaya
                    </h4>
                    <div style="background: white; padding: 20px; border-radius: 10px; border: 3px dashed var(--secondary-brown); min-height: 200px; display: flex; align-items: center; justify-content: center;">
                        <div class="text-center">
                            <i class="fas fa-image" style="font-size: 4rem; color: var(--secondary-brown);"></i>
                            <p class="mt-3" style="color: var(--primary-brown);">Ilustrasi Batik, Petis, Rengginang Lorjuk, Terasi</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="decorative-line"></div>

<!-- Identitas E-Ensiklopedia -->
<section class="mb-5">
    <div class="card-vintage">
        <div class="card-header-vintage">
            <h3 class="mb-0"><i class="fas fa-id-card me-2"></i>IDENTITAS E-ENSIKLOPEDIA</h3>
        </div>
        <div class="row">
            <div class="col-md-6">
                <table class="table table-borderless">
                    <tr>
                        <td width="40%"><strong><i class="fas fa-book me-2" style="color: var(--primary-brown);"></i>Judul</strong></td>
                        <td>: E-Ensiklopedia Etnosains Madura</td>
                    </tr>
                    <tr>
                        <td><strong><i class="fas fa-user me-2" style="color: var(--primary-brown);"></i>Penyusun</strong></td>
                        <td>: Leli Lestari</td>
                    </tr>
                    <tr>
                        <td><strong><i class="fas fa-calendar me-2" style="color: var(--primary-brown);"></i>Tahun</strong></td>
                        <td>: 2026</td>
                    </tr>
                    <tr>
                        <td><strong><i class="fas fa-users me-2" style="color: var(--primary-brown);"></i>Sasaran</strong></td>
                        <td>: Siswa Kelas V SD/MI</td>
                    </tr>
                </table>
            </div>
            <div class="col-md-6">
                <div class="icon-box-vintage">
                    <i class="fas fa-lightbulb"></i>
                    <h5 style="color: var(--primary-brown);">Pembelajaran Bermakna</h5>
                    <p class="small">Menghubungkan sains dengan budaya lokal</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Statistik -->
<section class="mb-5">
    <div class="row">
        <div class="col-md-3 mb-3">
            <div class="icon-box-vintage">
                <i class="fas fa-box-open"></i>
                <h3 style="color: var(--primary-brown);">{{ $jumlahProduk }}</h3>
                <p class="mb-0">Produk Budaya</p>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="icon-box-vintage">
                <i class="fas fa-book-reader"></i>
                <h3 style="color: var(--primary-brown);">{{ $jumlahGlosarium }}</h3>
                <p class="mb-0">Istilah Budaya</p>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="icon-box-vintage">
                <i class="fas fa-video"></i>
                <h3 style="color: var(--primary-brown);">100+</h3>
                <p class="mb-0">Video Tutorial</p>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="icon-box-vintage">
                <i class="fas fa-images"></i>
                <h3 style="color: var(--primary-brown);">50+</h3>
                <p class="mb-0">Dokumentasi Gambar</p>
            </div>
        </div>
    </div>
</section>

<div class="decorative-line"></div>

<!-- Pengenalan Etnosains -->
<section class="mb-5">
    <h2 class="section-title-vintage">
        <i class="fas fa-flask me-2"></i>PENGENALAN ETNOSAINS
    </h2>
    <div class="card-vintage">
        <div class="row">
            <div class="col-md-8">
                <p style="text-align: justify; line-height: 1.8;">
                    <strong>Etnosains</strong> adalah cara mempelajari sains melalui budaya dan kebiasaan masyarakat. 
                    Banyak kegiatan masyarakat yang sebenarnya mengandung konsep sains, seperti proses memasak, 
                    mengolah bahan alam, dan membuat kerajinan. Melalui etnosains, siswa belajar bahwa sains tidak 
                    hanya ada di laboratorium, tetapi juga dekat dengan kehidupan sehari-hari.
                </p>
                <p style="text-align: justify; line-height: 1.8;">
                    Materi dalam e-ensiklopedia ini mengintegrasikan <strong>Ilmu Pengetahuan Alam dan Sosial</strong>. 
                    Siswa mempelajari konsep IPA, seperti perubahan wujud, sumber daya alam, dan makhluk hidup, 
                    sekaligus memahami aspek sosial, budaya, dan ekonomi masyarakat Madura.
                </p>
            </div>
            <div class="col-md-4">
                <div class="icon-box-vintage">
                    <i class="fas fa-atom"></i>
                    <h5 style="color: var(--primary-brown);">IPAS + Budaya</h5>
                    <p class="small">Pembelajaran Terintegrasi</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Jalur Langsung -->
<section class="mb-5">
    <h2 class="section-title-vintage">
        <i class="fas fa-route me-2"></i>JALUR LANGSUNG
    </h2>
    <div class="row">
        @foreach($produkTerbaru as $item)
        <div class="col-md-6 mb-4">
            <div class="product-card-vintage">
                @if($item->gambar->count() > 0)
                    <img src="{{ asset('images/produk/' . $item->gambar->first()->path_gambar) }}" 
                         alt="{{ $item->nama_produk }}">
                @else
                    <div style="height: 250px; background: linear-gradient(135deg, #FFF8DC 0%, #F5DEB3 100%); display: flex; align-items: center; justify-content: center; border-bottom: 3px solid var(--secondary-brown);">
                        <div class="text-center">
                            <i class="fas fa-image" style="font-size: 4rem; color: var(--secondary-brown);"></i>
                            <p style="color: var(--primary-brown); margin-top: 10px;">Gambar {{ $item->nama_produk }}</p>
                        </div>
                    </div>
                @endif
                <div class="card-body">
                    <h5 style="color: var(--primary-brown); font-weight: 700;">{{ $item->nama_produk }}</h5>
                    <p style="text-align: justify;">{{ Str::limit($item->deskripsi, 120) }}</p>
                    <div class="mb-3">
                        <span class="badge-vintage">{{ $item->kategori }}</span>
                    </div>
                    <a href="{{ route('produk.show', $item->slug) }}" class="btn-vintage w-100 text-center">
                        <i class="fas fa-arrow-right me-2"></i>Mulai Eksplorasi
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>

<!-- Jalur Inkuiri -->
<section class="mb-5">
    <h2 class="section-title-vintage">
        <i class="fas fa-search me-2"></i>JALUR INKUIRI
    </h2>
    <div class="row">
        @foreach($produkMakanan as $item)
        <div class="col-md-6 mb-4">
            <div class="card-vintage">
                <div class="row g-0">
                    <div class="col-md-4">
                        @if($item->gambar->count() > 0)
                            <img src="{{ asset('images/produk/' . $item->gambar->first()->path_gambar) }}" 
                                 alt="{{ $item->nama_produk }}" 
                                 style="width: 100%; height: 100%; object-fit: cover; border-radius: 10px 0 0 10px;">
                        @else
                            <div style="height: 100%; background: linear-gradient(135deg, #FFF8DC 0%, #F5DEB3 100%); display: flex; align-items: center; justify-content: center; border-radius: 10px 0 0 10px;">
                                <i class="fas fa-utensils" style="font-size: 3rem; color: var(--secondary-brown);"></i>
                            </div>
                        @endif
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 style="color: var(--primary-brown); font-weight: 700;">{{ $item->nama_produk }}</h5>
                            <p class="small">{{ Str::limit($item->deskripsi, 100) }}</p>
                            <a href="{{ route('produk.show', $item->slug) }}" class="btn-vintage-outline btn-sm">
                                <i class="fas fa-eye me-1"></i>Lihat Detail
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>

<div class="decorative-line"></div>

<!-- Glosarium Preview -->
<section class="mb-5">
    <div class="card-vintage">
        <div class="card-header-vintage">
            <h3 class="mb-0"><i class="fas fa-book me-2"></i>GLOSARIUM</h3>
        </div>
        <div class="row">
            <div class="col-md-6">
                <h5 style="color: var(--primary-brown);">Kategori Istilah:</h5>
                <ul class="list-unstyled">
                    <li><i class="fas fa-check-circle me-2" style="color: var(--accent-gold);"></i>Istilah Budaya</li>
                    <li><i class="fas fa-check-circle me-2" style="color: var(--accent-gold);"></i>Istilah Sains</li>
                    <li><i class="fas fa-check-circle me-2" style="color: var(--accent-gold);"></i>Istilah Lokal Madura</li>
                    <li><i class="fas fa-check-circle me-2" style="color: var(--accent-gold);"></i>Konsep IPAS</li>
                </ul>
            </div>
            <div class="col-md-6">
                <div class="icon-box-vintage">
                    <i class="fas fa-language"></i>
                    <h5 style="color: var(--primary-brown);">{{ $jumlahGlosarium }} Istilah</h5>
                    <p class="small mb-3">Siap untuk dipelajari</p>
                    <a href="{{ route('glossarium.index') }}" class="btn-vintage">
                        <i class="fas fa-arrow-right me-2"></i>Kembali ke Daftar Produk
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Navigasi -->
<div class="text-center mt-5">
    <div class="d-flex justify-content-between align-items-center">
        <a href="{{ route('home') }}" class="btn-vintage-outline">
            <i class="fas fa-arrow-left me-2"></i>Kembali
        </a>
        <div>
            <span class="badge-vintage mx-2">Halaman 1</span>
            <span class="badge-vintage mx-2">Halaman 2</span>
            <span class="badge-vintage mx-2">Halaman 3</span>
        </div>
        <a href="{{ route('produk.index') }}" class="btn-vintage">
            Lanjut<i class="fas fa-arrow-right ms-2"></i>
        </a>
    </div>
</div>
@endsection