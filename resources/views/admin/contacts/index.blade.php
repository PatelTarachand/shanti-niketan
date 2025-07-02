@extends('admin.layouts.app')

@section('title', 'Contact Inquiries')

@section('content')
<div class="container-fluid">
    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3 mb-0 text-gray-800">Contact Inquiries</h1>
            <p class="text-muted">Manage customer inquiries and messages</p>
        </div>
    </div>

    <!-- Statistics Cards -->
    <div class="row mb-4">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Inquiries</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $stats['total'] }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-envelope fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">New Messages</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $stats['new'] }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-bell fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Replied</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $stats['replied'] }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-reply fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Resolved</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $stats['resolved'] }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-check-circle fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <!-- Filters -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Filters & Search</h6>
        </div>
        <div class="card-body">
            <form method="GET" action="{{ route('admin.contacts.index') }}">
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select name="status" id="status" class="form-control">
                            <option value="">All Statuses</option>
                            @foreach($statuses as $value => $label)
                                <option value="{{ $value }}" {{ request('status') == $value ? 'selected' : '' }}>
                                    {{ $label }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="course" class="form-label">Course</label>
                        <select name="course" id="course" class="form-control">
                            <option value="">All Courses</option>
                            @foreach($courses as $course)
                                <option value="{{ $course }}" {{ request('course') == $course ? 'selected' : '' }}>
                                    {{ $course }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="search" class="form-label">Search</label>
                        <input type="text" name="search" id="search" class="form-control" 
                               value="{{ request('search') }}" placeholder="Search by name, email, subject...">
                    </div>
                    <div class="col-md-2 mb-3">
                        <label class="form-label">&nbsp;</label>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-search me-1"></i>Filter
                            </button>
                        </div>
                    </div>
                </div>
                @if(request()->hasAny(['status', 'course', 'search']))
                    <div class="row">
                        <div class="col-12">
                            <a href="{{ route('admin.contacts.index') }}" class="btn btn-outline-secondary btn-sm">
                                <i class="fas fa-times me-1"></i>Clear Filters
                            </a>
                        </div>
                    </div>
                @endif
            </form>
        </div>
    </div>

    <!-- Contact Inquiries Table -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Contact Inquiries</h6>
            @if($contacts->count() > 0)
                <div class="dropdown">
                    <button class="btn btn-outline-primary btn-sm dropdown-toggle" type="button" 
                            data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-cog me-1"></i>Bulk Actions
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#" onclick="bulkAction('mark_read')">
                            <i class="fas fa-eye me-2"></i>Mark as Read</a></li>
                        <li><a class="dropdown-item" href="#" onclick="bulkAction('mark_replied')">
                            <i class="fas fa-reply me-2"></i>Mark as Replied</a></li>
                        <li><a class="dropdown-item" href="#" onclick="bulkAction('mark_resolved')">
                            <i class="fas fa-check-circle me-2"></i>Mark as Resolved</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item text-danger" href="#" onclick="bulkAction('delete')">
                            <i class="fas fa-trash me-2"></i>Delete Selected</a></li>
                    </ul>
                </div>
            @endif
        </div>
        <div class="card-body">
            @if($contacts->count() > 0)
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th width="30">
                                    <input type="checkbox" id="selectAll" class="form-check-input">
                                </th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Course</th>
                                <th>Subject</th>
                                <th>Status</th>
                                <th>Date</th>
                                <th width="120">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($contacts as $contact)
                                <tr class="{{ $contact->status === 'new' ? 'table-info' : '' }}">
                                    <td>
                                        <input type="checkbox" name="contact_ids[]" value="{{ $contact->id }}" 
                                               class="form-check-input contact-checkbox">
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            @if($contact->status === 'new')
                                                <span class="badge bg-primary me-2">NEW</span>
                                            @endif
                                            <strong>{{ $contact->name }}</strong>
                                        </div>
                                        <small class="text-muted">{{ $contact->phone }}</small>
                                    </td>
                                    <td>
                                        <a href="mailto:{{ $contact->email }}" class="text-decoration-none">
                                            {{ $contact->email }}
                                        </a>
                                    </td>
                                    <td>
                                        <span class="badge bg-secondary">{{ $contact->course }}</span>
                                    </td>
                                    <td>
                                        <div class="text-truncate" style="max-width: 200px;" title="{{ $contact->subject }}">
                                            {{ $contact->subject }}
                                        </div>
                                    </td>
                                    <td>{!! $contact->status_badge !!}</td>
                                    <td>
                                        <small>{{ $contact->formatted_created_at }}</small><br>
                                        <small class="text-muted">{{ $contact->time_ago }}</small>
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('admin.contacts.show', $contact) }}" 
                                               class="btn btn-outline-primary btn-sm" title="View Details">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <button type="button" class="btn btn-outline-danger btn-sm" 
                                                    onclick="deleteContact({{ $contact->id }})" title="Delete">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="d-flex justify-content-between align-items-center mt-3">
                    <div>
                        <small class="text-muted">
                            Showing {{ $contacts->firstItem() }} to {{ $contacts->lastItem() }} 
                            of {{ $contacts->total() }} results
                        </small>
                    </div>
                    <div>
                        {{ $contacts->appends(request()->query())->links() }}
                    </div>
                </div>
            @else
                <div class="text-center py-5">
                    <i class="fas fa-inbox fa-3x text-muted mb-3"></i>
                    <h5 class="text-muted">No Contact Inquiries Found</h5>
                    <p class="text-muted">
                        @if(request()->hasAny(['status', 'course', 'search']))
                            No inquiries match your current filters.
                        @else
                            No contact inquiries have been submitted yet.
                        @endif
                    </p>
                    @if(request()->hasAny(['status', 'course', 'search']))
                        <a href="{{ route('admin.contacts.index') }}" class="btn btn-outline-primary">
                            <i class="fas fa-times me-1"></i>Clear Filters
                        </a>
                    @endif
                </div>
            @endif
        </div>
    </div>
</div>

<!-- Bulk Action Form -->
<form id="bulkActionForm" method="POST" action="{{ route('admin.contacts.bulk-action') }}" style="display: none;">
    @csrf
    <input type="hidden" name="action" id="bulkActionType">
    <div id="bulkContactIds"></div>
</form>

<!-- Delete Form -->
<form id="deleteForm" method="POST" style="display: none;">
    @csrf
    @method('DELETE')
</form>
@endsection

@push('scripts')
<script>
$(document).ready(function() {
    // Select all checkbox functionality
    $('#selectAll').change(function() {
        $('.contact-checkbox').prop('checked', $(this).prop('checked'));
    });

    // Update select all when individual checkboxes change
    $('.contact-checkbox').change(function() {
        if ($('.contact-checkbox:checked').length === $('.contact-checkbox').length) {
            $('#selectAll').prop('checked', true);
        } else {
            $('#selectAll').prop('checked', false);
        }
    });
});

function bulkAction(action) {
    const checkedBoxes = $('.contact-checkbox:checked');
    
    if (checkedBoxes.length === 0) {
        alert('Please select at least one contact inquiry.');
        return;
    }

    let message = '';
    switch(action) {
        case 'mark_read':
            message = 'Mark selected inquiries as read?';
            break;
        case 'mark_replied':
            message = 'Mark selected inquiries as replied?';
            break;
        case 'mark_resolved':
            message = 'Mark selected inquiries as resolved?';
            break;
        case 'delete':
            message = 'Are you sure you want to delete the selected inquiries? This action cannot be undone.';
            break;
    }

    if (confirm(message)) {
        $('#bulkActionType').val(action);
        $('#bulkContactIds').empty();
        
        checkedBoxes.each(function() {
            $('#bulkContactIds').append('<input type="hidden" name="contact_ids[]" value="' + $(this).val() + '">');
        });
        
        $('#bulkActionForm').submit();
    }
}

function deleteContact(contactId) {
    if (confirm('Are you sure you want to delete this contact inquiry? This action cannot be undone.')) {
        $('#deleteForm').attr('action', '/admin/contacts/' + contactId);
        $('#deleteForm').submit();
    }
}
</script>
@endpush
