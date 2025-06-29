@extends('layouts.app')

@section('title', 'Apply for Admission - Shantineketan College')
@section('description', 'Apply for admission to Shantineketan College. Fill out our online application form to start your academic journey.')

@section('content')
<!-- Breadcrumb -->
<section class="py-3">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item">Admission</li>
                <li class="breadcrumb-item active">Apply Online</li>
            </ol>
        </nav>
    </div>
</section>

<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h1 class="display-4 fw-bold text-dark mb-4">Apply for Admission</h1>
                <p class="lead">Take the first step towards your bright future. Fill out our online application form.</p>
            </div>
            <div class="col-lg-6">
                <img src="{{ asset('snc_college.jpeg') }}" class="img-fluid rounded shadow" alt="Apply for Admission - Shantineketan College">
            </div>
        </div>
    </div>
</section>

<!-- Application Form -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                @if(session('success'))
                    <div class="alert alert-success">
                        <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                    </div>
                @endif

                <div class="card">
                    <div class="card-header">
                        <h3 class="mb-0"><i class="fas fa-user-plus me-2"></i>Online Admission Application</h3>
                        <p class="mb-0 mt-2">Please fill all required fields marked with *</p>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admission.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <!-- Personal Information -->
                            <h5 class="text-warning mb-3"><i class="fas fa-user me-2"></i>Personal Information</h5>

                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label for="first_name" class="form-label">First Name *</label>
                                    <input type="text" class="form-control @error('first_name') is-invalid @enderror"
                                           id="first_name" name="first_name" value="{{ old('first_name') }}" required>
                                    @error('first_name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label for="middle_name" class="form-label">Middle Name</label>
                                    <input type="text" class="form-control" id="middle_name" name="middle_name" value="{{ old('middle_name') }}">
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label for="last_name" class="form-label">Last Name *</label>
                                    <input type="text" class="form-control @error('last_name') is-invalid @enderror"
                                           id="last_name" name="last_name" value="{{ old('last_name') }}" required>
                                    @error('last_name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="email" class="form-label">Email Address *</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                                           id="email" name="email" value="{{ old('email') }}" required>
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="phone" class="form-label">Phone Number *</label>
                                    <input type="tel" class="form-control @error('phone') is-invalid @enderror"
                                           id="phone" name="phone" value="{{ old('phone') }}" required>
                                    @error('phone')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="date_of_birth" class="form-label">Date of Birth *</label>
                                    <input type="date" class="form-control @error('date_of_birth') is-invalid @enderror"
                                           id="date_of_birth" name="date_of_birth" value="{{ old('date_of_birth') }}" required>
                                    @error('date_of_birth')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="gender" class="form-label">Gender *</label>
                                    <select class="form-control @error('gender') is-invalid @enderror" id="gender" name="gender" required>
                                        <option value="">Select Gender</option>
                                        <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                                        <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
                                        <option value="other" {{ old('gender') == 'other' ? 'selected' : '' }}>Other</option>
                                    </select>
                                    @error('gender')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Address Information -->
                            <h5 class="text-warning mb-3 mt-4"><i class="fas fa-map-marker-alt me-2"></i>Address Information</h5>

                            <div class="mb-3">
                                <label for="address" class="form-label">Complete Address *</label>
                                <textarea class="form-control @error('address') is-invalid @enderror"
                                          id="address" name="address" rows="3" required>{{ old('address') }}</textarea>
                                @error('address')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="city" class="form-label">City *</label>
                                    <input type="text" class="form-control @error('city') is-invalid @enderror"
                                           id="city" name="city" value="{{ old('city') }}" required>
                                    @error('city')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-3 mb-3">
                                    <label for="state" class="form-label">State *</label>
                                    <input type="text" class="form-control @error('state') is-invalid @enderror"
                                           id="state" name="state" value="{{ old('state') }}" required>
                                    @error('state')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-3 mb-3">
                                    <label for="pincode" class="form-label">PIN Code *</label>
                                    <input type="text" class="form-control @error('pincode') is-invalid @enderror"
                                           id="pincode" name="pincode" value="{{ old('pincode') }}" required>
                                    @error('pincode')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Academic Information -->
                            <h5 class="text-warning mb-3 mt-4"><i class="fas fa-graduation-cap me-2"></i>Academic Information</h5>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="course" class="form-label">Course Applied For *</label>
                                    <select class="form-control @error('course') is-invalid @enderror" id="course" name="course" required>
                                        <option value="">Select Course</option>
                                        <optgroup label="Engineering (B.Tech)">
                                            <option value="btech_cse" {{ old('course') == 'btech_cse' ? 'selected' : '' }}>Computer Science & Engineering</option>
                                            <option value="btech_mechanical" {{ old('course') == 'btech_mechanical' ? 'selected' : '' }}>Mechanical Engineering</option>
                                            <option value="btech_civil" {{ old('course') == 'btech_civil' ? 'selected' : '' }}>Civil Engineering</option>
                                            <option value="btech_electrical" {{ old('course') == 'btech_electrical' ? 'selected' : '' }}>Electrical Engineering</option>
                                        </optgroup>
                                        <optgroup label="Management">
                                            <option value="mba" {{ old('course') == 'mba' ? 'selected' : '' }}>MBA</option>
                                            <option value="bba" {{ old('course') == 'bba' ? 'selected' : '' }}>BBA</option>
                                        </optgroup>
                                        <optgroup label="Commerce">
                                            <option value="bcom" {{ old('course') == 'bcom' ? 'selected' : '' }}>B.Com</option>
                                            <option value="mcom" {{ old('course') == 'mcom' ? 'selected' : '' }}>M.Com</option>
                                        </optgroup>
                                        <optgroup label="Diploma">
                                            <option value="diploma_cse" {{ old('course') == 'diploma_cse' ? 'selected' : '' }}>Diploma in CSE</option>
                                            <option value="diploma_mechanical" {{ old('course') == 'diploma_mechanical' ? 'selected' : '' }}>Diploma in Mechanical</option>
                                        </optgroup>
                                    </select>
                                    @error('course')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="category" class="form-label">Category *</label>
                                    <select class="form-control @error('category') is-invalid @enderror" id="category" name="category" required>
                                        <option value="">Select Category</option>
                                        <option value="general" {{ old('category') == 'general' ? 'selected' : '' }}>General</option>
                                        <option value="obc" {{ old('category') == 'obc' ? 'selected' : '' }}>OBC</option>
                                        <option value="sc" {{ old('category') == 'sc' ? 'selected' : '' }}>SC</option>
                                        <option value="st" {{ old('category') == 'st' ? 'selected' : '' }}>ST</option>
                                        <option value="ews" {{ old('category') == 'ews' ? 'selected' : '' }}>EWS</option>
                                    </select>
                                    @error('category')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Educational Qualifications -->
                            <h6 class="text-secondary mb-3">Last Qualifying Examination</h6>

                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label for="last_exam" class="form-label">Examination *</label>
                                    <select class="form-control @error('last_exam') is-invalid @enderror" id="last_exam" name="last_exam" required>
                                        <option value="">Select Examination</option>
                                        <option value="10th" {{ old('last_exam') == '10th' ? 'selected' : '' }}>10th Standard</option>
                                        <option value="12th" {{ old('last_exam') == '12th' ? 'selected' : '' }}>12th Standard</option>
                                        <option value="graduation" {{ old('last_exam') == 'graduation' ? 'selected' : '' }}>Graduation</option>
                                        <option value="diploma" {{ old('last_exam') == 'diploma' ? 'selected' : '' }}>Diploma</option>
                                    </select>
                                    @error('last_exam')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label for="board_university" class="form-label">Board/University *</label>
                                    <input type="text" class="form-control @error('board_university') is-invalid @enderror"
                                           id="board_university" name="board_university" value="{{ old('board_university') }}" required>
                                    @error('board_university')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label for="percentage" class="form-label">Percentage/CGPA *</label>
                                    <input type="text" class="form-control @error('percentage') is-invalid @enderror"
                                           id="percentage" name="percentage" value="{{ old('percentage') }}" required>
                                    @error('percentage')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="passing_year" class="form-label">Year of Passing *</label>
                                    <select class="form-control @error('passing_year') is-invalid @enderror" id="passing_year" name="passing_year" required>
                                        <option value="">Select Year</option>
                                        @for($year = date('Y'); $year >= date('Y') - 10; $year--)
                                            <option value="{{ $year }}" {{ old('passing_year') == $year ? 'selected' : '' }}>{{ $year }}</option>
                                        @endfor
                                    </select>
                                    @error('passing_year')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="entrance_exam" class="form-label">Entrance Exam (if any)</label>
                                    <input type="text" class="form-control" id="entrance_exam" name="entrance_exam"
                                           value="{{ old('entrance_exam') }}" placeholder="JEE, CET, etc.">
                                </div>
                            </div>

                            <!-- Parent/Guardian Information -->
                            <h5 class="text-warning mb-3 mt-4"><i class="fas fa-users me-2"></i>Parent/Guardian Information</h5>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="father_name" class="form-label">Father's Name *</label>
                                    <input type="text" class="form-control @error('father_name') is-invalid @enderror"
                                           id="father_name" name="father_name" value="{{ old('father_name') }}" required>
                                    @error('father_name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="mother_name" class="form-label">Mother's Name *</label>
                                    <input type="text" class="form-control @error('mother_name') is-invalid @enderror"
                                           id="mother_name" name="mother_name" value="{{ old('mother_name') }}" required>
                                    @error('mother_name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="father_occupation" class="form-label">Father's Occupation</label>
                                    <input type="text" class="form-control" id="father_occupation" name="father_occupation" value="{{ old('father_occupation') }}">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="annual_income" class="form-label">Annual Family Income</label>
                                    <select class="form-control" id="annual_income" name="annual_income">
                                        <option value="">Select Income Range</option>
                                        <option value="below_1_lakh" {{ old('annual_income') == 'below_1_lakh' ? 'selected' : '' }}>Below ₹1 Lakh</option>
                                        <option value="1_to_2_lakh" {{ old('annual_income') == '1_to_2_lakh' ? 'selected' : '' }}>₹1-2 Lakh</option>
                                        <option value="2_to_5_lakh" {{ old('annual_income') == '2_to_5_lakh' ? 'selected' : '' }}>₹2-5 Lakh</option>
                                        <option value="5_to_10_lakh" {{ old('annual_income') == '5_to_10_lakh' ? 'selected' : '' }}>₹5-10 Lakh</option>
                                        <option value="above_10_lakh" {{ old('annual_income') == 'above_10_lakh' ? 'selected' : '' }}>Above ₹10 Lakh</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Document Upload -->
                            <h5 class="text-warning mb-3 mt-4"><i class="fas fa-file-upload me-2"></i>Document Upload</h5>
                            <p class="text-muted small">Please upload clear scanned copies of the following documents (PDF/JPG format, max 2MB each):</p>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="photo" class="form-label">Passport Size Photo *</label>
                                    <input type="file" class="form-control @error('photo') is-invalid @enderror"
                                           id="photo" name="photo" accept="image/*" required>
                                    @error('photo')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="signature" class="form-label">Signature *</label>
                                    <input type="file" class="form-control @error('signature') is-invalid @enderror"
                                           id="signature" name="signature" accept="image/*" required>
                                    @error('signature')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="marksheet" class="form-label">Last Qualifying Exam Marksheet *</label>
                                    <input type="file" class="form-control @error('marksheet') is-invalid @enderror"
                                           id="marksheet" name="marksheet" accept=".pdf,.jpg,.jpeg,.png" required>
                                    @error('marksheet')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="transfer_certificate" class="form-label">Transfer Certificate</label>
                                    <input type="file" class="form-control" id="transfer_certificate" name="transfer_certificate" accept=".pdf,.jpg,.jpeg,.png">
                                </div>
                            </div>

                            <!-- Declaration -->
                            <div class="mt-4 p-3 bg-light rounded">
                                <h6 class="text-warning">Declaration</h6>
                                <div class="form-check">
                                    <input class="form-check-input @error('declaration') is-invalid @enderror"
                                           type="checkbox" id="declaration" name="declaration" required>
                                    <label class="form-check-label" for="declaration">
                                        I hereby declare that all the information provided above is true and correct to the best of my knowledge.
                                        I understand that any false information may lead to cancellation of my admission.
                                    </label>
                                    @error('declaration')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <div class="text-center mt-4">
                                <button type="submit" class="btn btn-primary btn-lg px-5">
                                    <i class="fas fa-paper-plane me-2"></i>Submit Application
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Important Notes -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="alert alert-info">
                    <h5><i class="fas fa-info-circle me-2"></i>Important Notes:</h5>
                    <ul class="mb-0">
                        <li>Application fee: ₹500 (Non-refundable)</li>
                        <li>All fields marked with * are mandatory</li>
                        <li>Upload clear scanned copies of documents</li>
                        <li>Keep your application number safe for future reference</li>
                        <li>Admission is subject to document verification and merit</li>
                        <li>For any queries, contact: shantiniketan2009@yahoo.co.in</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
$(document).ready(function() {
    // Form validation
    $('form').on('submit', function(e) {
        var isValid = true;

        // Check required fields
        $(this).find('[required]').each(function() {
            if (!$(this).val()) {
                isValid = false;
                $(this).addClass('is-invalid');
            } else {
                $(this).removeClass('is-invalid');
            }
        });

        // File size validation
        $('input[type="file"]').each(function() {
            if (this.files[0] && this.files[0].size > 2 * 1024 * 1024) { // 2MB
                isValid = false;
                $(this).addClass('is-invalid');
                alert('File size should not exceed 2MB');
            }
        });

        if (!isValid) {
            e.preventDefault();
            alert('Please fill all required fields correctly.');
        }
    });

    // Remove validation classes on input
    $('input, select, textarea').on('input change', function() {
        $(this).removeClass('is-invalid');
    });

    // Auto-fill state based on pincode (basic implementation)
    $('#pincode').on('blur', function() {
        var pincode = $(this).val();
        if (pincode.length === 6) {
            // You can implement pincode to state mapping here
            // For demo purposes, we'll just show a message
            console.log('Pincode entered: ' + pincode);
        }
    });
});
</script>
@endpush
