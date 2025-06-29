@extends('admin.layouts.app')

@section('title', 'Edit Faculty')
@section('page-title', 'Edit Faculty Member')

@section('content')
<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Edit Faculty Details</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.faculty.update', $faculty) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="name" class="form-label">Full Name *</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                       id="name" name="name" value="{{ old('name', $faculty->name) }}"
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
                                        <option value="{{ $designation->name }}" {{ old('designation', $faculty->designation) == $designation->name ? 'selected' : '' }}>
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
                                <option value="{{ $department->name }}" {{ old('department', $faculty->department) == $department->name ? 'selected' : '' }}>
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
                                       id="qualification" name="qualification" value="{{ old('qualification', $faculty->qualification) }}"
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
                                       id="experience_years" name="experience_years" value="{{ old('experience_years', $faculty->experience_years) }}"
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
                                  placeholder="Areas of specialization">{{ old('specialization', $faculty->specialization) }}</textarea>
                        @error('specialization')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="research_interests" class="form-label">Research Interests</label>
                        <input type="text" class="form-control @error('research_interests') is-invalid @enderror"
                               id="research_interests" name="research_interests"
                               value="{{ old('research_interests', $faculty->research_interests ? implode(', ', $faculty->research_interests) : '') }}"
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
                                       id="email" name="email" value="{{ old('email', $faculty->email) }}"
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
                                       id="phone" name="phone" value="{{ old('phone', $faculty->phone) }}"
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
                                  placeholder="Brief biography and achievements">{{ old('bio', $faculty->bio) }}</textarea>
                        @error('bio')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="image" class="form-label">Profile Photo</label>
                                @if($faculty->image)
                                    <div class="mb-2">
                                        <img src="{{ Storage::url($faculty->image) }}" alt="{{ $faculty->name }}" class="rounded" style="width: 100px; height: 100px; object-fit: cover;">
                                    </div>
                                @endif
                                <input type="file" class="form-control @error('image') is-invalid @enderror"
                                       id="image" name="image" accept="image/*">
                                <small class="text-muted">Supported formats: JPG, PNG (Max: 2MB). Leave empty to keep current photo.</small>
                                @error('image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="sort_order" class="form-label">Display Order</label>
                                <input type="number" class="form-control @error('sort_order') is-invalid @enderror"
                                       id="sort_order" name="sort_order" value="{{ old('sort_order', $faculty->sort_order) }}"
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
                                   name="is_active" value="1" {{ old('is_active', $faculty->is_active) ? 'checked' : '' }}>
                            <label class="form-check-label" for="is_active">
                                Active (visible on website)
                            </label>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('admin.faculty.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left me-2"></i>Back to List
                        </a>
                        <div>
                            <a href="{{ route('admin.faculty.show', $faculty) }}" class="btn btn-info me-2">
                                <i class="fas fa-eye me-2"></i>Preview
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-2"></i>Update Faculty
                            </button>
                        </div>
                    </div>
                </form>
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
                        <td><strong>Created:</strong></td>
                        <td>{{ $faculty->created_at->format('M d, Y H:i') }}</td>
                    </tr>
                    <tr>
                        <td><strong>Updated:</strong></td>
                        <td>{{ $faculty->updated_at->format('M d, Y H:i') }}</td>
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
                </table>
            </div>
        </div>

        <div class="card mt-3">
            <div class="card-header">
                <h6 class="mb-0">Quick Actions</h6>
            </div>
            <div class="card-body">
                <div class="d-grid gap-2">
                    <a href="{{ route('admin.faculty.show', $faculty) }}" class="btn btn-outline-info btn-sm">
                        <i class="fas fa-eye me-2"></i>Preview Profile
                    </a>
                    <form action="{{ route('admin.faculty.destroy', $faculty) }}" method="POST"
                          onsubmit="return confirm('Are you sure you want to delete this faculty member?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger btn-sm w-100">
                            <i class="fas fa-trash me-2"></i>Delete Faculty
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
