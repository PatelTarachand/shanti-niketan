@extends('admin.layouts.app')

@section('title', 'Admin Dashboard')
@section('page-title', 'Dashboard')

@section('content')
<!-- Stats Cards -->
<div class="row mb-4">
    <div class="col-lg-3 col-md-6 mb-4">
        <div class="stats-card">
            <div class="d-flex align-items-center">
                <div class="stats-icon bg-primary me-3">
                    <i class="fas fa-bullhorn"></i>
                </div>
                <div>
                    <h3 class="mb-0">{{ $stats['total_notices'] }}</h3>
                    <p class="text-muted mb-0">Total Notices</p>
                    <small class="text-success">{{ $stats['active_notices'] }} Active</small>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6 mb-4">
        <div class="stats-card">
            <div class="d-flex align-items-center">
                <div class="stats-icon bg-success me-3">
                    <i class="fas fa-chalkboard-teacher"></i>
                </div>
                <div>
                    <h3 class="mb-0">{{ $stats['total_faculty'] }}</h3>
                    <p class="text-muted mb-0">Faculty Members</p>
                    <small class="text-success">{{ $stats['active_faculty'] }} Active</small>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6 mb-4">
        <div class="stats-card">
            <div class="d-flex align-items-center">
                <div class="stats-icon bg-info me-3">
                    <i class="fas fa-images"></i>
                </div>
                <div>
                    <h3 class="mb-0">{{ $stats['total_gallery'] }}</h3>
                    <p class="text-muted mb-0">Gallery Items</p>
                    <small class="text-success">{{ $stats['active_gallery'] }} Active</small>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6 mb-4">
        <div class="stats-card">
            <div class="d-flex align-items-center">
                <div class="stats-icon bg-info me-3">
                    <i class="fas fa-user-graduate"></i>
                </div>
                <div>
                    <h3 class="mb-0">{{ $stats['total_alumni'] }}</h3>
                    <p class="text-muted mb-0">Alumni</p>
                    <small class="text-success">{{ $stats['active_alumni'] }} Active</small>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Second Row Stats -->
<div class="row mb-4">
    <div class="col-lg-3 col-md-6 mb-4">
        <div class="stats-card">
            <div class="d-flex align-items-center">
                <div class="stats-icon bg-warning me-3">
                    <i class="fas fa-file-alt"></i>
                </div>
                <div>
                    <h3 class="mb-0">{{ $stats['total_applications'] }}</h3>
                    <p class="text-muted mb-0">Applications</p>
                    <small class="text-warning">{{ $stats['pending_applications'] }} Pending</small>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6 mb-4">
        <div class="stats-card">
            <div class="d-flex align-items-center">
                <div class="stats-icon bg-secondary me-3">
                    <i class="fas fa-user-shield"></i>
                </div>
                <div>
                    <h3 class="mb-0">{{ $stats['total_admins'] }}</h3>
                    <p class="text-muted mb-0">Admin Users</p>
                    <small class="text-success">{{ $stats['active_admins'] }} Active</small>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Quick Actions -->
<div class="row mb-4">
    <div class="col-12">
        <div class="stats-card">
            <h5 class="mb-3">Quick Actions</h5>
            <div class="row">
                <div class="col-lg-3 col-md-6 mb-3">
                    <a href="{{ route('admin.notices.create') }}" class="btn btn-primary w-100">
                        <i class="fas fa-plus me-2"></i>Add Notice
                    </a>
                </div>
                <div class="col-lg-3 col-md-6 mb-3">
                    <a href="{{ route('admin.faculty.create') }}" class="btn btn-success w-100">
                        <i class="fas fa-user-plus me-2"></i>Add Faculty
                    </a>
                </div>
                <div class="col-lg-3 col-md-6 mb-3">
                    <a href="{{ route('admin.gallery.create') }}" class="btn btn-info w-100">
                        <i class="fas fa-image me-2"></i>Add Gallery Item
                    </a>
                </div>
                <div class="col-lg-3 col-md-6 mb-3">
                    <a href="{{ route('admin.alumni.create') }}" class="btn btn-warning w-100">
                        <i class="fas fa-user-graduate me-2"></i>Add Alumni
                    </a>
                </div>
                <div class="col-lg-3 col-md-6 mb-3">
                    <a href="{{ route('admin.applications.index') }}" class="btn btn-info w-100">
                        <i class="fas fa-file-alt me-2"></i>View Applications
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6 mb-3">
                    <a href="{{ route('home') }}" target="_blank" class="btn btn-outline-primary w-100">
                        <i class="fas fa-external-link-alt me-2"></i>View Website
                    </a>
                </div>
                <div class="col-lg-3 col-md-6 mb-3">
                    <a href="{{ route('admin.alumni.index') }}" class="btn btn-outline-info w-100">
                        <i class="fas fa-users me-2"></i>Manage Alumni
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Recent Activity -->
<div class="row">
    <div class="col-lg-8 mb-4">
        <div class="stats-card">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h5 class="mb-0">Recent Notices</h5>
                <a href="{{ route('admin.notices.index') }}" class="btn btn-sm btn-outline-primary">View All</a>
            </div>

            @if($recent_notices->count() > 0)
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Status</th>
                                <th>Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($recent_notices as $notice)
                            <tr>
                                <td>
                                    <strong>{{ Str::limit($notice->title, 40) }}</strong>
                                    @if($notice->priority === 'high')
                                        <span class="badge bg-danger ms-2">High Priority</span>
                                    @endif
                                </td>
                                <td>
                                    <span class="badge bg-secondary">{{ ucfirst($notice->category) }}</span>
                                </td>
                                <td>
                                    @if($notice->is_active)
                                        <span class="badge bg-success">Active</span>
                                    @else
                                        <span class="badge bg-secondary">Inactive</span>
                                    @endif
                                </td>
                                <td>{{ $notice->publish_date->format('M d, Y') }}</td>
                                <td>
                                    <a href="{{ route('admin.notices.edit', $notice) }}" class="btn btn-sm btn-outline-primary">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="text-center py-4">
                    <i class="fas fa-bullhorn fa-3x text-muted mb-3"></i>
                    <p class="text-muted">No notices found. <a href="{{ route('admin.notices.create') }}">Create your first notice</a></p>
                </div>
            @endif
        </div>
    </div>

    <div class="col-lg-4 mb-4">
        <div class="stats-card">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h5 class="mb-0">Recent Faculty</h5>
                <a href="{{ route('admin.faculty.index') }}" class="btn btn-sm btn-outline-success">View All</a>
            </div>

            @if($recent_faculty->count() > 0)
                @foreach($recent_faculty as $faculty)
                <div class="d-flex align-items-center mb-3 pb-3 border-bottom">
                    <div class="me-3">
                        @if($faculty->image)
                            <img src="{{ Storage::url($faculty->image) }}" alt="{{ $faculty->name }}" class="rounded-circle" width="50" height="50">
                        @else
                            <div class="bg-secondary rounded-circle d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                                <i class="fas fa-user text-white"></i>
                            </div>
                        @endif
                    </div>
                    <div class="flex-grow-1">
                        <h6 class="mb-1">{{ $faculty->name }}</h6>
                        <p class="text-muted mb-0 small">{{ $faculty->designation }}</p>
                        <p class="text-muted mb-0 small">{{ $faculty->department }}</p>
                    </div>
                    <div>
                        @if($faculty->is_active)
                            <span class="badge bg-success">Active</span>
                        @else
                            <span class="badge bg-secondary">Inactive</span>
                        @endif
                    </div>
                </div>
                @endforeach
            @else
                <div class="text-center py-4">
                    <i class="fas fa-chalkboard-teacher fa-3x text-muted mb-3"></i>
                    <p class="text-muted">No faculty found. <a href="{{ route('admin.faculty.create') }}">Add faculty members</a></p>
                </div>
            @endif
        </div>
    </div>
</div>

<!-- System Information -->
<div class="row">
    <div class="col-12">
        <div class="stats-card">
            <h5 class="mb-3">System Information</h5>
            <div class="row">
                <div class="col-md-3">
                    <strong>College Name:</strong><br>
                    <span class="text-muted">Shantineketan College</span>
                </div>
                <div class="col-md-3">
                    <strong>Location:</strong><br>
                    <span class="text-muted">Raipur, Chhattisgarh</span>
                </div>
                <div class="col-md-3">
                    <strong>Established:</strong><br>
                    <span class="text-muted">2009</span>
                </div>
                <div class="col-md-3">
                    <strong>Admin Panel Version:</strong><br>
                    <span class="text-muted">v1.0.0</span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
