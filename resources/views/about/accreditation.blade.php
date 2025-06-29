@extends('layouts.app')

@section('title', 'Accreditation & Approvals - Shantineketan College')
@section('description', 'Learn about our NAAC accreditation, AICTE approval, university affiliation, and other recognitions at Shantineketan College.')

@section('content')
<!-- Breadcrumb -->
<section class="py-3">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('about.index') }}">About Us</a></li>
                <li class="breadcrumb-item active">Accreditation</li>
            </ol>
        </nav>
    </div>
</section>

<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h1 class="display-4 fw-bold text-dark mb-4">Accreditation & Approvals</h1>
                <p class="lead">Recognized for excellence in education with prestigious accreditations and approvals</p>
            </div>
            <div class="col-lg-6">
                <img src="{{ asset('snc_college.jpeg') }}" class="img-fluid rounded shadow" alt="Shantineketan College Accreditation">
            </div>
        </div>
    </div>
</section>

<!-- Main Accreditations -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-5">
                <h2 class="section-title">Our Prestigious Recognitions</h2>
                <p class="lead">Quality education validated by national and state authorities</p>
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-6 mb-4">
                <div class="card h-100 border-warning">
                    <div class="card-body text-center">
                        <div class="mb-4">
                            <i class="fas fa-award fa-4x text-warning"></i>
                        </div>
                        <h3 class="text-warning">NAAC 'A' Grade</h3>
                        <h5 class="mb-3">National Assessment and Accreditation Council</h5>
                        <p>Shantineketan College has been accredited with 'A' Grade by NAAC, recognizing our commitment to quality education, infrastructure, and overall institutional performance.</p>
                        <div class="accreditation-details">
                            <p><strong>Grade:</strong> A</p>
                            <p><strong>Valid Until:</strong> 2028</p>
                            <p><strong>CGPA:</strong> 3.2/4.0</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6 mb-4">
                <div class="card h-100 border-warning">
                    <div class="card-body text-center">
                        <div class="mb-4">
                            <i class="fas fa-certificate fa-4x text-warning"></i>
                        </div>
                        <h3 class="text-warning">AICTE Approved</h3>
                        <h5 class="mb-3">All India Council for Technical Education</h5>
                        <p>All our engineering and management programs are approved by AICTE, ensuring that our curriculum meets national standards and industry requirements.</p>
                        <div class="accreditation-details">
                            <p><strong>Approval ID:</strong> F.No. 1-3013117801</p>
                            <p><strong>Valid Until:</strong> 2025-26</p>
                            <p><strong>Programs:</strong> B.Tech, M.Tech, MBA</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- University Affiliation -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-4">
                <h2 class="text-warning mb-4">University Affiliation</h2>
                <h4>Chhattisgarh Swami Vivekanand Technical University (CSVTU)</h4>
                <p class="lead">Our college is affiliated with CSVTU, ensuring that all degrees awarded are recognized and valued by employers and higher education institutions.</p>
                
                <div class="affiliation-benefits mt-4">
                    <h5 class="text-warning mb-3">Benefits of University Affiliation:</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><i class="fas fa-check-circle text-warning me-2"></i>Recognized degrees with national validity</li>
                        <li class="mb-2"><i class="fas fa-check-circle text-warning me-2"></i>Standardized curriculum and examination system</li>
                        <li class="mb-2"><i class="fas fa-check-circle text-warning me-2"></i>Access to university resources and facilities</li>
                        <li class="mb-2"><i class="fas fa-check-circle text-warning me-2"></i>Eligibility for higher studies and government jobs</li>
                        <li class="mb-2"><i class="fas fa-check-circle text-warning me-2"></i>Regular academic audits and quality assurance</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-6">
                <img src="https://via.placeholder.com/600x400/FFD700/2C3E50?text=University+Affiliation" class="img-fluid rounded shadow" alt="University Affiliation">
            </div>
        </div>
    </div>
</section>

<!-- Other Recognitions -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-5">
                <h2 class="section-title">Additional Certifications & Recognitions</h2>
                <p class="lead">Multiple certifications ensuring quality and compliance</p>
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card text-center h-100">
                    <div class="card-body">
                        <i class="fas fa-shield-alt fa-3x text-warning mb-3"></i>
                        <h5>ISO 9001:2015</h5>
                        <p>Quality Management System certification ensuring consistent quality in education delivery and administrative processes.</p>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card text-center h-100">
                    <div class="card-body">
                        <i class="fas fa-users-cog fa-3x text-warning mb-3"></i>
                        <h5>NBA Accreditation</h5>
                        <p>National Board of Accreditation recognition for our engineering programs ensuring global standards.</p>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card text-center h-100">
                    <div class="card-body">
                        <i class="fas fa-globe fa-3x text-warning mb-3"></i>
                        <h5>NIRF Ranking</h5>
                        <p>Recognized in National Institutional Ranking Framework for our contribution to education and research.</p>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card text-center h-100">
                    <div class="card-body">
                        <i class="fas fa-leaf fa-3x text-warning mb-3"></i>
                        <h5>Green Campus</h5>
                        <p>Certified as a green campus for our environmental initiatives and sustainable practices.</p>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card text-center h-100">
                    <div class="card-body">
                        <i class="fas fa-fire fa-3x text-warning mb-3"></i>
                        <h5>Fire Safety</h5>
                        <p>Fire safety clearance from local authorities ensuring safe campus environment for all.</p>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card text-center h-100">
                    <div class="card-body">
                        <i class="fas fa-building fa-3x text-warning mb-3"></i>
                        <h5>Building Approval</h5>
                        <p>All construction approvals from municipal authorities ensuring compliance with building codes.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Quality Assurance -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-5">
                <h2 class="section-title">Quality Assurance Framework</h2>
                <p class="lead">Continuous improvement through systematic quality measures</p>
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="text-warning mb-3">Internal Quality Assurance Cell (IQAC)</h5>
                        <p>Our IQAC ensures continuous quality enhancement through:</p>
                        <ul>
                            <li>Regular curriculum review and updates</li>
                            <li>Faculty development programs</li>
                            <li>Student feedback analysis</li>
                            <li>Infrastructure improvement initiatives</li>
                            <li>Industry interaction programs</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="text-warning mb-3">Academic Audit</h5>
                        <p>Regular academic audits ensure:</p>
                        <ul>
                            <li>Compliance with university norms</li>
                            <li>Quality of teaching and learning</li>
                            <li>Assessment and evaluation standards</li>
                            <li>Research and development activities</li>
                            <li>Student support services</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Accreditation Timeline -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-5">
                <h2 class="section-title">Accreditation Timeline</h2>
                <p class="lead">Our journey of recognition and quality assurance</p>
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="timeline">
                    <div class="row mb-4">
                        <div class="col-md-3 text-md-end">
                            <h5 class="text-warning">2012</h5>
                        </div>
                        <div class="col-md-9">
                            <h6>AICTE Approval</h6>
                            <p>Received initial AICTE approval for engineering programs.</p>
                        </div>
                    </div>
                    
                    <div class="row mb-4">
                        <div class="col-md-3 text-md-end">
                            <h5 class="text-warning">2015</h5>
                        </div>
                        <div class="col-md-9">
                            <h6>University Affiliation</h6>
                            <p>Affiliated with Chhattisgarh Swami Vivekanand Technical University.</p>
                        </div>
                    </div>
                    
                    <div class="row mb-4">
                        <div class="col-md-3 text-md-end">
                            <h5 class="text-warning">2018</h5>
                        </div>
                        <div class="col-md-9">
                            <h6>NAAC Accreditation</h6>
                            <p>Achieved NAAC 'A' grade accreditation for quality education.</p>
                        </div>
                    </div>
                    
                    <div class="row mb-4">
                        <div class="col-md-3 text-md-end">
                            <h5 class="text-warning">2020</h5>
                        </div>
                        <div class="col-md-9">
                            <h6>ISO Certification</h6>
                            <p>Obtained ISO 9001:2015 certification for quality management.</p>
                        </div>
                    </div>
                    
                    <div class="row mb-4">
                        <div class="col-md-3 text-md-end">
                            <h5 class="text-warning">2022</h5>
                        </div>
                        <div class="col-md-9">
                            <h6>NBA Recognition</h6>
                            <p>Engineering programs recognized by National Board of Accreditation.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Contact for Verification -->
<section class="py-5" style="background: linear-gradient(135deg, var(--primary-yellow) 0%, var(--dark-yellow) 100%);">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <h3 class="text-dark mb-2">Need Verification of Our Accreditations?</h3>
                <p class="text-dark mb-0">Contact us for official documents and verification of our accreditations and approvals.</p>
            </div>
            <div class="col-lg-4 text-lg-end">
                <a href="{{ route('contact.index') }}" class="btn btn-dark btn-lg">
                    <i class="fas fa-file-alt me-2"></i>Get Documents
                </a>
            </div>
        </div>
    </div>
</section>
@endsection
