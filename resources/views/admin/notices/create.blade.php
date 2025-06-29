@extends('admin.layouts.app')

@section('title', 'Create Notice')
@section('page-title', 'Create New Notice')

@section('content')
<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Notice Details</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.notices.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="mb-3">
                        <label for="title" class="form-label">Notice Title *</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" 
                               id="title" name="title" value="{{ old('title') }}" 
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
                                    <option value="academic" {{ old('category') == 'academic' ? 'selected' : '' }}>Academic</option>
                                    <option value="examination" {{ old('category') == 'examination' ? 'selected' : '' }}>Examination</option>
                                    <option value="admission" {{ old('category') == 'admission' ? 'selected' : '' }}>Admission</option>
                                    <option value="events" {{ old('category') == 'events' ? 'selected' : '' }}>Events</option>
                                    <option value="placement" {{ old('category') == 'placement' ? 'selected' : '' }}>Placement</option>
                                    <option value="general" {{ old('category') == 'general' ? 'selected' : '' }}>General</option>
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
                                    <option value="high" {{ old('priority') == 'high' ? 'selected' : '' }}>High</option>
                                    <option value="normal" {{ old('priority') == 'normal' ? 'selected' : '' }}>Normal</option>
                                    <option value="low" {{ old('priority') == 'low' ? 'selected' : '' }}>Low</option>
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
                                  placeholder="Enter notice content" required>{{ old('content') }}</textarea>
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
                                       value="{{ old('publish_date', date('Y-m-d')) }}" required>
                                @error('publish_date')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="expire_date" class="form-label">Expire Date</label>
                                <input type="date" class="form-control @error('expire_date') is-invalid @enderror" 
                                       id="expire_date" name="expire_date" value="{{ old('expire_date') }}">
                                <small class="text-muted">Leave empty for no expiration</small>
                                @error('expire_date')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="attachment" class="form-label">Attachment</label>
                        <input type="file" class="form-control @error('attachment') is-invalid @enderror" 
                               id="attachment" name="attachment" accept=".pdf,.doc,.docx">
                        <small class="text-muted">Supported formats: PDF, DOC, DOCX (Max: 2MB)</small>
                        @error('attachment')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="is_active" 
                                   name="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }}>
                            <label class="form-check-label" for="is_active">
                                Publish immediately
                            </label>
                        </div>
                    </div>
                    
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('admin.notices.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left me-2"></i>Back to List
                        </a>
                        <div>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-2"></i>Create Notice
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
                <h6 class="mb-0">Notice Guidelines</h6>
            </div>
            <div class="card-body">
                <div class="alert alert-info">
                    <h6><i class="fas fa-info-circle me-2"></i>Tips for Writing Notices</h6>
                    <ul class="small mb-0">
                        <li>Keep titles clear and concise</li>
                        <li>Use appropriate categories</li>
                        <li>Set priority based on urgency</li>
                        <li>Include all relevant details</li>
                        <li>Set expiry dates for time-sensitive notices</li>
                    </ul>
                </div>
                
                <div class="alert alert-warning">
                    <h6><i class="fas fa-exclamation-triangle me-2"></i>Category Guidelines</h6>
                    <ul class="small mb-0">
                        <li><strong>Academic:</strong> Class schedules, syllabus updates</li>
                        <li><strong>Examination:</strong> Exam dates, results</li>
                        <li><strong>Admission:</strong> Application deadlines</li>
                        <li><strong>Events:</strong> Festivals, competitions</li>
                        <li><strong>Placement:</strong> Job opportunities</li>
                        <li><strong>General:</strong> Other announcements</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
$(document).ready(function() {
    // Set minimum date to today
    $('#publish_date').attr('min', new Date().toISOString().split('T')[0]);
    $('#expire_date').attr('min', new Date().toISOString().split('T')[0]);
    
    // Update expire date minimum when publish date changes
    $('#publish_date').change(function() {
        $('#expire_date').attr('min', $(this).val());
    });
});
</script>
@endpush
