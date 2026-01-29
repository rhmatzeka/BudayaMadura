@extends('layouts.app')

@section('title', 'Glosarium - ' . ($item ? $item->istilah : 'E-Ensiklopedia Etnosains Madura'))

@section('content')
@if($item)
<div class="text-center mb-4">
    <h1 style="font-family: 'Playfair Display', serif; font-size: 2.5rem; color: var(--dark-brown);">
        <i class="fas fa-book-reader me-2"></i>GLOSARIUM
    </h1>
    <p style="color: var(--brown); font-size: 1.1rem;">
        Istilah {{ $currentIndex + 1 }} dari {{ $allItems->count() }}
    </p>
</div>

<!-- Card Glosarium -->
<div style="background: linear-gradient(135deg, #E8F4F8 0%, #D4E8F0 100%); padding: 50px; border-radius: 20px; margin-bottom: 40px;">
    <div class="text-center mb-4">
        <span style="background: var(--brown); color: white; padding: 8px 20px; border-radius: 20px; font-size: 0.9rem; font-weight: 600;">
            {{ $item->kategori }}
        </span>
    </div>
    
    <h2 style="font-family: 'Playfair Display', serif; font-size: 2.5rem; color: var(--dark-brown); text-align: center; margin-bottom: 30px;">
        {{ $item->istilah }}
    </h2>
    
    <div style="background: white; padding: 30px; border-radius: 15px; margin-bottom: 30px;">
        <h4 style="color: var(--brown); margin-bottom: 15px;">
            <i class="fas fa-info-circle me-2"></i>Arti
        </h4>
        <p style="font-size: 1.2rem; line-height: 1.8; color: #333;">
            {{ $item->arti_istilah }}
        </p>
    </div>
    
    @if($item->penjelasan_lengkap)
    <div style="background: white; padding: 30px; border-radius: 15px;">
        <h4 style="color: var(--brown); margin-bottom: 15px;">
            <i class="fas fa-book-open me-2"></i>Penjelasan Lengkap
        </h4>
        <p style="font-size: 1.1rem; line-height: 1.8; color: #555; text-align: justify;">
            {{ $item->penjelasan_lengkap }}
        </p>
    </div>
    @endif
</div>

<!-- Navigasi Next/Back -->
<div class="d-flex justify-content-between align-items-center mb-4">
    @if($previous)
        <a href="{{ route('glossarium.show', $previous->id) }}" class="btn btn-primary-custom">
            <i class="fas fa-arrow-left me-2"></i>Sebelumnya: {{ Str::limit($previous->istilah, 20) }}
        </a>
    @else
        <div></div>
    @endif

    <a href="{{ route('modul.index') }}" class="btn btn-primary-custom" style="background: var(--accent);">
        <i class="fas fa-list me-2"></i>Daftar Isi
    </a>

    @if($next)
        <a href="{{ route('glossarium.show', $next->id) }}" class="btn btn-primary-custom">
            Selanjutnya: {{ Str::limit($next->istilah, 20) }}<i class="fas fa-arrow-right ms-2"></i>
        </a>
    @else
        <div></div>
    @endif
</div>

<!-- Daftar Semua Glosarium -->
<div style="background: linear-gradient(135deg, #FFF8E7 0%, #F5E6D3 100%); padding: 30px; border-radius: 15px;">
    <h4 style="color: var(--dark-brown); margin-bottom: 20px; text-align: center;">
        <i class="fas fa-list me-2"></i>Daftar Semua Istilah
    </h4>
    <div class="row g-2">
        @foreach($allItems as $index => $glossarium)
        <div class="col-md-3 col-6">
            <a href="{{ route('glossarium.show', $glossarium->id) }}" 
               class="btn w-100 {{ $glossarium->id == $item->id ? 'btn-primary-custom' : 'btn-outline-secondary' }}"
               style="padding: 10px; font-size: 0.9rem;">
                {{ $index + 1 }}. {{ Str::limit($glossarium->istilah, 15) }}
            </a>
        </div>
        @endforeach
    </div>
</div>

@else
<div class="text-center">
    <h2>Belum ada data glosarium</h2>
    <a href="{{ route('home') }}" class="btn btn-primary-custom mt-3">
        <i class="fas fa-home me-2"></i>Kembali ke Beranda
    </a>
</div>
@endif
@endsection