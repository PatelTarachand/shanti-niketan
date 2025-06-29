@extends('admin.layouts.app')

@section('title', 'Manage Faculty')
@section('page-title', 'Faculty Management')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="mb-0">All Faculty Members</h4>
    <a href="{{ route('admin.faculty.create') }}" class="btn btn-primary">
        <i class="fas fa-plus me-2"></i>Add New Faculty
    </a>
</div>

<!-- Filters -->
<div class="card mb-4">
    <div class="card-body">
        <form method="GET" action="{{ route('admin.faculty.index') }}">
            <div class="row">
                <div class="col-md-3">
                    <select name="department" class="form-select">
                        <option value="">All Departments</option>
                        @foreach(\App\Models\Department::active()->ordered()->get() as $department)
                            <option value="{{ $department->name }}" {{ request('department') == $department->name ? 'selected' : '' }}>
                                {{ $department->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                    <select name="designation" class="form-select">
                        <option value="">All Designations</option>
                        @foreach(\App\Models\Designation::active()->ordered()->get() as $designation)
                            <option value="{{ $designation->name }}" {{ request('designation') == $designation->name ? 'selected' : '' }}>
                                {{ $designation->name }}
                            </option>
                        @endforeach
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
                    <a href="{{ route('admin.faculty.index') }}" class="btn btn-outline-secondary">Clear</a>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Faculty Grid -->
<div class="row">
    @if($faculty->count() > 0)
        @foreach($faculty as $member)
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-body text-center">
                    <div class="faculty-image mb-3">
                        @if($member->image)
                            <img src="{{ Storage::url($member->image) }}" class="rounded-circle" alt="{{ $member->name }}" style="width: 100px; height: 100px; object-fit: cover;">
                        @else
                            <div class="bg-secondary rounded-circle d-flex align-items-center justify-content-center mx-auto" style="width: 100px; height: 100px;">
                                <i class="fas fa-user fa-2x text-white"></i>
                            </div>
                        @endif
                    </div>

                    <h5 class="card-title">{{ $member->name }}</h5>
                    <p class="text-warning fw-semibold">{{ $member->designation }}</p>
                    <p class="text-muted small">{{ $member->department }}</p>
                    <p class="card-text small">{{ $member->qualification }}</p>

                    @if($member->research_interests)
                        <div class="faculty-specialization mb-3">
                            @foreach(array_slice($member->research_interests, 0, 2) as $interest)
                                <span class="badge bg-light text-dark me-1">{{ $interest }}</span>
                            @endforeach
                        </div>
                    @endif

                    <div class="faculty-status mb-3">
                        @if($member->is_active)
                            <span class="badge bg-success">Active</span>
                        @else
                            <span class="badge bg-secondary">Inactive</span>
                        @endif
                        <span class="badge bg-info ms-1">{{ $member->experience_years }}+ Years</span>
                    </div>

                    <div class="btn-group w-100" role="group">
                        <a href="{{ route('admin.faculty.show', $member) }}" class="btn btn-outline-info btn-sm" title="View">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="{{ route('admin.faculty.edit', $member) }}" class="btn btn-outline-primary btn-sm" title="Edit">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('admin.faculty.destroy', $member) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this faculty member?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger btn-sm" title="Delete">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

        <!-- Pagination -->
        <div class="col-12">
            <div class="d-flex justify-content-center">
                {{ $faculty->links() }}
            </div>
        </div>
    @else
        <div class="col-12">
            <div class="card">
                <div class="card-body text-center py-5">
                    <i class="fas fa-chalkboard-teacher fa-3x text-muted mb-3"></i>
                    <h5>No Faculty Members Found</h5>
                    <p class="text-muted">Start by adding your first faculty member.</p>
                    <a href="{{ route('admin.faculty.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus me-2"></i>Add Faculty Member
                    </a>
                </div>
            </div>
        </div>
    @endif
</div>
@endsection

@push('styles')
<style>
.faculty-image img {
    border: 3px solid #FFD700;
}

.card:hover {
    transform: translateY(-2px);
    transition: all 0.3s ease;
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
}

.faculty-specialization .badge {
    font-size: 0.7rem;
}
</style>
@endpush
