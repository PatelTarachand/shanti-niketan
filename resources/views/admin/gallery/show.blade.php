@extends('admin.layouts.app')

@section('title', 'Gallery Item')
@section('page-title', 'Gallery Item Preview')

@section('content')
<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Gallery Item Preview</h5>
                <div>
                    <span class="badge bg-{{ $gallery->category === 'campus' ? 'primary' : ($gallery->category === 'labs' ? 'success' : ($gallery->category === 'events' ? 'info' : 'warning')) }}">
                        {{ ucfirst($gallery->category) }}
                    </span>
                    @if($gallery->is_featured)
                        <span class="badge bg-warning text-dark ms-2">Featured</span>
                    @endif
                    @if($gallery->is_active)
                        <span class="badge bg-success ms-2">Active</span>
                    @else
                        <span class="badge bg-secondary ms-2">Inactive</span>
                    @endif
                </div>
            </div>
            <div class="card-body">
                <div class="gallery-preview">
                    <!-- Media Display -->
                    <div class="media-container mb-4">
                        @if($gallery->type === 'image')
                            <img src="{{ Storage::url($gallery->image_path) }}" 
                                 alt="{{ $gallery->title }}" 
                                 class="img-fluid rounded shadow"
                                 style="width: 100%; max-height: 500px; object-fit: cover;">
                        @else
                            <div class="video-container">
                                <video controls class="w-100 rounded shadow" style="max-height: 500px;">
                                    <source src="{{ Storage::url($gallery->image_path) }}" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>
                            </div>
                        @endif
                    </div>
                    
                    <!-- Title and Description -->
                    <div class="content-section">
                        <h3 class="gallery-title mb-3">{{ $gallery->title }}</h3>
                        
                        @if($gallery->description)
                            <div class="gallery-description mb-4">
                                <p class="text-muted">{!! nl2br(e($gallery->description)) !!}</p>
                            </div>
                        @endif
                        
                        <!-- Metadata -->
                        <div class="gallery-metadata">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="metadata-item mb-2">
                                        <i class="fas fa-tag text-warning me-2"></i>
                                        <strong>Category:</strong> {{ ucfirst($gallery->category) }}
                                    </div>
                                    <div class="metadata-item mb-2">
                                        <i class="fas fa-{{ $gallery->type === 'image' ? 'image' : 'video' }} text-warning me-2"></i>
                                        <strong>Type:</strong> {{ ucfirst($gallery->type) }}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="metadata-item mb-2">
                                        <i class="fas fa-sort-numeric-up text-warning me-2"></i>
                                        <strong>Display Order:</strong> {{ $gallery->sort_order }}
                                    </div>
                                    <div class="metadata-item mb-2">
                                        <i class="fas fa-calendar text-warning me-2"></i>
                                        <strong>Added:</strong> {{ $gallery->created_at->format('M d, Y') }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <h6 class="mb-0">Item Details</h6>
            </div>
            <div class="card-body">
                <table class="table table-sm">
                    <tr>
                        <td><strong>ID:</strong></td>
                        <td>#{{ $gallery->id }}</td>
                    </tr>
                    <tr>
                        <td><strong>Title:</strong></td>
                        <td>{{ $gallery->title }}</td>
                    </tr>
                    <tr>
                        <td><strong>Category:</strong></td>
                        <td>
                            <span class="badge bg-{{ $gallery->category === 'campus' ? 'primary' : ($gallery->category === 'labs' ? 'success' : ($gallery->category === 'events' ? 'info' : 'warning')) }}">
                                {{ ucfirst($gallery->category) }}
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td><strong>Type:</strong></td>
                        <td>
                            <span class="badge bg-{{ $gallery->type === 'image' ? 'primary' : 'success' }}">
                                <i class="fas fa-{{ $gallery->type === 'image' ? 'image' : 'video' }} me-1"></i>
                                {{ ucfirst($gallery->type) }}
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td><strong>Status:</strong></td>
                        <td>
                            @if($gallery->is_active)
                                <span class="badge bg-success">Active</span>
                            @else
                                <span class="badge bg-secondary">Inactive</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td><strong>Featured:</strong></td>
                        <td>
                            @if($gallery->is_featured)
                                <span class="badge bg-warning text-dark">Yes</span>
                            @else
                                <span class="badge bg-light text-dark">No</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td><strong>Display Order:</strong></td>
                        <td>{{ $gallery->sort_order }}</td>
                    </tr>
                    <tr>
                        <td><strong>Created:</strong></td>
                        <td>{{ $gallery->created_at->format('M d, Y H:i') }}</td>
                    </tr>
                    <tr>
                        <td><strong>Updated:</strong></td>
                        <td>{{ $gallery->updated_at->format('M d, Y H:i') }}</td>
                    </tr>
                </table>
            </div>
        </div>
        
        <div class="card mt-3">
            <div class="card-header">
                <h6 class="mb-0">Actions</h6>
            </div>
            <div class="card-body">
                <div class="d-grid gap-2">
                    <a href="{{ route('admin.gallery.edit', $gallery) }}" class="btn btn-primary">
                        <i class="fas fa-edit me-2"></i>Edit Item
                    </a>
                    
                    <a href="{{ Storage::url($gallery->image_path) }}" target="_blank" class="btn btn-outline-info">
                        <i class="fas fa-external-link-alt me-2"></i>View Original File
                    </a>
                    
                    <a href="{{ route('admin.gallery.index') }}" class="btn btn-outline-secondary">
                        <i class="fas fa-arrow-left me-2"></i>Back to Gallery
                    </a>
                    
                    <hr>
                    
                    <form action="{{ route('admin.gallery.destroy', $gallery) }}" method="POST" 
                          onsubmit="return confirm('Are you sure you want to delete this gallery item?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger w-100">
                            <i class="fas fa-trash me-2"></i>Delete Item
                        </button>
                    </form>
                </div>
            </div>
        </div>
        
        <div class="card mt-3">
            <div class="card-header">
                <h6 class="mb-0">Website Preview</h6>
            </div>
            <div class="card-body">
                <p class="small text-muted">This is how the item will appear on the public website gallery.</p>
                <a href="{{ route('gallery.index') }}" target="_blank" class="btn btn-outline-info btn-sm w-100">
                    <i class="fas fa-external-link-alt me-2"></i>View on Website
                </a>
            </div>
        </div>
        
        @if($gallery->type === 'image')
        <div class="card mt-3">
            <div class="card-header">
                <h6 class="mb-0">Image Information</h6>
            </div>
            <div class="card-body">
                <div class="small text-muted">
                    <p class="mb-1"><strong>File:</strong> {{ basename($gallery->image_path) }}</p>
                    <p class="mb-1"><strong>Path:</strong> {{ $gallery->image_path }}</p>
                    <p class="mb-0"><strong>URL:</strong> <a href="{{ Storage::url($gallery->image_path) }}" target="_blank">View</a></p>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection

@push('styles')
<style>
.gallery-preview {
    font-family: 'Inter', sans-serif;
}

.gallery-title {
    color: #2C3E50;
    font-weight: 600;
    line-height: 1.3;
}

.gallery-description {
    font-size: 16px;
    line-height: 1.6;
}

.metadata-item {
    font-size: 14px;
}

.media-container {
    background: #f8f9fa;
    border-radius: 10px;
    padding: 1rem;
}

.video-container video {
    border-radius: 8px;
}
</style>
@endpush
