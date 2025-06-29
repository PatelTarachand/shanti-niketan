@extends('admin.layouts.app')

@section('title', 'Application Details - ' . $application->application_number)

@section('content')
<div class="container-fluid">
    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3 mb-0 text-gray-800">Application Details</h1>
            <p class="text-muted">Application Number: <strong>{{ $application->application_number }}</strong></p>
        </div>
        <div class="d-flex gap-2">
            <a href="{{ route('admin.applications.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left me-2"></i>Back to Applications
            </a>
            <div class="btn-group">
                <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown">
                    <i class="fas fa-edit me-2"></i>Update Status
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#" onclick="updateStatus('under_review')">
                        <i class="fas fa-search text-info me-2"></i>Mark Under Review
                    </a></li>
                    <li><a class="dropdown-item" href="#" onclick="updateStatus('approved')">
                        <i class="fas fa-check text-success me-2"></i>Approve
                    </a></li>
                    <li><a class="dropdown-item" href="#" onclick="updateStatus('rejected')">
                        <i class="fas fa-times text-danger me-2"></i>Reject
                    </a></li>
                    <li><a class="dropdown-item" href="#" onclick="updateStatus('waitlisted')">
                        <i class="fas fa-pause text-secondary me-2"></i>Waitlist
                    </a></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <!-- Personal Information -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Personal Information</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label text-muted">Full Name</label>
                            <p class="fw-bold">{{ $application->name }}</p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label text-muted">Email Address</label>
                            <p class="fw-bold">
                                <a href="mailto:{{ $application->email }}">{{ $application->email }}</a>
                            </p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label text-muted">Phone Number</label>
                            <p class="fw-bold">
                                @if($application->phone)
                                    <a href="tel:{{ $application->phone }}">{{ $application->phone }}</a>
                                @else
                                    <span class="text-muted">Not provided</span>
                                @endif
                            </p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label text-muted">Date of Birth</label>
                            <p class="fw-bold">
                                @if($application->date_of_birth)
                                    {{ $application->date_of_birth->format('M d, Y') }}
                                    @if($application->age)
                                        <small class="text-muted">({{ $application->age }} years old)</small>
                                    @endif
                                @else
                                    <span class="text-muted">Not provided</span>
                                @endif
                            </p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label text-muted">Gender</label>
                            <p class="fw-bold">
                                @if($application->gender)
                                    {{ ucfirst($application->gender) }}
                                @else
                                    <span class="text-muted">Not provided</span>
                                @endif
                            </p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label text-muted">Category</label>
                            <p class="fw-bold">
                                @if($application->category)
                                    {{ strtoupper($application->category) }}
                                @else
                                    <span class="text-muted">Not provided</span>
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Family Information -->
            @if($application->father_name || $application->mother_name || $application->guardian_phone)
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Family Information</h6>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label text-muted">Father's Name</label>
                                <p class="fw-bold">{{ $application->father_name ?: 'Not provided' }}</p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label text-muted">Mother's Name</label>
                                <p class="fw-bold">{{ $application->mother_name ?: 'Not provided' }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label text-muted">Guardian Phone</label>
                                <p class="fw-bold">
                                    @if($application->guardian_phone)
                                        <a href="tel:{{ $application->guardian_phone }}">{{ $application->guardian_phone }}</a>
                                    @else
                                        <span class="text-muted">Not provided</span>
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            <!-- Address Information -->
            @if($application->address || $application->city || $application->state || $application->pincode)
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Address Information</h6>
                    </div>
                    <div class="card-body">
                        @if($application->address)
                            <div class="mb-3">
                                <label class="form-label text-muted">Address</label>
                                <p class="fw-bold">{{ $application->address }}</p>
                            </div>
                        @endif
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label class="form-label text-muted">City</label>
                                <p class="fw-bold">{{ $application->city ?: 'Not provided' }}</p>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label text-muted">State</label>
                                <p class="fw-bold">{{ $application->state ?: 'Not provided' }}</p>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label text-muted">PIN Code</label>
                                <p class="fw-bold">{{ $application->pincode ?: 'Not provided' }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            <!-- Course Information -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Course Information</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label text-muted">Course Applied For</label>
                            <p class="fw-bold">{{ $application->course }}</p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label text-muted">Branch/Specialization</label>
                            <p class="fw-bold">{{ $application->branch ?: 'Not specified' }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Previous Education -->
            @if($application->previous_qualification || $application->previous_marks || $application->previous_school_college)
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Previous Education</h6>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label text-muted">Previous Qualification</label>
                                <p class="fw-bold">{{ $application->previous_qualification ?: 'Not provided' }}</p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label text-muted">Passing Year</label>
                                <p class="fw-bold">{{ $application->previous_passing_year ?: 'Not provided' }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label text-muted">Marks Obtained</label>
                                <p class="fw-bold">
                                    @if($application->previous_marks)
                                        {{ $application->previous_marks }}
                                        @if($application->previous_percentage)
                                            ({{ $application->previous_percentage }}%)
                                        @endif
                                    @else
                                        <span class="text-muted">Not provided</span>
                                    @endif
                                </p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label text-muted">School/College</label>
                                <p class="fw-bold">{{ $application->previous_school_college ?: 'Not provided' }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>

        <div class="col-lg-4">
            <!-- Application Status -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Application Status</h6>
                </div>
                <div class="card-body text-center">
                    <div class="mb-3">
                        <span class="badge {{ $application->status_badge }} fs-6 px-3 py-2">
                            {{ $application->status_text }}
                        </span>
                    </div>
                    
                    <div class="application-timeline">
                        <div class="timeline-item">
                            <i class="fas fa-file-alt text-primary"></i>
                            <div>
                                <strong>Application Submitted</strong>
                                <br>
                                <small class="text-muted">{{ $application->submitted_at ? $application->submitted_at->format('M d, Y h:i A') : $application->created_at->format('M d, Y h:i A') }}</small>
                            </div>
                        </div>
                        
                        @if($application->reviewed_at)
                            <div class="timeline-item">
                                <i class="fas fa-user-check text-info"></i>
                                <div>
                                    <strong>Last Reviewed</strong>
                                    <br>
                                    <small class="text-muted">{{ $application->reviewed_at->format('M d, Y h:i A') }}</small>
                                    @if($application->reviewer)
                                        <br><small class="text-muted">by {{ $application->reviewer->name }}</small>
                                    @endif
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Application Details -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Application Details</h6>
                </div>
                <div class="card-body">
                    <div class="detail-item d-flex justify-content-between mb-2">
                        <span class="text-muted">Application Number:</span>
                        <strong>{{ $application->application_number }}</strong>
                    </div>
                    <div class="detail-item d-flex justify-content-between mb-2">
                        <span class="text-muted">Applied Date:</span>
                        <strong>{{ $application->created_at->format('M d, Y') }}</strong>
                    </div>
                    <div class="detail-item d-flex justify-content-between mb-2">
                        <span class="text-muted">Days Since Applied:</span>
                        <strong>{{ $application->days_submitted ?: 0 }} days</strong>
                    </div>
                    @if($application->application_fee_paid)
                        <div class="detail-item d-flex justify-content-between mb-2">
                            <span class="text-muted">Application Fee:</span>
                            <strong class="text-success">
                                ₹{{ number_format($application->application_fee_amount, 2) }} Paid
                            </strong>
                        </div>
                        @if($application->payment_reference)
                            <div class="detail-item d-flex justify-content-between mb-2">
                                <span class="text-muted">Payment Reference:</span>
                                <strong>{{ $application->payment_reference }}</strong>
                            </div>
                        @endif
                    @else
                        <div class="detail-item d-flex justify-content-between mb-2">
                            <span class="text-muted">Application Fee:</span>
                            <strong class="text-warning">Pending</strong>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Remarks -->
            @if($application->remarks)
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Remarks</h6>
                    </div>
                    <div class="card-body">
                        <p class="mb-0">{{ $application->remarks }}</p>
                    </div>
                </div>
            @endif

            <!-- Quick Actions -->
            <div class="card shadow">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Quick Actions</h6>
                </div>
                <div class="card-body">
                    <div class="d-grid gap-2">
                        <a href="mailto:{{ $application->email }}" class="btn btn-outline-primary">
                            <i class="fas fa-envelope me-2"></i>Send Email
                        </a>
                        @if($application->phone)
                            <a href="tel:{{ $application->phone }}" class="btn btn-outline-success">
                                <i class="fas fa-phone me-2"></i>Call Student
                            </a>
                        @endif
                        <button type="button" class="btn btn-outline-warning" onclick="updateStatus('under_review')">
                            <i class="fas fa-search me-2"></i>Mark Under Review
                        </button>
                        <button type="button" class="btn btn-outline-success" onclick="updateStatus('approved')">
                            <i class="fas fa-check me-2"></i>Approve Application
                        </button>
                        <button type="button" class="btn btn-outline-danger" onclick="updateStatus('rejected')">
                            <i class="fas fa-times me-2"></i>Reject Application
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Status Update Modal -->
<div class="modal fade" id="statusModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('admin.applications.status', $application) }}" method="POST">
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
                                  placeholder="Add remarks for this status change...">{{ $application->remarks }}</textarea>
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
.detail-item {
    padding: 5px 0;
    border-bottom: 1px solid #f0f0f0;
    font-size: 0.9rem;
}

.detail-item:last-child {
    border-bottom: none;
}

.application-timeline {
    text-align: left;
}

.timeline-item {
    display: flex;
    align-items-start;
    margin-bottom: 1rem;
    padding: 0.5rem;
    background: #f8f9fa;
    border-radius: 0.5rem;
}

.timeline-item i {
    margin-right: 0.75rem;
    margin-top: 0.25rem;
    font-size: 1.1rem;
}

.timeline-item:last-child {
    margin-bottom: 0;
}

.card {
    border: none;
    box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.15) !important;
}

.badge.fs-6 {
    font-size: 1rem !important;
}
</style>
@endpush

@push('scripts')
<script>
function updateStatus(status) {
    document.getElementById('status_value').value = status;
    const modal = new bootstrap.Modal(document.getElementById('statusModal'));
    modal.show();
}
</script>
@endpush
