@extends('admin.layouts.app')

@section('title', 'Applications Management')

@section('content')
<div class="container-fluid">
    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3 mb-0 text-gray-800">Applications Management</h1>
            <p class="text-muted">Manage admission applications and review student submissions</p>
        </div>
        <div class="d-flex gap-2">
            <a href="{{ route('admin.applications.export') }}{{ request()->getQueryString() ? '?' . request()->getQueryString() : '' }}" 
               class="btn btn-success">
                <i class="fas fa-download me-2"></i>Export CSV
            </a>
        </div>
    </div>

    <!-- Statistics Cards -->
    <div class="row mb-4">
        <div class="col-xl-2 col-md-4 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $stats['total'] }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-file-alt fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-2 col-md-4 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Pending</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $stats['pending'] }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clock fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-2 col-md-4 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Under Review</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $stats['under_review'] }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-search fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-2 col-md-4 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Approved</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $stats['approved'] }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-check-circle fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-2 col-md-4 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Rejected</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $stats['rejected'] }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-times-circle fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-2 col-md-4 mb-4">
            <div class="card border-left-secondary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">Waitlisted</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $stats['waitlisted'] }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-pause-circle fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Filters -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Search & Filter Applications</h6>
        </div>
        <div class="card-body">
            <form method="GET" action="{{ route('admin.applications.index') }}">
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <label for="search" class="form-label">Search</label>
                        <input type="text" class="form-control" id="search" name="search" 
                               value="{{ request('search') }}" placeholder="Name, email, phone, app number...">
                    </div>
                    <div class="col-md-2 mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-select" id="status" name="status">
                            <option value="">All Status</option>
                            @foreach($statuses as $key => $label)
                                <option value="{{ $key }}" {{ request('status') == $key ? 'selected' : '' }}>{{ $label }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2 mb-3">
                        <label for="course" class="form-label">Course</label>
                        <select class="form-select" id="course" name="course">
                            <option value="">All Courses</option>
                            @foreach($courses as $course)
                                <option value="{{ $course }}" {{ request('course') == $course ? 'selected' : '' }}>{{ $course }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2 mb-3">
                        <label for="date_from" class="form-label">From Date</label>
                        <input type="date" class="form-control" id="date_from" name="date_from" value="{{ request('date_from') }}">
                    </div>
                    <div class="col-md-2 mb-3">
                        <label for="date_to" class="form-label">To Date</label>
                        <input type="date" class="form-control" id="date_to" name="date_to" value="{{ request('date_to') }}">
                    </div>
                    <div class="col-md-1 mb-3">
                        <label class="form-label">&nbsp;</label>
                        <div class="d-flex flex-column gap-2">
                            <button type="submit" class="btn btn-primary btn-sm">
                                <i class="fas fa-search"></i>
                            </button>
                            <a href="{{ route('admin.applications.index') }}" class="btn btn-outline-secondary btn-sm">
                                <i class="fas fa-times"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Applications Table -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Applications Directory</h6>
            @if($applications->count() > 0)
                <div class="d-flex gap-2">
                    <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#bulkActionModal">
                        <i class="fas fa-tasks me-1"></i>Bulk Actions
                    </button>
                </div>
            @endif
        </div>
        <div class="card-body">
            @if($applications->count() > 0)
                <div class="table-responsive">
                    <table class="table table-bordered" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th width="30">
                                    <input type="checkbox" id="selectAll" class="form-check-input">
                                </th>
                                <th>App Number</th>
                                <th>Student Details</th>
                                <th>Course</th>
                                <th>Applied Date</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($applications as $application)
                                <tr>
                                    <td>
                                        <input type="checkbox" name="selected_applications[]" 
                                               value="{{ $application->id }}" class="form-check-input application-checkbox">
                                    </td>
                                    <td>
                                        <strong>{{ $application->application_number }}</strong>
                                        @if($application->days_submitted <= 1)
                                            <span class="badge bg-info ms-1">New</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div>
                                            <strong>{{ $application->name }}</strong>
                                            <br>
                                            <small class="text-muted">{{ $application->email }}</small>
                                            <br>
                                            <small class="text-muted">{{ $application->phone }}</small>
                                        </div>
                                    </td>
                                    <td>
                                        {{ $application->course }}
                                        @if($application->branch)
                                            <br><small class="text-muted">{{ $application->branch }}</small>
                                        @endif
                                    </td>
                                    <td>
                                        {{ $application->created_at->format('M d, Y') }}
                                        <br>
                                        <small class="text-muted">{{ $application->created_at->format('h:i A') }}</small>
                                        @if($application->days_submitted)
                                            <br><small class="text-muted">{{ $application->days_submitted }} days ago</small>
                                        @endif
                                    </td>
                                    <td>
                                        <span class="badge {{ $application->status_badge }}">
                                            {{ $application->status_text }}
                                        </span>
                                        @if($application->reviewed_at)
                                            <br><small class="text-muted">
                                                Reviewed {{ $application->reviewed_at->diffForHumans() }}
                                            </small>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('admin.applications.show', $application) }}" 
                                               class="btn btn-sm btn-info" title="View Details">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <div class="btn-group" role="group">
                                                <button type="button" class="btn btn-sm btn-warning dropdown-toggle" 
                                                        data-bs-toggle="dropdown" title="Change Status">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li><a class="dropdown-item" href="#" onclick="updateStatus({{ $application->id }}, 'under_review')">
                                                        <i class="fas fa-search text-info me-2"></i>Mark Under Review
                                                    </a></li>
                                                    <li><a class="dropdown-item" href="#" onclick="updateStatus({{ $application->id }}, 'approved')">
                                                        <i class="fas fa-check text-success me-2"></i>Approve
                                                    </a></li>
                                                    <li><a class="dropdown-item" href="#" onclick="updateStatus({{ $application->id }}, 'rejected')">
                                                        <i class="fas fa-times text-danger me-2"></i>Reject
                                                    </a></li>
                                                    <li><a class="dropdown-item" href="#" onclick="updateStatus({{ $application->id }}, 'waitlisted')">
                                                        <i class="fas fa-pause text-secondary me-2"></i>Waitlist
                                                    </a></li>
                                                </ul>
                                            </div>
                                            <form action="{{ route('admin.applications.destroy', $application) }}" 
                                                  method="POST" class="d-inline"
                                                  onsubmit="return confirm('Are you sure you want to delete this application?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" title="Delete">
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
                    {{ $applications->appends(request()->query())->links() }}
                </div>
            @else
                <div class="text-center py-5">
                    <i class="fas fa-file-alt fa-3x text-muted mb-3"></i>
                    <h5>No Applications Found</h5>
                    <p class="text-muted">
                        @if(request()->hasAny(['search', 'status', 'course', 'date_from', 'date_to']))
                            No applications match your current filters. <a href="{{ route('admin.applications.index') }}">Clear filters</a>
                        @else
                            No applications have been submitted yet.
                        @endif
                    </p>
                </div>
            @endif
        </div>
    </div>
</div>

<!-- Bulk Action Modal -->
<div class="modal fade" id="bulkActionModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('admin.applications.bulk-action') }}" method="POST" id="bulkActionForm">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Bulk Actions</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="bulk_action" class="form-label">Select Action</label>
                        <select class="form-select" id="bulk_action" name="action" required>
                            <option value="">Choose action...</option>
                            <option value="mark_under_review">Mark as Under Review</option>
                            <option value="approve">Approve Applications</option>
                            <option value="reject">Reject Applications</option>
                            <option value="delete">Delete Applications</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="bulk_remarks" class="form-label">Remarks (Optional)</label>
                        <textarea class="form-control" id="bulk_remarks" name="remarks" rows="3" 
                                  placeholder="Add remarks for this action..."></textarea>
                    </div>
                    <div class="alert alert-info">
                        <i class="fas fa-info-circle me-2"></i>
                        <span id="selectedCount">0</span> applications selected
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Execute Action</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Status Update Modal -->
<div class="modal fade" id="statusModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="statusForm" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Update Application Status</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="status_value" name="status">
                    <div class="mb-3">
                        <label for="status_remarks" class="form-label">Remarks</label>
                        <textarea class="form-control" id="status_remarks" name="remarks" rows="3" 
                                  placeholder="Add remarks for this status change..."></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Update Status</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
.border-left-primary {
    border-left: 0.25rem solid #4e73df !important;
}

.border-left-success {
    border-left: 0.25rem solid #1cc88a !important;
}

.border-left-info {
    border-left: 0.25rem solid #36b9cc !important;
}

.border-left-warning {
    border-left: 0.25rem solid #f6c23e !important;
}

.border-left-danger {
    border-left: 0.25rem solid #e74a3b !important;
}

.border-left-secondary {
    border-left: 0.25rem solid #858796 !important;
}

.table td {
    vertical-align: middle;
}

.btn-group .btn {
    margin-right: 2px;
}

.btn-group .btn:last-child {
    margin-right: 0;
}
</style>
@endpush

@push('scripts')
<script>
// Select All functionality
document.getElementById('selectAll').addEventListener('change', function() {
    const checkboxes = document.querySelectorAll('.application-checkbox');
    checkboxes.forEach(checkbox => {
        checkbox.checked = this.checked;
    });
    updateSelectedCount();
});

// Update selected count
function updateSelectedCount() {
    const selected = document.querySelectorAll('.application-checkbox:checked').length;
    document.getElementById('selectedCount').textContent = selected;
}

// Listen for individual checkbox changes
document.querySelectorAll('.application-checkbox').forEach(checkbox => {
    checkbox.addEventListener('change', updateSelectedCount);
});

// Bulk action form submission
document.getElementById('bulkActionForm').addEventListener('submit', function(e) {
    const selected = document.querySelectorAll('.application-checkbox:checked');
    if (selected.length === 0) {
        e.preventDefault();
        alert('Please select at least one application.');
        return;
    }
    
    // Add selected IDs to form
    selected.forEach(checkbox => {
        const input = document.createElement('input');
        input.type = 'hidden';
        input.name = 'applications[]';
        input.value = checkbox.value;
        this.appendChild(input);
    });
});

// Status update function
function updateStatus(applicationId, status) {
    document.getElementById('status_value').value = status;
    document.getElementById('statusForm').action = `/admin/applications/${applicationId}/status`;
    
    const modal = new bootstrap.Modal(document.getElementById('statusModal'));
    modal.show();
}

// Initialize selected count
updateSelectedCount();
</script>
@endpush
