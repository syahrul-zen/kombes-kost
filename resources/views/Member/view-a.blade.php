@extends("Member.Layouts.main")

@section("container")
    <section id="rooms" class="kost-section" style="margin-top: 40px">
        <div class="container">
            <div class="mb-5 text-center" data-aos="fade-up">
                <h2 class="section-title">Tipe Kamar</h2>
                <p class="section-subtitle">Pilih kamar sesuai kebutuhan dan budget Anda</p>
            </div>
            <div class="row g-4">
                <div class="col-lg-3" data-aos="fade-up" data-aos-delay="100">
                    <div class="kost-card">
                        {{-- Menggunakan .kost-card-img --}}
                        <img src="https://picsum.photos/seed/standard/400/250" alt="Standard Room" class="kost-card-img">
                        <div class="kost-content">
                            <div class="kost-type">Standard (A)</div>
                            <h3 class="kost-name">Kamar Standard</h3>
                            <p class="text-muted">Kamar nyaman dengan fasilitas dasar lengkap</p>
                            <div class="kost-price">Rp 900.000<span class="text-muted"
                                    style="font-size: 1rem;">/bulan</span></div>
                            <div class="kost-features">
                                <div class="kost-feature">
                                    <i class="bi bi-bed"></i>
                                    <span>Bed 120x200</span>
                                </div>
                                <div class="kost-feature">
                                    <i class="bi bi-laptop"></i>
                                    <span>Meja Belajar</span>
                                </div>
                                <div class="kost-feature">
                                    <i class="bi bi-cup-hot"></i>
                                    <span>KM Luar</span>
                                </div>
                            </div>
                            <a href="{{ url("view-a") }}" class="btn btn-pink w-100">Selengkapnya</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3" data-aos="fade-up" data-aos-delay="200">
                    <div class="kost-card">
                        <img src="https://picsum.photos/seed/deluxe/400/250" alt="Deluxe Room" class="kost-card-img">
                        <div class="kost-content">
                            <div class="kost-type">Deluxe</div>
                            <h3 class="kost-name">Kamar Deluxe</h3>
                            <p class="text-muted">Kamar lebih luas dengan fasilitas premium</p>
                            <div class="kost-price">Rp 1.300.000<span class="text-muted"
                                    style="font-size: 1rem;">/bulan</span></div>
                            <div class="kost-features">
                                <div class="kost-feature">
                                    <i class="bi bi-bed"></i>
                                    <span>Bed 160x200</span>
                                </div>
                                <div class="kost-feature">
                                    <i class="bi bi-laptop"></i>
                                    <span>Meja Belajar</span>
                                </div>
                                <div class="kost-feature">
                                    <i class="bi bi-droplet"></i>
                                    <span>AC</span>
                                </div>
                                <div class="kost-feature">
                                    <i class="bi bi-cup-hot"></i>
                                    <span>KM Dalam</span>
                                </div>
                            </div>
                            <a href="#contact" class="btn btn-pink w-100">Pesan Sekarang</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3" data-aos="fade-up" data-aos-delay="300">
                    <div class="kost-card">
                        <img src="https://picsum.photos/seed/suite/400/250" alt="Suite Room" class="kost-card-img">
                        <div class="kost-content">
                            <div class="kost-type">Suite</div>
                            <h3 class="kost-name">Kamar Suite</h3>
                            <p class="text-muted">Kamar mewah dengan ruang tamu pribadi</p>
                            <div class="kost-price">Rp 1.800.000<span class="text-muted"
                                    style="font-size: 1rem;">/bulan</span></div>
                            <div class="kost-features">
                                <div class="kost-feature">
                                    <i class="bi bi-bed"></i>
                                    <span>Bed 180x200</span>
                                </div>
                                <div class="kost-feature">
                                    <i class="bi bi-laptop"></i>
                                    <span>Meja Belajar</span>
                                </div>
                                <div class="kost-feature">
                                    <i class="bi bi-droplet"></i>
                                    <span>AC</span>
                                </div>
                                <div class="kost-feature">
                                    <i class="bi bi-cup-hot"></i>
                                    <span>KM Dalam</span>
                                </div>
                                <div class="kost-feature">
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
@endsection
