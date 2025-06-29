@extends('layouts.app')

@section('title', 'Faculty Designations - Shantineketan College')
@section('description', 'Explore faculty designations and academic positions at Shantineketan College, from professors to assistant professors.')

@section('content')
<!-- Hero Section -->
<section class="hero-section bg-success text-white py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <h1 class="display-4 fw-bold mb-3">Faculty Designations</h1>
                <p class="lead mb-4">Discover the academic hierarchy and positions of our distinguished faculty members across all departments.</p>
                <div class="hero-stats">
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <div class="stat-item">
                                <h3 class="text-warning fw-bold">{{ count($designationStats) }}</h3>
                                <p class="mb-0">Designations</p>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="stat-item">
                                <h3 class="text-warning fw-bold">{{ array_sum(array_column($designationStats, 'faculty_count')) }}</h3>
                                <p class="mb-0">Faculty Members</p>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="stat-item">
                                <h3 class="text-warning fw-bold">{{ round(array_sum(array_column($designationStats, 'avg_experience')) / count($designationStats), 1) }}</h3>
                                <p class="mb-0">Avg Experience</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 text-center">
                <i class="fas fa-user-tie fa-5x opacity-75"></i>
            </div>
        </div>
    </div>
</section>

<!-- Designations Grid -->
<section class="py-5">
    <div class="container">
        @if(count($designationStats) > 0)
            <div class="row">
                @foreach($designationStats as $designation)
                <div class="col-lg-6 col-md-6 mb-4">
                    <div class="card h-100 designation-card">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-3">
                                <div class="designation-icon me-3">
                                    <i class="fas fa-{{ str_contains($designation['name'], 'Professor') ? 'chalkboard-teacher' : (str_contains($designation['name'], 'Head') ? 'user-crown' : 'user-graduate') }} fa-3x text-success"></i>
                                </div>
                                <div>
                                    <h4 class="card-title mb-1">{{ $designation['name'] }}</h4>
                                    <p class="text-muted mb-0">Academic Position</p>
                                </div>
                            </div>
                            
                            <p class="card-text mb-4">{{ $designation['description'] }}</p>
                            
                            <div class="designation-stats mb-4">
                                <div class="row">
                                    <div class="col-4 text-center">
                                        <div class="stat-box">
                                            <h5 class="text-primary mb-1">{{ $designation['faculty_count'] }}</h5>
                                            <small class="text-muted">Faculty</small>
                                        </div>
                                    </div>
                                    <div class="col-4 text-center">
                                        <div class="stat-box">
                                            <h5 class="text-success mb-1">{{ $designation['departments']->count() }}</h5>
                                            <small class="text-muted">Departments</small>
                                        </div>
                                    </div>
                                    <div class="col-4 text-center">
                                        <div class="stat-box">
                                            <h5 class="text-info mb-1">{{ $designation['avg_experience'] }}</h5>
                                            <small class="text-muted">Avg Years</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="departments-list mb-3">
                                <h6 class="mb-2">Departments:</h6>
                                <div class="d-flex flex-wrap gap-1">
                                    @foreach($designation['departments'] as $dept)
                                        <span class="badge bg-light text-dark">{{ $dept }}</span>
                                    @endforeach
                                </div>
                            </div>
                            
                            <div class="d-flex justify-content-between align-items-center">
                                <a href="{{ route('designations.show', $designation['name']) }}" class="btn btn-success">
                                    <i class="fas fa-eye me-2"></i>View Faculty
                                </a>
                                <div class="designation-links">
                                    <a href="{{ route('faculty.index') }}?designation={{ urlencode($designation['name']) }}" class="btn btn-outline-secondary btn-sm" title="View Faculty">
                                        <i class="fas fa-users"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-5">
                <i class="fas fa-user-tie fa-4x text-muted mb-4"></i>
                <h3>No Designations Found</h3>
                <p class="text-muted">Faculty designations will be displayed here once faculty members are added.</p>
                <a href="{{ route('contact.index') }}" class="btn btn-success">
                    <i class="fas fa-phone me-2"></i>Contact Us
                </a>
            </div>
        @endif
    </div>
</section>

<!-- Academic Hierarchy -->
@if(count($designationStats) > 0)
<section class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-5">
                <h2>Academic Hierarchy</h2>
                <p class="lead">Understanding the academic positions and their roles in our institution</p>
            </div>
        </div>
        
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="hierarchy-chart">
                    @php
                        $hierarchyOrder = [
                            'Professor & Head of Department',
                            'Professor', 
                            'Associate Professor',
                            'Assistant Professor',
                            'Senior Lecturer',
                            'Lecturer'
                        ];
                        $sortedDesignations = collect($designationStats)->sortBy(function($item) use ($hierarchyOrder) {
                            $index = array_search($item['name'], $hierarchyOrder);
                            return $index !== false ? $index : 999;
                        });
                    @endphp
                    
                    @foreach($sortedDesignations as $designation)
                        <div class="hierarchy-item {{ !$loop->last ? 'mb-4' : '' }}">
                            <div class="row align-items-center">
                                <div class="col-md-3 text-center">
                                    <div class="hierarchy-icon">
                                        <i class="fas fa-{{ str_contains($designation['name'], 'Professor') ? 'chalkboard-teacher' : (str_contains($designation['name'], 'Head') ? 'user-crown' : 'user-graduate') }} fa-2x text-success"></i>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <h5 class="mb-1">{{ $designation['name'] }}</h5>
                                    <p class="text-muted mb-0">{{ Str::limit($designation['description'], 80) }}</p>
                                </div>
                                <div class="col-md-3 text-center">
                                    <div class="hierarchy-stats">
                                        <span class="badge bg-success fs-6">{{ $designation['faculty_count'] }} Faculty</span>
                                    </div>
                                </div>
                            </div>
                            @if(!$loop->last)
                                <div class="hierarchy-connector text-center mt-3">
                                    <i class="fas fa-chevron-down text-muted"></i>
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
@endif

<!-- Designation Highlights -->
@if(count($designationStats) > 0)
<section class="py-5 bg-success text-white">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-5">
                <h2>Faculty Excellence</h2>
                <p class="lead">Our faculty members bring diverse expertise and experience</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 text-center mb-4">
                <div class="highlight-item">
                    <div class="highlight-number">{{ count($designationStats) }}</div>
                    <h5>Academic Positions</h5>
                    <p>Diverse hierarchy</p>
                </div>
            </div>
            <div class="col-md-3 text-center mb-4">
                <div class="highlight-item">
                    <div class="highlight-number">{{ array_sum(array_column($designationStats, 'faculty_count')) }}</div>
                    <h5>Total Faculty</h5>
                    <p>Qualified educators</p>
                </div>
            </div>
            <div class="col-md-3 text-center mb-4">
                <div class="highlight-item">
                    <div class="highlight-number">{{ collect($designationStats)->flatMap(function($item) { return $item['departments']; })->unique()->count() }}</div>
                    <h5>Departments</h5>
                    <p>Academic diversity</p>
                </div>
            </div>
            <div class="col-md-3 text-center mb-4">
                <div class="highlight-item">
                    <div class="highlight-number">{{ round(array_sum(array_column($designationStats, 'avg_experience')) / count($designationStats), 1) }}</div>
                    <h5>Avg Experience</h5>
                    <p>Years of expertise</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endif

<!-- Call to Action -->
<section class="py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <h3>Join Our Academic Community</h3>
                <p class="lead mb-0">Explore opportunities to be part of our distinguished faculty team.</p>
            </div>
            <div class="col-lg-4 text-end">
                <a href="{{ route('faculty.index') }}" class="btn btn-success btn-lg me-3">
                    <i class="fas fa-users me-2"></i>View Faculty
                </a>
                <a href="{{ route('contact.index') }}" class="btn btn-outline-success btn-lg">
                    <i class="fas fa-phone me-2"></i>Contact Us
                </a>
            </div>
        </div>
    </div>
</section>
@endsection

@push('styles')
<style>
.hero-section {
    background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
}

.stat-item h3 {
    color: #FFD700;
    font-size: 2rem;
}

.designation-card {
    transition: all 0.3s ease;
    border: none;
    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
}

.designation-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 25px rgba(0,0,0,0.15);
}

.designation-icon {
    width: 80px;
    height: 80px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: rgba(40, 167, 69, 0.1);
    border-radius: 50%;
}

.stat-box {
    padding: 1rem;
    border-radius: 8px;
    background: rgba(0,0,0,0.02);
}

.hierarchy-chart {
    background: white;
    border-radius: 15px;
    padding: 2rem;
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
}

.hierarchy-icon {
    width: 60px;
    height: 60px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: rgba(40, 167, 69, 0.1);
    border-radius: 50%;
    margin: 0 auto;
}

.hierarchy-connector {
    height: 30px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.highlight-number {
    font-size: 3rem;
    font-weight: bold;
    color: #FFD700;
    line-height: 1;
}

.highlight-item {
    padding: 2rem 1rem;
}

.designation-links .btn {
    width: 35px;
    height: 35px;
    padding: 0;
    display: inline-flex;
    align-items: center;
    justify-content: center;
}

@media (max-width: 768px) {
    .hero-section .display-4 {
        font-size: 2.5rem;
    }
    
    .designation-icon {
        width: 60px;
        height: 60px;
    }
    
    .designation-icon .fa-3x {
        font-size: 2rem !important;
    }
    
    .hierarchy-chart {
        padding: 1rem;
    }
    
    .highlight-number {
        font-size: 2rem;
    }
}
</style>
@endpush
