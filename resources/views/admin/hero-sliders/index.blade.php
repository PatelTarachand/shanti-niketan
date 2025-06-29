@extends('admin.layouts.app')

@section('title', 'Manage Hero Slider')
@section('page-title', 'Hero Slider Management')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="mb-0">Hero Slider Items</h4>
    <a href="{{ route('admin.hero-sliders.create') }}" class="btn btn-primary">
        <i class="fas fa-plus me-2"></i>Add New Slide
    </a>
</div>

<!-- Hero Slider Items -->
<div class="row">
    @if($sliders->count() > 0)
        @foreach($sliders as $slider)
        <div class="col-lg-6 col-md-6 mb-4">
            <div class="card h-100">
                <div class="position-relative">
                    <img src="{{ $slider->image_path ? Storage::url($slider->image_path) : asset($slider->image_path) }}" 
                         class="card-img-top" alt="{{ $slider->title }}" style="height: 200px; object-fit: cover;">
                    
                    <!-- Status Badges -->
                    <div class="position-absolute top-0 start-0 p-2">
                        @if($slider->is_active)
                            <span class="badge bg-success">Active</span>
                        @else
                            <span class="badge bg-secondary">Inactive</span>
                        @endif
                    </div>
                    
                    <!-- Sort Order Badge -->
                    <div class="position-absolute top-0 end-0 p-2">
                        <span class="badge bg-warning text-dark">Order: {{ $slider->sort_order }}</span>
                    </div>
                </div>
                
                <div class="card-body">
                    <h5 class="card-title">{{ Str::limit($slider->title, 40) }}</h5>
                    @if($slider->subtitle)
                        <h6 class="card-subtitle mb-2 text-muted">{{ Str::limit($slider->subtitle, 50) }}</h6>
                    @endif
                    @if($slider->description)
                        <p class="card-text">{{ Str::limit($slider->description, 80) }}</p>
                    @endif
                    
                    @if($slider->button_text && $slider->button_link)
                        <div class="mb-3">
                            <small class="text-muted">
                                <i class="fas fa-link me-1"></i>
                                <strong>Button:</strong> {{ $slider->button_text }} → {{ $slider->button_link }}
                            </small>
                        </div>
                    @endif
                    
                    <div class="d-flex justify-content-between align-items-center">
                        <small class="text-muted">
                            <i class="fas fa-calendar me-1"></i>
                            {{ $slider->created_at->format('M d, Y') }}
                        </small>
                        <div class="btn-group" role="group">
                            <a href="{{ route('admin.hero-sliders.show', $slider) }}" class="btn btn-outline-info btn-sm" title="View">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ route('admin.hero-sliders.edit', $slider) }}" class="btn btn-outline-primary btn-sm" title="Edit">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('admin.hero-sliders.destroy', $slider) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this slide?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger btn-sm" title="Delete">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        
        <!-- Pagination -->
        <div class="col-12">
            <div class="d-flex justify-content-center">
                {{ $sliders->links() }}
            </div>
        </div>
    @else
        <div class="col-12">
            <div class="card">
                <div class="card-body text-center py-5">
                    <i class="fas fa-sliders-h fa-3x text-muted mb-3"></i>
                    <h5>No Hero Slides Found</h5>
                    <p class="text-muted">Start by creating your first hero slide.</p>
                    <a href="{{ route('admin.hero-sliders.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus me-2"></i>Add Hero Slide
                    </a>
                </div>
            </div>
        </div>
    @endif
</div>

<!-- Quick Stats -->
@if($sliders->count() > 0)
<div class="row mt-4">
    <div class="col-md-3">
        <div class="card text-center">
            <div class="card-body">
                <h4 class="text-primary">{{ $sliders->total() }}</h4>
                <small class="text-muted">Total Slides</small>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-center">
            <div class="card-body">
                <h4 class="text-success">{{ $sliders->where('is_active', true)->count() }}</h4>
                <small class="text-muted">Active Slides</small>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-center">
            <div class="card-body">
                <h4 class="text-warning">{{ $sliders->whereNotNull('button_text')->count() }}</h4>
                <small class="text-muted">With Buttons</small>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-center">
            <div class="card-body">
                <h4 class="text-info">{{ $sliders->whereNotNull('subtitle')->count() }}</h4>
                <small class="text-muted">With Subtitles</small>
            </div>
        </div>
    </div>
</div>

<!-- Preview Section -->
<div class="card mt-4">
    <div class="card-header">
        <h6 class="mb-0">Website Preview</h6>
    </div>
    <div class="card-body">
        <p class="text-muted">This is how the hero slider appears on the homepage.</p>
        <a href="{{ route('home') }}" target="_blank" class="btn btn-outline-info">
            <i class="fas fa-external-link-alt me-2"></i>View on Website
        </a>
    </div>
</div>
@endif
@endsection

@push('styles')
<style>
.card {
    transition: all 0.3s ease;
}

.card:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
}

.position-absolute .badge {
    font-size: 0.7rem;
}
</style>
@endpush
