<!DOCTYPE html>
<html lang="id">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Pembayaran - Pink Residence</title>

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
                --success: #28a745;
                --warning: #ffc107;
                --danger: #dc3545;
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
            .payment-header {
                background: linear-gradient(135deg, var(--pink-primary) 0%, var(--pink-secondary) 100%);
                color: white;
                padding: 40px 0;
                position: relative;
            }

            .payment-header .logo {
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

            .payment-header .logo i {
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

            .payment-header h1 {
                font-size: 2.5rem;
                font-weight: bold;
                margin-bottom: 10px;
                text-align: center;
            }

            .payment-header p {
                font-size: 1.1rem;
                opacity: 0.9;
                text-align: center;
                max-width: 600px;
                margin: 0 auto;
            }

            /* Main Container */
            .payment-container {
                padding: 40px 0;
            }

            /* Order Summary */
            .order-summary {
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

            .order-details {
                background: var(--pink-light);
                border-radius: 15px;
                padding: 20px;
                margin-top: 20px;
            }

            .order-item {
                display: flex;
                justify-content: space-between;
                align-items: center;
                padding: 15px 0;
                border-bottom: 1px solid rgba(0, 0, 0, 0.1);
            }

            .order-item:last-child {
                border-bottom: none;
                font-weight: bold;
                font-size: 1.2rem;
                color: var(--pink-primary);
                margin-top: 10px;
                padding-top: 15px;
                border-top: 2px dashed var(--pink-primary);
            }

            .order-label {
                color: var(--text-dark);
                font-weight: 500;
            }

            .order-value {
                font-weight: 600;
                color: var(--text-dark);
            }

            .order-status {
                display: inline-block;
                padding: 5px 15px;
                border-radius: 20px;
                font-size: 0.9rem;
                font-weight: 600;
            }

            .status-pending {
                background: var(--warning);
                color: white;
            }

            .status-confirmed {
                background: var(--success);
                color: white;
            }

            /* Payment Methods */
            .payment-methods {
                background: white;
                border-radius: 20px;
                box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
                padding: 30px;
                margin-bottom: 30px;
            }

            .payment-methods-grid {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
                gap: 20px;
                margin-top: 20px;
            }

            .payment-method {
                border: 2px solid #e0e0e0;
                border-radius: 15px;
                padding: 20px;
                text-align: center;
                cursor: pointer;
                transition: all 0.3s ease;
                position: relative;
            }

            .payment-method:hover {
                border-color: var(--pink-primary);
                transform: translateY(-5px);
                box-shadow: 0 10px 20px rgba(255, 107, 157, 0.2);
            }

            .payment-method.selected {
                border-color: var(--pink-primary);
                background: var(--pink-light);
            }

            .payment-method.selected::after {
                content: '✓';
                position: absolute;
                top: 10px;
                right: 10px;
                background: var(--pink-primary);
                color: white;
                width: 25px;
                height: 25px;
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
                font-weight: bold;
            }

            .payment-icon {
                width: 60px;
                height: 60px;
                background: var(--pink-light);
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
                margin: 0 auto 15px;
                font-size: 1.8rem;
                color: var(--pink-primary);
            }

            .payment-name {
                font-weight: 600;
                color: var(--text-dark);
                margin-bottom: 5px;
            }

            .payment-description {
                font-size: 0.9rem;
                color: var(--text-light);
            }

            /* Payment Instructions */
            .payment-instructions {
                background: white;
                border-radius: 20px;
                box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
                padding: 30px;
                margin-bottom: 30px;
                display: none;
            }

            .payment-instructions.show {
                display: block;
            }

            .instruction-steps {
                margin-top: 20px;
            }

            .instruction-step {
                display: flex;
                align-items: flex-start;
                gap: 15px;
                margin-bottom: 20px;
            }

            .step-number {
                width: 30px;
                height: 30px;
                background: var(--pink-primary);
                color: white;
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
                font-weight: bold;
                flex-shrink: 0;
            }

            .step-content {
                flex: 1;
            }

            .step-title {
                font-weight: 600;
                color: var(--text-dark);
                margin-bottom: 5px;
            }

            .step-description {
                color: var(--text-light);
                font-size: 0.95rem;
            }

            /* Upload Section */
            .upload-section {
                background: white;
                border-radius: 20px;
                box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
                padding: 30px;
                margin-bottom: 30px;
            }

            .upload-area {
                border: 2px dashed #e0e0e0;
                border-radius: 15px;
                padding: 40px;
                text-align: center;
                transition: all 0.3s ease;
                cursor: pointer;
                position: relative;
                background: var(--pink-light);
            }

            .upload-area:hover {
                border-color: var(--pink-primary);
                background: var(--pink-light);
            }

            .upload-area.dragover {
                border-color: var(--pink-primary);
                background: var(--pink-light);
                transform: scale(1.02);
            }

            .upload-icon {
                font-size: 3rem;
                color: var(--pink-primary);
                margin-bottom: 20px;
            }

            .upload-text {
                color: var(--text-dark);
                font-size: 1.1rem;
                margin-bottom: 10px;
            }

            .upload-subtext {
                color: var(--text-light);
                font-size: 0.9rem;
            }

            .file-input {
                display: none;
            }

            .uploaded-file {
                margin-top: 20px;
                padding: 15px;
                background: #f8f9fa;
                border-radius: 10px;
                display: none;
                align-items: center;
                justify-content: space-between;
            }

            .uploaded-file.show {
                display: flex;
            }

            .file-info {
                display: flex;
                align-items: center;
                gap: 10px;
            }

            .file-icon {
                width: 40px;
                height: 40px;
                background: var(--pink-primary);
                color: white;
                border-radius: 8px;
                display: flex;
                align-items: center;
                justify-content: center;
            }

            .file-name {
                font-weight: 600;
                color: var(--text-dark);
            }

            .file-size {
                font-size: 0.9rem;
                color: var(--text-light);
            }

            .remove-file {
                background: var(--danger);
                color: white;
                border: none;
                border-radius: 50%;
                width: 30px;
                height: 30px;
                display: flex;
                align-items: center;
                justify-content: center;
                cursor: pointer;
                transition: all 0.3s ease;
            }

            .remove-file:hover {
                background: #c82333;
                transform: scale(1.1);
            }

            /* Preview Image */
            .preview-container {
                margin-top: 20px;
                display: none;
            }

            .preview-container.show {
                display: block;
            }

            .preview-image {
                max-width: 100%;
                max-height: 300px;
                border-radius: 10px;
                box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            }

            /* Payment Button */
            .payment-button-container {
                text-align: center;
                margin-top: 30px;
            }

            .btn-confirm-payment {
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

            .btn-confirm-payment:hover {
                transform: translateY(-2px);
                box-shadow: 0 10px 20px rgba(255, 107, 157, 0.3);
                color: white;
            }

            .btn-confirm-payment:disabled {
                background: var(--text-light);
                cursor: not-allowed;
                transform: none;
                box-shadow: none;
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

            /* Error Message */
            .error-message {
                background-color: #f8d7da;
                border: 1px solid #f5c6cb;
                color: #721c24;
                padding: 15px;
                border-radius: 10px;
                margin-bottom: 20px;
                display: none;
            }

            .error-message.show {
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

            /* Loading Spinner */
            .spinner-border {
                width: 1rem;
                height: 1rem;
                margin-right: 10px;
                display: none;
            }

            .btn-confirm-payment.loading .spinner-border {
                display: inline-block;
            }

            /* Responsive */
            @media (max-width: 768px) {
                .payment-header {
                    padding: 30px 20px;
                }

                .payment-header h1 {
                    font-size: 2rem;
                }

                .payment-header .logo {
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

                .payment-container {
                    padding: 20px 15px;
                }

                .payment-methods-grid {
                    grid-template-columns: 1fr;
                }
            }

            @media (max-width: 576px) {
                .payment-header h1 {
                    font-size: 1.8rem;
                }

                .section-title {
                    font-size: 1.5rem;
                }

                .btn-confirm-payment {
                    padding: 12px 30px;
                    font-size: 1rem;
                    width: 100%;
                }
            }
        </style>
    </head>

    <body>
        <!-- Header -->
        <div class="payment-header">
            <!-- Logo -->
            <a href="{{ url("/") }}" class="logo">
                <i class="bi bi-house-heart-fill"></i>
                Pink Residence
            </a>

            <!-- Back Button -->
            <a href="{{ url("/") }}" class="back-button" title="Kembali">
                <i class="bi bi-arrow-left"></i>
            </a>

            <h1>Detail Pemesanan</h1>
            <p>Lengkapi pembayaran Anda dengan mengupload bukti transfer</p>
        </div>

        <!-- Main Container -->
        <div class="payment-container container">

            @if (session()->has("success"))
                <div class="alert alert-success" role="alert">
                    {{ session("success") }}
                </div>
            @endif

            <!-- Success Message -->
            <div class="success-message" id="successMessage">
                <i class="bi bi-check-circle-fill"></i> Pembayaran berhasil! Kami akan memverifikasi bukti pembayaran
                Anda
                dalam 1x24 jam.
            </div>

            <!-- Error Message -->
            <div class="error-message" id="errorMessage">
                <i class="bi bi-exclamation-triangle-fill"></i> <span id="errorText">Terjadi kesalahan. Silakan coba
                    lagi.</span>
            </div>

            <!-- Order Summary -->
            <div class="order-summary">
                <h2 class="section-title">Ringkasan Pesanan</h2>
                <div class="order-details">
                    <div class="order-item">
                        <div class="order-label">Kode Pesanan</div>
                        <div class="order-value">{{ $booking->id }}</div>
                    </div>
                    <div class="order-item">
                        <div class="order-label">Tipe Kamar</div>
                        <div class="order-value" id="roomType">{{ $booking->room->tipe }}</div>
                    </div>
                    <div class="order-item">
                        <div class="order-label">Nama Kamar</div>
                        <div class="order-value" id="roomName">{{ $booking->room->nama }}</div>
                    </div>
                    <div class="order-item">
                        <div class="order-label">Check-in</div>
                        <div class="order-value" id="checkInDate">{{ date("d F Y", strtotime($booking->start_date)) }}
                        </div>
                    </div>
                    <div class="order-item">
                        <div class="order-label">Check-out</div>
                        <div class="order-value" id="checkOutDate">{{ date("d F Y", strtotime($booking->end_date)) }}
                        </div>
                    </div>
                    <div class="order-item">
                        <div class="order-label">Durasi</div>
                        <div class="order-value" id="duration">
                            {{ (strtotime($booking->end_date) - strtotime($booking->start_date)) / (60 * 60 * 24) }}
                            hari</div>
                    </div>
                    <div class="order-item">
                        <div class="order-label">Status Booking</div>
                        <div class="order-value">
                            <span class="order-status status-pending">{{ $booking->status_booking }}</span>
                        </div>
                    </div>
                    <div class="order-item">
                        <div class="order-label">Status Pembayaran</div>
                        <div class="order-value">
                            <span class="order-status status-pending">{{ $booking->status_pembayaran }}</span>
                        </div>
                    </div>

                    @if ($booking->bukti_pembayaran)
                        <div class="order-item">
                            <div class="order-label">Resi Pembayaran</div>
                            <div class="order-value" id="totalPayment">
                                <a href="{{ asset("File/" . $booking->bukti_pembayaran) }}"
                                    class="btn btn-link bg-warning"><i class="bi bi-card-text"></i></a>
                            </div>
                        </div>
                    @endif

                    <div class="order-item">
                        <div class="order-label">Total Pembayaran</div>
                        <div class="order-value" id="totalPayment">
                            {{ "Rp. " . number_format($booking->total_harga, 0, ",", ".") }}
                        </div>
                    </div>
                </div>
            </div>

            <!-- Payment Methods -->
            {{-- <div class="payment-methods">
                <h2 class="section-title">Pilih Metode Pembayaran</h2>
                <div class="payment-methods-grid">
                    <div class="payment-method" data-method="transfer" data-instructions="transfer">
                        <div class="payment-icon">
                            <i class="bi bi-bank"></i>
                        </div>
                        <div class="payment-name">Transfer Bank</div>
                        <div class="payment-description">Transfer melalui ATM atau Mobile Banking</div>
                    </div>

                    <div class="payment-method" data-method="qris" data-instructions="qris">
                        <div class="payment-icon">
                            <i class="bi bi-qr-code"></i>
                        </div>
                        <div class="payment-name">QRIS</div>
                        <div class="payment-description">Pembayaran melalui QR Code</div>
                    </div>

                    <div class="payment-method" data-method="ewallet" data-instructions="ewallet">
                        <div class="payment-icon">
                            <i class="bi bi-wallet2"></i>
                        </div>
                        <div class="payment-name">E-Wallet</div>
                        <div class="payment-description">GoPay, OVO, Dana, ShopeePay</div>
                    </div>

                    <div class="payment-method" data-method="minimarket" data-instructions="minimarket">
                        <div class="payment-icon">
                            <i class="bi bi-shop"></i>
                        </div>
                        <div class="payment-name">Minimarket</div>
                        <div class="payment-description">Indomaret, Alfamart, dll</div>
                    </div>
                </div>
            </div> --}}

            <!-- Payment Instructions -->
            <div class="payment-instructions" id="paymentInstructions">
                <h2 class="section-title">Cara Pembayaran</h2>
                <div class="instruction-steps" id="instructionSteps">
                    <!-- Instructions will be populated dynamically -->
                </div>
            </div>

            {{-- <!-- Upload Section -->
            <div class="upload-section">
                <h2 class="section-title">Upload Bukti Pembayaran</h2>
                <div class="upload-area" id="uploadArea">
                    <div class="upload-icon">
                        <i class="bi bi-cloud-upload"></i>
                    </div>
                    <div class="upload-text">Klik atau seret file ke sini</div>
                    // DOM Elements
                    const paymentMethods = document.querySelectorAll('.payment-method');
                    const uploadArea = document.getElementById('uploadArea');
                    const fileInput = document.getElementById('paymentProof');
                    const uploadedFile = document.getElementById
                    <div class="upload-subtext">Format: JPG, PNG, PDF (Maks. 5MB)</div>
                    <input type="file" class="file-input" id="paymentProof" accept="image/*,.pdf">
                </div>

                <div class="uploaded-file" id="uploadedFile">
                    <div class="file-info">
                        <div class="file-icon">
                            <i class="bi bi-file-earmark"></i>
                        </div>
                        <div>
                            <div class="file-name" id="fileName">bukti_pembayaran.jpg</div>
                            <div class="file-size" id="fileSize">2.5 MB</div>
                        </div>
                    </div>
                    <button class="remove-file" id="removeFile">
                        <i class="bi bi-x"></i>
                    </button>
                </div>

                <div class="preview-container" id="previewContainer">
                    <img src="" alt="Preview" class="preview-image" id="previewImage">
                </div>
            </div> --}}

            <form action="{{ url("upload-pembayaran/" . $booking->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="upload-section">
                    <h2 class="section-title">Upload Bukti Pembayaran</h2>

                    <div class="mb-3">
                        <label for="paymentProof" class="form-label">
                            <i class="bi bi-paperclip me-2"></i> Pilih Bukti Pembayaran (JPG, PNG)
                        </label>

                        <input class="form-control" type="file" id="paymentProof" name="bukti_pembayaran"
                            max="2000" accept="image/jpeg,image/png" required>

                        <div class="form-text mt-2">
                            Format yang diizinkan: JPG, PNG. Ukuran maksimum: 2MB.
                        </div>

                        @error("bukti_pembayaran")
                            <div class="form-text text-danger">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                    <div class="preview-container mt-3" id="previewContainer">
                        <img id="previewImage" alt="Pratinjau Bukti Pembayaran"
                            style="max-width: 100%; height: auto; max-height: 200px; border: 1px solid #ddd; border-radius: 4px;">
                    </div>
                </div>

                <!-- Payment Button -->
                <div class="payment-button-container">
                    <button type="submit" class="btn-confirm-payment" id="confirmPayment">
                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                        <span>Upload Bukti Pembayaran</span>
                    </button>
                </div>

            </form>
        </div>
    </body>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Custom JS -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const fileInput = document.getElementById('paymentProof');
            const previewImage = document.getElementById('previewImage');
            const previewContainer = document.getElementById('previewContainer');

            // Tambahkan event listener saat file dipilih
            fileInput.addEventListener('change', function() {
                const file = this.files[0];

                // 1. Cek apakah ada file yang dipilih
                if (file) {
                    // 2. Cek tipe file (Pastikan hanya gambar, tidak termasuk PDF)
                    // MIME types untuk gambar: image/jpeg, image/png
                    if (file.type.match('image.*')) {
                        const reader = new FileReader();

                        // 3. Tentukan apa yang dilakukan setelah file selesai dibaca
                        reader.onload = function(e) {
                            // Set src dari elemen img dengan URL data file
                            previewImage.src = e.target.result;
                            // Tampilkan container preview
                            previewContainer.style.display = 'block';
                        };

                        // 4. Baca file sebagai URL data (base64)
                        reader.readAsDataURL(file);
                    } else {
                        // Jika file bukan gambar (misal PDF), sembunyikan preview dan reset input
                        previewContainer.style.display = 'none';
                        previewImage.src = '';
                        // Anda bisa tambahkan pesan error di sini
                        alert("File yang dipilih bukan format gambar yang didukung (JPG/PNG).");
                        fileInput.value = ''; // Mengosongkan input file
                    }
                } else {
                    // Jika input file kosong, sembunyikan preview
                    previewContainer.style.display = 'none';
                    previewImage.src = '';
                }
            });
        });
    </script>

</html>
