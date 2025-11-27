@extends("Member.Layouts.main")

@section("container")
    <section id="rooms">
        <div class="container my-5">

            {{-- Baris Card --}}
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-4">

                {{-- CARD 1: Kost Griya Larasati --}}
                <div class="col">
                    <div class="card h-100 custom-kost-card shadow-sm">
                        <div class="card-img-top-container">
                            {{-- Ganti dengan URL gambar asli Anda --}}
                            <img src="path/to/griya_larasati_image.jpg" class="card-img-top custom-card-img"
                                alt="Kost Griya Larasati">
                            <span class="badge text-bg-purple badge-icon">
                                <i class="bi bi-gender-female"></i>
                            </span>
                        </div>
                        <div class="card-body p-3">

                            {{-- Info Atas (Tipe, Rating, Sisa Kamar) --}}
                            <div class="d-flex align-items-center info-bar mb-1">
                                <span class="badge text-bg-success me-1">Putri</span>
                                <small class="text-muted fw-bold me-1">4.8</small>
                                <i class="bi bi-star-fill text-warning star-small me-2"></i>
                                <small class="text-danger fw-bold remaining-rooms">Sisa 2 kamar</small>
                            </div>

                            {{-- Judul --}}
                            <h5 class="card-title fw-bold title-compact mb-2">
                                Kost Griya Larasati Tipe A Yogyakarta Kasihan
                            </h5>

                            {{-- Fasilitas Ringkas --}}
                            <p class="card-text text-muted facilities-compact mb-2">
                                K. Mandi Dalam • WiFi • AC • Kloset Duduk • Kasur
                            </p>

                            {{-- Diskon dan Harga Coret --}}
                            <div class="discount-info mb-1">
                                <span class="badge bg-danger fw-bold discount-badge">Diskon 60rb</span>
                                <s class="text-muted price-strikethrough ms-2">Rp1.225.000</s>
                            </div>

                            {{-- Harga Final --}}
                            <p class="price mb-0">
                                <span class="fw-bold fs-5 text-dark final-price">Rp1.165.000</span>
                                <span class="text-muted terms-small">(Bulan pertama)</span>
                            </p>
                        </div>
                    </div>
                </div>

                {{-- CARD 2: Kost Rumah Adel (Ulangi Pola) --}}
                <div class="col">
                    <div class="card h-100 custom-kost-card shadow-sm">
                        <div class="card-img-top-container">
                            <img src="path/to/rumah_adel_image.jpg" class="card-img-top custom-card-img"
                                alt="Kost Rumah Adel">
                            <span class="badge text-bg-purple badge-icon">
                                <i class="bi bi-gender-male"></i>
                            </span>
                        </div>
                        <div class="card-body p-3">
                            <div class="d-flex align-items-center info-bar mb-1">
                                <span class="badge text-bg-success me-1">Putra</span>
                                <small class="text-muted fw-bold me-1">4.8</small>
                                <i class="bi bi-star-fill text-warning star-small me-2"></i>
                                <small class="text-danger fw-bold remaining-rooms">Sisa 3 kamar</small>
                            </div>
                            <h5 class="card-title fw-bold title-compact mb-2">
                                Kost Rumah Adel Tipe C Makassar
                            </h5>
                            <p class="card-text text-muted facilities-compact mb-2">
                                WiFi • AC • Kloset Duduk • Kasur
                            </p>
                            <div class="discount-info mb-1">
                                <span class="badge bg-danger fw-bold discount-badge">Diskon 88rb</span>
                                <s class="text-muted price-strikethrough ms-2">Rp1.100.000</s>
                            </div>
                            <p class="price mb-0">
                                <span class="fw-bold fs-5 text-dark final-price">Rp1.012.000</span>
                                <span class="text-muted terms-small">(Bulan pertama)</span>
                            </p>
                        </div>
                    </div>
                </div>

                {{-- CARD 3: Kost Muhajar 50 --}}
                <div class="col">
                    <div class="card h-100 custom-kost-card shadow-sm">
                        <div class="card-img-top-container">
                            <img src="path/to/muhajar_image.jpg" class="card-img-top custom-card-img" alt="Kost Muhajar 50">
                            <span class="badge text-bg-purple badge-icon">
                                <i class="bi bi-gender-female"></i>
                            </span>
                        </div>
                        <div class="card-body p-3">
                            <div class="d-flex align-items-center info-bar mb-1">
                                <span class="badge text-bg-success me-1">Putri</span>
                                <small class="text-muted fw-bold me-1">4.6</small>
                                <i class="bi bi-star-fill text-warning star-small me-2"></i>
                                {{-- Tidak ada "Sisa Kamar" di sini --}}
                            </div>
                            <h5 class="card-title fw-bold title-compact mb-2">
                                Kost Muhajar 50 Tipe B Kebon Jeruk
                            </h5>
                            <p class="card-text text-muted facilities-compact mb-2">
                                K. Mandi Dalam • WiFi • AC • Kloset Duduk • Kasur...
                            </p>
                            <div class="discount-info mb-1">
                                <span class="badge bg-danger fw-bold discount-badge">Diskon 105rb</span>
                                <s class="text-muted price-strikethrough ms-2">Rp2.125.000</s>
                            </div>
                            <p class="price mb-0">
                                <span class="fw-bold fs-5 text-dark final-price">Rp2.020.000</span>
                                <span class="text-muted terms-small">(Bulan pertama)</span>
                            </p>
                        </div>
                    </div>
                </div>

                {{-- CARD 4: Kost Lili Johan --}}
                <div class="col">
                    <div class="card h-100 custom-kost-card shadow-sm">
                        <div class="card-img-top-top-container">
                            <img src="path/to/lili_johan_image.jpg" class="card-img-top custom-card-img"
                                alt="Kost Lili Johan">
                            <span class="badge text-bg-purple badge-icon">
                                <i class="bi bi-gender-female"></i>
                            </span>
                        </div>
                        <div class="card-body p-3">
                            <div class="d-flex align-items-center info-bar mb-1">
                                <span class="badge text-bg-success me-1">Putri</span>
                                <small class="text-muted fw-bold me-1">4.9</small>
                                <i class="bi bi-star-fill text-warning star-small me-2"></i>
                                <small class="text-danger fw-bold remaining-rooms">Sisa 3 kamar</small>
                            </div>
                            <h5 class="card-title fw-bold title-compact mb-2">
                                Kost Lili Johan Tipe A Jagakarsa
                            </h5>
                            <p class="card-text text-muted facilities-compact mb-2">
                                K. Mandi Dalam • WiFi • Kloset Duduk • Kasur • Ak...
                            </p>
                            <div class="discount-info mb-1">
                                <span class="badge bg-danger fw-bold discount-badge">Diskon 63rb</span>
                                <s class="text-muted price-strikethrough ms-2">Rp1.275.000</s>
                            </div>
                            <p class="price mb-0">
                                <span class="fw-bold fs-5 text-dark final-price">Rp1.212.500</span>
                                <span class="text-muted terms-small">(Bulan pertama)</span>
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
