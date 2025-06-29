@extends('admin.layouts.app')

@section('title', 'Course Details')
@section('page-title', 'Course Details')

@section('content')
<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">{{ $course->name }} ({{ $course->code }})</h5>
                <div>
                    @if($course->is_active)
                        <span class="badge bg-success">Active</span>
                    @else
                        <span class="badge bg-secondary">Inactive</span>
                    @endif
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <h6 class="text-muted">Basic Information</h6>
                        <table class="table table-borderless">
                            <tr>
                                <td><strong>Course Name:</strong></td>
                                <td>{{ $course->name }}</td>
                            </tr>
                            <tr>
                                <td><strong>Course Code:</strong></td>
                                <td>{{ $course->code }}</td>
                            </tr>
                            <tr>
                                <td><strong>Department:</strong></td>
                                <td><span class="badge bg-secondary">{{ $course->department }}</span></td>
                            </tr>
                            <tr>
                                <td><strong>Duration:</strong></td>
                                <td>{{ $course->duration_years }} Years ({{ $course->total_semesters }} Semesters)</td>
                            </tr>
                        </table>
                    </div>
                    
                    <div class="col-md-6">
                        <h6 class="text-muted">Fees & Seats</h6>
                        <table class="table table-borderless">
                            <tr>
                                <td><strong>Fees per Semester:</strong></td>
                                <td>₹{{ number_format($course->fees_per_semester, 2) }}</td>
                            </tr>
                            <tr>
                                <td><strong>Total Course Fees:</strong></td>
                                <td><strong class="text-primary">₹{{ number_format($course->total_fees, 2) }}</strong></td>
                            </tr>
                            <tr>
                                <td><strong>Total Seats:</strong></td>
                                <td>{{ $course->total_seats }}</td>
                            </tr>
                            <tr>
                                <td><strong>Available Seats:</strong></td>
                                <td>
                                    <span class="badge 
                                        @if($course->availability_status == 'available') bg-success
                                        @elseif($course->availability_status == 'limited') bg-warning
                                        @else bg-danger
                                        @endif">
                                        {{ $course->available_seats }}
                                    </span>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                
                @if($course->description)
                <div class="mt-4">
                    <h6 class="text-muted">Description</h6>
                    <p class="text-justify">{{ $course->description }}</p>
                </div>
                @endif
                
                @if($course->eligibility_criteria && count($course->eligibility_criteria) > 0)
                <div class="mt-4">
                    <h6 class="text-muted">Eligibility Criteria</h6>
                    <ul class="list-group list-group-flush">
                        @foreach($course->eligibility_criteria as $criteria)
                            <li class="list-group-item px-0">
                                <i class="fas fa-check-circle text-success me-2"></i>{{ $criteria }}
                            </li>
                        @endforeach
                    </ul>
                </div>
                @endif
                
                <div class="mt-4">
                    <h6 class="text-muted">Course Statistics</h6>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="text-center p-3 bg-light rounded">
                                <h4 class="text-primary mb-1">{{ $course->duration_years }}</h4>
                                <small class="text-muted">Years</small>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="text-center p-3 bg-light rounded">
                                <h4 class="text-info mb-1">{{ $course->total_semesters }}</h4>
                                <small class="text-muted">Semesters</small>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="text-center p-3 bg-light rounded">
                                <h4 class="text-success mb-1">{{ $course->total_seats }}</h4>
                                <small class="text-muted">Total Seats</small>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="text-center p-3 bg-light rounded">
                                <h4 class="text-warning mb-1">{{ $course->available_seats }}</h4>
                                <small class="text-muted">Available</small>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="mt-4 pt-3 border-top">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <small class="text-muted">
                                Created: {{ $course->created_at->format('M d, Y') }} | 
                                Updated: {{ $course->updated_at->format('M d, Y') }}
                            </small>
                        </div>
                        <div>
                            <a href="{{ route('admin.courses.edit', $course) }}" class="btn btn-primary btn-sm">
                                <i class="fas fa-edit me-1"></i>Edit Course
                            </a>
                            <a href="{{ route('admin.courses.index') }}" class="btn btn-secondary btn-sm">
                                <i class="fas fa-arrow-left me-1"></i>Back to List
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <h6 class="mb-0">Quick Actions</h6>
            </div>
            <div class="card-body">
                <div class="d-grid gap-2">
                    <a href="{{ route('admin.courses.edit', $course) }}" class="btn btn-outline-primary">
                        <i class="fas fa-edit me-2"></i>Edit Course
                    </a>
                    <button type="button" class="btn btn-outline-info" onclick="window.print()">
                        <i class="fas fa-print me-2"></i>Print Details
                    </button>
                    <form action="{{ route('admin.courses.destroy', $course) }}" method="POST" 
                          onsubmit="return confirm('Are you sure you want to delete this course? This action cannot be undone.')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger w-100">
                            <i class="fas fa-trash me-2"></i>Delete Course
                        </button>
                    </form>
                </div>
            </div>
        </div>
        
        <div class="card mt-3">
            <div class="card-header">
                <h6 class="mb-0">Seat Availability</h6>
            </div>
            <div class="card-body">
                <div class="progress mb-3" style="height: 20px;">
                    @php
                        $occupiedPercentage = (($course->total_seats - $course->available_seats) / $course->total_seats) * 100;
                    @endphp
                    <div class="progress-bar 
                        @if($occupiedPercentage >= 90) bg-danger
                        @elseif($occupiedPercentage >= 70) bg-warning
                        @else bg-success
                        @endif" 
                        role="progressbar" 
                        style="width: {{ $occupiedPercentage }}%"
                        aria-valuenow="{{ $occupiedPercentage }}" 
                        aria-valuemin="0" 
                        aria-valuemax="100">
                        {{ round($occupiedPercentage, 1) }}%
                    </div>
                </div>
                <div class="row text-center">
                    <div class="col-6">
                        <div class="border-end">
                            <h5 class="text-danger mb-0">{{ $course->total_seats - $course->available_seats }}</h5>
                            <small class="text-muted">Occupied</small>
                        </div>
                    </div>
                    <div class="col-6">
                        <h5 class="text-success mb-0">{{ $course->available_seats }}</h5>
                        <small class="text-muted">Available</small>
                    </div>
                </div>
            </div>
        </div>
        
        @if($course->eligibility_criteria && count($course->eligibility_criteria) > 0)
        <div class="card mt-3">
            <div class="card-header">
                <h6 class="mb-0">Eligibility Summary</h6>
            </div>
            <div class="card-body">
                <div class="alert alert-info mb-0">
                    <small>
                        <strong>{{ count($course->eligibility_criteria) }}</strong> eligibility criteria defined for this course.
                        Students must meet all requirements to be eligible for admission.
                    </small>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection

@push('styles')
<style>
    .table-borderless td {
        border: none;
        padding: 0.5rem 0;
    }
    
    @media print {
        .btn, .card-header, .quick-actions {
            display: none !important;
        }
    }
</style>
@endpush
