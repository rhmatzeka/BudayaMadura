@extends('layouts.app')

@section('title', 'Tujuan E-Ensiklopedia - E-Ensiklopedia Etnosains Madura')

@section('content')
<!-- Header -->
<div class="text-center mb-5">
    <h1 style="font-family: 'Playfair Display', serif; font-size: 2.5rem; color: var(--dark-brown);">
        <i class="fas fa-bullseye me-2"></i>TUJUAN E-ENSIKLOPEDIA
    </h1>
    <p style="font-size: 1.1rem; color: var(--brown);">
        Mengapa E-Ensiklopedia Etnosains Madura Dikembangkan
    </p>
</div>

<!-- Tujuan Utama -->
<div style="background: linear-gradient(135deg, #E8F4F8 0%, #D4E8F0 100%); padding: 50px; border-radius: 20px; margin-bottom: 40px;">
    <div class="row align-items-center">
        <div class="col-md-8">
            <h3 style="color: var(--dark-brown); margin-bottom: 25px;">
                <i class="fas fa-target me-2"></i>Tujuan Pembelajaran
            </h3>
            <p style="font-size: 1.1rem; line-height: 2; color: #333; text-align: justify;">
                E-Ensiklopedia Etnosains Budaya Madura dikembangkan sebagai <strong>media pembelajaran IPAS</strong> yang menghubungkan sains dengan budaya lokal. Melalui e-ensiklopedia ini, siswa mempelajari produk budaya Madura sebagai sumber belajar sains yang dekat dengan kehidupan sehari-hari.
            </p>
            <p style="font-size: 1.1rem; line-height: 2; color: #333; text-align: justify;">
                Pembelajaran disajikan untuk melatih <strong>keterampilan berpikir kritis</strong> melalui kegiatan mengamati, menanya, menjelaskan, dan menarik kesimpulan. Selain itu, e-ensiklopedia ini bertujuan menumbuhkan <strong>sikap tanggung jawab siswa</strong> dalam menghargai dan menjaga kelestarian budaya serta lingkungan.
            </p>
        </div>
        <div class="col-md-4 text-center">
            <div style="background: white; padding: 30px; border-radius: 15px; box-shadow: 0 5px 20px rgba(0,0,0,0.1);">
                <i class="fas fa-graduation-cap" style="font-size: 5rem; color: var(--brown);"></i>
                <h5 style="color: var(--dark-brown); margin-top: 20px;">Pembelajaran Bermakna</h5>
            </div>
        </div>
    </div>
</div>

<!-- Ikon Tujuan -->
<div class="row g-4 mb-5">
    <div class="col-md-4">
        <div style="background: linear-gradient(135deg, #FFE5E5 0%, #FFD4D4 100%); padding: 40px; border-radius: 20px; text-align: center; height: 100%;">
            <i class="fas fa-brain" style="font-size: 4rem; color: var(--brown); margin-bottom: 20px;"></i>
            <h4 style="color: var(--dark-brown); margin-bottom: 15px;">Berpikir Kritis</h4>
            <p style="color: #666; line-height: 1.8;">
                Melatih siswa untuk mengamati, menanya, menjelaskan, dan menarik kesimpulan dari fenomena budaya dan sains
            </p>
        </div>
    </div>

    <div class="col-md-4">
        <div style="background: linear-gradient(135deg, #E8FFE8 0%, #D4F0D4 100%); padding: 40px; border-radius: 20px; text-align: center; height: 100%;">
            <i class="fas fa-hands-helping" style="font-size: 4rem; color: var(--brown); margin-bottom: 20px;"></i>
            <h4 style="color: var(--dark-brown); margin-bottom: 15px;">Sikap Tanggung Jawab</h4>
            <p style="color: #666; line-height: 1.8;">
                Menumbuhkan sikap menghargai dan menjaga kelestarian budaya lokal serta lingkungan sekitar
            </p>
        </div>
    </div>

    <div class="col-md-4">
        <div style="background: linear-gradient(135deg, #FFF8E7 0%, #F5E6D3 100%); padding: 40px; border-radius: 20px; text-align: center; height: 100%;">
            <i class="fas fa-book-open" style="font-size: 4rem; color: var(--brown); margin-bottom: 20px;"></i>
            <h4 style="color: var(--dark-brown); margin-bottom: 15px;">IPAS Berbasis Budaya</h4>
            <p style="color: #666; line-height: 1.8;">
                Mengintegrasikan Ilmu Pengetahuan Alam dan Sosial dengan kearifan lokal budaya Madura
            </p>
        </div>
    </div>
</div>

<!-- Ilustrasi Siswa Mengamati Budaya -->
<div style="background: white; padding: 50px; border-radius: 20px; box-shadow: 0 5px 20px rgba(0,0,0,0.1); margin-bottom: 40px;">
    <h3 style="color: var(--dark-brown); text-align: center; margin-bottom: 40px;">
        <i class="fas fa-eye me-2"></i>Siswa Mengamati Budaya
    </h3>
    <div class="row align-items-center">
        <div class="col-md-6">
            <div style="background: linear-gradient(135deg, #E8F4F8 0%, #D4E8F0 100%); padding: 60px; border-radius: 15px; text-align: center;">
                <i class="fas fa-users" style="font-size: 6rem; color: var(--brown); margin-bottom: 20px;"></i>
                <p style="color: var(--dark-brown); font-size: 1.2rem; font-weight: 600;">Siswa Mengamati Proses Pembuatan Batik</p>
            </div>
        </div>
        <div class="col-md-6">
            <ul style="list-style: none; padding: 0;">
                <li style="padding: 15px; margin-bottom: 15px; background: var(--light-cream); border-radius: 10px; border-left: 4px solid var(--brown);">
                    <i class="fas fa-check-circle me-2" style="color: var(--brown);"></i>
                    <strong>Mengamati:</strong> Siswa melihat langsung proses membatik
                </li>
                <li style="padding: 15px; margin-bottom: 15px; background: var(--light-cream); border-radius: 10px; border-left: 4px solid var(--brown);">
                    <i class="fas fa-check-circle me-2" style="color: var(--brown);"></i>
                    <strong>Menanya:</strong> Mengapa lilin bisa melindungi kain dari warna?
                </li>
                <li style="padding: 15px; margin-bottom: 15px; background: var(--light-cream); border-radius: 10px; border-left: 4px solid var(--brown);">
                    <i class="fas fa-check-circle me-2" style="color: var(--brown);"></i>
                    <strong>Menjelaskan:</strong> Memahami konsep perubahan wujud zat
                </li>
                <li style="padding: 15px; margin-bottom: 15px; background: var(--light-cream); border-radius: 10px; border-left: 4px solid var(--brown);">
                    <i class="fas fa-check-circle me-2" style="color: var(--brown);"></i>
                    <strong>Menyimpulkan:</strong> Sains ada dalam budaya lokal
                </li>
            </ul>
        </div>
    </div>
</div>

<!-- Manfaat Pembelajaran -->
<div style="background: linear-gradient(135deg, #FFE5F0 0%, #FFD4E5 100%); padding: 40px; border-radius: 20px; margin-bottom: 40px;">
    <h3 style="color: var(--dark-brown); text-align: center; margin-bottom: 30px;">
        <i class="fas fa-star me-2"></i>Manfaat Pembelajaran
    </h3>
    <div class="row g-3">
        <div class="col-md-6">
            <div style="background: white; padding: 25px; border-radius: 12px; height: 100%;">
                <h5 style="color: var(--brown); margin-bottom: 15px;">
                    <i class="fas fa-lightbulb me-2"></i>Pembelajaran Kontekstual
                </h5>
                <p style="color: #666; margin: 0;">
                    Siswa belajar sains melalui konteks budaya yang dekat dengan kehidupan mereka
                </p>
            </div>
        </div>
        <div class="col-md-6">
            <div style="background: white; padding: 25px; border-radius: 12px; height: 100%;">
                <h5 style="color: var(--brown); margin-bottom: 15px;">
                    <i class="fas fa-heart me-2"></i>Cinta Budaya Lokal
                </h5>
                <p style="color: #666; margin: 0;">
                    Menumbuhkan rasa bangga dan cinta terhadap budaya Madura
                </p>
            </div>
        </div>
        <div class="col-md-6">
            <div style="background: white; padding: 25px; border-radius: 12px; height: 100%;">
                <h5 style="color: var(--brown); margin-bottom: 15px;">
                    <i class="fas fa-seedling me-2"></i>Pelestarian Lingkungan
                </h5>
                <p style="color: #666; margin: 0;">
                    Memahami pentingnya menjaga kelestarian budaya dan lingkungan
                </p>
            </div>
        </div>
        <div class="col-md-6">
            <div style="background: white; padding: 25px; border-radius: 12px; height: 100%;">
                <h5 style="color: var(--brown); margin-bottom: 15px;">
                    <i class="fas fa-puzzle-piece me-2"></i>Berpikir Kritis
                </h5>
                <p style="color: #666; margin: 0;">
                    Melatih kemampuan menganalisis dan memecahkan masalah
                </p>
            </div>
        </div>
    </div>
</div>

<!-- Navigation -->
<div class="d-flex justify-content-between align-items-center mt-5">
    <a href="{{ route('tentang.index') }}" class="btn btn-primary-custom">
        <i class="fas fa-arrow-left me-2"></i>Kembali ke Tentang
    </a>

    <a href="{{ route('tentang.target-pengguna') }}" class="btn btn-primary-custom">
        Selanjutnya: Target Pengguna<i class="fas fa-arrow-right ms-2"></i>
    </a>
</div>
@endsection
