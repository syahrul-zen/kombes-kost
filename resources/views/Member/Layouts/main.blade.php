<!DOCTYPE html>
<html lang="id">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Kombes Kost</title>

        <!-- Bootstrap 5 CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- Bootstrap Icons -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">

        <!-- AOS Animation -->
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

        <link rel="stylesheet" href="{{ asset("src/member_css.css") }}">
    </head>

    <body>
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top">
            <div class="container">
                <a class="navbar-brand" href="#home">
                    <i class="bi bi-house-heart-fill"></i>
                    Kombes Kost
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="navbar-collapse collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url("/#home") }}">Beranda</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url("/#about") }}">Tentang</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url("/#rooms") }}">Tipe Kamar</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url("/#facilities") }}">Fasilitas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url("/#gallery") }}">Galeri</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url("/#location") }}">Lokasi</a>
                        </li>

                        @if (Auth::guard("member")->check())
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url("profile/") }}">Profile</a>
                            </li>

                            <li class="nav-item">
                                <form action="{{ url("logout") }}" method="post">
                                    @csrf
                                    <button class="btn btn-pink ms-3">Logout</button>
                                </form>
                            </li>
                        @else
                            <li class="nav-item">
                                <a href="{{ url("login") }}" class="btn btn-pink ms-3">Login</a>
                            </li>
                        @endif

                    </ul>
                </div>
            </div>
        </nav>

        @yield("container")

        <!-- Footer -->
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 mb-4">
                        <div class="footer-widget">
                            <h5><i class="bi bi-house-heart-fill"></i> Kombes Kost</h5>
                            <p>Kost eksklusif dengan fasilitas lengkap dan lokasi strategis untuk kenyamanan hidup Anda.
                            </p>
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

        <script src="{{ asset("src/jquery-3.4.1.min.js") }}"></script>

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
                anchor.addEventListener('click', function(e) {
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
                    modal.innerHTML =
                        `<img src="${imgSrc}" style="max-width: 90%; max-height: 90%; object-fit: contain;">`;
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

        {{-- <script>
            // Pastikan jQuery (dependency Bootstrap) dan Bootstrap JS sudah dimuat sebelum kode ini.
            $(document).ready(function() {

                // Menambahkan class 'active-thumb' pada thumbnail pertama saat halaman dimuat
                $('.thumbnail-image:first').addClass('active-thumb');

                // Menangani event klik pada setiap thumbnail
                $('.thumbnail-image').on('click', function() {

                    // 1. Ambil URL gambar besar dari atribut 'data-large-src'
                    var newSrc = $(this).attr('data-large-src');

                    // 2. Ganti atribut 'src' pada gambar utama
                    $('#main-image').attr('src', newSrc);
                    $('#main-image').attr('alt', $(this).attr('alt').replace('Thumbnail', 'Gambar Utama'));

                    // 3. Menghapus class 'active-thumb' dari semua thumbnail
                    $('.thumbnail-image').removeClass('active-thumb');

                    // 4. Menambahkan class 'active-thumb' ke thumbnail yang baru saja diklik
                    $(this).addClass('active-thumb');

                });

            });
        </script> --}}
    </body>

</html>
