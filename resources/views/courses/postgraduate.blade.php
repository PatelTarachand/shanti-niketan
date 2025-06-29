@extends('layouts.app')

@section('title', 'Postgraduate Courses - Shantineketan College')
@section('description', 'Explore our postgraduate programs including M.Tech, MBA, M.Com and other master degree courses at Shantineketan College.')

@section('content')
<!-- Breadcrumb -->
<section class="py-3">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('courses.index') }}">Courses</a></li>
                <li class="breadcrumb-item active">Postgraduate</li>
            </ol>
        </nav>
    </div>
</section>

<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h1 class="display-4 fw-bold text-dark mb-4">Postgraduate Programs</h1>
                <p class="lead">Advanced degree programs for specialized knowledge and research opportunities</p>
            </div>
            <div class="col-lg-6">
                <img src="{{ asset('snc_college.jpeg') }}" class="img-fluid rounded shadow" alt="Postgraduate Programs">
            </div>
        </div>
    </div>
</section>

<!-- Program Overview -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-5">
                <h2 class="section-title">Master's Degree Programs</h2>
                <p class="lead">Advanced education with research focus and industry specialization</p>
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-header text-center bg-warning">
                        <h5 class="mb-0 text-dark">Engineering Programs</h5>
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fas fa-laptop-code text-warning me-2"></i>M.Tech Computer Science & Engineering</li>
                            <li class="mb-2"><i class="fas fa-cogs text-warning me-2"></i>M.Tech Mechanical Engineering</li>
                            <li class="mb-2"><i class="fas fa-building text-warning me-2"></i>M.Tech Civil Engineering</li>
                            <li class="mb-2"><i class="fas fa-bolt text-warning me-2"></i>M.Tech Electrical Engineering</li>
                        </ul>
                        <p class="text-muted small">Duration: 2 Years | AICTE Approved</p>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-header text-center bg-warning">
                        <h5 class="mb-0 text-dark">Management Programs</h5>
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fas fa-chart-line text-warning me-2"></i>Master of Business Administration (MBA)</li>
                            <li class="mb-2"><i class="fas fa-users text-warning me-2"></i>MBA in Human Resources</li>
                            <li class="mb-2"><i class="fas fa-bullhorn text-warning me-2"></i>MBA in Marketing</li>
                            <li class="mb-2"><i class="fas fa-coins text-warning me-2"></i>MBA in Finance</li>
                        </ul>
                        <p class="text-muted small">Duration: 2 Years | AICTE Approved</p>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-header text-center bg-warning">
                        <h5 class="mb-0 text-dark">Commerce Programs</h5>
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fas fa-calculator text-warning me-2"></i>Master of Commerce (M.Com)</li>
                            <li class="mb-2"><i class="fas fa-file-invoice text-warning me-2"></i>M.Com in Accounting & Finance</li>
                            <li class="mb-2"><i class="fas fa-chart-bar text-warning me-2"></i>M.Com in Banking</li>
                            <li class="mb-2"><i class="fas fa-balance-scale text-warning me-2"></i>M.Com in Taxation</li>
                        </ul>
                        <p class="text-muted small">Duration: 2 Years | University Affiliated</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- MBA Program Details -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-5">
                <h2 class="section-title">Master of Business Administration (MBA)</h2>
                <p class="lead">Comprehensive business management program for future leaders</p>
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="text-warning mb-3">Program Highlights</h5>
                        <ul>
                            <li>AICTE approved 2-year full-time program</li>
                            <li>Industry-relevant curriculum</li>
                            <li>Case study methodology</li>
                            <li>Industry internships</li>
                            <li>Guest lectures by industry experts</li>
                            <li>Live projects and consultancy</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="text-warning mb-3">Specializations</h5>
                        <div class="row">
                            <div class="col-6">
                                <ul class="list-unstyled">
                                    <li class="mb-2"><i class="fas fa-users text-warning me-2"></i>Human Resources</li>
                                    <li class="mb-2"><i class="fas fa-bullhorn text-warning me-2"></i>Marketing</li>
                                </ul>
                            </div>
                            <div class="col-6">
                                <ul class="list-unstyled">
                                    <li class="mb-2"><i class="fas fa-coins text-warning me-2"></i>Finance</li>
                                    <li class="mb-2"><i class="fas fa-cogs text-warning me-2"></i>Operations</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- M.Tech Programs -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-5">
                <h2 class="section-title">M.Tech Engineering Programs</h2>
                <p class="lead">Advanced engineering education with research focus</p>
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-3">
                            <i class="fas fa-laptop-code fa-3x text-warning me-3"></i>
                            <div>
                                <h5>M.Tech Computer Science & Engineering</h5>
                                <p class="text-muted mb-0">2 Years | 18 Seats</p>
                            </div>
                        </div>
                        <h6 class="text-warning">Specializations:</h6>
                        <ul class="small">
                            <li>Artificial Intelligence & Machine Learning</li>
                            <li>Data Science & Analytics</li>
                            <li>Cybersecurity</li>
                            <li>Software Engineering</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-3">
                            <i class="fas fa-cogs fa-3x text-warning me-3"></i>
                            <div>
                                <h5>M.Tech Mechanical Engineering</h5>
                                <p class="text-muted mb-0">2 Years | 18 Seats</p>
                            </div>
                        </div>
                        <h6 class="text-warning">Specializations:</h6>
                        <ul class="small">
                            <li>Thermal Engineering</li>
                            <li>Design & Manufacturing</li>
                            <li>Industrial Engineering</li>
                            <li>Robotics & Automation</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Admission Requirements -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-5">
                <h2 class="section-title">Admission Requirements</h2>
                <p class="lead">Eligibility criteria for postgraduate programs</p>
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card text-center h-100">
                    <div class="card-body">
                        <i class="fas fa-graduation-cap fa-3x text-warning mb-3"></i>
                        <h5>M.Tech Programs</h5>
                        <ul class="list-unstyled text-start">
                            <li>• B.Tech/B.E. in relevant discipline</li>
                            <li>• Minimum 50% marks (45% for SC/ST)</li>
                            <li>• GATE qualified (preferred)</li>
                            <li>• Valid entrance exam score</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card text-center h-100">
                    <div class="card-body">
                        <i class="fas fa-briefcase fa-3x text-warning mb-3"></i>
                        <h5>MBA Program</h5>
                        <ul class="list-unstyled text-start">
                            <li>• Bachelor's degree in any discipline</li>
                            <li>• Minimum 50% marks</li>
                            <li>• CAT/MAT/CMAT/XAT qualified</li>
                            <li>• Work experience (preferred)</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card text-center h-100">
                    <div class="card-body">
                        <i class="fas fa-calculator fa-3x text-warning mb-3"></i>
                        <h5>M.Com Program</h5>
                        <ul class="list-unstyled text-start">
                            <li>• B.Com/BBA/B.Sc. degree</li>
                            <li>• Minimum 45% marks</li>
                            <li>• Commerce background preferred</li>
                            <li>• University entrance exam</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Apply Now Section -->
<section class="py-5" style="background: linear-gradient(135deg, var(--primary-yellow) 0%, var(--dark-yellow) 100%);">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <h3 class="text-dark mb-2">Ready to Advance Your Career?</h3>
                <p class="text-dark mb-0">Join our postgraduate programs and specialize in your field of interest.</p>
            </div>
            <div class="col-lg-4 text-lg-end">
                <a href="{{ route('admission.apply') }}" class="btn btn-dark btn-lg me-3">Apply Now</a>
                <a href="{{ route('admission.process') }}" class="btn btn-outline-dark btn-lg">Admission Process</a>
            </div>
        </div>
    </div>
</section>
@endsection
