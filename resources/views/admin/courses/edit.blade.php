@extends('admin.layouts.app')

@section('title', 'Edit Course')
@section('page-title', 'Edit Course')

@section('content')
<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Course Details</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.courses.update', $course) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-md-8">
                            <div class="mb-3">
                                <label for="name" class="form-label">Course Name *</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                       id="name" name="name" value="{{ old('name', $course->name) }}"
                                       placeholder="e.g., Bachelor of Technology" required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="code" class="form-label">Course Code *</label>
                                <input type="text" class="form-control @error('code') is-invalid @enderror"
                                       id="code" name="code" value="{{ old('code', $course->code) }}"
                                       placeholder="e.g., BTECH" required>
                                @error('code')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Description *</label>
                        <textarea class="form-control @error('description') is-invalid @enderror"
                                  id="description" name="description" rows="3"
                                  placeholder="Brief description of the course" required>{{ old('description', $course->description) }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="department" class="form-label">Department *</label>
                                <select class="form-select @error('department') is-invalid @enderror"
                                        id="department" name="department" required>
                                    <option value="">Select Department</option>
                                    @foreach(\App\Models\Department::active()->ordered()->get() as $department)
                                        <option value="{{ $department->name }}" {{ old('department', $course->department) == $department->name ? 'selected' : '' }}>
                                            {{ $department->name }} ({{ $department->code }})
                                        </option>
                                    @endforeach
                                </select>
                                @error('department')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="duration_years" class="form-label">Duration (Years) *</label>
                                <input type="number" class="form-control @error('duration_years') is-invalid @enderror"
                                       id="duration_years" name="duration_years" value="{{ old('duration_years', $course->duration_years) }}"
                                       min="1" max="10" required>
                                @error('duration_years')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="total_semesters" class="form-label">Total Semesters *</label>
                                <input type="number" class="form-control @error('total_semesters') is-invalid @enderror"
                                       id="total_semesters" name="total_semesters" value="{{ old('total_semesters', $course->total_semesters) }}"
                                       min="1" max="20" required>
                                @error('total_semesters')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="fees_per_semester" class="form-label">Fees per Semester (₹) *</label>
                                <input type="number" class="form-control @error('fees_per_semester') is-invalid @enderror"
                                       id="fees_per_semester" name="fees_per_semester" value="{{ old('fees_per_semester', $course->fees_per_semester) }}"
                                       min="0" step="0.01" required>
                                @error('fees_per_semester')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="total_seats" class="form-label">Total Seats *</label>
                                <input type="number" class="form-control @error('total_seats') is-invalid @enderror"
                                       id="total_seats" name="total_seats" value="{{ old('total_seats', $course->total_seats) }}"
                                       min="1" required>
                                @error('total_seats')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="available_seats" class="form-label">Available Seats *</label>
                                <input type="number" class="form-control @error('available_seats') is-invalid @enderror"
                                       id="available_seats" name="available_seats" value="{{ old('available_seats', $course->available_seats) }}"
                                       min="0" required>
                                @error('available_seats')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="eligibility_criteria" class="form-label">Eligibility Criteria</label>
                        <textarea class="form-control @error('eligibility_criteria') is-invalid @enderror"
                                  id="eligibility_criteria" name="eligibility_criteria" rows="3"
                                  placeholder="Enter criteria separated by commas (e.g., 12th with PCM, Minimum 60% marks, JEE Main qualified)">{{ old('eligibility_criteria', is_array($course->eligibility_criteria) ? implode(', ', $course->eligibility_criteria) : $course->eligibility_criteria) }}</textarea>
                        <small class="text-muted">Separate multiple criteria with commas</small>
                        @error('eligibility_criteria')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="is_active"
                                   name="is_active" value="1" {{ old('is_active', $course->is_active) ? 'checked' : '' }}>
                            <label class="form-check-label" for="is_active">
                                Active (visible on website)
                            </label>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('admin.courses.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left me-2"></i>Back to Courses
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-2"></i>Update Course
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <h6 class="mb-0">Course Guidelines</h6>
            </div>
            <div class="card-body">
                <div class="alert alert-info">
                    <h6><i class="fas fa-info-circle me-2"></i>Course Information</h6>
                    <ul class="small mb-0">
                        <li>Use clear and descriptive course names</li>
                        <li>Course codes should be unique</li>
                        <li>Set realistic seat numbers</li>
                        <li>Include comprehensive eligibility criteria</li>
                        <li>Fees should be per semester amount</li>
                    </ul>
                </div>

                <div class="alert alert-warning">
                    <h6><i class="fas fa-exclamation-triangle me-2"></i>Department Guidelines</h6>
                    <ul class="small mb-0">
                        <li><strong>Engineering:</strong> Technical courses (B.Tech, M.Tech)</li>
                        <li><strong>Management:</strong> Business courses (MBA, BBA)</li>
                        <li><strong>Commerce:</strong> Commerce courses (B.Com, M.Com)</li>
                        <li><strong>Science:</strong> Science courses (B.Sc, M.Sc)</li>
                        <li><strong>Arts:</strong> Arts and humanities courses</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="card mt-3">
            <div class="card-header">
                <h6 class="mb-0">Fee Calculator</h6>
            </div>
            <div class="card-body">
                <div class="fee-calculator">
                    <div class="mb-2">
                        <label class="small">Fees per Semester:</label>
                        <div id="feePerSemester">₹0</div>
                    </div>
                    <div class="mb-2">
                        <label class="small">Total Semesters:</label>
                        <div id="totalSemesters">0</div>
                    </div>
                    <hr>
                    <div>
                        <label class="small"><strong>Total Course Fees:</strong></label>
                        <div id="totalFees" class="h5 text-primary">₹0</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
$(document).ready(function() {
    // Auto-calculate total semesters based on duration
    $('#duration_years').change(function() {
        const years = $(this).val();
        if (years) {
            $('#total_semesters').val(years * 2);
            updateFeeCalculator();
        }
    });

    // Fee calculator
    function updateFeeCalculator() {
        const feePerSem = parseFloat($('#fees_per_semester').val()) || 0;
        const totalSem = parseInt($('#total_semesters').val()) || 0;
        const totalFees = feePerSem * totalSem;

        $('#feePerSemester').text('₹' + feePerSem.toLocaleString());
        $('#totalSemesters').text(totalSem);
        $('#totalFees').text('₹' + totalFees.toLocaleString());
    }

    $('#fees_per_semester, #total_semesters').on('input', updateFeeCalculator);

    // Initialize calculator
    updateFeeCalculator();
});
</script>
@endpush