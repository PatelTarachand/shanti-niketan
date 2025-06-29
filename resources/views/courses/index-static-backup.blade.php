@extends('layouts.app')

@section('title', 'Courses - Shantineketan College')
@section('description', 'Explore our comprehensive range of undergraduate, postgraduate, and diploma courses at Shantineketan College.')

@section('content')
<!-- Breadcrumb -->
<section class="py-3">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active">Courses</li>
            </ol>
        </nav>
    </div>
</section>

<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h1 class="display-4 fw-bold text-dark mb-4">Our Courses</h1>
                <p class="lead">Comprehensive programs designed to meet industry demands and academic excellence</p>
            </div>
            <div class="col-lg-6">
                <img src="{{ asset('snc_college.jpeg') }}" class="img-fluid rounded shadow" alt="Shantineketan College Academic Programs">
            </div>
        </div>
    </div>
</section>

<!-- Course Categories -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-5">
                <h2 class="section-title">Course Categories</h2>
                <p class="lead">Choose from our diverse range of academic programs</p>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-header text-center">
                        <i class="fas fa-graduation-cap fa-3x text-warning mb-3"></i>
                        <h4>Undergraduate Programs</h4>
                    </div>
                    <div class="card-body">
                        <p>Bachelor's degree programs with strong foundation in core subjects and practical skills.</p>
                        <ul class="list-unstyled">
                            <li><i class="fas fa-check text-warning me-2"></i>B.Tech (4 Years)</li>
                            <li><i class="fas fa-check text-warning me-2"></i>B.Com (3 Years)</li>
                            <li><i class="fas fa-check text-warning me-2"></i>BBA (3 Years)</li>
                            <li><i class="fas fa-check text-warning me-2"></i>B.Sc (3 Years)</li>
                        </ul>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('courses.undergraduate') }}" class="btn btn-primary w-100">View Programs</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-header text-center">
                        <i class="fas fa-user-graduate fa-3x text-warning mb-3"></i>
                        <h4>Postgraduate Programs</h4>
                    </div>
                    <div class="card-body">
                        <p>Advanced degree programs for specialized knowledge and research opportunities.</p>
                        <ul class="list-unstyled">
                            <li><i class="fas fa-check text-warning me-2"></i>M.Tech (2 Years)</li>
                            <li><i class="fas fa-check text-warning me-2"></i>MBA (2 Years)</li>
                            <li><i class="fas fa-check text-warning me-2"></i>M.Com (2 Years)</li>
                            <li><i class="fas fa-check text-warning me-2"></i>M.Sc (2 Years)</li>
                        </ul>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('courses.postgraduate') }}" class="btn btn-primary w-100">View Programs</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-header text-center">
                        <i class="fas fa-certificate fa-3x text-warning mb-3"></i>
                        <h4>Diploma Programs</h4>
                    </div>
                    <div class="card-body">
                        <p>Skill-focused programs for immediate industry readiness and practical expertise.</p>
                        <ul class="list-unstyled">
                            <li><i class="fas fa-check text-warning me-2"></i>Diploma in Engineering (3 Years)</li>
                            <li><i class="fas fa-check text-warning me-2"></i>Diploma in Computer Applications</li>
                            <li><i class="fas fa-check text-warning me-2"></i>Diploma in Management</li>
                            <li><i class="fas fa-check text-warning me-2"></i>Certificate Courses</li>
                        </ul>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('courses.diploma') }}" class="btn btn-primary w-100">View Programs</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Dynamic Courses by Department -->
@if($courses->count() > 0)
    @foreach($courses as $department => $departmentCourses)
    <section class="py-5 {{ $loop->even ? 'bg-light' : '' }}">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb-5">
                    <h2 class="section-title">{{ $department }} Programs</h2>
                    <p class="lead">Professional education with industry focus</p>
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
                                    <h5>{{ $course->name }}</h5>
                                    <p class="text-muted mb-0">{{ $course->code }} | {{ $course->department }}</p>
                                </div>
                            </div>
                            <p>{{ $course->description }}</p>

                            <div class="course-details mb-3">
                                <div class="row">
                                    <div class="col-6">
                                        <small><strong>Duration:</strong> {{ $course->duration_years }} Years</small>
                                    </div>
                                    <div class="col-6">
                                        <small><strong>Seats:</strong> {{ $course->total_seats }}</small>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-6">
                                        <small><strong>Fees:</strong> ₹{{ number_format($course->fees_per_semester) }}/sem</small>
                                    </div>
                                    <div class="col-6">
                                        <small class="text-{{ $course->availability_status === 'available' ? 'success' : ($course->availability_status === 'limited' ? 'warning' : 'danger') }}">
                                            <strong>{{ ucfirst($course->availability_status) }}</strong>
                                        </small>
                                    </div>
                                </div>
                            </div>

                            @if($course->eligibility_criteria)
                                <div class="eligibility mb-3">
                                    <small><strong>Eligibility:</strong></small>
                                    <ul class="small mb-0">
                                        @foreach($course->eligibility_criteria as $criteria)
                                            <li>{{ $criteria }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <div class="d-flex justify-content-between align-items-center">
                                <a href="{{ route('courses.show', $course->id) }}" class="btn btn-outline-primary btn-sm">
                                    <i class="fas fa-info-circle me-1"></i>View Details
                                </a>
                                <div class="availability-indicator">
                                    <div class="progress" style="width: 80px; height: 6px;">
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
@else
    <section class="py-5">
        <div class="container">
            <div class="text-center">
                <h3>No Courses Available</h3>
                <p class="text-muted">Please check back later for course offerings.</p>
            </div>
        </div>
    </section>
@endif



            <div class="col-lg-6 col-md-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-3">
                            <i class="fas fa-building fa-3x text-warning me-3"></i>
                            <div>
                                <h5>Civil Engineering</h5>
                                <p class="text-muted mb-0">B.Tech | M.Tech | Diploma</p>
                            </div>
                        </div>
                        <p>Infrastructure development, construction technology, environmental engineering, and urban planning.</p>
                        <div class="row">
                            <div class="col-6">
                                <small><strong>Duration:</strong> 4 Years (B.Tech)</small>
                            </div>
                            <div class="col-6">
                                <small><strong>Seats:</strong> 60</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-3">
                            <i class="fas fa-bolt fa-3x text-warning me-3"></i>
                            <div>
                                <h5>Electrical Engineering</h5>
                                <p class="text-muted mb-0">B.Tech | M.Tech | Diploma</p>
                            </div>
                        </div>
                        <p>Power systems, electronics, control systems, renewable energy, and electrical automation.</p>
                        <div class="row">
                            <div class="col-6">
                                <small><strong>Duration:</strong> 4 Years (B.Tech)</small>
                            </div>
                            <div class="col-6">
                                <small><strong>Seats:</strong> 60</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Management Courses -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-5">
                <h2 class="section-title">Management & Commerce Programs</h2>
                <p class="lead">Business education for future leaders and entrepreneurs</p>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-body text-center">
                        <i class="fas fa-briefcase fa-3x text-warning mb-3"></i>
                        <h5>Master of Business Administration (MBA)</h5>
                        <p>Comprehensive business management program with specializations in Finance, Marketing, HR, and Operations.</p>
                        <ul class="list-unstyled text-start">
                            <li><i class="fas fa-check text-warning me-2"></i>Duration: 2 Years</li>
                            <li><i class="fas fa-check text-warning me-2"></i>Seats: 120</li>
                            <li><i class="fas fa-check text-warning me-2"></i>Specializations: 4</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-body text-center">
                        <i class="fas fa-chart-line fa-3x text-warning mb-3"></i>
                        <h5>Bachelor of Business Administration (BBA)</h5>
                        <p>Foundation program in business administration covering all aspects of modern business management.</p>
                        <ul class="list-unstyled text-start">
                            <li><i class="fas fa-check text-warning me-2"></i>Duration: 3 Years</li>
                            <li><i class="fas fa-check text-warning me-2"></i>Seats: 60</li>
                            <li><i class="fas fa-check text-warning me-2"></i>Industry Exposure: Yes</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-body text-center">
                        <i class="fas fa-calculator fa-3x text-warning mb-3"></i>
                        <h5>Bachelor of Commerce (B.Com)</h5>
                        <p>Comprehensive commerce education with focus on accounting, finance, taxation, and business law.</p>
                        <ul class="list-unstyled text-start">
                            <li><i class="fas fa-check text-warning me-2"></i>Duration: 3 Years</li>
                            <li><i class="fas fa-check text-warning me-2"></i>Seats: 120</li>
                            <li><i class="fas fa-check text-warning me-2"></i>Professional Training: CA/CS</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Course Features -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-5">
                <h2 class="section-title">Why Choose Our Courses?</h2>
                <p class="lead">Distinctive features that make our programs stand out</p>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="text-center">
                    <div class="bg-warning text-dark rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                        <i class="fas fa-industry fa-2x"></i>
                    </div>
                    <h5>Industry-Relevant Curriculum</h5>
                    <p>Updated syllabus aligned with current industry requirements and emerging technologies.</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 mb-4">
                <div class="text-center">
                    <div class="bg-warning text-dark rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                        <i class="fas fa-chalkboard-teacher fa-2x"></i>
                    </div>
                    <h5>Expert Faculty</h5>
                    <p>Experienced professors and industry experts providing quality education and mentorship.</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 mb-4">
                <div class="text-center">
                    <div class="bg-warning text-dark rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                        <i class="fas fa-flask fa-2x"></i>
                    </div>
                    <h5>Modern Laboratories</h5>
                    <p>State-of-the-art labs and equipment for hands-on learning and practical experience.</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 mb-4">
                <div class="text-center">
                    <div class="bg-warning text-dark rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                        <i class="fas fa-handshake fa-2x"></i>
                    </div>
                    <h5>Industry Partnerships</h5>
                    <p>Strong ties with leading companies for internships, projects, and placement opportunities.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Admission Information -->
<section class="py-5" style="background: linear-gradient(135deg, var(--primary-yellow) 0%, var(--dark-yellow) 100%);">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <h3 class="text-dark mb-2">Ready to Join Our Academic Community?</h3>
                <p class="text-dark mb-0">Explore our admission process and take the first step towards your bright future.</p>
            </div>
            <div class="col-lg-4 text-lg-end">
                <a href="{{ route('admission.process') }}" class="btn btn-dark btn-lg me-3">Admission Process</a>
                <a href="{{ route('admission.apply') }}" class="btn btn-outline-dark btn-lg">Apply Now</a>
            </div>
        </div>
    </div>
</section>
@endsection
