<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pink Residence - Kost Eksklusif & Modern</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    
    <!-- AOS Animation -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    
    <!-- Custom CSS -->
    <style>
        :root {
            --pink-primary: #FF6B9D;
            --pink-secondary: #C44569;
            --pink-light: #FFE0EC;
            --pink-dark: #A6385C;
            --text-dark: #2D3436;
            --text-light: #636E72;
            --navbar-height: 80px;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: var(--text-dark);
            line-height: 1.6;
            overflow-x: hidden;
        }

        /* Navbar */
        .navbar {
            background-color: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
            padding: 15px 0;
            height: var(--navbar-height);
        }

        .navbar-brand {
            font-weight: bold;
            color: var(--pink-primary) !important;
            font-size: 1.5rem;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .nav-link {
            color: var(--text-dark) !important;
            font-weight: 500;
            margin: 0 10px;
            transition: color 0.3s ease;
            position: relative;
        }

        .nav-link::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 0;
            height: 2px;
            background-color: var(--pink-primary);
            transition: width 0.3s ease;
        }

        .nav-link:hover::after {
            width: 100%;
        }

        .btn-pink {
            background-color: var(--pink-primary);
            color: white;
            border: none;
            padding: 12px 30px;
            border-radius: 25px;
            font-weight: 600;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
        }

        .btn-pink:hover {
            background-color: var(--pink-secondary);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(255, 107, 157, 0.3);
            text-decoration: none;
        }

        /* Hero Section with Carousel */
        .hero-section {
            position: relative;
            min-height: 100vh;
            overflow: hidden;
        }

        .carousel-item {
            height: 100vh;
            min-height: 600px;
        }

        .carousel-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .carousel-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(0,0,0,0.7) 0%, rgba(255, 107, 157, 0.4) 100%);
        }

        .carousel-caption {
            bottom: 50%;
            transform: translateY(50%);
            text-align: left;
            left: 10%;
            right: 10%;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
        }

        .carousel-caption h1 {
            font-size: clamp(2rem, 5vw, 3.5rem);
            font-weight: bold;
            margin-bottom: 20px;
            line-height: 1.2;
        }

        .carousel-caption h1 span {
            color: var(--pink-primary);
        }

        .carousel-caption .subtitle {
            font-size: clamp(1rem, 3vw, 1.3rem);
            margin-bottom: 30px;
            opacity: 0.95;
        }

        .carousel-indicators {
            bottom: 30px;
        }

        .carousel-indicators button {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            margin: 0 5px;
            background-color: rgba(255, 255, 255, 0.5);
            border: none;
            transition: all 0.3s ease;
        }

        .carousel-indicators button.active {
            background-color: var(--pink-primary);
            width: 30px;
            border-radius: 15px;
        }

        .carousel-control-prev,
        .carousel-control-next {
            width: 5%;
            opacity: 0.7;
            transition: opacity 0.3s ease;
        }

        .carousel-control-prev:hover,
        .carousel-control-next:hover {
            opacity: 1;
        }

        .carousel-control-prev-icon,
        .carousel-control-next-icon {
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 50%;
            padding: 20px;
            background-size: 50% 50%;
        }

        /* Mobile Hero Content */
        .mobile-hero-content {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            z-index: 15;
            background: linear-gradient(to top, 
                rgba(0,0,0,0.95) 0%, 
                rgba(0,0,0,0.7) 30%, 
                rgba(0,0,0,0.4) 60%, 
                transparent 100%
            );
            padding: 60px 20px 80px;
            border-radius: 0 0 20px 20px;
            display: none;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            min-height: 50vh;
            margin-bottom: -50px;
        }

        .mobile-hero-content h1 {
            font-size: clamp(1.8rem, 6vw, 2.5rem);
            font-weight: bold;
            margin-bottom: 15px;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
        }

        .mobile-hero-content .subtitle {
            font-size: clamp(0.9rem, 3vw, 1.1rem);
            margin-bottom: 25px;
            opacity: 0.95;
            text-shadow: 1px 1px 2px rgba(0,0,0,0.5);
        }

        .mobile-hero-content .btn-group {
            display: flex;
            flex-direction: column;
            gap: 10px;
            width: 100%;
            max-width: 300px;
        }

        /* Info Cards Section */
        .info-cards-section {
            background-color: #f8f9fa;
            padding: 80px 0;
            position: relative;
            z-index: 10;
            margin-top: -30px;
        }

        .info-card {
            background: white;
            border-radius: 15px;
            padding: 30px;
            text-align: center;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
            height: 100%;
            border: 2px solid transparent;
        }

        .info-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(0,0,0,0.15);
            border-color: var(--pink-primary);
        }

        .info-card i {
            font-size: clamp(2rem, 5vw, 3rem);
            color: var(--pink-primary);
            margin-bottom: 20px;
        }

        .info-card h5 {
            font-size: clamp(1.1rem, 3vw, 1.3rem);
            font-weight: bold;
            margin-bottom: 10px;
        }

        .info-card p {
            color: var(--text-light);
            margin-bottom: 0;
            font-size: clamp(0.9rem, 2vw, 1rem);
        }

        /* About Section */
        .about-section {
            padding: clamp(60px, 10vw, 100px) 0;
            background-color: white;
        }

        .section-title {
            font-size: clamp(1.8rem, 5vw, 2.5rem);
            font-weight: bold;
            color: var(--text-dark);
            margin-bottom: 20px;
            position: relative;
            display: inline-block;
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 0;
            width: 50px;
            height: 3px;
            background-color: var(--pink-primary);
        }

        .section-subtitle {
            color: var(--text-light);
            font-size: clamp(1rem, 2.5vw, 1.1rem);
            margin-bottom: 40px;
        }

        .about-image-container {
            position: relative;
            overflow: hidden;
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.1);
            margin-bottom: 30px;
        }

        .about-image-container img {
            width: 100%;
            height: auto;
            display: block;
            transition: transform 0.3s ease;
        }

        .about-image-container:hover img {
            transform: scale(1.05);
        }

        .about-image-container::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, var(--pink-primary) 0%, transparent 70%);
            opacity: 0.1;
            border-radius: 20px;
        }

        .about-content {
            padding: 20px 0;
        }

        .about-content p {
            font-size: clamp(0.95rem, 2vw, 1.1rem);
            line-height: 1.8;
            margin-bottom: 20px;
            color: var(--text-light);
        }

        .feature-list {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-top: 30px;
        }

        .feature-item {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 15px;
            background: var(--pink-light);
            border-radius: 10px;
            transition: all 0.3s ease;
        }

        .feature-item:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(255, 107, 157, 0.2);
        }

        .feature-item i {
            color: var(--pink-primary);
            font-size: clamp(1.2rem, 3vw, 1.5rem);
        }

        .feature-item span {
            font-size: clamp(0.9rem, 2vw, 1rem);
            font-weight: 500;
        }

        /* Room Types Section */
        .room-types-section {
            padding: clamp(60px, 10vw, 80px) 0;
            background-color: var(--pink-light);
        }

        .room-card {
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
            height: 100%;
            border: 2px solid transparent;
        }

        .room-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.15);
            border-color: var(--pink-primary);
        }

        .room-card img {
            width: 100%;
            height: 250px;
            object-fit: cover;
        }

        .room-content {
            padding: 30px;
        }

        .room-type {
            color: var(--pink-primary);
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.9rem;
            letter-spacing: 1px;
        }

        .room-name {
            font-size: 1.5rem;
            font-weight: bold;
            margin: 10px 0;
        }

        .room-price {
            font-size: 2rem;
            font-weight: bold;
            color: var(--pink-primary);
            margin: 20px 0;
        }

        .room-features {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            margin: 20px 0;
        }

        .room-feature {
            display: flex;
            align-items: center;
            gap: 8px;
            color: var(--text-light);
            font-size: 0.95rem;
        }

        .room-feature i {
            color: var(--pink-primary);
        }

        /* Facilities Section */
        .facilities-section {
            padding: clamp(60px, 10vw, 80px) 0;
            background-color: white;
        }

        .facility-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 30px;
        }

        .facility-item {
            background: var(--pink-light);
            border-radius: 15px;
            padding: 30px;
            text-align: center;
            transition: all 0.3s ease;
            height: 100%;
        }

        .facility-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.1);
        }

        .facility-icon {
            width: 80px;
            height: 80px;
            background: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            font-size: 2.5rem;
            color: var(--pink-primary);
        }

        /* Gallery Section */
        .gallery-section {
            padding: clamp(60px, 10vw, 80px) 0;
            background-color: #f8f9fa;
        }

        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
        }

        .gallery-item {
            position: relative;
            border-radius: 15px;
            overflow: hidden;
            cursor: pointer;
            transition: all 0.3s ease;
            height: 250px;
        }

        .gallery-item:hover {
            transform: scale(1.05);
            box-shadow: 0 15px 30px rgba(0,0,0,0.2);
        }

        .gallery-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: all 0.3s ease;
        }

        .gallery-item:hover img {
            transform: scale(1.1);
        }

        .gallery-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(255, 107, 157, 0.8);
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .gallery-item:hover .gallery-overlay {
            opacity: 1;
        }

        /* Location Section */
        .location-section {
            padding: clamp(60px, 10vw, 80px) 0;
            background-color: white;
        }

        .map-container {
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            height: 400px;
        }

        .location-list {
            list-style: none;
            padding: 0;
        }

        .location-list li {
            padding: 15px 0;
            border-bottom: 1px solid #eee;
            display: flex;
            align-items: center;
            gap: 10px;
            transition: all 0.3s ease;
        }

        .location-list li:hover {
            padding-left: 10px;
        }

        .location-list li:last-child {
            border-bottom: none;
        }

        .location-list i {
            color: var(--pink-primary);
            font-size: 1.2rem;
        }

        /* Contact CTA */
        .contact-cta {
            background: linear-gradient(135deg, var(--pink-primary) 0%, var(--pink-secondary) 100%);
            padding: clamp(60px, 10vw, 80px) 0;
            color: white;
            text-align: center;
        }

        .contact-cta h2 {
            font-size: clamp(1.8rem, 5vw, 2.5rem);
            margin-bottom: 20px;
        }

        .contact-cta p {
            font-size: clamp(1rem, 3vw, 1.2rem);
            margin-bottom: 30px;
            opacity: 0.9;
        }

        .btn-white {
            background: white;
            color: var(--pink-primary);
            border: none;
            padding: 15px 40px;
            border-radius: 25px;
            font-weight: 600;
            font-size: 1.1rem;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
        }

        .btn-white:hover {
            background: var(--pink-light);
            color: var(--pink-primary);
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.2);
            text-decoration: none;
        }

        /* Footer */
        footer {
            background-color: var(--text-dark);
            color: white;
            padding: 50px 0 20px;
        }

        .footer-widget h5 {
            color: var(--pink-primary);
            margin-bottom: 20px;
            font-size: 1.2rem;
        }

        .contact-info {
            list-style: none;
            padding: 0;
        }

        .contact-info li {
            margin-bottom: 15px;
            display: flex;
            align-items: flex-start;
            gap: 10px;
        }

        .contact-info i {
            color: var(--pink-primary);
            font-size: 1.2rem;
            margin-top: 3px;
        }

        .social-links {
            display: flex;
            gap: 15px;
            margin-top: 20px;
        }

        .social-links a {
            width: 40px;
            height: 40px;
            background: var(--pink-primary);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            transition: all 0.3s ease;
            text-decoration: none;
        }

        .social-links a:hover {
            background: var(--pink-secondary);
            transform: translateY(-3px);
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .carousel-caption {
                display: none !important;
            }
            
            .carousel-indicators {
                bottom: 120px;
            }
            
            .mobile-hero-content {
                display: flex !important;
            }
            
            .about-section .row {
                flex-direction: column-reverse;
            }
            
            .about-image-container {
                margin-bottom: 30px;
            }
            
            .feature-list {
                grid-template-columns: 1fr 1fr;
                gap: 15px;
            }
            
            .navbar-nav {
                text-align: center;
                padding: 20px 0;
            }
            
            .btn-pink {
                margin-top: 10px;
                width: 100%;
                max-width: 250px;
            }
            
            .info-cards-section {
                margin-top: -50px;
                padding-top: 100px;
            }
        }

        @media (max-width: 576px) {
            .carousel-control-prev,
            .carousel-control-next {
                width: 10%;
            }
            
            .carousel-indicators button {
                width: 8px;
                height: 8px;
            }
            
            .carousel-indicators button.active {
                width: 20px;
            }
            
            .feature-list {
                grid-template-columns: 1fr;
            }
            
            .room-price {
                font-size: 1.5rem;
            }
            
            .section-title {
                font-size: 1.6rem;
            }
            
            .section-title::after {
                width: 40px;
                height: 2px;
            }
            
            .navbar {
                padding: 10px 0;
                height: 70px;
            }
            
            :root {
                --navbar-height: 70px;
            }
            
            .mobile-hero-content {
                min-height: 60vh;
                margin-bottom: -70px;
                padding: 80px 20px 100px;
            }
            
            .info-cards-section {
                margin-top: -50px;
                padding-top: 120px;
            }
        }

        /* Utility Classes */
        .text-pink {
            color: var(--pink-primary);
        }

        .bg-pink-light {
            background-color: var(--pink-light);
        }

        .shadow-custom {
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }

        .transition-all {
            transition: all 0.3s ease;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#home">
                <i class="bi bi-house-heart-fill"></i>
                Pink Residence
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#home">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">Tentang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#rooms">Tipe Kamar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#facilities">Fasilitas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#gallery">Galeri</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#location">Lokasi</a>
                    </li>
                    <li class="nav-item">
                        <a href="registrasi.html" class="btn btn-pink ms-3">Registrasi</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="home" class="hero-section">
        <div class="container-fluid p-0">
            <!-- Carousel -->
            <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel">
                <!-- Indicators -->
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="0" class="active"></button>
                    <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="1"></button>
                    <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="2"></button>
                    <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="3"></button>
                </div>
                
                <!-- Carousel Inner -->
                <div class="carousel-inner">
                    <!-- Slide 1 -->
                    <div class="carousel-item active">
                        <img src="https://picsum.photos/seed/kost1/1920/800" class="d-block w-100" alt="Pink Residence 1">
                        <div class="carousel-overlay"></div>
                        <div class="carousel-caption d-none d-md-block">
                            <div class="hero-content">
                                <h1 data-aos="fade-right">Selamat Datang di <span>Pink Residence</span></h1>
                                <p class="subtitle" data-aos="fade-right" data-aos-delay="200">Hunian modern dan nyaman dengan fasilitas lengkap</p>
                                <div data-aos="fade-right" data-aos-delay="400">
                                    <a href="#rooms" class="btn btn-pink btn-lg me-3">Lihat Kamar Tersedia</a>
                                    <a href="#gallery" class="btn btn-outline-light btn-lg">Virtual Tour</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Slide 2 -->
                    <div class="carousel-item">
                        <img src="https://picsum.photos/seed/kost2/1920/800" class="d-block w-100" alt="Pink Residence 2">
                        <div class="carousel-overlay"></div>
                        <div class="carousel-caption d-none d-md-block">
                            <div class="hero-content">
                                <h1 data-aos="fade-right">Fasilitas <span>Lengkap</span></h1>
                                <p class="subtitle" data-aos="fade-right" data-aos-delay="200">WiFi gratis, AC, laundry, dan keamanan 24 jam</p>
                                <div data-aos="fade-right" data-aos-delay="400">
                                    <a href="#facilities" class="btn btn-pink btn-lg me-3">Lihat Fasilitas</a>
                                    <a href="#contact" class="btn btn-outline-light btn-lg">Hubungi Kami</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Slide 3 -->
                    <div class="carousel-item">
                        <img src="https://picsum.photos/seed/kost3/1920/800" class="d-block w-100" alt="Pink Residence 3">
                        <div class="carousel-overlay"></div>
                        <div class="carousel-caption d-none d-md-block">
                            <div class="hero-content">
                                <h1 data-aos="fade-right">Lokasi <span>Strategis</span></h1>
                                <p class="subtitle" data-aos="fade-right" data-aos-delay="200">Dekat kampus, perkantoran, dan transportasi publik</p>
                                <div data-aos="fade-right" data-aos-delay="400">
                                    <a href="#location" class="btn btn-pink btn-lg me-3">Lihat Lokasi</a>
                                    <a href="#rooms" class="btn btn-outline-light btn-lg">Pesan Sekarang</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Slide 4 -->
                    <div class="carousel-item">
                        <img src="https://picsum.photos/seed/kost4/1920/800" class="d-block w-100" alt="Pink Residence 4">
                        <div class="carousel-overlay"></div>
                        <div class="carousel-caption d-none d-md-block">
                            <div class="hero-content">
                                <h1 data-aos="fade-right">Harga <span>Terjangkau</span></h1>
                                <p class="subtitle" data-aos="fade-right" data-aos-delay="200">Mulai dari Rp 900.000/bulan dengan fasilitas premium</p>
                                <div data-aos="fade-right" data-aos-delay="400">
                                    <a href="#rooms" class="btn btn-pink btn-lg me-3">Lihat Harga</a>
                                    <a href="#contact" class="btn btn-outline-light btn-lg">Konsultasi Gratis</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Controls -->
                <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
        
        <!-- Mobile Hero Content -->
        <div class="mobile-hero-content d-md-none">
            <div class="hero-text">
                <h1 data-aos="fade-up">Pink Residence</h1>
                <p class="subtitle" data-aos="fade-up" data-aos-delay="200">Hunian modern & nyaman</p>
                <div class="btn-group" data-aos="fade-up" data-aos-delay="400">
                    <a href="#rooms" class="btn btn-pink btn-lg w-100">Lihat Kamar</a>
                    <a href="#contact" class="btn btn-outline-light btn-lg w-100">Hubungi</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Info Cards Section -->
    <section class="info-cards-section">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="info-card">
                        <i class="bi bi-building"></i>
                        <h5>20+ Kamar</h5>
                        <p>Tersedia berbagai tipe kamar dengan desain modern</p>
                    </div>
                </div>
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="info-card">
                        <i class="bi bi-geo-alt"></i>
                        <h5>Lokasi Strategis</h5>
                        <p>Dekat kampus, perkantoran, dan fasilitas umum</p>
                    </div>
                </div>
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="info-card">
                        <i class="bi bi-shield-check"></i>
                        <h5>Aman 24 Jam</h5>
                        <p>Sistem keamanan CCTV dan petugas keamanan</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="about-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6" data-aos="fade-right">
                    <div class="about-image-container">
                        <img src="https://picsum.photos/seed/about/600/400" alt="About Pink Residence">
                    </div>
                </div>
                <div class="col-lg-6" data-aos="fade-left">
                    <div class="about-content">
                        <h2 class="section-title">Tentang Pink Residence</h2>
                        <p class="section-subtitle">Hunian idaman untuk mahasiswa dan profesional muda</p>
                        <p>Pink Residence adalah kost eksklusif yang dirancang khusus untuk memberikan kenyamanan maksimal bagi penghuninya. Dengan desain modern dan fasilitas lengkap, kami berkomitmen untuk menjadi pilihan terbaik tempat tinggal Anda.</p>
                        <p>Terletak di lokasi yang sangat strategis, Pink Residence memberikan kemudahan akses ke berbagai fasilitas umum seperti kampus, perkantoran, pusat perbelanjaan, dan transportasi publik.</p>
                        <div class="feature-list">
                            <div class="feature-item">
                                <i class="bi bi-check-circle-fill"></i>
                                <span>Free WiFi</span>
                            </div>
                            <div class="feature-item">
                                <i class="bi bi-check-circle-fill"></i>
                                <span>Cleaning Service</span>
                            </div>
                            <div class="feature-item">
                                <i class="bi bi-check-circle-fill"></i>
                                <span>Laundry</span>
                            </div>
                            <div class="feature-item">
                                <i class="bi bi-check-circle-fill"></i>
                                <span>Parkir Motor</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Room Types Section -->
    <section id="rooms" class="room-types-section">
        <div class="container">
            <div class="text-center mb-5" data-aos="fade-up">
                <h2 class="section-title">Tipe Kamar</h2>
                <p class="section-subtitle">Pilih kamar sesuai kebutuhan dan budget Anda</p>
            </div>
            <div class="row g-4">
                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="room-card">
                        <img src="https://picsum.photos/seed/standard/400/250" alt="Standard Room">
                        <div class="room-content">
                            <div class="room-type">Standard</div>
                            <h3 class="room-name">Kamar Standard</h3>
                            <p class="text-muted">Kamar nyaman dengan fasilitas dasar lengkap</p>
                            <div class="room-price">Rp 900.000<span class="text-muted" style="font-size: 1rem;">/bulan</span></div>
                            <div class="room-features">
                                <div class="room-feature">
                                    <i class="bi bi-bed"></i>
                                    <span>Bed 120x200</span>
                                </div>
                                <div class="room-feature">
                                    <i class="bi bi-laptop"></i>
                                    <span>Meja Belajar</span>
                                </div>
                                <div class="room-feature">
                                    <i class="bi bi-cup-hot"></i>
                                    <span>KM Luar</span>
                                </div>
                            </div>
                            <a href="#contact" class="btn btn-pink w-100">Pesan Sekarang</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="room-card">
                        <img src="https://picsum.photos/seed/deluxe/400/250" alt="Deluxe Room">
                        <div class="room-content">
                            <div class="room-type">Deluxe</div>
                            <h3 class="room-name">Kamar Deluxe</h3>
                            <p class="text-muted">Kamar lebih luas dengan fasilitas premium</p>
                            <div class="room-price">Rp 1.300.000<span class="text-muted" style="font-size: 1rem;">/bulan</span></div>
                            <div class="room-features">
                                <div class="room-feature">
                                    <i class="bi bi-bed"></i>
                                    <span>Bed 160x200</span>
                                </div>
                                <div class="room-feature">
                                    <i class="bi bi-laptop"></i>
                                    <span>Meja Belajar</span>
                                </div>
                                <div class="room-feature">
                                    <i class="bi bi-droplet"></i>
                                    <span>AC</span>
                                </div>
                                <div class="room-feature">
                                    <i class="bi bi-cup-hot"></i>
                                    <span>KM Dalam</span>
                                </div>
                            </div>
                            <a href="#contact" class="btn btn-pink w-100">Pesan Sekarang</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="room-card">
                        <img src="https://picsum.photos/seed/suite/400/250" alt="Suite Room">
                        <div class="room-content">
                            <div class="room-type">Suite</div>
                            <h3 class="room-name">Kamar Suite</h3>
                            <p class="text-muted">Kamar mewah dengan ruang tamu pribadi</p>
                            <div class="room-price">Rp 1.800.000<span class="text-muted" style="font-size: 1rem;">/bulan</span></div>
                            <div class="room-features">
                                <div class="room-feature">
                                    <i class="bi bi-bed"></i>
                                    <span>Bed 180x200</span>
                                </div>
                                <div class="room-feature">
                                    <i class="bi bi-laptop"></i>
                                    <span>Meja Belajar</span>
                                </div>
                                <div class="room-feature">
                                    <i class="bi bi-droplet"></i>
                                    <span>AC</span>
                                </div>
                                <div class="room-feature">
                                    <i class="bi bi-cup-hot"></i>
                                    <span>KM Dalam</span>
                                </div>
                                <div class="room-feature">
                                    <i class="bi bi-couch"></i>
                                    <span>Ruang Tamu</span>
                                </div>
                            </div>
                            <a href="#contact" class="btn btn-pink w-100">Pesan Sekarang</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Facilities Section -->
    <section id="facilities" class="facilities-section">
        <div class="container">
            <div class="text-center mb-5" data-aos="fade-up">
                <h2 class="section-title">Fasilitas Umum</h2>
                <p class="section-subtitle">Nikmati berbagai fasilitas eksklusif untuk kenyamanan Anda</p>
            </div>
            <div class="facility-grid">
                <div class="facility-item" data-aos="fade-up" data-aos-delay="100">
                    <div class="facility-icon">
                        <i class="bi bi-wifi"></i>
                    </div>
                    <h5>WiFi Gratis</h5>
                    <p class="text-muted mb-0">Internet cepat 24 jam</p>
                </div>
                <div class="facility-item" data-aos="fade-up" data-aos-delay="200">
                    <div class="facility-icon">
                        <i class="bi bi-shield-lock"></i>
                    </div>
                    <h5>Keamanan 24 Jam</h5>
                    <p class="text-muted mb-0">CCTV & Security</p>
                </div>
                <div class="facility-item" data-aos="fade-up" data-aos-delay="300">
                    <div class="facility-icon">
                        <i class="bi bi-car-front"></i>
                    </div>
                    <h5>Parkir Luas</h5>
                    <p class="text-muted mb-0">Motor & Mobil</p>
                </div>
                <div class="facility-item" data-aos="fade-up" data-aos-delay="400">
                    <div class="facility-icon">
                        <i class="bi bi-droplet-half"></i>
                    </div>
                    <h5>Laundry</h5>
                    <p class="text-muted mb-0">Cuci & Setrika</p>
                </div>
                <div class="facility-item" data-aos="fade-up" data-aos-delay="500">
                    <div class="facility-icon">
                        <i class="bi bi-cup-straw"></i>
                    </div>
                    <h5>Pantry Bersih</h5>
                    <p class="text-muted mb-0">Kulkas & Kompor</p>
                </div>
                <div class="facility-item" data-aos="fade-up" data-aos-delay="600">
                    <div class="facility-icon">
                        <i class="bi bi-basket"></i>
                    </div>
                    <h5>Cleaning Service</h5>
                    <p class="text-muted mb-0">Sikat & Pel</p>
                </div>
                <div class="facility-item" data-aos="fade-up" data-aos-delay="700">
                    <div class="facility-icon">
                        <i class="bi bi-droplet"></i>
                    </div>
                    <h5>Air Minum</h5>
                    <p class="text-muted mb-0">Dispenser Gratis</p>
                </div>
                <div class="facility-item" data-aos="fade-up" data-aos-delay="800">
                    <div class="facility-icon">
                        <i class="bi bi-plug"></i>
                    </div>
                    <h5>Listrik Token</h5>
                    <p class="text-muted mb-0">Pulsa Sendiri</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Gallery Section -->
    <section id="gallery" class="gallery-section">
        <div class="container">
            <div class="text-center mb-5" data-aos="fade-up">
                <h2 class="section-title">Galeri Pink Residence</h2>
                <p class="section-subtitle">Lihat suasana nyaman di kost kami</p>
            </div>
            <div class="gallery-grid">
                <div class="gallery-item" data-aos="zoom-in" data-aos-delay="100">
                    <img src="https://picsum.photos/seed/gallery1/400/300" alt="Gallery 1">
                    <div class="gallery-overlay">
                        <i class="bi bi-zoom-in text-white" style="font-size: 2rem;"></i>
                    </div>
                </div>
                <div class="gallery-item" data-aos="zoom-in" data-aos-delay="200">
                    <img src="https://picsum.photos/seed/gallery2/400/300" alt="Gallery 2">
                    <div class="gallery-overlay">
                        <i class="bi bi-zoom-in text-white" style="font-size: 2rem;"></i>
                    </div>
                </div>
                <div class="gallery-item" data-aos="zoom-in" data-aos-delay="300">
                    <img src="https://picsum.photos/seed/gallery3/400/300" alt="Gallery 3">
                    <div class="gallery-overlay">
                        <i class="bi bi-zoom-in text-white" style="font-size: 2rem;"></i>
                    </div>
                </div>
                <div class="gallery-item" data-aos="zoom-in" data-aos-delay="400">
                    <img src="https://picsum.photos/seed/gallery4/400/300" alt="Gallery 4">
                    <div class="gallery-overlay">
                        <i class="bi bi-zoom-in text-white" style="font-size: 2rem;"></i>
                    </div>
                </div>
                <div class="gallery-item" data-aos="zoom-in" data-aos-delay="500">
                    <img src="https://picsum.photos/seed/gallery5/400/300" alt="Gallery 5">
                    <div class="gallery-overlay">
                        <i class="bi bi-zoom-in text-white" style="font-size: 2rem;"></i>
                    </div>
                </div>
                <div class="gallery-item" data-aos="zoom-in" data-aos-delay="600">
                    <img src="https://picsum.photos/seed/gallery6/400/300" alt="Gallery 6">
                    <div class="gallery-overlay">
                        <i class="bi bi-zoom-in text-white" style="font-size: 2rem;"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Location Section -->
    <section id="location" class="location-section">
        <div class="container">
            <div class="text-center mb-5" data-aos="fade-up">
                <h2 class="section-title">Lokasi Strategis</h2>
                <p class="section-subtitle">Mudah dijangkau dari berbagai tempat penting</p>
            </div>
            <div class="row">
                <div class="col-lg-8" data-aos="fade-right">
                    <div class="map-container">
                        <iframe 
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.266695!2d106.825!3d-6.2088!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNsKwMTInMzEuNyJTIDEwNsKwNDknMzAuMCJF!5e0!3m2!1sen!2sid!4v1234567890" 
                            width="100%" 
                            height="100%" 
                            style="border:0;" 
                            allowfullscreen="" 
                            loading="lazy">
                        </iframe>
                    </div>
                </div>
                <div class="col-lg-4" data-aos="fade-left">
                    <div class="location-info">
                        <h4 class="mb-4">Alamat Lengkap</h4>
                        <p class="mb-3"><i class="bi bi-geo-alt-fill text-pink me-2"></i> Jl. Pink Residence No. 123, Jakarta Selatan</p>
                        <h5 class="mt-4 mb-3">Dekat Dengan:</h5>
                        <ul class="location-list">
                            <li><i class="bi bi-check-circle-fill"></i> Universitas Indonesia (15 menit)</li>
                            <li><i class="bi bi-check-circle-fill"></i> Stasiun MRT (10 menit)</li>
                            <li><i class="bi bi-check-circle-fill"></i> Mall Gandaria City (5 menit)</li>
                            <li><i class="bi bi-check-circle-fill"></i> Rumah Sakit (10 menit)</li>
                            <li><i class="bi bi-check-circle-fill"></i> Supermarket (3 menit)</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact CTA -->
    <section id="contact" class="contact-cta">
        <div class="container" data-aos="fade-up">
            <h2>Siap Menjadi Penghuni Pink Residence?</h2>
            <p>Hubungi kami sekarang untuk informasi lebih lanjut dan pemesanan kamar</p>
            <a href="tel:+6281234567890" class="btn btn-white btn-lg">Hubungi Kami</a>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-4">
                    <div class="footer-widget">
                        <h5><i class="bi bi-house-heart-fill"></i> Pink Residence</h5>
                        <p>Kost eksklusif dengan fasilitas lengkap dan lokasi strategis untuk kenyamanan hidup Anda.</p>
                        <div class="social-links">
                            <a href="#"><i class="bi bi-facebook"></i></a>
                            <a href="#"><i class="bi bi-instagram"></i></a>
                            <a href="#"><i class="bi bi-whatsapp"></i></a>
                            <a href="#"><i class="bi bi-telephone"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <div class="footer-widget">
                        <h5>Jam Operasional</h5>
                        <ul class="contact-info">
                            <li>
                                <i class="bi bi-clock"></i>
                                <div>
                                    <strong>Senin - Sabtu:</strong><br>
                                    08:00 - 20:00 WIB
                                </div>
                            </li>
                            <li>
                                <i class="bi bi-clock"></i>
                                <div>
                                    <strong>Minggu:</strong><br>
                                    10:00 - 18:00 WIB
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <div class="footer-widget">
                        <h5>Hubungi Kami</h5>
                        <ul class="contact-info">
                            <li>
                                <i class="bi bi-telephone"></i>
                                <span>+62 812-3456-7890</span>
                            </li>
                            <li>
                                <i class="bi bi-whatsapp"></i>
                                <span>+62 812-3456-7890</span>
                            </li>
                            <li>
                                <i class="bi bi-envelope"></i>
                                <span>info@pinkresidence.com</span>
                            </li>
                            <li>
                                <i class="bi bi-geo-alt"></i>
                                <span>Jl. Pink Residence No. 123</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <hr class="my-4" style="border-color: #444;">
            <div class="text-center">
                <p class="mb-0">&copy; 2024 Pink Residence. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- AOS Animation JS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    
    <!-- Custom JS -->
    <script>
        // Initialize AOS
        AOS.init({
            duration: 1000,
            once: true,
            offset: 100
        });

        // Navbar scroll effect
        window.addEventListener('scroll', function() {
            const navbar = document.querySelector('.navbar');
            if (window.scrollY > 50) {
                navbar.style.padding = '10px 0';
                navbar.style.backgroundColor = 'rgba(255, 255, 255, 0.98)';
            } else {
                navbar.style.padding = '15px 0';
                navbar.style.backgroundColor = 'rgba(255, 255, 255, 0.95)';
            }
        });

        // Smooth scrolling for navigation links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    const offsetTop = target.offsetTop - 80;
                    window.scrollTo({
                        top: offsetTop,
                        behavior: 'smooth'
                    });
                }
            });
        });

        // Carousel configuration
        document.addEventListener('DOMContentLoaded', function() {
            const heroCarousel = document.getElementById('heroCarousel');
            
            if (heroCarousel) {
                const carousel = new bootstrap.Carousel(heroCarousel, {
                    interval: 5000,
                    pause: 'hover',
                    wrap: true,
                    touch: true
                });
                
                // Pause carousel when user interacts with controls
                heroCarousel.addEventListener('mouseenter', function() {
                    carousel.pause();
                });
                
                heroCarousel.addEventListener('mouseleave', function() {
                    carousel.cycle();
                });
                
                // Touch swipe support for mobile
                let touchStartX = 0;
                let touchEndX = 0;
                
                heroCarousel.addEventListener('touchstart', function(e) {
                    touchStartX = e.changedTouches[0].screenX;
                });
                
                heroCarousel.addEventListener('touchend', function(e) {
                    touchEndX = e.changedTouches[0].screenX;
                    handleSwipe();
                });
                
                function handleSwipe() {
                    if (touchEndX < touchStartX - 50) {
                        carousel.next();
                    }
                    if (touchEndX > touchStartX + 50) {
                        carousel.prev();
                    }
                }
            }
            
            // Reinitialize AOS for carousel content
            heroCarousel.addEventListener('slide.bs.carousel', function() {
                AOS.refresh();
            });
        });

        // Gallery lightbox effect
        document.querySelectorAll('.gallery-item').forEach(item => {
            item.addEventListener('click', function() {
                const imgSrc = this.querySelector('img').src;
                const modal = document.createElement('div');
                modal.style.cssText = `
                    position: fixed;
                    top: 0;
                    left: 0;
                    width: 100%;
                    height: 100%;
                    background: rgba(0,0,0,0.9);
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    z-index: 9999;
                    cursor: pointer;
                `;
                modal.innerHTML = `<img src="${imgSrc}" style="max-width: 90%; max-height: 90%; object-fit: contain;">`;
                modal.addEventListener('click', () => modal.remove());
                document.body.appendChild(modal);
            });
        });

        // Active navigation link
        const sections = document.querySelectorAll('section');
        const navLinks = document.querySelectorAll('.nav-link');

        window.addEventListener('scroll', () => {
            let current = '';
            sections.forEach(section => {
                const sectionTop = section.offsetTop;
                const sectionHeight = section.clientHeight;
                if (scrollY >= (sectionTop - 200)) {
                    current = section.getAttribute('id');
                }
            });

            navLinks.forEach(link => {
                link.classList.remove('active');
                if (link.getAttribute('href').slice(1) === current) {
                    link.classList.add('active');
                }
            });
        });

        // Mobile optimization
        function optimizeForMobile() {
            if (window.innerWidth <= 768) {
                // Adjust carousel height for mobile
                const carouselItems = document.querySelectorAll('.carousel-item');
                carouselItems.forEach(item => {
                    const img = item.querySelector('img');
                    if (img) {
                        img.style.height = window.innerHeight + 'px';
                        img.style.objectFit = 'cover';
                    }
                });
            }
        }

        // Call on load and resize
        window.addEventListener('load', optimizeForMobile);
        window.addEventListener('resize', optimizeForMobile);
    </script>
</body>
</html>