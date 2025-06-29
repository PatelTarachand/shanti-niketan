@extends('admin.layouts.app')

@section('title', 'Add New Alumni')

@section('content')
<div class="container-fluid">
    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3 mb-0 text-gray-800">Add New Alumni</h1>
            <p class="text-muted">Create a new alumni profile</p>
        </div>
        <a href="{{ route('admin.alumni.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left me-2"></i>Back to Alumni List
        </a>
    </div>

    @if($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <h6><i class="fas fa-exclamation-triangle me-2"></i>Please correct the following errors:</h6>
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <form action="{{ route('admin.alumni.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

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
                                <label for="name" class="form-label">Full Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                       id="name" name="name" value="{{ old('name') }}" required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="email" class="form-label">Email Address <span class="text-danger">*</span></label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                       id="email" name="email" value="{{ old('email') }}" required>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="phone" class="form-label">Phone Number</label>
                                <input type="tel" class="form-control @error('phone') is-invalid @enderror"
                                       id="phone" name="phone" value="{{ old('phone') }}">
                                @error('phone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="student_id" class="form-label">Student ID / Roll Number</label>
                                <input type="text" class="form-control @error('student_id') is-invalid @enderror"
                                       id="student_id" name="student_id" value="{{ old('student_id') }}"
                                       placeholder="e.g., SNC2020001">
                                @error('student_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="profile_photo" class="form-label">Profile Photo</label>
                            <input type="file" class="form-control @error('profile_photo') is-invalid @enderror"
                                   id="profile_photo" name="profile_photo" accept="image/*">
                            <div class="form-text">Upload a professional photo (JPG, PNG, max 2MB)</div>
                            @error('profile_photo')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Academic Information -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Academic Information</h6>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="course" class="form-label">Course <span class="text-danger">*</span></label>
                                <select class="form-select @error('course') is-invalid @enderror" id="course" name="course" required>
                                    <option value="">Select Course</option>
                                    @foreach($courses as $course)
                                        <option value="{{ $course }}" {{ old('course') == $course ? 'selected' : '' }}>{{ $course }}</option>
                                    @endforeach
                                </select>
                                @error('course')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="branch" class="form-label">Branch/Specialization</label>
                                <input type="text" class="form-control @error('branch') is-invalid @enderror"
                                       id="branch" name="branch" value="{{ old('branch') }}"
                                       placeholder="e.g., Computer Science Engineering">
                                @error('branch')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="admission_year" class="form-label">Admission Year</label>
                                <select class="form-select @error('admission_year') is-invalid @enderror" id="admission_year" name="admission_year">
                                    <option value="">Select Year</option>
                                    @for($year = date('Y'); $year >= 1990; $year--)
                                        <option value="{{ $year }}" {{ old('admission_year') == $year ? 'selected' : '' }}>{{ $year }}</option>
                                    @endfor
                                </select>
                                @error('admission_year')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="passing_year" class="form-label">Passing Year <span class="text-danger">*</span></label>
                                <select class="form-select @error('passing_year') is-invalid @enderror" id="passing_year" name="passing_year" required>
                                    <option value="">Select Year</option>
                                    @for($year = date('Y') + 1; $year >= 1990; $year--)
                                        <option value="{{ $year }}" {{ old('passing_year') == $year ? 'selected' : '' }}>{{ $year }}</option>
                                    @endfor
                                </select>
                                @error('passing_year')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Professional Information -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Professional Information</h6>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="current_company" class="form-label">Current Company</label>
                                <input type="text" class="form-control @error('current_company') is-invalid @enderror"
                                       id="current_company" name="current_company" value="{{ old('current_company') }}"
                                       placeholder="e.g., Microsoft, TCS, Self-employed">
                                @error('current_company')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="current_position" class="form-label">Current Position</label>
                                <input type="text" class="form-control @error('current_position') is-invalid @enderror"
                                       id="current_position" name="current_position" value="{{ old('current_position') }}"
                                       placeholder="e.g., Software Engineer, Business Analyst">
                                @error('current_position')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="current_location" class="form-label">Current Location</label>
                                <input type="text" class="form-control @error('current_location') is-invalid @enderror"
                                       id="current_location" name="current_location" value="{{ old('current_location') }}"
                                       placeholder="e.g., Mumbai, India">
                                @error('current_location')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="current_salary" class="form-label">Current Salary (Annual)</label>
                                <input type="number" class="form-control @error('current_salary') is-invalid @enderror"
                                       id="current_salary" name="current_salary" value="{{ old('current_salary') }}"
                                       placeholder="e.g., 1200000" min="0">
                                @error('current_salary')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="industry" class="form-label">Industry</label>
                                <select class="form-select @error('industry') is-invalid @enderror" id="industry" name="industry">
                                    <option value="">Select Industry</option>
                                    <option value="Information Technology" {{ old('industry') == 'Information Technology' ? 'selected' : '' }}>Information Technology</option>
                                    <option value="Consulting" {{ old('industry') == 'Consulting' ? 'selected' : '' }}>Consulting</option>
                                    <option value="Financial Services" {{ old('industry') == 'Financial Services' ? 'selected' : '' }}>Financial Services</option>
                                    <option value="Manufacturing" {{ old('industry') == 'Manufacturing' ? 'selected' : '' }}>Manufacturing</option>
                                    <option value="Healthcare" {{ old('industry') == 'Healthcare' ? 'selected' : '' }}>Healthcare</option>
                                    <option value="Education" {{ old('industry') == 'Education' ? 'selected' : '' }}>Education</option>
                                    <option value="Marketing" {{ old('industry') == 'Marketing' ? 'selected' : '' }}>Marketing</option>
                                    <option value="Government" {{ old('industry') == 'Government' ? 'selected' : '' }}>Government</option>
                                    <option value="Entrepreneurship" {{ old('industry') == 'Entrepreneurship' ? 'selected' : '' }}>Entrepreneurship</option>
                                    <option value="Other" {{ old('industry') == 'Other' ? 'selected' : '' }}>Other</option>
                                </select>
                                @error('industry')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="experience_years" class="form-label">Years of Experience</label>
                                <select class="form-select @error('experience_years') is-invalid @enderror" id="experience_years" name="experience_years">
                                    <option value="">Select Experience</option>
                                    <option value="0" {{ old('experience_years') == '0' ? 'selected' : '' }}>Fresher</option>
                                    @for($exp = 1; $exp <= 30; $exp++)
                                        <option value="{{ $exp }}" {{ old('experience_years') == $exp ? 'selected' : '' }}>{{ $exp }} {{ $exp == 1 ? 'Year' : 'Years' }}</option>
                                    @endfor
                                    <option value="30" {{ old('experience_years') == '30' ? 'selected' : '' }}>30+ Years</option>
                                </select>
                                @error('experience_years')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Additional Information -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Additional Information</h6>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="bio" class="form-label">Professional Bio</label>
                            <textarea class="form-control @error('bio') is-invalid @enderror" id="bio" name="bio" rows="4"
                                      placeholder="Tell us about their professional journey, achievements, and current role...">{{ old('bio') }}</textarea>
                            <div class="form-text">Maximum 1000 characters</div>
                            @error('bio')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="testimonial" class="form-label">Testimonial for Shantineketan College</label>
                            <textarea class="form-control @error('testimonial') is-invalid @enderror" id="testimonial" name="testimonial" rows="3"
                                      placeholder="Share their experience at Shantineketan College...">{{ old('testimonial') }}</textarea>
                            <div class="form-text">Maximum 500 characters</div>
                            @error('testimonial')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="skills" class="form-label">Skills</label>
                                <input type="text" class="form-control @error('skills') is-invalid @enderror"
                                       id="skills" name="skills" value="{{ old('skills') }}"
                                       placeholder="e.g., Java, Python, Project Management (comma separated)">
                                <div class="form-text">Separate multiple skills with commas</div>
                                @error('skills')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="achievements" class="form-label">Achievements</label>
                                <input type="text" class="form-control @error('achievements') is-invalid @enderror"
                                       id="achievements" name="achievements" value="{{ old('achievements') }}"
                                       placeholder="e.g., Best Employee Award, Patent holder (comma separated)">
                                <div class="form-text">Separate multiple achievements with commas</div>
                                @error('achievements')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Social Media Links -->
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="linkedin_url" class="form-label">LinkedIn Profile</label>
                                <input type="url" class="form-control @error('linkedin_url') is-invalid @enderror"
                                       id="linkedin_url" name="linkedin_url" value="{{ old('linkedin_url') }}"
                                       placeholder="https://linkedin.com/in/profile">
                                @error('linkedin_url')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="twitter_url" class="form-label">Twitter Profile</label>
                                <input type="url" class="form-control @error('twitter_url') is-invalid @enderror"
                                       id="twitter_url" name="twitter_url" value="{{ old('twitter_url') }}"
                                       placeholder="https://twitter.com/handle">
                                @error('twitter_url')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="facebook_url" class="form-label">Facebook Profile</label>
                                <input type="url" class="form-control @error('facebook_url') is-invalid @enderror"
                                       id="facebook_url" name="facebook_url" value="{{ old('facebook_url') }}"
                                       placeholder="https://facebook.com/profile">
                                @error('facebook_url')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="website_url" class="form-label">Personal Website</label>
                                <input type="url" class="form-control @error('website_url') is-invalid @enderror"
                                       id="website_url" name="website_url" value="{{ old('website_url') }}"
                                       placeholder="https://website.com">
                                @error('website_url')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <!-- Settings -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Profile Settings</h6>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="is_active" name="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }}>
                                <label class="form-check-label" for="is_active">
                                    <strong>Active Profile</strong>
                                    <div class="form-text">Profile will be visible on the website</div>
                                </label>
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="is_featured" name="is_featured" value="1" {{ old('is_featured') ? 'checked' : '' }}>
                                <label class="form-check-label" for="is_featured">
                                    <strong>Featured Alumni</strong>
                                    <div class="form-text">Highlight this profile on the homepage</div>
                                </label>
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="show_contact" name="show_contact" value="1" {{ old('show_contact') ? 'checked' : '' }}>
                                <label class="form-check-label" for="show_contact">
                                    <strong>Show Contact Information</strong>
                                    <div class="form-text">Allow others to see contact details</div>
                                </label>
                            </div>
                        </div>


                    </div>
                </div>

                <!-- Submit Button -->
                <div class="card shadow">
                    <div class="card-body text-center">
                        <button type="submit" class="btn btn-primary btn-lg w-100">
                            <i class="fas fa-save me-2"></i>Create Alumni Profile
                        </button>
                        <div class="form-text mt-2">
                            All information can be edited later
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
