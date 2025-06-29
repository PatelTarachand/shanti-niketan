@extends('admin.layouts.app')

@section('title', 'Edit Hero Slide')
@section('page-title', 'Edit Hero Slide')

@section('content')
<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Edit Hero Slide</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.hero-sliders.update', $heroSlider) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-3">
                        <label for="title" class="form-label">Title *</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" 
                               id="title" name="title" value="{{ old('title', $heroSlider->title) }}" 
                               placeholder="e.g., Welcome to Shantineketan College" required>
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label for="subtitle" class="form-label">Subtitle</label>
                        <input type="text" class="form-control @error('subtitle') is-invalid @enderror" 
                               id="subtitle" name="subtitle" value="{{ old('subtitle', $heroSlider->subtitle) }}" 
                               placeholder="e.g., Excellence in Education Since 2009">
                        @error('subtitle')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" 
                                  id="description" name="description" rows="3" 
                                  placeholder="Brief description that appears below the title">{{ old('description', $heroSlider->description) }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <!-- Current Image Display -->
                    <div class="mb-3">
                        <label class="form-label">Current Background Image</label>
                        <div class="border rounded p-3">
                            <img src="{{ $heroSlider->image_path ? Storage::url($heroSlider->image_path) : asset($heroSlider->image_path) }}" 
                                 alt="{{ $heroSlider->title }}" class="img-fluid rounded" style="max-height: 200px;">
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="image_path" class="form-label">Replace Background Image</label>
                        <input type="file" class="form-control @error('image_path') is-invalid @enderror" 
                               id="image_path" name="image_path" accept="image/*">
                        <small class="text-muted">
                            Leave empty to keep current image. Recommended size: 1920x800px. Formats: JPG, PNG (Max: 5MB)
                        </small>
                        @error('image_path')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <!-- New Image Preview -->
                    <div class="mb-3" id="imagePreview" style="display: none;">
                        <label class="form-label">New Image Preview</label>
                        <div class="border rounded p-3 text-center">
                            <img id="previewImg" src="" alt="Preview" class="img-fluid" style="max-height: 200px;">
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="button_text" class="form-label">Button Text</label>
                                <input type="text" class="form-control @error('button_text') is-invalid @enderror" 
                                       id="button_text" name="button_text" value="{{ old('button_text', $heroSlider->button_text) }}" 
                                       placeholder="e.g., Explore Courses">
                                @error('button_text')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="button_link" class="form-label">Button Link</label>
                                <input type="text" class="form-control @error('button_link') is-invalid @enderror" 
                                       id="button_link" name="button_link" value="{{ old('button_link', $heroSlider->button_link) }}" 
                                       placeholder="e.g., /courses">
                                @error('button_link')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="sort_order" class="form-label">Display Order</label>
                                <input type="number" class="form-control @error('sort_order') is-invalid @enderror" 
                                       id="sort_order" name="sort_order" value="{{ old('sort_order', $heroSlider->sort_order) }}" 
                                       min="0">
                                <small class="text-muted">Lower numbers appear first</small>
                                @error('sort_order')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Status</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="is_active" 
                                           name="is_active" value="1" {{ old('is_active', $heroSlider->is_active) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="is_active">
                                        Active (visible on website)
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('admin.hero-sliders.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left me-2"></i>Back to Slides
                        </a>
                        <div>
                            <a href="{{ route('admin.hero-sliders.show', $heroSlider) }}" class="btn btn-info me-2">
                                <i class="fas fa-eye me-2"></i>Preview
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-2"></i>Update Slide
                            </button>
                        </div>
                    </div>
                </form>
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
                        <td><strong>Status:</strong></td>
                        <td>
                            @if($heroSlider->is_active)
                                <span class="badge bg-success">Active</span>
                            @else
                                <span class="badge bg-secondary">Inactive</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td><strong>Display Order:</strong></td>
                        <td>{{ $heroSlider->sort_order }}</td>
                    </tr>
                    <tr>
                        <td><strong>Created:</strong></td>
                        <td>{{ $heroSlider->created_at->format('M d, Y H:i') }}</td>
                    </tr>
                    <tr>
                        <td><strong>Updated:</strong></td>
                        <td>{{ $heroSlider->updated_at->format('M d, Y H:i') }}</td>
                    </tr>
                </table>
            </div>
        </div>
        
        <div class="card mt-3">
            <div class="card-header">
                <h6 class="mb-0">Quick Actions</h6>
            </div>
            <div class="card-body">
                <div class="d-grid gap-2">
                    <a href="{{ route('admin.hero-sliders.show', $heroSlider) }}" class="btn btn-outline-info btn-sm">
                        <i class="fas fa-eye me-2"></i>Preview Slide
                    </a>
                    <a href="{{ $heroSlider->image_path ? Storage::url($heroSlider->image_path) : asset($heroSlider->image_path) }}" target="_blank" class="btn btn-outline-primary btn-sm">
                        <i class="fas fa-external-link-alt me-2"></i>View Original Image
                    </a>
                    <form action="{{ route('admin.hero-sliders.destroy', $heroSlider) }}" method="POST" 
                          onsubmit="return confirm('Are you sure you want to delete this slide?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger btn-sm w-100">
                            <i class="fas fa-trash me-2"></i>Delete Slide
                        </button>
                    </form>
                </div>
            </div>
        </div>
        
        <div class="card mt-3">
            <div class="card-header">
                <h6 class="mb-0">Common Button Links</h6>
            </div>
            <div class="card-body">
                <div class="quick-links">
                    <div class="mb-2">
                        <button type="button" class="btn btn-outline-secondary btn-sm w-100" onclick="setButtonLink('/courses', 'Explore Courses')">
                            Courses Page
                        </button>
                    </div>
                    <div class="mb-2">
                        <button type="button" class="btn btn-outline-secondary btn-sm w-100" onclick="setButtonLink('/contact', 'Apply Now')">
                            Contact Page
                        </button>
                    </div>
                    <div class="mb-2">
                        <button type="button" class="btn btn-outline-secondary btn-sm w-100" onclick="setButtonLink('/gallery', 'Virtual Tour')">
                            Gallery Page
                        </button>
                    </div>
                    <div class="mb-2">
                        <button type="button" class="btn btn-outline-secondary btn-sm w-100" onclick="setButtonLink('/about', 'Learn More')">
                            About Page
                        </button>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="card mt-3">
            <div class="card-header">
                <h6 class="mb-0">Live Preview</h6>
            </div>
            <div class="card-body">
                <div id="slidePreview" class="text-center p-3 bg-dark text-white rounded" style="min-height: 150px; background-size: cover; background-position: center; background-image: linear-gradient(rgba(0,0,0,0.4), rgba(255,215,0,0.3)), url('{{ $heroSlider->image_path ? Storage::url($heroSlider->image_path) : asset($heroSlider->image_path) }}');">
                    <h5 id="previewTitle">{{ $heroSlider->title }}</h5>
                    <p id="previewSubtitle" class="small">{{ $heroSlider->subtitle }}</p>
                    <p id="previewDescription" class="small">{{ $heroSlider->description }}</p>
                    @if($heroSlider->button_text)
                        <button id="previewButton" class="btn btn-warning btn-sm">{{ $heroSlider->button_text }}</button>
                    @else
                        <button id="previewButton" class="btn btn-warning btn-sm" style="display: none;">Button Text</button>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
$(document).ready(function() {
    // Image preview functionality
    $('#image_path').change(function() {
        const file = this.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                $('#previewImg').attr('src', e.target.result);
                $('#imagePreview').show();
                $('#slidePreview').css('background-image', 'linear-gradient(rgba(0,0,0,0.4), rgba(255,215,0,0.3)), url(' + e.target.result + ')');
            }
            reader.readAsDataURL(file);
        } else {
            $('#imagePreview').hide();
        }
    });
    
    // Live preview updates
    $('#title').on('input', function() {
        $('#previewTitle').text($(this).val() || 'Your Title Here');
    });
    
    $('#subtitle').on('input', function() {
        $('#previewSubtitle').text($(this).val() || 'Your subtitle here');
    });
    
    $('#description').on('input', function() {
        $('#previewDescription').text($(this).val() || 'Your description here');
    });
    
    $('#button_text').on('input', function() {
        const text = $(this).val();
        if (text) {
            $('#previewButton').text(text).show();
        } else {
            $('#previewButton').hide();
        }
    });
});

function setButtonLink(link, text) {
    $('#button_link').val(link);
    $('#button_text').val(text);
    $('#previewButton').text(text).show();
}
</script>
@endpush
