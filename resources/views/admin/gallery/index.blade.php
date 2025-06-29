@extends('admin.layouts.app')

@section('title', 'Manage Gallery')
@section('page-title', 'Gallery Management')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="mb-0">Gallery Items</h4>
    <a href="{{ route('admin.gallery.create') }}" class="btn btn-primary">
        <i class="fas fa-plus me-2"></i>Add New Item
    </a>
</div>

<!-- Filters -->
<div class="card mb-4">
    <div class="card-body">
        <form method="GET" action="{{ route('admin.gallery.index') }}">
            <div class="row">
                <div class="col-md-3">
                    <select name="category" class="form-select">
                        <option value="">All Categories</option>
                        <option value="campus" {{ request('category') == 'campus' ? 'selected' : '' }}>Campus</option>
                        <option value="labs" {{ request('category') == 'labs' ? 'selected' : '' }}>Labs</option>
                        <option value="events" {{ request('category') == 'events' ? 'selected' : '' }}>Events</option>
                        <option value="sports" {{ request('category') == 'sports' ? 'selected' : '' }}>Sports</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <select name="type" class="form-select">
                        <option value="">All Types</option>
                        <option value="image" {{ request('type') == 'image' ? 'selected' : '' }}>Images</option>
                        <option value="video" {{ request('type') == 'video' ? 'selected' : '' }}>Videos</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <select name="status" class="form-select">
                        <option value="">All Status</option>
                        <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>Active</option>
                        <option value="inactive" {{ request('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                        <option value="featured" {{ request('status') == 'featured' ? 'selected' : '' }}>Featured</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <button type="submit" class="btn btn-outline-primary me-2">Filter</button>
                    <a href="{{ route('admin.gallery.index') }}" class="btn btn-outline-secondary">Clear</a>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Gallery Grid -->
<div class="row">
    @if($gallery->count() > 0)
        @foreach($gallery as $item)
        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
            <div class="card h-100">
                <div class="position-relative">
                    @if($item->type === 'image')
                        <img src="{{ Storage::url($item->image_path) }}" class="card-img-top" alt="{{ $item->title }}" style="height: 200px; object-fit: cover;">
                    @else
                        <div class="bg-dark d-flex align-items-center justify-content-center" style="height: 200px;">
                            <i class="fas fa-play-circle fa-3x text-white"></i>
                        </div>
                    @endif
                    
                    <!-- Status Badges -->
                    <div class="position-absolute top-0 start-0 p-2">
                        @if($item->is_featured)
                            <span class="badge bg-warning text-dark">Featured</span>
                        @endif
                        @if(!$item->is_active)
                            <span class="badge bg-secondary">Inactive</span>
                        @endif
                    </div>
                    
                    <!-- Category Badge -->
                    <div class="position-absolute top-0 end-0 p-2">
                        <span class="badge bg-{{ $item->category === 'campus' ? 'primary' : ($item->category === 'labs' ? 'success' : ($item->category === 'events' ? 'info' : 'warning')) }}">
                            {{ ucfirst($item->category) }}
                        </span>
                    </div>
                </div>
                
                <div class="card-body">
                    <h6 class="card-title">{{ Str::limit($item->title, 30) }}</h6>
                    @if($item->description)
                        <p class="card-text small text-muted">{{ Str::limit($item->description, 60) }}</p>
                    @endif
                    
                    <div class="d-flex justify-content-between align-items-center">
                        <small class="text-muted">
                            <i class="fas fa-{{ $item->type === 'image' ? 'image' : 'video' }} me-1"></i>
                            {{ ucfirst($item->type) }}
                        </small>
                        <small class="text-muted">Order: {{ $item->sort_order }}</small>
                    </div>
                </div>
                
                <div class="card-footer">
                    <div class="btn-group w-100" role="group">
                        <a href="{{ route('admin.gallery.show', $item) }}" class="btn btn-outline-info btn-sm" title="View">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="{{ route('admin.gallery.edit', $item) }}" class="btn btn-outline-primary btn-sm" title="Edit">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('admin.gallery.destroy', $item) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this gallery item?')">
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
        @endforeach
        
        <!-- Pagination -->
        <div class="col-12">
            <div class="d-flex justify-content-center">
                {{ $gallery->links() }}
            </div>
        </div>
    @else
        <div class="col-12">
            <div class="card">
                <div class="card-body text-center py-5">
                    <i class="fas fa-images fa-3x text-muted mb-3"></i>
                    <h5>No Gallery Items Found</h5>
                    <p class="text-muted">Start by adding your first gallery item.</p>
                    <a href="{{ route('admin.gallery.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus me-2"></i>Add Gallery Item
                    </a>
                </div>
            </div>
        </div>
    @endif
</div>

<!-- Bulk Actions -->
@if($gallery->count() > 0)
<div class="card mt-4">
    <div class="card-body">
        <h6 class="mb-3">Bulk Actions</h6>
        <div class="row">
            <div class="col-md-6">
                <p class="small text-muted">Select multiple items and perform bulk operations:</p>
                <div class="btn-group" role="group">
                    <button type="button" class="btn btn-outline-success btn-sm" onclick="bulkAction('activate')">
                        <i class="fas fa-check me-1"></i>Activate Selected
                    </button>
                    <button type="button" class="btn btn-outline-secondary btn-sm" onclick="bulkAction('deactivate')">
                        <i class="fas fa-times me-1"></i>Deactivate Selected
                    </button>
                    <button type="button" class="btn btn-outline-warning btn-sm" onclick="bulkAction('feature')">
                        <i class="fas fa-star me-1"></i>Feature Selected
                    </button>
                </div>
            </div>
            <div class="col-md-6 text-md-end">
                <p class="small text-muted">Total Items: {{ $gallery->total() }}</p>
                <p class="small text-muted">Active: {{ $gallery->where('is_active', true)->count() }} | Featured: {{ $gallery->where('is_featured', true)->count() }}</p>
            </div>
        </div>
    </div>
</div>
@endif
@endsection

@push('scripts')
<script>
function bulkAction(action) {
    // This would be implemented with checkboxes and AJAX
    alert('Bulk ' + action + ' functionality would be implemented here');
}

// Add hover effects
$(document).ready(function() {
    $('.card').hover(
        function() {
            $(this).addClass('shadow-lg').css('transform', 'translateY(-2px)');
        },
        function() {
            $(this).removeClass('shadow-lg').css('transform', 'translateY(0)');
        }
    );
});
</script>
@endpush

@push('styles')
<style>
.card {
    transition: all 0.3s ease;
}

.card-img-top {
    transition: transform 0.3s ease;
}

.card:hover .card-img-top {
    transform: scale(1.05);
}

.position-absolute .badge {
    font-size: 0.7rem;
}
</style>
@endpush
