<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'E-Ensiklopedia Etnosains Madura')</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --cream: #F5E6D3;
            --brown: #8B6F47;
            --dark-brown: #5D4E37;
            --light-cream: #FFF8E7;
            --accent: #D4A574;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: var(--light-cream);
            margin: 0;
            padding: 0;
        }

        /* Header dengan ilustrasi */
        .main-header {
            background: linear-gradient(135deg, #FFF8E7 0%, #F5E6D3 100%);
            padding: 20px 0;
            border-bottom: 3px solid var(--accent);
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        .logo-section {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .logo-icon {
            width: 50px;
            height: 50px;
            background: var(--brown);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.5rem;
        }

        .logo-text h1 {
            font-family: 'Playfair Display', serif;
            font-size: 1.5rem;
            color: var(--dark-brown);
            margin: 0;
            font-weight: 700;
        }

        .logo-text p {
            font-size: 0.85rem;
            color: var(--brown);
            margin: 0;
        }

        .search-box {
            background: white;
            border-radius: 25px;
            padding: 8px 20px;
            border: 2px solid var(--accent);
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .search-box input {
            border: none;
            outline: none;
            flex: 1;
            font-size: 0.9rem;
        }

        .search-box button {
            background: var(--brown);
            border: none;
            color: white;
            padding: 6px 15px;
            border-radius: 15px;
            font-size: 0.85rem;
        }

        /* Navigation */
        .main-nav {
            background: white;
            padding: 15px 0;
            box-shadow: 0 2px 5px rgba(0,0,0,0.05);
        }

        .nav-menu {
            display: flex;
            justify-content: center;
            gap: 10px;
            flex-wrap: wrap;
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .nav-menu a {
            background: var(--cream);
            color: var(--dark-brown);
            padding: 10px 20px;
            border-radius: 20px;
            text-decoration: none;
            font-weight: 500;
            font-size: 0.9rem;
            transition: all 0.3s;
            border: 2px solid transparent;
        }

        .nav-menu a:hover, .nav-menu a.active {
            background: var(--brown);
            color: white;
            border-color: var(--dark-brown);
        }

        /* Content */
        .main-content {
            background: white;
            margin: 30px auto;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.08);
            max-width: 1200px;
        }

        /* Glosarium Widget - Sebelum Footer */
        .glosarium-widget {
            background: linear-gradient(135deg, #E8F4F8 0%, #D4E8F0 100%);
            padding: 40px 0;
            margin-top: 50px;
        }

        .glosarium-widget h3 {
            font-family: 'Playfair Display', serif;
            color: var(--dark-brown);
            text-align: center;
            margin-bottom: 30px;
            font-size: 2rem;
        }

        .glosarium-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
        }

        .glosarium-item {
            background: white;
            padding: 20px;
            border-radius: 12px;
            border-left: 4px solid var(--brown);
            box-shadow: 0 3px 10px rgba(0,0,0,0.08);
            transition: transform 0.3s;
        }

        .glosarium-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.12);
        }

        .glosarium-item h5 {
            color: var(--brown);
            font-weight: 600;
            margin-bottom: 10px;
        }

        .glosarium-item p {
            color: #666;
            font-size: 0.9rem;
            margin: 0;
        }

        .glosarium-item .badge {
            background: var(--cream);
            color: var(--dark-brown);
            font-size: 0.75rem;
            padding: 4px 10px;
            border-radius: 10px;
            margin-top: 10px;
            display: inline-block;
        }

        /* Footer */
        .main-footer {
            background: linear-gradient(135deg, var(--dark-brown) 0%, #3d3226 100%);
            color: var(--cream);
            padding: 40px 0 20px;
        }

        .main-footer h5 {
            color: var(--accent);
            margin-bottom: 20px;
            font-weight: 600;
        }

        .main-footer a {
            color: var(--cream);
            text-decoration: none;
            transition: color 0.3s;
        }

        .main-footer a:hover {
            color: var(--accent);
        }

        /* Product Card */
        .product-card {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            transition: transform 0.3s;
            border: 2px solid var(--cream);
        }

        .product-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.15);
        }

        .product-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .product-card .card-body {
            padding: 20px;
        }

        .product-card h5 {
            color: var(--dark-brown);
            font-weight: 600;
            margin-bottom: 10px;
        }

        .btn-primary-custom {
            background: var(--brown);
            color: white;
            border: none;
            padding: 10px 25px;
            border-radius: 20px;
            font-weight: 500;
            transition: all 0.3s;
        }

        .btn-primary-custom:hover {
            background: var(--dark-brown);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0,0,0,0.2);
        }

        @media (max-width: 768px) {
            .logo-text h1 {
                font-size: 1.2rem;
            }
            .main-content {
                padding: 20px;
                margin: 15px;
            }
        }
    </style>
    @yield('extra-css')
</head>
<body>
    <!-- Header -->
    <header class="main-header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="logo-section">
                        <div class="logo-icon">
                            <i class="fas fa-book-open"></i>
                        </div>
                        <div class="logo-text">
                            <h1>E-ENSIKLOPEDIA ETNOSAINS MADURA</h1>
                            <p>Pembelajaran IPAS Berbasis Budaya Lokal untuk Siswa Sekolah Dasar</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="search-box">
                        <i class="fas fa-search" style="color: var(--brown);"></i>
                        <input type="text" placeholder="Cari Produk..." id="searchInput">
                        <button onclick="performSearch()">
                            <i class="fas fa-search me-1"></i> Cari
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Navigation -->
    <nav class="main-nav">
        <div class="container">
            <ul class="nav-menu">
                <li><a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">
                    <i class="fas fa-home me-1"></i> Beranda
                </a></li>
                <li><a href="{{ route('modul.index') }}" class="{{ request()->routeIs('modul.*') ? 'active' : '' }}">
                    <i class="fas fa-list me-1"></i> Daftar Isi
                </a></li>
                <li><a href="{{ route('produk.index') }}" class="{{ request()->routeIs('produk.*') ? 'active' : '' }}">
                    <i class="fas fa-box me-1"></i> Produk Budaya
                </a></li>
                <li><a href="{{ route('glossarium.index') }}" class="{{ request()->routeIs('glossarium.*') ? 'active' : '' }}">
                    <i class="fas fa-book me-1"></i> Glosarium
                </a></li>
                <li><a href="{{ route('produk.galeri') }}">
                    <i class="fas fa-images me-1"></i> Galeri
                </a></li>
            </ul>
        </div>
    </nav>

    <!-- Main Content -->
    <main>
        <div class="main-content">
            @yield('content')
        </div>
    </main>

    <!-- Glosarium Widget - Sebelum Footer -->
    <section class="glosarium-widget">
        <div class="container">
            <h3><i class="fas fa-book-reader me-2"></i>Glosarium</h3>
            <p class="text-center mb-4" style="color: var(--dark-brown);">Istilah-istilah penting dalam budaya Madura</p>
            
            <div class="glosarium-grid">
                @php
                    $glosariumItems = \App\Models\Glossarium::take(6)->get();
                @endphp
                
                @foreach($glosariumItems as $item)
                <div class="glosarium-item">
                    <h5>{{ $item->istilah }}</h5>
                    <p>{{ Str::limit($item->arti_istilah, 80) }}</p>
                    <span class="badge">{{ $item->kategori }}</span>
                </div>
                @endforeach
            </div>

            <div class="text-center mt-4">
                <a href="{{ route('glossarium.index') }}" class="btn btn-primary-custom">
                    <i class="fas fa-arrow-right me-2"></i>Lihat Semua Glosarium
                </a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="main-footer">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-4">
                    <h5><i class="fas fa-info-circle me-2"></i>Tentang</h5>
                    <p>E-Ensiklopedia Etnosains Madura adalah platform pembelajaran IPAS berbasis budaya lokal untuk siswa SD.</p>
                </div>
                <div class="col-md-4 mb-4">
                    <h5><i class="fas fa-link me-2"></i>Tautan</h5>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('home') }}"><i class="fas fa-angle-right me-2"></i>Beranda</a></li>
                        <li><a href="{{ route('modul.index') }}"><i class="fas fa-angle-right me-2"></i>Daftar Isi</a></li>
                        <li><a href="{{ route('produk.index') }}"><i class="fas fa-angle-right me-2"></i>Produk</a></li>
                        <li><a href="{{ route('glossarium.index') }}"><i class="fas fa-angle-right me-2"></i>Glosarium</a></li>
                    </ul>
                </div>
                <div class="col-md-4 mb-4">
                    <h5><i class="fas fa-users me-2"></i>Pengguna</h5>
                    <p><i class="fas fa-check me-2"></i>Siswa SD/MI</p>
                    <p><i class="fas fa-check me-2"></i>Guru IPAS</p>
                    <p><i class="fas fa-check me-2"></i>Peneliti</p>
                    <p><i class="fas fa-check me-2"></i>Masyarakat</p>
                </div>
            </div>
            <hr style="border-color: var(--accent);">
            <div class="text-center">
                <p class="mb-0">&copy; 2026 E-Ensiklopedia Etnosains Madura | Leli Lestari</p>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        function performSearch() {
            const query = document.getElementById('searchInput').value;
            if (query.trim()) {
                window.location.href = '{{ route("produk.search") }}?q=' + encodeURIComponent(query);
            }
        }

        document.getElementById('searchInput').addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                performSearch();
            }
        });
    </script>

    @yield('extra-js')
</body>
</html>