@extends('layouts.app')

@section('title', 'Daftar Isi - E-Ensiklopedia Etnosains Madura')

@section('content')
<div class="text-center mb-5">
    <h1 class="section-title-vintage">
        <i class="fas fa-list-ul me-2"></i>DAFTAR ISI
    </h1>
    <p class="lead" style="color: var(--primary-brown);">
        E-Ensiklopedia Etnosains Madura
    </p>
</div>

<div class="row">
    @foreach($halaman as $index => $item)
    <div class="col-md-6 mb-4">
        <a href="{{ route('modul.show', $item->slug) }}" class="text-decoration-none">
            <div class="card-vintage" style="cursor: pointer;">
                <div class="d-flex align-items-center">
                    <div style="width: 80px; height: 80px; background: linear-gradient(135deg, var(--primary-brown), var(--secondary-brown)); border-radius: 10px; display: flex; align-items: center; justify-content: center; margin-right: 20px;">
                        <i class="fas {{ $item->icon }} fa-2x text-white"></i>
                    </div>
                    <div class="flex-grow-1">
                        <h5 style="color: var(--primary-brown); margin-bottom: 5px;">
                            {{ $index + 1 }}. {{ $item->judul }}
                        </h5>
                        <p class="small text-muted mb-0">{{ $item->konten }}</p>
                    </div>
                    <div>
                        <i class="fas fa-chevron-right" style="color: var(--secondary-brown);"></i>
                    </div>
                </div>
            </div>
        </a>
    </div>
    @endforeach
</div>

<div class="decorative-line mt-5"></div>

<div class="text-center mt-4">
    <a href="{{ route('home') }}" class="btn-vintage">
        <i class="fas fa-home me-2"></i>Kembali ke Beranda
    </a>
</div>
@endsection