@extends('layouts.app')

@section('title', 'Shantineketan College - Excellence in Education')
@section('description', 'Welcome to Shantineketan College - A premier educational institution committed to academic excellence and holistic development of students.')

@section('content')
<!-- Dynamic Hero Slider Section -->
@if($heroSliders->count() > 0)
<section class="hero-slider">
    <div id="mainHeroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <!-- Carousel Indicators -->
        <div class="carousel-indicators">
            @foreach($heroSliders as $index => $slider)
                <button type="button" data-bs-target="#mainHeroCarousel" data-bs-slide-to="{{ $index }}" class="{{ $index === 0 ? 'active' : '' }}"></button>
            @endforeach
        </div>

        <!-- Dynamic Carousel Inner -->
        <div class="carousel-inner">
            @foreach($heroSliders as $index => $slider)
            <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                <div class="hero-slide" style="background: linear-gradient(rgba(0,0,0,0.4), rgba(255,215,0,0.3)), url('{{ $slider->image_path ? Storage::url($slider->image_path) : asset($slider->image_path) }}') center/cover;">
                    <div class="container">
                        <div class="row align-items-center min-vh-75">
                            <div class="col-lg-8 col-md-10">
                                <div class="hero-content text-white">
                                    <h1 class="hero-title display-3 fw-bold mb-4 animate__animated animate__fadeInUp">
                                        {!! str_replace(['Shantineketan College'], ['<span class="text-warning">Shantineketan College</span>'], $slider->title) !!}
                                    </h1>
                                    @if($slider->subtitle || $slider->description)
                                        <p class="hero-subtitle lead mb-4 animate__animated animate__fadeInUp animate__delay-1s">
                                            @if($slider->subtitle)
                                                {{ $slider->subtitle }}
                                                @if($slider->description)<br>@endif
                                            @endif
                                            @if($slider->description)
                                                {{ $slider->description }}
                                            @endif
                                        </p>
                                    @endif
                                    @if($slider->button_text && $slider->button_link)
                                        <div class="hero-buttons animate__animated animate__fadeInUp animate__delay-2s">
                                            <a href="{{ $slider->button_link }}" class="btn btn-warning btn-lg me-3 px-4 py-3">
                                                <i class="fas fa-{{ $slider->button_text === 'Explore Courses' ? 'graduation-cap' : ($slider->button_text === 'Apply Now' ? 'user-plus' : ($slider->button_text === 'Virtual Tour' ? 'images' : 'arrow-right')) }} me-2"></i>{{ $slider->button_text }}
                                            </a>
                                            <a href="{{ route('contact.index') }}" class="btn btn-outline-light btn-lg px-4 py-3">
                                                <i class="fas fa-phone me-2"></i>Contact Us
                                            </a>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach






        </div>

        <!-- Carousel Controls -->
        <button class="carousel-control-prev" type="button" data-bs-target="#mainHeroCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#mainHeroCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</section>
@else
<!-- Fallback Hero Section -->
<section class="hero-slider">
    <div class="hero-slide" style="background: linear-gradient(rgba(0,0,0,0.4), rgba(255,215,0,0.3)), url('{{ asset('snc_college.jpeg') }}') center/cover;">
        <div class="container">
            <div class="row align-items-center min-vh-75">
                <div class="col-lg-8 col-md-10">
                    <div class="hero-content text-white">
                        <h1 class="hero-title display-3 fw-bold mb-4">
                            Welcome to <span class="text-warning">Shantineketan College</span>
                        </h1>
                        <p class="hero-subtitle lead mb-4">
                            Excellence in Education since 2009 • Raipur, Chhattisgarh
                        </p>
                        <div class="hero-buttons">
                            <a href="{{ route('courses.index') }}" class="btn btn-warning btn-lg me-3 px-4 py-3">
                                <i class="fas fa-graduation-cap me-2"></i>Explore Courses
                            </a>
                            <a href="{{ route('contact.index') }}" class="btn btn-outline-light btn-lg px-4 py-3">
                                <i class="fas fa-phone me-2"></i>Contact Us
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endif

<!-- Notice Ticker Section -->
@if(isset($notices) && $notices->where('priority', 'high')->count() > 0)
<section class="notice-ticker bg-danger text-white py-2">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-auto">
                <span class="badge bg-white text-danger fw-bold px-3 py-2">
                    <i class="fas fa-bullhorn me-1"></i>URGENT
                </span>
            </div>
            <div class="col">
                <div class="ticker-content">
                    <div class="ticker-text">
                        @foreach($notices->where('priority', 'high')->take(3) as $urgentNotice)
                            <span class="ticker-item">
                                <a href="{{ route('notices.show', $urgentNotice) }}" class="text-white text-decoration-none">
                                    <strong>{{ $urgentNotice->title }}</strong>
                                    @if($urgentNotice->expire_date && $urgentNotice->expire_date->diffInDays(now()) <= 2)
                                        <small class="ms-2">(Expires: {{ $urgentNotice->expire_date->format('M d') }})</small>
                                    @endif
                                </a>
                            </span>
                            @if(!$loop->last) <span class="mx-4">•</span> @endif
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-auto">
                <a href="{{ route('notices.index') }}?priority=high" class="btn btn-outline-light btn-sm">
                    <i class="fas fa-eye me-1"></i>View All
                </a>
            </div>
        </div>
    </div>
</section>
@endif

<!-- Quick Links Section -->
<section class="quick-links">
    <div class="container">
        <div class="row text-center">
            <div class="col-12">
                <h3 class="mb-4">Quick Access</h3>
                <div class="d-flex flex-wrap justify-content-center gap-2">
                    <a href="{{ route('admission.apply') }}" class="btn btn-primary">
                        <i class="fas fa-user-plus me-2"></i>Apply Now
                    </a>
                    <a href="{{ route('courses.index') }}" class="btn btn-outline-primary">
                        <i class="fas fa-graduation-cap me-2"></i>Explore Courses
                    </a>
                    <a href="{{ route('notices.index') }}" class="btn btn-warning text-dark">
                        <i class="fas fa-bell me-2"></i>Latest Notices
                        @if(isset($notices) && $notices->where('priority', 'high')->count() > 0)
                            <span class="badge bg-danger ms-1">{{ $notices->where('priority', 'high')->count() }}</span>
                        @endif
                    </a>
                    <a href="{{ route('contact.index') }}" class="btn btn-outline-secondary">
                        <i class="fas fa-phone me-2"></i>Contact Us
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Statistics Section -->
<section class="stats-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="stat-item">
                    <span class="stat-number">15+</span>
                    <h5>Years of Excellence</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="stat-item">
                    <span class="stat-number">2500+</span>
                    <h5>Students Graduated</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="stat-item">
                    <span class="stat-number">35+</span>
                    <h5>Expert Faculty</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="stat-item">
                    <span class="stat-number">100%</span>
                    <h5>Placement Support</h5>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- About Section -->
<section class="py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-4">
                <h2 class="section-title">About Shantineketan College</h2>
                <p class="lead">Established in 2009 with a vision to provide quality education, Shantineketan College has been a beacon of academic excellence in Raipur, Chhattisgarh.</p>
                <p>Our institution is committed to nurturing young minds and preparing them for the challenges of tomorrow. With state-of-the-art infrastructure, experienced faculty, and industry-relevant curriculum, we ensure holistic development of our students.</p>
                <ul class="list-unstyled">
                    <li><i class="fas fa-check text-warning me-2"></i>NAAC Accredited with 'A' Grade</li>
                    <li><i class="fas fa-check text-warning me-2"></i>AICTE Approved Programs</li>
                    <li><i class="fas fa-check text-warning me-2"></i>University Affiliated</li>
                    <li><i class="fas fa-check text-warning me-2"></i>ISO 9001:2015 Certified</li>
                </ul>
                <a href="{{ route('about.index') }}" class="btn btn-primary">Learn More About Us</a>
            </div>
            <div class="col-lg-6">
                <img src="{{ asset('snc_college.jpeg') }}" class="img-fluid rounded shadow" alt="Shantineketan College">
            </div>
        </div>
    </div>
</section>

<!-- Courses Section -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-5">
                <h2 class="section-title">Our Courses</h2>
                <p class="lead">Comprehensive programs designed to meet industry demands</p>
                @if(isset($courses) && $courses->count() > 0)
                    <div class="course-stats mt-4">
                        <div class="row justify-content-center">
                            <div class="col-md-3 col-6 mb-3">
                                <div class="stat-item">
                                    <h4 class="text-primary mb-1">{{ $courses->flatten()->count() }}</h4>
                                    <small class="text-muted">Total Courses</small>
                                </div>
                            </div>
                            <div class="col-md-3 col-6 mb-3">
                                <div class="stat-item">
                                    <h4 class="text-success mb-1">{{ $courses->count() }}</h4>
                                    <small class="text-muted">Departments</small>
                                </div>
                            </div>
                            <div class="col-md-3 col-6 mb-3">
                                <div class="stat-item">
                                    <h4 class="text-warning mb-1">{{ $courses->flatten()->sum('total_seats') }}</h4>
                                    <small class="text-muted">Total Seats</small>
                                </div>
                            </div>
                            <div class="col-md-3 col-6 mb-3">
                                <div class="stat-item">
                                    <h4 class="text-info mb-1">{{ $courses->flatten()->sum('available_seats') }}</h4>
                                    <small class="text-muted">Available Seats</small>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>

        <div class="row">
            @if(isset($courses) && $courses->count() > 0)
                @foreach($courses->take(3) as $department => $departmentCourses)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card h-100 course-card">
                        <div class="card-header text-center bg-white">
                            @php
                                $departmentInfo = $departments->where('name', $department)->first();
                                $icon = 'graduation-cap'; // default icon
                                if (str_contains(strtolower($department), 'computer') || str_contains(strtolower($department), 'engineering')) {
                                    $icon = 'laptop-code';
                                } elseif (str_contains(strtolower($department), 'mechanical')) {
                                    $icon = 'cogs';
                                } elseif (str_contains(strtolower($department), 'civil')) {
                                    $icon = 'building';
                                } elseif (str_contains(strtolower($department), 'electrical')) {
                                    $icon = 'bolt';
                                } elseif (str_contains(strtolower($department), 'management') || str_contains(strtolower($department), 'mba')) {
                                    $icon = 'briefcase';
                                } elseif (str_contains(strtolower($department), 'commerce')) {
                                    $icon = 'chart-line';
                                } elseif (str_contains(strtolower($department), 'science')) {
                                    $icon = 'flask';
                                }
                            @endphp
                            <i class="fas fa-{{ $icon }} fa-3x text-warning mb-3"></i>
                            <h5 class="mb-0">{{ $department }}</h5>
                            @if($departmentInfo && $departmentInfo->code)
                                <small class="text-muted">({{ $departmentInfo->code }})</small>
                            @endif
                        </div>
                        <div class="card-body">
                            @if($departmentInfo && $departmentInfo->description)
                                <p class="text-muted">{{ Str::limit($departmentInfo->description, 100) }}</p>
                            @else
                                <p class="text-muted">Professional education programs with industry-focused curriculum and practical training.</p>
                            @endif

                            <h6 class="text-primary mb-3">Available Programs:</h6>
                            <ul class="list-unstyled">
                                @foreach($departmentCourses->take(4) as $course)
                                <li class="mb-2">
                                    <i class="fas fa-check text-warning me-2"></i>
                                    <strong>{{ $course->name }}</strong> ({{ $course->code }})
                                    <div class="small text-muted ms-3">
                                        <i class="fas fa-clock me-1"></i>{{ $course->duration_years }} Years
                                        <span class="ms-2">
                                            <i class="fas fa-users me-1"></i>{{ $course->available_seats }}/{{ $course->total_seats }} seats
                                        </span>
                                        @if($course->availability_status === 'limited')
                                            <span class="badge bg-warning text-dark ms-2 small">Limited Seats</span>
                                        @elseif($course->availability_status === 'full')
                                            <span class="badge bg-danger ms-2 small">Full</span>
                                        @endif
                                    </div>
                                </li>
                                @endforeach
                                @if($departmentCourses->count() > 4)
                                    <li class="text-muted small">
                                        <i class="fas fa-plus me-1"></i>{{ $departmentCourses->count() - 4 }} more programs available
                                    </li>
                                @endif
                            </ul>
                        </div>
                        <div class="card-footer bg-white">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="text-muted small">
                                    <i class="fas fa-rupee-sign me-1"></i>From ₹{{ number_format($departmentCourses->min('fees_per_semester')) }}/sem
                                </div>
                                <a href="{{ route('courses.index') }}?department={{ urlencode($department) }}" class="btn btn-outline-primary btn-sm">
                                    View Details <i class="fas fa-arrow-right ms-1"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            @else
                <!-- Fallback content when no courses are available -->
                <div class="col-12 text-center">
                    <div class="alert alert-info">
                        <i class="fas fa-info-circle me-2"></i>
                        <strong>Courses Coming Soon!</strong><br>
                        We are preparing comprehensive course information. Please check back soon or contact our admissions office for details.
                    </div>
                </div>
            @endif
        </div>

        <div class="row">
            <div class="col-12 text-center mt-4">
                <a href="{{ route('courses.index') }}" class="btn btn-primary btn-lg">
                    <i class="fas fa-graduation-cap me-2"></i>View All Courses
                </a>
                @if(isset($courses) && $courses->count() > 3)
                    <p class="text-muted mt-3">
                        <small>Showing {{ min(3, $courses->count()) }} of {{ $courses->count() }} departments</small>
                    </p>
                @endif
            </div>
        </div>
    </div>
</section>

<!-- Latest News & Events -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 mb-4">
                <h2 class="section-title">Latest Notices</h2>
                @if(isset($notices) && $notices->count() > 0)
                    @foreach($notices->take(3) as $notice)
                    <div class="news-item">
                        <div class="d-flex justify-content-between align-items-start mb-2">
                            <h5 class="mb-1">
                                <a href="{{ route('notices.show', $notice) }}" class="text-decoration-none text-dark">
                                    {{ Str::limit($notice->title, 60) }}
                                </a>
                            </h5>
                            @if($notice->priority === 'high')
                                <span class="badge bg-danger ms-2">Urgent</span>
                            @elseif($notice->priority === 'normal')
                                <span class="badge bg-primary ms-2">{{ ucfirst($notice->category) }}</span>
                            @endif
                        </div>
                        <p class="news-date text-muted small">
                            <i class="fas fa-calendar me-1"></i>{{ $notice->publish_date->format('F d, Y') }}
                            @if($notice->expire_date)
                                <span class="ms-2">
                                    <i class="fas fa-clock me-1"></i>Valid until: {{ $notice->expire_date->format('M d, Y') }}
                                </span>
                            @endif
                        </p>
                        <p>{{ Str::limit(strip_tags($notice->content), 120) }}</p>
                        @if($notice->attachment)
                            <small class="text-warning">
                                <i class="fas fa-paperclip me-1"></i>Document attached
                            </small>
                        @endif
                    </div>
                    @endforeach
                @else
                    <!-- Fallback content when no notices are available -->
                    <div class="news-item">
                        <h5>Welcome to Shantineketan College</h5>
                        <p class="news-date">{{ now()->format('F d, Y') }}</p>
                        <p>Stay tuned for the latest announcements and important notices from our administration.</p>
                    </div>
                @endif

                <a href="{{ route('notices.index') }}" class="btn btn-outline-primary">
                    <i class="fas fa-bell me-2"></i>View All Notices
                </a>
            </div>

            <div class="col-lg-6">
                <h2 class="section-title">Upcoming Events</h2>
                <div class="card">
                    <div class="card-body">
                        @if(isset($notices) && $notices->where('category', 'events')->count() > 0)
                            @foreach($notices->where('category', 'events')->take(3) as $event)
                            <div class="d-flex align-items-center mb-3">
                                <div class="bg-warning text-dark p-3 rounded me-3 text-center" style="min-width: 70px;">
                                    <strong>{{ $event->publish_date->format('d') }}</strong><br>
                                    <small>{{ $event->publish_date->format('M') }}</small>
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="mb-1">
                                        <a href="{{ route('notices.show', $event) }}" class="text-decoration-none text-dark">
                                            {{ Str::limit($event->title, 40) }}
                                        </a>
                                    </h6>
                                    <small class="text-muted">{{ Str::limit(strip_tags($event->content), 60) }}</small>
                                    @if($event->priority === 'high')
                                        <span class="badge bg-danger ms-2 small">Important</span>
                                    @endif
                                </div>
                            </div>
                            @endforeach
                        @else
                            <!-- Fallback events when no event notices are available -->
                            <div class="d-flex align-items-center mb-3">
                                <div class="bg-warning text-dark p-3 rounded me-3 text-center">
                                    <strong>{{ now()->addDays(10)->format('d') }}</strong><br>
                                    <small>{{ now()->addDays(10)->format('M') }}</small>
                                </div>
                                <div>
                                    <h6 class="mb-1">Upcoming Academic Events</h6>
                                    <small class="text-muted">Stay tuned for exciting events and activities</small>
                                </div>
                            </div>

                            <div class="d-flex align-items-center mb-3">
                                <div class="bg-warning text-dark p-3 rounded me-3 text-center">
                                    <strong>{{ now()->addDays(20)->format('d') }}</strong><br>
                                    <small>{{ now()->addDays(20)->format('M') }}</small>
                                </div>
                                <div>
                                    <h6 class="mb-1">Cultural Programs</h6>
                                    <small class="text-muted">Annual cultural festival and competitions</small>
                                </div>
                            </div>

                            <div class="d-flex align-items-center mb-3">
                                <div class="bg-warning text-dark p-3 rounded me-3 text-center">
                                    <strong>{{ now()->addDays(30)->format('d') }}</strong><br>
                                    <small>{{ now()->addDays(30)->format('M') }}</small>
                                </div>
                                <div>
                                    <h6 class="mb-1">Industry Interactions</h6>
                                    <small class="text-muted">Guest lectures and placement drives</small>
                                </div>
                            </div>
                        @endif

                        <a href="{{ route('notices.index') }}?category=events" class="btn btn-outline-primary w-100">
                            <i class="fas fa-calendar me-2"></i>View All Events
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Faculty Section -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-5">
                <h2 class="section-title">Our Expert Faculty</h2>
                <p class="lead">Meet our experienced and dedicated faculty members</p>
            </div>
        </div>

        <div class="row">
            @if(isset($faculty) && $faculty->count() > 0)
                @foreach($faculty->take(6) as $member)
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card h-100 faculty-card">
                        <div class="card-body text-center">
                            <div class="faculty-image mb-3">
                                @if($member->image)
                                    <img src="{{ Storage::url($member->image) }}" class="rounded-circle" alt="{{ $member->name }}" style="width: 120px; height: 120px; object-fit: cover;">
                                @else
                                    <img src="https://via.placeholder.com/120x120/FFD700/2C3E50?text={{ urlencode(substr($member->name, 0, 3)) }}" class="rounded-circle" alt="{{ $member->name }}">
                                @endif
                            </div>
                            <h5 class="card-title">{{ $member->name }}</h5>
                            <p class="text-warning fw-semibold">{{ $member->designation }}</p>
                            <p class="card-text small">{{ $member->qualification }}<br>{{ $member->experience_years }}+ years of experience</p>
                            @if($member->research_interests)
                                <div class="faculty-specialization">
                                    @foreach(array_slice($member->research_interests, 0, 2) as $interest)
                                        <span class="badge bg-light text-dark me-1">{{ $interest }}</span>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            @else
                <!-- Fallback static content -->
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card h-100 faculty-card">
                        <div class="card-body text-center">
                            <div class="faculty-image mb-3">
                                <img src="https://via.placeholder.com/120x120/FFD700/2C3E50?text=Dr.+R.K." class="rounded-circle" alt="Dr. Rajesh Kumar">
                            </div>
                            <h5 class="card-title">Dr. Rajesh Kumar</h5>
                            <p class="text-warning fw-semibold">Principal</p>
                            <p class="card-text small">Ph.D. in Computer Science<br>25+ years of experience</p>
                            <div class="faculty-specialization">
                                <span class="badge bg-light text-dark me-1">AI & ML</span>
                                <span class="badge bg-light text-dark me-1">Data Science</span>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>

        <!-- Faculty Stats -->
        <div class="row mt-5">
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="text-center">
                    <div class="bg-warning text-dark rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                        <i class="fas fa-user-graduate fa-2x"></i>
                    </div>
                    <h4 class="text-warning">35+</h4>
                    <p>Expert Faculty Members</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 mb-4">
                <div class="text-center">
                    <div class="bg-warning text-dark rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                        <i class="fas fa-medal fa-2x"></i>
                    </div>
                    <h4 class="text-warning">15+</h4>
                    <p>Ph.D. Holders</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 mb-4">
                <div class="text-center">
                    <div class="bg-warning text-dark rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                        <i class="fas fa-industry fa-2x"></i>
                    </div>
                    <h4 class="text-warning">20+</h4>
                    <p>Industry Experts</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 mb-4">
                <div class="text-center">
                    <div class="bg-warning text-dark rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                        <i class="fas fa-award fa-2x"></i>
                    </div>
                    <h4 class="text-warning">500+</h4>
                    <p>Years Combined Experience</p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 text-center mt-4">
                <a href="{{ route('faculty.index') }}" class="btn btn-primary btn-lg">
                    <i class="fas fa-users me-2"></i>View All Faculty Members
                </a>
            </div>
        </div>
    </div>
</section>


<!-- Testimonials -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-5">
                <h2 class="section-title">What Our Students Say</h2>
                <p class="lead">Success stories from our alumni</p>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-4 mb-4">
                <div class="card h-100">
                    <div class="card-body text-center">
                        <img src="https://via.placeholder.com/100x100/FFD700/2C3E50?text=Student" class="rounded-circle mb-3" alt="Student">
                        <h6>Rahul Sharma</h6>
                        <small class="text-muted">Software Engineer at Google</small>
                        <p class="mt-3">"Shantineketan College provided me with the perfect foundation for my career. The faculty support and industry exposure were exceptional."</p>
                        <div class="text-warning">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 mb-4">
                <div class="card h-100">
                    <div class="card-body text-center">
                        <img src="https://via.placeholder.com/100x100/FFD700/2C3E50?text=Student" class="rounded-circle mb-3" alt="Student">
                        <h6>Priya Patel</h6>
                        <small class="text-muted">Manager at Infosys</small>
                        <p class="mt-3">"The practical approach to learning and excellent placement support helped me secure my dream job. Grateful to be an alumna."</p>
                        <div class="text-warning">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 mb-4">
                <div class="card h-100">
                    <div class="card-body text-center">
                        <img src="https://via.placeholder.com/100x100/FFD700/2C3E50?text=Student" class="rounded-circle mb-3" alt="Student">
                        <h6>Amit Kumar</h6>
                        <small class="text-muted">Entrepreneur</small>
                        <p class="mt-3">"The entrepreneurship development programs and mentorship at Shantineketan College inspired me to start my own company."</p>
                        <div class="text-warning">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Contact CTA -->
<section class="py-5" style="background: linear-gradient(135deg, var(--primary-yellow) 0%, var(--dark-yellow) 100%);">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <h3 class="text-dark mb-2">Ready to Start Your Journey?</h3>
                <p class="text-dark mb-0">Join thousands of successful students who chose Shantineketan College for their bright future.</p>
            </div>
            <div class="col-lg-4 text-lg-end">
                <a href="{{ route('admission.apply') }}" class="btn btn-dark btn-lg me-3">Apply Now</a>
                <a href="{{ route('contact.index') }}" class="btn btn-outline-dark btn-lg">Contact Us</a>
            </div>
        </div>
    </div>
</section>
@endsection

@push('styles')
<style>
/* Notice Ticker Styles */
.notice-ticker {
    position: relative;
    overflow: hidden;
    border-bottom: 2px solid rgba(255,255,255,0.2);
}

.ticker-content {
    overflow: hidden;
    white-space: nowrap;
}

.ticker-text {
    display: inline-block;
    animation: scroll-left 30s linear infinite;
    padding-left: 100%;
}

.ticker-item {
    display: inline-block;
    padding-right: 50px;
}

.ticker-item:hover {
    text-shadow: 0 0 5px rgba(255,255,255,0.8);
}

@keyframes scroll-left {
    0% {
        transform: translate3d(100%, 0, 0);
    }
    100% {
        transform: translate3d(-100%, 0, 0);
    }
}

/* Pause animation on hover */
.notice-ticker:hover .ticker-text {
    animation-play-state: paused;
}

/* News item styles */
.news-item {
    padding: 1.5rem 0;
    border-bottom: 1px solid #eee;
    transition: all 0.3s ease;
}

.news-item:last-child {
    border-bottom: none;
}

.news-item:hover {
    background-color: #f8f9fa;
    padding-left: 1rem;
    border-radius: 8px;
}

.news-item h5 a:hover {
    color: var(--primary-yellow) !important;
    text-decoration: underline !important;
}

.news-date {
    color: #6c757d;
    font-size: 0.9rem;
    margin-bottom: 0.5rem;
}

/* Event card hover effects */
.card:hover {
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    transform: translateY(-2px);
    transition: all 0.3s ease;
}

/* Badge animations */
.badge {
    animation: pulse 2s infinite;
}

@keyframes pulse {
    0% {
        box-shadow: 0 0 0 0 rgba(220, 53, 69, 0.7);
    }
    70% {
        box-shadow: 0 0 0 10px rgba(220, 53, 69, 0);
    }
    100% {
        box-shadow: 0 0 0 0 rgba(220, 53, 69, 0);
    }
}

.badge.bg-primary {
    animation: pulse-blue 2s infinite;
}

@keyframes pulse-blue {
    0% {
        box-shadow: 0 0 0 0 rgba(13, 110, 253, 0.7);
    }
    70% {
        box-shadow: 0 0 0 10px rgba(13, 110, 253, 0);
    }
    100% {
        box-shadow: 0 0 0 0 rgba(13, 110, 253, 0);
    }
}

/* Course card styles */
.course-card {
    transition: all 0.3s ease;
    border: none;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
}

.course-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 25px rgba(0,0,0,0.15);
}

.course-card .card-header {
    border-bottom: 2px solid #f8f9fa;
    background: linear-gradient(135deg, #fff 0%, #f8f9fa 100%);
}

.course-card .fas {
    transition: all 0.3s ease;
}

.course-card:hover .fas {
    transform: scale(1.1);
    color: #ffc107 !important;
}

.stat-item {
    padding: 1rem;
    background: white;
    border-radius: 8px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    transition: all 0.3s ease;
}

.stat-item:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 15px rgba(0,0,0,0.15);
}

.course-stats .stat-item h4 {
    font-weight: 700;
    margin-bottom: 0.25rem;
}

/* Course list styling */
.course-card ul li {
    padding: 0.5rem 0;
    border-bottom: 1px solid #f1f1f1;
    transition: all 0.2s ease;
}

.course-card ul li:last-child {
    border-bottom: none;
}

.course-card ul li:hover {
    background-color: #f8f9fa;
    padding-left: 0.5rem;
    border-radius: 4px;
}

/* Badge animations for course availability */
.badge.bg-warning {
    animation: pulse-warning 2s infinite;
}

@keyframes pulse-warning {
    0% {
        box-shadow: 0 0 0 0 rgba(255, 193, 7, 0.7);
    }
    70% {
        box-shadow: 0 0 0 10px rgba(255, 193, 7, 0);
    }
    100% {
        box-shadow: 0 0 0 0 rgba(255, 193, 7, 0);
    }
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .ticker-text {
        animation-duration: 20s;
    }

    .notice-ticker .col-auto {
        display: none;
    }

    .news-item h5 {
        font-size: 1.1rem;
    }

    .course-stats .col-6 {
        margin-bottom: 1rem;
    }

    .course-card .card-body {
        padding: 1rem;
    }

    .course-card .small {
        font-size: 0.75rem;
    }
}
</style>
@endpush

@push('scripts')
<script>
// Notice ticker functionality
$(document).ready(function() {
    // Restart ticker animation when it ends
    $('.ticker-text').on('animationiteration', function() {
        $(this).css('animation-play-state', 'running');
    });

    // Add click tracking for notice links
    $('.ticker-item a, .news-item a').on('click', function() {
        // You can add analytics tracking here if needed
        console.log('Notice clicked:', $(this).text());
    });
});
</script>
@endpush

@push('scripts')
<script>
// Lightbox function
function openLightbox(imageSrc, title) {
    document.getElementById('lightboxImage').src = imageSrc;
    document.getElementById('lightboxTitle').textContent = title;

    const lightboxModal = new bootstrap.Modal(document.getElementById('lightboxModal'));
    lightboxModal.show();
}

$(document).ready(function() {
    // Auto-play main hero carousel
    $('#mainHeroCarousel').carousel({
        interval: 6000,
        ride: 'carousel',
        pause: 'hover'
    });

    // Restart animations when slide changes
    $('#mainHeroCarousel').on('slide.bs.carousel', function (e) {
        // Remove animation classes from previous slide
        $(e.relatedTarget).prev().find('.animate__animated').removeClass('animate__animated animate__fadeInUp animate__fadeInRight animate__fadeInLeft animate__zoomIn');

        // Add animation classes to new slide after a short delay
        setTimeout(function() {
            $(e.relatedTarget).find('.animate__animated').each(function(index) {
                var $this = $(this);
                var animationClass = 'animate__fadeInUp';

                if ($this.hasClass('animate__fadeInRight')) animationClass = 'animate__fadeInRight';
                if ($this.hasClass('animate__fadeInLeft')) animationClass = 'animate__fadeInLeft';
                if ($this.hasClass('animate__zoomIn')) animationClass = 'animate__zoomIn';

                $this.addClass('animate__animated ' + animationClass);
            });
        }, 100);
    });

    // Counter animation
    $('.stat-number').each(function() {
        var $this = $(this);
        var countTo = $this.text().replace(/[^0-9]/g, '');

        $({ countNum: 0 }).animate({
            countNum: countTo
        }, {
            duration: 2000,
            easing: 'linear',
            step: function() {
                var suffix = $this.text().replace(/[0-9]/g, '');
                $this.text(Math.floor(this.countNum) + suffix);
            },
            complete: function() {
                var suffix = $this.text().replace(/[0-9]/g, '');
                $this.text(this.countNum + suffix);
            }
        });
    });

    // Gallery filter functionality
    $('.gallery-filters .btn').on('click', function() {
        var filter = $(this).data('filter');

        // Update active button
        $('.gallery-filters .btn').removeClass('active');
        $(this).addClass('active');

        // Show/hide gallery items with animation
        if (filter === 'all') {
            $('.gallery-item').removeClass('hidden').fadeIn(300);
        } else {
            $('.gallery-item').each(function() {
                var category = $(this).data('category');
                if (category === filter) {
                    $(this).removeClass('hidden').fadeIn(300);
                } else {
                    $(this).addClass('hidden').fadeOut(300);
                }
            });
        }
    });

    // Pause video when modal is closed
    $('.modal').on('hidden.bs.modal', function () {
        $(this).find('iframe').each(function() {
            var src = $(this).attr('src');
            $(this).attr('src', '');
            $(this).attr('src', src);
        });
    });

    // Gallery item hover effects
    $('.gallery-item').hover(
        function() {
            $(this).find('.gallery-overlay').addClass('show');
        },
        function() {
            $(this).find('.gallery-overlay').removeClass('show');
        }
    );

    // Video card hover effects
    $('.video-card').hover(
        function() {
            $(this).find('.video-overlay').addClass('pulse');
        },
        function() {
            $(this).find('.video-overlay').removeClass('pulse');
        }
    );

    // Smooth scrolling for gallery section
    $('a[href^="#gallery"]').on('click', function(event) {
        var target = $(this.getAttribute('href'));
        if( target.length ) {
            event.preventDefault();
            $('html, body').stop().animate({
                scrollTop: target.offset().top - 100
            }, 1000);
        }
    });

    // Lazy loading for gallery images
    if ('IntersectionObserver' in window) {
        const imageObserver = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const img = entry.target;
                    img.classList.remove('lazy');
                    imageObserver.unobserve(img);
                }
            });
        });

        document.querySelectorAll('img[data-src]').forEach(img => {
            imageObserver.observe(img);
        });
    }
});
</script>
@endpush
