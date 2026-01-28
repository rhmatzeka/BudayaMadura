<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'E-Ensiklopedia Etnosaing Madura')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #8B4513;
            --secondary: #D4A574;
            --light: #F5DEB3;
            --dark: #3E2723;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #fafafa;
        }

        .navbar {
            background: linear-gradient(135deg, var(--primary) 0%, #6B3410 100%);
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .navbar-brand {
            font-weight: 700;
            font-size: 1.5rem;
            letter-spacing: 1px;
        }

        .nav-link {
            transition: all 0.3s ease;
            margin: 0 5px;
        }

        .nav-link:hover {
            color: var(--light) !important;
            transform: translateY(-2px);
        }

        .hero {
            background: linear-gradient(135deg, var(--primary) 0%, #6B3410 100%);
            color: white;
            padding: 60px 0;
            text-align: center;
        }

        .hero h1 {
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 20px;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
        }

        .hero p {
            font-size: 1.2rem;
            margin-bottom: 0;
        }

        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            overflow: hidden;
        }

        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 16px rgba(0,0,0,0.2);
        }

        .card-header {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            border: none;
            color: white;
        }

        .btn-primary {
            background-color: var(--primary);
            border-color: var(--primary);
        }

        .btn-primary:hover {
            background-color: #6B3410;
            border-color: #6B3410;
        }

        .badge-kategori {
            background-color: var(--secondary);
            color: var(--dark);
        }

        .footer {
            background-color: var(--dark);
            color: white;
            padding: 40px 0;
            margin-top: 60px;
        }

        .section-title {
            color: var(--primary);
            font-weight: 700;
            margin-bottom: 30px;
            padding-bottom: 15px;
            border-bottom: 3px solid var(--secondary);
        }

        .produk-image {
            height: 250px;
            object-fit: cover;
            overflow: hidden;
        }

        .video-container {
            position: relative;
            width: 100%;
            padding-bottom: 56.25%;
            height: 0;
            overflow: hidden;
            margin-bottom: 20px;
        }

        .video-container iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border: none;
        }

        .glossarium-item {
            padding: 20px;
            margin-bottom: 15px;
            background: white;
            border-left: 4px solid var(--primary);
            border-radius: 5px;
        }

        .glossarium-item strong {
            color: var(--primary);
            font-size: 1.1rem;
        }

        .search-box {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            margin-bottom: 30px;
        }

        @media (max-width: 768px) {
            .hero h1 {
                font-size: 2rem;
            }
        }
    </style>
    @yield('extra-css')
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">
                <i class="fas fa-book-open"></i> E-Ensiklopedia Madura
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('produk.index') }}">Produk</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('produk.galeri') }}">Galeri</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('glossarium.index') }}">Glosarium</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    @yield('content')

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h5><i class="fas fa-info-circle"></i> Tentang</h5>
                    <p>E-Ensiklopedia Etnosaing Madura adalah platform pembelajaran tentang kekayaan budaya Madura.</p>
                </div>
                <div class="col-md-4">
                    <h5><i class="fas fa-link"></i> Tautan Cepat</h5>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('produk.index') }}" class="text-light text-decoration-none">Daftar Produk</a></li>
                        <li><a href="{{ route('glossarium.index') }}" class="text-light text-decoration-none">Glosarium</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5><i class="fas fa-envelope"></i> Kontak</h5>
                    <p>
                        <i class="fas fa-phone"></i> +62 XXX XXXX XXXX<br>
                        <i class="fas fa-envelope"></i> info@ensiklopedia.id
                    </p>
                </div>
            </div>
            <hr class="bg-secondary">
            <div class="text-center">
                <p>&copy; 2024 E-Ensiklopedia Etnosaing Madura. Semua hak dilindungi.</p>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @yield('extra-js')
</body>
</html>
