@extends('admin.layouts.app')

@section('title', 'Manage Departments')
@section('page-title', 'Department Management')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="mb-0">All Departments</h4>
    <a href="{{ route('admin.departments.create') }}" class="btn btn-primary">
        <i class="fas fa-plus me-2"></i>Add New Department
    </a>
</div>

<!-- Departments Table -->
<div class="card">
    <div class="card-body">
        @if($departments->count() > 0)
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Department</th>
                            <th>Code</th>
                            <th>Head of Department</th>
                            <th>Faculty Count</th>
                            <th>Course Count</th>
                            <th>Sort Order</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($departments as $department)
                        <tr>
                            <td>
                                <div>
                                    <strong>{{ $department->name }}</strong>
                                    @if($department->description)
                                        <small class="text-muted d-block">{{ Str::limit($department->description, 40) }}</small>
                                    @endif
                                </div>
                            </td>
                            <td>
                                <span class="badge bg-primary">{{ $department->code }}</span>
                            </td>
                            <td>
                                {{ $department->head_of_department ?? 'Not assigned' }}
                            </td>
                            <td>
                                <span class="badge bg-info">{{ $department->faculty()->count() }}</span>
                            </td>
                            <td>
                                <span class="badge bg-success">{{ $department->courses()->count() }}</span>
                            </td>
                            <td>
                                <span class="badge bg-secondary">{{ $department->sort_order }}</span>
                            </td>
                            <td>
                                @if($department->is_active)
                                    <span class="badge bg-success">Active</span>
                                @else
                                    <span class="badge bg-secondary">Inactive</span>
                                @endif
                            </td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="{{ route('admin.departments.show', $department) }}" class="btn btn-sm btn-outline-info" title="View">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.departments.edit', $department) }}" class="btn btn-sm btn-outline-primary" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('admin.departments.destroy', $department) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this department?')">
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
                {{ $departments->links() }}
            </div>
        @else
            <div class="text-center py-5">
                <i class="fas fa-building fa-3x text-muted mb-3"></i>
                <h5>No Departments Found</h5>
                <p class="text-muted">Start by creating your first department.</p>
                <a href="{{ route('admin.departments.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus me-2"></i>Create Department
                </a>
            </div>
        @endif
    </div>
</div>

<!-- Quick Stats -->
@if($departments->count() > 0)
<div class="row mt-4">
    <div class="col-md-3">
        <div class="card text-center">
            <div class="card-body">
                <h4 class="text-primary">{{ $departments->total() }}</h4>
                <small class="text-muted">Total Departments</small>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-center">
            <div class="card-body">
                <h4 class="text-success">{{ $departments->where('is_active', true)->count() }}</h4>
                <small class="text-muted">Active Departments</small>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-center">
            <div class="card-body">
                <h4 class="text-info">{{ $departments->sum(function($d) { return $d->faculty()->count(); }) }}</h4>
                <small class="text-muted">Total Faculty</small>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-center">
            <div class="card-body">
                <h4 class="text-warning">{{ $departments->sum(function($d) { return $d->courses()->count(); }) }}</h4>
                <small class="text-muted">Total Courses</small>
            </div>
        </div>
    </div>
</div>
@endif
@endsection
