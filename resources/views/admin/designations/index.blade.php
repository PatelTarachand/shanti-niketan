@extends('admin.layouts.app')

@section('title', 'Manage Designations')
@section('page-title', 'Designation Management')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="mb-0">All Designations</h4>
    <a href="{{ route('admin.designations.create') }}" class="btn btn-primary">
        <i class="fas fa-plus me-2"></i>Add New Designation
    </a>
</div>

<!-- Designations Table -->
<div class="card">
    <div class="card-body">
        @if($designations->count() > 0)
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Designation</th>
                            <th>Description</th>
                            <th>Faculty Count</th>
                            <th>Sort Order</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($designations as $designation)
                        <tr>
                            <td>
                                <strong>{{ $designation->name }}</strong>
                            </td>
                            <td>
                                {{ Str::limit($designation->description, 50) ?? 'No description' }}
                            </td>
                            <td>
                                <span class="badge bg-info">{{ $designation->faculty()->count() }}</span>
                            </td>
                            <td>
                                <span class="badge bg-secondary">{{ $designation->sort_order }}</span>
                            </td>
                            <td>
                                @if($designation->is_active)
                                    <span class="badge bg-success">Active</span>
                                @else
                                    <span class="badge bg-secondary">Inactive</span>
                                @endif
                            </td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="{{ route('admin.designations.show', $designation) }}" class="btn btn-sm btn-outline-info" title="View">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.designations.edit', $designation) }}" class="btn btn-sm btn-outline-primary" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('admin.designations.destroy', $designation) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this designation?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger" title="Delete">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
            <!-- Pagination -->
            <div class="d-flex justify-content-center mt-4">
                {{ $designations->links() }}
            </div>
        @else
            <div class="text-center py-5">
                <i class="fas fa-user-tie fa-3x text-muted mb-3"></i>
                <h5>No Designations Found</h5>
                <p class="text-muted">Start by creating your first designation.</p>
                <a href="{{ route('admin.designations.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus me-2"></i>Create Designation
                </a>
            </div>
        @endif
    </div>
</div>

<!-- Quick Stats -->
@if($designations->count() > 0)
<div class="row mt-4">
    <div class="col-md-3">
        <div class="card text-center">
            <div class="card-body">
                <h4 class="text-primary">{{ $designations->total() }}</h4>
                <small class="text-muted">Total Designations</small>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-center">
            <div class="card-body">
                <h4 class="text-success">{{ $designations->where('is_active', true)->count() }}</h4>
                <small class="text-muted">Active Designations</small>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-center">
            <div class="card-body">
                <h4 class="text-info">{{ $designations->sum(function($d) { return $d->faculty()->count(); }) }}</h4>
                <small class="text-muted">Total Faculty</small>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-center">
            <div class="card-body">
                <h4 class="text-warning">{{ $designations->where('is_active', false)->count() }}</h4>
                <small class="text-muted">Inactive</small>
            </div>
        </div>
    </div>
</div>
@endif
@endsection
