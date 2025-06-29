@extends('layouts.app')

@section('title', 'Infrastructure - Shantineketan College')
@section('description', 'Explore our modern infrastructure including laboratories, library, sports facilities, and campus amenities at Shantineketan College.')

@section('content')
<!-- Breadcrumb -->
<section class="py-3">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('about.index') }}">About Us</a></li>
                <li class="breadcrumb-item active">Infrastructure</li>
            </ol>
        </nav>
    </div>
</section>

<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h1 class="display-4 fw-bold text-dark mb-4">Infrastructure</h1>
                <p class="lead">Modern facilities and state-of-the-art infrastructure for quality education</p>
            </div>
            <div class="col-lg-6">
                <img src="{{ asset('snc_college.jpeg') }}" class="img-fluid rounded shadow" alt="Shantineketan College Infrastructure">
            </div>
        </div>
    </div>
</section>

<!-- Infrastructure Overview -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-5">
                <h2 class="section-title">World-Class Facilities</h2>
                <p class="lead">Our campus is equipped with modern infrastructure to support quality education and holistic development</p>
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-body text-center">
                        <i class="fas fa-building fa-3x text-warning mb-3"></i>
                        <h5>Academic Blocks</h5>
                        <p>Spacious classrooms with modern teaching aids, smart boards, and audio-visual equipment for effective learning.</p>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-body text-center">
                        <i class="fas fa-flask fa-3x text-warning mb-3"></i>
                        <h5>Advanced Laboratories</h5>
                        <p>Well-equipped labs for Computer Science, Mechanical, Civil, Electrical, and Electronics engineering.</p>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-body text-center">
                        <i class="fas fa-book fa-3x text-warning mb-3"></i>
                        <h5>Central Library</h5>
                        <p>Extensive collection of books, journals, digital resources, and quiet study areas for students.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Detailed Infrastructure -->
<section class="py-5 bg-light">
    <div class="container">
        <!-- Computer Labs -->
        <div class="row mb-5">
            <div class="col-lg-6 mb-4">
                <img src="https://via.placeholder.com/600x400/FFD700/2C3E50?text=Computer+Laboratory" class="img-fluid rounded shadow" alt="Computer Laboratory">
            </div>
            <div class="col-lg-6">
                <h3 class="text-warning mb-3">Computer Laboratories</h3>
                <p>Our computer labs are equipped with the latest hardware and software to provide hands-on experience in programming, software development, and emerging technologies.</p>
                <ul class="list-unstyled">
                    <li class="mb-2"><i class="fas fa-check text-warning me-2"></i>100+ High-performance computers</li>
                    <li class="mb-2"><i class="fas fa-check text-warning me-2"></i>Latest software and development tools</li>
                    <li class="mb-2"><i class="fas fa-check text-warning me-2"></i>High-speed internet connectivity</li>
                    <li class="mb-2"><i class="fas fa-check text-warning me-2"></i>Air-conditioned environment</li>
                    <li class="mb-2"><i class="fas fa-check text-warning me-2"></i>24/7 technical support</li>
                </ul>
            </div>
        </div>
        
        <!-- Engineering Labs -->
        <div class="row mb-5">
            <div class="col-lg-6 order-lg-2 mb-4">
                <img src="https://via.placeholder.com/600x400/FFD700/2C3E50?text=Engineering+Workshop" class="img-fluid rounded shadow" alt="Engineering Workshop">
            </div>
            <div class="col-lg-6 order-lg-1">
                <h3 class="text-warning mb-3">Engineering Workshops</h3>
                <p>State-of-the-art workshops for mechanical, civil, and electrical engineering with modern machinery and equipment.</p>
                <ul class="list-unstyled">
                    <li class="mb-2"><i class="fas fa-check text-warning me-2"></i>CNC machines and lathes</li>
                    <li class="mb-2"><i class="fas fa-check text-warning me-2"></i>Welding and fabrication units</li>
                    <li class="mb-2"><i class="fas fa-check text-warning me-2"></i>Material testing equipment</li>
                    <li class="mb-2"><i class="fas fa-check text-warning me-2"></i>CAD/CAM software</li>
                    <li class="mb-2"><i class="fas fa-check text-warning me-2"></i>Safety equipment and protocols</li>
                </ul>
            </div>
        </div>
        
        <!-- Library -->
        <div class="row mb-5">
            <div class="col-lg-6 mb-4">
                <img src="https://via.placeholder.com/600x400/FFD700/2C3E50?text=Central+Library" class="img-fluid rounded shadow" alt="Central Library">
            </div>
            <div class="col-lg-6">
                <h3 class="text-warning mb-3">Central Library</h3>
                <p>Our library is the knowledge hub of the college with extensive resources and modern facilities for research and study.</p>
                <ul class="list-unstyled">
                    <li class="mb-2"><i class="fas fa-check text-warning me-2"></i>50,000+ books and journals</li>
                    <li class="mb-2"><i class="fas fa-check text-warning me-2"></i>Digital library with e-resources</li>
                    <li class="mb-2"><i class="fas fa-check text-warning me-2"></i>Reading halls with 200+ seats</li>
                    <li class="mb-2"><i class="fas fa-check text-warning me-2"></i>Internet and Wi-Fi facility</li>
                    <li class="mb-2"><i class="fas fa-check text-warning me-2"></i>Separate sections for reference and periodicals</li>
                </ul>
            </div>
        </div>
    </div>
</section>



<!-- Other Facilities -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-5">
                <h2 class="section-title">Additional Facilities</h2>
                <p class="lead">Supporting infrastructure for a complete campus experience</p>
            </div>
        </div>
        
        <div class="row">
            
            
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="text-center">
                    <i class="fas fa-bus fa-3x text-warning mb-3"></i>
                    <h5>Transportation</h5>
                    <p>College buses connecting major areas of Raipur for student convenience.</p>
                </div>
            </div>
            
          
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="text-center">
                    <i class="fas fa-car fa-3x text-warning mb-3"></i>
                    <h5>Parking</h5>
                    <p>Ample parking space for students, staff, and visitors with security.</p>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="text-center">
                    <i class="fas fa-wifi fa-3x text-warning mb-3"></i>
                    <h5>Wi-Fi Campus</h5>
                    <p>High-speed internet connectivity throughout the campus for digital learning.</p>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="text-center">
                    <i class="fas fa-shield-alt fa-3x text-warning mb-3"></i>
                    <h5>Security</h5>
                    <p>24/7 security with CCTV surveillance for safe and secure campus environment.</p>
                </div>
            </div>
            
            
        </div>
    </div>
</section>


@endsection
