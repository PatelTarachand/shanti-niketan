@extends('layouts.app')

@section('title', 'Placements - Shantineketan College')
@section('description', 'Explore our excellent placement record, top recruiting companies, and career opportunities at Shantineketan College.')

@section('content')
<!-- Breadcrumb -->
<section class="py-3">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active">Placements</li>
            </ol>
        </nav>
    </div>
</section>

<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h1 class="display-4 fw-bold text-dark mb-4">Placements</h1>
                <p class="lead">100% Placement Support with Top Companies and Excellent Packages</p>
            </div>
            <div class="col-lg-6">
                <img src="{{ asset('snc_college.jpeg') }}" class="img-fluid rounded shadow" alt="Placements at Shantineketan College">
            </div>
        </div>
    </div>
</section>

<!-- Placement Statistics -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-5">
                <h2 class="section-title">Placement Statistics 2023-24</h2>
                <p class="lead">Outstanding placement record with top companies</p>
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card text-center h-100">
                    <div class="card-body">
                        <i class="fas fa-percentage fa-3x text-warning mb-3"></i>
                        <h2 class="text-warning">100%</h2>
                        <h5>Placement Rate</h5>
                        <p>All eligible students placed</p>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card text-center h-100">
                    <div class="card-body">
                        <i class="fas fa-rupee-sign fa-3x text-warning mb-3"></i>
                        <h2 class="text-warning">₹12 LPA</h2>
                        <h5>Highest Package</h5>
                        <p>Maximum salary offered</p>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card text-center h-100">
                    <div class="card-body">
                        <i class="fas fa-chart-line fa-3x text-warning mb-3"></i>
                        <h2 class="text-warning">₹4.5 LPA</h2>
                        <h5>Average Package</h5>
                        <p>Mean salary package</p>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card text-center h-100">
                    <div class="card-body">
                        <i class="fas fa-building fa-3x text-warning mb-3"></i>
                        <h2 class="text-warning">150+</h2>
                        <h5>Companies</h5>
                        <p>Recruiting partners</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Top Recruiters -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-5">
                <h2 class="section-title">Our Top Recruiters</h2>
                <p class="lead">Leading companies that trust our graduates</p>
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-2 col-md-3 col-sm-4 col-6 mb-4">
                <div class="card text-center h-100">
                    <div class="card-body d-flex align-items-center justify-content-center">
                        <div>
                            <img src="https://via.placeholder.com/100x60/FFD700/2C3E50?text=TCS" class="img-fluid mb-2" alt="TCS">
                            <h6 class="small">TCS</h6>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-2 col-md-3 col-sm-4 col-6 mb-4">
                <div class="card text-center h-100">
                    <div class="card-body d-flex align-items-center justify-content-center">
                        <div>
                            <img src="https://via.placeholder.com/100x60/FFD700/2C3E50?text=Infosys" class="img-fluid mb-2" alt="Infosys">
                            <h6 class="small">Infosys</h6>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-2 col-md-3 col-sm-4 col-6 mb-4">
                <div class="card text-center h-100">
                    <div class="card-body d-flex align-items-center justify-content-center">
                        <div>
                            <img src="https://via.placeholder.com/100x60/FFD700/2C3E50?text=Wipro" class="img-fluid mb-2" alt="Wipro">
                            <h6 class="small">Wipro</h6>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-2 col-md-3 col-sm-4 col-6 mb-4">
                <div class="card text-center h-100">
                    <div class="card-body d-flex align-items-center justify-content-center">
                        <div>
                            <img src="https://via.placeholder.com/100x60/FFD700/2C3E50?text=Accenture" class="img-fluid mb-2" alt="Accenture">
                            <h6 class="small">Accenture</h6>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-2 col-md-3 col-sm-4 col-6 mb-4">
                <div class="card text-center h-100">
                    <div class="card-body d-flex align-items-center justify-content-center">
                        <div>
                            <img src="https://via.placeholder.com/100x60/FFD700/2C3E50?text=IBM" class="img-fluid mb-2" alt="IBM">
                            <h6 class="small">IBM</h6>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-2 col-md-3 col-sm-4 col-6 mb-4">
                <div class="card text-center h-100">
                    <div class="card-body d-flex align-items-center justify-content-center">
                        <div>
                            <img src="https://via.placeholder.com/100x60/FFD700/2C3E50?text=Microsoft" class="img-fluid mb-2" alt="Microsoft">
                            <h6 class="small">Microsoft</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row mt-4">
            <div class="col-12 text-center">
                <a href="{{ route('placements.companies') }}" class="btn btn-primary">View All Companies</a>
            </div>
        </div>
    </div>
</section>

<!-- Placement Process -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-5">
                <h2 class="section-title">Our Placement Process</h2>
                <p class="lead">Comprehensive support from training to placement</p>
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="text-center">
                    <div class="bg-warning text-dark rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                        <i class="fas fa-user-graduate fa-2x"></i>
                    </div>
                    <h5>Pre-Placement Training</h5>
                    <p>Comprehensive training on aptitude, technical skills, and soft skills development.</p>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="text-center">
                    <div class="bg-warning text-dark rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                        <i class="fas fa-file-alt fa-2x"></i>
                    </div>
                    <h5>Resume Building</h5>
                    <p>Professional resume preparation and portfolio development with industry standards.</p>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="text-center">
                    <div class="bg-warning text-dark rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                        <i class="fas fa-comments fa-2x"></i>
                    </div>
                    <h5>Mock Interviews</h5>
                    <p>Regular mock interviews and group discussions to build confidence and skills.</p>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="text-center">
                    <div class="bg-warning text-dark rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                        <i class="fas fa-handshake fa-2x"></i>
                    </div>
                    <h5>Campus Placements</h5>
                    <p>On-campus recruitment drives with leading companies and startups.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Success Stories -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-5">
                <h2 class="section-title">Success Stories</h2>
                <p class="lead">Our alumni making us proud in top companies</p>
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-body text-center">
                        <img src="https://via.placeholder.com/100x100/FFD700/2C3E50?text=Rahul" class="rounded-circle mb-3" alt="Rahul Sharma">
                        <h5>Rahul Sharma</h5>
                        <p class="text-warning">Software Engineer at Microsoft</p>
                        <p class="small">"The placement training at Shantineketan College helped me crack the Microsoft interview. The faculty support was exceptional."</p>
                        <div class="text-warning">
                            <strong>Package: ₹12 LPA</strong>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-body text-center">
                        <img src="https://via.placeholder.com/100x100/FFD700/2C3E50?text=Priya" class="rounded-circle mb-3" alt="Priya Patel">
                        <h5>Priya Patel</h5>
                        <p class="text-warning">Business Analyst at TCS</p>
                        <p class="small">"The comprehensive curriculum and industry exposure prepared me well for my career in business analysis."</p>
                        <div class="text-warning">
                            <strong>Package: ₹6.5 LPA</strong>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-body text-center">
                        <img src="https://via.placeholder.com/100x100/FFD700/2C3E50?text=Amit" class="rounded-circle mb-3" alt="Amit Kumar">
                        <h5>Amit Kumar</h5>
                        <p class="text-warning">Design Engineer at Mahindra</p>
                        <p class="small">"The practical training in mechanical engineering labs gave me hands-on experience that employers value."</p>
                        <div class="text-warning">
                            <strong>Package: ₹5.2 LPA</strong>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Placement Cell -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-4">
                <h2 class="text-warning mb-4">Placement Cell</h2>
                <p class="lead">Our dedicated placement cell works tirelessly to ensure every student gets the best career opportunities.</p>
                
                <div class="placement-services mt-4">
                    <h5 class="text-warning mb-3">Our Services:</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><i class="fas fa-check-circle text-warning me-2"></i>Career counseling and guidance</li>
                        <li class="mb-2"><i class="fas fa-check-circle text-warning me-2"></i>Industry interaction programs</li>
                        <li class="mb-2"><i class="fas fa-check-circle text-warning me-2"></i>Skill development workshops</li>
                        <li class="mb-2"><i class="fas fa-check-circle text-warning me-2"></i>Internship opportunities</li>
                        <li class="mb-2"><i class="fas fa-check-circle text-warning me-2"></i>Alumni networking events</li>
                        <li class="mb-2"><i class="fas fa-check-circle text-warning me-2"></i>Entrepreneurship support</li>
                    </ul>
                </div>
                
                <div class="contact-placement mt-4">
                    <h6 class="text-warning">Contact Placement Cell:</h6>
                    <p class="mb-1"><i class="fas fa-envelope me-2"></i>shantiniketan2009@yahoo.co.in</p>
                    <p class="mb-1"><i class="fas fa-phone me-2"></i>+91 88273 76688</p>
                    <p class="mb-0"><i class="fas fa-user me-2"></i>Dr. Anjali Singh - Placement Officer</p>
                </div>
            </div>
            <div class="col-lg-6">
                <img src="https://via.placeholder.com/600x400/FFD700/2C3E50?text=Placement+Cell" class="img-fluid rounded shadow" alt="Placement Cell">
            </div>
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="py-5" style="background: linear-gradient(135deg, var(--primary-yellow) 0%, var(--dark-yellow) 100%);">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <h3 class="text-dark mb-2">Ready to Launch Your Career?</h3>
                <p class="text-dark mb-0">Join Shantineketan College and get placed in top companies with excellent packages.</p>
            </div>
            <div class="col-lg-4 text-lg-end">
                <a href="{{ route('admission.apply') }}" class="btn btn-dark btn-lg me-3">Apply Now</a>
                <a href="{{ route('placements.statistics') }}" class="btn btn-outline-dark btn-lg">View Statistics</a>
            </div>
        </div>
    </div>
</section>
@endsection
