@extends('layouts.app')

@section('title', 'Sitemap - Shantineketan College')
@section('description', 'Complete sitemap of Shantineketan College website. Find all pages, courses, faculty, notices, and more.')

@section('content')
<!-- Breadcrumb -->
<section class="py-3 bg-light">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active">Sitemap</li>
            </ol>
        </nav>
    </div>
</section>

<!-- Hero Section -->
<section class="py-5 bg-primary text-white">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <h1 class="display-4 fw-bold mb-3">Website Sitemap</h1>
                <p class="lead mb-4">Complete navigation guide to all pages and content on our website</p>
                <div class="d-flex flex-wrap gap-3">
                    <a href="#main-pages" class="btn btn-warning btn-lg">
                        <i class="fas fa-home me-2"></i>Main Pages
                    </a>
                    <a href="#courses" class="btn btn-outline-light btn-lg">
                        <i class="fas fa-graduation-cap me-2"></i>Courses
                    </a>
                    <a href="#faculty" class="btn btn-outline-light btn-lg">
                        <i class="fas fa-users me-2"></i>Faculty
                    </a>
                </div>
            </div>
            <div class="col-lg-4 text-center">
                <i class="fas fa-sitemap fa-8x opacity-50"></i>
            </div>
        </div>
    </div>
</section>

<!-- Quick Stats -->
<section class="py-4 bg-light">
    <div class="container">
        <div class="row text-center">
            <div class="col-md-2 col-6 mb-3">
                <div class="stat-item">
                    <h4 class="text-primary">{{ count($staticPages) }}</h4>
                    <small class="text-muted">Main Pages</small>
                </div>
            </div>
            <div class="col-md-2 col-6 mb-3">
                <div class="stat-item">
                    <h4 class="text-success">{{ $courses->flatten()->count() }}</h4>
                    <small class="text-muted">Courses</small>
                </div>
            </div>
            <div class="col-md-2 col-6 mb-3">
                <div class="stat-item">
                    <h4 class="text-warning">{{ $faculty->flatten()->count() }}</h4>
                    <small class="text-muted">Faculty</small>
                </div>
            </div>
            <div class="col-md-2 col-6 mb-3">
                <div class="stat-item">
                    <h4 class="text-info">{{ $notices->count() }}</h4>
                    <small class="text-muted">Recent Notices</small>
                </div>
            </div>
            <div class="col-md-2 col-6 mb-3">
                <div class="stat-item">
                    <h4 class="text-purple">{{ $gallery->count() }}</h4>
                    <small class="text-muted">Gallery Items</small>
                </div>
            </div>
            <div class="col-md-2 col-6 mb-3">
                <div class="stat-item">
                    <h4 class="text-danger">{{ $alumni->count() }}</h4>
                    <small class="text-muted">Alumni</small>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Main Pages Section -->
<section id="main-pages" class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-12 mb-5">
                <h2 class="section-title text-center">
                    <i class="fas fa-home text-primary me-3"></i>Main Pages
                </h2>
                <p class="text-center text-muted">Essential pages and sections of our website</p>
            </div>
        </div>
        
        <div class="row">
            @foreach($staticPages as $page)
            <div class="col-lg-6 col-md-6 mb-4">
                <div class="card h-100 sitemap-card">
                    <div class="card-body">
                        <h5 class="card-title">
                            <a href="{{ $page['url'] }}" class="text-decoration-none">
                                <i class="fas fa-external-link-alt text-primary me-2"></i>{{ $page['title'] }}
                            </a>
                        </h5>
                        <p class="card-text text-muted">{{ $page['description'] }}</p>
                        <a href="{{ $page['url'] }}" class="btn btn-outline-primary btn-sm">
                            Visit Page <i class="fas fa-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Courses Section -->
<section id="courses" class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-12 mb-5">
                <h2 class="section-title text-center">
                    <i class="fas fa-graduation-cap text-success me-3"></i>Academic Courses
                </h2>
                <p class="text-center text-muted">All our academic programs organized by department</p>
            </div>
        </div>
        
        @if($courses->count() > 0)
            @foreach($courses as $department => $departmentCourses)
            <div class="row mb-5">
                <div class="col-12">
                    <h3 class="text-success mb-4">
                        <i class="fas fa-building me-2"></i>{{ $department }} Department
                        <span class="badge bg-success ms-2">{{ $departmentCourses->count() }} Courses</span>
                    </h3>
                </div>
                
                @foreach($departmentCourses as $course)
                <div class="col-lg-4 col-md-6 mb-3">
                    <div class="card sitemap-card">
                        <div class="card-body">
                            <h6 class="card-title">
                                <a href="{{ route('courses.show', $course->slug ?? $course->id) }}" class="text-decoration-none">
                                    {{ $course->name }}
                                </a>
                            </h6>
                            @if($course->description)
                                <p class="card-text small text-muted">{{ Str::limit($course->description, 80) }}</p>
                            @endif
                            <a href="{{ route('courses.show', $course->slug ?? $course->id) }}" class="btn btn-outline-success btn-sm">
                                View Details
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @endforeach
        @else
            <div class="text-center">
                <p class="text-muted">No courses available at the moment.</p>
            </div>
        @endif
    </div>
</section>

<!-- Faculty Section -->
<section id="faculty" class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-12 mb-5">
                <h2 class="section-title text-center">
                    <i class="fas fa-users text-warning me-3"></i>Faculty Members
                </h2>
                <p class="text-center text-muted">Our experienced faculty organized by department</p>
            </div>
        </div>
        
        @if($faculty->count() > 0)
            @foreach($faculty as $department => $departmentFaculty)
            <div class="row mb-4">
                <div class="col-12">
                    <h3 class="text-warning mb-3">
                        <i class="fas fa-building me-2"></i>{{ $department }} Department
                        <span class="badge bg-warning text-dark ms-2">{{ $departmentFaculty->count() }} Members</span>
                    </h3>
                </div>
                
                @foreach($departmentFaculty as $member)
                <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
                    <div class="card sitemap-card">
                        <div class="card-body text-center">
                            <h6 class="card-title">
                                <a href="{{ route('faculty.show', $member->slug ?? $member->id) }}" class="text-decoration-none">
                                    {{ $member->name }}
                                </a>
                            </h6>
                            <p class="card-text small text-muted">{{ $member->designation }}</p>
                            <a href="{{ route('faculty.show', $member->slug ?? $member->id) }}" class="btn btn-outline-warning btn-sm">
                                View Profile
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @endforeach
        @else
            <div class="text-center">
                <p class="text-muted">No faculty information available at the moment.</p>
            </div>
        @endif
    </div>
</section>

<!-- Notices Section -->
<section id="notices" class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-12 mb-5">
                <h2 class="section-title text-center">
                    <i class="fas fa-bullhorn text-info me-3"></i>Recent Notices
                </h2>
                <p class="text-center text-muted">Latest announcements and notices</p>
            </div>
        </div>
        
        @if($notices->count() > 0)
            <div class="row">
                @foreach($notices as $notice)
                <div class="col-lg-6 col-md-6 mb-3">
                    <div class="card sitemap-card">
                        <div class="card-body">
                            <h6 class="card-title">
                                <a href="{{ route('notices.show', $notice->slug ?? $notice->id) }}" class="text-decoration-none">
                                    {{ $notice->title }}
                                </a>
                            </h6>
                            @if($notice->excerpt)
                                <p class="card-text small text-muted">{{ Str::limit($notice->excerpt, 100) }}</p>
                            @endif
                            <div class="d-flex justify-content-between align-items-center">
                                <small class="text-muted">
                                    <i class="fas fa-calendar me-1"></i>{{ $notice->publish_date->format('M d, Y') }}
                                </small>
                                <a href="{{ route('notices.show', $notice->slug ?? $notice->id) }}" class="btn btn-outline-info btn-sm">
                                    Read More
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            
            <div class="text-center mt-4">
                <a href="{{ route('notices.index') }}" class="btn btn-info">
                    <i class="fas fa-list me-2"></i>View All Notices
                </a>
            </div>
        @else
            <div class="text-center">
                <p class="text-muted">No notices available at the moment.</p>
            </div>
        @endif
    </div>
</section>

<!-- Gallery Section -->
<section id="gallery" class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-12 mb-5">
                <h2 class="section-title text-center">
                    <i class="fas fa-images text-purple me-3"></i>Gallery
                </h2>
                <p class="text-center text-muted">Campus photos and event galleries</p>
            </div>
        </div>
        
        @if($gallery->count() > 0)
            <div class="row">
                @foreach($gallery as $item)
                <div class="col-lg-4 col-md-6 mb-3">
                    <div class="card sitemap-card">
                        <div class="card-body">
                            <h6 class="card-title">
                                <a href="{{ route('gallery.show', $item->slug ?? $item->id) }}" class="text-decoration-none">
                                    {{ $item->title }}
                                </a>
                            </h6>
                            @if($item->description)
                                <p class="card-text small text-muted">{{ Str::limit($item->description, 80) }}</p>
                            @endif
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="badge bg-purple">{{ ucfirst($item->type) }}</span>
                                <a href="{{ route('gallery.show', $item->slug ?? $item->id) }}" class="btn btn-outline-purple btn-sm">
                                    View Gallery
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            
            <div class="text-center mt-4">
                <a href="{{ route('gallery.index') }}" class="btn btn-purple">
                    <i class="fas fa-images me-2"></i>View All Galleries
                </a>
            </div>
        @else
            <div class="text-center">
                <p class="text-muted">No gallery items available at the moment.</p>
            </div>
        @endif
    </div>
</section>

<!-- Alumni Section -->
<section id="alumni" class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-12 mb-5">
                <h2 class="section-title text-center">
                    <i class="fas fa-user-graduate text-danger me-3"></i>Alumni Network
                </h2>
                <p class="text-center text-muted">Our proud alumni and their achievements</p>
            </div>
        </div>
        
        @if($alumni->count() > 0)
            <div class="row">
                @foreach($alumni as $alum)
                <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
                    <div class="card sitemap-card">
                        <div class="card-body text-center">
                            <h6 class="card-title">
                                <a href="{{ route('alumni.show', $alum->slug ?? $alum->id) }}" class="text-decoration-none">
                                    {{ $alum->name }}
                                </a>
                            </h6>
                            <p class="card-text small text-muted">
                                {{ $alum->course }}<br>
                                <strong>Class of {{ $alum->graduation_year }}</strong>
                            </p>
                            <a href="{{ route('alumni.show', $alum->slug ?? $alum->id) }}" class="btn btn-outline-danger btn-sm">
                                View Profile
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            
            <div class="text-center mt-4">
                <a href="{{ route('alumni.index') }}" class="btn btn-danger">
                    <i class="fas fa-user-graduate me-2"></i>View All Alumni
                </a>
            </div>
        @else
            <div class="text-center">
                <p class="text-muted">No alumni profiles available at the moment.</p>
            </div>
        @endif
    </div>
</section>

<!-- XML Sitemap Section -->
<section class="py-5 bg-primary text-white">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <h3 class="mb-3">XML Sitemaps for Search Engines</h3>
                <p class="mb-4">Technical sitemaps for search engine optimization and indexing</p>
                <div class="d-flex flex-wrap gap-3">
                    <a href="{{ route('sitemap.index') }}" class="btn btn-warning" target="_blank">
                        <i class="fas fa-code me-2"></i>Main Sitemap
                    </a>
                    <a href="{{ route('sitemap.pages') }}" class="btn btn-outline-light" target="_blank">
                        <i class="fas fa-file-code me-2"></i>Pages Sitemap
                    </a>
                    <a href="{{ route('sitemap.courses') }}" class="btn btn-outline-light" target="_blank">
                        <i class="fas fa-graduation-cap me-2"></i>Courses Sitemap
                    </a>
                    <a href="{{ route('robots') }}" class="btn btn-outline-light" target="_blank">
                        <i class="fas fa-robot me-2"></i>Robots.txt
                    </a>
                </div>
            </div>
            <div class="col-lg-4 text-center">
                <i class="fas fa-search fa-6x opacity-50"></i>
            </div>
        </div>
    </div>
</section>
@endsection

@push('styles')
<style>
.sitemap-card {
    transition: all 0.3s ease;
    border: 1px solid #e9ecef;
}

.sitemap-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 25px rgba(0,0,0,0.1);
    border-color: var(--primary-yellow);
}

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

.stat-item h4 {
    font-weight: 700;
    margin-bottom: 5px;
}

.text-purple {
    color: #6f42c1 !important;
}

.bg-purple {
    background-color: #6f42c1 !important;
}

.btn-purple {
    background-color: #6f42c1;
    border-color: #6f42c1;
    color: white;
}

.btn-purple:hover {
    background-color: #5a359a;
    border-color: #5a359a;
    color: white;
}

.btn-outline-purple {
    border-color: #6f42c1;
    color: #6f42c1;
}

.btn-outline-purple:hover {
    background-color: #6f42c1;
    border-color: #6f42c1;
    color: white;
}

.opacity-50 {
    opacity: 0.5;
}

@media (max-width: 768px) {
    .sitemap-card {
        margin-bottom: 1rem;
    }
    
    .display-4 {
        font-size: 2rem;
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
    
    // Add animation to cards on scroll
    $(window).scroll(function() {
        $('.sitemap-card').each(function() {
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
