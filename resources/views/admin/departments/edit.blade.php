@extends('admin.layouts.app')

@section('title', 'Edit Department')
@section('page-title', 'Edit Department')

@section('content')
<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Department Details</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.departments.update', $department) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="row">
                        <div class="col-md-8">
                            <div class="mb-3">
                                <label for="name" class="form-label">Department Name *</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                       id="name" name="name" value="{{ old('name', $department->name) }}" 
                                       placeholder="e.g., Computer Science & Engineering" required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="code" class="form-label">Department Code *</label>
                                <input type="text" class="form-control @error('code') is-invalid @enderror" 
                                       id="code" name="code" value="{{ old('code', $department->code) }}" 
                                       placeholder="e.g., CSE" maxlength="10" required>
                                @error('code')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" 
                                  id="description" name="description" rows="3" 
                                  placeholder="Brief description of the department">{{ old('description', $department->description) }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label for="head_of_department" class="form-label">Head of Department</label>
                        <input type="text" class="form-control @error('head_of_department') is-invalid @enderror" 
                               id="head_of_department" name="head_of_department" value="{{ old('head_of_department', $department->head_of_department) }}" 
                               placeholder="e.g., Dr. John Smith">
                        @error('head_of_department')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="sort_order" class="form-label">Sort Order</label>
                                <input type="number" class="form-control @error('sort_order') is-invalid @enderror" 
                                       id="sort_order" name="sort_order" value="{{ old('sort_order', $department->sort_order) }}" 
                                       min="0" placeholder="0">
                                <small class="text-muted">Lower numbers appear first</small>
                                @error('sort_order')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="mb-3">
                                <div class="form-check mt-4">
                                    <input class="form-check-input" type="checkbox" id="is_active" 
                                           name="is_active" value="1" {{ old('is_active', $department->is_active) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="is_active">
                                        Active (available for selection)
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('admin.departments.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left me-2"></i>Back to Departments
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-2"></i>Update Department
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <h6 class="mb-0">Usage Information</h6>
            </div>
            <div class="card-body">
                <div class="alert alert-info">
                    <h6><i class="fas fa-users me-2"></i>Faculty Count</h6>
                    <p class="mb-2">
                        <strong>{{ $department->faculty()->count() }}</strong> faculty members 
                        are assigned to this department.
                    </p>
                    <h6><i class="fas fa-graduation-cap me-2"></i>Course Count</h6>
                    <p class="mb-0">
                        <strong>{{ $department->courses()->count() }}</strong> courses 
                        belong to this department.
                    </p>
                </div>
                
                @if($department->faculty()->count() > 0 || $department->courses()->count() > 0)
                <div class="alert alert-warning">
                    <h6><i class="fas fa-exclamation-triangle me-2"></i>Warning</h6>
                    <p class="small mb-0">
                        This department is currently in use. Changing the name will affect 
                        all associated faculty and courses.
                    </p>
                </div>
                @endif
            </div>
        </div>
        
        <div class="card mt-3">
            <div class="card-header">
                <h6 class="mb-0">Department Guidelines</h6>
            </div>
            <div class="card-body">
                <div class="alert alert-info">
                    <h6><i class="fas fa-info-circle me-2"></i>Guidelines</h6>
                    <ul class="small mb-0">
                        <li>Use clear and descriptive department names</li>
                        <li>Department codes should be short and unique</li>
                        <li>Sort order determines display sequence</li>
                        <li>Inactive departments won't appear in forms</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
