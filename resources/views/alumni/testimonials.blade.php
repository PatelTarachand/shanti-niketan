@extends('layouts.app')

@section('title', 'Alumni Testimonials - Shantineketan College')
@section('description', 'Read inspiring testimonials from our successful alumni about their experience at Shantineketan College.')

@section('content')
<!-- Breadcrumb -->
<section class="py-3">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('alumni.index') }}">Alumni</a></li>
                <li class="breadcrumb-item active">Testimonials</li>
            </ol>
        </nav>
    </div>
</section>

<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h1 class="display-4 fw-bold text-dark mb-4">Alumni Testimonials</h1>
                <p class="lead">Hear from our successful graduates about how Shantineketan College shaped their careers and lives.</p>
                <div class="d-flex gap-3 mt-4">
                    <a href="{{ route('alumni.index') }}" class="btn btn-primary btn-lg">
                        <i class="fas fa-users me-2"></i>View All Alumni
                    </a>
                    <a href="{{ route('contact.index') }}" class="btn btn-outline-primary btn-lg">
                        <i class="fas fa-envelope me-2"></i>Contact Us
                    </a>
                </div>
            </div>
            <div class="col-lg-6">
                <img src="{{ asset('snc_college.jpeg') }}" class="img-fluid rounded shadow" alt="Alumni Testimonials - Shantineketan College">
            </div>
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section class="py-5">
    <div class="container">
        @if($testimonials->count() > 0)
            <div class="row">
                @foreach($testimonials as $alumni)
                    <div class="col-lg-6 mb-4">
                        <div class="testimonial-card h-100">
                            <div class="card-body">
                                <div class="testimonial-header d-flex align-items-center mb-3">
                                    <img src="{{ $alumni->profile_photo_url }}" class="rounded-circle me-3" width="60" height="60" alt="{{ $alumni->name }}">
                                    <div>
                                        <h6 class="mb-0">{{ $alumni->name }}</h6>
                                        <small class="text-muted">{{ $alumni->current_position }}</small>
                                        <div class="text-primary small fw-bold">{{ $alumni->current_company }}</div>
                                    </div>
                                    @if($alumni->is_featured)
                                        <span class="badge bg-warning ms-auto">
                                            <i class="fas fa-star"></i>
                                        </span>
                                    @endif
                                </div>

                                <blockquote class="testimonial-quote">
                                    <i class="fas fa-quote-left text-warning fa-2x mb-3"></i>
                                    <p class="mb-3">{{ $alumni->testimonial }}</p>
                                    <footer class="testimonial-footer">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <strong>{{ $alumni->course }}</strong>
                                                <div class="text-muted small">Class of {{ $alumni->passing_year }}</div>
                                            </div>
                                            <div class="text-end">
                                                @if($alumni->current_location)
                                                    <div class="text-muted small">
                                                        <i class="fas fa-map-marker-alt me-1"></i>{{ $alumni->current_location }}
                                                    </div>
                                                @endif
                                                @if($alumni->experience_years > 0)
                                                    <div class="text-muted small">{{ $alumni->experience_text }}</div>
                                                @endif
                                            </div>
                                        </div>
                                    </footer>
                                </blockquote>

                                <div class="testimonial-actions mt-3">
                                    <a href="{{ route('alumni.show', $alumni) }}" class="btn btn-outline-primary btn-sm">
                                        <i class="fas fa-user me-1"></i>View Profile
                                    </a>
                                    @if($alumni->show_contact && $alumni->linkedin_url)
                                        <a href="{{ $alumni->linkedin_url }}" target="_blank" class="btn btn-outline-info btn-sm">
                                            <i class="fab fa-linkedin me-1"></i>LinkedIn
                                        </a>
                                    @endif
                                    @if($alumni->available_for_mentoring)
                                        <span class="badge bg-success ms-2">Available for Mentoring</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="d-flex justify-content-center mt-4">
                {{ $testimonials->links() }}
            </div>
        @else
            <div class="text-center py-5">
                <i class="fas fa-quote-left fa-3x text-muted mb-3"></i>
                <h4>No Testimonials Yet</h4>
                <p class="text-muted">Check back later for inspiring stories from our alumni!</p>
                <a href="{{ route('alumni.index') }}" class="btn btn-primary">
                    <i class="fas fa-users me-2"></i>View Alumni Directory
                </a>
            </div>
        @endif
    </div>
</section>

<!-- Call to Action -->
<section class="py-5 bg-warning bg-opacity-10">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <h3>Inspired by These Stories?</h3>
                <p class="mb-0">Connect with our alumni and get guidance for your own career journey.</p>
            </div>
            <div class="col-lg-4 text-lg-end">
                <a href="{{ route('contact.index') }}" class="btn btn-warning btn-lg">
                    <i class="fas fa-envelope me-2"></i>Contact Us
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Statistics -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row text-center">
            <div class="col-md-3 col-6 mb-3">
                <div class="stat-item">
                    <h3 class="text-primary">{{ $testimonials->total() }}+</h3>
                    <p class="text-muted mb-0">Testimonials</p>
                </div>
            </div>
            <div class="col-md-3 col-6 mb-3">
                <div class="stat-item">
                    <h3 class="text-success">{{ $testimonials->where('is_featured', true)->count() }}+</h3>
                    <p class="text-muted mb-0">Featured Stories</p>
                </div>
            </div>
            <div class="col-md-3 col-6 mb-3">
                <div class="stat-item">
                    <h3 class="text-warning">{{ $testimonials->where('available_for_mentoring', true)->count() }}+</h3>
                    <p class="text-muted mb-0">Mentors Available</p>
                </div>
            </div>
            <div class="col-md-3 col-6 mb-3">
                <div class="stat-item">
                    <h3 class="text-info">{{ $testimonials->unique('current_company')->count() }}+</h3>
                    <p class="text-muted mb-0">Companies</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('styles')
<style>
.testimonial-card {
    background: white;
    border: none;
    border-radius: 15px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
}

.testimonial-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
}

.testimonial-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: linear-gradient(135deg, var(--primary-color), var(--primary-yellow));
}

.testimonial-header img {
    object-fit: cover;
    border: 3px solid #fff;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
}

.testimonial-quote {
    position: relative;
    padding: 1rem 0;
}

.testimonial-quote p {
    font-style: italic;
    font-size: 1.1rem;
    line-height: 1.6;
    color: #495057;
    margin-bottom: 1rem;
}

.testimonial-footer {
    border-top: 1px solid #e9ecef;
    padding-top: 1rem;
}

.testimonial-actions .btn {
    border-radius: 20px;
    font-size: 0.875rem;
}

.stat-item h3 {
    font-size: 2.5rem;
    font-weight: 700;
    margin-bottom: 0.5rem;
}

.badge {
    font-size: 0.75rem;
    padding: 0.5rem 0.75rem;
}

@media (max-width: 768px) {
    .testimonial-card {
        margin-bottom: 2rem;
    }

    .testimonial-quote p {
        font-size: 1rem;
    }

    .stat-item h3 {
        font-size: 2rem;
    }

    .testimonial-footer {
        text-align: center;
    }

    .testimonial-footer .d-flex {
        flex-direction: column;
        gap: 1rem;
    }
}

/* Animation for quote icon */
.fa-quote-left {
    opacity: 0.3;
    position: absolute;
    top: -10px;
    left: -5px;
}

/* Hover effects */
.testimonial-card:hover .fa-quote-left {
    opacity: 0.6;
    transform: scale(1.1);
    transition: all 0.3s ease;
}

/* Custom scrollbar for long testimonials */
.testimonial-quote::-webkit-scrollbar {
    width: 4px;
}

.testimonial-quote::-webkit-scrollbar-track {
    background: #f1f1f1;
    border-radius: 10px;
}

.testimonial-quote::-webkit-scrollbar-thumb {
    background: var(--primary-color);
    border-radius: 10px;
}
</style>
@endpush
