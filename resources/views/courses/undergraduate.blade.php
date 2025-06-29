@extends('layouts.app')

@section('title', 'Undergraduate Courses - Shantineketan College')
@section('description', 'Explore our undergraduate programs including B.Tech, BBA, B.Com, and other bachelor degree courses at Shantineketan College.')

@section('content')
<!-- Breadcrumb -->
<section class="py-3">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('courses.index') }}">Courses</a></li>
                <li class="breadcrumb-item active">Undergraduate</li>
            </ol>
        </nav>
    </div>
</section>

<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h1 class="display-4 fw-bold text-dark mb-4">Undergraduate Programs</h1>
                <p class="lead">Bachelor's degree programs designed to build strong foundations for successful careers</p>
            </div>
            <div class="col-lg-6">
                <img src="{{ asset('snc_college.jpeg') }}" class="img-fluid rounded shadow" alt="Undergraduate Programs">
            </div>
        </div>
    </div>
</section>

<!-- Program Overview -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-5">
                <h2 class="section-title">Bachelor's Degree Programs</h2>
                <p class="lead">Comprehensive undergraduate education with industry-relevant curriculum</p>
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
                            <li class="mb-2"><i class="fas fa-laptop-code text-warning me-2"></i>B.Tech Computer Science & Engineering</li>
                            <li class="mb-2"><i class="fas fa-cogs text-warning me-2"></i>B.Tech Mechanical Engineering</li>
                            <li class="mb-2"><i class="fas fa-building text-warning me-2"></i>B.Tech Civil Engineering</li>
                            <li class="mb-2"><i class="fas fa-bolt text-warning me-2"></i>B.Tech Electrical Engineering</li>
                        </ul>
                        <p class="text-muted small">Duration: 4 Years | AICTE Approved</p>
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
                            <li class="mb-2"><i class="fas fa-chart-line text-warning me-2"></i>Bachelor of Business Administration (BBA)</li>
                            <li class="mb-2"><i class="fas fa-users text-warning me-2"></i>BBA in Human Resources</li>
                            <li class="mb-2"><i class="fas fa-bullhorn text-warning me-2"></i>BBA in Marketing</li>
                            <li class="mb-2"><i class="fas fa-coins text-warning me-2"></i>BBA in Finance</li>
                        </ul>
                        <p class="text-muted small">Duration: 3 Years | University Affiliated</p>
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
                            <li class="mb-2"><i class="fas fa-calculator text-warning me-2"></i>Bachelor of Commerce (B.Com)</li>
                            <li class="mb-2"><i class="fas fa-file-invoice text-warning me-2"></i>B.Com in Accounting & Finance</li>
                            <li class="mb-2"><i class="fas fa-chart-bar text-warning me-2"></i>B.Com in Banking & Insurance</li>
                            <li class="mb-2"><i class="fas fa-balance-scale text-warning me-2"></i>B.Com in Taxation</li>
                        </ul>
                        <p class="text-muted small">Duration: 3 Years | University Affiliated</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Detailed Course Information -->
<section class="py-5 bg-light">
    <div class="container">
        <!-- B.Tech Programs -->
        <div class="row mb-5">
            <div class="col-12">
                <h2 class="section-title text-center mb-5">B.Tech Engineering Programs</h2>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-3">
                            <i class="fas fa-laptop-code fa-3x text-warning me-3"></i>
                            <div>
                                <h5>B.Tech Computer Science & Engineering</h5>
                                <p class="text-muted mb-0">4 Years</p>
                            </div>
                        </div>
                        <p>Comprehensive program covering programming, software development, AI, machine learning, and emerging technologies.</p>
                        <h6 class="text-warning">Key Subjects:</h6>
                        <ul class="small">
                            <li>Data Structures & Algorithms</li>
                            <li>Database Management Systems</li>
                            <li>Computer Networks</li>
                            <li>Artificial Intelligence</li>
                            <li>Software Engineering</li>
                        </ul>
                        <h6 class="text-warning">Career Opportunities:</h6>
                        <p class="small">Software Developer, System Analyst, Data Scientist, AI Engineer, Cybersecurity Specialist</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-3">
                            <i class="fas fa-cogs fa-3x text-warning me-3"></i>
                            <div>
                                <h5>B.Tech Mechanical Engineering</h5>
                                <p class="text-muted mb-0">4 Years</p>
                            </div>
                        </div>
                        <p>Focus on design, manufacturing, thermal systems, and mechanical automation with hands-on experience.</p>
                        <h6 class="text-warning">Key Subjects:</h6>
                        <ul class="small">
                            <li>Thermodynamics</li>
                            <li>Fluid Mechanics</li>
                            <li>Machine Design</li>
                            <li>Manufacturing Processes</li>
                            <li>Robotics & Automation</li>
                        </ul>
                        <h6 class="text-warning">Career Opportunities:</h6>
                        <p class="small">Design Engineer, Production Manager, Quality Control Engineer, R&D Engineer</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-3">
                            <i class="fas fa-building fa-3x text-warning me-3"></i>
                            <div>
                                <h5>B.Tech Civil Engineering</h5>
                                <p class="text-muted mb-0">4 Years</p>
                            </div>
                        </div>
                        <p>Infrastructure development, construction technology, environmental engineering, and urban planning.</p>
                        <h6 class="text-warning">Key Subjects:</h6>
                        <ul class="small">
                            <li>Structural Engineering</li>
                            <li>Geotechnical Engineering</li>
                            <li>Transportation Engineering</li>
                            <li>Environmental Engineering</li>
                            <li>Construction Management</li>
                        </ul>
                        <h6 class="text-warning">Career Opportunities:</h6>
                        <p class="small">Site Engineer, Project Manager, Structural Designer, Urban Planner</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-3">
                            <i class="fas fa-bolt fa-3x text-warning me-3"></i>
                            <div>
                                <h5>B.Tech Electrical Engineering</h5>
                                <p class="text-muted mb-0">4 Years</p>
                            </div>
                        </div>
                        <p>Power systems, electronics, control systems, renewable energy, and electrical automation.</p>
                        <h6 class="text-warning">Key Subjects:</h6>
                        <ul class="small">
                            <li>Power Systems</li>
                            <li>Control Systems</li>
                            <li>Electrical Machines</li>
                            <li>Power Electronics</li>
                            <li>Renewable Energy Systems</li>
                        </ul>
                        <h6 class="text-warning">Career Opportunities:</h6>
                        <p class="small">Electrical Engineer, Power System Analyst, Control Engineer, Energy Consultant</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Management & Commerce Programs -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="section-title text-center mb-5">Management & Commerce Programs</h2>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-3">
                            <i class="fas fa-chart-line fa-3x text-warning me-3"></i>
                            <div>
                                <h5>Bachelor of Business Administration (BBA)</h5>
                                <p class="text-muted mb-0">3 Years</p>
                            </div>
                        </div>
                        <p>Comprehensive business management program with specializations in various domains.</p>
                        <h6 class="text-warning">Specializations:</h6>
                        <ul class="small">
                            <li>Human Resource Management</li>
                            <li>Marketing Management</li>
                            <li>Financial Management</li>
                            <li>Operations Management</li>
                        </ul>
                        <h6 class="text-warning">Career Opportunities:</h6>
                        <p class="small">Business Analyst, Marketing Executive, HR Executive, Operations Manager</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-3">
                            <i class="fas fa-calculator fa-3x text-warning me-3"></i>
                            <div>
                                <h5>Bachelor of Commerce (B.Com)</h5>
                                <p class="text-muted mb-0">3 Years</p>
                            </div>
                        </div>
                        <p>Comprehensive commerce education with focus on accounting, finance, taxation, and business law.</p>
                        <h6 class="text-warning">Key Subjects:</h6>
                        <ul class="small">
                            <li>Financial Accounting</li>
                            <li>Business Law</li>
                            <li>Income Tax</li>
                            <li>Cost Accounting</li>
                            <li>Business Statistics</li>
                        </ul>
                        <h6 class="text-warning">Career Opportunities:</h6>
                        <p class="small">Accountant, Tax Consultant, Financial Analyst, Banking Professional</p>
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
                <p class="lead">Eligibility criteria for undergraduate programs</p>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card text-center h-100">
                    <div class="card-body">
                        <i class="fas fa-graduation-cap fa-3x text-warning mb-3"></i>
                        <h5>B.Tech Programs</h5>
                        <ul class="list-unstyled text-start">
                            <li>• 12th with Physics, Chemistry, Mathematics</li>
                            <li>• Minimum 50% marks (45% for SC/ST)</li>
                            <li>• JEE Main / CG PET qualified</li>
                            <li>• Age limit: 25 years</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card text-center h-100">
                    <div class="card-body">
                        <i class="fas fa-briefcase fa-3x text-warning mb-3"></i>
                        <h5>BBA Program</h5>
                        <ul class="list-unstyled text-start">
                            <li>• 12th from any stream</li>
                            <li>• Minimum 50% marks</li>
                            <li>• English as compulsory subject</li>
                            <li>• Age limit: 22 years</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card text-center h-100">
                    <div class="card-body">
                        <i class="fas fa-calculator fa-3x text-warning mb-3"></i>
                        <h5>B.Com Program</h5>
                        <ul class="list-unstyled text-start">
                            <li>• 12th with Commerce/Science/Arts</li>
                            <li>• Minimum 45% marks</li>
                            <li>• Mathematics/Business Math preferred</li>
                            <li>• Age limit: 22 years</li>
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
                <h3 class="text-dark mb-2">Ready to Start Your Undergraduate Journey?</h3>
                <p class="text-dark mb-0">Join our undergraduate programs and build a strong foundation for your career.</p>
            </div>
            <div class="col-lg-4 text-lg-end">
                <a href="{{ route('admission.apply') }}" class="btn btn-dark btn-lg me-3">Apply Now</a>
                <a href="{{ route('admission.process') }}" class="btn btn-outline-dark btn-lg">Admission Process</a>
            </div>
        </div>
    </div>
</section>
@endsection
