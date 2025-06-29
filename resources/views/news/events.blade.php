@extends('layouts.app')

@section('title', 'Events - Shantineketan College')

@section('content')
<!-- Hero Section -->
<section class="hero-section bg-success text-white py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <h1 class="display-4 fw-bold mb-3">College Events</h1>
                <p class="lead mb-4">Discover upcoming events, cultural activities, and special programs at Shantineketan College.</p>
            </div>
            <div class="col-lg-4 text-center">
                <i class="fas fa-calendar-alt fa-5x opacity-75"></i>
            </div>
        </div>
    </div>
</section>

<!-- Events Content -->
<section class="py-5">
    <div class="container">
        @if($events->count() > 0)
            <div class="row">
                @foreach($events as $event)
                <div class="col-lg-6 col-md-6 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-start mb-3">
                                <span class="badge bg-success fs-6">Event</span>
                                <small class="text-muted">
                                    <i class="fas fa-calendar me-1"></i>
                                    {{ $event->publish_date->format('M d, Y') }}
                                </small>
                            </div>
                            
                            <h4 class="card-title">{{ $event->title }}</h4>
                            <p class="card-text">{{ Str::limit($event->content, 150) }}</p>
                            
                            @if($event->attachment)
                                <div class="mb-3">
                                    <a href="{{ Storage::url($event->attachment) }}" target="_blank" class="btn btn-outline-primary btn-sm">
                                        <i class="fas fa-paperclip me-1"></i>Event Details
                                    </a>
                                </div>
                            @endif
                            
                            <div class="d-flex justify-content-between align-items-center mt-auto">
                                <a href="{{ route('news.show', $event->id) }}" class="btn btn-success">
                                    Learn More <i class="fas fa-arrow-right ms-1"></i>
                                </a>
                                @if($event->priority === 'high')
                                    <span class="badge bg-danger">Featured</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            
            <!-- Pagination -->
            <div class="d-flex justify-content-center mt-4">
                {{ $events->links() }}
            </div>
        @else
            <div class="text-center py-5">
                <i class="fas fa-calendar-alt fa-3x text-muted mb-3"></i>
                <h4>No Events Scheduled</h4>
                <p class="text-muted">Check back later for upcoming events and activities.</p>
                <a href="{{ route('news.index') }}" class="btn btn-primary">
                    <i class="fas fa-newspaper me-2"></i>View All News
                </a>
            </div>
        @endif
    </div>
</section>
@endsection

@push('styles')
<style>
.hero-section {
    background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
}

.card {
    transition: all 0.3s ease;
}

.card:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
}
</style>
@endpush
