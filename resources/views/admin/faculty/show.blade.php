@extends('admin.layouts.app')

@section('title', 'Faculty Profile')
@section('page-title', 'Faculty Profile')

@section('content')
<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Faculty Profile Preview</h5>
                <div>
                    @if($faculty->is_active)
                        <span class="badge bg-success">Active</span>
                    @else
                        <span class="badge bg-secondary">Inactive</span>
                    @endif
                </div>
            </div>
            <div class="card-body">
                <div class="faculty-profile">
                    <div class="row">
                        <div class="col-md-3 text-center">
                            <div class="faculty-image mb-3">
                                @if($faculty->image)
                                    <img src="{{ Storage::url($faculty->image) }}" class="rounded-circle border border-warning border-3" alt="{{ $faculty->name }}" style="width: 150px; height: 150px; object-fit: cover;">
                                @else
                                    <div class="bg-secondary rounded-circle d-flex align-items-center justify-content-center mx-auto border border-warning border-3" style="width: 150px; height: 150px;">
                                        <i class="fas fa-user fa-4x text-white"></i>
                                    </div>
                                @endif
                            </div>
                        </div>
                        
                        <div class="col-md-9">
                            <h3 class="text-dark mb-2">{{ $faculty->name }}</h3>
                            <h5 class="text-warning mb-3">{{ $faculty->designation }}</h5>
                            <p class="text-muted mb-2"><strong>Department:</strong> {{ $faculty->department }}</p>
                            <p class="text-muted mb-2"><strong>Qualification:</strong> {{ $faculty->qualification }}</p>
                            <p class="text-muted mb-3"><strong>Experience:</strong> {{ $faculty->experience_years }}+ years</p>
                            
                            @if($faculty->email || $faculty->phone)
                                <div class="contact-info mb-3">
                                    @if($faculty->email)
                                        <p class="mb-1">
                                            <i class="fas fa-envelope text-warning me-2"></i>
                                            <a href="mailto:{{ $faculty->email }}">{{ $faculty->email }}</a>
                                        </p>
                                    @endif
                                    @if($faculty->phone)
                                        <p class="mb-1">
                                            <i class="fas fa-phone text-warning me-2"></i>
                                            <a href="tel:{{ $faculty->phone }}">{{ $faculty->phone }}</a>
                                        </p>
                                    @endif
                                </div>
                            @endif
                        </div>
                    </div>
                    
                    @if($faculty->specialization)
                        <div class="specialization-section mt-4">
                            <h6 class="text-warning mb-2">Specialization</h6>
                            <p>{{ $faculty->specialization }}</p>
                        </div>
                    @endif
                    
                    @if($faculty->research_interests)
                        <div class="research-interests-section mt-4">
                            <h6 class="text-warning mb-2">Research Interests</h6>
                            <div class="research-tags">
                                @foreach($faculty->research_interests as $interest)
                                    <span class="badge bg-light text-dark me-2 mb-2">{{ $interest }}</span>
                                @endforeach
                            </div>
                        </div>
                    @endif
                    
                    @if($faculty->bio)
                        <div class="bio-section mt-4">
                            <h6 class="text-warning mb-2">Biography</h6>
                            <p class="text-justify">{!! nl2br(e($faculty->bio)) !!}</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <h6 class="mb-0">Faculty Information</h6>
            </div>
            <div class="card-body">
                <table class="table table-sm">
                    <tr>
                        <td><strong>ID:</strong></td>
                        <td>#{{ $faculty->id }}</td>
                    </tr>
                    <tr>
                        <td><strong>Department:</strong></td>
                        <td>{{ $faculty->department }}</td>
                    </tr>
                    <tr>
                        <td><strong>Designation:</strong></td>
                        <td>{{ $faculty->designation }}</td>
                    </tr>
                    <tr>
                        <td><strong>Experience:</strong></td>
                        <td>{{ $faculty->experience_years }} years</td>
                    </tr>
                    <tr>
                        <td><strong>Status:</strong></td>
                        <td>
                            @if($faculty->is_active)
                                <span class="badge bg-success">Active</span>
                            @else
                                <span class="badge bg-secondary">Inactive</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td><strong>Display Order:</strong></td>
                        <td>{{ $faculty->sort_order }}</td>
                    </tr>
                    <tr>
                        <td><strong>Created:</strong></td>
                        <td>{{ $faculty->created_at->format('M d, Y') }}</td>
                    </tr>
                    <tr>
                        <td><strong>Updated:</strong></td>
                        <td>{{ $faculty->updated_at->format('M d, Y') }}</td>
                    </tr>
                </table>
            </div>
        </div>
        
        <div class="card mt-3">
            <div class="card-header">
                <h6 class="mb-0">Actions</h6>
            </div>
            <div class="card-body">
                <div class="d-grid gap-2">
                    <a href="{{ route('admin.faculty.edit', $faculty) }}" class="btn btn-primary">
                        <i class="fas fa-edit me-2"></i>Edit Faculty
                    </a>
                    
                    <a href="{{ route('admin.faculty.index') }}" class="btn btn-outline-secondary">
                        <i class="fas fa-arrow-left me-2"></i>Back to List
                    </a>
                    
                    <hr>
                    
                    <form action="{{ route('admin.faculty.destroy', $faculty) }}" method="POST" 
                          onsubmit="return confirm('Are you sure you want to delete this faculty member?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger w-100">
                            <i class="fas fa-trash me-2"></i>Delete Faculty
                        </button>
                    </form>
                </div>
            </div>
        </div>
        
        <div class="card mt-3">
            <div class="card-header">
                <h6 class="mb-0">Website Preview</h6>
            </div>
            <div class="card-body">
                <p class="small text-muted">This is how the faculty profile will appear on the public website.</p>
                <a href="{{ route('faculty.index') }}" target="_blank" class="btn btn-outline-info btn-sm w-100">
                    <i class="fas fa-external-link-alt me-2"></i>View on Website
                </a>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
.faculty-profile {
    font-family: 'Inter', sans-serif;
}

.research-tags .badge {
    font-size: 0.8rem;
    padding: 0.5em 0.75em;
}

.contact-info a {
    color: #2C3E50;
    text-decoration: none;
}

.contact-info a:hover {
    color: #FFD700;
}
</style>
@endpush
