@extends('layouts.app')

@section('title', 'Downloads - Shantineketan College')
@section('description', 'Download important documents, forms, prospectus, and other resources from Shantineketan College.')

@section('content')
<!-- Breadcrumb -->
<section class="py-3">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active">Downloads</li>
            </ol>
        </nav>
    </div>
</section>

<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h1 class="display-4 fw-bold text-dark mb-4">Downloads</h1>
                <p class="lead">Access important documents, forms, and resources</p>
            </div>
            <div class="col-lg-6">
                <img src="{{ asset('snc_college.jpeg') }}" class="img-fluid rounded shadow" alt="Downloads">
            </div>
        </div>
    </div>
</section>

<!-- Download Categories -->
<section class="py-3 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="d-flex flex-wrap justify-content-center gap-2 mb-4">
                    <button class="btn btn-outline-primary active" data-filter="all">All Downloads</button>
                    <button class="btn btn-outline-primary" data-filter="prospectus">Prospectus</button>
                    <button class="btn btn-outline-primary" data-filter="forms">Forms</button>
                    <button class="btn btn-outline-primary" data-filter="academic">Academic</button>
                    <button class="btn btn-outline-primary" data-filter="examination">Examination</button>
                    <button class="btn btn-outline-primary" data-filter="placement">Placement</button>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Downloads Section -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-5">
                <h2 class="section-title">Important Downloads</h2>
                <p class="lead">Download essential documents and resources</p>
            </div>
        </div>
        
        <div class="row">
            <!-- Prospectus Downloads -->
            <div class="col-lg-4 col-md-6 mb-4 download-item" data-category="prospectus">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-3">
                            <i class="fas fa-book fa-3x text-warning me-3"></i>
                            <div>
                                <h5>College Prospectus 2025-26</h5>
                                <small class="text-muted">PDF | 5.2 MB</small>
                            </div>
                        </div>
                        <p>Complete information about courses, admission process, fee structure, and facilities.</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="badge bg-warning text-dark">PROSPECTUS</span>
                            <a href="#" class="btn btn-outline-primary btn-sm">
                                <i class="fas fa-download me-1"></i>Download
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Forms Downloads -->
            <div class="col-lg-4 col-md-6 mb-4 download-item" data-category="forms">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-3">
                            <i class="fas fa-file-alt fa-3x text-warning me-3"></i>
                            <div>
                                <h5>Admission Application Form</h5>
                                <small class="text-muted">PDF | 1.1 MB</small>
                            </div>
                        </div>
                        <p>Application form for admission to undergraduate and postgraduate programs.</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="badge bg-success text-white">FORMS</span>
                            <a href="#" class="btn btn-outline-primary btn-sm">
                                <i class="fas fa-download me-1"></i>Download
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6 mb-4 download-item" data-category="forms">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-3">
                            <i class="fas fa-clipboard fa-3x text-warning me-3"></i>
                            <div>
                                <h5>Examination Form</h5>
                                <small class="text-muted">PDF | 0.8 MB</small>
                            </div>
                        </div>
                        <p>Form for semester and supplementary examination registration.</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="badge bg-success text-white">FORMS</span>
                            <a href="#" class="btn btn-outline-primary btn-sm">
                                <i class="fas fa-download me-1"></i>Download
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Academic Downloads -->
            <div class="col-lg-4 col-md-6 mb-4 download-item" data-category="academic">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-3">
                            <i class="fas fa-calendar-alt fa-3x text-warning me-3"></i>
                            <div>
                                <h5>Academic Calendar 2024-25</h5>
                                <small class="text-muted">PDF | 2.1 MB</small>
                            </div>
                        </div>
                        <p>Complete academic calendar with important dates and holidays.</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="badge bg-info text-white">ACADEMIC</span>
                            <a href="#" class="btn btn-outline-primary btn-sm">
                                <i class="fas fa-download me-1"></i>Download
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6 mb-4 download-item" data-category="academic">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-3">
                            <i class="fas fa-book-open fa-3x text-warning me-3"></i>
                            <div>
                                <h5>Syllabus - B.Tech CSE</h5>
                                <small class="text-muted">PDF | 3.5 MB</small>
                            </div>
                        </div>
                        <p>Complete syllabus for B.Tech Computer Science & Engineering program.</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="badge bg-info text-white">ACADEMIC</span>
                            <a href="#" class="btn btn-outline-primary btn-sm">
                                <i class="fas fa-download me-1"></i>Download
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6 mb-4 download-item" data-category="academic">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-3">
                            <i class="fas fa-graduation-cap fa-3x text-warning me-3"></i>
                            <div>
                                <h5>MBA Curriculum</h5>
                                <small class="text-muted">PDF | 2.8 MB</small>
                            </div>
                        </div>
                        <p>Detailed curriculum for MBA program with all specializations.</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="badge bg-info text-white">ACADEMIC</span>
                            <a href="#" class="btn btn-outline-primary btn-sm">
                                <i class="fas fa-download me-1"></i>Download
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Examination Downloads -->
            <div class="col-lg-4 col-md-6 mb-4 download-item" data-category="examination">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-3">
                            <i class="fas fa-clock fa-3x text-warning me-3"></i>
                            <div>
                                <h5>Exam Timetable</h5>
                                <small class="text-muted">PDF | 1.5 MB</small>
                            </div>
                        </div>
                        <p>Examination timetable for all courses and semesters.</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="badge bg-danger text-white">EXAMINATION</span>
                            <a href="#" class="btn btn-outline-primary btn-sm">
                                <i class="fas fa-download me-1"></i>Download
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6 mb-4 download-item" data-category="examination">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-3">
                            <i class="fas fa-list-alt fa-3x text-warning me-3"></i>
                            <div>
                                <h5>Examination Guidelines</h5>
                                <small class="text-muted">PDF | 0.9 MB</small>
                            </div>
                        </div>
                        <p>Important guidelines and rules for examinations.</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="badge bg-danger text-white">EXAMINATION</span>
                            <a href="#" class="btn btn-outline-primary btn-sm">
                                <i class="fas fa-download me-1"></i>Download
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Placement Downloads -->
            <div class="col-lg-4 col-md-6 mb-4 download-item" data-category="placement">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-3">
                            <i class="fas fa-briefcase fa-3x text-warning me-3"></i>
                            <div>
                                <h5>Placement Brochure</h5>
                                <small class="text-muted">PDF | 4.2 MB</small>
                            </div>
                        </div>
                        <p>Complete placement information and statistics for recruiters.</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="badge bg-purple text-white">PLACEMENT</span>
                            <a href="#" class="btn btn-outline-primary btn-sm">
                                <i class="fas fa-download me-1"></i>Download
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6 mb-4 download-item" data-category="placement">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-3">
                            <i class="fas fa-chart-line fa-3x text-warning me-3"></i>
                            <div>
                                <h5>Placement Statistics</h5>
                                <small class="text-muted">PDF | 1.8 MB</small>
                            </div>
                        </div>
                        <p>Detailed placement statistics and company-wise data.</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="badge bg-purple text-white">PLACEMENT</span>
                            <a href="#" class="btn btn-outline-primary btn-sm">
                                <i class="fas fa-download me-1"></i>Download
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Additional Forms -->
            <div class="col-lg-4 col-md-6 mb-4 download-item" data-category="forms">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-3">
                            <i class="fas fa-id-card fa-3x text-warning me-3"></i>
                            <div>
                                <h5>ID Card Application</h5>
                                <small class="text-muted">PDF | 0.6 MB</small>
                            </div>
                        </div>
                        <p>Application form for student ID card and duplicate ID card.</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="badge bg-success text-white">FORMS</span>
                            <a href="#" class="btn btn-outline-primary btn-sm">
                                <i class="fas fa-download me-1"></i>Download
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Quick Downloads -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-5">
                <h2 class="section-title">Quick Downloads</h2>
                <p class="lead">Most frequently downloaded documents</p>
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="text-center">
                    <i class="fas fa-file-pdf fa-3x text-danger mb-3"></i>
                    <h6>College Prospectus</h6>
                    <a href="#" class="btn btn-outline-danger btn-sm">Download PDF</a>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="text-center">
                    <i class="fas fa-file-alt fa-3x text-primary mb-3"></i>
                    <h6>Admission Form</h6>
                    <a href="#" class="btn btn-outline-primary btn-sm">Download PDF</a>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="text-center">
                    <i class="fas fa-calendar fa-3x text-success mb-3"></i>
                    <h6>Academic Calendar</h6>
                    <a href="#" class="btn btn-outline-success btn-sm">Download PDF</a>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="text-center">
                    <i class="fas fa-clock fa-3x text-warning mb-3"></i>
                    <h6>Exam Timetable</h6>
                    <a href="#" class="btn btn-outline-warning btn-sm">Download PDF</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Help Section -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <div class="alert alert-info">
                    <h5><i class="fas fa-info-circle me-2"></i>Need Help?</h5>
                    <p class="mb-0">If you're unable to find the document you're looking for or facing any issues with downloads, please contact our office at <strong>shantiniketan2009@yahoo.co.in</strong> or call <strong>+91 94255 14719</strong></p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
$(document).ready(function() {
    // Download filter functionality
    $('[data-filter]').on('click', function() {
        var filter = $(this).data('filter');
        
        // Update active button
        $('[data-filter]').removeClass('active');
        $(this).addClass('active');
        
        // Show/hide download items
        if (filter === 'all') {
            $('.download-item').show();
        } else {
            $('.download-item').hide();
            $('.download-item[data-category="' + filter + '"]').show();
        }
    });
});
</script>

<style>
.badge.bg-purple {
    background-color: #6f42c1 !important;
}
</style>
@endpush
