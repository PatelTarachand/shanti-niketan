@extends('layouts.app')

@section('title', 'Faculty - Shantineketan College')
@section('description', 'Meet our experienced and qualified faculty members at Shantineketan College. Our expert teachers are dedicated to providing quality education.')

@section('content')
<!-- Hero Section -->
<section class="hero-section bg-primary text-white py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <h1 class="display-4 fw-bold mb-3">Our Faculty</h1>
                <p class="lead mb-4">Meet our experienced and dedicated faculty members who are committed to excellence in education and shaping the future of our students.</p>
                <div class="hero-stats">
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <div class="stat-item">
                                <h3 class="text-warning fw-bold">{{ $faculty->flatten()->count() }}</h3>
                                <p class="mb-0">Faculty Members</p>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="stat-item">
                                <h3 class="text-warning fw-bold">{{ $departments->count() }}</h3>
                                <p class="mb-0">Departments</p>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="stat-item">
                                <h3 class="text-warning fw-bold">{{ $faculty->flatten()->where('qualification', 'LIKE', '%Ph.D%')->count() }}</h3>
                                <p class="mb-0">PhD Holders</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 text-center">
                <i class="fas fa-chalkboard-teacher fa-5x opacity-75"></i>
            </div>
        </div>
    </div>
</section>

<!-- Department Filter -->
<section class="py-3 bg-light">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="filter-buttons">
                    <button class="btn btn-warning active" data-filter="all">All Faculty</button>
                    @foreach($departments as $department)
                        <button class="btn btn-outline-warning" data-filter="{{ $department }}">{{ $department }}</button>
                    @endforeach
                </div>
            </div>
            <div class="col-md-6 text-end">
                <small class="text-muted">{{ $faculty->flatten()->count() }} faculty members found</small>
            </div>
        </div>
    </div>
</section>

<!-- Dynamic Faculty Content -->
@if($faculty->flatten()->count() > 0)
    @foreach($faculty as $department => $departmentFaculty)
    <section class="py-5 {{ $loop->even ? 'bg-light' : '' }}" data-department="{{ $department }}">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb-5">
                    <h2 class="section-title">{{ $department }} Department</h2>
                    <p class="lead">{{ $departmentFaculty->count() }} faculty members</p>
                </div>
            </div>

            <div class="row faculty-grid">
                @foreach($departmentFaculty as $member)
                <div class="col-lg-4 col-md-6 mb-4 faculty-item" data-department="{{ $department }}">
                    <div class="card h-100 faculty-card">
                        <div class="faculty-image-container position-relative">
                            <img src="{{ $member->image ? Storage::url($member->image) : 'https://via.placeholder.com/300x300/FFD700/2C3E50?text=' . urlencode(substr($member->name, 0, 2)) }}"
                                 class="card-img-top faculty-image"
                                 alt="{{ $member->name }}">

                            <!-- Department Badge -->
                            <div class="position-absolute top-0 start-0 m-2">
                                <span class="badge bg-warning text-dark">{{ $member->department }}</span>
                            </div>

                            <!-- Experience Badge -->
                            <div class="position-absolute top-0 end-0 m-2">
                                <span class="badge bg-primary">{{ $member->experience_years }} Years</span>
                            </div>
                        </div>

                        <div class="card-body">
                            <h5 class="card-title">{{ $member->name }}</h5>
                            <h6 class="card-subtitle mb-2 text-warning">{{ $member->designation }}</h6>

                            <div class="faculty-details mb-3">
                                <p class="mb-2">
                                    <i class="fas fa-graduation-cap text-warning me-2"></i>
                                    <strong>Qualification:</strong> {{ $member->qualification }}
                                </p>

                                @if($member->specialization)
                                    <p class="mb-2">
                                        <i class="fas fa-star text-warning me-2"></i>
                                        <strong>Specialization:</strong> {{ $member->specialization }}
                                    </p>
                                @endif

                                <p class="mb-2">
                                    <i class="fas fa-clock text-warning me-2"></i>
                                    <strong>Experience:</strong> {{ $member->experience_years }} years
                                </p>

                                @if($member->email)
                                    <p class="mb-2">
                                        <i class="fas fa-envelope text-warning me-2"></i>
                                        <a href="mailto:{{ $member->email }}" class="text-decoration-none">{{ $member->email }}</a>
                                    </p>
                                @endif

                                @if($member->phone)
                                    <p class="mb-2">
                                        <i class="fas fa-phone text-warning me-2"></i>
                                        <a href="tel:{{ $member->phone }}" class="text-decoration-none">{{ $member->phone }}</a>
                                    </p>
                                @endif
                            </div>

                            @if($member->bio)
                                <div class="faculty-bio">
                                    <p class="text-muted small">{{ Str::limit($member->bio, 120) }}</p>
                                </div>
                            @endif

                            <div class="d-flex justify-content-between align-items-center mt-auto">
                                @if($member->email)
                                    <a href="mailto:{{ $member->email }}" class="btn btn-warning btn-sm">
                                        <i class="fas fa-envelope me-1"></i>Contact
                                    </a>
                                @endif

                                <div class="faculty-rating">
                                    @for($i = 1; $i <= 5; $i++)
                                        <i class="fas fa-star text-warning"></i>
                                    @endfor
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
    <!-- No Faculty Members -->
    <section class="py-5">
        <div class="container">
            <div class="text-center py-5">
                <i class="fas fa-chalkboard-teacher fa-4x text-muted mb-4"></i>
                <h3>Faculty Information Coming Soon</h3>
                <p class="text-muted">We're working on adding detailed faculty profiles to showcase our expert teaching staff.</p>
                <a href="{{ route('contact.index') }}" class="btn btn-primary">
                    <i class="fas fa-phone me-2"></i>Contact Us
                </a>
            </div>
        </div>
    </section>
@endif

<!-- Faculty Achievements Section -->
@if($faculty->flatten()->count() > 0)
<section class="py-5 bg-primary text-white">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-5">
                <h2>Faculty Achievements</h2>
                <p class="lead">Our faculty members are recognized for their excellence in teaching and research</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 text-center mb-4">
                <div class="achievement-item">
                    <div class="achievement-number">{{ $faculty->flatten()->where('qualification', 'LIKE', '%Ph.D%')->count() }}</div>
                    <h5>PhD Holders</h5>
                    <p>Advanced research expertise</p>
                </div>
            </div>
            <div class="col-md-3 text-center mb-4">
                <div class="achievement-item">
                    <div class="achievement-number">{{ $faculty->flatten()->where('experience_years', '>=', 10)->count() }}</div>
                    <h5>Senior Faculty</h5>
                    <p>10+ years experience</p>
                </div>
            </div>
            <div class="col-md-3 text-center mb-4">
                <div class="achievement-item">
                    <div class="achievement-number">{{ $faculty->flatten()->whereNotNull('specialization')->count() }}</div>
                    <h5>Specialists</h5>
                    <p>Subject matter experts</p>
                </div>
            </div>
            <div class="col-md-3 text-center mb-4">
                <div class="achievement-item">
                    <div class="achievement-number">{{ $departments->count() }}</div>
                    <h5>Departments</h5>
                    <p>Diverse academic fields</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endif

<!-- Join Our Faculty Section -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <h3>Join Our Faculty Team</h3>
                <p class="lead mb-0">We're always looking for passionate educators to join our team. If you're interested in teaching at Shantineketan College, we'd love to hear from you.</p>
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

.stat-item h3 {
    color: #FFD700;
    font-size: 2rem;
}

.filter-buttons .btn {
    margin: 0.25rem;
}

.faculty-card {
    transition: all 0.3s ease;
    border: none;
    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
}

.faculty-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 25px rgba(0,0,0,0.15);
}

.faculty-image-container {
    overflow: hidden;
    height: 300px;
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

.faculty-details p {
    font-size: 0.9rem;
    margin-bottom: 0.5rem;
}

.faculty-bio {
    border-top: 1px solid #eee;
    padding-top: 1rem;
    margin-top: 1rem;
}

.faculty-rating .fa-star {
    font-size: 0.8rem;
}

.section-title {
    position: relative;
    display: inline-block;
}

.section-title::after {
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
    color: #FFD700;
    line-height: 1;
}

.achievement-item {
    padding: 2rem 1rem;
}

@media (max-width: 768px) {
    .hero-section .display-4 {
        font-size: 2.5rem;
    }

    .filter-buttons {
        text-align: center;
        margin-bottom: 1rem;
    }

    .faculty-image-container {
        height: 250px;
    }

    .achievement-number {
        font-size: 2rem;
    }
}
</style>
@endpush

@push('scripts')
<script>
$(document).ready(function() {
    // Filter functionality
    $('.filter-buttons .btn').click(function() {
        $('.filter-buttons .btn').removeClass('active btn-warning').addClass('btn-outline-warning');
        $(this).removeClass('btn-outline-warning').addClass('active btn-warning');

        const filter = $(this).data('filter');

        if (filter === 'all') {
            $('.faculty-item').show();
            $('[data-department]').show();
        } else {
            $('.faculty-item').hide();
            $('[data-department]').hide();
            $(`.faculty-item[data-department="${filter}"]`).show();
            $(`[data-department="${filter}"]`).show();
        }
    });

    // Smooth scrolling for department sections
    $('.filter-buttons .btn').click(function() {
        const filter = $(this).data('filter');
        if (filter !== 'all') {
            setTimeout(() => {
                const target = $(`[data-department="${filter}"]`);
                if (target.length) {
                    $('html, body').animate({
                        scrollTop: target.offset().top - 100
                    }, 500);
                }
            }, 100);
        }
    });
});
</script>
@endpush
