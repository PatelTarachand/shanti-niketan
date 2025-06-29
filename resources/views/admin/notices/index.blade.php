@extends('admin.layouts.app')

@section('title', 'Manage Notices')
@section('page-title', 'Notice Management')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="mb-0">All Notices</h4>
    <a href="{{ route('admin.notices.create') }}" class="btn btn-primary">
        <i class="fas fa-plus me-2"></i>Add New Notice
    </a>
</div>

<!-- Filters -->
<div class="card mb-4">
    <div class="card-body">
        <form method="GET" action="{{ route('admin.notices.index') }}">
            <div class="row">
                <div class="col-md-3">
                    <select name="category" class="form-select">
                        <option value="">All Categories</option>
                        <option value="academic" {{ request('category') == 'academic' ? 'selected' : '' }}>Academic</option>
                        <option value="examination" {{ request('category') == 'examination' ? 'selected' : '' }}>Examination</option>
                        <option value="admission" {{ request('category') == 'admission' ? 'selected' : '' }}>Admission</option>
                        <option value="events" {{ request('category') == 'events' ? 'selected' : '' }}>Events</option>
                        <option value="placement" {{ request('category') == 'placement' ? 'selected' : '' }}>Placement</option>
                        <option value="general" {{ request('category') == 'general' ? 'selected' : '' }}>General</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <select name="priority" class="form-select">
                        <option value="">All Priorities</option>
                        <option value="high" {{ request('priority') == 'high' ? 'selected' : '' }}>High</option>
                        <option value="normal" {{ request('priority') == 'normal' ? 'selected' : '' }}>Normal</option>
                        <option value="low" {{ request('priority') == 'low' ? 'selected' : '' }}>Low</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <select name="status" class="form-select">
                        <option value="">All Status</option>
                        <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>Active</option>
                        <option value="inactive" {{ request('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <button type="submit" class="btn btn-outline-primary me-2">Filter</button>
                    <a href="{{ route('admin.notices.index') }}" class="btn btn-outline-secondary">Clear</a>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Notices Table -->
<div class="card">
    <div class="card-body">
        @if($notices->count() > 0)
            <div class="table-responsive">
                <table class="table table-hover data-table">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Priority</th>
                            <th>Status</th>
                            <th>Publish Date</th>
                            <th>Created By</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($notices as $notice)
                        <tr>
                            <td>
                                <strong>{{ Str::limit($notice->title, 50) }}</strong>
                                @if($notice->attachment)
                                    <br><small class="text-muted">
                                        <i class="fas fa-paperclip me-1"></i>Has Attachment
                                    </small>
                                @endif
                            </td>
                            <td>
                                <span class="badge bg-{{ $notice->category === 'examination' ? 'danger' : ($notice->category === 'admission' ? 'success' : ($notice->category === 'events' ? 'info' : 'secondary')) }}">
                                    {{ ucfirst($notice->category) }}
                                </span>
                            </td>
                            <td>
                                <span class="badge bg-{{ $notice->priority === 'high' ? 'danger' : ($notice->priority === 'normal' ? 'warning' : 'secondary') }}">
                                    {{ ucfirst($notice->priority) }}
                                </span>
                            </td>
                            <td>
                                @if($notice->is_active)
                                    <span class="badge bg-success">Active</span>
                                @else
                                    <span class="badge bg-secondary">Inactive</span>
                                @endif
                            </td>
                            <td>{{ $notice->publish_date->format('M d, Y') }}</td>
                            <td>{{ $notice->admin->name }}</td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="{{ route('admin.notices.show', $notice) }}" class="btn btn-sm btn-outline-info" title="View">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.notices.edit', $notice) }}" class="btn btn-sm btn-outline-primary" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('admin.notices.destroy', $notice) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this notice?')">
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
                {{ $notices->links() }}
            </div>
        @else
            <div class="text-center py-5">
                <i class="fas fa-bullhorn fa-3x text-muted mb-3"></i>
                <h5>No Notices Found</h5>
                <p class="text-muted">Start by creating your first notice.</p>
                <a href="{{ route('admin.notices.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus me-2"></i>Create Notice
                </a>
            </div>
        @endif
    </div>
</div>
@endsection
