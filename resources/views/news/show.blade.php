@extends('layouts.app')

@section('title', $notice->title . ' - Shantineketan College')

@section('content')
<!-- Hero Section -->
<section class="hero-section bg-primary text-white py-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb" class="mb-3">
                    <ol class="breadcrumb text-white-50">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-white-50">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('news.index') }}" class="text-white-50">News</a></li>
                        <li class="breadcrumb-item active text-white">{{ Str::limit($notice->title, 50) }}</li>
                    </ol>
                </nav>
                
                <div class="d-flex align-items-center mb-3">
                    <span class="badge bg-{{ $notice->category === 'academic' ? 'warning' : ($notice->category === 'events' ? 'success' : 'info') }} me-3 fs-6">
                        {{ ucfirst($notice->category) }}
                    </span>
                    @if($notice->priority === 'high')
                        <span class="badge bg-danger fs-6">High Priority</span>
                    @endif
                </div>
                
                <h1 class="display-5 fw-bold mb-3">{{ $notice->title }}</h1>
                
                <div class="d-flex align-items-center text-white-50">
                    <i class="fas fa-calendar me-2"></i>
                    <span class="me-4">Published: {{ $notice->publish_date->format('F d, Y') }}</span>
                    @if($notice->expire_date)
                        <i class="fas fa-clock me-2"></i>
                        <span>Valid until: {{ $notice->expire_date->format('F d, Y') }}</span>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Content Section -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <div class="content-body">
                            {!! nl2br(e($notice->content)) !!}
                        </div>
                        
                        @if($notice->attachment)
                            <div class="attachment-section mt-4 p-3 bg-light rounded">
                                <h6><i class="fas fa-paperclip me-2"></i>Attachment</h6>
                                <a href="{{ Storage::url($notice->attachment) }}" target="_blank" class="btn btn-primary">
                                    <i class="fas fa-download me-2"></i>Download Document
                                </a>
                            </div>
                        @endif
                        
                        <!-- Share Section -->
                        <div class="share-section mt-4 pt-4 border-top">
                            <h6>Share this news:</h6>
                            <div class="d-flex gap-2">
                                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}" 
                                   target="_blank" class="btn btn-outline-primary btn-sm">
                                    <i class="fab fa-facebook-f me-1"></i>Facebook
                                </a>
                                <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->fullUrl()) }}&text={{ urlencode($notice->title) }}" 
                                   target="_blank" class="btn btn-outline-info btn-sm">
                                    <i class="fab fa-twitter me-1"></i>Twitter
                                </a>
                                <a href="https://wa.me/?text={{ urlencode($notice->title . ' - ' . request()->fullUrl()) }}" 
                                   target="_blank" class="btn btn-outline-success btn-sm">
                                    <i class="fab fa-whatsapp me-1"></i>WhatsApp
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Navigation -->
                <div class="d-flex justify-content-between mt-4">
                    <a href="{{ route('news.index') }}" class="btn btn-outline-secondary">
                        <i class="fas fa-arrow-left me-2"></i>Back to News
                    </a>
                    <a href="{{ route('contact.index') }}" class="btn btn-primary">
                        <i class="fas fa-phone me-2"></i>Contact Us
                    </a>
                </div>
            </div>
            
            <!-- Sidebar -->
            <div class="col-lg-4">
                <div class="card mb-4">
                    <div class="card-header">
                        <h6 class="mb-0">Notice Details</h6>
                    </div>
                    <div class="card-body">
                        <table class="table table-sm table-borderless">
                            <tr>
                                <td><strong>Category:</strong></td>
                                <td>
                                    <span class="badge bg-{{ $notice->category === 'academic' ? 'primary' : ($notice->category === 'events' ? 'success' : 'info') }}">
                                        {{ ucfirst($notice->category) }}
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td><strong>Priority:</strong></td>
                                <td>
                                    <span class="badge bg-{{ $notice->priority === 'high' ? 'danger' : ($notice->priority === 'normal' ? 'warning' : 'secondary') }}">
                                        {{ ucfirst($notice->priority) }}
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td><strong>Published:</strong></td>
                                <td>{{ $notice->publish_date->format('M d, Y') }}</td>
                            </tr>
                            @if($notice->expire_date)
                            <tr>
                                <td><strong>Valid Until:</strong></td>
                                <td>{{ $notice->expire_date->format('M d, Y') }}</td>
                            </tr>
                            @endif
                            <tr>
                                <td><strong>Published By:</strong></td>
                                <td>{{ $notice->admin->name ?? 'Administration' }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
                
                <div class="card mb-4">
                    <div class="card-header">
                        <h6 class="mb-0">Related Links</h6>
                    </div>
                    <div class="card-body">
                        <div class="d-grid gap-2">
                            @if($notice->category === 'academic')
                                <a href="{{ route('courses.index') }}" class="btn btn-outline-primary btn-sm">
                                    <i class="fas fa-graduation-cap me-2"></i>View Courses
                                </a>
                            @endif
                            @if($notice->category === 'events')
                                <a href="{{ route('news.events') }}" class="btn btn-outline-success btn-sm">
                                    <i class="fas fa-calendar-alt me-2"></i>All Events
                                </a>
                            @endif
                            <a href="{{ route('contact.index') }}" class="btn btn-outline-info btn-sm">
                                <i class="fas fa-phone me-2"></i>Contact Office
                            </a>
                            <a href="{{ route('notices.index') }}" class="btn btn-outline-secondary btn-sm">
                                <i class="fas fa-bullhorn me-2"></i>All Notices
                            </a>
                        </div>
                    </div>
                </div>
                
                <div class="card">
                    <div class="card-header">
                        <h6 class="mb-0">Need Help?</h6>
                    </div>
                    <div class="card-body">
                        <p class="small text-muted">For more information about this notice, contact our office.</p>
                        <div class="contact-info">
                            <p class="mb-2">
                                <i class="fas fa-phone text-warning me-2"></i>
                                <a href="tel:+919425514719">+91 94255 14719</a>
                            </p>
                            <p class="mb-0">
                                <i class="fas fa-envelope text-warning me-2"></i>
                                <a href="mailto:shantiniketan2009@yahoo.co.in">shantiniketan2009@yahoo.co.in</a>
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

.content-body {
    font-size: 1.1rem;
    line-height: 1.8;
    color: #333;
}

.attachment-section {
    border-left: 4px solid #FFD700;
}

.contact-info a {
    color: #2C3E50;
    text-decoration: none;
}

.contact-info a:hover {
    color: #FFD700;
}

.breadcrumb-item + .breadcrumb-item::before {
    color: rgba(255,255,255,0.5);
}
</style>
@endpush
