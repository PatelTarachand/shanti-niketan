@extends('layouts.app')

@section('title', $faculty->name . ' - Faculty Profile - Shantineketan College')
@section('description', 'Learn about ' . $faculty->name . ', ' . $faculty->designation . ' at Shantineketan College. ' . ($faculty->qualification ?? ''))

@section('content')
<!-- Breadcrumb -->
<section class="py-3">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('faculty.index') }}">Faculty</a></li>
                <li class="breadcrumb-item active">{{ $faculty->name }}</li>
            </ol>
        </nav>
    </div>
</section>

<!-- Faculty Profile -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 mb-4">
                <div class="card">
                    <div class="card-body text-center">
                        <div class="faculty-image mb-3">
                            @if($faculty->image)
                                <img src="{{ Storage::url($faculty->image) }}" class="rounded-circle img-fluid" alt="{{ $faculty->name }}" style="width: 200px; height: 200px; object-fit: cover;">
                            @else
                                <div class="faculty-placeholder rounded-circle mx-auto d-flex align-items-center justify-content-center" style="width: 200px; height: 200px; background-color: #f8f9fa;">
                                    <i class="fas fa-user-tie fa-4x text-muted"></i>
                                </div>
                            @endif
                        </div>
                        <h3 class="card-title">{{ $faculty->name }}</h3>
                        <p class="text-primary fw-semibold">{{ $faculty->designation }}</p>
                        <p class="text-muted">
                            <i class="fas fa-building me-1"></i>{{ $faculty->department }}
                        </p>
                        
                        @if($faculty->email || $faculty->phone)
                        <div class="contact-info mt-3">
                            @if($faculty->email)
                            <p class="mb-1">
                                <i class="fas fa-envelope me-2"></i>
                                <a href="mailto:{{ $faculty->email }}">{{ $faculty->email }}</a>
                            </p>
                            @endif
                            @if($faculty->phone)
                            <p class="mb-1">
                                <i class="fas fa-phone me-2"></i>
                                <a href="tel:{{ $faculty->phone }}">{{ $faculty->phone }}</a>
                            </p>
                            @endif
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-4">Profile Details</h4>
                        
                        @if($faculty->qualification)
                        <div class="mb-3">
                            <h6 class="text-primary">
                                <i class="fas fa-graduation-cap me-2"></i>Qualification
                            </h6>
                            <p>{{ $faculty->qualification }}</p>
                        </div>
                        @endif
                        
                        @if($faculty->specialization)
                        <div class="mb-3">
                            <h6 class="text-primary">
                                <i class="fas fa-star me-2"></i>Specialization
                            </h6>
                            <p>{{ $faculty->specialization }}</p>
                        </div>
                        @endif
                        
                        @if($faculty->experience_years)
                        <div class="mb-3">
                            <h6 class="text-primary">
                                <i class="fas fa-clock me-2"></i>Experience
                            </h6>
                            <p>{{ $faculty->experience_years }}+ years of experience</p>
                        </div>
                        @endif
                        
                        @if($faculty->research_interests && count($faculty->research_interests) > 0)
                        <div class="mb-3">
                            <h6 class="text-primary">
                                <i class="fas fa-lightbulb me-2"></i>Research Interests
                            </h6>
                            <div class="research-interests">
                                @foreach($faculty->research_interests as $interest)
                                    <span class="badge bg-light text-dark me-2 mb-2">{{ $interest }}</span>
                                @endforeach
                            </div>
                        </div>
                        @endif
                        
                        @if($faculty->bio)
                        <div class="mb-3">
                            <h6 class="text-primary">
                                <i class="fas fa-user me-2"></i>Biography
                            </h6>
                            <p>{{ $faculty->bio }}</p>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Related Faculty -->
@if($relatedFaculty->count() > 0)
<section class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-5">
                <h3>Other Faculty from {{ $faculty->department }}</h3>
            </div>
        </div>
        
        <div class="row">
            @foreach($relatedFaculty as $member)
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-body text-center">
                        <div class="faculty-image mb-3">
                            @if($member->image)
                                <img src="{{ Storage::url($member->image) }}" class="rounded-circle" alt="{{ $member->name }}" style="width: 80px; height: 80px; object-fit: cover;">
                            @else
                                <div class="faculty-placeholder rounded-circle mx-auto d-flex align-items-center justify-content-center" style="width: 80px; height: 80px; background-color: #f8f9fa;">
                                    <i class="fas fa-user-tie fa-2x text-muted"></i>
                                </div>
                            @endif
                        </div>
                        <h6 class="card-title">{{ $member->name }}</h6>
                        <p class="text-primary small">{{ $member->designation }}</p>
                        <a href="{{ route('faculty.show', $member->id) }}" class="btn btn-outline-primary btn-sm">
                            <i class="fas fa-eye me-1"></i>View Profile
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif
@endsection
