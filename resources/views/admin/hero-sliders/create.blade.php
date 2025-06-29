@extends('admin.layouts.app')

@section('title', 'Add Hero Slide')
@section('page-title', 'Add New Hero Slide')

@section('content')
<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Hero Slide Details</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.hero-sliders.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="mb-3">
                        <label for="title" class="form-label">Title *</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" 
                               id="title" name="title" value="{{ old('title') }}" 
                               placeholder="e.g., Welcome to Shantineketan College" required>
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label for="subtitle" class="form-label">Subtitle</label>
                        <input type="text" class="form-control @error('subtitle') is-invalid @enderror" 
                               id="subtitle" name="subtitle" value="{{ old('subtitle') }}" 
                               placeholder="e.g., Excellence in Education Since 2009">
                        @error('subtitle')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" 
                                  id="description" name="description" rows="3" 
                                  placeholder="Brief description that appears below the title">{{ old('description') }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label for="image_path" class="form-label">Background Image *</label>
                        <input type="file" class="form-control @error('image_path') is-invalid @enderror" 
                               id="image_path" name="image_path" accept="image/*" required>
                        <small class="text-muted">
                            Recommended size: 1920x800px. Formats: JPG, PNG (Max: 5MB)
                        </small>
                        @error('image_path')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <!-- Image Preview -->
                    <div class="mb-3" id="imagePreview" style="display: none;">
                        <label class="form-label">Preview</label>
                        <div class="border rounded p-3 text-center">
                            <img id="previewImg" src="" alt="Preview" class="img-fluid" style="max-height: 200px;">
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="button_text" class="form-label">Button Text</label>
                                <input type="text" class="form-control @error('button_text') is-invalid @enderror" 
                                       id="button_text" name="button_text" value="{{ old('button_text') }}" 
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
                                       id="button_link" name="button_link" value="{{ old('button_link') }}" 
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
                                       id="sort_order" name="sort_order" value="{{ old('sort_order', 1) }}" 
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
                                           name="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }}>
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
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-2"></i>Create Slide
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <h6 class="mb-0">Design Guidelines</h6>
            </div>
            <div class="card-body">
                <div class="alert alert-info">
                    <h6><i class="fas fa-info-circle me-2"></i>Image Guidelines</h6>
                    <ul class="small mb-0">
                        <li>Use high-resolution images (1920x800px)</li>
                        <li>Ensure good contrast for text readability</li>
                        <li>Avoid cluttered backgrounds</li>
                        <li>Consider mobile responsiveness</li>
                        <li>File size should be under 5MB</li>
                    </ul>
                </div>
                
                <div class="alert alert-warning">
                    <h6><i class="fas fa-palette me-2"></i>Content Tips</h6>
                    <ul class="small mb-0">
                        <li>Keep titles short and impactful</li>
                        <li>Use clear, action-oriented button text</li>
                        <li>Ensure descriptions are concise</li>
                        <li>Test on different screen sizes</li>
                    </ul>
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
                <h6 class="mb-0">Preview</h6>
            </div>
            <div class="card-body">
                <div id="slidePreview" class="text-center p-3 bg-dark text-white rounded" style="min-height: 150px; background-size: cover; background-position: center;">
                    <h5 id="previewTitle">Your Title Here</h5>
                    <p id="previewSubtitle" class="small">Your subtitle here</p>
                    <p id="previewDescription" class="small">Your description here</p>
                    <button id="previewButton" class="btn btn-warning btn-sm" style="display: none;">Button Text</button>
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
