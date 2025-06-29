@extends('layouts.app')

@section('title', $course->name . ' - Shantineketan College')

@section('content')
<!-- Course Hero Section -->
<section class="hero-section bg-primary text-white py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <nav aria-label="breadcrumb" class="mb-3">
                    <ol class="breadcrumb text-white-50">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-white-50">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('courses.index') }}" class="text-white-50">Courses</a></li>
                        <li class="breadcrumb-item active text-white">{{ $course->name }}</li>
                    </ol>
                </nav>
                <h1 class="display-4 fw-bold mb-3">{{ $course->name }}</h1>
                <p class="lead mb-4">{{ $course->description }}</p>
                <div class="course-badges">
                    <span class="badge bg-warning text-dark me-2 fs-6">{{ $course->code }}</span>
                    <span class="badge bg-light text-dark me-2 fs-6">{{ $course->department }}</span>
                    <span class="badge bg-{{ $course->availability_status === 'available' ? 'success' : ($course->availability_status === 'limited' ? 'warning' : 'danger') }} fs-6">
                        {{ ucfirst($course->availability_status) }}
                    </span>
                </div>
            </div>
            <div class="col-lg-4 text-center">
                <div class="course-stats bg-white bg-opacity-10 rounded p-4">
                    <div class="row">
                        <div class="col-6 mb-3">
                            <h3 class="text-warning">{{ $course->duration_years }}</h3>
                            <small>Years</small>
                        </div>
                        <div class="col-6 mb-3">
                            <h3 class="text-warning">{{ $course->total_semesters }}</h3>
                            <small>Semesters</small>
                        </div>
                        <div class="col-6">
                            <h3 class="text-warning">{{ $course->available_seats }}</h3>
                            <small>Available Seats</small>
                        </div>
                        <div class="col-6">
                            <h3 class="text-warning">₹{{ number_format($course->fees_per_semester/1000) }}K</h3>
                            <small>Per Semester</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Course Details -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <!-- Course Overview -->
                <div class="card mb-4">
                    <div class="card-body">
                        <h3 class="card-title">Course Overview</h3>
                        <p class="card-text">{{ $course->description }}</p>

                        <div class="row mt-4">
                            <div class="col-md-6">
                                <h5>Course Highlights</h5>
                                <ul class="list-unstyled">
                                    <li><i class="fas fa-check text-success me-2"></i>Industry-relevant curriculum</li>
                                    <li><i class="fas fa-check text-success me-2"></i>Experienced faculty</li>
                                    <li><i class="fas fa-check text-success me-2"></i>Modern infrastructure</li>
                                    <li><i class="fas fa-check text-success me-2"></i>Placement assistance</li>
                                    <li><i class="fas fa-check text-success me-2"></i>Research opportunities</li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <h5>Career Opportunities</h5>
                                <ul class="list-unstyled">
                                    @if($course->department === 'Engineering')
                                        <li><i class="fas fa-arrow-right text-warning me-2"></i>Software Engineer</li>
                                        <li><i class="fas fa-arrow-right text-warning me-2"></i>System Analyst</li>
                                        <li><i class="fas fa-arrow-right text-warning me-2"></i>Project Manager</li>
                                        <li><i class="fas fa-arrow-right text-warning me-2"></i>Technical Consultant</li>
                                    @elseif($course->department === 'Management')
                                        <li><i class="fas fa-arrow-right text-warning me-2"></i>Business Manager</li>
                                        <li><i class="fas fa-arrow-right text-warning me-2"></i>Marketing Executive</li>
                                        <li><i class="fas fa-arrow-right text-warning me-2"></i>Financial Analyst</li>
                                        <li><i class="fas fa-arrow-right text-warning me-2"></i>Entrepreneur</li>
                                    @elseif($course->department === 'Commerce')
                                        <li><i class="fas fa-arrow-right text-warning me-2"></i>Accountant</li>
                                        <li><i class="fas fa-arrow-right text-warning me-2"></i>Financial Advisor</li>
                                        <li><i class="fas fa-arrow-right text-warning me-2"></i>Tax Consultant</li>
                                        <li><i class="fas fa-arrow-right text-warning me-2"></i>Banking Professional</li>
                                    @else
                                        <li><i class="fas fa-arrow-right text-warning me-2"></i>Research Scientist</li>
                                        <li><i class="fas fa-arrow-right text-warning me-2"></i>Academic Professional</li>
                                        <li><i class="fas fa-arrow-right text-warning me-2"></i>Industry Expert</li>
                                        <li><i class="fas fa-arrow-right text-warning me-2"></i>Consultant</li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Eligibility Criteria -->
                @if($course->eligibility_criteria)
                <div class="card mb-4">
                    <div class="card-body">
                        <h3 class="card-title">Eligibility Criteria</h3>
                        <ul class="list-group list-group-flush">
                            @foreach($course->eligibility_criteria as $criteria)
                                <li class="list-group-item border-0 px-0">
                                    <i class="fas fa-check-circle text-success me-2"></i>{{ $criteria }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                @endif

                <!-- Fee Structure -->
                <div class="card mb-4">
                    <div class="card-body">
                        <h3 class="card-title">Fee Structure</h3>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Component</th>
                                        <th>Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Tuition Fee (per semester)</td>
                                        <td>₹{{ number_format($course->fees_per_semester * 0.7) }}</td>
                                    </tr>
                                    <tr>
                                        <td>Lab Fee (per semester)</td>
                                        <td>₹{{ number_format($course->fees_per_semester * 0.15) }}</td>
                                    </tr>
                                    <tr>
                                        <td>Library Fee (per semester)</td>
                                        <td>₹{{ number_format($course->fees_per_semester * 0.05) }}</td>
                                    </tr>
                                    <tr>
                                        <td>Other Fees (per semester)</td>
                                        <td>₹{{ number_format($course->fees_per_semester * 0.1) }}</td>
                                    </tr>
                                    <tr class="table-warning">
                                        <th>Total per Semester</th>
                                        <th>₹{{ number_format($course->fees_per_semester) }}</th>
                                    </tr>
                                    <tr class="table-info">
                                        <th>Total Course Fee</th>
                                        <th>₹{{ number_format($course->total_fees) }}</th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="col-lg-4">
                <!-- Quick Info -->
                <div class="card mb-4">
                    <div class="card-header bg-warning text-dark">
                        <h5 class="mb-0">Quick Information</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-sm table-borderless">
                            <tr>
                                <td><strong>Course:</strong></td>
                                <td>{{ $course->name }}</td>
                            </tr>
                            <tr>
                                <td><strong>Code:</strong></td>
                                <td>{{ $course->code }}</td>
                            </tr>
                            <tr>
                                <td><strong>Department:</strong></td>
                                <td>{{ $course->department }}</td>
                            </tr>
                            <tr>
                                <td><strong>Duration:</strong></td>
                                <td>{{ $course->duration_years }} Years</td>
                            </tr>
                            <tr>
                                <td><strong>Semesters:</strong></td>
                                <td>{{ $course->total_semesters }}</td>
                            </tr>
                            <tr>
                                <td><strong>Total Seats:</strong></td>
                                <td>{{ $course->total_seats }}</td>
                            </tr>
                            <tr>
                                <td><strong>Available:</strong></td>
                                <td class="text-{{ $course->availability_status === 'available' ? 'success' : ($course->availability_status === 'limited' ? 'warning' : 'danger') }}">
                                    {{ $course->available_seats }}
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>

                <!-- Admission Status -->
                <div class="card mb-4">
                    <div class="card-body text-center">
                        <h5>Admission Status</h5>
                        <div class="progress mb-3" style="height: 10px;">
                            <div class="progress-bar bg-{{ $course->availability_status === 'available' ? 'success' : ($course->availability_status === 'limited' ? 'warning' : 'danger') }}"
                                 style="width: {{ ($course->available_seats / $course->total_seats) * 100 }}%"></div>
                        </div>
                        <p class="mb-3">
                            <strong>{{ $course->available_seats }}</strong> out of <strong>{{ $course->total_seats }}</strong> seats available
                        </p>
                        @if($course->available_seats > 0)
                            <a href="{{ route('contact.index') }}" class="btn btn-warning btn-lg w-100">
                                <i class="fas fa-graduation-cap me-2"></i>Apply Now
                            </a>
                        @else
                            <button class="btn btn-secondary btn-lg w-100" disabled>
                                <i class="fas fa-times me-2"></i>Admissions Closed
                            </button>
                        @endif
                    </div>
                </div>

                <!-- Contact Information -->
                <div class="card">
                    <div class="card-body">
                        <h5>Need More Information?</h5>
                        <p class="small text-muted">Contact our admissions team for detailed information about this course.</p>
                        <div class="contact-info">
                            <p class="mb-2">
                                <i class="fas fa-phone text-warning me-2"></i>
                                <a href="tel:+919425514719">+91 94255 14719</a>
                            </p>
                            <p class="mb-2">
                                <i class="fas fa-envelope text-warning me-2"></i>
                                <a href="mailto:shantiniketan2009@yahoo.co.in">shantiniketan2009@yahoo.co.in</a>
                            </p>
                            <p class="mb-0">
                                <i class="fas fa-map-marker-alt text-warning me-2"></i>
                                Ring Road No.1, Near Pani Tanki, Changorbhatha, Raipur
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Related Courses -->
@if($relatedCourses->count() > 0)
<section class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-5">
                <h2>Related Courses</h2>
                <p class="lead">Explore other courses in {{ $course->department }}</p>
            </div>
        </div>
        <div class="row">
            @foreach($relatedCourses as $relatedCourse)
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">{{ $relatedCourse->name }}</h5>
                        <p class="card-text">{{ Str::limit($relatedCourse->description, 100) }}</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <small class="text-muted">{{ $relatedCourse->duration_years }} Years</small>
                            <a href="{{ route('courses.show', $relatedCourse->id) }}" class="btn btn-outline-primary btn-sm">View Details</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif
@endsection

@push('styles')
<style>
.hero-section {
    background: linear-gradient(135deg, #2C3E50 0%, #34495e 100%);
}

.course-stats {
    backdrop-filter: blur(10px);
}

.contact-info a {
    color: #2C3E50;
    text-decoration: none;
}

.contact-info a:hover {
    color: #FFD700;
}

.breadcrumb-item + .breadcrumb-item::before {
    color: rgba(255,255,255,0.5);
}
</style>
@endpush
@endsection
