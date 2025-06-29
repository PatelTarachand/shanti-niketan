@extends('layouts.app')

@section('title', 'Courses - Shantineketan College')

@section('content')
<!-- Hero Section -->
<section class="hero-section bg-primary text-white py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <h1 class="display-4 fw-bold mb-3">Our Courses</h1>
                <p class="lead mb-4">Discover world-class education programs designed to shape your future and unlock your potential.</p>
                <div class="hero-stats">
                    <div class="row">
                        <div class="col-md-3 col-6 mb-3">
                            <div class="stat-item">
                                <h3 class="fw-bold">{{ $courses->flatten()->count() }}</h3>
                                <p class="mb-0">Courses</p>
                            </div>
                        </div>
                        <div class="col-md-3 col-6 mb-3">
                            <div class="stat-item">
                                <h3 class="fw-bold">{{ $departments->count() }}</h3>
                                <p class="mb-0">Departments</p>
                            </div>
                        </div>
                        <div class="col-md-3 col-6 mb-3">
                            <div class="stat-item">
                                <h3 class="fw-bold">{{ $courses->flatten()->sum('total_seats') }}</h3>
                                <p class="mb-0">Total Seats</p>
                            </div>
                        </div>
                        <div class="col-md-3 col-6 mb-3">
                            <div class="stat-item">
                                <h3 class="fw-bold">{{ $courses->flatten()->sum('available_seats') }}</h3>
                                <p class="mb-0">Available</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 text-center">
                <img src="{{ asset('snc_college.jpeg') }}" alt="Shantineketan College" class="img-fluid rounded shadow">
            </div>
        </div>
    </div>
</section>

<!-- Quick Navigation -->
<section class="py-4 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="d-flex flex-wrap justify-content-center gap-3">
                    <a href="#all-courses" class="btn btn-outline-primary btn-sm">All Courses</a>
                    @foreach($departments as $department)
                        <a href="#{{ Str::slug($department) }}" class="btn btn-outline-secondary btn-sm">{{ $department }}</a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Dynamic Courses by Department -->
@if($courses->count() > 0)
    <div id="all-courses">
        @foreach($courses as $department => $departmentCourses)
        <section class="py-5 {{ $loop->even ? 'bg-light' : '' }}" id="{{ Str::slug($department) }}">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center mb-5">
                        <h2 class="section-title">{{ $department }} Programs</h2>
                        <p class="lead">Professional education with industry focus</p>
                        <div class="section-divider mx-auto"></div>
                    </div>
                </div>

                <div class="row">
                    @foreach($departmentCourses as $course)
                    <div class="col-lg-6 col-md-6 mb-4">
                        <div class="card h-100 course-card">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-3">
                                    <i class="fas fa-{{ $course->department === 'Engineering' ? 'laptop-code' : ($course->department === 'Management' ? 'briefcase' : ($course->department === 'Commerce' ? 'chart-line' : 'graduation-cap')) }} fa-3x text-warning me-3"></i>
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

                                @if($course->eligibility_criteria)
                                    <div class="eligibility mb-3">
                                        <h6 class="small text-warning mb-2"><i class="fas fa-check-circle me-1"></i>Eligibility:</h6>
                                        <ul class="small mb-0 ps-3">
                                            @foreach($course->eligibility_criteria as $criteria)
                                                <li>{{ $criteria }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <div class="d-flex justify-content-between align-items-center mt-auto">
                                    <a href="{{ route('courses.show', $course->id) }}" class="btn btn-outline-primary btn-sm">
                                        <i class="fas fa-info-circle me-1"></i>View Details
                                    </a>
                                    <div class="availability-indicator text-end">
                                        <div class="progress mb-1" style="width: 80px; height: 6px;">
                                            <div class="progress-bar bg-{{ $course->availability_status === 'available' ? 'success' : ($course->availability_status === 'limited' ? 'warning' : 'danger') }}"
                                                 style="width: {{ ($course->available_seats / $course->total_seats) * 100 }}%"></div>
                                        </div>
                                        <small class="text-muted">{{ $course->available_seats }}/{{ $course->total_seats }} available</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
        @endforeach
    </div>
@else
    <section class="py-5">
        <div class="container">
            <div class="text-center">
                <i class="fas fa-graduation-cap fa-4x text-muted mb-4"></i>
                <h3>No Courses Available</h3>
                <p class="text-muted">Please check back later for course offerings.</p>
            </div>
        </div>
    </section>
@endif

<!-- Admission Process -->
<section class="py-5 bg-primary text-white">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-5">
                <h2>Admission Process</h2>
                <p class="lead">Simple steps to join Shantineketan College</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 text-center mb-4">
                <div class="admission-step">
                    <div class="step-number">1</div>
                    <h5>Apply Online</h5>
                    <p>Fill the application form with required documents</p>
                </div>
            </div>
            <div class="col-md-3 text-center mb-4">
                <div class="admission-step">
                    <div class="step-number">2</div>
                    <h5>Entrance Test</h5>
                    <p>Appear for entrance examination or submit scores</p>
                </div>
            </div>
            <div class="col-md-3 text-center mb-4">
                <div class="admission-step">
                    <div class="step-number">3</div>
                    <h5>Merit List</h5>
                    <p>Check your name in the published merit list</p>
                </div>
            </div>
            <div class="col-md-3 text-center mb-4">
                <div class="admission-step">
                    <div class="step-number">4</div>
                    <h5>Admission</h5>
                    <p>Complete admission formalities and fee payment</p>
                </div>
            </div>
        </div>
        <div class="text-center mt-4">
            <a href="{{ route('contact.index') }}" class="btn btn-warning btn-lg">
                <i class="fas fa-phone me-2"></i>Contact Admissions
            </a>
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

.section-divider {
    width: 60px;
    height: 4px;
    background: #FFD700;
    margin: 1rem auto;
}

.course-card {
    transition: all 0.3s ease;
    border: none;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
}

.course-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 25px rgba(0,0,0,0.15);
}

.course-description {
    color: #666;
    line-height: 1.6;
}

.eligibility ul {
    list-style-type: none;
}

.eligibility li:before {
    content: "✓";
    color: #28a745;
    font-weight: bold;
    margin-right: 0.5rem;
}

.admission-step {
    padding: 2rem 1rem;
}

.step-number {
    width: 60px;
    height: 60px;
    background: #FFD700;
    color: #2C3E50;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.5rem;
    font-weight: bold;
    margin: 0 auto 1rem;
}

.progress {
    border-radius: 3px;
}

@media (max-width: 768px) {
    .hero-section .display-4 {
        font-size: 2.5rem;
    }

    .course-card .fa-3x {
        font-size: 2rem !important;
    }
}
</style>
@endpush

@push('scripts')
<script>
$(document).ready(function() {
    // Smooth scrolling for navigation links
    $('a[href^="#"]').on('click', function(event) {
        var target = $(this.getAttribute('href'));
        if( target.length ) {
            event.preventDefault();
            $('html, body').stop().animate({
                scrollTop: target.offset().top - 100
            }, 1000);
        }
    });
});
</script>
@endpush
