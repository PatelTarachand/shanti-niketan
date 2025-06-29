@extends('admin.layouts.app')

@section('title', 'Hero Slide Preview')
@section('page-title', 'Hero Slide Preview')

@section('content')
<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Hero Slide Preview</h5>
                <div>
                    @if($heroSlider->is_active)
                        <span class="badge bg-success">Active</span>
                    @else
                        <span class="badge bg-secondary">Inactive</span>
                    @endif
                    <span class="badge bg-warning text-dark ms-2">Order: {{ $heroSlider->sort_order }}</span>
                </div>
            </div>
            <div class="card-body p-0">
                <!-- Hero Slide Preview -->
                <div class="hero-slide-preview position-relative" style="height: 400px; background: linear-gradient(rgba(0,0,0,0.4), rgba(255,215,0,0.3)), url('{{ $heroSlider->image_path ? Storage::url($heroSlider->image_path) : asset($heroSlider->image_path) }}') center/cover;">
                    <div class="position-absolute top-50 start-50 translate-middle text-white text-center w-100">
                        <div class="container">
                            <h1 class="display-4 fw-bold mb-3">
                                {!! str_replace(['Shantineketan College'], ['<span class="text-warning">Shantineketan College</span>'], $heroSlider->title) !!}
                            </h1>
                            @if($heroSlider->subtitle)
                                <p class="lead mb-3">{{ $heroSlider->subtitle }}</p>
                            @endif
                            @if($heroSlider->description)
                                <p class="mb-4">{{ $heroSlider->description }}</p>
                            @endif
                            @if($heroSlider->button_text && $heroSlider->button_link)
                                <div class="hero-buttons">
                                    <a href="{{ $heroSlider->button_link }}" class="btn btn-warning btn-lg me-3 px-4 py-3">
                                        <i class="fas fa-{{ $heroSlider->button_text === 'Explore Courses' ? 'graduation-cap' : ($heroSlider->button_text === 'Apply Now' ? 'user-plus' : ($heroSlider->button_text === 'Virtual Tour' ? 'images' : 'arrow-right')) }} me-2"></i>{{ $heroSlider->button_text }}
                                    </a>
                                    <a href="/contact" class="btn btn-outline-light btn-lg px-4 py-3">
                                        <i class="fas fa-phone me-2"></i>Contact Us
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Slide Details -->
        <div class="card mt-4">
            <div class="card-header">
                <h6 class="mb-0">Slide Details</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <table class="table table-borderless">
                            <tr>
                                <td><strong>Title:</strong></td>
                                <td>{{ $heroSlider->title }}</td>
                            </tr>
                            @if($heroSlider->subtitle)
                            <tr>
                                <td><strong>Subtitle:</strong></td>
                                <td>{{ $heroSlider->subtitle }}</td>
                            </tr>
                            @endif
                            @if($heroSlider->description)
                            <tr>
                                <td><strong>Description:</strong></td>
                                <td>{{ $heroSlider->description }}</td>
                            </tr>
                            @endif
                        </table>
                    </div>
                    <div class="col-md-6">
                        <table class="table table-borderless">
                            @if($heroSlider->button_text)
                            <tr>
                                <td><strong>Button Text:</strong></td>
                                <td>{{ $heroSlider->button_text }}</td>
                            </tr>
                            @endif
                            @if($heroSlider->button_link)
                            <tr>
                                <td><strong>Button Link:</strong></td>
                                <td><code>{{ $heroSlider->button_link }}</code></td>
                            </tr>
                            @endif
                            <tr>
                                <td><strong>Display Order:</strong></td>
                                <td>{{ $heroSlider->sort_order }}</td>
                            </tr>
                            <tr>
                                <td><strong>Status:</strong></td>
                                <td>
                                    @if($heroSlider->is_active)
                                        <span class="badge bg-success">Active</span>
                                    @else
                                        <span class="badge bg-secondary">Inactive</span>
                                    @endif
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <h6 class="mb-0">Slide Information</h6>
            </div>
            <div class="card-body">
                <table class="table table-sm">
                    <tr>
                        <td><strong>ID:</strong></td>
                        <td>#{{ $heroSlider->id }}</td>
                    </tr>
                    <tr>
                        <td><strong>Created:</strong></td>
                        <td>{{ $heroSlider->created_at->format('M d, Y H:i') }}</td>
                    </tr>
                    <tr>
                        <td><strong>Updated:</strong></td>
                        <td>{{ $heroSlider->updated_at->format('M d, Y H:i') }}</td>
                    </tr>
                    <tr>
                        <td><strong>Image File:</strong></td>
                        <td>{{ basename($heroSlider->image_path) }}</td>
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
                    <a href="{{ route('admin.hero-sliders.edit', $heroSlider) }}" class="btn btn-primary">
                        <i class="fas fa-edit me-2"></i>Edit Slide
                    </a>
                    
                    <a href="{{ $heroSlider->image_path ? Storage::url($heroSlider->image_path) : asset($heroSlider->image_path) }}" target="_blank" class="btn btn-outline-info">
                        <i class="fas fa-external-link-alt me-2"></i>View Original Image
                    </a>
                    
                    <a href="{{ route('admin.hero-sliders.index') }}" class="btn btn-outline-secondary">
                        <i class="fas fa-arrow-left me-2"></i>Back to Slides
                    </a>
                    
                    <hr>
                    
                    <form action="{{ route('admin.hero-sliders.destroy', $heroSlider) }}" method="POST" 
                          onsubmit="return confirm('Are you sure you want to delete this slide?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger w-100">
                            <i class="fas fa-trash me-2"></i>Delete Slide
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
                <p class="small text-muted">This is how the slide appears on the homepage.</p>
                <a href="{{ route('home') }}" target="_blank" class="btn btn-outline-info btn-sm w-100">
                    <i class="fas fa-external-link-alt me-2"></i>View on Website
                </a>
            </div>
        </div>
        
        <div class="card mt-3">
            <div class="card-header">
                <h6 class="mb-0">Image Details</h6>
            </div>
            <div class="card-body">
                <div class="text-center mb-3">
                    <img src="{{ $heroSlider->image_path ? Storage::url($heroSlider->image_path) : asset($heroSlider->image_path) }}" 
                         alt="{{ $heroSlider->title }}" class="img-fluid rounded" style="max-height: 150px;">
                </div>
                <div class="small text-muted">
                    <p class="mb-1"><strong>File:</strong> {{ basename($heroSlider->image_path) }}</p>
                    <p class="mb-1"><strong>Path:</strong> {{ $heroSlider->image_path }}</p>
                    <p class="mb-0"><strong>URL:</strong> <a href="{{ $heroSlider->image_path ? Storage::url($heroSlider->image_path) : asset($heroSlider->image_path) }}" target="_blank">View</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
.hero-slide-preview {
    border-radius: 0 0 0.375rem 0.375rem;
}

.hero-buttons .btn {
    margin: 0.25rem;
}

@media (max-width: 768px) {
    .hero-slide-preview {
        height: 300px !important;
    }
    
    .hero-slide-preview .display-4 {
        font-size: 2rem !important;
    }
    
    .hero-buttons .btn {
        font-size: 0.875rem;
        padding: 0.5rem 1rem !important;
    }
}
</style>
@endpush
