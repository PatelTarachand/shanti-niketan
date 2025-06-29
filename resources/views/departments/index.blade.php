@extends('layouts.app')

@section('title', 'Departments - Shantineketan College')
@section('description', 'Explore our academic departments offering diverse programs in engineering, management, commerce, and more.')

@section('content')
<!-- Hero Section -->
<section class="hero-section bg-primary text-white py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <h1 class="display-4 fw-bold mb-3">Academic Departments</h1>
                <p class="lead mb-4">Discover our diverse academic departments, each committed to excellence in education, research, and innovation.</p>
                <div class="hero-stats">
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <div class="stat-item">
                                <h3 class="text-warning fw-bold">{{ count($departmentStats) }}</h3>
                                <p class="mb-0">Departments</p>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="stat-item">
                                <h3 class="text-warning fw-bold">{{ array_sum(array_column($departmentStats, 'faculty_count')) }}</h3>
                                <p class="mb-0">Faculty Members</p>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="stat-item">
                                <h3 class="text-warning fw-bold">{{ array_sum(array_column($departmentStats, 'course_count')) }}</h3>
                                <p class="mb-0">Programs</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 text-center">
                <i class="fas fa-university fa-5x opacity-75"></i>
            </div>
        </div>
    </div>
</section>

<!-- Departments Grid -->
<section class="py-5">
    <div class="container">
        @if(count($departmentStats) > 0)
            <div class="row">
                @foreach($departmentStats as $department)
                <div class="col-lg-6 col-md-6 mb-4">
                    <div class="card h-100 department-card">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-3">
                                <div class="department-icon me-3">
                                    <i class="fas fa-{{ $department['name'] === 'Computer Science' ? 'laptop-code' : ($department['name'] === 'Engineering' ? 'cogs' : ($department['name'] === 'Management' ? 'briefcase' : ($department['name'] === 'Commerce' ? 'chart-line' : 'graduation-cap'))) }} fa-3x text-warning"></i>
                                </div>
                                <div>
                                    <h4 class="card-title mb-1">{{ $department['name'] }}</h4>
                                    <p class="text-muted mb-0">Department</p>
                                </div>
                            </div>
                            
                            <p class="card-text mb-4">{{ $department['description'] }}</p>
                            
                            <div class="department-stats mb-4">
                                <div class="row">
                                    <div class="col-4 text-center">
                                        <div class="stat-box">
                                            <h5 class="text-primary mb-1">{{ $department['faculty_count'] }}</h5>
                                            <small class="text-muted">Faculty</small>
                                        </div>
                                    </div>
                                    <div class="col-4 text-center">
                                        <div class="stat-box">
                                            <h5 class="text-success mb-1">{{ $department['course_count'] }}</h5>
                                            <small class="text-muted">Courses</small>
                                        </div>
                                    </div>
                                    <div class="col-4 text-center">
                                        <div class="stat-box">
                                            <h5 class="text-info mb-1">{{ $department['student_count'] }}</h5>
                                            <small class="text-muted">Students</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="d-flex justify-content-between align-items-center">
                                <a href="{{ route('departments.show', $department['name']) }}" class="btn btn-primary">
                                    <i class="fas fa-eye me-2"></i>View Details
                                </a>
                                <div class="department-links">
                                    @if($department['faculty_count'] > 0)
                                        <a href="{{ route('faculty.index') }}?department={{ urlencode($department['name']) }}" class="btn btn-outline-secondary btn-sm me-1" title="Faculty">
                                            <i class="fas fa-users"></i>
                                        </a>
                                    @endif
                                    @if($department['course_count'] > 0)
                                        <a href="{{ route('courses.index') }}?department={{ urlencode($department['name']) }}" class="btn btn-outline-secondary btn-sm" title="Courses">
                                            <i class="fas fa-book"></i>
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-5">
                <i class="fas fa-university fa-4x text-muted mb-4"></i>
                <h3>No Departments Found</h3>
                <p class="text-muted">Departments will be displayed here once faculty and courses are added.</p>
                <a href="{{ route('contact.index') }}" class="btn btn-primary">
                    <i class="fas fa-phone me-2"></i>Contact Us
                </a>
            </div>
        @endif
    </div>
</section>

<!-- Department Highlights -->
@if(count($departmentStats) > 0)
<section class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-5">
                <h2>Department Highlights</h2>
                <p class="lead">Our departments are recognized for their excellence in education and research</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 text-center mb-4">
                <div class="highlight-item">
                    <div class="highlight-number">{{ count($departmentStats) }}</div>
                    <h5>Academic Departments</h5>
                    <p>Diverse fields of study</p>
                </div>
            </div>
            <div class="col-md-3 text-center mb-4">
                <div class="highlight-item">
                    <div class="highlight-number">{{ array_sum(array_column($departmentStats, 'faculty_count')) }}</div>
                    <h5>Expert Faculty</h5>
                    <p>Qualified and experienced</p>
                </div>
            </div>
            <div class="col-md-3 text-center mb-4">
                <div class="highlight-item">
                    <div class="highlight-number">{{ array_sum(array_column($departmentStats, 'course_count')) }}</div>
                    <h5>Academic Programs</h5>
                    <p>Comprehensive curriculum</p>
                </div>
            </div>
            <div class="col-md-3 text-center mb-4">
                <div class="highlight-item">
                    <div class="highlight-number">{{ array_sum(array_column($departmentStats, 'student_count')) }}</div>
                    <h5>Active Students</h5>
                    <p>Learning and growing</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endif

<!-- Call to Action -->
<section class="py-5 bg-primary text-white">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <h3>Interested in Our Programs?</h3>
                <p class="lead mb-0">Explore our courses and find the perfect program for your career goals.</p>
            </div>
            <div class="col-lg-4 text-end">
                <a href="{{ route('courses.index') }}" class="btn btn-warning btn-lg me-3">
                    <i class="fas fa-graduation-cap me-2"></i>View Courses
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
.hero-section {
    background: linear-gradient(135deg, #2C3E50 0%, #34495e 100%);
}

.stat-item h3 {
    color: #FFD700;
    font-size: 2rem;
}

.department-card {
    transition: all 0.3s ease;
    border: none;
    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
}

.department-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 25px rgba(0,0,0,0.15);
}

.department-icon {
    width: 80px;
    height: 80px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: rgba(255, 215, 0, 0.1);
    border-radius: 50%;
}

.stat-box {
    padding: 1rem;
    border-radius: 8px;
    background: rgba(0,0,0,0.02);
}

.highlight-number {
    font-size: 3rem;
    font-weight: bold;
    color: #2C3E50;
    line-height: 1;
}

.highlight-item {
    padding: 2rem 1rem;
}

.department-links .btn {
    width: 35px;
    height: 35px;
    padding: 0;
    display: inline-flex;
    align-items: center;
    justify-content: center;
}

@media (max-width: 768px) {
    .hero-section .display-4 {
        font-size: 2.5rem;
    }
    
    .department-icon {
        width: 60px;
        height: 60px;
    }
    
    .department-icon .fa-3x {
        font-size: 2rem !important;
    }
    
    .highlight-number {
        font-size: 2rem;
    }
}
</style>
@endpush
