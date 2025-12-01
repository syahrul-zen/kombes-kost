<!DOCTYPE html>
<html lang="id">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Pesan Kamar - Pink Residence</title>

        <!-- Bootstrap 5 CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- Bootstrap Icons -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">

        <!-- Custom CSS -->
        <style>
            :root {
                --pink-primary: #FF6B9D;
                --pink-secondary: #C44569;
                --pink-light: #FFE0EC;
                --pink-dark: #A6385C;
                --text-dark: #2D3436;
                --text-light: #636E72;
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
                background: linear-gradient(135deg, var(--pink-light) 0%, white 100%);
                min-height: 100vh;
            }

            /* Header */
            .booking-header {
                background: linear-gradient(135deg, var(--pink-primary) 0%, var(--pink-secondary) 100%);
                color: white;
                padding: 40px 0;
                position: relative;
            }

            .booking-header .logo {
                position: absolute;
                top: 20px;
                left: 20px;
                display: flex;
                align-items: center;
                gap: 10px;
                font-weight: bold;
                font-size: 1.2rem;
                color: white;
                text-decoration: none;
            }

            .booking-header .logo i {
                font-size: 1.5rem;
            }

            .back-button {
                position: absolute;
                top: 20px;
                right: 20px;
                background: rgba(255, 255, 255, 0.2);
                color: white;
                border: 1px solid rgba(255, 255, 255, 0.3);
                border-radius: 50%;
                width: 40px;
                height: 40px;
                display: flex;
                align-items: center;
                justify-content: center;
                text-decoration: none;
                transition: all 0.3s ease;
            }

            .back-button:hover {
                background: rgba(255, 255, 255, 0.3);
                transform: translateY(-2px);
            }

            .booking-header h1 {
                font-size: 2.5rem;
                font-weight: bold;
                margin-bottom: 10px;
                text-align: center;
            }

            .booking-header p {
                font-size: 1.1rem;
                opacity: 0.9;
                text-align: center;
                max-width: 600px;
                margin: 0 auto;
            }

            /* Main Container */
            .booking-container {
                padding: 40px 0;
            }

            /* Room Gallery */
            .room-gallery {
                background: white;
                border-radius: 20px;
                box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
                padding: 30px;
                margin-bottom: 30px;
            }

            .section-title {
                font-size: 1.8rem;
                font-weight: bold;
                color: var(--text-dark);
                margin-bottom: 20px;
                position: relative;
                display: inline-block;
            }

            .section-title::after {
                content: '';
                position: absolute;
                bottom: -8px;
                left: 0;
                width: 40px;
                height: 3px;
                background-color: var(--pink-primary);
            }

            .room-images-grid {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
                gap: 20px;
                margin-top: 30px;
            }

            .room-image-item {
                position: relative;
                border-radius: 15px;
                overflow: hidden;
                cursor: pointer;
                transition: all 0.3s ease;
                border: 3px solid transparent;
            }

            .room-image-item:hover {
                transform: translateY(-5px);
                box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
            }

            .room-image-item.selected {
                border-color: var(--pink-primary);
                box-shadow: 0 15px 30px rgba(255, 107, 157, 0.3);
            }

            .room-image-item img {
                width: 100%;
                height: 200px;
                object-fit: cover;
                transition: all 0.3s ease;
            }

            .room-image-item:hover img {
                transform: scale(1.1);
            }

            .room-image-overlay {
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background: linear-gradient(to bottom, transparent 0%, rgba(0, 0, 0, 0.7) 100%);
                display: flex;
                align-items: flex-end;
                padding: 20px;
                opacity: 0;
                transition: opacity 0.3s ease;
            }

            .room-image-item:hover .room-image-overlay,
            .room-image-item.selected .room-image-overlay {
                opacity: 1;
            }

            .room-image-info {
                color: white;
            }

            .room-image-info h3 {
                font-size: 1.2rem;
                margin-bottom: 5px;
                text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
            }

            .room-image-info .price {
                font-size: 1.1rem;
                font-weight: bold;
                color: var(--pink-light);
                text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
            }

            .selected-indicator {
                position: absolute;
                top: 15px;
                right: 15px;
                background: var(--pink-primary);
                color: white;
                width: 30px;
                height: 30px;
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
                opacity: 0;
                transform: scale(0);
                transition: all 0.3s ease;
            }

            .room-image-item.selected .selected-indicator {
                opacity: 1;
                transform: scale(1);
            }

            /* Room Facilities */
            .room-facilities {
                background: white;
                border-radius: 20px;
                box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
                padding: 30px;
                margin-bottom: 30px;
                display: none;
            }

            .room-facilities.show {
                display: block;
            }

            .facilities-grid {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
                gap: 20px;
                margin-top: 20px;
            }

            .facility-item {
                display: flex;
                align-items: center;
                gap: 15px;
                padding: 15px;
                background: var(--pink-light);
                border-radius: 10px;
                transition: all 0.3s ease;
            }

            .facility-item:hover {
                transform: translateY(-3px);
                box-shadow: 0 5px 15px rgba(255, 107, 157, 0.2);
            }

            .facility-icon {
                width: 50px;
                height: 50px;
                background: white;
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
                font-size: 1.5rem;
                color: var(--pink-primary);
            }

            .facility-info h4 {
                font-size: 1rem;
                margin-bottom: 2px;
                color: var(--text-dark);
            }

            .facility-info p {
                font-size: 0.9rem;
                color: var(--text-light);
                margin: 0;
            }

            /* Gallery Section - BARU */
            .gallery-section {
                background: white;
                border-radius: 20px;
                box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
                padding: 30px;
                margin-bottom: 30px;
                display: none;
            }

            .gallery-section.show {
                display: block;
            }

            .gallery-grid {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
                gap: 20px;
                margin-top: 30px;
            }

            .gallery-item {
                position: relative;
                border-radius: 15px;
                overflow: hidden;
                cursor: pointer;
                transition: all 0.3s ease;
                height: 200px;
            }

            .gallery-item:hover {
                transform: translateY(-5px);
                box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
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

            .gallery-overlay i {
                color: white;
                font-size: 2rem;
            }

            /* Booking Form */
            .booking-form {
                background: white;
                border-radius: 20px;
                box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
                padding: 30px;
                margin-bottom: 30px;
            }

            .form-group {
                margin-bottom: 20px;
            }

            .form-label {
                font-weight: 600;
                color: var(--text-dark);
                margin-bottom: 8px;
                display: flex;
                align-items: center;
                gap: 8px;
            }

            .form-label i {
                color: var(--pink-primary);
            }

            .form-control,
            .form-select {
                border: 2px solid #e0e0e0;
                border-radius: 10px;
                padding: 12px 15px;
                font-size: 1rem;
                transition: all 0.3s ease;
            }

            .form-control:focus,
            .form-select:focus {
                border-color: var(--pink-primary);
                box-shadow: 0 0 0 0.2rem rgba(255, 107, 157, 0.25);
            }

            .form-control::placeholder {
                color: #adb5bd;
            }

            .input-group-text {
                background-color: var(--pink-light);
                border: 2px solid #e0e0e0;
                border-right: none;
                color: var(--pink-primary);
            }

            .input-group .form-control {
                border-left: none;
            }

            /* Date Range Picker Custom */
            .date-range-container {
                position: relative;
            }

            .date-range-display {
                display: flex;
                align-items: center;
                justify-content: space-between;
                padding: 12px 15px;
                border: 2px solid #e0e0e0;
                border-radius: 10px;
                cursor: pointer;
                transition: all 0.3s ease;
            }

            .date-range-display:hover {
                border-color: var(--pink-primary);
            }

            .date-range-display:focus-within {
                border-color: var(--pink-primary);
                box-shadow: 0 0 0 0.2rem rgba(255, 107, 157, 0.25);
            }

            .date-start,
            .date-end {
                display: flex;
                flex-direction: column;
            }

            .date-label {
                font-size: 0.8rem;
                color: var(--text-light);
                margin-bottom: 2px;
            }

            .date-value {
                font-weight: 600;
                color: var(--text-dark);
            }

            .date-separator {
                margin: 0 15px;
                color: var(--text-light);
                font-size: 1.2rem;
            }

            /* Price Summary */
            .price-summary {
                background: white;
                border-radius: 20px;
                box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
                padding: 30px;
                margin-bottom: 30px;
            }

            .price-item {
                display: flex;
                justify-content: space-between;
                align-items: center;
                padding: 15px 0;
                border-bottom: 1px solid #f0f0f0;
            }

            .price-item:last-child {
                border-bottom: none;
                font-weight: bold;
                font-size: 1.2rem;
                color: var(--pink-primary);
                margin-top: 10px;
                padding-top: 20px;
                border-top: 2px dashed #e0e0e0;
            }

            .price-label {
                color: var(--text-dark);
            }

            .price-value {
                font-weight: 600;
                color: var(--text-dark);
            }

            /* Additional Services */
            .additional-services {
                background: white;
                border-radius: 20px;
                box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
                padding: 30px;
                margin-bottom: 30px;
            }

            .service-items {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
                gap: 15px;
                margin-top: 20px;
            }

            .service-item {
                display: flex;
                align-items: center;
                padding: 15px;
                border: 2px solid #e0e0e0;
                border-radius: 10px;
                cursor: pointer;
                transition: all 0.3s ease;
            }

            .service-item:hover {
                border-color: var(--pink-primary);
                background-color: var(--pink-light);
            }

            .service-item.selected {
                border-color: var(--pink-primary);
                background-color: var(--pink-light);
            }

            .service-checkbox {
                margin-right: 15px;
                width: 20px;
                height: 20px;
                accent-color: var(--pink-primary);
            }

            .service-info {
                flex: 1;
            }

            .service-name {
                font-weight: 600;
                color: var(--text-dark);
                margin-bottom: 2px;
            }

            .service-price {
                font-size: 0.9rem;
                color: var(--pink-primary);
                font-weight: 600;
            }

            /* Booking Button */
            .booking-button-container {
                text-align: center;
                margin-top: 30px;
            }

            .btn-book {
                background: linear-gradient(135deg, var(--pink-primary) 0%, var(--pink-secondary) 100%);
                color: white;
                border: none;
                padding: 15px 50px;
                border-radius: 25px;
                font-weight: 600;
                font-size: 1.1rem;
                transition: all 0.3s ease;
                display: inline-block;
                text-decoration: none;
            }

            .btn-book:hover {
                transform: translateY(-2px);
                box-shadow: 0 10px 20px rgba(255, 107, 157, 0.3);
                color: white;
            }

            /* Lightbox */
            .lightbox {
                display: none;
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: rgba(0, 0, 0, 0.9);
                z-index: 9999;
                cursor: pointer;
            }

            .lightbox-content {
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                max-width: 90%;
                max-height: 90%;
            }

            .lightbox-content img {
                width: 100%;
                height: auto;
                border-radius: 10px;
                box-shadow: 0 20px 40px rgba(0, 0, 0, 0.5);
            }

            .lightbox-close {
                position: absolute;
                top: 20px;
                right: 40px;
                color: white;
                font-size: 3rem;
                cursor: pointer;
                transition: all 0.3s ease;
            }

            .lightbox-close:hover {
                transform: rotate(90deg);
            }

            /* Success Message */
            .success-message {
                background-color: #d4edda;
                border: 1px solid #c3e6cb;
                color: #155724;
                padding: 15px;
                border-radius: 10px;
                margin-bottom: 20px;
                display: none;
            }

            .success-message.show {
                display: block;
                animation: slideDown 0.3s ease;
            }

            @keyframes slideDown {
                from {
                    opacity: 0;
                    transform: translateY(-10px);
                }

                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            /* Responsive */
            @media (max-width: 768px) {
                .booking-header {
                    padding: 30px 20px;
                }

                .booking-header h1 {
                    font-size: 2rem;
                }

                .booking-header .logo {
                    position: static;
                    justify-content: center;
                    margin-bottom: 15px;
                }

                .back-button {
                    position: static;
                    margin: 0 auto 20px;
                    display: flex;
                    width: fit-content;
                }

                .booking-container {
                    padding: 20px 15px;
                }

                .room-images-grid,
                .gallery-grid {
                    grid-template-columns: repeat(2, 1fr);
                }

                .facilities-grid {
                    grid-template-columns: 1fr;
                }

                .service-items {
                    grid-template-columns: 1fr;
                }
            }

            @media (max-width: 576px) {
                .booking-header h1 {
                    font-size: 1.8rem;
                }

                .section-title {
                    font-size: 1.5rem;
                }

                .form-label {
                    font-size: 0.9rem;
                }

                .room-images-grid,
                .gallery-grid {
                    grid-template-columns: 1fr;
                }

                .btn-book {
                    padding: 12px 30px;
                    font-size: 1rem;
                    width: 100%;
                }
            }
        </style>
    </head>

    <body>
        <!-- Header -->
        <div class="booking-header">
            <!-- Logo -->
            <a href="{{ url("/") }}" class="logo">
                <i class="bi bi-house-heart-fill"></i>
                Pink Residence
            </a>

            <!-- Back Button -->
            <a href="{{ url("/#rooms") }}" class="back-button" title="Kembali">
                <i class="bi bi-arrow-left"></i>
            </a>

            <h1>Pesan Kamar</h1>
            <p>Pilih tipe kamar yang Anda inginkan dan lengkapi data pemesanan</p>
        </div>

        <!-- Main Container -->
        <div class="booking-container container">
            <!-- Success Message -->
            <div class="success-message" id="successMessage">
                <i class="bi bi-check-circle-fill"></i> Pemesanan berhasil! Kami akan menghubungi Anda segera untuk
                konfirmasi.
            </div>

            @error("room_id")
                <div class="alert alert-danger" role="alert">
                    {{ $message }}
                </div>
            @enderror

            <!-- Room Gallery -->
            <div class="room-gallery">
                <h2 class="section-title">Gambar Kamar</h2>

                <div class="room-images-grid">
                    <div class="room-image-item" data-room-type="standard" data-price="900000"
                        data-facilities='["Bed 120x200", "Meja Belajar", "KM Luar", "Lemari Pakaian", "Jendela Besar"]'>
                        <img src="https://picsum.photos/seed/standard/400/250" alt="Standard Room">
                        {{-- <div class="room-image-overlay">
                            <div class="room-image-info">
                                <h3>Kamar Standard</h3>
                                <div class="price">Rp 900.000/bulan</div>
                            </div>
                        </div>
                        <div class="selected-indicator">
                            <i class="bi bi-check-lg"></i>
                        </div> --}}
                    </div>

                    <div class="room-image-item" data-room-type="deluxe" data-price="1300000"
                        data-facilities='["Bed 160x200", "Meja Belajar", "AC", "KM Dalam", "Lemari Pakaian", "TV"]'>
                        <img src="https://picsum.photos/seed/deluxe/400/250" alt="Deluxe Room">
                        {{-- <div class="room-image-overlay">
                            <div class="room-image-info">
                                <h3>Kamar Deluxe</h3>
                                <div class="price">Rp 1.300.000/bulan</div>
                            </div>
                        </div>
                        <div class="selected-indicator">
                            <i class="bi bi-check-lg"></i>
                        </div> --}}
                    </div>

                    <div class="room-image-item" data-room-type="suite" data-price="1800000"
                        data-facilities='["Bed 180x200", "Meja Belajar", "AC", "KM Dalam", "Lemari Pakaian", "TV", "Ruang Tamu", "Mini Bar"]'>
                        <img src="https://picsum.photos/seed/suite/400/250" alt="Suite Room">
                        {{-- <div class="room-image-overlay">
                            <div class="room-image-info">
                                <h3>Kamar Suite</h3>
                                <div class="price">Rp 1.800.000/bulan</div>
                            </div>
                        </div>
                        <div class="selected-indicator">
                            <i class="bi bi-check-lg"></i>
                        </div> --}}
                    </div>
                </div>
            </div>

            <!-- Room Facilities -->
            <div class="room-facilities" id="roomFacilities">
                <h2 class="section-title">Fasilitas Kamar</h2>
                <div class="facilities-grid" id="facilitiesGrid">
                    <!-- Fasilitas akan diisi secara dinamis -->
                </div>
            </div>

            <!-- Gallery Section - BARU -->
            <div class="gallery-section" id="gallerySection">
                <h2 class="section-title">Galeri Kamar</h2>
                <p style="color: var(--text-light); margin-bottom: 20px;">Lihat lebih banyak foto dari tipe kamar yang
                    Anda pilih</p>
                <div class="gallery-grid" id="galleryGrid">
                    <!-- Gallery items akan diisi secara dinamis -->
                </div>
            </div>

            <!-- Jadwal Kamar -->

            <div class="additional-services">
                <h2 class="section-title">Jadwal Booking</h2>

                <div class="row">

                    @foreach ($room->booking as $item)
                        <div class="col-lg-4 col-md-6 col-12 mb-3">
                            <div class="service-item">
                                <div class="service-info">
                                    <div class="service-name">{{ $item->member->nama_lengkap }}</div>
                                    <div class="service-price">
                                        {{ date("d-M-Y", strtotime($item->start_date)) . " - " . date("d-M-Y", strtotime($item->end_date)) }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>

            <div class="additional-services">
                <h2 class="section-title">Deskripsi Kamar</h2>

                <div class="row" class="title">

                    <div class="col-12">

                        {!! nl2br(e($room->deskripsi)) !!}

                    </div>
                </div>
            </div>

            <!-- Booking Form -->
            <div class="booking-form">
                <h2 class="section-title">Data Pemesanan</h2>
                <form action="{{ url("booking") }}" method="POST" id="bookingForm">
                    @csrf
                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">
                                    <i class="bi bi-calendar-range"></i> Tanggal Sewa
                                </label>
                                <div class="form-group">
                                    {{-- <span class="input-group-text"></span> --}}
                                    <input type="date" class="form-control" min="{{ date("Y-m-d") }}"
                                        name="start_date" value="{{ @old("start_date") }}" required>

                                    @error("start_date")
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label for="paket_sewa" class="form-label">
                                <i class="bi bi-alarm"></i> Paket Sewa
                            </label>
                            <select class="form-select" aria-label="Default select example" name="paket_sewa"
                                id="paketSewaSelect" required>
                                <option value="" selected>Pilih</option>
                                <option value="3">
                                    {{ "3 Bulan" . "(Rp." . number_format($room->harga_per_3_bulan * 1, 0, ",", ".") . ")" }}
                                </option>
                                <option value="6">
                                    {{ "6 Bulan" . "(Rp." . number_format($room->harga_per_3_bulan * 2, 0, ",", ".") . ")" }}
                                </option>
                                <option value="12">
                                    {{ "12 Bulan" . "(Rp." . number_format($room->harga_per_3_bulan * 4, 0, ",", ".") . ")" }}
                                </option>
                            </select>
                        </div>

                        {{-- HANYA PERLU SATU HIDDEN INPUT: Harga per 3 Bulan --}}
                        {{-- Asumsi data harga diambil dari objek $room --}}
                        <input type="hidden" name="harga_per_3_bulan" id="harga3Bulan"
                            value="{{ $room->harga_per_3_bulan }}">

                        <input type="hidden" name="member_id" value="{{ Auth::guard("member")->user()->id }}">
                        <input type="hidden" name="room_id" value="{{ $room->id }}">

                </form>
            </div>

            <!-- Price Summary -->
            {{-- <div class="price-summary">
            <h2 class="section-title">Rincian Biaya</h2>
            <div class="price-item">
                <div class="price-label">Durasi Sewa</div>
                <div class="price-value" id="duration">-</div>
            </div>
            <div class="price-item" id="servicesContainer" style="display: none;">
                <div class="price-label">Layanan Tambahan</div>
                <div class="price-value" id="servicesPrice">Rp 0</div>
            </div>
            <div class="price-item">
                <div class="price-label">Total Biaya</div>
                <div class="price-value" id="totalPrice">Rp 0</div>
            </div>
        </div> --}}

            <div class="price-summary">
                <h2 class="section-title">Rincian Biaya</h2>
                <div class="price-item">
                    <div class="price-label">Durasi Sewa</div>
                    <div class="price-value" id="duration">Belum Dipilih</div>
                </div>
                {{-- <div class="price-item" id="servicesContainer" style="display: none;">
                <div class="price-label">Layanan Tambahan</div>
                <div class="price-value" id="servicesPrice">Rp 0</div>
            </div> --}}
                <div class="price-item">
                    <div class="price-label">Harga Sewa</div>
                    <div class="price-value" id="sewaPrice">Rp 0</div>
                </div>
                <div class="price-item">
                    <div class="price-label">Total Biaya</div>
                    <div class="price-value" id="totalPrice">Rp 0</div>
                </div>
            </div>

            <!-- Booking Button -->
            <div class="booking-button-container">
                <button type="button" class="btn-book" id="bookButton">Pesan Sekarang</button>
            </div>
        </div>

        <!-- Lightbox -->
        <div class="lightbox" id="lightbox">
            <span class="lightbox-close">&times;</span>
            <div class="lightbox-content">
                <img src="" alt="Room Image">
            </div>
        </div>

        <!-- Bootstrap 5 JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

        <!-- Flatpickr for Date Picker -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const selectElement = document.getElementById('paketSewaSelect');

                // Ambil harga dasar (3 bulan)
                const hargaDasar3Bulan = parseFloat(document.getElementById('harga3Bulan').value) || 0;

                // Ambil elemen rincian biaya
                const durationDisplay = document.getElementById('duration');
                const sewaPriceDisplay = document.getElementById('sewaPrice');
                const totalPriceDisplay = document.getElementById('totalPrice');

                // Tambahkan event listener saat nilai select berubah
                selectElement.addEventListener('change', updatePriceSummary);

                function formatRupiah(number) {
                    return new Intl.NumberFormat('id-ID', {
                        style: 'currency',
                        currency: 'IDR',
                        minimumFractionDigits: 0
                    }).format(number);
                }

                function updatePriceSummary() {
                    const durasiBulan = selectElement.value;
                    let hargaSewa = 0;
                    let durasiTeks = "Belum Dipilih";

                    // 1. Tentukan Harga Sewa berdasarkan durasi dan harga dasar (3 bulan)
                    if (durasiBulan === '3') {
                        hargaSewa = hargaDasar3Bulan;
                        durasiTeks = "3 Bulan";
                    } else if (durasiBulan === '6') {
                        // Logika: Harga 6 Bulan = Harga 3 Bulan * 2
                        hargaSewa = hargaDasar3Bulan * 2;
                        durasiTeks = "6 Bulan";
                    } else if (durasiBulan === '12') {
                        // Logika: Harga 12 Bulan = Harga 3 Bulan * 4
                        hargaSewa = hargaDasar3Bulan * 4;
                        durasiTeks = "12 Bulan";
                    }

                    // 2. Hitung Total Biaya 
                    // (Asumsi: Total Biaya sama dengan Harga Sewa jika tidak ada layanan tambahan)
                    const totalBiaya = hargaSewa;

                    // 3. Update tampilan di Rincian Biaya
                    durationDisplay.textContent = durasiTeks;
                    sewaPriceDisplay.textContent = formatRupiah(hargaSewa);
                    totalPriceDisplay.textContent = formatRupiah(totalBiaya);
                }

                // Trigger tombol button : 
                // 1. Ambil elemen button dan form berdasarkan ID
                const bookButton = document.getElementById('bookButton');
                const bookingForm = document.getElementById('bookingForm');

                // 2. Cek apakah kedua elemen ditemukan
                if (bookButton && bookingForm) {
                    // 3. Tambahkan event listener ke button
                    bookButton.addEventListener('click', function() {
                        // Ketika button diklik, panggil method submit() pada form
                        bookingForm.submit();
                    });
                }
            });
        </script>

    </body>

</html>
