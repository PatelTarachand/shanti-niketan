@extends('layouts.app')

@section('title', $notice->title . ' - Official Notice - Shantineketan College')

@section('content')
<!-- Hero Section -->
<section class="hero-section bg-warning text-dark py-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb" class="mb-3">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-dark">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('notices.index') }}" class="text-dark">Notices</a></li>
                        <li class="breadcrumb-item active">{{ Str::limit($notice->title, 50) }}</li>
                    </ol>
                </nav>
                
                <div class="d-flex align-items-center mb-3">
                    <span class="badge bg-{{ $notice->category === 'examination' ? 'danger' : ($notice->category === 'admission' ? 'success' : ($notice->category === 'events' ? 'info' : ($notice->category === 'academic' ? 'primary' : 'secondary'))) }} me-3 fs-6">
                        {{ ucfirst($notice->category) }}
                    </span>
                    @if($notice->priority === 'high')
                        <span class="badge bg-danger fs-6">
                            <i class="fas fa-exclamation-triangle me-1"></i>High Priority
                        </span>
                    @endif
                </div>
                
                <h1 class="display-5 fw-bold mb-3">{{ $notice->title }}</h1>
                
                <div class="d-flex align-items-center text-dark opacity-75">
                    <i class="fas fa-calendar me-2"></i>
                    <span class="me-4">Published: {{ $notice->publish_date->format('F d, Y') }}</span>
                    @if($notice->expire_date)
                        <i class="fas fa-clock me-2"></i>
                        <span class="me-4">Valid until: {{ $notice->expire_date->format('F d, Y') }}</span>
                    @endif
                    <i class="fas fa-user me-2"></i>
                    <span>By: {{ $notice->admin->name ?? 'Administration' }}</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Notice Content -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <!-- Notice Status Alert -->
                        @if($notice->expire_date && $notice->expire_date->isPast())
                            <div class="alert alert-warning">
                                <i class="fas fa-exclamation-triangle me-2"></i>
                                <strong>Notice Expired:</strong> This notice expired on {{ $notice->expire_date->format('F d, Y') }}.
                            </div>
                        @elseif($notice->expire_date && $notice->expire_date->diffInDays(now()) <= 3)
                            <div class="alert alert-info">
                                <i class="fas fa-info-circle me-2"></i>
                                <strong>Expires Soon:</strong> This notice will expire on {{ $notice->expire_date->format('F d, Y') }}.
                            </div>
                        @endif
                        
                        <!-- Notice Content -->
                        <div class="notice-content">
                            {!! nl2br(e($notice->content)) !!}
                        </div>
                        
                        <!-- Attachment Section -->
                        @if($notice->attachment)
                            <div class="attachment-section mt-4 p-3 bg-light rounded border-start border-warning border-4">
                                <h6><i class="fas fa-paperclip me-2 text-warning"></i>Official Document</h6>
                                <p class="mb-2 text-muted">Download the official document related to this notice.</p>
                                <a href="{{ Storage::url($notice->attachment) }}" target="_blank" class="btn btn-warning">
                                    <i class="fas fa-download me-2"></i>Download Document
                                </a>
                            </div>
                        @endif
                        
                        <!-- Important Notice Box -->
                        @if($notice->priority === 'high')
                            <div class="important-notice mt-4 p-3 bg-danger text-white rounded">
                                <h6><i class="fas fa-exclamation-triangle me-2"></i>Important Notice</h6>
                                <p class="mb-0">This is a high-priority notice. Please read carefully and take necessary action if required.</p>
                            </div>
                        @endif
                        
                        <!-- Share Section -->
                        <div class="share-section mt-4 pt-4 border-top">
                            <h6>Share this notice:</h6>
                            <div class="d-flex gap-2 flex-wrap">
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
                                <button onclick="copyToClipboard('{{ request()->fullUrl() }}')" class="btn btn-outline-secondary btn-sm">
                                    <i class="fas fa-copy me-1"></i>Copy Link
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Navigation -->
                <div class="d-flex justify-content-between mt-4">
                    <a href="{{ route('notices.index') }}" class="btn btn-outline-secondary">
                        <i class="fas fa-arrow-left me-2"></i>Back to Notices
                    </a>
                    <a href="{{ route('contact.index') }}" class="btn btn-warning">
                        <i class="fas fa-phone me-2"></i>Contact Office
                    </a>
                </div>
            </div>
            
            <!-- Sidebar -->
            <div class="col-lg-4">
                <div class="card mb-4">
                    <div class="card-header bg-warning text-dark">
                        <h6 class="mb-0">Notice Information</h6>
                    </div>
                    <div class="card-body">
                        <table class="table table-sm table-borderless">
                            <tr>
                                <td><strong>Category:</strong></td>
                                <td>
                                    <span class="badge bg-{{ $notice->category === 'examination' ? 'danger' : ($notice->category === 'admission' ? 'success' : ($notice->category === 'events' ? 'info' : ($notice->category === 'academic' ? 'primary' : 'secondary'))) }}">
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
                                <td>
                                    {{ $notice->expire_date->format('M d, Y') }}
                                    @if($notice->expire_date->isPast())
                                        <span class="badge bg-danger ms-1">Expired</span>
                                    @elseif($notice->expire_date->diffInDays(now()) <= 3)
                                        <span class="badge bg-warning text-dark ms-1">Expires Soon</span>
                                    @endif
                                </td>
                            </tr>
                            @endif
                            <tr>
                                <td><strong>Published By:</strong></td>
                                <td>{{ $notice->admin->name ?? 'Administration' }}</td>
                            </tr>
                            @if($notice->attachment)
                            <tr>
                                <td><strong>Attachment:</strong></td>
                                <td><i class="fas fa-paperclip text-warning"></i> Available</td>
                            </tr>
                            @endif
                        </table>
                    </div>
                </div>
                
                <!-- Related Notices -->
                @if($relatedNotices->count() > 0)
                <div class="card mb-4">
                    <div class="card-header">
                        <h6 class="mb-0">Related {{ ucfirst($notice->category) }} Notices</h6>
                    </div>
                    <div class="card-body">
                        @foreach($relatedNotices as $related)
                            <div class="mb-3 pb-3 {{ !$loop->last ? 'border-bottom' : '' }}">
                                <h6 class="mb-1">
                                    <a href="{{ route('notices.show', $related) }}" class="text-decoration-none">
                                        {{ Str::limit($related->title, 60) }}
                                    </a>
                                </h6>
                                <small class="text-muted">
                                    <i class="fas fa-calendar me-1"></i>
                                    {{ $related->publish_date->format('M d, Y') }}
                                    @if($related->priority === 'high')
                                        <span class="badge bg-danger ms-1">High Priority</span>
                                    @endif
                                </small>
                            </div>
                        @endforeach
                        <a href="{{ route('notices.index', ['category' => $notice->category]) }}" class="btn btn-outline-primary btn-sm w-100">
                            View All {{ ucfirst($notice->category) }} Notices
                        </a>
                    </div>
                </div>
                @endif
                
                <!-- Quick Actions -->
                <div class="card mb-4">
                    <div class="card-header">
                        <h6 class="mb-0">Quick Actions</h6>
                    </div>
                    <div class="card-body">
                        <div class="d-grid gap-2">
                            @if($notice->category === 'academic')
                                <a href="{{ route('courses.index') }}" class="btn btn-outline-primary btn-sm">
                                    <i class="fas fa-graduation-cap me-2"></i>View Courses
                                </a>
                            @endif
                            @if($notice->category === 'examination')
                                <a href="{{ route('student.login') }}" class="btn btn-outline-info btn-sm">
                                    <i class="fas fa-user-graduate me-2"></i>Student Portal
                                </a>
                            @endif
                            @if($notice->category === 'admission')
                                <a href="{{ route('contact.index') }}" class="btn btn-outline-success btn-sm">
                                    <i class="fas fa-user-plus me-2"></i>Apply Now
                                </a>
                            @endif
                            <a href="{{ route('contact.index') }}" class="btn btn-outline-secondary btn-sm">
                                <i class="fas fa-phone me-2"></i>Contact Office
                            </a>
                        </div>
                    </div>
                </div>
                
                <!-- Contact Information -->
                <div class="card">
                    <div class="card-header">
                        <h6 class="mb-0">Need Clarification?</h6>
                    </div>
                    <div class="card-body">
                        <p class="small text-muted">For questions about this notice, contact our administration office.</p>
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
    background: linear-gradient(135deg, #FFD700 0%, #FFA500 100%);
}

.notice-content {
    font-size: 1.1rem;
    line-height: 1.8;
    color: #333;
}

.attachment-section {
    background: linear-gradient(45deg, #fff3cd, #ffeaa7);
}

.important-notice {
    animation: pulse 2s infinite;
}

@keyframes pulse {
    0% { box-shadow: 0 0 0 0 rgba(220, 53, 69, 0.7); }
    70% { box-shadow: 0 0 0 10px rgba(220, 53, 69, 0); }
    100% { box-shadow: 0 0 0 0 rgba(220, 53, 69, 0); }
}

.contact-info a {
    color: #2C3E50;
    text-decoration: none;
}

.contact-info a:hover {
    color: #FFD700;
}

.breadcrumb-item + .breadcrumb-item::before {
    color: rgba(0,0,0,0.5);
}
</style>
@endpush

@push('scripts')
<script>
function copyToClipboard(text) {
    navigator.clipboard.writeText(text).then(function() {
        // Show success message
        const btn = event.target.closest('button');
        const originalText = btn.innerHTML;
        btn.innerHTML = '<i class="fas fa-check me-1"></i>Copied!';
        btn.classList.remove('btn-outline-secondary');
        btn.classList.add('btn-success');
        
        setTimeout(() => {
            btn.innerHTML = originalText;
            btn.classList.remove('btn-success');
            btn.classList.add('btn-outline-secondary');
        }, 2000);
    });
}
</script>
@endpush
