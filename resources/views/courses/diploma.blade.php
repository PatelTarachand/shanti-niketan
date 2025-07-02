@extends('layouts.app')

@section('title', 'Diploma Courses - Shantineketan College')
@section('description', 'Explore our diploma programs and certificate courses at Shantineketan College. Professional diploma courses designed for skill development and career advancement.')

@section('content')
<!-- Breadcrumb -->
<section class="py-3">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('courses.index') }}">Courses</a></li>
                <li class="breadcrumb-item active">Diploma</li>
            </ol>
        </nav>
    </div>
</section>

<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h1 class="display-4 fw-bold text-dark mb-4">Diploma Programs</h1>
                <p class="lead">Professional diploma courses designed for skill development and career advancement</p>
            </div>
            <div class="col-lg-6">
                <img src="{{ asset('snc_college.jpeg') }}" class="img-fluid rounded shadow" alt="Diploma Programs">
            </div>
        </div>
    </div>
</section>

<!-- Program Overview -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-5">
                <h2 class="section-title">Diploma & Certificate Programs</h2>
                <p class="lead">Practical education focused on industry skills and professional development</p>
            </div>
        </div>

        @if($courses->count() > 0)
            <div class="row">
                @foreach($courses as $course)
                    <div class="col-lg-6 col-md-6 mb-4">
                        <div class="card h-100 course-card">
                            <div class="card-header bg-info text-white">
                                <h5 class="mb-0">{{ $course->name }}</h5>
                            </div>
                            <div class="card-body">
                                <div class="course-details">
                                    @if($course->duration)
                                        <p class="mb-2">
                                            <i class="fas fa-clock text-primary me-2"></i>
                                            <strong>Duration:</strong> {{ $course->duration }}
                                        </p>
                                    @endif
                                    
                                    @if($course->department)
                                        <p class="mb-2">
                                            <i class="fas fa-building text-success me-2"></i>
                                            <strong>Department:</strong> {{ $course->department }}
                                        </p>
                                    @endif
                                    
                                    @if($course->eligibility)
                                        <p class="mb-2">
                                            <i class="fas fa-graduation-cap text-warning me-2"></i>
                                            <strong>Eligibility:</strong> {{ $course->eligibility }}
                                        </p>
                                    @endif
                                    
                                    @if($course->description)
                                        <p class="text-muted">{{ Str::limit($course->description, 120) }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="card-footer bg-light">
                                <div class="d-flex justify-content-between align-items-center">
                                    @if($course->fees)
                                        <span class="text-primary fw-bold">
                                            <i class="fas fa-rupee-sign me-1"></i>{{ number_format($course->fees) }}
                                        </span>
                                    @endif
                                    <a href="{{ route('courses.show', $course->id) }}" class="btn btn-outline-primary btn-sm">
                                        <i class="fas fa-eye me-1"></i>View Details
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <!-- No Courses Available -->
            <div class="row">
                <div class="col-12">
                    <div class="alert alert-info text-center">
                        <i class="fas fa-info-circle fa-3x mb-3"></i>
                        <h4>Diploma Programs Coming Soon</h4>
                        <p class="mb-0">We are currently developing our diploma programs. Please check back soon or contact us for more information about upcoming courses.</p>
                        <div class="mt-3">
                            <a href="{{ route('contact.index') }}" class="btn btn-primary me-2">
                                <i class="fas fa-envelope me-2"></i>Contact Us
                            </a>
                            <a href="{{ route('courses.index') }}" class="btn btn-outline-primary">
                                <i class="fas fa-arrow-left me-2"></i>View All Courses
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</section>

<!-- Why Choose Diploma Programs -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-5">
                <h2 class="section-title">Why Choose Our Diploma Programs?</h2>
                <p class="lead">Professional education designed for today's industry needs</p>
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="feature-card text-center">
                    <div class="feature-icon">
                        <i class="fas fa-tools text-primary"></i>
                    </div>
                    <h5>Practical Skills</h5>
                    <p class="text-muted">
                        Hands-on training with industry-standard tools and technologies 
                        to ensure job-ready skills upon graduation.
                    </p>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="feature-card text-center">
                    <div class="feature-icon">
                        <i class="fas fa-clock text-success"></i>
                    </div>
                    <h5>Shorter Duration</h5>
                    <p class="text-muted">
                        Complete your professional education in a shorter time frame 
                        and enter the workforce quickly.
                    </p>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="feature-card text-center">
                    <div class="feature-icon">
                        <i class="fas fa-industry text-info"></i>
                    </div>
                    <h5>Industry Focus</h5>
                    <p class="text-muted">
                        Curriculum designed in consultation with industry experts 
                        to meet current market demands.
                    </p>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="feature-card text-center">
                    <div class="feature-icon">
                        <i class="fas fa-certificate text-warning"></i>
                    </div>
                    <h5>Professional Certification</h5>
                    <p class="text-muted">
                        Earn recognized diplomas and certificates that enhance 
                        your professional credentials.
                    </p>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="feature-card text-center">
                    <div class="feature-icon">
                        <i class="fas fa-handshake text-danger"></i>
                    </div>
                    <h5>Placement Support</h5>
                    <p class="text-muted">
                        Dedicated placement assistance to help you find suitable 
                        employment opportunities after completion.
                    </p>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="feature-card text-center">
                    <div class="feature-icon">
                        <i class="fas fa-money-bill-wave text-purple"></i>
                    </div>
                    <h5>Affordable Fees</h5>
                    <p class="text-muted">
                        Quality education at affordable fees with flexible 
                        payment options and scholarship opportunities.
                    </p>
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
                <h3 class="mb-3">Ready to Advance Your Career?</h3>
                <p class="mb-0">Join our diploma programs and gain the skills needed for professional success. 
                Start your journey towards a rewarding career today.</p>
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

.course-card {
    transition: all 0.3s ease;
    border: none;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
}

.course-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 15px 30px rgba(0,0,0,0.15);
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

.text-purple {
    color: #6f42c1 !important;
}

@media (max-width: 768px) {
    .feature-card {
        margin-bottom: 20px;
    }
    
    .course-card {
        margin-bottom: 20px;
    }
}
</style>
@endpush

@push('scripts')
<script>
$(document).ready(function() {
    // Add animation to cards on scroll
    $(window).scroll(function() {
        $('.course-card, .feature-card').each(function() {
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
