@extends('admin.layouts.app')

@section('title', 'Contact Inquiry Details')

@section('content')
<div class="container-fluid">
    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3 mb-0 text-gray-800">Contact Inquiry Details</h1>
            <p class="text-muted">Inquiry #{{ str_pad($contact->id, 4, '0', STR_PAD_LEFT) }}</p>
        </div>
        <a href="{{ route('admin.contacts.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left me-2"></i>Back to Inquiries
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="row">
        <!-- Contact Details -->
        <div class="col-lg-8">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-primary">Contact Information</h6>
                    <div>
                        {!! $contact->status_badge !!}
                        @if($contact->status === 'new')
                            <span class="badge bg-info ms-2">Just Viewed</span>
                        @endif
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Full Name:</label>
                            <p class="mb-0">{{ $contact->name }}</p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Email Address:</label>
                            <p class="mb-0">
                                <a href="mailto:{{ $contact->email }}" class="text-decoration-none">
                                    {{ $contact->email }}
                                </a>
                            </p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Phone Number:</label>
                            <p class="mb-0">
                                <a href="tel:{{ $contact->phone }}" class="text-decoration-none">
                                    {{ $contact->phone }}
                                </a>
                            </p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Course of Interest:</label>
                            <p class="mb-0">
                                <span class="badge bg-secondary">{{ $contact->course }}</span>
                            </p>
                        </div>
                        <div class="col-12 mb-3">
                            <label class="form-label fw-bold">Subject:</label>
                            <p class="mb-0">{{ $contact->subject }}</p>
                        </div>
                        <div class="col-12 mb-3">
                            <label class="form-label fw-bold">Message:</label>
                            <div class="bg-light p-3 rounded">
                                <p class="mb-0" style="white-space: pre-wrap;">{{ $contact->message }}</p>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Submitted On:</label>
                            <p class="mb-0">{{ $contact->formatted_created_at }}</p>
                            <small class="text-muted">{{ $contact->time_ago }}</small>
                        </div>
                        @if($contact->replied_at)
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Last Updated:</label>
                                <p class="mb-0">{{ $contact->replied_at->format('M d, Y \a\t h:i A') }}</p>
                                <small class="text-muted">{{ $contact->replied_at->diffForHumans() }}</small>
                            </div>
                        @endif
                    </div>

                    @if($contact->admin_notes)
                        <div class="mt-4">
                            <label class="form-label fw-bold">Admin Notes:</label>
                            <div class="bg-warning bg-opacity-10 p-3 rounded border-start border-warning border-4">
                                <p class="mb-0" style="white-space: pre-wrap;">{{ $contact->admin_notes }}</p>
                            </div>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Quick Actions</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <a href="mailto:{{ $contact->email }}?subject=Re: {{ $contact->subject }}" 
                               class="btn btn-success w-100">
                                <i class="fas fa-reply me-2"></i>Reply via Email
                            </a>
                        </div>
                        <div class="col-md-4 mb-3">
                            <a href="tel:{{ $contact->phone }}" class="btn btn-info w-100">
                                <i class="fas fa-phone me-2"></i>Call Now
                            </a>
                        </div>
                        <div class="col-md-4 mb-3">
                            <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $contact->phone) }}" 
                               target="_blank" class="btn btn-success w-100">
                                <i class="fab fa-whatsapp me-2"></i>WhatsApp
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Status Management -->
        <div class="col-lg-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Status Management</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.contacts.update-status', $contact) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        
                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select name="status" id="status" class="form-control" required>
                                <option value="new" {{ $contact->status === 'new' ? 'selected' : '' }}>New</option>
                                <option value="read" {{ $contact->status === 'read' ? 'selected' : '' }}>Read</option>
                                <option value="replied" {{ $contact->status === 'replied' ? 'selected' : '' }}>Replied</option>
                                <option value="resolved" {{ $contact->status === 'resolved' ? 'selected' : '' }}>Resolved</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="admin_notes" class="form-label">Admin Notes</label>
                            <textarea name="admin_notes" id="admin_notes" class="form-control" rows="4" 
                                      placeholder="Add notes about this inquiry...">{{ $contact->admin_notes }}</textarea>
                            <small class="form-text text-muted">
                                These notes are for internal use only and will not be visible to the customer.
                            </small>
                        </div>

                        <button type="submit" class="btn btn-primary w-100">
                            <i class="fas fa-save me-2"></i>Update Status
                        </button>
                    </form>
                </div>
            </div>

            <!-- Contact History -->
            @if($contact->replied_by)
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Contact History</h6>
                    </div>
                    <div class="card-body">
                        <div class="timeline">
                            <div class="timeline-item">
                                <div class="timeline-marker bg-primary"></div>
                                <div class="timeline-content">
                                    <h6 class="mb-1">Inquiry Submitted</h6>
                                    <p class="text-muted mb-0">{{ $contact->formatted_created_at }}</p>
                                </div>
                            </div>
                            
                            @if($contact->status !== 'new')
                                <div class="timeline-item">
                                    <div class="timeline-marker bg-info"></div>
                                    <div class="timeline-content">
                                        <h6 class="mb-1">Status: {{ ucfirst($contact->status) }}</h6>
                                        @if($contact->replied_at)
                                            <p class="text-muted mb-0">{{ $contact->replied_at->format('M d, Y \a\t h:i A') }}</p>
                                        @endif
                                        @if($contact->repliedBy)
                                            <small class="text-muted">by {{ $contact->repliedBy->name }}</small>
                                        @endif
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @endif

            <!-- Delete Action -->
            <div class="card shadow border-danger">
                <div class="card-header py-3 bg-danger text-white">
                    <h6 class="m-0 font-weight-bold">Danger Zone</h6>
                </div>
                <div class="card-body">
                    <p class="text-muted mb-3">
                        Delete this contact inquiry permanently. This action cannot be undone.
                    </p>
                    <button type="button" class="btn btn-danger w-100" onclick="deleteContact()">
                        <i class="fas fa-trash me-2"></i>Delete Inquiry
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Delete Form -->
<form id="deleteForm" method="POST" action="{{ route('admin.contacts.destroy', $contact) }}" style="display: none;">
    @csrf
    @method('DELETE')
</form>
@endsection

@push('styles')
<style>
.timeline {
    position: relative;
    padding-left: 30px;
}

.timeline::before {
    content: '';
    position: absolute;
    left: 15px;
    top: 0;
    bottom: 0;
    width: 2px;
    background: #e3e6f0;
}

.timeline-item {
    position: relative;
    margin-bottom: 20px;
}

.timeline-marker {
    position: absolute;
    left: -22px;
    top: 5px;
    width: 12px;
    height: 12px;
    border-radius: 50%;
    border: 2px solid #fff;
    box-shadow: 0 0 0 2px #e3e6f0;
}

.timeline-content {
    background: #f8f9fc;
    padding: 15px;
    border-radius: 8px;
    border-left: 3px solid #5a5c69;
}

.timeline-content h6 {
    color: #5a5c69;
    margin-bottom: 5px;
}
</style>
@endpush

@push('scripts')
<script>
function deleteContact() {
    if (confirm('Are you sure you want to delete this contact inquiry? This action cannot be undone.')) {
        $('#deleteForm').submit();
    }
}
</script>
@endpush
