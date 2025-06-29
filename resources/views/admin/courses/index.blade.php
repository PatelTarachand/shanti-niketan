@extends('admin.layouts.app')

@section('title', 'Manage Courses')
@section('page-title', 'Course Management')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="mb-0">All Courses</h4>
    <a href="{{ route('admin.courses.create') }}" class="btn btn-primary">
        <i class="fas fa-plus me-2"></i>Add New Course
    </a>
</div>

<!-- Filters -->
<div class="card mb-4">
    <div class="card-body">
        <form method="GET" action="{{ route('admin.courses.index') }}">
            <div class="row">
                <div class="col-md-4">
                    <select name="department" class="form-select">
                        <option value="">All Departments</option>
                        @foreach(\App\Models\Department::active()->ordered()->get() as $department)
                            <option value="{{ $department->name }}" {{ request('department') == $department->name ? 'selected' : '' }}>
                                {{ $department->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <select name="status" class="form-select">
                        <option value="">All Status</option>
                        <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>Active</option>
                        <option value="inactive" {{ request('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <button type="submit" class="btn btn-outline-primary me-2">Filter</button>
                    <a href="{{ route('admin.courses.index') }}" class="btn btn-outline-secondary">Clear</a>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Courses Table -->
<div class="card">
    <div class="card-body">
        @if($courses->count() > 0)
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Course</th>
                            <th>Department</th>
                            <th>Duration</th>
                            <th>Fees</th>
                            <th>Seats</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($courses as $course)
                        <tr>
                            <td>
                                <div>
                                    <strong>{{ $course->name }}</strong>
                                    <small class="text-muted d-block">{{ $course->code }}</small>
                                </div>
                            </td>
                            <td>
                                <span class="badge bg-secondary">{{ $course->department }}</span>
                            </td>
                            <td>
                                {{ $course->duration_years }} Years<br>
                                <small class="text-muted">{{ $course->total_semesters }} Semesters</small>
                            </td>
                            <td>
                                ₹{{ number_format($course->fees_per_semester) }}/sem<br>
                                <small class="text-muted">Total: ₹{{ number_format($course->total_fees) }}</small>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="me-2">
                                        {{ $course->available_seats }}/{{ $course->total_seats }}
                                    </div>
                                    <div class="progress" style="width: 60px; height: 6px;">
                                        <div class="progress-bar bg-{{ $course->availability_status === 'available' ? 'success' : ($course->availability_status === 'limited' ? 'warning' : 'danger') }}"
                                             style="width: {{ ($course->available_seats / $course->total_seats) * 100 }}%"></div>
                                    </div>
                                </div>
                                <small class="text-{{ $course->availability_status === 'available' ? 'success' : ($course->availability_status === 'limited' ? 'warning' : 'danger') }}">
                                    {{ ucfirst($course->availability_status) }}
                                </small>
                            </td>
                            <td>
                                @if($course->is_active)
                                    <span class="badge bg-success">Active</span>
                                @else
                                    <span class="badge bg-secondary">Inactive</span>
                                @endif
                            </td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="{{ route('admin.courses.show', $course) }}" class="btn btn-sm btn-outline-info" title="View">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.courses.edit', $course) }}" class="btn btn-sm btn-outline-primary" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('admin.courses.destroy', $course) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this course?')">
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
                {{ $courses->links() }}
            </div>
        @else
            <div class="text-center py-5">
                <i class="fas fa-graduation-cap fa-3x text-muted mb-3"></i>
                <h5>No Courses Found</h5>
                <p class="text-muted">Start by creating your first course.</p>
                <a href="{{ route('admin.courses.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus me-2"></i>Create Course
                </a>
            </div>
        @endif
    </div>
</div>

<!-- Quick Stats -->
@if($courses->count() > 0)
<div class="row mt-4">
    <div class="col-md-3">
        <div class="card text-center">
            <div class="card-body">
                <h4 class="text-primary">{{ $courses->total() }}</h4>
                <small class="text-muted">Total Courses</small>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-center">
            <div class="card-body">
                <h4 class="text-success">{{ $courses->where('is_active', true)->count() }}</h4>
                <small class="text-muted">Active Courses</small>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-center">
            <div class="card-body">
                <h4 class="text-info">{{ $courses->sum('total_seats') }}</h4>
                <small class="text-muted">Total Seats</small>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-center">
            <div class="card-body">
                <h4 class="text-warning">{{ $courses->sum('available_seats') }}</h4>
                <small class="text-muted">Available Seats</small>
            </div>
        </div>
    </div>
</div>
@endif
@endsection
