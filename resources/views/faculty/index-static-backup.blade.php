@extends('layouts.app')

@section('title', 'Faculty - Shantineketan College')
@section('description', 'Meet our experienced and qualified faculty members at Shantineketan College. Our expert teachers are dedicated to providing quality education.')

@section('content')
<!-- Breadcrumb -->
<section class="py-3">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active">Faculty</li>
            </ol>
        </nav>
    </div>
</section>

<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h1 class="display-4 fw-bold text-dark mb-4">Our Faculty</h1>
                <p class="lead">Meet our experienced and dedicated faculty members who are committed to excellence in education</p>
            </div>
            <div class="col-lg-6">
                <img src="{{ asset('snc_college.jpeg') }}" class="img-fluid rounded shadow" alt="Shantineketan College Faculty">
            </div>
        </div>
    </div>
</section>

<!-- Faculty Stats -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="text-center">
                    <div class="bg-warning text-dark rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                        <i class="fas fa-user-graduate fa-2x"></i>
                    </div>
                    <h3 class="text-warning">35+</h3>
                    <p class="lead">Expert Faculty Members</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 mb-4">
                <div class="text-center">
                    <div class="bg-warning text-dark rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                        <i class="fas fa-medal fa-2x"></i>
                    </div>
                    <h3 class="text-warning">15+</h3>
                    <p class="lead">Ph.D. Holders</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 mb-4">
                <div class="text-center">
                    <div class="bg-warning text-dark rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                        <i class="fas fa-industry fa-2x"></i>
                    </div>
                    <h3 class="text-warning">20+</h3>
                    <p class="lead">Industry Experts</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 mb-4">
                <div class="text-center">
                    <div class="bg-warning text-dark rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                        <i class="fas fa-award fa-2x"></i>
                    </div>
                    <h3 class="text-warning">500+</h3>
                    <p class="lead">Years Combined Experience</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Department Filter -->
<section class="py-3">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="d-flex flex-wrap justify-content-center gap-2 mb-4">
                    <button class="btn btn-outline-primary active" data-filter="all">All Faculty</button>
                    <button class="btn btn-outline-primary" data-filter="computer-science">Computer Science</button>
                    <button class="btn btn-outline-primary" data-filter="mechanical">Mechanical</button>
                    <button class="btn btn-outline-primary" data-filter="civil">Civil</button>
                    <button class="btn btn-outline-primary" data-filter="electrical">Electrical</button>
                    <button class="btn btn-outline-primary" data-filter="management">Management</button>
                    <button class="btn btn-outline-primary" data-filter="commerce">Commerce</button>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Leadership Team -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-5">
                <h2 class="section-title">Leadership Team</h2>
                <p class="lead">Our visionary leaders guiding the institution</p>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100 faculty-card">
                    <div class="card-body text-center">
                        <div class="faculty-image mb-3">
                            <img src="https://via.placeholder.com/150x150/FFD700/2C3E50?text=Dr.+R.K." class="rounded-circle" alt="Dr. Rajesh Kumar">
                        </div>
                        <h4 class="card-title">Dr. Rajesh Kumar</h4>
                        <p class="text-warning fw-bold">Principal</p>
                        <p class="card-text">Ph.D. in Computer Science from IIT Delhi. 25+ years of experience in academia and research. Expert in AI, Machine Learning, and Data Science.</p>
                        <div class="faculty-specialization mb-3">
                            <span class="badge bg-light text-dark me-1">Artificial Intelligence</span>
                            <span class="badge bg-light text-dark me-1">Machine Learning</span>
                            <span class="badge bg-light text-dark me-1">Data Science</span>
                        </div>
                        <div class="contact-info">
                            <p class="small mb-1"><i class="fas fa-envelope me-2"></i>principal@shantiniketan.edu.in</p>
                            <p class="small mb-0"><i class="fas fa-phone me-2"></i>+91 94255 14719</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100 faculty-card">
                    <div class="card-body text-center">
                        <div class="faculty-image mb-3">
                            <img src="https://via.placeholder.com/150x150/FFD700/2C3E50?text=Dr.+A.S." class="rounded-circle" alt="Dr. Anjali Singh">
                        </div>
                        <h4 class="card-title">Dr. Anjali Singh</h4>
                        <p class="text-warning fw-bold">Vice Principal & Placement Officer</p>
                        <p class="card-text">Ph.D. in Human Resources Management. 15+ years of experience in placement and career guidance. Expert in HR and organizational behavior.</p>
                        <div class="faculty-specialization mb-3">
                            <span class="badge bg-light text-dark me-1">Human Resources</span>
                            <span class="badge bg-light text-dark me-1">Career Guidance</span>
                            <span class="badge bg-light text-dark me-1">Placement</span>
                        </div>
                        <div class="contact-info">
                            <p class="small mb-1"><i class="fas fa-envelope me-2"></i>placement@shantiniketan.edu.in</p>
                            <p class="small mb-0"><i class="fas fa-phone me-2"></i>+91 88273 76688</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Computer Science Department -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-5">
                <h2 class="section-title">Computer Science & Engineering</h2>
                <p class="lead">Leading the way in technology education</p>
            </div>
        </div>

        <div class="row" data-department="computer-science">
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100 faculty-card">
                    <div class="card-body text-center">
                        <div class="faculty-image mb-3">
                            <img src="https://via.placeholder.com/120x120/FFD700/2C3E50?text=Dr.+P.S." class="rounded-circle" alt="Dr. Priya Sharma">
                        </div>
                        <h5 class="card-title">Dr. Priya Sharma</h5>
                        <p class="text-warning fw-semibold">HOD - Computer Science</p>
                        <p class="card-text small">Ph.D. in Software Engineering<br>M.Tech from NIT Raipur<br>20+ years of experience</p>
                        <div class="faculty-specialization">
                            <span class="badge bg-light text-dark me-1">Software Engineering</span>
                            <span class="badge bg-light text-dark me-1">Web Development</span>
                            <span class="badge bg-light text-dark me-1">Database Systems</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100 faculty-card">
                    <div class="card-body text-center">
                        <div class="faculty-image mb-3">
                            <img src="https://via.placeholder.com/120x120/FFD700/2C3E50?text=Prof.+S.K." class="rounded-circle" alt="Prof. Suresh Kumar">
                        </div>
                        <h5 class="card-title">Prof. Suresh Kumar</h5>
                        <p class="text-warning fw-semibold">Professor - CSE</p>
                        <p class="card-text small">M.Tech in Computer Science<br>B.Tech from CSVTU<br>18+ years of experience</p>
                        <div class="faculty-specialization">
                            <span class="badge bg-light text-dark me-1">Data Structures</span>
                            <span class="badge bg-light text-dark me-1">Algorithms</span>
                            <span class="badge bg-light text-dark me-1">Programming</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100 faculty-card">
                    <div class="card-body text-center">
                        <div class="faculty-image mb-3">
                            <img src="https://via.placeholder.com/120x120/FFD700/2C3E50?text=Dr.+N.G." class="rounded-circle" alt="Dr. Neha Gupta">
                        </div>
                        <h5 class="card-title">Dr. Neha Gupta</h5>
                        <p class="text-warning fw-semibold">Associate Professor - CSE</p>
                        <p class="card-text small">Ph.D. in Artificial Intelligence<br>M.Tech from IIT Bombay<br>15+ years of experience</p>
                        <div class="faculty-specialization">
                            <span class="badge bg-light text-dark me-1">Artificial Intelligence</span>
                            <span class="badge bg-light text-dark me-1">Machine Learning</span>
                            <span class="badge bg-light text-dark me-1">Deep Learning</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Mechanical Engineering Department -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-5">
                <h2 class="section-title">Mechanical Engineering</h2>
                <p class="lead">Innovation in mechanical systems and manufacturing</p>
            </div>
        </div>

        <div class="row" data-department="mechanical">
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100 faculty-card">
                    <div class="card-body text-center">
                        <div class="faculty-image mb-3">
                            <img src="https://via.placeholder.com/120x120/FFD700/2C3E50?text=Prof.+A.P." class="rounded-circle" alt="Prof. Amit Patel">
                        </div>
                        <h5 class="card-title">Prof. Amit Patel</h5>
                        <p class="text-warning fw-semibold">HOD - Mechanical Engineering</p>
                        <p class="card-text small">M.Tech in Mechanical Engineering<br>B.Tech from CSVTU<br>18+ years of experience</p>
                        <div class="faculty-specialization">
                            <span class="badge bg-light text-dark me-1">Robotics</span>
                            <span class="badge bg-light text-dark me-1">Manufacturing</span>
                            <span class="badge bg-light text-dark me-1">Automation</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100 faculty-card">
                    <div class="card-body text-center">
                        <div class="faculty-image mb-3">
                            <img src="https://via.placeholder.com/120x120/FFD700/2C3E50?text=Dr.+R.S." class="rounded-circle" alt="Dr. Rajesh Singh">
                        </div>
                        <h5 class="card-title">Dr. Rajesh Singh</h5>
                        <p class="text-warning fw-semibold">Professor - Mechanical</p>
                        <p class="card-text small">Ph.D. in Thermal Engineering<br>M.Tech from NIT Raipur<br>16+ years of experience</p>
                        <div class="faculty-specialization">
                            <span class="badge bg-light text-dark me-1">Thermal Engineering</span>
                            <span class="badge bg-light text-dark me-1">Heat Transfer</span>
                            <span class="badge bg-light text-dark me-1">Fluid Mechanics</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100 faculty-card">
                    <div class="card-body text-center">
                        <div class="faculty-image mb-3">
                            <img src="https://via.placeholder.com/120x120/FFD700/2C3E50?text=Prof.+M.K." class="rounded-circle" alt="Prof. Manoj Kumar">
                        </div>
                        <h5 class="card-title">Prof. Manoj Kumar</h5>
                        <p class="text-warning fw-semibold">Associate Professor - Mechanical</p>
                        <p class="card-text small">M.Tech in Production Engineering<br>B.Tech from CSVTU<br>14+ years of experience</p>
                        <div class="faculty-specialization">
                            <span class="badge bg-light text-dark me-1">Production Engineering</span>
                            <span class="badge bg-light text-dark me-1">Quality Control</span>
                            <span class="badge bg-light text-dark me-1">Industrial Engineering</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Management Department -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-5">
                <h2 class="section-title">Management & Commerce</h2>
                <p class="lead">Shaping future business leaders</p>
            </div>
        </div>

        <div class="row" data-department="management">
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100 faculty-card">
                    <div class="card-body text-center">
                        <div class="faculty-image mb-3">
                            <img src="https://via.placeholder.com/120x120/FFD700/2C3E50?text=Dr.+S.G." class="rounded-circle" alt="Dr. Sunita Gupta">
                        </div>
                        <h5 class="card-title">Dr. Sunita Gupta</h5>
                        <p class="text-warning fw-semibold">HOD - Management</p>
                        <p class="card-text small">Ph.D. in Business Administration<br>MBA from IIM Raipur<br>15+ years of experience</p>
                        <div class="faculty-specialization">
                            <span class="badge bg-light text-dark me-1">Finance</span>
                            <span class="badge bg-light text-dark me-1">Marketing</span>
                            <span class="badge bg-light text-dark me-1">Strategic Management</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100 faculty-card">
                    <div class="card-body text-center">
                        <div class="faculty-image mb-3">
                            <img src="https://via.placeholder.com/120x120/FFD700/2C3E50?text=Prof.+R.A." class="rounded-circle" alt="Prof. Ravi Agarwal">
                        </div>
                        <h5 class="card-title">Prof. Ravi Agarwal</h5>
                        <p class="text-warning fw-semibold">Professor - Commerce</p>
                        <p class="card-text small">M.Com, CA, CS<br>MBA in Finance<br>12+ years of experience</p>
                        <div class="faculty-specialization">
                            <span class="badge bg-light text-dark me-1">Accounting</span>
                            <span class="badge bg-light text-dark me-1">Taxation</span>
                            <span class="badge bg-light text-dark me-1">Auditing</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100 faculty-card">
                    <div class="card-body text-center">
                        <div class="faculty-image mb-3">
                            <img src="https://via.placeholder.com/120x120/FFD700/2C3E50?text=Dr.+P.M." class="rounded-circle" alt="Dr. Pooja Mishra">
                        </div>
                        <h5 class="card-title">Dr. Pooja Mishra</h5>
                        <p class="text-warning fw-semibold">Associate Professor - Management</p>
                        <p class="card-text small">Ph.D. in Human Resource Management<br>MBA from Symbiosis<br>10+ years of experience</p>
                        <div class="faculty-specialization">
                            <span class="badge bg-light text-dark me-1">Human Resources</span>
                            <span class="badge bg-light text-dark me-1">Organizational Behavior</span>
                            <span class="badge bg-light text-dark me-1">Leadership</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Contact Faculty -->
<section class="py-5" style="background: linear-gradient(135deg, var(--primary-yellow) 0%, var(--dark-yellow) 100%);">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <h3 class="text-dark mb-2">Want to Connect with Our Faculty?</h3>
                <p class="text-dark mb-0">Our faculty members are always available to guide and mentor students in their academic journey.</p>
            </div>
            <div class="col-lg-4 text-lg-end">
                <a href="{{ route('contact.index') }}" class="btn btn-dark btn-lg">
                    <i class="fas fa-envelope me-2"></i>Contact Faculty
                </a>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
$(document).ready(function() {
    // Department filter functionality
    $('[data-filter]').on('click', function() {
        var filter = $(this).data('filter');

        // Update active button
        $('[data-filter]').removeClass('active');
        $(this).addClass('active');

        // Show/hide faculty cards based on filter
        if (filter === 'all') {
            $('[data-department]').show();
        } else {
            $('[data-department]').hide();
            $('[data-department="' + filter + '"]').show();
        }
    });

    // Smooth scrolling for department sections
    $('[data-filter]').on('click', function() {
        var filter = $(this).data('filter');
        if (filter !== 'all') {
            var targetSection = $('[data-department="' + filter + '"]').closest('section');
            if (targetSection.length) {
                $('html, body').animate({
                    scrollTop: targetSection.offset().top - 100
                }, 800);
            }
        }
    });
});
</script>
@endpush
