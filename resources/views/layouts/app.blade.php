<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Shantineketan College - Excellence in Education')</title>
    <meta name="description" content="@yield('description', 'Shantineketan College - A premier educational institution offering quality education in various disciplines.')">

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Animate.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Noto+Sans+Devanagari:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Custom CSS -->
    <style>
        :root {
            --primary-yellow: #FFD700;
            --secondary-yellow: #FFF8DC;
            --dark-yellow: #DAA520;
            --light-yellow: #FFFACD;
            --text-dark: #2C3E50;
            --text-light: #6C757D;
        }

        body {
            font-family: 'Poppins', sans-serif;
            color: var(--text-dark);
        }

        /* Navbar Styles */
        .navbar {
            background: linear-gradient(135deg, var(--primary-yellow) 0%, var(--dark-yellow) 100%);
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            padding: 0.75rem 0;
            position: sticky;
            top: 0;
            z-index: 1030;
            transition: all 0.3s ease;
        }

        .navbar.scrolled {
            padding: 0.5rem 0;
            box-shadow: 0 2px 20px rgba(0,0,0,0.15);
        }

        .navbar-brand {
            font-weight: 700;
            font-size: 1.5rem;
            color: var(--text-dark) !important;
            transition: all 0.3s ease;
        }

        .navbar-brand:hover {
            transform: scale(1.05);
        }

        .navbar-nav {
            align-items: center;
        }

        .navbar-nav .nav-item {
            margin: 0 0.25rem;
        }

        .navbar-nav .nav-link {
            color: var(--text-dark) !important;
            font-weight: 500;
            padding: 0.75rem 1rem !important;
            border-radius: 0.375rem;
            transition: all 0.3s ease;
            position: relative;
            text-decoration: none;
        }

        .navbar-nav .nav-link:hover,
        .navbar-nav .nav-link:focus {
            color: #fff !important;
            background-color: rgba(255,255,255,0.1);
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }

        .navbar-nav .nav-link.active {
            color: #fff !important;
            background-color: rgba(255,255,255,0.2);
            font-weight: 600;
        }

        /* Dropdown Menu Styles */
        .dropdown-menu {
            background-color: #fff;
            border: none;
            border-radius: 0.5rem;
            box-shadow: 0 0.5rem 2rem rgba(0,0,0,0.15);
            min-width: 220px;
            padding: 0.5rem 0;
            margin-top: 0.5rem;
            z-index: 1050;
            opacity: 0;
            visibility: hidden;
            transform: translateY(-10px);
            transition: all 0.3s ease;
        }

        .dropdown:hover .dropdown-menu,
        .dropdown-menu.show {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }

        .dropdown-item {
            padding: 0.75rem 1.25rem;
            color: var(--text-dark);
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            font-weight: 400;
            border: none;
            background: none;
        }

        .dropdown-item:hover,
        .dropdown-item:focus {
            background: linear-gradient(135deg, var(--primary-yellow) 0%, var(--secondary-yellow) 100%);
            color: var(--text-dark);
            transform: translateX(5px);
            padding-left: 1.5rem;
        }

        .dropdown-item i {
            width: 20px;
            text-align: center;
            color: var(--dark-yellow);
            transition: all 0.3s ease;
        }

        .dropdown-item:hover i {
            color: var(--text-dark);
            transform: scale(1.1);
        }

        .dropdown-divider {
            margin: 0.5rem 0;
            border-top: 1px solid #dee2e6;
        }

        /* Enhanced dropdown styling for course counts */
        .dropdown-item {
            position: relative;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .dropdown-item .badge {
            font-size: 0.7rem;
            padding: 0.25rem 0.5rem;
            border-radius: 10px;
            font-weight: 600;
        }

        .dropdown-item:hover .badge {
            transform: scale(1.1);
            transition: transform 0.2s ease;
        }

        /* Course dropdown specific styling */
        .nav-link .badge {
            font-size: 0.65rem;
            padding: 0.2rem 0.4rem;
            border-radius: 8px;
            font-weight: 500;
        }

        /* Responsive dropdown badges */
        @media (max-width: 768px) {
            .dropdown-item .badge {
                font-size: 0.6rem;
                padding: 0.2rem 0.4rem;
            }

            .nav-link .badge {
                display: none;
            }
        }

        /* Mobile Navbar Styles */
        .navbar-toggler {
            border: 2px solid var(--text-dark);
            padding: 0.5rem;
            border-radius: 0.375rem;
            transition: all 0.3s ease;
        }

        .navbar-toggler:hover {
            background-color: rgba(255,255,255,0.1);
            transform: scale(1.05);
        }

        .navbar-toggler-icon {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba%2844, 62, 80, 1%29' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='m4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
        }

        /* Responsive Navbar */
        @media (max-width: 991.98px) {
            .navbar-nav {
                background-color: rgba(255,255,255,0.95);
                border-radius: 0.5rem;
                padding: 1rem;
                margin-top: 1rem;
                box-shadow: 0 0.5rem 1rem rgba(0,0,0,0.15);
            }

            .navbar-nav .nav-link {
                padding: 0.75rem 1rem !important;
                margin: 0.25rem 0;
                border-radius: 0.375rem;
            }

            .dropdown-menu {
                position: static;
                float: none;
                width: 100%;
                margin-top: 0;
                background-color: #f8f9fa;
                border: 1px solid #dee2e6;
                box-shadow: inset 0 1px 3px rgba(0,0,0,0.1);
                opacity: 1;
                visibility: visible;
                transform: none;
            }

            .dropdown-item {
                padding: 0.5rem 1rem;
            }
        }

        /* Active page highlighting */
        .navbar-nav .nav-item.active .nav-link {
            background-color: rgba(255,255,255,0.2);
            color: #fff !important;
            font-weight: 600;
        }

        .dropdown-toggle::after {
            margin-left: 0.5rem;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--primary-yellow) 0%, var(--dark-yellow) 100%);
            border: none;
            color: var(--text-dark);
            font-weight: 600;
            padding: 10px 25px;
            border-radius: 25px;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(255, 215, 0, 0.4);
            color: var(--text-dark);
        }

        .hero-section {
            background: linear-gradient(135deg, var(--secondary-yellow) 0%, var(--light-yellow) 100%);
            padding: 80px 0;
        }

        .section-title {
            color: var(--text-dark);
            font-weight: 700;
            margin-bottom: 30px;
            position: relative;
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 3px;
            background: var(--primary-yellow);
        }

        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
            overflow: hidden;
        }

        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.15);
        }

        .card-header {
            background: linear-gradient(135deg, var(--primary-yellow) 0%, var(--dark-yellow) 100%);
            color: var(--text-dark);
            font-weight: 600;
            border: none;
        }

        .footer {
            background: var(--text-dark);
            color: #fff;
            padding: 50px 0 20px;
        }

        .footer h5 {
            color: var(--primary-yellow);
            margin-bottom: 20px;
        }

        .footer a {
            color: #fff;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .footer a:hover {
            color: var(--primary-yellow);
        }

        .quick-links {
            background: var(--secondary-yellow);
            padding: 20px 0;
        }

        .quick-links .btn {
            margin: 5px;
            border-radius: 20px;
        }

        .carousel-item img {
            height: 400px;
            object-fit: cover;
        }

        .carousel-caption {
            background: rgba(0,0,0,0.7);
            border-radius: 10px;
            padding: 20px;
        }

        .stats-section {
            background: var(--primary-yellow);
            padding: 50px 0;
        }

        .stat-item {
            text-align: center;
            color: var(--text-dark);
        }

        .stat-number {
            font-size: 3rem;
            font-weight: 700;
            display: block;
        }

        .breadcrumb {
            background: var(--secondary-yellow);
            border-radius: 10px;
        }

        .breadcrumb-item.active {
            color: var(--dark-yellow);
        }

        .table-striped > tbody > tr:nth-of-type(odd) > td {
            background-color: var(--light-yellow);
        }

        .alert-info {
            background-color: var(--secondary-yellow);
            border-color: var(--primary-yellow);
            color: var(--text-dark);
        }

        .form-control:focus {
            border-color: var(--primary-yellow);
            box-shadow: 0 0 0 0.2rem rgba(255, 215, 0, 0.25);
        }

        .gallery-item {
            position: relative;
            overflow: hidden;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .gallery-item img {
            transition: transform 0.3s ease;
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
            background: rgba(0,0,0,0.7);
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .gallery-item:hover .gallery-overlay {
            opacity: 1;
        }

        .news-item {
            border-left: 4px solid var(--primary-yellow);
            padding-left: 20px;
            margin-bottom: 20px;
        }

        .news-date {
            color: var(--text-light);
            font-size: 0.9rem;
        }

        .top-navbar {
            font-size: 0.9rem;
        }

        .top-navbar .social-links a {
            transition: color 0.3s ease;
        }

        .top-navbar .social-links a:hover {
            color: #fff !important;
        }

        .hindi-text {
            font-family: 'Noto Sans Devanagari', sans-serif;
            font-weight: 400;
        }

        .faculty-card {
            transition: all 0.3s ease;
            border: none;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        }

        .faculty-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.15);
        }

        .faculty-image img {
            width: 120px;
            height: 120px;
            object-fit: cover;
            border: 4px solid var(--primary-yellow);
            transition: all 0.3s ease;
        }

        .faculty-card:hover .faculty-image img {
            border-color: var(--dark-yellow);
            transform: scale(1.05);
        }

        .faculty-specialization .badge {
            font-size: 0.75rem;
            padding: 0.4em 0.6em;
            border: 1px solid var(--primary-yellow);
        }

        /* Gallery Styles */
        .gallery-card {
            position: relative;
            overflow: hidden;
            border-radius: 15px;
            transition: all 0.3s ease;
        }

        .gallery-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.15);
        }

        .gallery-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(45deg, rgba(0,0,0,0.7), rgba(255,215,0,0.3));
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .gallery-card:hover .gallery-overlay {
            opacity: 1;
        }

        .gallery-content {
            text-align: center;
            transform: translateY(20px);
            transition: transform 0.3s ease;
        }

        .gallery-card:hover .gallery-content {
            transform: translateY(0);
        }

        .gallery-filters .btn {
            border-radius: 25px;
            transition: all 0.3s ease;
        }

        .gallery-filters .btn.active {
            background: var(--primary-yellow);
            border-color: var(--primary-yellow);
            color: var(--text-dark);
        }

        .video-card {
            transition: all 0.3s ease;
        }

        .video-card:hover {
            transform: translateY(-5px);
        }

        .video-overlay {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            transition: all 0.3s ease;
        }

        .video-card:hover .video-overlay {
            transform: translate(-50%, -50%) scale(1.1);
        }

        .gallery-item {
            transition: all 0.3s ease;
        }

        .gallery-item.hidden {
            display: none;
        }

        /* Hero Slider Styles */
        .hero-slider {
            position: relative;
            overflow: hidden;
        }

        .hero-slide {
            min-height: 100vh;
            display: flex;
            align-items: center;
            position: relative;
            background-attachment: fixed;
            background-size: cover;
            background-position: center;
        }

        .min-vh-75 {
            min-height: 75vh;
        }

        .hero-content {
            z-index: 2;
            position: relative;
        }

        .hero-title {
            text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
            line-height: 1.2;
        }

        .hero-subtitle {
            text-shadow: 1px 1px 2px rgba(0,0,0,0.5);
            font-size: 1.25rem;
        }

        .hero-buttons .btn {
            border-radius: 50px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(0,0,0,0.2);
        }

        .hero-buttons .btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.3);
        }

        .hero-stats h3 {
            font-size: 2.5rem;
            margin-bottom: 0.5rem;
        }

        .hero-stats small {
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .hero-features {
            font-size: 1.1rem;
        }

        .hero-companies .badge {
            font-size: 0.9rem;
            font-weight: 500;
        }

        .carousel-indicators {
            bottom: 30px;
        }

        .carousel-indicators [data-bs-target] {
            width: 15px;
            height: 15px;
            border-radius: 50%;
            border: 2px solid var(--primary-yellow);
            background-color: transparent;
            opacity: 0.7;
            transition: all 0.3s ease;
        }

        .carousel-indicators .active {
            background-color: var(--primary-yellow);
            opacity: 1;
            transform: scale(1.2);
        }

        .carousel-control-prev,
        .carousel-control-next {
            width: 60px;
            height: 60px;
            background: rgba(255, 215, 0, 0.8);
            border-radius: 50%;
            top: 50%;
            transform: translateY(-50%);
            transition: all 0.3s ease;
        }

        .carousel-control-prev {
            left: 30px;
        }

        .carousel-control-next {
            right: 30px;
        }

        .carousel-control-prev:hover,
        .carousel-control-next:hover {
            background: var(--primary-yellow);
            transform: translateY(-50%) scale(1.1);
        }

        .carousel-control-prev-icon,
        .carousel-control-next-icon {
            width: 24px;
            height: 24px;
            background-size: 24px;
            filter: invert(1);
        }

        /* Animation delays */
        .animate__delay-1s {
            animation-delay: 0.5s;
        }

        .animate__delay-2s {
            animation-delay: 1s;
        }

        .animate__delay-3s {
            animation-delay: 1.5s;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .hero-slide {
                min-height: 80vh;
                background-attachment: scroll;
            }

            .hero-title {
                font-size: 2.5rem !important;
            }

            .hero-subtitle {
                font-size: 1.1rem;
            }

            .hero-stats h3 {
                font-size: 1.8rem;
            }

            .hero-buttons .btn {
                padding: 12px 24px;
                font-size: 0.9rem;
                margin-bottom: 10px;
            }

            .carousel-control-prev,
            .carousel-control-next {
                width: 45px;
                height: 45px;
            }

            .carousel-control-prev {
                left: 15px;
            }

            .carousel-control-next {
                right: 15px;
            }
        }

        @media (max-width: 768px) {
            .navbar-nav {
                text-align: center;
            }

            .hero-section {
                padding: 40px 0;
            }

            .stat-number {
                font-size: 2rem;
            }

            .top-navbar {
                font-size: 0.8rem;
            }

            .top-navbar .col-lg-4 {
                margin-bottom: 10px;
                text-align: center !important;
            }

            .top-navbar .contact-info {
                display: flex;
                flex-direction: column;
                align-items: center;
            }

            .top-navbar .quick-actions {
                justify-content: center;
                margin-top: 10px;
            }

            .top-navbar .social-links {
                justify-content: center;
                margin-bottom: 10px;
            }
        }
    </style>

    @stack('styles')
</head>
<body>
    <!-- Top Navbar -->
    <div class="top-navbar py-2" style="background: linear-gradient(135deg, var(--dark-yellow) 0%, var(--primary-yellow) 100%); border-bottom: 2px solid var(--primary-yellow);">
        <div class="container">
            <div class="row align-items-center">
                <!-- Logo and College Name -->
                <div class="col-lg-4 col-md-6">
                    <div class="d-flex align-items-center">
                        <img src="{{ asset('snc.jpeg') }}" alt="Shantineketan College Logo" height="50" class="me-3">
                        <div>
                            <h5 class="mb-0 text-dark fw-bold">Shantineketan College</h5>
                            <small class="text-dark hindi-text">शांतिनिकेतन कॉलेज</small>
                        </div>
                    </div>
                </div>

                <!-- Contact Information -->
                <div class="col-lg-4 col-md-6 text-center">
                    <div class="contact-info">
                        <div class="mb-1">
                            <i class="fas fa-phone text-dark me-2"></i>
                            <span class="text-dark fw-semibold">+91 94255 14719</span>
                            <span class="text-dark mx-2">|</span>
                            <span class="text-dark fw-semibold">0771-2243085</span>
                        </div>
                        <div>
                            <i class="fas fa-envelope text-dark me-2"></i>
                            <span class="text-dark fw-semibold">shantiniketan2009@yahoo.co.in</span>
                        </div>
                        <div class="mt-1">
                            <i class="fas fa-map-marker-alt text-dark me-2"></i>
                            <small class="text-dark">Changorbhatha, Raipur, Chhattisgarh</small>
                        </div>
                    </div>
                </div>

                <!-- Social Media and Quick Links -->
                <div class="col-lg-4 text-end">
                    <div class="d-flex align-items-center justify-content-end">
                        <div class="social-links me-3">
                            <a href="#" class="text-dark me-2" title="Facebook"><i class="fab fa-facebook-f"></i></a>
                            <a href="#" class="text-dark me-2" title="Twitter"><i class="fab fa-twitter"></i></a>
                            <a href="#" class="text-dark me-2" title="Instagram"><i class="fab fa-instagram"></i></a>
                            <a href="#" class="text-dark me-2" title="LinkedIn"><i class="fab fa-linkedin"></i></a>
                            <a href="#" class="text-dark me-2" title="YouTube"><i class="fab fa-youtube"></i></a>
                        </div>
                        <div class="quick-actions">
                            <a href="{{ route('admission.apply') }}" class="btn btn-dark btn-sm me-2">
                                <i class="fas fa-user-plus me-1"></i>Apply Now
                            </a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Notice Ticker -->
    <div class="notice-ticker py-2" style="background: #2C3E50; color: #fff; overflow: hidden;">
        <div class="container">
            <div class="d-flex align-items-center">
                <span class="badge bg-warning text-dark me-3 fw-bold">
                    <i class="fas fa-bell me-1"></i>NOTICE
                </span>
                <div class="ticker-content">
                    <marquee behavior="scroll" direction="left" scrollamount="3">
                        @if(isset($notices) && $notices->count() > 0)
                            @foreach($notices as $notice)
                                <span class="me-5">
                                    <i class="fas fa-{{ $notice->category === 'examination' ? 'clipboard-list' : ($notice->category === 'admission' ? 'user-plus' : ($notice->category === 'events' ? 'calendar-alt' : 'bell')) }} text-warning me-2"></i>
                                    {{ $notice->title }}
                                </span>
                            @endforeach
                        @else
                            <span class="me-5">
                                <i class="fas fa-star text-warning me-2"></i>
                                Admissions Open for Academic Year 2024-25 | Apply Now!
                            </span>
                            <span class="me-5">
                                <i class="fas fa-calendar text-warning me-2"></i>
                                Last Date for Application: 31st July 2024
                            </span>
                            <span class="me-5">
                                <i class="fas fa-trophy text-warning me-2"></i>
                                100% Placement Record for Final Year Students
                            </span>
                            <span class="me-5">
                                <i class="fas fa-graduation-cap text-warning me-2"></i>
                                NAAC 'A' Grade Accredited Institution
                            </span>
                        @endif
                    </marquee>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Navigation -->
    <nav class="navbar navbar-expand-lg" style="position: relative; background: linear-gradient(135deg, var(--primary-yellow) 0%, var(--dark-yellow) 100%); box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
        <div class="container">


            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                            About Us
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('about.index') }}"><i class="fas fa-university me-2"></i>College History</a></li>
                            <li><a class="dropdown-item" href="{{ route('about.principal') }}"><i class="fas fa-user-tie me-2"></i>Principal's Message</a></li>
                            <li><a class="dropdown-item" href="{{ route('about.infrastructure') }}"><i class="fas fa-building me-2"></i>Infrastructure</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                            Courses
                            @if(isset($courseCounts) && $courseCounts['total'] > 0)
                                <span class="badge bg-light text-dark ms-1 small">{{ $courseCounts['total'] }}</span>
                            @endif
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('courses.index') }}">
                                <i class="fas fa-list me-2"></i>All Courses
                                @if(isset($courseCounts) && $courseCounts['total'] > 0)
                                    <span class="badge bg-primary ms-auto">{{ $courseCounts['total'] }}</span>
                                @endif
                            </a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="{{ route('courses.undergraduate') }}">
                                <i class="fas fa-graduation-cap me-2"></i>Undergraduate Programs
                                @if(isset($courseCounts) && $courseCounts['undergraduate'] > 0)
                                    <span class="badge bg-success ms-auto">{{ $courseCounts['undergraduate'] }}</span>
                                @endif
                            </a></li>
                            <li><a class="dropdown-item" href="{{ route('courses.postgraduate') }}">
                                <i class="fas fa-user-graduate me-2"></i>Postgraduate Programs
                                @if(isset($courseCounts) && $courseCounts['postgraduate'] > 0)
                                    <span class="badge bg-warning text-dark ms-auto">{{ $courseCounts['postgraduate'] }}</span>
                                @endif
                            </a></li>
                            <li><a class="dropdown-item" href="{{ route('courses.diploma') }}">
                                <i class="fas fa-certificate me-2"></i>Diploma Programs
                                @if(isset($courseCounts) && $courseCounts['diploma'] > 0)
                                    <span class="badge bg-info ms-auto">{{ $courseCounts['diploma'] }}</span>
                                @endif
                            </a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admission.apply') }}">
                            <i class="fas fa-user-plus me-2"></i>Apply Now
                        </a>
                    </li>

                    <li class="nav-item dropdown d-none">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                            Students
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('student.timetable') }}">Time Table</a></li>
                            <li><a class="dropdown-item" href="{{ route('student.exams') }}">Exam Schedule</a></li>
                            <li><a class="dropdown-item" href="{{ route('student.results') }}">Results</a></li>
                            <li><a class="dropdown-item" href="{{ route('student.notices') }}">Notices</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('gallery.index') }}">Gallery</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('news.index') }}">News & Events</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('alumni.index') }}">Alumni</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('faq.index') }}">
                            <i class="fas fa-question-circle me-2"></i>FAQ
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('contact.index') }}">Contact</a>
                    </li>
                    <li class="nav-item dropdown d-none">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                            Downloads
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('downloads.prospectus') }}">Prospectus</a></li>
                            <li><a class="dropdown-item" href="{{ route('downloads.calendar') }}">Academic Calendar</a></li>
                            <li><a class="dropdown-item" href="{{ route('downloads.forms') }}">Forms</a></li>
                            <li><a class="dropdown-item" href="{{ route('downloads.brochures') }}">Brochures</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4">
                    <h5><img src="{{ asset('snc.jpeg') }}" alt="Logo" height="30" class="me-2">Shantineketan College</h5>
                    <p>Excellence in Education since 2009. We are committed to providing quality education and nurturing future leaders in Raipur, Chhattisgarh.</p>
                    <div class="social-links">
                        <a href="#" class="me-3"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="me-3"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="me-3"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="me-3"><i class="fab fa-linkedin"></i></a>
                        <a href="#" class="me-3"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>

                 <div class="col-lg-4 col-md-6 mb-4">
                    <h5>Quick Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('about.index') }}">About Us</a></li>
                        <li><a href="{{ route('courses.index') }}">Courses</a></li>
                        <li><a href="{{ route('admission.apply') }}">Apply Now</a></li>
                        <li><a href="{{ route('faculty.index') }}">Faculty</a></li>
                    </ul>
                </div>

                <div class="col-lg-2 col-md-6 mb-4 d-none">
                    <h5>Students</h5>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('student.timetable') }}">Time Table</a></li>
                        <li><a href="{{ route('student.exams') }}">Exam Schedule</a></li>
                        <li><a href="{{ route('student.results') }}">Results</a></li>
                        <li><a href="{{ route('student.notices') }}">Notices</a></li>
                        <li><a href="{{ route('alumni.index') }}">Alumni</a></li>
                    </ul>
                </div>

                <div class="col-lg-4 col-md-6 mb-4">
                    <h5>Contact Info</h5>
                    <ul class="list-unstyled">
                        <li><i class="fas fa-map-marker-alt me-2"></i>Ring Road No.1, Near Pani Tanki, Changorbhatha, Raipur, Chhattisgarh - 492001</li>
                        <li><i class="fas fa-phone me-2"></i>+91 94255 14719</li>
                        <li><i class="fas fa-phone me-2"></i>0771-2243085</li>
                        <li><i class="fas fa-envelope me-2"></i>shantiniketan2009@yahoo.co.in</li>
                    </ul>
                </div>
            </div>

            <hr class="my-4">

            <div class="row align-items-center">
                <div class="col-md-12 text-center">
                    <p class="mb-0">&copy; {{ date('Y') }} Shantineketan College. All rights reserved. Developed By <a href="https://itmingo.com/" taget="_blank">IT Mingo LLP</a></p>
                </div>
                <div class="col-md-6 text-md-end d-none">
                    <a href="{{ route('disclosure.index') }}" class="me-3">Mandatory Disclosure</a>
                    <a href="{{ route('disclosure.rti') }}" class="me-3">RTI</a>
                    <a href="{{ route('disclosure.anti-ragging') }}">Anti-Ragging Policy</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>

    <!-- Custom JS -->
    <script>
        $(document).ready(function() {
            // Initialize Bootstrap dropdowns
            var dropdownElementList = [].slice.call(document.querySelectorAll('.dropdown-toggle'));
            var dropdownList = dropdownElementList.map(function (dropdownToggleEl) {
                return new bootstrap.Dropdown(dropdownToggleEl);
            });

            // Smooth scrolling for anchor links
            $('a[href^="#"]').on('click', function(event) {
                var target = $(this.getAttribute('href'));
                if( target.length ) {
                    event.preventDefault();
                    $('html, body').stop().animate({
                        scrollTop: target.offset().top - 80
                    }, 1000);
                }
            });

            // Add active class to current nav item
            var currentPath = window.location.pathname;
            $('.navbar-nav .nav-link').each(function() {
                if ($(this).attr('href') === currentPath) {
                    $(this).addClass('active');
                }
            });

            // Back to top button
            $(window).scroll(function() {
                if ($(this).scrollTop() > 100) {
                    $('#backToTop').fadeIn();
                } else {
                    $('#backToTop').fadeOut();
                }
            });

            $('#backToTop').click(function() {
                $('html, body').animate({scrollTop: 0}, 800);
                return false;
            });
        });

        // Navbar scroll effect
        $(window).scroll(function() {
            if ($(this).scrollTop() > 50) {
                $('.navbar').addClass('scrolled');
            } else {
                $('.navbar').removeClass('scrolled');
            }
        });

        // Active page highlighting
        function setActiveNavItem() {
            var currentPath = window.location.pathname;
            $('.navbar-nav .nav-item').removeClass('active');

            $('.navbar-nav .nav-link').each(function() {
                var linkPath = $(this).attr('href');
                if (linkPath && currentPath.includes(linkPath.split('/').pop())) {
                    $(this).closest('.nav-item').addClass('active');
                }
            });

            // Special case for home page
            if (currentPath === '/' || currentPath === '/home' || currentPath.endsWith('/public/')) {
                $('.navbar-nav .nav-item').removeClass('active');
                $('.navbar-nav .nav-link[href*="home"]').closest('.nav-item').addClass('active');
            }
        }

        // Set active nav item on page load
        setActiveNavItem();

        // Smooth dropdown animations
        $('.dropdown').hover(
            function() {
                $(this).find('.dropdown-menu').stop(true, true).fadeIn(200);
            },
            function() {
                $(this).find('.dropdown-menu').stop(true, true).fadeOut(200);
            }
        );

        // Mobile menu improvements
        $('.navbar-toggler').click(function() {
            setTimeout(function() {
                if ($('.navbar-collapse').hasClass('show')) {
                    $('.navbar-nav').addClass('animate__animated animate__fadeInDown');
                }
            }, 100);
        });

        // Close mobile menu when clicking outside
        $(document).click(function(event) {
            var clickover = $(event.target);
            var _opened = $('.navbar-collapse').hasClass('show');
            if (_opened === true && !clickover.hasClass('navbar-toggler') && !clickover.closest('.navbar').length) {
                $('.navbar-toggler').click();
            }
        });
    </script>

    <!-- Back to Top Button -->
    <button id="backToTop" class="btn btn-primary position-fixed" style="bottom: 20px; right: 20px; display: none; z-index: 1000; border-radius: 50%; width: 50px; height: 50px;">
        <i class="fas fa-arrow-up"></i>
    </button>

    @stack('scripts')
</body>
</html>
