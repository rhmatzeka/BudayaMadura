@extends('layouts.app')

@section('title', 'Tentang E-Ensiklopedia - E-Ensiklopedia Etnosains Madura')

@section('content')
<div class="text-center mb-5">
    <h1 style="font-family: 'Playfair Display', serif; font-size: 2.5rem; color: var(--dark-brown);">
        <i class="fas fa-info-circle me-2"></i>TENTANG E-ENSIKLOPEDIA
    </h1>
    <p style="font-size: 1.1rem; color: var(--brown);">
        Kenali lebih dalam tentang E-Ensiklopedia Etnosains Madura
    </p>
</div>

<!-- Menu Tentang -->
<div class="row g-4">
    <div class="col-md-6">
        <a href="{{ route('tentang.tujuan') }}" class="text-decoration-none">
            <div style="background: linear-gradient(135deg, #E8F4F8 0%, #D4E8F0 100%); padding: 40px; border-radius: 20px; height: 100%; transition: transform 0.3s;" onmouseover="this.style.transform='translateY(-10px)'" onmouseout="this.style.transform='translateY(0)'">
                <div class="text-center mb-3">
                    <i class="fas fa-bullseye" style="font-size: 4rem; color: var(--brown);"></i>
                </div>
                <h3 style="color: var(--dark-brown); text-align: center; margin-bottom: 15px;">Tujuan E-Ensiklopedia</h3>
                <p style="color: #666; text-align: center;">Pelajari tujuan dan manfaat e-ensiklopedia dalam pembelajaran IPAS berbasis budaya lokal</p>
            </div>
        </a>
    </div>

    <div class="col-md-6">
        <a href="{{ route('tentang.target-pengguna') }}" class="text-decoration-none">
            <div style="background: linear-gradient(135deg, #FFE5E5 0%, #FFD4D4 100%); padding: 40px; border-radius: 20px; height: 100%; transition: transform 0.3s;" onmouseover="this.style.transform='translateY(-10px)'" onmouseout="this.style.transform='translateY(0)'">
                <div class="text-center mb-3">
                    <i class="fas fa-users" style="font-size: 4rem; color: var(--brown);"></i>
                </div>
                <h3 style="color: var(--dark-brown); text-align: center; margin-bottom: 15px;">Target Pengguna</h3>
                <p style="color: #666; text-align: center;">Siapa saja yang dapat menggunakan e-ensiklopedia ini untuk pembelajaran</p>
            </div>
        </a>
    </div>

    <div class="col-md-4">
        <a href="{{ route('tentang.keunggulan') }}" class="text-decoration-none">
            <div style="background: linear-gradient(135deg, #FFF8E7 0%, #F5E6D3 100%); padding: 40px; border-radius: 20px; height: 100%; transition: transform 0.3s;" onmouseover="this.style.transform='translateY(-10px)'" onmouseout="this.style.transform='translateY(0)'">
                <div class="text-center mb-3">
                    <i class="fas fa-star" style="font-size: 3.5rem; color: var(--brown);"></i>
                </div>
                <h4 style="color: var(--dark-brown); text-align: center; margin-bottom: 15px;">Keunggulan</h4>
                <p style="color: #666; text-align: center; font-size: 0.95rem;">Fitur dan keunggulan e-ensiklopedia</p>
            </div>
        </a>
    </div>

    <div class="col-md-4">
        <a href="{{ route('tentang.petunjuk-penggunaan') }}" class="text-decoration-none">
            <div style="background: linear-gradient(135deg, #E8FFE8 0%, #D4F0D4 100%); padding: 40px; border-radius: 20px; height: 100%; transition: transform 0.3s;" onmouseover="this.style.transform='translateY(-10px)'" onmouseout="this.style.transform='translateY(0)'">
                <div class="text-center mb-3">
                    <i class="fas fa-book-reader" style="font-size: 3.5rem; color: var(--brown);"></i>
                </div>
                <h4 style="color: var(--dark-brown); text-align: center; margin-bottom: 15px;">Petunjuk Penggunaan</h4>
                <p style="color: #666; text-align: center; font-size: 0.95rem;">Cara menggunakan e-ensiklopedia</p>
            </div>
        </a>
    </div>

    <div class="col-md-4">
        <a href="{{ route('tentang.pengenalan-etnosains') }}" class="text-decoration-none">
            <div style="background: linear-gradient(135deg, #FFE5F0 0%, #FFD4E5 100%); padding: 40px; border-radius: 20px; height: 100%; transition: transform 0.3s;" onmouseover="this.style.transform='translateY(-10px)'" onmouseout="this.style.transform='translateY(0)'">
                <div class="text-center mb-3">
                    <i class="fas fa-flask" style="font-size: 3.5rem; color: var(--brown);"></i>
                </div>
                <h4 style="color: var(--dark-brown); text-align: center; margin-bottom: 15px;">Pengenalan Etnosains</h4>
                <p style="color: #666; text-align: center; font-size: 0.95rem;">Apa itu etnosains dan manfaatnya</p>
            </div>
        </a>
    </div>
</div>

<!-- Info Box -->
<div style="margin-top: 50px; padding: 40px; background: linear-gradient(135deg, #FFF8E7 0%, #F5E6D3 100%); border-radius: 20px; border-left: 5px solid var(--brown);">
    <div class="row align-items-center">
        <div class="col-md-2 text-center">
            <i class="fas fa-lightbulb" style="font-size: 4rem; color: var(--brown);"></i>
        </div>
        <div class="col-md-10">
            <h4 style="color: var(--dark-brown); margin-bottom: 15px;">Mengapa E-Ensiklopedia Etnosains Madura?</h4>
            <p style="color: #666; line-height: 1.8; margin: 0;">
                E-Ensiklopedia ini menggabungkan pembelajaran sains dengan kearifan lokal budaya Madura. 
                Siswa tidak hanya belajar konsep IPAS, tetapi juga memahami bagaimana sains diterapkan 
                dalam kehidupan sehari-hari masyarakat Madura. Pembelajaran menjadi lebih bermakna karena 
                dekat dengan lingkungan dan budaya siswa.
            </p>
        </div>
    </div>
</div>

<!-- Navigation -->
<div class="d-flex justify-content-center mt-5">
    <a href="{{ route('home') }}" class="btn btn-primary-custom me-3">
        <i class="fas fa-home me-2"></i>Kembali ke Beranda
    </a>
    <a href="{{ route('tentang.tujuan') }}" class="btn btn-primary-custom">
        Mulai Membaca<i class="fas fa-arrow-right ms-2"></i>
    </a>
</div>
@endsection
