@extends('admin.layouts.app')

@section('title', 'Add Faculty')
@section('page-title', 'Add New Faculty Member')

@section('content')
<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Faculty Details</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.faculty.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="name" class="form-label">Full Name *</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                       id="name" name="name" value="{{ old('name') }}"
                                       placeholder="Enter full name" required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="designation" class="form-label">Designation *</label>
                                <select class="form-select @error('designation') is-invalid @enderror"
                                        id="designation" name="designation" required>
                                    <option value="">Select Designation</option>
                                    @foreach(\App\Models\Designation::active()->ordered()->get() as $designation)
                                        <option value="{{ $designation->name }}" {{ old('designation') == $designation->name ? 'selected' : '' }}>
                                            {{ $designation->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('designation')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="department" class="form-label">Department *</label>
                        <select class="form-select @error('department') is-invalid @enderror"
                                id="department" name="department" required>
                            <option value="">Select Department</option>
                            @foreach(\App\Models\Department::active()->ordered()->get() as $department)
                                <option value="{{ $department->name }}" {{ old('department') == $department->name ? 'selected' : '' }}>
                                    {{ $department->name }} ({{ $department->code }})
                                </option>
                            @endforeach
                        </select>
                        @error('department')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-8">
                            <div class="mb-3">
                                <label for="qualification" class="form-label">Qualification</label>
                                <input type="text" class="form-control @error('qualification') is-invalid @enderror"
                                       id="qualification" name="qualification" value="{{ old('qualification') }}"
                                       placeholder="e.g., Ph.D. in Computer Science, M.Tech CSE">
                                @error('qualification')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="experience_years" class="form-label">Experience (Years)</label>
                                <input type="number" class="form-control @error('experience_years') is-invalid @enderror"
                                       id="experience_years" name="experience_years" value="{{ old('experience_years') }}"
                                       min="0" max="50">
                                @error('experience_years')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="specialization" class="form-label">Specialization</label>
                        <textarea class="form-control @error('specialization') is-invalid @enderror"
                                  id="specialization" name="specialization" rows="2"
                                  placeholder="Areas of specialization">{{ old('specialization') }}</textarea>
                        @error('specialization')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="research_interests" class="form-label">Research Interests</label>
                        <input type="text" class="form-control @error('research_interests') is-invalid @enderror"
                               id="research_interests" name="research_interests" value="{{ old('research_interests') }}"
                               placeholder="Separate multiple interests with commas">
                        <small class="text-muted">e.g., Artificial Intelligence, Machine Learning, Data Science</small>
                        @error('research_interests')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                       id="email" name="email" value="{{ old('email') }}"
                                       placeholder="faculty@shantiniketan.edu.in">
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone</label>
                                <input type="text" class="form-control @error('phone') is-invalid @enderror"
                                       id="phone" name="phone" value="{{ old('phone') }}"
                                       placeholder="+91 98765 43210">
                                @error('phone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="bio" class="form-label">Biography</label>
                        <textarea class="form-control @error('bio') is-invalid @enderror"
                                  id="bio" name="bio" rows="4"
                                  placeholder="Brief biography and achievements">{{ old('bio') }}</textarea>
                        @error('bio')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="image" class="form-label">Profile Photo</label>
                                <input type="file" class="form-control @error('image') is-invalid @enderror"
                                       id="image" name="image" accept="image/*">
                                <small class="text-muted">Supported formats: JPG, PNG (Max: 2MB)</small>
                                @error('image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="sort_order" class="form-label">Display Order</label>
                                <input type="number" class="form-control @error('sort_order') is-invalid @enderror"
                                       id="sort_order" name="sort_order" value="{{ old('sort_order', 0) }}"
                                       min="0">
                                <small class="text-muted">Lower numbers appear first</small>
                                @error('sort_order')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="is_active"
                                   name="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }}>
                            <label class="form-check-label" for="is_active">
                                Active (visible on website)
                            </label>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('admin.faculty.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left me-2"></i>Back to List
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-2"></i>Add Faculty Member
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <h6 class="mb-0">Faculty Guidelines</h6>
            </div>
            <div class="card-body">
                <div class="alert alert-info">
                    <h6><i class="fas fa-info-circle me-2"></i>Profile Photo Tips</h6>
                    <ul class="small mb-0">
                        <li>Use professional headshot</li>
                        <li>Square aspect ratio preferred</li>
                        <li>Good lighting and clear image</li>
                        <li>File size under 2MB</li>
                        <li>JPG or PNG format</li>
                    </ul>
                </div>

                <div class="alert alert-warning">
                    <h6><i class="fas fa-exclamation-triangle me-2"></i>Required Information</h6>
                    <ul class="small mb-0">
                        <li>Full name and designation</li>
                        <li>Department assignment</li>
                        <li>Qualification and experience (optional)</li>
                        <li>Contact information (optional)</li>
                        <li>Research interests (recommended)</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="card mt-3">
            <div class="card-header">
                <h6 class="mb-0">Department Codes</h6>
            </div>
            <div class="card-body">
                <table class="table table-sm">
                    <tr><td>CSE</td><td>Computer Science & Engineering</td></tr>
                    <tr><td>ME</td><td>Mechanical Engineering</td></tr>
                    <tr><td>CE</td><td>Civil Engineering</td></tr>
                    <tr><td>EE</td><td>Electrical Engineering</td></tr>
                    <tr><td>MBA</td><td>Management Studies</td></tr>
                    <tr><td>COM</td><td>Commerce</td></tr>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
