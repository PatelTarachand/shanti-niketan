@extends('layouts.app')

@section('title', 'About Us - Shantineketan College')
@section('description', 'Learn about Shantineketan College - our history, vision, mission, and commitment to excellence in education.')

@section('content')
<!-- Breadcrumb -->
<section class="py-3">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active">About Us</li>
            </ol>
        </nav>
    </div>
</section>

<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h1 class="display-4 fw-bold text-dark mb-4">About Shantineketan College</h1>
                <p class="lead">Excellence in Education since 2009 - Raipur, Chhattisgarh</p>
            </div>
            <div class="col-lg-6">
                <img src="{{ asset('snc_college.jpeg') }}" class="img-fluid rounded shadow" alt="Shantineketan College Building">
            </div>
        </div>
    </div>
</section>

<!-- College History -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <h2 class="section-title text-center">Our History</h2>
                <p class="lead text-center mb-5">A journey of excellence spanning over one and a half decades</p>

                <div class="timeline">
                    <div class="row mb-4">
                        <div class="col-md-3 text-md-end">
                            <h5 class="text-warning">2009</h5>
                        </div>
                        <div class="col-md-9">
                            <h6>Foundation</h6>
                            <p>Shantineketan College was established in Raipur, Chhattisgarh with a vision to provide quality technical education in the region.</p>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-3 text-md-end">
                            <h5 class="text-warning">2012</h5>
                        </div>
                        <div class="col-md-9">
                            <h6>AICTE Approval</h6>
                            <p>Received AICTE approval for engineering programs, marking a significant milestone in our journey.</p>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-3 text-md-end">
                            <h5 class="text-warning">2015</h5>
                        </div>
                        <div class="col-md-9">
                            <h6>University Affiliation</h6>
                            <p>Affiliated with Chhattisgarh Swami Vivekanand Technical University, ensuring recognized degrees and quality education standards.</p>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-3 text-md-end">
                            <h5 class="text-warning">2018</h5>
                        </div>
                        <div class="col-md-9">
                            <h6>NAAC Accreditation</h6>
                            <p>Achieved NAAC accreditation with 'A' grade, recognizing our commitment to quality education.</p>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-3 text-md-end">
                            <h5 class="text-warning">2022</h5>
                        </div>
                        <div class="col-md-9">
                            <h6>Digital Transformation</h6>
                            <p>Embraced digital learning platforms and smart classrooms for enhanced educational experience during and post-pandemic.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Vision & Mission -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 mb-4">
                <div class="card h-100">
                    <div class="card-header text-center">
                        <i class="fas fa-eye fa-3x text-warning mb-3 mt-3" style="color:white!important;"></i>
                        <h3>Our Vision</h3>
                    </div>
                    <div class="card-body">
                        <p class="lead text-center">To be a premier educational institution that nurtures innovative minds, fosters excellence in learning, and contributes to the socio-economic development of the nation.</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 mb-4">
                <div class="card h-100">
                    <div class="card-header text-center">
                        <i class="fas fa-bullseye fa-3x text-warning mb-3 mt-3" style="color:white!important;"></i>
                        <h3>Our Mission</h3>
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled">
                            <li><i class="fas fa-check text-warning me-2"></i>Provide quality education with industry-relevant curriculum</li>
                            <li><i class="fas fa-check text-warning me-2"></i>Foster research and innovation among students and faculty</li>
                            <li><i class="fas fa-check text-warning me-2"></i>Develop ethical and responsible global citizens</li>
                            <li><i class="fas fa-check text-warning me-2"></i>Promote entrepreneurship and leadership skills</li>
                            <li><i class="fas fa-check text-warning me-2"></i>Ensure holistic development of personality</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Core Values -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-5">
                <h2 class="section-title">Our Core Values</h2>
                <p class="lead">The principles that guide our educational philosophy</p>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="text-center">
                    <div class="bg-warning text-dark rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                        <i class="fas fa-star fa-2x"></i>
                    </div>
                    <h5>Excellence</h5>
                    <p>Striving for the highest standards in education, research, and service.</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 mb-4">
                <div class="text-center">
                    <div class="bg-warning text-dark rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                        <i class="fas fa-handshake fa-2x"></i>
                    </div>
                    <h5>Integrity</h5>
                    <p>Maintaining honesty, transparency, and ethical conduct in all our endeavors.</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 mb-4">
                <div class="text-center">
                    <div class="bg-warning text-dark rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                        <i class="fas fa-lightbulb fa-2x"></i>
                    </div>
                    <h5>Innovation</h5>
                    <p>Encouraging creativity, critical thinking, and innovative solutions.</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 mb-4">
                <div class="text-center">
                    <div class="bg-warning text-dark rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                        <i class="fas fa-users fa-2x"></i>
                    </div>
                    <h5>Inclusivity</h5>
                    <p>Embracing diversity and providing equal opportunities for all students.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Leadership Team -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-5">
                <h2 class="section-title">Leadership Team</h2>
                <p class="lead">Meet the visionaries leading our institution</p>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card text-center">
                    <div class="card-body">
                        <img src="https://via.placeholder.com/150x150/FFD700/2C3E50?text=Chairman" class="rounded-circle mb-3" alt="Chairman">
                        <h5>Dr. Rajesh Kumar</h5>
                        <p class="text-muted">Chairman</p>
                        <p>Visionary leader with 30+ years of experience in education and administration.</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card text-center">
                    <div class="card-body">
                        <img src="https://via.placeholder.com/150x150/FFD700/2C3E50?text=Principal" class="rounded-circle mb-3" alt="Principal">
                        <h5>Dr. Priya Sharma</h5>
                        <p class="text-muted">Principal</p>
                        <p>Distinguished academician with expertise in engineering education and research.</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card text-center">
                    <div class="card-body">
                        <img src="https://via.placeholder.com/150x150/FFD700/2C3E50?text=Director" class="rounded-circle mb-3" alt="Director">
                        <h5>Prof. Amit Patel</h5>
                        <p class="text-muted">Academic Director</p>
                        <p>Renowned educator focused on curriculum development and academic excellence.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 text-center">
                <a href="{{ route('about.principal') }}" class="btn btn-primary">Read Principal's Message</a>
            </div>
        </div>
    </div>
</section>

<!-- Achievements -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-5">
                <h2 class="section-title">Our Achievements</h2>
                <p class="lead">Recognition and accolades that make us proud</p>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card text-center h-100">
                    <div class="card-body">
                        <i class="fas fa-award fa-3x text-warning mb-3"></i>
                        <h5>NAAC 'A' Grade</h5>
                        <p>Accredited by National Assessment and Accreditation Council</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card text-center h-100">
                    <div class="card-body">
                        <i class="fas fa-certificate fa-3x text-warning mb-3"></i>
                        <h5>ISO 9001:2015</h5>
                        <p>Quality Management System Certification</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card text-center h-100">
                    <div class="card-body">
                        <i class="fas fa-trophy fa-3x text-warning mb-3"></i>
                        <h5>Best College Award</h5>
                        <p>State Government Recognition for Excellence in Education</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card text-center h-100">
                    <div class="card-body">
                        <i class="fas fa-medal fa-3x text-warning mb-3"></i>
                        <h5>100% Placement</h5>
                        <p>Consistent track record of student placement success</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Quick Links -->
<section class="py-5" style="background: linear-gradient(135deg, var(--primary-yellow) 0%, var(--dark-yellow) 100%);">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h3 class="text-dark mb-4">Explore More About Us</h3>
                <div class="d-flex flex-wrap justify-content-center gap-3">
                    <a href="{{ route('about.principal') }}" class="btn btn-dark">Principal's Message</a>
                    <a href="{{ route('about.accreditation') }}" class="btn btn-outline-dark">Accreditation</a>
                    <a href="{{ route('faculty.index') }}" class="btn btn-outline-dark">Our Faculty</a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
