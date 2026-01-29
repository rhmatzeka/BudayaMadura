@extends('layouts.app')

@section('title', $halaman->judul . ' - E-Ensiklopedia Etnosains Madura')

@section('content')
<!-- Breadcrumb -->
<nav aria-label="breadcrumb" class="mb-4">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}" style="color: var(--primary-brown);">Beranda</a></li>
        <li class="breadcrumb-item"><a href="{{ route('modul.index') }}" style="color: var(--primary-brown);">Daftar Isi</a></li>
        <li class="breadcrumb-item active">{{ $halaman->judul }}</li>
    </ol>
</nav>

<!-- Content based on slug -->
@if($halaman->slug == 'sampul-depan')
    @include('modul.pages.sampul-depan')
@elseif($halaman->slug == 'identitas')
    @include('modul.pages.identitas')
@elseif($halaman->slug == 'tujuan')
    @include('modul.pages.tujuan')
@elseif($halaman->slug == 'target-pengguna')
    @include('modul.pages.target-pengguna')
@elseif($halaman->slug == 'keunggulan')
    @include('modul.pages.keunggulan')
@elseif($halaman->slug == 'petunjuk-penggunaan')
    @include('modul.pages.petunjuk-penggunaan')
@elseif($halaman->slug == 'pengenalan-etnosains')
    @include('modul.pages.pengenalan-etnosains')
@elseif($halaman->slug == 'daftar-produk')
    @include('modul.pages.daftar-produk')
@elseif($halaman->slug == 'glosarium')
    @include('modul.pages.glosarium')
@endif

<!-- Navigation -->
<div class="decorative-line mt-5"></div>

<div class="d-flex justify-content-between align-items-center mt-4">
    @if($previous)
        <a href="{{ route('modul.show', $previous->slug) }}" class="btn-vintage-outline">
            <i class="fas fa-arrow-left me-2"></i>{{ $previous->judul }}
        </a>
    @else
        <div></div>
    @endif

    <a href="{{ route('modul.index') }}" class="btn-vintage">
        <i class="fas fa-list me-2"></i>Daftar Isi
    </a>

    @if($next)
        <a href="{{ route('modul.show', $next->slug) }}" class="btn-vintage-outline">
            {{ $next->judul }}<i class="fas fa-arrow-right ms-2"></i>
        </a>
    @else
        <div></div>
    @endif
</div>
@endsection