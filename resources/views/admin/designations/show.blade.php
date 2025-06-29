@extends('admin.layouts.app')

@section('title', 'Designation Details')
@section('page-title', 'Designation Details')

@section('content')
<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">{{ $designation->name }}</h5>
                <div>
                    @if($designation->is_active)
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
                                <td><strong>Designation Name:</strong></td>
                                <td>{{ $designation->name }}</td>
                            </tr>
                            <tr>
                                <td><strong>Sort Order:</strong></td>
                                <td><span class="badge bg-secondary">{{ $designation->sort_order }}</span></td>
                            </tr>
                            <tr>
                                <td><strong>Status:</strong></td>
                                <td>
                                    @if($designation->is_active)
                                        <span class="badge bg-success">Active</span>
                                    @else
                                        <span class="badge bg-secondary">Inactive</span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td><strong>Faculty Count:</strong></td>
                                <td><span class="badge bg-info">{{ $facultyCount }}</span></td>
                            </tr>
                        </table>
                    </div>
                    
                    <div class="col-md-6">
                        <h6 class="text-muted">Description</h6>
                        @if($designation->description)
                            <p class="text-justify">{{ $designation->description }}</p>
                        @else
                            <p class="text-muted">No description provided.</p>
                        @endif
                    </div>
                </div>
                
                <div class="mt-4">
                    <h6 class="text-muted">Statistics</h6>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="text-center p-3 bg-light rounded">
                                <h4 class="text-primary mb-1">{{ $facultyCount }}</h4>
                                <small class="text-muted">Faculty Members</small>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="text-center p-3 bg-light rounded">
                                <h4 class="text-info mb-1">{{ $designation->sort_order }}</h4>
                                <small class="text-muted">Sort Order</small>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="text-center p-3 bg-light rounded">
                                <h4 class="text-{{ $designation->is_active ? 'success' : 'secondary' }} mb-1">
                                    {{ $designation->is_active ? 'Active' : 'Inactive' }}
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
                                Created: {{ $designation->created_at->format('M d, Y') }} | 
                                Updated: {{ $designation->updated_at->format('M d, Y') }}
                            </small>
                        </div>
                        <div>
                            <a href="{{ route('admin.designations.edit', $designation) }}" class="btn btn-primary btn-sm">
                                <i class="fas fa-edit me-1"></i>Edit Designation
                            </a>
                            <a href="{{ route('admin.designations.index') }}" class="btn btn-secondary btn-sm">
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
                    <a href="{{ route('admin.designations.edit', $designation) }}" class="btn btn-outline-primary">
                        <i class="fas fa-edit me-2"></i>Edit Designation
                    </a>
                    <button type="button" class="btn btn-outline-info" onclick="window.print()">
                        <i class="fas fa-print me-2"></i>Print Details
                    </button>
                    @if($facultyCount == 0)
                    <form action="{{ route('admin.designations.destroy', $designation) }}" method="POST" 
                          onsubmit="return confirm('Are you sure you want to delete this designation? This action cannot be undone.')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger w-100">
                            <i class="fas fa-trash me-2"></i>Delete Designation
                        </button>
                    </form>
                    @else
                    <button type="button" class="btn btn-outline-danger w-100" disabled title="Cannot delete - designation is in use">
                        <i class="fas fa-trash me-2"></i>Delete Designation
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
                @if($facultyCount > 0)
                <div class="alert alert-info mb-0">
                    <small>
                        <strong>{{ $facultyCount }}</strong> faculty members currently have this designation.
                        You can view them in the Faculty section.
                    </small>
                </div>
                @else
                <div class="alert alert-warning mb-0">
                    <small>
                        This designation is not currently assigned to any faculty members.
                        It can be safely deleted if no longer needed.
                    </small>
                </div>
                @endif
            </div>
        </div>
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
