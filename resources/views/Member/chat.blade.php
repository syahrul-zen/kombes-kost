<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Komplain - Kombest Kost</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">

    <!-- Custom CSS -->
    <style>
        :root {
            --pink-primary: #FF69B4;
            --pink-secondary: #FFB6C1;
            --pink-light: #FFE4E9;
            --pink-dark: #C71585;
            --text-dark: #333;
            --text-light: #666;
            --chat-user: #FF69B4;
            --chat-admin: #f1f3f5;
            --chat-border: #e9ecef;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
            color: var(--text-dark);
        }

        /* Navbar */
        .navbar {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .navbar-brand {
            font-weight: bold;
            font-size: 1.5rem;
            color: var(--pink-primary) !important;
        }

        /* Header Section */
        .complain-header {
            background: linear-gradient(135deg, var(--pink-primary) 0%, var(--pink-dark) 100%);
            padding: 60px 0;
            color: white;
        }

        .complain-header h1 {
            font-weight: bold;
            margin-bottom: 10px;
        }

        /* Complain Form */
        .complain-form-section {
            padding: 40px 0;
        }

        .form-card {
            background: white;
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .form-control,
        .form-select {
            border: 2px solid var(--pink-light);
            border-radius: 10px;
            padding: 12px;
            transition: all 0.3s ease;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: var(--pink-primary);
            box-shadow: 0 0 0 0.2rem rgba(255, 105, 180, 0.25);
        }

        .btn-pink {
            background: var(--pink-primary);
            color: white;
            border: none;
            padding: 12px 30px;
            border-radius: 25px;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .btn-pink:hover {
            background: var(--pink-dark);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(255, 105, 180, 0.3);
        }

        /* Chat History */
        .chat-history-section {
            padding: 40px 0;
            background: white;
        }

        .section-title {
            color: var(--pink-dark);
            font-weight: bold;
            margin-bottom: 30px;
            position: relative;
            padding-bottom: 10px;
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 50px;
            height: 3px;
            background: var(--pink-primary);
        }

        .chat-container {
            background: var(--pink-light);
            border-radius: 20px;
            padding: 25px;
            margin-bottom: 25px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
            transition: transform 0.3s ease;
        }

        .chat-container:hover {
            transform: translateY(-2px);
        }

        .chat-header {
            background: white;
            border-radius: 15px;
            padding: 20px;
            margin-bottom: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        .chat-info h5 {
            color: var(--pink-dark);
            font-weight: 600;
            margin-bottom: 5px;
        }

        .chat-info small {
            color: var(--text-light);
        }

        .chat-status {
            padding: 8px 20px;
            border-radius: 25px;
            font-size: 0.85rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .status-pending {
            background: #fff3cd;
            color: #856404;
        }

        .status-responded {
            background: #d4edda;
            color: #155724;
        }

        .status-resolved {
            background: #cce5ff;
            color: #004085;
        }

        .chat-messages {
            background: white;
            border-radius: 15px;
            padding: 25px;
            min-height: 200px;
            position: relative;
            margin-bottom: 15px;
        }

        /* Chat Input Area */
        .chat-input-area {
            background: white;
            border-radius: 15px;
            padding: 15px;
            display: flex;
            gap: 10px;
            align-items: flex-end;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        .chat-input-wrapper {
            flex: 1;
            position: relative;
        }

        .chat-input {
            width: 100%;
            border: 2px solid var(--pink-light);
            border-radius: 25px;
            padding: 12px 20px;
            padding-right: 50px;
            resize: none;
            font-family: inherit;
            font-size: 0.95rem;
            transition: all 0.3s ease;
            min-height: 48px;
            max-height: 120px;
        }

        .chat-input:focus {
            outline: none;
            border-color: var(--pink-primary);
            box-shadow: 0 0 0 0.2rem rgba(255, 105, 180, 0.25);
        }

        .chat-input-icons {
            position: absolute;
            right: 15px;
            bottom: 12px;
            display: flex;
            gap: 10px;
        }

        .chat-input-icon {
            color: var(--text-light);
            cursor: pointer;
            transition: color 0.3s ease;
            font-size: 1.1rem;
        }

        .chat-input-icon:hover {
            color: var(--pink-primary);
        }

        .send-button {
            background: var(--pink-primary);
            color: white;
            border: none;
            border-radius: 50%;
            width: 48px;
            height: 48px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
            flex-shrink: 0;
        }

        .send-button:hover {
            background: var(--pink-dark);
            transform: scale(1.1);
        }

        .send-button:active {
            transform: scale(0.95);
        }

        /* Message Bubbles - PERUBAHAN UTAMA */
        .message {
            margin-bottom: 25px;
            display: flex;
            align-items: flex-end;
            animation: fadeIn 0.3s ease;
        }

        .message:last-child {
            margin-bottom: 0;
        }

        /* Chat user di kiri (pink) */
        .message.user {
            flex-direction: row;
        }

        /* Chat admin di kanan (abu-abu) */
        .message.admin {
            flex-direction: row-reverse;
        }

        .message-avatar {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            margin: 0 12px;
            object-fit: cover;
            border: 3px solid white;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .message-wrapper {
            max-width: 70%;
            position: relative;
        }

        .message-content {
            padding: 15px 20px;
            border-radius: 18px;
            position: relative;
            word-wrap: break-word;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
            transition: transform 0.2s ease;
        }

        .message-content:hover {
            transform: scale(1.02);
        }

        /* User chat (pink) - border radius kiri bawah lebih kecil */
        .message.user .message-content {
            background: var(--chat-user);
            color: white;
            border-bottom-left-radius: 5px;
        }

        /* Admin chat (abu-abu) - border radius kanan bawah lebih kecil */
        .message.admin .message-content {
            background: var(--chat-admin);
            color: var(--text-dark);
            border-bottom-right-radius: 5px;
            border: 1px solid var(--chat-border);
        }

        /* Timestamp alignment */
        .message-time {
            font-size: 0.75rem;
            color: var(--text-light);
            margin-top: 8px;
            padding: 0 5px;
        }

        /* User timestamp di kiri */
        .message.user .message-time {
            text-align: left;
        }

        /* Admin timestamp di kanan */
        .message.admin .message-time {
            text-align: right;
        }

        .complain-type {
            display: inline-block;
            background: var(--pink-secondary);
            color: var(--pink-dark);
            padding: 6px 15px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 500;
            margin-bottom: 8px;
        }

        /* Typing Indicator - di kanan untuk admin */
        .typing-indicator {
            display: flex;
            align-items: center;
            padding: 15px 20px;
            background: var(--chat-admin);
            border-radius: 18px;
            border-bottom-right-radius: 5px;
            width: fit-content;
            margin-left: auto;
            margin-right: 70px;
        }

        .typing-indicator span {
            height: 8px;
            width: 8px;
            background: var(--text-light);
            border-radius: 50%;
            display: inline-block;
            margin: 0 2px;
            animation: typing 1.4s infinite;
        }

        .typing-indicator span:nth-child(2) {
            animation-delay: 0.2s;
        }

        .typing-indicator span:nth-child(3) {
            animation-delay: 0.4s;
        }

        @keyframes typing {

            0%,
            60%,
            100% {
                transform: translateY(0);
            }

            30% {
                transform: translateY(-10px);
            }
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Quick Actions */
        .quick-actions {
            background: white;
            border-radius: 15px;
            padding: 25px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
        }

        .action-item {
            padding: 18px;
            border-radius: 12px;
            transition: all 0.3s ease;
            cursor: pointer;
            border: 2px solid transparent;
            margin-bottom: 15px;
        }

        .action-item:last-child {
            margin-bottom: 0;
        }

        .action-item:hover {
            background: var(--pink-light);
            border-color: var(--pink-primary);
            transform: translateX(5px);
        }

        .action-icon {
            width: 55px;
            height: 55px;
            background: var(--pink-light);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 12px;
            font-size: 1.5rem;
            color: var(--pink-primary);
            transition: all 0.3s ease;
        }

        .action-item:hover .action-icon {
            background: var(--pink-primary);
            color: white;
            transform: scale(1.1);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .complain-header {
                padding: 40px 0;
            }

            .message-wrapper {
                max-width: 85%;
            }

            .message-avatar {
                width: 40px;
                height: 40px;
                margin: 0 8px;
            }

            .chat-container {
                padding: 20px;
                margin-bottom: 20px;
            }

            .chat-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 10px;
            }

            .chat-input-area {
                padding: 12px;
            }

            .send-button {
                width: 44px;
                height: 44px;
            }

            /* Adjust typing indicator for mobile */
            .typing-indicator {
                margin-right: 60px;
            }
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                <i class="bi bi-house-heart-fill"></i> Kombes Kost
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="btn btn-pink ms-3" href="{{ url('/profile') }}">
                            <i class="bi bi-box-arrow-right"></i> Kembali
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Header -->
    <section class="complain-header" style="margin-top: 76px;">
        <div class="container text-center">
            <h1><i class="bi bi-chat-dots"></i> Pusat Komplain</h1>
            <p class="lead">Sampaikan keluhan Anda dan kami akan segera membantu</p>
        </div>
    </section>

    <!-- Chat History Section -->
    <section class="chat-history-section">
        <div class="container">
            <h2 class="section-title">Riwayat Komplain</h2>

            @session('success')
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endsession

            <!-- Chat 2 - Responded (Dengan input area) -->
            <div class="chat-container">
                <div class="chat-messages">

                    @foreach ($booking->complains as $complain)
                        @if ($complain->is_admin)
                            <div class="message admin">
                                <img src="{{ asset('FE/img/admin.png') }}" alt="Admin" class="message-avatar">
                                <div class="message-wrapper">
                                    <div class="message-content">
                                        {{ $complain->chat }}
                                    </div>
                                    <div class="message-time">{{ $complain->created_at->diffForHumans() }}</div>
                                </div>
                            </div>
                        @else
                            <div class="message user">
                                <img src="{{ asset('File/' . $member->foto) }}" alt="Member" class="message-avatar">
                                <div class="message-wrapper">
                                    <div class="message-content">
                                        {{ $complain->chat }}
                                    </div>
                                    <div class="message-time">{{ $complain->created_at->diffForHumans() }}</div>
                                </div>
                            </div>
                        @endif
                    @endforeach

                </div>

                <!-- Chat Input Area -->
                <form action="{{ url('/complain') }}" method="post">
                    @csrf
                    <input type="hidden" name="is_admin" value="0">
                    <input type="hidden" name="is_read" value="0">
                    <input type="hidden" name="booking_id" value="{{ $booking->id }}">

                    <div class="chat-input-area">

                        <div class="chat-input-wrapper">
                            <textarea class="chat-input" placeholder="Ketik pesan Anda..." rows="1" name="chat" required maxlength="240"></textarea>
                            {{-- <div class="chat-input-icons">
                            <i class="bi bi-paperclip chat-input-icon"></i>
                            <i class="bi bi-emoji-smile chat-input-icon"></i>
                        </div> --}}
                        </div>
                        <button class="send-button">
                            <i class="bi bi-send-fill"></i>
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </section>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
