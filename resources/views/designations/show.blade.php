@extends('layouts.app')

@section('title', $designationName . ' - Faculty Designation - Shantineketan College')
@section('description', 'Meet our ' . $designationName . ' faculty members at Shantineketan College and learn about their expertise and experience.')

@section('content')
<!-- Hero Section -->
<section class="hero-section bg-success text-white py-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb" class="mb-3">
                    <ol class="breadcrumb text-white-50">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-white-50">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('designations.index') }}" class="text-white-50">Designations</a></li>
                        <li class="breadcrumb-item active text-white">{{ $designationName }}</li>
                    </ol>
                </nav>
                
                <div class="d-flex align-items-center mb-4">
                    <div class="designation-icon me-4">
                        <i class="fas fa-{{ str_contains($designationName, 'Professor') ? 'chalkboard-teacher' : (str_contains($designationName, 'Head') ? 'user-crown' : 'user-graduate') }} fa-4x text-warning"></i>
                    </div>
                    <div>
                        <h1 class="display-4 fw-bold mb-2">{{ $designationName }}</h1>
                        <p class="lead mb-0">Academic Position</p>
                    </div>
                </div>
                
                <div class="designation-stats">
                    <div class="row">
                        <div class="col-md-3 col-6 mb-3">
                            <div class="stat-item">
                                <h3 class="text-warning">{{ $stats['faculty_count'] }}</h3>
                                <p class="mb-0">Faculty Members</p>
                            </div>
                        </div>
                        <div class="col-md-3 col-6 mb-3">
                            <div class="stat-item">
                                <h3 class="text-warning">{{ $stats['department_count'] }}</h3>
                                <p class="mb-0">Departments</p>
                            </div>
                        </div>
                        <div class="col-md-3 col-6 mb-3">
                            <div class="stat-item">
                                <h3 class="text-warning">{{ $stats['avg_experience'] }}</h3>
                                <p class="mb-0">Avg Experience</p>
                            </div>
                        </div>
                        <div class="col-md-3 col-6 mb-3">
                            <div class="stat-item">
                                <h3 class="text-warning">{{ $stats['phd_count'] }}</h3>
                                <p class="mb-0">PhD Holders</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Faculty by Department -->
<section class="py-5">
    <div class="container">
        @foreach($facultyByDepartment as $department => $departmentFaculty)
        <div class="department-section {{ !$loop->last ? 'mb-5' : '' }}">
            <div class="section-header text-center mb-4">
                <h2>{{ $department }} Department</h2>
                <p class="lead">{{ $departmentFaculty->count() }} {{ $designationName }} {{ $departmentFaculty->count() > 1 ? 'members' : 'member' }}</p>
            </div>
            
            <div class="row">
                @foreach($departmentFaculty as $member)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card h-100 faculty-card">
                        <div class="faculty-image-container position-relative">
                            <img src="{{ $member->image ? Storage::url($member->image) : 'https://via.placeholder.com/300x300/28a745/ffffff?text=' . urlencode(substr($member->name, 0, 2)) }}" 
                                 class="card-img-top faculty-image" 
                                 alt="{{ $member->name }}">
                            
                            <!-- Department Badge -->
                            <div class="position-absolute top-0 start-0 m-2">
                                <span class="badge bg-warning text-dark">{{ $member->department }}</span>
                            </div>
                            
                            <!-- Experience Badge -->
                            <div class="position-absolute top-0 end-0 m-2">
                                <span class="badge bg-success">{{ $member->experience_years }} Years</span>
                            </div>
                        </div>
                        
                        <div class="card-body">
                            <h5 class="card-title">{{ $member->name }}</h5>
                            <h6 class="card-subtitle mb-3 text-success">{{ $member->designation }}</h6>
                            
                            <div class="faculty-details mb-3">
                                <p class="mb-2">
                                    <i class="fas fa-graduation-cap text-success me-2"></i>
                                    <strong>Qualification:</strong><br>
                                    <small>{{ $member->qualification }}</small>
                                </p>
                                
                                @if($member->specialization)
                                    <p class="mb-2">
                                        <i class="fas fa-star text-success me-2"></i>
                                        <strong>Specialization:</strong><br>
                                        <small>{{ $member->specialization }}</small>
                                    </p>
                                @endif
                                
                                <p class="mb-2">
                                    <i class="fas fa-clock text-success me-2"></i>
                                    <strong>Experience:</strong> {{ $member->experience_years }} years
                                </p>
                            </div>
                            
                            @if($member->bio)
                                <div class="faculty-bio mb-3">
                                    <p class="text-muted small">{{ Str::limit($member->bio, 100) }}</p>
                                </div>
                            @endif
                            
                            <div class="contact-info">
                                @if($member->email)
                                    <p class="mb-1">
                                        <i class="fas fa-envelope text-success me-2"></i>
                                        <a href="mailto:{{ $member->email }}" class="text-decoration-none small">{{ $member->email }}</a>
                                    </p>
                                @endif
                                
                                @if($member->phone)
                                    <p class="mb-1">
                                        <i class="fas fa-phone text-success me-2"></i>
                                        <a href="tel:{{ $member->phone }}" class="text-decoration-none small">{{ $member->phone }}</a>
                                    </p>
                                @endif
                            </div>
                            
                            <div class="d-flex justify-content-between align-items-center mt-3">
                                @if($member->email)
                                    <a href="mailto:{{ $member->email }}" class="btn btn-success btn-sm">
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
        @endforeach
    </div>
</section>

<!-- Designation Overview -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <h2>About {{ $designationName }}</h2>
                <div class="designation-description mt-4">
                    @php
                        $descriptions = [
                            'Professor' => 'Professors are the most senior academic staff members who have demonstrated excellence in teaching, research, and service. They lead research initiatives, mentor junior faculty, and contribute significantly to their field of expertise.',
                            'Associate Professor' => 'Associate Professors are mid-level academic positions that require significant teaching experience and research contributions. They play crucial roles in curriculum development and student mentorship.',
                            'Assistant Professor' => 'Assistant Professors are entry-level academic positions focused on developing teaching skills and establishing research programs. They are the foundation of our academic community.',
                            'Professor & Head of Department' => 'Department Heads combine senior academic expertise with administrative leadership. They oversee departmental operations, strategic planning, and academic excellence.',
                            'Lecturer' => 'Lecturers are dedicated teaching professionals who focus primarily on delivering high-quality education and supporting student learning outcomes.',
                            'Senior Lecturer' => 'Senior Lecturers are experienced teaching professionals with additional responsibilities in curriculum development and academic mentoring.'
                        ];
                    @endphp
                    
                    <p class="lead">
                        {{ $descriptions[$designationName] ?? 'This academic position plays a vital role in our institution\'s commitment to educational excellence and research advancement.' }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Statistics Section -->
<section class="py-5 bg-success text-white">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-5">
                <h2>{{ $designationName }} Statistics</h2>
                <p class="lead">Key metrics about our {{ $designationName }} faculty members</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 text-center mb-4">
                <div class="stat-highlight">
                    <div class="stat-number">{{ $stats['faculty_count'] }}</div>
                    <h5>Total Faculty</h5>
                    <p>{{ $designationName }} members</p>
                </div>
            </div>
            <div class="col-md-3 text-center mb-4">
                <div class="stat-highlight">
                    <div class="stat-number">{{ $stats['department_count'] }}</div>
                    <h5>Departments</h5>
                    <p>Academic diversity</p>
                </div>
            </div>
            <div class="col-md-3 text-center mb-4">
                <div class="stat-highlight">
                    <div class="stat-number">{{ $stats['avg_experience'] }}</div>
                    <h5>Avg Experience</h5>
                    <p>Years of expertise</p>
                </div>
            </div>
            <div class="col-md-3 text-center mb-4">
                <div class="stat-highlight">
                    <div class="stat-number">{{ $stats['phd_count'] }}</div>
                    <h5>PhD Holders</h5>
                    <p>Research expertise</p>
                </div>
            </div>
        </div>
        
        <div class="row mt-4">
            <div class="col-md-6 text-center mb-3">
                <div class="additional-stat">
                    <h6>Most Experienced</h6>
                    <p class="mb-0">{{ $stats['max_experience'] }} years</p>
                </div>
            </div>
            <div class="col-md-6 text-center mb-3">
                <div class="additional-stat">
                    <h6>Newest Member</h6>
                    <p class="mb-0">{{ $stats['min_experience'] }} years</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <h3>Interested in Academic Careers?</h3>
                <p class="lead mb-0">Learn more about academic opportunities and career paths at Shantineketan College.</p>
            </div>
            <div class="col-lg-4 text-end">
                <a href="{{ route('faculty.index') }}" class="btn btn-success btn-lg me-3">
                    <i class="fas fa-users me-2"></i>All Faculty
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

.designation-icon {
    width: 100px;
    height: 100px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: rgba(255, 215, 0, 0.1);
    border-radius: 50%;
}

.stat-item h3 {
    color: #FFD700;
    font-size: 2rem;
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
    height: 250px;
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

.section-header h2 {
    position: relative;
    display: inline-block;
}

.section-header h2::after {
    content: '';
    position: absolute;
    bottom: -10px;
    left: 50%;
    transform: translateX(-50%);
    width: 60px;
    height: 3px;
    background: #28a745;
}

.faculty-details p {
    font-size: 0.9rem;
    margin-bottom: 0.5rem;
}

.faculty-bio {
    border-top: 1px solid #eee;
    padding-top: 1rem;
}

.faculty-rating .fa-star {
    font-size: 0.8rem;
}

.stat-number {
    font-size: 3rem;
    font-weight: bold;
    color: #FFD700;
    line-height: 1;
}

.stat-highlight {
    padding: 2rem 1rem;
}

.additional-stat {
    background: rgba(255,255,255,0.1);
    padding: 1rem;
    border-radius: 8px;
}

.contact-info a {
    color: #28a745;
    text-decoration: none;
}

.contact-info a:hover {
    color: #1e7e34;
}

.breadcrumb-item + .breadcrumb-item::before {
    color: rgba(255,255,255,0.5);
}

@media (max-width: 768px) {
    .hero-section .display-4 {
        font-size: 2.5rem;
    }
    
    .designation-icon {
        width: 80px;
        height: 80px;
    }
    
    .designation-icon .fa-4x {
        font-size: 2.5rem !important;
    }
    
    .faculty-image-container {
        height: 200px;
    }
    
    .stat-number {
        font-size: 2rem;
    }
}
</style>
@endpush
