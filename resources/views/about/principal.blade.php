@extends('layouts.app')

@section('title', 'Principal\'s Message - Shantineketan College')
@section('description', 'Read the inspiring message from our Principal about our vision, mission, and commitment to excellence in education.')

@section('content')
<!-- Breadcrumb -->
<section class="py-3">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('about.index') }}">About Us</a></li>
                <li class="breadcrumb-item active">Principal's Message</li>
            </ol>
        </nav>
    </div>
</section>

<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h1 class="display-4 fw-bold text-dark mb-4">Principal's Message</h1>
                <p class="lead">A message from our visionary leader about our commitment to excellence</p>
            </div>
            <div class="col-lg-6">
                <img src="{{ asset('snc_college.jpeg') }}" class="img-fluid rounded shadow" alt="Shantineketan College Principal">
            </div>
        </div>
    </div>
</section>

<!-- Principal's Message -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 mb-4">
                <div class="card text-center">
                    <div class="card-body">
                        <img src="https://via.placeholder.com/200x200/FFD700/2C3E50?text=Dr.+Rajesh+Kumar" class="rounded-circle mb-3" alt="Dr. Rajesh Kumar">
                        <h4>Dr. Rajesh Kumar</h4>
                        <p class="text-warning fw-semibold">Principal</p>
                        <p class="small">Ph.D. in Computer Science<br>25+ Years of Experience</p>
                        <div class="contact-info">
                            <p class="small mb-1"><i class="fas fa-envelope me-2"></i>principal@shantiniketan.edu.in</p>
                            <p class="small mb-0"><i class="fas fa-phone me-2"></i>+91 94255 14719</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-8">
                <div class="message-content">
                    <h3 class="text-warning mb-4">Dear Students, Parents, and Well-wishers,</h3>
                    
                    <p class="lead">It gives me immense pleasure to welcome you to Shantineketan College, an institution that has been at the forefront of quality education in Raipur, Chhattisgarh since 2009.</p>
                    
                    <p>At Shantineketan College, we believe that education is not just about acquiring knowledge, but about developing the complete personality of our students. Our mission is to nurture young minds, instill values, and prepare them to face the challenges of the rapidly evolving world.</p>
                    
                    <p>Over the years, we have built a reputation for academic excellence, innovative teaching methodologies, and strong industry connections. Our NAAC 'A' grade accreditation and AICTE approval stand testimony to our commitment to quality education.</p>
                    
                    <blockquote class="blockquote border-start border-warning border-4 ps-4 my-4">
                        <p class="mb-0 fst-italic">"Education is the most powerful weapon which you can use to change the world. At Shantineketan College, we empower our students with knowledge, skills, and values to make a positive impact on society."</p>
                    </blockquote>
                    
                    <h5 class="text-warning mt-4 mb-3">Our Commitment to Excellence</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><i class="fas fa-check-circle text-warning me-2"></i><strong>Quality Education:</strong> Industry-relevant curriculum designed by experts</li>
                        <li class="mb-2"><i class="fas fa-check-circle text-warning me-2"></i><strong>Expert Faculty:</strong> Experienced professors and industry professionals</li>
                        <li class="mb-2"><i class="fas fa-check-circle text-warning me-2"></i><strong>Modern Infrastructure:</strong> State-of-the-art laboratories and facilities</li>
                        <li class="mb-2"><i class="fas fa-check-circle text-warning me-2"></i><strong>Holistic Development:</strong> Focus on academics, sports, and cultural activities</li>
                        <li class="mb-2"><i class="fas fa-check-circle text-warning me-2"></i><strong>Industry Connect:</strong> Strong placement support and career guidance</li>
                    </ul>
                    
                    <h5 class="text-warning mt-4 mb-3">Vision for the Future</h5>
                    <p>As we move forward, our vision is to become a center of excellence that not only imparts quality education but also contributes to research and innovation. We are continuously upgrading our infrastructure, incorporating latest technologies, and enhancing our teaching methodologies to stay ahead of the curve.</p>
                    
                    <p>We encourage our students to think beyond conventional boundaries, embrace innovation, and develop an entrepreneurial mindset. Our alumni working in top companies and successful entrepreneurs are a testament to the quality of education we provide.</p>
                    
                    <h5 class="text-warning mt-4 mb-3">Message to Students</h5>
                    <p>To our dear students, I want to emphasize that your time at Shantineketan College is not just about earning a degree, but about transforming yourself into a confident, skilled, and responsible individual. Make the most of the opportunities available here, participate actively in all activities, and never stop learning.</p>
                    
                    <p>Remember, success is not just about academic achievements, but about becoming a good human being who contributes positively to society. We are here to guide and support you in this journey.</p>
                    
                    <div class="signature mt-4">
                        <p class="mb-1"><strong>Warm Regards,</strong></p>
                        <p class="mb-1"><strong>Dr. Rajesh Kumar</strong></p>
                        <p class="text-muted">Principal, Shantineketan College</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Achievements -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-5">
                <h2 class="section-title">Under Principal's Leadership</h2>
                <p class="lead">Achievements and milestones during Dr. Rajesh Kumar's tenure</p>
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card text-center h-100">
                    <div class="card-body">
                        <i class="fas fa-award fa-3x text-warning mb-3"></i>
                        <h5>NAAC 'A' Grade</h5>
                        <p>Achieved highest accreditation standards</p>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card text-center h-100">
                    <div class="card-body">
                        <i class="fas fa-users fa-3x text-warning mb-3"></i>
                        <h5>100% Placement</h5>
                        <p>Consistent placement record for all eligible students</p>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card text-center h-100">
                    <div class="card-body">
                        <i class="fas fa-building fa-3x text-warning mb-3"></i>
                        <h5>Infrastructure Development</h5>
                        <p>Modern labs and facilities establishment</p>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card text-center h-100">
                    <div class="card-body">
                        <i class="fas fa-handshake fa-3x text-warning mb-3"></i>
                        <h5>Industry Partnerships</h5>
                        <p>Strong collaborations with leading companies</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Contact Principal -->
<section class="py-5" style="background: linear-gradient(135deg, var(--primary-yellow) 0%, var(--dark-yellow) 100%);">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <h3 class="text-dark mb-2">Have Questions or Suggestions?</h3>
                <p class="text-dark mb-0">The Principal's office is always open for students, parents, and stakeholders.</p>
            </div>
            <div class="col-lg-4 text-lg-end">
                <a href="{{ route('contact.index') }}" class="btn btn-dark btn-lg">
                    <i class="fas fa-envelope me-2"></i>Contact Principal
                </a>
            </div>
        </div>
    </div>
</section>
@endsection
