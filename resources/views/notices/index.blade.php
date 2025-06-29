@extends('layouts.app')

@section('title', 'Official Notices - Shantineketan College')

@section('content')
<!-- Hero Section -->
<section class="hero-section bg-warning text-dark py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <h1 class="display-4 fw-bold mb-3">Official Notices</h1>
                <p class="lead mb-4">Stay informed with official announcements, academic notices, and important updates from Shantineketan College administration.</p>
            </div>
            <div class="col-lg-4 text-center">
                <i class="fas fa-bullhorn fa-5x opacity-75"></i>
            </div>
        </div>
    </div>
</section>

<!-- Filter Section -->
<section class="py-3 bg-light">
    <div class="container">
        <form method="GET" action="{{ route('notices.index') }}">
            <div class="row align-items-center">
                <div class="col-md-4">
                    <select name="category" class="form-select">
                        <option value="">All Categories</option>
                        @foreach($categories as $category)
                            <option value="{{ $category }}" {{ request('category') == $category ? 'selected' : '' }}>
                                {{ ucfirst($category) }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                    <select name="priority" class="form-select">
                        <option value="">All Priorities</option>
                        <option value="high" {{ request('priority') == 'high' ? 'selected' : '' }}>High Priority</option>
                        <option value="normal" {{ request('priority') == 'normal' ? 'selected' : '' }}>Normal</option>
                        <option value="low" {{ request('priority') == 'low' ? 'selected' : '' }}>Low Priority</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <button type="submit" class="btn btn-primary me-2">Filter</button>
                    <a href="{{ route('notices.index') }}" class="btn btn-outline-secondary">Clear</a>
                </div>
                <div class="col-md-2 text-end">
                    <small class="text-muted">{{ $notices->total() }} notices found</small>
                </div>
            </div>
        </form>
    </div>
</section>

<!-- Notices Content -->
<section class="py-5">
    <div class="container">
        @if($notices->count() > 0)
            <div class="row">
                @foreach($notices as $notice)
                <div class="col-lg-6 col-md-6 mb-4">
                    <div class="card h-100 notice-card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-start mb-3">
                                <div class="badges">
                                    <span class="badge bg-{{ $notice->category === 'examination' ? 'danger' : ($notice->category === 'admission' ? 'success' : ($notice->category === 'events' ? 'info' : ($notice->category === 'academic' ? 'primary' : 'secondary'))) }} me-2">
                                        {{ ucfirst($notice->category) }}
                                    </span>
                                    @if($notice->priority === 'high')
                                        <span class="badge bg-danger">High Priority</span>
                                    @endif
                                </div>
                                <small class="text-muted">
                                    <i class="fas fa-calendar me-1"></i>
                                    {{ $notice->publish_date->format('M d, Y') }}
                                </small>
                            </div>
                            
                            <h5 class="card-title">
                                <a href="{{ route('notices.show', $notice) }}" class="text-decoration-none">
                                    {{ $notice->title }}
                                </a>
                            </h5>
                            
                            <p class="card-text text-muted">{{ Str::limit($notice->content, 120) }}</p>
                            
                            @if($notice->attachment)
                                <div class="mb-3">
                                    <i class="fas fa-paperclip text-warning me-1"></i>
                                    <small class="text-muted">Attachment available</small>
                                </div>
                            @endif
                            
                            @if($notice->expire_date)
                                <div class="mb-3">
                                    @if($notice->expire_date->isPast())
                                        <span class="badge bg-secondary">Expired</span>
                                    @elseif($notice->expire_date->diffInDays(now()) <= 3)
                                        <span class="badge bg-warning text-dark">Expires Soon</span>
                                    @else
                                        <small class="text-muted">
                                            <i class="fas fa-clock me-1"></i>
                                            Valid until {{ $notice->expire_date->format('M d, Y') }}
                                        </small>
                                    @endif
                                </div>
                            @endif
                            
                            <div class="d-flex justify-content-between align-items-center mt-auto">
                                <a href="{{ route('notices.show', $notice) }}" class="btn btn-primary btn-sm">
                                    Read Full Notice <i class="fas fa-arrow-right ms-1"></i>
                                </a>
                                <small class="text-muted">
                                    By {{ $notice->admin->name ?? 'Administration' }}
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            
            <!-- Pagination -->
            <div class="d-flex justify-content-center mt-4">
                {{ $notices->appends(request()->query())->links() }}
            </div>
        @else
            <div class="text-center py-5">
                <i class="fas fa-bullhorn fa-3x text-muted mb-3"></i>
                <h4>No Notices Found</h4>
                <p class="text-muted">
                    @if(request()->hasAny(['category', 'priority']))
                        No notices match your current filters. <a href="{{ route('notices.index') }}">View all notices</a>
                    @else
                        Check back later for official announcements and updates.
                    @endif
                </p>
            </div>
        @endif
    </div>
</section>

<!-- Important Notice Banner -->
@php
    $urgentNotices = \App\Models\Notice::active()
        ->where('priority', 'high')
        ->where('publish_date', '<=', now())
        ->where(function($query) {
            $query->whereNull('expire_date')
                  ->orWhere('expire_date', '>=', now());
        })
        ->orderBy('created_at', 'desc')
        ->limit(3)
        ->get();
@endphp

@if($urgentNotices->count() > 0)
<section class="py-4 bg-danger text-white">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-2 text-center">
                <i class="fas fa-exclamation-triangle fa-2x"></i>
                <div class="fw-bold">URGENT</div>
            </div>
            <div class="col-md-10">
                <div class="urgent-notices">
                    @foreach($urgentNotices as $urgent)
                        <div class="mb-2">
                            <strong>{{ $urgent->title }}</strong>
                            <a href="{{ route('notices.show', $urgent) }}" class="btn btn-light btn-sm ms-2">
                                View Details
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
@endif
@endsection

@push('styles')
<style>
.hero-section {
    background: linear-gradient(135deg, #FFD700 0%, #FFA500 100%);
}

.notice-card {
    transition: all 0.3s ease;
    border: none;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

.notice-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 8px rgba(0,0,0,0.15);
}

.badges .badge {
    font-size: 0.7rem;
}

.urgent-notices {
    max-height: 120px;
    overflow-y: auto;
}

@media (max-width: 768px) {
    .hero-section .display-4 {
        font-size: 2.5rem;
    }
}
</style>
@endpush

@push('scripts')
<script>
$(document).ready(function() {
    // Auto-submit form when filters change
    $('select[name="category"], select[name="priority"]').change(function() {
        $(this).closest('form').submit();
    });
});
</script>
@endpush
