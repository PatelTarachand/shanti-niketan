@extends('admin.layouts.app')

@section('title', 'Department Details')
@section('page-title', 'Department Details')

@section('content')
<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">{{ $department->name }} ({{ $department->code }})</h5>
                <div>
                    @if($department->is_active)
                        <span class="badge bg-success">Active</span>
                    @else
                        <span class="badge bg-secondary">Inactive</span>
                    @endif
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <h6 class="text-muted">Basic Information</h6>
                        <table class="table table-borderless">
                            <tr>
                                <td><strong>Department Name:</strong></td>
                                <td>{{ $department->name }}</td>
                            </tr>
                            <tr>
                                <td><strong>Department Code:</strong></td>
                                <td><span class="badge bg-primary">{{ $department->code }}</span></td>
                            </tr>
                            <tr>
                                <td><strong>Head of Department:</strong></td>
                                <td>{{ $department->head_of_department ?? 'Not assigned' }}</td>
                            </tr>
                            <tr>
                                <td><strong>Sort Order:</strong></td>
                                <td><span class="badge bg-secondary">{{ $department->sort_order }}</span></td>
                            </tr>
                            <tr>
                                <td><strong>Status:</strong></td>
                                <td>
                                    @if($department->is_active)
                                        <span class="badge bg-success">Active</span>
                                    @else
                                        <span class="badge bg-secondary">Inactive</span>
                                    @endif
                                </td>
                            </tr>
                        </table>
                    </div>
                    
                    <div class="col-md-6">
                        <h6 class="text-muted">Description</h6>
                        @if($department->description)
                            <p class="text-justify">{{ $department->description }}</p>
                        @else
                            <p class="text-muted">No description provided.</p>
                        @endif
                        
                        <h6 class="text-muted mt-4">Statistics</h6>
                        <div class="row">
                            <div class="col-6">
                                <div class="text-center p-2 bg-light rounded">
                                    <h5 class="text-info mb-0">{{ $facultyCount }}</h5>
                                    <small class="text-muted">Faculty</small>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="text-center p-2 bg-light rounded">
                                    <h5 class="text-success mb-0">{{ $courseCount }}</h5>
                                    <small class="text-muted">Courses</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="mt-4">
                    <h6 class="text-muted">Department Overview</h6>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="text-center p-3 bg-light rounded">
                                <h4 class="text-primary mb-1">{{ $facultyCount }}</h4>
                                <small class="text-muted">Faculty Members</small>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="text-center p-3 bg-light rounded">
                                <h4 class="text-success mb-1">{{ $courseCount }}</h4>
                                <small class="text-muted">Courses Offered</small>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="text-center p-3 bg-light rounded">
                                <h4 class="text-info mb-1">{{ $department->sort_order }}</h4>
                                <small class="text-muted">Sort Order</small>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="text-center p-3 bg-light rounded">
                                <h4 class="text-{{ $department->is_active ? 'success' : 'secondary' }} mb-1">
                                    {{ $department->is_active ? 'Active' : 'Inactive' }}
                                </h4>
                                <small class="text-muted">Status</small>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="mt-4 pt-3 border-top">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <small class="text-muted">
                                Created: {{ $department->created_at->format('M d, Y') }} | 
                                Updated: {{ $department->updated_at->format('M d, Y') }}
                            </small>
                        </div>
                        <div>
                            <a href="{{ route('admin.departments.edit', $department) }}" class="btn btn-primary btn-sm">
                                <i class="fas fa-edit me-1"></i>Edit Department
                            </a>
                            <a href="{{ route('admin.departments.index') }}" class="btn btn-secondary btn-sm">
                                <i class="fas fa-arrow-left me-1"></i>Back to List
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <h6 class="mb-0">Quick Actions</h6>
            </div>
            <div class="card-body">
                <div class="d-grid gap-2">
                    <a href="{{ route('admin.departments.edit', $department) }}" class="btn btn-outline-primary">
                        <i class="fas fa-edit me-2"></i>Edit Department
                    </a>
                    <button type="button" class="btn btn-outline-info" onclick="window.print()">
                        <i class="fas fa-print me-2"></i>Print Details
                    </button>
                    @if($facultyCount == 0 && $courseCount == 0)
                    <form action="{{ route('admin.departments.destroy', $department) }}" method="POST" 
                          onsubmit="return confirm('Are you sure you want to delete this department? This action cannot be undone.')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger w-100">
                            <i class="fas fa-trash me-2"></i>Delete Department
                        </button>
                    </form>
                    @else
                    <button type="button" class="btn btn-outline-danger w-100" disabled title="Cannot delete - department is in use">
                        <i class="fas fa-trash me-2"></i>Delete Department
                    </button>
                    @endif
                </div>
            </div>
        </div>
        
        <div class="card mt-3">
            <div class="card-header">
                <h6 class="mb-0">Usage Information</h6>
            </div>
            <div class="card-body">
                @if($facultyCount > 0 || $courseCount > 0)
                <div class="alert alert-info mb-0">
                    <small>
                        This department has <strong>{{ $facultyCount }}</strong> faculty members 
                        and <strong>{{ $courseCount }}</strong> courses associated with it.
                    </small>
                </div>
                @else
                <div class="alert alert-warning mb-0">
                    <small>
                        This department has no faculty or courses assigned to it.
                        It can be safely deleted if no longer needed.
                    </small>
                </div>
                @endif
            </div>
        </div>
        
        @if($department->head_of_department)
        <div class="card mt-3">
            <div class="card-header">
                <h6 class="mb-0">Department Head</h6>
            </div>
            <div class="card-body">
                <div class="text-center">
                    <i class="fas fa-user-tie fa-2x text-primary mb-2"></i>
                    <h6 class="mb-0">{{ $department->head_of_department }}</h6>
                    <small class="text-muted">Head of Department</small>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection

@push('styles')
<style>
    .table-borderless td {
        border: none;
        padding: 0.5rem 0;
    }
    
    @media print {
        .btn, .card-header, .quick-actions {
            display: none !important;
        }
    }
</style>
@endpush
