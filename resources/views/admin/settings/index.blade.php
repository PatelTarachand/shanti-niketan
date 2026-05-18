@extends('admin.layouts.app')

@section('title', 'Site Settings')
@section('page-title', 'Site Settings')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-white py-3">
                <h5 class="mb-0 fw-bold"><i class="fas fa-cog me-2"></i>General Settings</h5>
            </div>
            <div class="card-body p-4">
                <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <!-- Basic Information -->
                        <div class="col-md-6">
                            <h6 class="mb-3 text-primary">Basic Information</h6>
                            <div class="mb-3">
                                <label class="form-label">College Name (English)</label>
                                <input type="text" name="college_name_en" class="form-control @error('college_name_en') is-invalid @enderror" value="{{ old('college_name_en', $settings->college_name_en) }}" required>
                                @error('college_name_en')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">College Name (Hindi)</label>
                                <input type="text" name="college_name_hi" class="form-control @error('college_name_hi') is-invalid @enderror" value="{{ old('college_name_hi', $settings->college_name_hi) }}" required>
                                @error('college_name_hi')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Contact Email</label>
                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $settings->email) }}" required>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Contact Details -->
                        <div class="col-md-6">
                            <h6 class="mb-3 text-primary">Contact Details</h6>
                            <div class="mb-3">
                                <label class="form-label">Phone Number 1</label>
                                <input type="text" name="phone_1" class="form-control @error('phone_1') is-invalid @enderror" value="{{ old('phone_1', $settings->phone_1) }}" required>
                                @error('phone_1')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Phone Number 2</label>
                                <input type="text" name="phone_2" class="form-control @error('phone_2') is-invalid @enderror" value="{{ old('phone_2', $settings->phone_2) }}">
                                @error('phone_2')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Address</label>
                                <textarea name="address" class="form-control @error('address') is-invalid @enderror" rows="3" required>{{ old('address', $settings->address) }}</textarea>
                                @error('address')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <hr class="my-4">

                    <div class="row">
                        <!-- Branding -->
                        <div class="col-md-6">
                            <h6 class="mb-3 text-primary">Branding</h6>
                            <div class="mb-3">
                                <label class="form-label">College Logo</label>
                                <input type="file" name="logo" class="form-control @error('logo') is-invalid @enderror">
                                @error('logo')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                @if($settings->logo)
                                    <div class="mt-2">
                                        <p class="mb-1 small text-muted">Current Logo:</p>
                                        <img src="{{ asset('storage/' . $settings->logo) }}" alt="Logo" height="50" class="border p-1 bg-light">
                                    </div>
                                @else
                                    <div class="mt-2">
                                        <p class="mb-1 small text-muted">Current Default Logo:</p>
                                        <img src="{{ asset('snc.jpeg') }}" alt="Default Logo" height="50" class="border p-1 bg-light">
                                    </div>
                                @endif
                            </div>
                        </div>

                        <!-- Social Media -->
                        <div class="col-md-6">
                            <h6 class="mb-3 text-primary">Social Media Links</h6>
                            <div class="input-group mb-3">
                                <span class="input-group-text text-white" style="background: #3b5998; width: 45px;"><i class="fab fa-facebook-f"></i></span>
                                <input type="url" name="facebook_url" class="form-control" placeholder="Facebook URL" value="{{ old('facebook_url', $settings->facebook_url) }}">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text text-white" style="background: #1da1f2; width: 45px;"><i class="fab fa-twitter"></i></span>
                                <input type="url" name="twitter_url" class="form-control" placeholder="Twitter URL" value="{{ old('twitter_url', $settings->twitter_url) }}">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text text-white" style="background: linear-gradient(45deg, #f09433 0%, #e6683c 25%, #dc2743 50%, #cc2366 75%, #bc1888 100%); width: 45px;"><i class="fab fa-instagram"></i></span>
                                <input type="url" name="instagram_url" class="form-control" placeholder="Instagram URL" value="{{ old('instagram_url', $settings->instagram_url) }}">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text text-white" style="background: #0077b5; width: 45px;"><i class="fab fa-linkedin-in"></i></span>
                                <input type="url" name="linkedin_url" class="form-control" placeholder="LinkedIn URL" value="{{ old('linkedin_url', $settings->linkedin_url) }}">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text text-white" style="background: #ff0000; width: 45px;"><i class="fab fa-youtube"></i></span>
                                <input type="url" name="youtube_url" class="form-control" placeholder="YouTube URL" value="{{ old('youtube_url', $settings->youtube_url) }}">
                            </div>
                        </div>
                    </div>

                    <div class="mt-4 text-end">
                        <button type="submit" class="btn btn-primary px-5">
                            <i class="fas fa-save me-2"></i>Save Changes
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
