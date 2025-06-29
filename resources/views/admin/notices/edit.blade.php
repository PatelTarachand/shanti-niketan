@extends('admin.layouts.app')

@section('title', 'Edit Notice')
@section('page-title', 'Edit Notice')

@section('content')
<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Edit Notice Details</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.notices.update', $notice) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-3">
                        <label for="title" class="form-label">Notice Title *</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" 
                               id="title" name="title" value="{{ old('title', $notice->title) }}" 
                               placeholder="Enter notice title" required>
                        @error('title')
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
                                    <option value="academic" {{ old('category', $notice->category) == 'academic' ? 'selected' : '' }}>Academic</option>
                                    <option value="examination" {{ old('category', $notice->category) == 'examination' ? 'selected' : '' }}>Examination</option>
                                    <option value="admission" {{ old('category', $notice->category) == 'admission' ? 'selected' : '' }}>Admission</option>
                                    <option value="events" {{ old('category', $notice->category) == 'events' ? 'selected' : '' }}>Events</option>
                                    <option value="placement" {{ old('category', $notice->category) == 'placement' ? 'selected' : '' }}>Placement</option>
                                    <option value="general" {{ old('category', $notice->category) == 'general' ? 'selected' : '' }}>General</option>
                                </select>
                                @error('category')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="priority" class="form-label">Priority *</label>
                                <select class="form-select @error('priority') is-invalid @enderror" 
                                        id="priority" name="priority" required>
                                    <option value="">Select Priority</option>
                                    <option value="high" {{ old('priority', $notice->priority) == 'high' ? 'selected' : '' }}>High</option>
                                    <option value="normal" {{ old('priority', $notice->priority) == 'normal' ? 'selected' : '' }}>Normal</option>
                                    <option value="low" {{ old('priority', $notice->priority) == 'low' ? 'selected' : '' }}>Low</option>
                                </select>
                                @error('priority')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="content" class="form-label">Notice Content *</label>
                        <textarea class="form-control @error('content') is-invalid @enderror" 
                                  id="content" name="content" rows="6" 
                                  placeholder="Enter notice content" required>{{ old('content', $notice->content) }}</textarea>
                        @error('content')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="publish_date" class="form-label">Publish Date *</label>
                                <input type="date" class="form-control @error('publish_date') is-invalid @enderror" 
                                       id="publish_date" name="publish_date" 
                                       value="{{ old('publish_date', $notice->publish_date->format('Y-m-d')) }}" required>
                                @error('publish_date')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="expire_date" class="form-label">Expire Date</label>
                                <input type="date" class="form-control @error('expire_date') is-invalid @enderror" 
                                       id="expire_date" name="expire_date" 
                                       value="{{ old('expire_date', $notice->expire_date ? $notice->expire_date->format('Y-m-d') : '') }}">
                                <small class="text-muted">Leave empty for no expiration</small>
                                @error('expire_date')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="attachment" class="form-label">Attachment</label>
                        @if($notice->attachment)
                            <div class="mb-2">
                                <small class="text-muted">Current file: </small>
                                <a href="{{ Storage::url($notice->attachment) }}" target="_blank" class="text-primary">
                                    <i class="fas fa-file me-1"></i>{{ basename($notice->attachment) }}
                                </a>
                            </div>
                        @endif
                        <input type="file" class="form-control @error('attachment') is-invalid @enderror" 
                               id="attachment" name="attachment" accept=".pdf,.doc,.docx">
                        <small class="text-muted">Supported formats: PDF, DOC, DOCX (Max: 2MB). Leave empty to keep current file.</small>
                        @error('attachment')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="is_active" 
                                   name="is_active" value="1" {{ old('is_active', $notice->is_active) ? 'checked' : '' }}>
                            <label class="form-check-label" for="is_active">
                                Active (visible on website)
                            </label>
                        </div>
                    </div>
                    
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('admin.notices.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left me-2"></i>Back to List
                        </a>
                        <div>
                            <a href="{{ route('admin.notices.show', $notice) }}" class="btn btn-info me-2">
                                <i class="fas fa-eye me-2"></i>Preview
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-2"></i>Update Notice
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
                <h6 class="mb-0">Notice Information</h6>
            </div>
            <div class="card-body">
                <table class="table table-sm">
                    <tr>
                        <td><strong>Created:</strong></td>
                        <td>{{ $notice->created_at->format('M d, Y H:i') }}</td>
                    </tr>
                    <tr>
                        <td><strong>Updated:</strong></td>
                        <td>{{ $notice->updated_at->format('M d, Y H:i') }}</td>
                    </tr>
                    <tr>
                        <td><strong>Created By:</strong></td>
                        <td>{{ $notice->admin->name }}</td>
                    </tr>
                    <tr>
                        <td><strong>Status:</strong></td>
                        <td>
                            @if($notice->is_active)
                                <span class="badge bg-success">Active</span>
                            @else
                                <span class="badge bg-secondary">Inactive</span>
                            @endif
                        </td>
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
                    <a href="{{ route('admin.notices.show', $notice) }}" class="btn btn-outline-info btn-sm">
                        <i class="fas fa-eye me-2"></i>Preview Notice
                    </a>
                    <form action="{{ route('admin.notices.destroy', $notice) }}" method="POST" 
                          onsubmit="return confirm('Are you sure you want to delete this notice?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger btn-sm w-100">
                            <i class="fas fa-trash me-2"></i>Delete Notice
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
