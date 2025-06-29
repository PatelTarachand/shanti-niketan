@extends('admin.layouts.app')

@section('title', 'Edit Gallery Item')
@section('page-title', 'Edit Gallery Item')

@section('content')
<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Edit Gallery Item</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.gallery.update', $gallery) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-3">
                        <label for="title" class="form-label">Title *</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" 
                               id="title" name="title" value="{{ old('title', $gallery->title) }}" 
                               placeholder="Enter image/video title" required>
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" 
                                  id="description" name="description" rows="3" 
                                  placeholder="Brief description of the image/video">{{ old('description', $gallery->description) }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="category" class="form-label">Category *</label>
                                <select class="form-select @error('category') is-invalid @enderror" 
                                        id="category" name="category" required>
                                    <option value="">Select Category</option>
                                    <option value="campus" {{ old('category', $gallery->category) == 'campus' ? 'selected' : '' }}>Campus</option>
                                    <option value="labs" {{ old('category', $gallery->category) == 'labs' ? 'selected' : '' }}>Labs</option>
                                    <option value="events" {{ old('category', $gallery->category) == 'events' ? 'selected' : '' }}>Events</option>
                                    <option value="sports" {{ old('category', $gallery->category) == 'sports' ? 'selected' : '' }}>Sports</option>
                                </select>
                                @error('category')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="type" class="form-label">Type *</label>
                                <select class="form-select @error('type') is-invalid @enderror" 
                                        id="type" name="type" required>
                                    <option value="">Select Type</option>
                                    <option value="image" {{ old('type', $gallery->type) == 'image' ? 'selected' : '' }}>Image</option>
                                    <option value="video" {{ old('type', $gallery->type) == 'video' ? 'selected' : '' }}>Video</option>
                                </select>
                                @error('type')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    
                    <!-- Current File Display -->
                    <div class="mb-3">
                        <label class="form-label">Current File</label>
                        <div class="border rounded p-3">
                            @if($gallery->type === 'image')
                                <img src="{{ Storage::url($gallery->image_path) }}" alt="{{ $gallery->title }}" 
                                     class="img-fluid rounded" style="max-height: 200px;">
                            @else
                                <div class="text-center p-4 bg-dark rounded">
                                    <i class="fas fa-play-circle fa-4x text-white mb-2"></i>
                                    <p class="text-white mb-0">{{ $gallery->title }}</p>
                                </div>
                            @endif
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="image_path" class="form-label">Replace File</label>
                        <input type="file" class="form-control @error('image_path') is-invalid @enderror" 
                               id="image_path" name="image_path" accept="image/*,video/*">
                        <small class="text-muted">
                            Leave empty to keep current file. Images: JPG, PNG, GIF (Max: 5MB) | Videos: MP4, AVI, MOV (Max: 50MB)
                        </small>
                        @error('image_path')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <!-- New Image Preview -->
                    <div class="mb-3" id="imagePreview" style="display: none;">
                        <label class="form-label">New File Preview</label>
                        <div class="border rounded p-3 text-center">
                            <img id="previewImg" src="" alt="Preview" class="img-fluid" style="max-height: 200px;">
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="sort_order" class="form-label">Display Order</label>
                                <input type="number" class="form-control @error('sort_order') is-invalid @enderror" 
                                       id="sort_order" name="sort_order" value="{{ old('sort_order', $gallery->sort_order) }}" 
                                       min="0">
                                <small class="text-muted">Lower numbers appear first</small>
                                @error('sort_order')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Options</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="is_featured" 
                                           name="is_featured" value="1" {{ old('is_featured', $gallery->is_featured) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="is_featured">
                                        Featured (highlight on homepage)
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="is_active" 
                                           name="is_active" value="1" {{ old('is_active', $gallery->is_active) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="is_active">
                                        Active (visible on website)
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('admin.gallery.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left me-2"></i>Back to Gallery
                        </a>
                        <div>
                            <a href="{{ route('admin.gallery.show', $gallery) }}" class="btn btn-info me-2">
                                <i class="fas fa-eye me-2"></i>Preview
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-2"></i>Update Item
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
                <h6 class="mb-0">Item Information</h6>
            </div>
            <div class="card-body">
                <table class="table table-sm">
                    <tr>
                        <td><strong>ID:</strong></td>
                        <td>#{{ $gallery->id }}</td>
                    </tr>
                    <tr>
                        <td><strong>Type:</strong></td>
                        <td>
                            <span class="badge bg-{{ $gallery->type === 'image' ? 'primary' : 'success' }}">
                                {{ ucfirst($gallery->type) }}
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td><strong>Category:</strong></td>
                        <td>
                            <span class="badge bg-secondary">{{ ucfirst($gallery->category) }}</span>
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
                            @if($gallery->is_featured)
                                <span class="badge bg-warning text-dark ms-1">Featured</span>
                            @endif
                        </td>
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
                <h6 class="mb-0">Quick Actions</h6>
            </div>
            <div class="card-body">
                <div class="d-grid gap-2">
                    <a href="{{ route('admin.gallery.show', $gallery) }}" class="btn btn-outline-info btn-sm">
                        <i class="fas fa-eye me-2"></i>Preview Item
                    </a>
                    <a href="{{ Storage::url($gallery->image_path) }}" target="_blank" class="btn btn-outline-primary btn-sm">
                        <i class="fas fa-external-link-alt me-2"></i>View Original File
                    </a>
                    <form action="{{ route('admin.gallery.destroy', $gallery) }}" method="POST" 
                          onsubmit="return confirm('Are you sure you want to delete this gallery item?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger btn-sm w-100">
                            <i class="fas fa-trash me-2"></i>Delete Item
                        </button>
                    </form>
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
            }
            reader.readAsDataURL(file);
        } else {
            $('#imagePreview').hide();
        }
    });
    
    // Update file input accept based on type selection
    $('#type').change(function() {
        const type = $(this).val();
        if (type === 'image') {
            $('#image_path').attr('accept', 'image/*');
        } else if (type === 'video') {
            $('#image_path').attr('accept', 'video/*');
        } else {
            $('#image_path').attr('accept', 'image/*,video/*');
        }
    });
});
</script>
@endpush
