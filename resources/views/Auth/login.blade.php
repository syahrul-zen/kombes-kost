<!DOCTYPE html>
<html lang="id">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Registrasi Member - Pink Residence</title>

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

            /* Registration Container - PERBAIKAN UTAMA */
            .registration-container {
                min-height: 100vh;
                display: flex;
                align-items: center;
                justify-content: center;
                padding: 40px 20px;
            }

            .registration-card {
                background: white;
                border-radius: 20px;
                box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
                overflow: hidden;
                max-width: 900px;
                width: 100%;
                margin: 0 auto;
            }

            .registration-header {
                background: linear-gradient(135deg, var(--pink-primary) 0%, var(--pink-secondary) 100%);
                color: white;
                padding: 40px;
                text-align: center;
                position: relative;
            }

            .registration-header h1 {
                font-size: 2.5rem;
                font-weight: bold;
                margin-bottom: 10px;
            }

            .registration-header p {
                font-size: 1.1rem;
                opacity: 0.9;
            }

            /* Logo di header */
            .registration-header .logo {
                position: absolute;
                top: 20px;
                left: 20px;
                display: flex;
                align-items: center;
                gap: 10px;
                font-weight: bold;
                font-size: 1.2rem;
                color: white;
            }

            .registration-header .logo i {
                font-size: 1.5rem;
            }

            /* Back to home button */
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

            .registration-body {
                padding: 40px;
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

            .form-check-input:checked {
                background-color: var(--pink-primary);
                border-color: var(--pink-primary);
            }

            .form-check-input:focus {
                border-color: var(--pink-primary);
                box-shadow: 0 0 0 0.25rem rgba(255, 107, 157, 0.25);
            }

            .form-check-label {
                color: var(--text-light);
                cursor: pointer;
            }

            .btn-register {
                background: linear-gradient(135deg, var(--pink-primary) 0%, var(--pink-secondary) 100%);
                color: white;
                border: none;
                padding: 15px 40px;
                border-radius: 25px;
                font-weight: 600;
                font-size: 1.1rem;
                transition: all 0.3s ease;
                width: 100%;
                margin-top: 20px;
            }

            .btn-register:hover {
                transform: translateY(-2px);
                box-shadow: 0 10px 20px rgba(255, 107, 157, 0.3);
                color: white;
            }

            .divider {
                text-align: center;
                margin: 30px 0;
                position: relative;
            }

            .divider::before {
                content: '';
                position: absolute;
                top: 50%;
                left: 0;
                right: 0;
                height: 1px;
                background-color: #e0e0e0;
            }

            .divider span {
                background: white;
                padding: 0 20px;
                color: var(--text-light);
                position: relative;
            }

            .login-link {
                text-align: center;
                margin-top: 30px;
                color: var(--text-light);
            }

            .login-link a {
                color: var(--pink-primary);
                text-decoration: none;
                font-weight: 600;
                transition: color 0.3s ease;
            }

            .login-link a:hover {
                color: var(--pink-secondary);
                text-decoration: underline;
            }

            /* Password Strength Indicator */
            .password-strength {
                margin-top: 5px;
                height: 5px;
                background-color: #e0e0e0;
                border-radius: 5px;
                overflow: hidden;
            }

            .password-strength-bar {
                height: 100%;
                width: 0;
                transition: all 0.3s ease;
                border-radius: 5px;
            }

            .strength-weak {
                width: 33.33%;
                background-color: #dc3545;
            }

            .strength-medium {
                width: 66.66%;
                background-color: #ffc107;
            }

            .strength-strong {
                width: 100%;
                background-color: #28a745;
            }

            .password-feedback {
                font-size: 0.875rem;
                margin-top: 5px;
            }

            .feedback-weak {
                color: #dc3545;
            }

            .feedback-medium {
                color: #ffc107;
            }

            .feedback-strong {
                color: #28a745;
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

            /* Error Message */
            .error-message {
                color: #dc3545;
                font-size: 0.875rem;
                margin-top: 5px;
                display: none;
            }

            .error-message.show {
                display: block;
            }

            /* Loading Spinner */
            .spinner-border {
                width: 1rem;
                height: 1rem;
                margin-right: 10px;
                display: none;
            }

            .btn-register.loading .spinner-border {
                display: inline-block;
            }

            /* Responsive */
            @media (max-width: 768px) {
                .registration-header {
                    padding: 30px 20px;
                }

                .registration-header h1 {
                    font-size: 2rem;
                }

                .registration-body {
                    padding: 30px 20px;
                }

                .registration-card {
                    margin: 0 15px;
                }

                .registration-container {
                    padding: 20px 15px;
                }

                .registration-header .logo {
                    font-size: 1rem;
                }

                .registration-header .logo i {
                    font-size: 1.2rem;
                }
            }

            @media (max-width: 576px) {
                .registration-header h1 {
                    font-size: 1.8rem;
                }

                .form-label {
                    font-size: 0.9rem;
                }

                .btn-register {
                    padding: 12px 30px;
                    font-size: 1rem;
                }

                .registration-header .logo {
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
            }
        </style>
    </head>

    <body>
        <!-- Registration Container -->
        <div class="registration-container">
            <div class="registration-card">
                <div class="registration-header">
                    <!-- Logo -->
                    <div class="logo">
                        <i class="bi bi-house-heart-fill"></i>
                        Pink Residence
                    </div>

                    <!-- Back Button -->
                    <a href="index.html" class="back-button" title="Kembali ke Beranda">
                        <i class="bi bi-arrow-left"></i>
                    </a>

                    <br>

                    <h1><i class="bi bi-person-plus-fill"></i> Login</h1>
                    {{-- <p>Bergabunglah dengan Pink Residence dan nikmati kemudahan menyewa kost</p> --}}
                </div>

                <div class="registration-body">

                    @if (session()->has("success"))
                        <div class="alert alert-success" role="alert">
                            {{ session("success") }}
                        </div>
                    @endif

                    @if (session()->has("loginError"))
                        <div class="alert alert-danger" role="alert">
                            {{ session("loginError") }}
                        </div>
                    @endif

                    <form action="{{ url("login") }}" method="POST">
                        @csrf
                        <!-- Email -->
                        <div class="form-group">
                            <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                            <input type="email" class="form-control" name="email" id="email"
                                value="{{ old("email") }}" placeholder="nama@email.com" required>
                            @error("email")
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div class="form-group">
                            <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <input type="text" name="password" class="form-control" id="password"
                                    placeholder="Masukkan password" required>
                            </div>
                            @error("password")
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-register">
                            {{-- <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> --}}
                            <span>Login</span>
                        </button>

                        <div class="divider">
                            <span>atau</span>
                        </div>

                        <div class="login-link">
                            Belum punya akun? <a href="{{ url("register") }}">Registrasi di sini</a>
                        </div>

                    </form>
                </div>
            </div>
        </div>

        <!-- Bootstrap 5 JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    </body>

</html>
