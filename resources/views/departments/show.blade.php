@extends('layouts.app')

@section('title', $departmentName . ' Department - Shantineketan College')
@section('description', 'Learn about the ' . $departmentName . ' department at Shantineketan College, our faculty, courses, and programs.')

@section('content')
<!-- Hero Section -->
<section class="hero-section bg-primary text-white py-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb" class="mb-3">
                    <ol class="breadcrumb text-white-50">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-white-50">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('departments.index') }}" class="text-white-50">Departments</a></li>
                        <li class="breadcrumb-item active text-white">{{ $departmentName }}</li>
                    </ol>
                </nav>
                
                <div class="d-flex align-items-center mb-4">
                    <div class="department-icon me-4">
                        <i class="fas fa-{{ $departmentName === 'Computer Science' ? 'laptop-code' : ($departmentName === 'Engineering' ? 'cogs' : ($departmentName === 'Management' ? 'briefcase' : ($departmentName === 'Commerce' ? 'chart-line' : 'graduation-cap'))) }} fa-4x text-warning"></i>
                    </div>
                    <div>
                        <h1 class="display-4 fw-bold mb-2">{{ $departmentName }}</h1>
                        <p class="lead mb-0">Department of Excellence</p>
                    </div>
                </div>
                
                <div class="department-stats">
                    <div class="row">
                        <div class="col-md-3 col-6 mb-3">
                            <div class="stat-item">
                                <h3 class="text-warning">{{ $stats['faculty_count'] }}</h3>
                                <p class="mb-0">Faculty Members</p>
                            </div>
                        </div>
                        <div class="col-md-3 col-6 mb-3">
                            <div class="stat-item">
                                <h3 class="text-warning">{{ $stats['course_count'] }}</h3>
                                <p class="mb-0">Programs</p>
                            </div>
                        </div>
                        <div class="col-md-3 col-6 mb-3">
                            <div class="stat-item">
                                <h3 class="text-warning">{{ $stats['student_count'] }}</h3>
                                <p class="mb-0">Students</p>
                            </div>
                        </div>
                        <div class="col-md-3 col-6 mb-3">
                            <div class="stat-item">
                                <h3 class="text-warning">{{ $stats['phd_faculty'] }}</h3>
                                <p class="mb-0">PhD Faculty</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Department Content -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <!-- Faculty Section -->
            @if($faculty->count() > 0)
            <div class="col-12 mb-5">
                <div class="section-header text-center mb-5">
                    <h2>Our Faculty</h2>
                    <p class="lead">Meet our experienced and dedicated faculty members</p>
                </div>
                
                <div class="row">
                    @foreach($faculty as $member)
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card h-100 faculty-card">
                            <div class="faculty-image-container">
                                <img src="{{ $member->image ? Storage::url($member->image) : 'https://via.placeholder.com/300x300/FFD700/2C3E50?text=' . urlencode(substr($member->name, 0, 2)) }}" 
                                     class="card-img-top faculty-image" 
                                     alt="{{ $member->name }}">
                                
                                <div class="position-absolute top-0 end-0 m-2">
                                    <span class="badge bg-primary">{{ $member->experience_years }} Years</span>
                                </div>
                            </div>
                            
                            <div class="card-body">
                                <h5 class="card-title">{{ $member->name }}</h5>
                                <h6 class="card-subtitle mb-2 text-warning">{{ $member->designation }}</h6>
                                
                                <p class="mb-2">
                                    <i class="fas fa-graduation-cap text-warning me-2"></i>
                                    <small>{{ $member->qualification }}</small>
                                </p>
                                
                                @if($member->specialization)
                                    <p class="mb-2">
                                        <i class="fas fa-star text-warning me-2"></i>
                                        <small>{{ $member->specialization }}</small>
                                    </p>
                                @endif
                                
                                @if($member->email)
                                    <div class="mt-3">
                                        <a href="mailto:{{ $member->email }}" class="btn btn-warning btn-sm">
                                            <i class="fas fa-envelope me-1"></i>Contact
                                        </a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif
            
            <!-- Courses Section -->
            @if($courses->count() > 0)
            <div class="col-12">
                <div class="section-header text-center mb-5">
                    <h2>Our Programs</h2>
                    <p class="lead">Explore the academic programs offered by our department</p>
                </div>
                
                <div class="row">
                    @foreach($courses as $course)
                    <div class="col-lg-6 col-md-6 mb-4">
                        <div class="card h-100 course-card">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-3">
                                    <i class="fas fa-graduation-cap fa-2x text-warning me-3"></i>
                                    <div>
                                        <h5 class="mb-1">{{ $course->name }}</h5>
                                        <p class="text-muted mb-0">{{ $course->code }}</p>
                                    </div>
                                </div>
                                
                                <p class="course-description">{{ $course->description }}</p>
                                
                                <div class="course-details mb-3">
                                    <div class="row">
                                        <div class="col-6">
                                            <small><i class="fas fa-clock text-warning me-1"></i><strong>Duration:</strong> {{ $course->duration_years }} Years</small>
                                        </div>
                                        <div class="col-6">
                                            <small><i class="fas fa-users text-warning me-1"></i><strong>Seats:</strong> {{ $course->total_seats }}</small>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-6">
                                            <small><i class="fas fa-rupee-sign text-warning me-1"></i><strong>Fees:</strong> ₹{{ number_format($course->fees_per_semester) }}/sem</small>
                                        </div>
                                        <div class="col-6">
                                            <small class="text-{{ $course->availability_status === 'available' ? 'success' : ($course->availability_status === 'limited' ? 'warning' : 'danger') }}">
                                                <i class="fas fa-circle me-1"></i><strong>{{ ucfirst($course->availability_status) }}</strong>
                                            </small>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="d-flex justify-content-between align-items-center">
                                    <a href="{{ route('courses.show', $course->id) }}" class="btn btn-outline-primary btn-sm">
                                        <i class="fas fa-info-circle me-1"></i>View Details
                                    </a>
                                    <div class="availability-indicator">
                                        <small class="text-muted">{{ $course->available_seats }}/{{ $course->total_seats }} available</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif
        </div>
    </div>
</section>

<!-- Department Achievements -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-5">
                <h2>Department Achievements</h2>
                <p class="lead">Our commitment to excellence in education and research</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 text-center mb-4">
                <div class="achievement-item">
                    <div class="achievement-number">{{ $stats['faculty_count'] }}</div>
                    <h5>Expert Faculty</h5>
                    <p>Qualified professionals</p>
                </div>
            </div>
            <div class="col-md-3 text-center mb-4">
                <div class="achievement-item">
                    <div class="achievement-number">{{ $stats['phd_faculty'] }}</div>
                    <h5>PhD Holders</h5>
                    <p>Research expertise</p>
                </div>
            </div>
            <div class="col-md-3 text-center mb-4">
                <div class="achievement-item">
                    <div class="achievement-number">{{ $stats['senior_faculty'] }}</div>
                    <h5>Senior Faculty</h5>
                    <p>10+ years experience</p>
                </div>
            </div>
            <div class="col-md-3 text-center mb-4">
                <div class="achievement-item">
                    <div class="achievement-number">{{ $stats['course_count'] }}</div>
                    <h5>Programs</h5>
                    <p>Diverse curriculum</p>
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
                <h3>Join {{ $departmentName }} Department</h3>
                <p class="lead mb-0">Start your journey with us and build a successful career in {{ $departmentName }}.</p>
            </div>
            <div class="col-lg-4 text-end">
                <a href="{{ route('contact.index') }}" class="btn btn-warning btn-lg">
                    <i class="fas fa-user-plus me-2"></i>Apply Now
                </a>
            </div>
        </div>
    </div>
</section>
@endsection

@push('styles')
<style>
.hero-section {
    background: linear-gradient(135deg, #2C3E50 0%, #34495e 100%);
}

.department-icon {
    width: 100px;
    height: 100px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: rgba(255, 215, 0, 0.1);
    border-radius: 50%;
}

.stat-item h3 {
    color: #FFD700;
    font-size: 2rem;
}

.faculty-card, .course-card {
    transition: all 0.3s ease;
    border: none;
    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
}

.faculty-card:hover, .course-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 25px rgba(0,0,0,0.15);
}

.faculty-image-container {
    overflow: hidden;
    height: 250px;
    position: relative;
}

.faculty-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: all 0.3s ease;
}

.faculty-card:hover .faculty-image {
    transform: scale(1.05);
}

.section-header h2 {
    position: relative;
    display: inline-block;
}

.section-header h2::after {
    content: '';
    position: absolute;
    bottom: -10px;
    left: 50%;
    transform: translateX(-50%);
    width: 60px;
    height: 3px;
    background: #FFD700;
}

.achievement-number {
    font-size: 3rem;
    font-weight: bold;
    color: #2C3E50;
    line-height: 1;
}

.achievement-item {
    padding: 2rem 1rem;
}

.breadcrumb-item + .breadcrumb-item::before {
    color: rgba(255,255,255,0.5);
}

@media (max-width: 768px) {
    .hero-section .display-4 {
        font-size: 2.5rem;
    }
    
    .department-icon {
        width: 80px;
        height: 80px;
    }
    
    .department-icon .fa-4x {
        font-size: 2.5rem !important;
    }
    
    .faculty-image-container {
        height: 200px;
    }
    
    .achievement-number {
        font-size: 2rem;
    }
}
</style>
@endpush
