@extends('layouts.app')

@section('title', 'Alumni - Shantineketan College')
@section('description', 'Connect with our successful alumni network from Shantineketan College.')

@section('content')
<!-- Breadcrumb -->
<section class="py-3">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active">Alumni</li>
            </ol>
        </nav>
    </div>
</section>

<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h1 class="display-4 fw-bold text-dark mb-4">Our Alumni Network</h1>
                <p class="lead">Connect with our successful graduates who are making their mark across various industries worldwide.</p>
                <div class="d-flex gap-3 mt-4">
                    <a href="{{ route('alumni.testimonials') }}" class="btn btn-primary btn-lg">
                        <i class="fas fa-quote-left me-2"></i>Read Testimonials
                    </a>
                    <a href="{{ route('contact.index') }}" class="btn btn-outline-primary btn-lg">
                        <i class="fas fa-envelope me-2"></i>Contact Us
                    </a>
                </div>
            </div>
            <div class="col-lg-6">
                <img src="{{ asset('snc_college.jpeg') }}" class="img-fluid rounded shadow" alt="Alumni Network - Shantineketan College">
            </div>
        </div>
    </div>
</section>

<!-- Statistics Section -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row text-center">
            <div class="col-md-3 col-6 mb-3">
                <div class="stat-card">
                    <h3 class="text-primary display-6 fw-bold">{{ $stats['total'] }}+</h3>
                    <p class="text-muted mb-0">Alumni</p>
                </div>
            </div>
            <div class="col-md-3 col-6 mb-3">
                <div class="stat-card">
                    <h3 class="text-success display-6 fw-bold">{{ $stats['companies'] }}+</h3>
                    <p class="text-muted mb-0">Companies</p>
                </div>
            </div>
            <div class="col-md-3 col-6 mb-3">
                <div class="stat-card">
                    <h3 class="text-warning display-6 fw-bold">{{ $stats['mentors'] }}+</h3>
                    <p class="text-muted mb-0">Mentors</p>
                </div>
            </div>
            <div class="col-md-3 col-6 mb-3">
                <div class="stat-card">
                    <h3 class="text-info display-6 fw-bold">{{ $stats['recent'] }}+</h3>
                    <p class="text-muted mb-0">Recent Grads</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Search and Filter Section -->
<section class="py-4">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <form action="{{ route('alumni.index') }}" method="GET" class="search-form">
                    <div class="row g-3">
                        <div class="col-md-4">
                            <input type="text" name="search" class="form-control" placeholder="Search alumni..." value="{{ request('search') }}">
                        </div>
                        <div class="col-md-2">
                            <select name="course" class="form-select">
                                <option value="">All Courses</option>
                                @foreach($courses as $course)
                                    <option value="{{ $course }}" {{ request('course') == $course ? 'selected' : '' }}>{{ $course }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-2">
                            <select name="year" class="form-select">
                                <option value="">All Years</option>
                                @foreach($years as $year)
                                    <option value="{{ $year }}" {{ request('year') == $year ? 'selected' : '' }}>{{ $year }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-2">
                            <select name="industry" class="form-select">
                                <option value="">All Industries</option>
                                @foreach($industries as $industry)
                                    <option value="{{ $industry }}" {{ request('industry') == $industry ? 'selected' : '' }}>{{ $industry }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-primary w-100">
                                <i class="fas fa-search me-2"></i>Search
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- Featured Alumni Section -->
@if($featuredAlumni->count() > 0)
<section class="py-5 bg-warning bg-opacity-10">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-5">
                <h2 class="section-title">Featured Alumni</h2>
                <p class="lead">Meet our distinguished graduates making a difference</p>
            </div>
        </div>
        <div class="row">
            @foreach($featuredAlumni as $alumnus)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card alumni-card h-100">
                        <div class="card-body text-center">
                            <div class="alumni-photo mb-3">
                                <img src="{{ $alumnus->profile_photo_url }}" class="rounded-circle" width="100" height="100" alt="{{ $alumnus->name }}">
                                @if($alumnus->is_featured)
                                    <span class="badge bg-warning position-absolute top-0 start-100 translate-middle">
                                        <i class="fas fa-star"></i>
                                    </span>
                                @endif
                            </div>
                            <h5 class="card-title">{{ $alumnus->name }}</h5>
                            <p class="text-muted">{{ $alumnus->current_position }}</p>
                            <p class="text-primary fw-bold">{{ $alumnus->current_company }}</p>
                            <div class="alumni-details">
                                <small class="text-muted d-block">{{ $alumnus->course }} • Class of {{ $alumnus->passing_year }}</small>
                                <small class="text-muted d-block">{{ $alumnus->current_location }}</small>
                                @if($alumnus->available_for_mentoring)
                                    <span class="badge bg-success mt-2">Available for Mentoring</span>
                                @endif
                            </div>
                            <div class="mt-3">
                                <a href="{{ route('alumni.show', $alumnus) }}" class="btn btn-outline-primary btn-sm">
                                    <i class="fas fa-user me-1"></i>View Profile
                                </a>
                                @if($alumnus->show_contact && $alumnus->linkedin_url)
                                    <a href="{{ $alumnus->linkedin_url }}" target="_blank" class="btn btn-outline-info btn-sm">
                                        <i class="fab fa-linkedin me-1"></i>LinkedIn
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- Alumni Directory -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-12 mb-4">
                <div class="d-flex justify-content-between align-items-center">
                    <h2 class="section-title mb-0">Alumni Directory</h2>
                    <div class="d-flex gap-2">
                        <a href="{{ route('alumni.mentors') }}" class="btn btn-outline-warning">
                            <i class="fas fa-chalkboard-teacher me-2"></i>Find Mentors
                        </a>
                        <a href="{{ route('alumni.testimonials') }}" class="btn btn-outline-success">
                            <i class="fas fa-quote-left me-2"></i>Testimonials
                        </a>
                    </div>
                </div>
            </div>
        </div>

        @if($alumni->count() > 0)
            <div class="row">
                @foreach($alumni as $alumnus)
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card alumni-card h-100">
                            <div class="card-body">
                                <div class="d-flex align-items-start">
                                    <div class="alumni-photo me-3">
                                        <img src="{{ $alumnus->profile_photo_url }}" class="rounded-circle" width="60" height="60" alt="{{ $alumnus->name }}">
                                    </div>
                                    <div class="flex-grow-1">
                                        <h6 class="card-title mb-1">{{ $alumnus->name }}</h6>
                                        <p class="text-muted small mb-1">{{ $alumnus->current_position }}</p>
                                        <p class="text-primary small fw-bold mb-2">{{ $alumnus->current_company }}</p>

                                        <div class="alumni-meta">
                                            <small class="text-muted d-block">{{ $alumnus->course }} • {{ $alumnus->passing_year }}</small>
                                            <small class="text-muted d-block">{{ $alumnus->experience_text }}</small>
                                            @if($alumnus->current_location)
                                                <small class="text-muted d-block">
                                                    <i class="fas fa-map-marker-alt me-1"></i>{{ $alumnus->current_location }}
                                                </small>
                                            @endif
                                        </div>

                                        <div class="mt-2">
                                            @if($alumnus->available_for_mentoring)
                                                <span class="badge bg-success badge-sm">Mentor</span>
                                            @endif
                                            @if($alumnus->is_featured)
                                                <span class="badge bg-warning badge-sm">Featured</span>
                                            @endif
                                            @if($alumnus->industry)
                                                <span class="badge bg-light text-dark badge-sm">{{ $alumnus->industry }}</span>
                                            @endif
                                        </div>

                                        <div class="mt-3">
                                            <a href="{{ route('alumni.show', $alumnus) }}" class="btn btn-outline-primary btn-sm">
                                                View Profile
                                            </a>
                                            @if($alumnus->show_contact)
                                                @foreach($alumnus->social_links as $platform => $url)
                                                    <a href="{{ $url }}" target="_blank" class="btn btn-outline-secondary btn-sm">
                                                        <i class="fab fa-{{ $platform }}"></i>
                                                    </a>
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="d-flex justify-content-center mt-4">
                {{ $alumni->appends(request()->query())->links() }}
            </div>
        @else
            <div class="text-center py-5">
                <i class="fas fa-users fa-3x text-muted mb-3"></i>
                <h4>No Alumni Found</h4>
                <p class="text-muted">
                    @if(request()->hasAny(['course', 'year', 'industry', 'search']))
                        No alumni match your current filters. <a href="{{ route('alumni.index') }}">View all alumni</a>
                    @else
                        Check back later for alumni profiles.
                    @endif
                </p>
            </div>
        @endif
    </div>
</section>

<!-- Call to Action -->
<section class="py-5 bg-primary text-white">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <h3>Connect with Our Alumni Network</h3>
                <p class="mb-0">Explore success stories, find mentors, and get inspired by our accomplished graduates.</p>
            </div>
            <div class="col-lg-4 text-lg-end">
                <a href="{{ route('contact.index') }}" class="btn btn-warning btn-lg">
                    <i class="fas fa-envelope me-2"></i>Contact Us
                </a>
            </div>
        </div>
    </div>
</section>
@endsection

@push('styles')
<style>
.stat-card {
    padding: 2rem 1rem;
    background: white;
    border-radius: 10px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease;
}

.stat-card:hover {
    transform: translateY(-5px);
}

.search-form {
    background: white;
    padding: 2rem;
    border-radius: 15px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
}

.alumni-card {
    border: none;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
}

.alumni-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
}

.alumni-photo {
    position: relative;
}

.alumni-photo img {
    object-fit: cover;
    border: 3px solid #fff;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
}

.badge-sm {
    font-size: 0.7rem;
    padding: 0.25rem 0.5rem;
}

.alumni-meta small {
    line-height: 1.4;
}

@media (max-width: 768px) {
    .search-form {
        padding: 1rem;
    }

    .stat-card {
        padding: 1rem;
        margin-bottom: 1rem;
    }

    .alumni-card .card-body {
        padding: 1rem;
    }
}
</style>
@endpush
