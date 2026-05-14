@extends('Member.Layouts.main')

@section('container')
    <section id="rooms" class="kost-section" style="margin-top: 40px">
        <div class="container">
            <div class="mb-5 text-center" data-aos="fade-up">
                <h2 class="section-title">Kamar Besar AC</h2>
                <p class="section-subtitle">Pilih kamar sesuai kebutuhan dan budget Anda</p>
            </div>

            <!-- Bagian Tombol Filter -->
            <div class="row mb-4" data-aos="fade-up">
                <div class="col-12 d-flex justify-content-center gap-2">
                    <a href="{{ request()->url() }}"
                        class="btn {{ !request('status') ? 'btn-pink' : 'btn-outline-secondary' }} rounded-pill px-4">
                        Semua
                    </a>
                    <a href="{{ request()->fullUrlWithQuery(['status' => 'tersedia']) }}"
                        class="btn {{ request('status') == 'tersedia' ? 'btn-success' : 'btn-outline-success' }} rounded-pill px-4">
                        <i class="bi bi-check-circle me-1"></i> Tersedia
                    </a>
                    <a href="{{ request()->fullUrlWithQuery(['status' => 'dibooking']) }}"
                        class="btn {{ request('status') == 'dibooking' ? 'btn-danger' : 'btn-outline-danger' }} rounded-pill px-4">
                        <i class="bi bi-x-circle me-1"></i> Telah Dibooking
                    </a>
                </div>
            </div>

            <div class="row g-4">
                @forelse ($rooms as $room)
                    <div class="col-lg-3" data-aos="fade-up" data-aos-delay="100">
                        <div class="kost-card" style="position: relative;">
                            <!-- Label Status Ketersediaan -->
                            <div style="position: absolute; top: 10px; right: 10px; z-index: 10;">
                                @if ($room->is_availibe)
                                    <span class="badge bg-success text-white px-3 py-2"
                                        style="border-radius: 20px; font-weight: 600;">
                                        <i class="bi bi-check-circle-fill me-1"></i> Tersedia
                                    </span>
                                @else
                                    <span class="badge bg-danger text-white px-3 py-2"
                                        style="border-radius: 20px; font-weight: 600;">
                                        <i class="bi bi-x-circle-fill me-1"></i> Telah Dibooking
                                    </span>
                                @endif
                            </div>

                            <img src="{{ asset('File/' . $room->gambar_sampul) }}" alt="{{ $room->nama }}"
                                class="kost-card-img">

                            <div class="kost-content">
                                <h3 class="kost-name">{{ $room->nama }}</h3>
                                <div class="kost-price">
                                    {{ 'Rp. ' . number_format($room->harga_per_6_bulan, 0, ',', '.') }}
                                    <span class="text-muted" style="font-size: 1rem;">/ 6 bulan</span>
                                </div>

                                <div class="kost-features">
                                    <div class="kost-feature"><i class="bi bi-layers"></i> <span>Spring Bed</span></div>
                                    <div class="kost-feature"><i class="bi bi-snow"></i> <span>AC</span></div>
                                    <div class="kost-feature"><i class="bi bi-droplet"></i> <span>KM Dalam</span></div>
                                    <div class="kost-feature"><i class="bi bi-tag"></i> <span>Jemuran Handuk</span></div>
                                    <div class="kost-feature"><i class="bi bi-door-closed"></i> <span>Lemari</span></div>
                                    <div class="kost-feature"><i class="bi bi-laptop"></i> <span>Meja Belajar</span></div>
                                </div>

                                <a href="{{ url('show-room/' . $room->id) }}" class="btn btn-pink"
                                    style="width: 100%;">Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center py-5">
                        <i class="bi bi-house-exclamation fs-1 text-muted"></i>
                        <p class="mt-3 text-muted">Maaf, tidak ada kamar yang ditemukan untuk filter ini.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
@endsection
