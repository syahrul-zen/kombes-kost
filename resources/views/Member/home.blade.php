@extends("Member.Layouts.main")

@section("container")
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
                        <img src="{{ asset("File/hero1.jpg") }}" class="d-block w-100" alt="Kombes Kost 1">
                        <div class="carousel-overlay"></div>
                        <div class="carousel-caption d-none d-md-block">
                            <div class="hero-content">
                                <h1 data-aos="fade-right">Selamat Datang di <span>Kombes Kost</span></h1>
                                <p class="subtitle" data-aos="fade-right" data-aos-delay="200">Hunian modern dan
                                    nyaman dengan fasilitas lengkap</p>
                                <div data-aos="fade-right" data-aos-delay="400">
                                    <a href="#rooms" class="btn btn-pink btn-lg me-3">Lihat Kamar Tersedia</a>
                                    <a href="#gallery" class="btn btn-outline-light btn-lg">Virtual Tour</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Slide 2 -->
                    <div class="carousel-item">
                        <img src="{{ asset("File/hero2.jpg") }}" class="d-block w-100" alt="Kombes Kost 2">
                        <div class="carousel-overlay"></div>
                        <div class="carousel-caption d-none d-md-block">
                            <div class="hero-content">
                                <h1 data-aos="fade-right">Fasilitas <span>Lengkap</span></h1>
                                <p class="subtitle" data-aos="fade-right" data-aos-delay="200">WiFi gratis, AC,
                                    laundry, dan keamanan 24 jam</p>
                                <div data-aos="fade-right" data-aos-delay="400">
                                    <a href="#facilities" class="btn btn-pink btn-lg me-3">Lihat Fasilitas</a>
                                    <a href="#contact" class="btn btn-outline-light btn-lg">Hubungi Kami</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Slide 3 -->
                    <div class="carousel-item">
                        <img src="{{ asset("File/hero3.jpg") }}" class="d-block w-100" alt="Kombes Kost 3">
                        <div class="carousel-overlay"></div>
                        <div class="carousel-caption d-none d-md-block">
                            <div class="hero-content">
                                <h1 data-aos="fade-right">Lokasi <span>Strategis</span></h1>
                                <p class="subtitle" data-aos="fade-right" data-aos-delay="200">Dekat kampus,
                                    perkantoran, dan transportasi publik</p>
                                <div data-aos="fade-right" data-aos-delay="400">
                                    <a href="#location" class="btn btn-pink btn-lg me-3">Lihat Lokasi</a>
                                    <a href="#rooms" class="btn btn-outline-light btn-lg">Pesan Sekarang</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Slide 4 -->
                    <div class="carousel-item">
                        <img src="{{ asset("File/hero1.jpg") }}" class="d-block w-100" alt="Kombes Kost 4">
                        <div class="carousel-overlay"></div>
                        <div class="carousel-caption d-none d-md-block">
                            <div class="hero-content">
                                <h1 data-aos="fade-right">Harga <span>Terjangkau</span></h1>
                                <p class="subtitle" data-aos="fade-right" data-aos-delay="200">Mulai dari Rp
                                    900.000/bulan dengan fasilitas premium</p>
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
            <div class="text-center text-white">
                <h1 data-aos="fade-up">Kombes Kost</h1>
                <p class="subtitle" data-aos="fade-up" data-aos-delay="200">Hunian modern & nyaman</p>
                <div data-aos="fade-up" data-aos-delay="400">
                    <a href="#rooms" class="btn btn-pink btn-lg me-3">Lihat Kamar</a>
                    <a href="#contact" class="btn btn-outline-light btn-lg">Hubungi</a>
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
                        <img src="{{ asset("File/hero2.jpg") }}" alt="About Pink Residence">
                    </div>
                </div>
                <div class="col-lg-6" data-aos="fade-left">
                    <div class="about-content">
                        <h2 class="section-title">Kombes Kost</h2>
                        <p class="section-subtitle">Hunian idaman untuk mahasiswa dan profesional muda</p>
                        <p>Pink Residence adalah kost eksklusif yang dirancang khusus untuk memberikan kenyamanan
                            maksimal bagi penghuninya. Dengan desain modern dan fasilitas lengkap, kami berkomitmen
                            untuk menjadi pilihan terbaik tempat tinggal Anda.</p>
                        <p>Terletak di lokasi yang sangat strategis, Kombes Kost memberikan kemudahan akses ke
                            berbagai fasilitas umum seperti kampus, perkantoran, pusat perbelanjaan, dan
                            transportasi publik.</p>
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
            <div class="mb-5 text-center" data-aos="fade-up">
                <h2 class="section-title">Tipe Kamar</h2>
                <p class="section-subtitle">Pilih kamar sesuai kebutuhan dan budget Anda</p>
            </div>
            <div class="row g-4">
                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="room-card">
                        <img src="{{ asset("File/hero3.jpg") }}" alt="Standard Room">
                        <div class="room-content">
                            <div class="room-type">Standard (A)</div>
                            <h3 class="room-name">Kamar Standard</h3>
                            <p class="text-muted">Kamar nyaman dengan fasilitas dasar lengkap</p>
                            <div class="room-price">Rp 900.000<span class="text-muted"
                                    style="font-size: 1rem;">/bulan</span></div>
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
                            <a href="{{ url("view-a") }}" class="btn btn-pink w-100">Selengkapnya</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="room-card">
                        <img src="{{ asset("File/hero2.jpg") }}" alt="Deluxe Room">
                        <div class="room-content">
                            <div class="room-type">Deluxe</div>
                            <h3 class="room-name">Kamar Deluxe</h3>
                            <p class="text-muted">Kamar lebih luas dengan fasilitas premium</p>
                            <div class="room-price">Rp 1.300.000<span class="text-muted"
                                    style="font-size: 1rem;">/bulan</span></div>
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
                            <a href="{{ url("view-b") }}" class="btn btn-pink w-100">Selengkapnya</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="room-card">
                        <img src="{{ asset("File/hero1.jpg") }}" alt="Suite Room">
                        <div class="room-content">
                            <div class="room-type">Suite</div>
                            <h3 class="room-name">Kamar Suite</h3>
                            <p class="text-muted">Kamar mewah dengan ruang tamu pribadi</p>
                            <div class="room-price">Rp 1.800.000<span class="text-muted"
                                    style="font-size: 1rem;">/bulan</span></div>
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
                            <a href="{{ url("view-c") }}" class="btn btn-pink w-100">Selengkapnya</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Facilities Section -->
    <section id="facilities" class="facilities-section">
        <div class="container">
            <div class="mb-5 text-center" data-aos="fade-up">
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
            <div class="mb-5 text-center" data-aos="fade-up">
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
            <div class="mb-5 text-center" data-aos="fade-up">
                <h2 class="section-title">Lokasi Strategis</h2>
                <p class="section-subtitle">Mudah dijangkau dari berbagai tempat penting</p>
            </div>
            <div class="row">
                <div class="col-lg-8" data-aos="fade-right">
                    <div class="map-container">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.266695!2d106.825!3d-6.2088!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNsKwMTInMzEuNyJTIDEwNsKwNDknMzAuMCJF!5e0!3m2!1sen!2sid!4v1234567890"
                            width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy">
                        </iframe>
                    </div>
                </div>
                <div class="col-lg-4" data-aos="fade-left">
                    <div class="location-info">
                        <h4 class="mb-4">Alamat Lengkap</h4>
                        <p class="mb-3"><i class="bi bi-geo-alt-fill text-pink me-2"></i> Jl. Pink Residence No.
                            123, Jakarta Selatan</p>
                        <h5 class="mb-3 mt-4">Dekat Dengan:</h5>
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
@endsection
