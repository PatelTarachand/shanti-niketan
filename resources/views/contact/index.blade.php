@extends('layouts.app')

@section('title', 'Contact Us - Shantineketan College')
@section('description', 'Get in touch with Shantineketan College. Find our contact information, location, and send us your inquiries.')

@section('content')
<!-- Breadcrumb -->
<section class="py-3">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active">Contact Us</li>
            </ol>
        </nav>
    </div>
</section>

<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h1 class="display-4 fw-bold text-dark mb-4">Contact Us</h1>
                <p class="lead">Get in touch with us for admissions, inquiries, or any assistance you need.</p>
            </div>
            <div class="col-lg-6">
                <img src="{{ asset('snc_college.jpeg') }}" class="img-fluid rounded shadow" alt="Shantineketan College Campus">
            </div>
        </div>
    </div>
</section>

<!-- Contact Information -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-5">
                <h2 class="section-title">Get In Touch</h2>
                <p class="lead">We're here to help you with all your queries</p>
            </div>
        </div>

        <!-- Comprehensive Contact Information Card -->
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card contact-info-card">
                    <div class="card-header bg-primary text-white text-center">
                        <h3 class="mb-0"><i class="fas fa-address-book me-2"></i>Complete Contact Information</h3>
                        <p class="mb-0 mt-2">All the details you need to reach us</p>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <!-- Address Section -->
                            <div class="col-lg-4 mb-4">
                                <div class="contact-page-section">
                                    <div class="contact-page-icon">
                                        <i class="fas fa-map-marker-alt"></i>
                                    </div>
                                    <h5 class="contact-page-title">Campus Address</h5>
                                    <div class="contact-page-details">
                                        <p class="mb-2">
                                            <strong>Shantineketan College</strong><br>
                                            Ring Road No.1, Near Pani Tanki<br>
                                            Changorbhatha, Raipur<br>
                                            Chhattisgarh - 492001, India
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <!-- Phone Numbers Section -->
                            <div class="col-lg-4 mb-4">
                                <div class="contact-page-section">
                                    <div class="contact-page-icon">
                                        <i class="fas fa-phone"></i>
                                    </div>
                                    <h5 class="contact-page-title">Phone Numbers</h5>
                                    <div class="contact-page-details">
                                        <p class="contact-page-item">
                                            <i class="fas fa-building text-primary me-2"></i>
                                            <strong>Office:</strong> 0771-2243085
                                        </p>
                                        <p class="contact-page-item">
                                            <i class="fas fa-user-graduate text-success me-2"></i>
                                            <strong>Director:</strong> +91 94255 26891
                                        </p>
                                        <p class="contact-page-item">
                                            <i class="fas fa-briefcase text-warning me-2"></i>
                                            <strong>Director:</strong> +91 88273 76688
                                        </p>
                                        <p class="contact-page-item">
                                            <i class="fas fa-book text-info me-2"></i>
                                            <strong>Admin:</strong> +91 89828 80267
                                        </p>
                                        <p class="contact-page-item">
                                            <i class="fas fa-book-open text-purple me-2"></i>
                                            <strong>HOD CS:</strong> +91 78281 68418
                                        </p>
                                        <p class="contact-page-item">
                                            <i class="fas fa-bed text-danger me-2"></i>
                                            <strong>Office:</strong> +91 94255 14719
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <!-- Email & Hours Section -->
                            <div class="col-lg-4 mb-4">
                                <div class="contact-page-section">
                                    <div class="contact-page-icon">
                                        <i class="fas fa-envelope"></i>
                                    </div>
                                    <h5 class="contact-page-title">Email & Hours</h5>
                                    <div class="contact-page-details">
                                        <p class="contact-page-item">
                                            <i class="fas fa-envelope text-primary me-2"></i>
                                            <strong>General Email:</strong><br>
                                            <a href="mailto:shantiniketan2009@yahoo.co.in" class="text-decoration-none">
                                                shantiniketan2009@yahoo.co.in
                                            </a>
                                        </p>

                                        <div class="mt-4">
                                            <p class="contact-page-item">
                                                <i class="fas fa-clock text-warning me-2"></i>
                                                <strong>Office Hours:</strong>
                                            </p>
                                            <ul class="list-unstyled ms-4">
                                                <li><strong>Monday - Saturday:</strong> 9:00 AM - 5:00 PM</li>

                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Quick Contact Actions -->
                        <div class="row mt-4">
                            <div class="col-12">
                                <div class="quick-actions text-center">
                                    <h6 class="mb-3">Quick Contact Actions</h6>
                                    <div class="d-flex flex-wrap justify-content-center gap-3">
                                        <a href="tel:+919425526891" class="btn btn-outline-primary btn-sm">
                                            <i class="fas fa-phone me-1"></i>Call Admissions
                                        </a>
                                        <a href="mailto:shantiniketan2009@yahoo.co.in" class="btn btn-outline-success btn-sm">
                                            <i class="fas fa-envelope me-1"></i>Send Email
                                        </a>
                                        <a href="https://wa.me/919425526891" target="_blank" class="btn btn-outline-success btn-sm">
                                            <i class="fab fa-whatsapp me-1"></i>WhatsApp
                                        </a>
                                        <a href="#contact-form" class="btn btn-outline-warning btn-sm">
                                            <i class="fas fa-paper-plane me-1"></i>Contact Form
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Contact Form and Map -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <!-- Contact Form -->
            <div class="col-lg-6 mb-4" id="contact-form">
                <div class="card">
                    <div class="card-header">
                        <h4 class="mb-0"><i class="fas fa-paper-plane me-2"></i>Send us a Message</h4>
                    </div>
                    <div class="card-body">
                        @if(session('success'))
                            <div class="alert alert-success">
                                <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                            </div>
                        @endif

                        <form action="{{ route('contact.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="name" class="form-label">Full Name *</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                           id="name" name="name" value="{{ old('name') }}" required>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="email" class="form-label">Email Address *</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                                           id="email" name="email" value="{{ old('email') }}" required>
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="phone" class="form-label">Phone Number *</label>
                                    <input type="tel" class="form-control @error('phone') is-invalid @enderror"
                                           id="phone" name="phone" value="{{ old('phone') }}" required>
                                    @error('phone')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="course" class="form-label">Course of Interest *</label>
                                    <select class="form-control @error('course') is-invalid @enderror"
                                            id="course" name="course" required>
                                        <option value="">Select Course</option>
                                        <option value="B.Tech CSE" {{ old('course') == 'B.Tech CSE' ? 'selected' : '' }}>B.Tech Computer Science</option>
                                        <option value="B.Tech Mechanical" {{ old('course') == 'B.Tech Mechanical' ? 'selected' : '' }}>B.Tech Mechanical</option>
                                        <option value="B.Tech Civil" {{ old('course') == 'B.Tech Civil' ? 'selected' : '' }}>B.Tech Civil</option>
                                        <option value="B.Tech Electrical" {{ old('course') == 'B.Tech Electrical' ? 'selected' : '' }}>B.Tech Electrical</option>
                                        <option value="MBA" {{ old('course') == 'MBA' ? 'selected' : '' }}>MBA</option>
                                        <option value="BBA" {{ old('course') == 'BBA' ? 'selected' : '' }}>BBA</option>
                                        <option value="B.Com" {{ old('course') == 'B.Com' ? 'selected' : '' }}>B.Com</option>
                                        <option value="Diploma" {{ old('course') == 'Diploma' ? 'selected' : '' }}>Diploma Courses</option>
                                        <option value="Other" {{ old('course') == 'Other' ? 'selected' : '' }}>Other</option>
                                    </select>
                                    @error('course')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="subject" class="form-label">Subject *</label>
                                <input type="text" class="form-control @error('subject') is-invalid @enderror"
                                       id="subject" name="subject" value="{{ old('subject') }}"
                                       placeholder="Brief subject of your inquiry" required>
                                @error('subject')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="message" class="form-label">Message *</label>
                                <textarea class="form-control @error('message') is-invalid @enderror"
                                          id="message" name="message" rows="5"
                                          placeholder="Please provide details about your inquiry..." required>{{ old('message') }}</textarea>
                                @error('message')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary w-100">
                                <i class="fas fa-paper-plane me-2"></i>Send Message
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Google Map -->
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="mb-0"><i class="fas fa-map-marked-alt me-2"></i>Find Us</h4>
                    </div>
                    <div class="card-body p-0">
                        <div id="map" style="height: 400px; width: 100%;">
                            <!-- Google Maps Embed -->
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3718.123456789!2d81.629639!3d21.251384!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a28ddd123456789%3A0x123456789abcdef0!2sChangorbhatha%2C%20Raipur%2C%20Chhattisgarh%20492001!5e0!3m2!1sen!2sin!4v1703959117000!5m2!1sen!2sin"
                                width="100%"
                                height="400"
                                style="border:0;"
                                allowfullscreen=""
                                loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade">
                            </iframe>
                        </div>
                    </div>
                </div>

                <!-- Directions -->
                <div class="card mt-3">
                    <div class="card-header">
                        <h5 class="mb-0"><i class="fas fa-route me-2"></i>How to Reach</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h6><i class="fas fa-bus text-warning me-2"></i>By Bus</h6>
                                <p class="small">Regular bus services available from Raipur city center. Get down at Changorbhatha stop.</p>
                            </div>
                            <div class="col-md-6">
                                <h6><i class="fas fa-train text-warning me-2"></i>By Train</h6>
                                <p class="small">Nearest railway station is Raipur Junction (8 km away).</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <h6><i class="fas fa-car text-warning me-2"></i>By Car</h6>
                                <p class="small">Ample parking space available on campus. Follow GPS directions.</p>
                            </div>
                            <div class="col-md-6">
                                <h6><i class="fas fa-plane text-warning me-2"></i>By Air</h6>
                                <p class="small">Swami Vivekananda Airport, Raipur is 15 km away. Taxi and bus services available.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<!-- FAQ Section -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-5">
                <h2 class="section-title">Frequently Asked Questions</h2>
                <p class="lead">Quick answers to common queries</p>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-8 mx-auto">
                @php
                    $quickFaqs = \App\Models\Faq::active()->featured()->ordered()->limit(4)->get();
                @endphp

                @if($quickFaqs->count() > 0)
                    <div class="accordion" id="faqAccordion">
                        @foreach($quickFaqs as $index => $faq)
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button {{ $index > 0 ? 'collapsed' : '' }}" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#faq{{ $faq->id }}">
                                        {{ $faq->question }}
                                    </button>
                                </h2>
                                <div id="faq{{ $faq->id }}" class="accordion-collapse collapse {{ $index == 0 ? 'show' : '' }}"
                                     data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        {{ $faq->answer }}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="accordion" id="faqAccordion">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                                    What are the admission requirements?
                                </button>
                            </h2>
                            <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Admission requirements vary by program. Generally, you need to have completed 12th grade with relevant subjects and meet minimum percentage criteria. Please visit our admission page for detailed requirements.
                                </div>
                            </div>
                        </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                                What is the fee structure?
                            </button>
                        </h2>
                        <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Fee structure varies by course and category. We offer various payment options and scholarship programs. Please contact our admission office for detailed fee information.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                                Do you provide hostel facilities?
                            </button>
                        </h2>
                        <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Yes, we provide separate hostel facilities for boys and girls with all modern amenities including Wi-Fi, mess, recreation rooms, and 24/7 security.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq4">
                                What about placement opportunities?
                            </button>
                        </h2>
                        <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                We have a dedicated placement cell with 100% placement record. Top companies visit our campus for recruitment. We also provide training and career guidance to students.
                            </div>
                        </div>
                    </div>
                @endif

                <div class="text-center mt-4">
                    <a href="{{ route('faq.index') }}" class="btn btn-primary btn-lg">
                        <i class="fas fa-question-circle me-2"></i>View All FAQs
                    </a>
                    <p class="text-muted mt-2">Find answers to more questions in our comprehensive FAQ section</p>
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

        // Email validation
        var email = $('#email').val();
        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (email && !emailRegex.test(email)) {
            isValid = false;
            $('#email').addClass('is-invalid');
        }

        // Phone validation
        var phone = $('#phone').val();
        var phoneRegex = /^[0-9+\-\s()]+$/;
        if (phone && !phoneRegex.test(phone)) {
            isValid = false;
            $('#phone').addClass('is-invalid');
        }

        if (!isValid) {
            e.preventDefault();
            alert('Please fill all required fields correctly.');
        }
    });

    // Remove validation classes on input
    $('input, select, textarea').on('input change', function() {
        $(this).removeClass('is-invalid');
    });
});
</script>
@endpush

@push('styles')
<style>
/* Contact Information Card Styles */
.contact-info-card {
    border: none;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    border-radius: 15px;
    overflow: hidden;
}

.contact-info-card .card-header {
    background: linear-gradient(135deg, #007bff 0%, #0056b3 100%);
    border: none;
    padding: 2rem 1.5rem;
}

.contact-page-section {
    text-align: center;
    padding: 1.5rem;
    height: 100%;
    border-radius: 15px;
    background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%);
    transition: all 0.3s ease;
    border: 1px solid rgba(0, 123, 255, 0.1);
    position: relative;
    overflow: hidden;
}

.contact-page-section::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(135deg, rgba(0, 123, 255, 0.05) 0%, rgba(255, 193, 7, 0.05) 100%);
    opacity: 0;
    transition: opacity 0.3s ease;
    pointer-events: none;
}

.contact-page-section:hover::before {
    opacity: 1;
}

.contact-page-section:hover {
    transform: translateY(-8px);
    box-shadow: 0 15px 35px rgba(0, 123, 255, 0.15);
    border-color: rgba(0, 123, 255, 0.3);
}

.contact-page-icon {
    width: 90px;
    height: 90px;
    background: linear-gradient(135deg, #007bff 0%, #0056b3 100%);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 1.5rem;
    font-size: 2.2rem;
    color: #fff;
    box-shadow: 0 8px 25px rgba(0, 123, 255, 0.3);
    transition: all 0.3s ease;
    position: relative;
    z-index: 1;
}

.contact-page-section:hover .contact-page-icon {
    transform: scale(1.1) rotateY(10deg);
    box-shadow: 0 12px 35px rgba(0, 123, 255, 0.4);
}

.contact-page-title {
    color: #2c3e50;
    font-weight: 700;
    margin-bottom: 1.2rem;
    font-size: 1.35rem;
    position: relative;
    z-index: 1;
}

.contact-page-details {
    text-align: left;
    position: relative;
    z-index: 1;
}

.contact-page-item {
    margin-bottom: 1rem;
    padding: 0.75rem;
    border-radius: 8px;
    background: rgba(255, 255, 255, 0.7);
    border-left: 4px solid #007bff;
    font-size: 0.95rem;
    transition: all 0.3s ease;
}

.contact-page-item:hover {
    background: rgba(0, 123, 255, 0.05);
    transform: translateX(5px);
    border-left-color: #ffc107;
}

.contact-page-item:last-child {
    margin-bottom: 0;
}

.contact-page-item strong {
    color: #2c3e50;
    font-weight: 600;
}

.quick-actions {
    background: #f8f9fa;
    padding: 1.5rem;
    border-radius: 10px;
    border-top: 3px solid #007bff;
}

.quick-actions .btn {
    margin: 0.25rem;
    border-radius: 25px;
    padding: 0.5rem 1rem;
    font-weight: 500;
    transition: all 0.3s ease;
}

.quick-actions .btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(0,0,0,0.2);
}

.text-purple {
    color: #6f42c1 !important;
}

/* Enhanced Quick Actions */
.quick-actions {
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
    padding: 2rem;
    border-radius: 15px;
    border-top: 4px solid #007bff;
    box-shadow: 0 5px 15px rgba(0, 123, 255, 0.1);
    transition: all 0.3s ease;
}

.quick-actions:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(0, 123, 255, 0.15);
}

.quick-actions .btn {
    margin: 0.5rem;
    border-radius: 30px;
    padding: 0.75rem 1.5rem;
    font-weight: 600;
    transition: all 0.3s ease;
    border: 2px solid transparent;
}

.quick-actions .btn:hover {
    transform: translateY(-3px) scale(1.05);
    box-shadow: 0 8px 20px rgba(0,0,0,0.2);
}

.quick-actions .btn-outline-primary:hover {
    background: linear-gradient(135deg, #007bff 0%, #0056b3 100%);
    border-color: #007bff;
}

.quick-actions .btn-outline-success:hover {
    background: linear-gradient(135deg, #28a745 0%, #1e7e34 100%);
    border-color: #28a745;
}

.quick-actions .btn-outline-warning:hover {
    background: linear-gradient(135deg, #ffc107 0%, #e0a800 100%);
    border-color: #ffc107;
    color: #212529;
}

/* Responsive Design */
@media (max-width: 768px) {
    .contact-page-section {
        margin-bottom: 1.5rem;
        padding: 1.2rem;
    }

    .contact-page-icon {
        width: 70px;
        height: 70px;
        font-size: 1.8rem;
    }

    .contact-page-title {
        font-size: 1.2rem;
    }

    .contact-page-item {
        padding: 0.6rem;
        margin-bottom: 0.8rem;
    }

    .quick-actions {
        padding: 1.5rem;
    }

    .quick-actions .btn {
        width: 100%;
        margin: 0.25rem 0;
        padding: 0.8rem 1rem;
    }

    .contact-info-card .card-header {
        padding: 1.5rem 1rem;
    }

    .contact-page-section:hover {
        transform: translateY(-4px);
    }
}

/* Animation for smooth scrolling to contact form */
html {
    scroll-behavior: smooth;
}

/* Enhanced hover effects */
.contact-section .contact-icon {
    transition: all 0.3s ease;
}

.contact-section:hover .contact-icon {
    transform: scale(1.1);
    box-shadow: 0 8px 25px rgba(255, 193, 7, 0.4);
}

/* Email link styling */
a[href^="mailto:"] {
    color: #007bff;
    font-weight: 500;
}

a[href^="mailto:"]:hover {
    color: #0056b3;
    text-decoration: underline !important;
}
</style>
@endpush
