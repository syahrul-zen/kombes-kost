@extends("Member.Layouts.main")

@section("page_css")
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
            overflow-x: hidden;
        }

        /* Navbar */
        .navbar {
            background-color: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            padding: 15px 0;
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
            background: linear-gradient(135deg, rgba(0, 0, 0, 0.7) 0%, rgba(255, 107, 157, 0.4) 100%);
        }

        .carousel-caption {
            bottom: 50%;
            transform: translateY(50%);
            text-align: left;
            left: 10%;
            right: 10%;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
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
            z-index: 10;
            background: linear-gradient(to top, rgba(0, 0, 0, 0.9) 0%, rgba(0, 0, 0, 0.6) 50%, transparent 100%);
            padding: 80px 20px 40px;
            border-radius: 0 0 20px 20px;
        }

        .mobile-hero-content h1 {
            font-size: clamp(1.8rem, 6vw, 2.5rem);
            font-weight: bold;
            margin-bottom: 15px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }

        .mobile-hero-content .subtitle {
            font-size: clamp(0.9rem, 3vw, 1.1rem);
            margin-bottom: 25px;
            opacity: 0.95;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5);
        }

        /* Info Cards Section */
        .info-cards-section {
            background-color: #f8f9fa;
            padding: clamp(40px, 8vw, 80px) 0;
            position: relative;
            z-index: 5;
            margin-top: -50px;
        }

        .info-card {
            background: white;
            border-radius: 15px;
            padding: 30px;
            text-align: center;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            height: 100%;
            border: 2px solid transparent;
        }

        .info-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
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
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
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
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            height: 100%;
            border: 2px solid transparent;
        }

        .room-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
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
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
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

        /* Location Section */
        .location-section {
            padding: clamp(60px, 10vw, 80px) 0;
            background-color: white;
        }

        .map-container {
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
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
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
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
                display: block !important;
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
        }

        /* Utility Classes */
        .text-pink {
            color: var(--pink-primary);
        }

        .bg-pink-light {
            background-color: var(--pink-light);
        }

        .shadow-custom {
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .transition-all {
            transition: all 0.3s ease;
        }
    </style>
@endsection
