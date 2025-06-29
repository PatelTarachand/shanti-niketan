@extends('layouts.app')

@section('title', 'News & Updates - Shantineketan College')

@section('content')
<!-- Hero Section -->
<section class="hero-section bg-primary text-white py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <h1 class="display-4 fw-bold mb-3">News & Updates</h1>
                <p class="lead mb-4">Stay updated with the latest news, announcements, and events from Shantineketan College.</p>
            </div>
            <div class="col-lg-4 text-center">
                <i class="fas fa-newspaper fa-5x opacity-75"></i>
            </div>
        </div>
    </div>
</section>

<!-- News Content -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                @if($notices->count() > 0)
                    @foreach($notices as $notice)
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-start mb-3">
                                <span class="badge bg-{{ $notice->category === 'academic' ? 'primary' : ($notice->category === 'events' ? 'success' : 'info') }} fs-6">
                                    {{ ucfirst($notice->category) }}
                                </span>
                                <small class="text-muted">
                                    <i class="fas fa-calendar me-1"></i>
                                    {{ $notice->publish_date->format('M d, Y') }}
                                </small>
                            </div>
                            
                            <h3 class="card-title">
                                <a href="{{ route('news.show', $notice->id) }}" class="text-decoration-none">
                                    {{ $notice->title }}
                                </a>
                            </h3>
                            
                            <p class="card-text">{{ Str::limit($notice->content, 200) }}</p>
                            
                            @if($notice->attachment)
                                <div class="mb-3">
                                    <a href="{{ Storage::url($notice->attachment) }}" target="_blank" class="btn btn-outline-primary btn-sm">
                                        <i class="fas fa-paperclip me-1"></i>Download Attachment
                                    </a>
                                </div>
                            @endif
                            
                            <div class="d-flex justify-content-between align-items-center">
                                <a href="{{ route('news.show', $notice->id) }}" class="btn btn-primary">
                                    Read More <i class="fas fa-arrow-right ms-1"></i>
                                </a>
                                @if($notice->priority === 'high')
                                    <span class="badge bg-danger">High Priority</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endforeach
                    
                    <!-- Pagination -->
                    <div class="d-flex justify-content-center">
                        {{ $notices->links() }}
                    </div>
                @else
                    <div class="text-center py-5">
                        <i class="fas fa-newspaper fa-3x text-muted mb-3"></i>
                        <h4>No News Available</h4>
                        <p class="text-muted">Check back later for updates and announcements.</p>
                    </div>
                @endif
            </div>
            
            <!-- Sidebar -->
            <div class="col-lg-4">
                <div class="card mb-4">
                    <div class="card-header bg-warning text-dark">
                        <h5 class="mb-0">Categories</h5>
                    </div>
                    <div class="card-body">
                        <div class="list-group list-group-flush">
                            <a href="{{ route('news.index') }}" class="list-group-item list-group-item-action">
                                <i class="fas fa-newspaper me-2"></i>All News
                            </a>
                            <a href="{{ route('news.events') }}" class="list-group-item list-group-item-action">
                                <i class="fas fa-calendar-alt me-2"></i>Events
                            </a>
                            <a href="{{ route('notices.index') }}" class="list-group-item list-group-item-action">
                                <i class="fas fa-bullhorn me-2"></i>Official Notices
                            </a>
                        </div>
                    </div>
                </div>
                
                <div class="card mb-4">
                    <div class="card-header">
                        <h6 class="mb-0">Quick Links</h6>
                    </div>
                    <div class="card-body">
                        <div class="d-grid gap-2">
                            <a href="{{ route('courses.index') }}" class="btn btn-outline-primary btn-sm">
                                <i class="fas fa-graduation-cap me-2"></i>View Courses
                            </a>
                            <a href="{{ route('contact.index') }}" class="btn btn-outline-success btn-sm">
                                <i class="fas fa-phone me-2"></i>Contact Us
                            </a>
                            <a href="{{ route('gallery.index') }}" class="btn btn-outline-info btn-sm">
                                <i class="fas fa-images me-2"></i>Photo Gallery
                            </a>
                        </div>
                    </div>
                </div>
                
                <div class="card">
                    <div class="card-header">
                        <h6 class="mb-0">Contact Information</h6>
                    </div>
                    <div class="card-body">
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
@endsection

@push('styles')
<style>
.hero-section {
    background: linear-gradient(135deg, #2C3E50 0%, #34495e 100%);
}

.card {
    transition: all 0.3s ease;
}

.card:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
}

.contact-info a {
    color: #2C3E50;
    text-decoration: none;
}

.contact-info a:hover {
    color: #FFD700;
}
</style>
@endpush
