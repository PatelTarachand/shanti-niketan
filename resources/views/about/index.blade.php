@extends('layouts.app')

@section('title', 'About Us - Shantineketan College')
@section('description', 'Learn about Shantineketan College - our history, vision, mission, leadership, and commitment to excellence in education.')

@section('content')
<!-- Breadcrumb -->
<section class="py-3">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active">About Us</li>
            </ol>
        </nav>
    </div>
</section>

<!-- Hero Section -->
<section class="hero-section bg-primary text-white py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <h1 class="display-4 fw-bold mb-3">About Shantineketan College</h1>
                <p class="lead mb-4">Excellence in Education Since 2009</p>
                <p class="mb-4">Committed to providing quality education and fostering holistic development of our students through innovative teaching methodologies and comprehensive academic programs.</p>
                <div class="d-flex flex-wrap gap-3">
                    <a href="#about-us" class="btn btn-warning btn-lg">
                        <i class="fas fa-university me-2"></i>Our Story
                    </a>
                    <a href="#why-choose-us" class="btn btn-outline-light btn-lg">
                        <i class="fas fa-star me-2"></i>Why Choose Us
                    </a>
                    <a href="#leadership" class="btn btn-outline-light btn-lg">
                        <i class="fas fa-users me-2"></i>Leadership
                    </a>
                </div>
            </div>
            <div class="col-lg-4 text-center">
                <img src="{{ asset('snc_college.jpeg') }}" alt="Shantineketan College" class="img-fluid rounded shadow">
            </div>
        </div>
    </div>
</section>

<!-- About Us Section -->
<section id="about-us" class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-5">
                <h2 class="section-title">
                    <i class="fas fa-university text-primary me-3"></i>About Shantineketan College
                </h2>
                <p class="lead text-muted">Our Journey of Educational Excellence</p>
            </div>
        </div>

        <div class="row align-items-center mb-5">
            <div class="col-lg-6">
                <h3 class="text-primary mb-4">Our Story</h3>
                <p class="mb-4">
                    Established in 2009, Shantineketan College has been a beacon of educational excellence in Raipur, Chhattisgarh.
                    Our institution was founded with a vision to provide quality higher education that combines academic rigor with
                    practical learning experiences.
                </p>
                <p class="mb-4">
                    Over the years, we have grown from a small educational institution to a comprehensive college offering
                    undergraduate, postgraduate, and diploma programs across various disciplines including Engineering,
                    Management, Commerce, and more.
                </p>
                <p class="mb-4">
                    Our commitment to excellence has made us one of the most trusted educational institutions in the region,
                    with thousands of successful alumni contributing to various sectors of the economy.
                </p>
            </div>
            <div class="col-lg-6">
                <div class="row">
                    <div class="col-6 mb-4">
                        <div class="stat-card text-center">
                            <div class="stat-icon">
                                <i class="fas fa-calendar-alt text-primary"></i>
                            </div>
                            <h4 class="text-primary">15+</h4>
                            <p class="text-muted">Years of Excellence</p>
                        </div>
                    </div>
                    <div class="col-6 mb-4">
                        <div class="stat-card text-center">
                            <div class="stat-icon">
                                <i class="fas fa-user-graduate text-success"></i>
                            </div>
                            <h4 class="text-success">5000+</h4>
                            <p class="text-muted">Alumni Network</p>
                        </div>
                    </div>
                    <div class="col-6 mb-4">
                        <div class="stat-card text-center">
                            <div class="stat-icon">
                                <i class="fas fa-chalkboard-teacher text-warning"></i>
                            </div>
                            <h4 class="text-warning">100+</h4>
                            <p class="text-muted">Expert Faculty</p>
                        </div>
                    </div>
                    <div class="col-6 mb-4">
                        <div class="stat-card text-center">
                            <div class="stat-icon">
                                <i class="fas fa-graduation-cap text-info"></i>
                            </div>
                            <h4 class="text-info">50+</h4>
                            <p class="text-muted">Academic Programs</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Vision & Mission -->
        <div class="row">
            <div class="col-lg-6 mb-4">
                <div class="vision-mission-card enhanced">
                    <div class="card-header bg-gradient-primary text-white">
                        <h4 class="mb-0"><i class="fas fa-eye me-2"></i>Our Vision</h4>
                        <small class="opacity-75">Where We Aspire to Be</small>
                    </div>
                    <div class="card-body">
                        <div class="vision-content">
                            <p class="lead-text mb-3">
                                To emerge as a globally recognized center of excellence in higher education,
                                fostering innovation, research, and holistic development.
                            </p>
                            <div class="vision-points">
                                <div class="vision-point">
                                    <i class="fas fa-globe text-primary me-2"></i>
                                    <span>Global Recognition as a premier educational institution</span>
                                </div>
                                <div class="vision-point">
                                    <i class="fas fa-lightbulb text-warning me-2"></i>
                                    <span>Innovation Hub for cutting-edge research and technology</span>
                                </div>
                                <div class="vision-point">
                                    <i class="fas fa-users text-success me-2"></i>
                                    <span>Holistic Development of future leaders and change-makers</span>
                                </div>
                                <div class="vision-point">
                                    <i class="fas fa-handshake text-info me-2"></i>
                                    <span>Industry Partnership for practical learning and placement excellence</span>
                                </div>
                                <div class="vision-point">
                                    <i class="fas fa-heart text-danger me-2"></i>
                                    <span>Social Impact through community engagement and sustainable practices</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mb-4">
                <div class="vision-mission-card enhanced">
                    <div class="card-header bg-gradient-success text-white">
                        <h4 class="mb-0"><i class="fas fa-bullseye me-2"></i>Our Mission</h4>
                        <small class="opacity-75">How We Achieve Our Vision</small>
                    </div>
                    <div class="card-body">
                        <div class="mission-content">
                            <p class="lead-text mb-3">
                                To provide transformative education that empowers students with knowledge, skills,
                                values, and global perspectives for lifelong success.
                            </p>
                            <div class="mission-pillars">
                                <div class="mission-pillar">
                                    <div class="pillar-header">
                                        <i class="fas fa-graduation-cap text-primary"></i>
                                        <h6>Academic Excellence</h6>
                                    </div>
                                    <p class="small">Delivering world-class education through innovative curricula,
                                    experienced faculty, and state-of-the-art infrastructure.</p>
                                </div>
                                <div class="mission-pillar">
                                    <div class="pillar-header">
                                        <i class="fas fa-flask text-warning"></i>
                                        <h6>Research & Innovation</h6>
                                    </div>
                                    <p class="small">Promoting cutting-edge research, entrepreneurship, and
                                    technological advancement for societal benefit.</p>
                                </div>
                                <div class="mission-pillar">
                                    <div class="pillar-header">
                                        <i class="fas fa-balance-scale text-success"></i>
                                        <h6>Values & Ethics</h6>
                                    </div>
                                    <p class="small">Instilling strong moral values, integrity, and social responsibility
                                    in all our educational endeavors.</p>
                                </div>
                                <div class="mission-pillar">
                                    <div class="pillar-header">
                                        <i class="fas fa-rocket text-info"></i>
                                        <h6>Future Readiness</h6>
                                    </div>
                                    <p class="small">Preparing students for emerging careers through skill development,
                                    industry exposure, and global perspectives.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Why Choose Us Section -->
<section id="why-choose-us" class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-5">
                <h2 class="section-title">
                    <i class="fas fa-star text-warning me-3"></i>Why Choose Shantineketan College?
                </h2>
                <p class="lead text-muted">Discover what makes us the preferred choice for quality education</p>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="feature-card text-center">
                    <div class="feature-icon">
                        <i class="fas fa-award text-primary"></i>
                    </div>
                    <h5>Academic Excellence</h5>
                    <p class="text-muted">
                        AICTE approved programs with industry-relevant curriculum designed to meet current market demands
                        and prepare students for successful careers.
                    </p>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-4">
                <div class="feature-card text-center">
                    <div class="feature-icon">
                        <i class="fas fa-users text-success"></i>
                    </div>
                    <h5>Expert Faculty</h5>
                    <p class="text-muted">
                        Highly qualified and experienced faculty members with industry expertise who provide
                        personalized attention and mentorship to every student.
                    </p>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-4">
                <div class="feature-card text-center">
                    <div class="feature-icon">
                        <i class="fas fa-laptop text-info"></i>
                    </div>
                    <h5>Modern Infrastructure</h5>
                    <p class="text-muted">
                        State-of-the-art laboratories, well-equipped classrooms, modern library, and
                        advanced technology to enhance the learning experience.
                    </p>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-4">
                <div class="feature-card text-center">
                    <div class="feature-icon">
                        <i class="fas fa-handshake text-warning"></i>
                    </div>
                    <h5>Industry Partnerships</h5>
                    <p class="text-muted">
                        Strong industry connections providing internship opportunities, guest lectures,
                        and placement assistance for better career prospects.
                    </p>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-4">
                <div class="feature-card text-center">
                    <div class="feature-icon">
                        <i class="fas fa-chart-line text-danger"></i>
                    </div>
                    <h5>Placement Support</h5>
                    <p class="text-muted">
                        Dedicated placement cell with excellent track record of placing students in
                        reputed companies with competitive salary packages.
                    </p>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-4">
                <div class="feature-card text-center">
                    <div class="feature-icon">
                        <i class="fas fa-globe text-purple"></i>
                    </div>
                    <h5>Holistic Development</h5>
                    <p class="text-muted">
                        Focus on overall personality development through extracurricular activities,
                        sports, cultural events, and leadership opportunities.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Leadership Section -->
<section id="leadership" class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-5">
                <h2 class="section-title">
                    <i class="fas fa-users text-primary me-3"></i>Our Leadership
                </h2>
                <p class="lead text-muted">Meet the visionaries guiding our institution</p>
            </div>
        </div>

        <!-- Managing Director Message -->
        <div class="row mb-5">
            <div class="col-12">
                <div class="leadership-card">
                    <div class="row align-items-center">
                        <div class="col-lg-3 text-center">
                            <div class="leader-photo">
                                <img src="{{ asset('images/director-mukesh-gupta.jpg') }}" alt="Mr. Mukesh Gupta - Managing Director" class="img-fluid rounded-circle">
                            </div>
                        </div>
                        <div class="col-lg-9">
                            <div class="leader-content">
                                <h3 class="text-primary">Managing Director's Message</h3>
                                <h5 class="text-muted mb-3">Mr. Mukesh Gupta</h5>
                                <div class="director-quote">
                                    <i class="fas fa-quote-left text-primary me-2"></i>
                                    <span class="quote-text">"Education is not just about acquiring knowledge; it's about transforming lives and building a better future."</span>
                                </div>
                                <p class="mb-3">
                                    Welcome to Shantineketan College, where we have been committed to excellence in education since 2009.
                                    As the Managing Director, I am proud to lead an institution that has consistently delivered quality education
                                    and shaped thousands of successful careers.
                                </p>
                                <p class="mb-3">
                                    Our vision extends beyond traditional classroom learning. We believe in nurturing innovative minds, fostering
                                    entrepreneurial spirit, and developing globally competent professionals who can make meaningful contributions
                                    to society. Our state-of-the-art infrastructure, experienced faculty, and industry partnerships ensure that
                                    our students receive world-class education with practical exposure.
                                </p>
                                <p class="mb-3">
                                    At Shantineketan College, we understand that each student is unique with their own aspirations and potential.
                                    Our personalized approach to education, combined with comprehensive support systems, helps every student
                                    discover their strengths and achieve their goals. We are not just building careers; we are shaping leaders
                                    who will drive positive change in the world.
                                </p>
                                <p class="mb-3">
                                    I invite you to join our family of learners, innovators, and achievers. Together, let us embark on a
                                    transformative journey that will prepare you for the challenges and opportunities of tomorrow. Your success
                                    is our commitment, and your dreams are our mission.
                                </p>
                                <div class="director-signature">
                                    <p class="mb-0 fw-bold">Best wishes for your bright future,</p>
                                    <p class="mb-0 text-primary fw-bold">Mr. Mukesh Gupta</p>
                                    <p class="mb-0 text-muted small">Managing Director, Shantineketan College</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Our Faculty Section -->
<section id="our-faculty" class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-5">
                <h2 class="section-title">
                    <i class="fas fa-chalkboard-teacher text-warning me-3"></i>Our Faculty
                </h2>
                <p class="lead text-muted">Meet our experienced and dedicated faculty members</p>
            </div>
        </div>

        <!-- Faculty Statistics -->
        @if(!empty($facultyByDepartment))
        <div class="row mb-5">
            <div class="col-12">
                <div class="faculty-stats-row">
                    @foreach($facultyByDepartment as $department => $count)
                    <div class="faculty-stat-item">
                        <div class="stat-number">{{ $count }}</div>
                        <div class="stat-label">{{ $department }}</div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        @endif

        <!-- Featured Faculty Members -->
        @if($featuredFaculty->count() > 0)
        <div class="row">
            <div class="col-12 mb-4">
                <h3 class="text-center text-primary mb-4">Featured Faculty Members</h3>
            </div>

            @foreach($featuredFaculty as $faculty)
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="faculty-card">
                    <div class="faculty-photo">
                        @if($faculty->photo)
                            <img src="{{ asset('storage/' . $faculty->photo) }}" alt="{{ $faculty->name }}" class="img-fluid">
                        @else
                            <div class="faculty-placeholder">
                                <i class="fas fa-user-tie"></i>
                            </div>
                        @endif
                    </div>
                    <div class="faculty-info">
                        <h5 class="faculty-name">{{ $faculty->name }}</h5>
                        <p class="faculty-designation text-primary">{{ $faculty->designation }}</p>
                        <p class="faculty-department text-muted">
                            <i class="fas fa-building me-1"></i>{{ $faculty->department }}
                        </p>
                        @if($faculty->qualification)
                        <p class="faculty-qualification text-muted small">
                            <i class="fas fa-graduation-cap me-1"></i>{{ Str::limit($faculty->qualification, 50) }}
                        </p>
                        @endif
                        @if($faculty->specialization)
                        <p class="faculty-specialization text-muted small">
                            <i class="fas fa-star me-1"></i>{{ Str::limit($faculty->specialization, 60) }}
                        </p>
                        @endif
                        <div class="faculty-actions mt-3">
                            <a href="{{ route('faculty.show', $faculty->id) }}" class="btn btn-outline-primary btn-sm">
                                <i class="fas fa-eye me-1"></i>View Profile
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <!-- Fallback to Department Highlights if no faculty data -->
        <div class="row">
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="faculty-highlight-card text-center">
                    <div class="faculty-icon">
                        <i class="fas fa-laptop-code text-primary"></i>
                    </div>
                    <h5>Engineering Faculty</h5>
                    <p class="text-muted">
                        Highly qualified professors and industry experts in Computer Science, Mechanical,
                        Civil, and Electrical Engineering with extensive research experience.
                    </p>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-4">
                <div class="faculty-highlight-card text-center">
                    <div class="faculty-icon">
                        <i class="fas fa-chart-line text-success"></i>
                    </div>
                    <h5>Management Faculty</h5>
                    <p class="text-muted">
                        Experienced business professionals and academicians specializing in various
                        management disciplines with real-world industry insights.
                    </p>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-4">
                <div class="faculty-highlight-card text-center">
                    <div class="faculty-icon">
                        <i class="fas fa-calculator text-info"></i>
                    </div>
                    <h5>Commerce Faculty</h5>
                    <p class="text-muted">
                        Expert faculty members in Accounting, Finance, Economics, and Business Studies
                        with professional certifications and industry experience.
                    </p>
                </div>
            </div>
        </div>
        @endif

        <div class="row mt-4">
            <div class="col-12 text-center">
                <a href="{{ route('faculty.index') }}" class="btn btn-primary btn-lg">
                    <i class="fas fa-users me-2"></i>Meet All Faculty Members
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Values & Achievements Section -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 mb-4">
                <h3 class="text-primary mb-4">Our Core Values</h3>
                <div class="values-list">
                    <div class="value-item">
                        <i class="fas fa-check-circle text-success me-3"></i>
                        <strong>Excellence:</strong> Striving for the highest standards in education and research
                    </div>
                    <div class="value-item">
                        <i class="fas fa-check-circle text-success me-3"></i>
                        <strong>Integrity:</strong> Maintaining honesty and ethical practices in all our endeavors
                    </div>
                    <div class="value-item">
                        <i class="fas fa-check-circle text-success me-3"></i>
                        <strong>Innovation:</strong> Encouraging creativity and forward-thinking approaches
                    </div>
                    <div class="value-item">
                        <i class="fas fa-check-circle text-success me-3"></i>
                        <strong>Inclusivity:</strong> Providing equal opportunities for all students regardless of background
                    </div>
                    <div class="value-item">
                        <i class="fas fa-check-circle text-success me-3"></i>
                        <strong>Social Responsibility:</strong> Contributing positively to society and the environment
                    </div>
                </div>
            </div>

            <div class="col-lg-6 mb-4">
                <h3 class="text-primary mb-4">Our Achievements</h3>
                <div class="achievements-list">
                    <div class="achievement-item">
                        <i class="fas fa-trophy text-warning me-3"></i>
                        AICTE Approved Institution with excellent academic standards
                    </div>
                    <div class="achievement-item">
                        <i class="fas fa-trophy text-warning me-3"></i>
                        95% Placement Record with top companies recruiting our students
                    </div>
                    <div class="achievement-item">
                        <i class="fas fa-trophy text-warning me-3"></i>
                        State-level recognition for academic excellence and innovation
                    </div>
                    <div class="achievement-item">
                        <i class="fas fa-trophy text-warning me-3"></i>
                        Strong alumni network in leading positions across industries
                    </div>
                    <div class="achievement-item">
                        <i class="fas fa-trophy text-warning me-3"></i>
                        Active research publications and industry collaborations
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="py-5 bg-primary text-white">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <h3 class="mb-3">Ready to Start Your Journey with Us?</h3>
                <p class="mb-0">Join thousands of successful alumni who have built their careers with Shantineketan College.
                Discover your potential and achieve your dreams with our quality education and comprehensive support.</p>
            </div>
            <div class="col-lg-4 text-lg-end">
                <a href="{{ route('admission.apply') }}" class="btn btn-warning btn-lg me-3">
                    <i class="fas fa-user-plus me-2"></i>Apply Now
                </a>
                <a href="{{ route('contact.index') }}" class="btn btn-outline-light btn-lg">
                    <i class="fas fa-phone me-2"></i>Contact Us
                </a>
            </div>
        </div>
    </div>
</section>
@endsection

@push('styles')
<style>
.section-title {
    position: relative;
    padding-bottom: 15px;
}

.section-title::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 50%;
    transform: translateX(-50%);
    width: 60px;
    height: 3px;
    background: var(--primary-yellow);
}

.stat-card {
    padding: 20px;
    border-radius: 15px;
    background: white;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    transition: transform 0.3s ease;
}

.stat-card:hover {
    transform: translateY(-5px);
}

.stat-icon {
    font-size: 2rem;
    margin-bottom: 15px;
}

.vision-mission-card {
    border: none;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    height: 100%;
    transition: all 0.3s ease;
}

.vision-mission-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 30px rgba(0,0,0,0.15);
}

.vision-mission-card.enhanced {
    border-radius: 20px;
    overflow: hidden;
}

.bg-gradient-primary {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%) !important;
}

.bg-gradient-success {
    background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%) !important;
}

.vision-mission-card .card-header {
    padding: 25px;
    border-bottom: none;
}

.vision-mission-card .card-header small {
    display: block;
    margin-top: 5px;
    font-size: 0.85rem;
}

.vision-content, .mission-content {
    padding: 10px 0;
}

.lead-text {
    font-size: 1.1rem;
    font-weight: 500;
    color: #333;
    line-height: 1.6;
}

.vision-points {
    margin-top: 20px;
}

.vision-point {
    display: flex;
    align-items: flex-start;
    margin-bottom: 15px;
    padding: 10px;
    background: #f8f9fa;
    border-radius: 10px;
    transition: all 0.3s ease;
}

.vision-point:hover {
    background: #e9ecef;
    transform: translateX(5px);
}

.vision-point i {
    margin-top: 2px;
    font-size: 1.1rem;
}

.vision-point span {
    font-weight: 500;
    color: #555;
    line-height: 1.4;
}

.mission-pillars {
    margin-top: 20px;
}

.mission-pillar {
    margin-bottom: 20px;
    padding: 15px;
    background: #f8f9fa;
    border-radius: 12px;
    border-left: 4px solid #28a745;
    transition: all 0.3s ease;
}

.mission-pillar:hover {
    background: #e9ecef;
    border-left-color: #20c997;
    transform: translateX(5px);
}

.pillar-header {
    display: flex;
    align-items: center;
    margin-bottom: 8px;
}

.pillar-header i {
    font-size: 1.3rem;
    margin-right: 10px;
}

.pillar-header h6 {
    margin: 0;
    font-weight: 600;
    color: #333;
}

.mission-pillar p {
    margin: 0;
    color: #666;
    line-height: 1.5;
}

.feature-card {
    padding: 30px 20px;
    border-radius: 15px;
    background: white;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    transition: all 0.3s ease;
    height: 100%;
}

.feature-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 15px 30px rgba(0,0,0,0.15);
}

.feature-icon {
    font-size: 3rem;
    margin-bottom: 20px;
}

.leadership-card {
    background: white;
    border-radius: 15px;
    padding: 40px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    margin-bottom: 30px;
}

.leader-photo img {
    width: 150px;
    height: 150px;
    object-fit: cover;
    border: 5px solid var(--primary-yellow);
}

.director-quote {
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
    padding: 20px;
    border-radius: 15px;
    margin-bottom: 20px;
    border-left: 4px solid var(--primary-yellow);
    position: relative;
}

.director-quote .quote-text {
    font-style: italic;
    font-size: 1.1rem;
    color: #333;
    font-weight: 500;
    line-height: 1.6;
}

.director-signature {
    background: #f8f9fa;
    padding: 20px;
    border-radius: 10px;
    margin-top: 20px;
    border-top: 3px solid var(--primary-yellow);
}

.faculty-highlight-card {
    padding: 30px 20px;
    border-radius: 15px;
    background: white;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    transition: all 0.3s ease;
    height: 100%;
}

.faculty-highlight-card:hover {
    transform: translateY(-5px);
}

.faculty-icon {
    font-size: 3rem;
    margin-bottom: 20px;
}

.value-item, .achievement-item {
    padding: 10px 0;
    border-bottom: 1px solid #eee;
}

.value-item:last-child, .achievement-item:last-child {
    border-bottom: none;
}

.text-purple {
    color: #6f42c1 !important;
}

/* Faculty Cards Styles */
.faculty-stats-row {
    display: flex;
    justify-content: center;
    flex-wrap: wrap;
    gap: 30px;
    margin-bottom: 30px;
}

.faculty-stat-item {
    text-align: center;
    padding: 20px;
    background: white;
    border-radius: 15px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    min-width: 120px;
}

.stat-number {
    font-size: 2.5rem;
    font-weight: bold;
    color: var(--primary-yellow);
    margin-bottom: 5px;
}

.stat-label {
    font-size: 0.9rem;
    color: #666;
    font-weight: 500;
}

.faculty-card {
    background: white;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    transition: all 0.3s ease;
    height: 100%;
}

.faculty-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 15px 30px rgba(0,0,0,0.15);
}

.faculty-photo {
    height: 200px;
    overflow: hidden;
    position: relative;
}

.faculty-photo img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.faculty-placeholder {
    width: 100%;
    height: 100%;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 4rem;
}

.faculty-info {
    padding: 20px;
}

.faculty-name {
    font-size: 1.2rem;
    font-weight: 600;
    margin-bottom: 8px;
    color: #333;
}

.faculty-designation {
    font-weight: 500;
    margin-bottom: 8px;
}

.faculty-department {
    margin-bottom: 10px;
}

.faculty-qualification,
.faculty-specialization {
    margin-bottom: 8px;
    line-height: 1.4;
}

.faculty-actions {
    border-top: 1px solid #eee;
    padding-top: 15px;
}

@media (max-width: 768px) {
    .leadership-card {
        padding: 20px;
    }

    .leader-photo img {
        width: 120px;
        height: 120px;
        margin-bottom: 20px;
    }

    .feature-card, .faculty-highlight-card {
        margin-bottom: 20px;
    }

    .faculty-stats-row {
        gap: 15px;
    }

    .faculty-stat-item {
        min-width: 100px;
        padding: 15px;
    }

    .stat-number {
        font-size: 2rem;
    }

    .faculty-photo {
        height: 180px;
    }

    .faculty-info {
        padding: 15px;
    }
}
</style>
@endpush

@push('scripts')
<script>
$(document).ready(function() {
    // Smooth scrolling for anchor links
    $('a[href^="#"]').on('click', function(event) {
        var target = $(this.getAttribute('href'));
        if( target.length ) {
            event.preventDefault();
            $('html, body').stop().animate({
                scrollTop: target.offset().top - 100
            }, 1000);
        }
    });

    // Counter animation for stats
    $('.stat-card h4').each(function() {
        var $this = $(this);
        var countTo = $this.text().replace(/[^0-9]/g, '');

        if (countTo) {
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
        }
    });

    // Add animation to cards on scroll
    $(window).scroll(function() {
        $('.feature-card, .faculty-highlight-card, .stat-card').each(function() {
            var elementTop = $(this).offset().top;
            var elementBottom = elementTop + $(this).outerHeight();
            var viewportTop = $(window).scrollTop();
            var viewportBottom = viewportTop + $(window).height();

            if (elementBottom > viewportTop && elementTop < viewportBottom) {
                $(this).addClass('animate__animated animate__fadeInUp');
            }
        });
    });
});
</script>
@endpush
