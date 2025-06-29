@extends('layouts.app')

@section('title', $alumni->name . ' - Alumni Profile - Shantineketan College')
@section('description', 'View the profile of ' . $alumni->name . ', alumni of Shantineketan College.')

@section('content')
<!-- Breadcrumb -->
<section class="py-3">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('alumni.index') }}">Alumni</a></li>
                <li class="breadcrumb-item active">{{ $alumni->name }}</li>
            </ol>
        </nav>
    </div>
</section>

<!-- Alumni Profile -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <!-- Profile Card -->
                <div class="card alumni-profile-card sticky-top">
                    <div class="card-body text-center">
                        <div class="profile-photo mb-3">
                            <img src="{{ $alumni->profile_photo_url }}" class="rounded-circle img-fluid" width="150" height="150" alt="{{ $alumni->name }}">
                            @if($alumni->is_featured)
                                <span class="badge bg-warning position-absolute top-0 start-100 translate-middle">
                                    <i class="fas fa-star"></i> Featured
                                </span>
                            @endif
                        </div>

                        <h3 class="card-title">{{ $alumni->name }}</h3>

                        @if($alumni->current_position)
                            <p class="text-muted mb-1">{{ $alumni->current_position }}</p>
                        @endif

                        @if($alumni->current_company)
                            <p class="text-primary fw-bold mb-3">{{ $alumni->current_company }}</p>
                        @endif

                        @if($alumni->current_location)
                            <p class="text-muted mb-3">
                                <i class="fas fa-map-marker-alt me-2"></i>{{ $alumni->current_location }}
                            </p>
                        @endif

                        <!-- Badges -->
                        <div class="alumni-badges mb-3">
                            @if($alumni->is_verified)
                                <span class="badge bg-info mb-1">
                                    <i class="fas fa-check-circle me-1"></i>Verified Alumni
                                </span>
                            @endif
                            @if($alumni->industry)
                                <span class="badge bg-light text-dark mb-1">{{ $alumni->industry }}</span>
                            @endif
                        </div>

                        <!-- Social Links -->
                        @if($alumni->show_contact && count($alumni->social_links) > 0)
                            <div class="social-links mb-3">
                                <h6>Connect with {{ explode(' ', $alumni->name)[0] }}</h6>
                                <div class="d-flex justify-content-center gap-2">
                                    @foreach($alumni->social_links as $platform => $url)
                                        <a href="{{ $url }}" target="_blank" class="btn btn-outline-{{ $platform == 'linkedin' ? 'primary' : ($platform == 'twitter' ? 'info' : ($platform == 'facebook' ? 'primary' : 'secondary')) }} btn-sm">
                                            <i class="fab fa-{{ $platform }}"></i>
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        <!-- Contact Button -->
                        @if($alumni->show_contact && $alumni->email)
                            <a href="mailto:{{ $alumni->email }}" class="btn btn-primary">
                                <i class="fas fa-envelope me-2"></i>Contact
                            </a>
                        @endif
                    </div>
                </div>

                <!-- Quick Stats -->
                <div class="card mt-4">
                    <div class="card-header">
                        <h6 class="mb-0"><i class="fas fa-chart-bar me-2"></i>Quick Stats</h6>
                    </div>
                    <div class="card-body">
                        <div class="stat-item d-flex justify-content-between mb-2">
                            <span>Course:</span>
                            <strong>{{ $alumni->course }}</strong>
                        </div>
                        @if($alumni->branch)
                            <div class="stat-item d-flex justify-content-between mb-2">
                                <span>Branch:</span>
                                <strong>{{ $alumni->branch }}</strong>
                            </div>
                        @endif
                        <div class="stat-item d-flex justify-content-between mb-2">
                            <span>Graduated:</span>
                            <strong>{{ $alumni->passing_year }}</strong>
                        </div>
                        <div class="stat-item d-flex justify-content-between mb-2">
                            <span>Experience:</span>
                            <strong>{{ $alumni->experience_text }}</strong>
                        </div>
                        @if($alumni->years_since_graduation > 0)
                            <div class="stat-item d-flex justify-content-between">
                                <span>Years Since Graduation:</span>
                                <strong>{{ $alumni->years_since_graduation }}</strong>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-lg-8">
                <!-- Bio Section -->
                @if($alumni->bio)
                    <div class="card mb-4">
                        <div class="card-header">
                            <h5 class="mb-0"><i class="fas fa-user me-2"></i>About {{ explode(' ', $alumni->name)[0] }}</h5>
                        </div>
                        <div class="card-body">
                            <p class="lead">{{ $alumni->bio }}</p>
                        </div>
                    </div>
                @endif

                <!-- Professional Journey -->
                <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="mb-0"><i class="fas fa-briefcase me-2"></i>Professional Journey</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            @if($alumni->current_company)
                                <div class="col-md-6 mb-3">
                                    <h6 class="text-primary">Current Company</h6>
                                    <p class="mb-0">{{ $alumni->current_company }}</p>
                                </div>
                            @endif
                            @if($alumni->current_position)
                                <div class="col-md-6 mb-3">
                                    <h6 class="text-primary">Current Position</h6>
                                    <p class="mb-0">{{ $alumni->current_position }}</p>
                                </div>
                            @endif
                            @if($alumni->industry)
                                <div class="col-md-6 mb-3">
                                    <h6 class="text-primary">Industry</h6>
                                    <p class="mb-0">{{ $alumni->industry }}</p>
                                </div>
                            @endif
                            @if($alumni->experience_years > 0)
                                <div class="col-md-6 mb-3">
                                    <h6 class="text-primary">Experience</h6>
                                    <p class="mb-0">{{ $alumni->experience_text }}</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Skills -->
                @if($alumni->skills && count($alumni->skills) > 0)
                    <div class="card mb-4">
                        <div class="card-header">
                            <h5 class="mb-0"><i class="fas fa-cogs me-2"></i>Skills & Expertise</h5>
                        </div>
                        <div class="card-body">
                            <div class="skills-container">
                                @foreach($alumni->skills as $skill)
                                    <span class="badge bg-primary skill-badge">{{ $skill }}</span>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif

                <!-- Achievements -->
                @if($alumni->achievements && count($alumni->achievements) > 0)
                    <div class="card mb-4">
                        <div class="card-header">
                            <h5 class="mb-0"><i class="fas fa-trophy me-2"></i>Achievements & Awards</h5>
                        </div>
                        <div class="card-body">
                            <ul class="list-unstyled">
                                @foreach($alumni->achievements as $achievement)
                                    <li class="mb-2">
                                        <i class="fas fa-award text-warning me-2"></i>{{ $achievement }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif

                <!-- Testimonial -->
                @if($alumni->testimonial)
                    <div class="card mb-4">
                        <div class="card-header">
                            <h5 class="mb-0"><i class="fas fa-quote-left me-2"></i>Testimonial</h5>
                        </div>
                        <div class="card-body">
                            <blockquote class="blockquote">
                                <p class="mb-0">"{{ $alumni->testimonial }}"</p>
                                <footer class="blockquote-footer mt-2">
                                    <cite title="Source Title">{{ $alumni->name }}, Class of {{ $alumni->passing_year }}</cite>
                                </footer>
                            </blockquote>
                        </div>
                    </div>
                @endif

                <!-- Academic Background -->
                <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="mb-0"><i class="fas fa-graduation-cap me-2"></i>Academic Background</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <h6 class="text-primary">Course</h6>
                                <p class="mb-0">{{ $alumni->course }}</p>
                            </div>
                            @if($alumni->branch)
                                <div class="col-md-6 mb-3">
                                    <h6 class="text-primary">Branch/Specialization</h6>
                                    <p class="mb-0">{{ $alumni->branch }}</p>
                                </div>
                            @endif
                            @if($alumni->admission_year)
                                <div class="col-md-6 mb-3">
                                    <h6 class="text-primary">Admission Year</h6>
                                    <p class="mb-0">{{ $alumni->admission_year }}</p>
                                </div>
                            @endif
                            <div class="col-md-6 mb-3">
                                <h6 class="text-primary">Passing Year</h6>
                                <p class="mb-0">{{ $alumni->passing_year }}</p>
                            </div>
                            @if($alumni->student_id)
                                <div class="col-md-6 mb-3">
                                    <h6 class="text-primary">Student ID</h6>
                                    <p class="mb-0">{{ $alumni->student_id }}</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Related Alumni -->
        @if($relatedAlumni->count() > 0)
            <div class="row mt-5">
                <div class="col-12">
                    <h3 class="mb-4">Related Alumni</h3>
                    <div class="row">
                        @foreach($relatedAlumni as $related)
                            <div class="col-lg-4 col-md-6 mb-4">
                                <div class="card alumni-card h-100">
                                    <div class="card-body text-center">
                                        <img src="{{ $related->profile_photo_url }}" class="rounded-circle mb-3" width="80" height="80" alt="{{ $related->name }}">
                                        <h6 class="card-title">{{ $related->name }}</h6>
                                        <p class="text-muted small">{{ $related->current_position }}</p>
                                        <p class="text-primary small fw-bold">{{ $related->current_company }}</p>
                                        <small class="text-muted d-block">{{ $related->course }} • {{ $related->passing_year }}</small>
                                        <div class="mt-3">
                                            <a href="{{ route('alumni.show', $related) }}" class="btn btn-outline-primary btn-sm">
                                                View Profile
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif
    </div>
</section>
@endsection

@push('styles')
<style>
.alumni-profile-card {
    border: none;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    border-radius: 15px;
    position: relative;
    overflow: hidden;
}

.profile-photo {
    position: relative;
}

.profile-photo img {
    object-fit: cover;
    border: 4px solid #fff;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
}

.alumni-badges .badge {
    margin: 0 2px 5px 0;
    padding: 8px 12px;
    font-size: 0.8rem;
}

.social-links .btn {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
}

.skill-badge {
    margin: 0 5px 8px 0;
    padding: 8px 15px;
    font-size: 0.85rem;
    border-radius: 20px;
}

.skills-container {
    line-height: 2.5;
}

.stat-item {
    padding: 5px 0;
    border-bottom: 1px solid #f0f0f0;
}

.stat-item:last-child {
    border-bottom: none;
}

.card {
    border: none;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
    border-radius: 10px;
    margin-bottom: 1.5rem;
}

.card-header {
    background: linear-gradient(135deg, #f8f9fa, #e9ecef);
    border-bottom: 1px solid #dee2e6;
    border-radius: 10px 10px 0 0 !important;
}

.alumni-card {
    transition: all 0.3s ease;
}

.alumni-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
}

.blockquote {
    font-style: italic;
    font-size: 1.1rem;
    color: #495057;
}

@media (max-width: 768px) {
    .alumni-profile-card {
        position: static !important;
        margin-bottom: 2rem;
    }

    .social-links .btn {
        width: 35px;
        height: 35px;
    }

    .skill-badge {
        font-size: 0.75rem;
        padding: 6px 12px;
    }
}

@media (min-width: 992px) {
    .sticky-top {
        top: 2rem;
    }
}
</style>
@endpush
