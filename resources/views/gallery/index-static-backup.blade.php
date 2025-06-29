@extends('layouts.app')

@section('title', 'Gallery - Shantineketan College')
@section('description', 'Explore our campus life through photos and videos. See our facilities, events, and student activities.')

@section('content')
<!-- Hero Section -->
<section class="hero-section bg-primary text-white py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <h1 class="display-4 fw-bold mb-3">Photo Gallery</h1>
                <p class="lead mb-4">Explore our vibrant campus life, modern facilities, and memorable moments captured through our lens.</p>
                <div class="hero-stats">
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <div class="stat-item">
                                <h3 class="text-warning fw-bold">{{ $gallery->flatten()->count() }}</h3>
                                <p class="mb-0">Total Items</p>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="stat-item">
                                <h3 class="text-warning fw-bold">{{ $categories->count() }}</h3>
                                <p class="mb-0">Categories</p>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="stat-item">
                                <h3 class="text-warning fw-bold">{{ $gallery->flatten()->where('type', 'image')->count() }}</h3>
                                <p class="mb-0">Photos</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 text-center">
                <i class="fas fa-camera fa-5x opacity-75"></i>
            </div>
        </div>
    </div>
</section>

<!-- Gallery Categories -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-5">
                <h2 class="section-title">Photo Categories</h2>
                <p class="lead">Browse through different aspects of our college life</p>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100">
                    <div class="gallery-item">
                        <img src="https://via.placeholder.com/400x300/FFD700/2C3E50?text=Campus+Infrastructure" class="card-img-top" alt="Campus Infrastructure">
                        <div class="gallery-overlay">
                            <a href="#" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#campusModal">
                                <i class="fas fa-eye me-2"></i>View Gallery
                            </a>
                        </div>
                    </div>
                    <div class="card-body text-center">
                        <h5>Campus Infrastructure</h5>
                        <p>Modern buildings, laboratories, library, and facilities</p>
                        <span class="badge bg-warning text-dark">25 Photos</span>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100">
                    <div class="gallery-item">
                        <img src="https://via.placeholder.com/400x300/FFD700/2C3E50?text=Academic+Activities" class="card-img-top" alt="Academic Activities">
                        <div class="gallery-overlay">
                            <a href="#" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#academicModal">
                                <i class="fas fa-eye me-2"></i>View Gallery
                            </a>
                        </div>
                    </div>
                    <div class="card-body text-center">
                        <h5>Academic Activities</h5>
                        <p>Classrooms, laboratories, workshops, and seminars</p>
                        <span class="badge bg-warning text-dark">30 Photos</span>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100">
                    <div class="gallery-item">
                        <img src="https://via.placeholder.com/400x300/FFD700/2C3E50?text=Cultural+Events" class="card-img-top" alt="Cultural Events">
                        <div class="gallery-overlay">
                            <a href="#" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#culturalModal">
                                <i class="fas fa-eye me-2"></i>View Gallery
                            </a>
                        </div>
                    </div>
                    <div class="card-body text-center">
                        <h5>Cultural Events</h5>
                        <p>Annual fest, cultural programs, and celebrations</p>
                        <span class="badge bg-warning text-dark">40 Photos</span>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100">
                    <div class="gallery-item">
                        <img src="https://via.placeholder.com/400x300/FFD700/2C3E50?text=Sports+Activities" class="card-img-top" alt="Sports Activities">
                        <div class="gallery-overlay">
                            <a href="#" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#sportsModal">
                                <i class="fas fa-eye me-2"></i>View Gallery
                            </a>
                        </div>
                    </div>
                    <div class="card-body text-center">
                        <h5>Sports Activities</h5>
                        <p>Sports events, tournaments, and fitness activities</p>
                        <span class="badge bg-warning text-dark">20 Photos</span>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100">
                    <div class="gallery-item">
                        <img src="https://via.placeholder.com/400x300/FFD700/2C3E50?text=Graduation+Ceremony" class="card-img-top" alt="Graduation Ceremony">
                        <div class="gallery-overlay">
                            <a href="#" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#graduationModal">
                                <i class="fas fa-eye me-2"></i>View Gallery
                            </a>
                        </div>
                    </div>
                    <div class="card-body text-center">
                        <h5>Graduation Ceremony</h5>
                        <p>Convocation, degree distribution, and celebrations</p>
                        <span class="badge bg-warning text-dark">35 Photos</span>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100">
                    <div class="gallery-item">
                        <img src="https://via.placeholder.com/400x300/FFD700/2C3E50?text=Industry+Visits" class="card-img-top" alt="Industry Visits">
                        <div class="gallery-overlay">
                            <a href="#" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#industryModal">
                                <i class="fas fa-eye me-2"></i>View Gallery
                            </a>
                        </div>
                    </div>
                    <div class="card-body text-center">
                        <h5>Industry Visits</h5>
                        <p>Industrial tours, company visits, and internships</p>
                        <span class="badge bg-warning text-dark">15 Photos</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Video Gallery -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-5">
                <h2 class="section-title">Video Gallery</h2>
                <p class="lead">Watch our college in action</p>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6 mb-4">
                <div class="card">
                    <div class="position-relative">
                        <img src="https://via.placeholder.com/600x300/FFD700/2C3E50?text=College+Tour+Video" class="card-img-top" alt="College Tour">
                        <div class="position-absolute top-50 start-50 translate-middle">
                            <button class="btn btn-warning btn-lg rounded-circle" data-bs-toggle="modal" data-bs-target="#videoModal1">
                                <i class="fas fa-play"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <h5>Virtual Campus Tour</h5>
                        <p>Take a virtual tour of our beautiful campus and modern facilities.</p>
                        <small class="text-muted">Duration: 5:30 minutes</small>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 mb-4">
                <div class="card">
                    <div class="position-relative">
                        <img src="https://via.placeholder.com/600x300/FFD700/2C3E50?text=Student+Life+Video" class="card-img-top" alt="Student Life">
                        <div class="position-absolute top-50 start-50 translate-middle">
                            <button class="btn btn-warning btn-lg rounded-circle" data-bs-toggle="modal" data-bs-target="#videoModal2">
                                <i class="fas fa-play"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <h5>Student Life at Shantineketan</h5>
                        <p>Experience the vibrant student life and activities at our college.</p>
                        <small class="text-muted">Duration: 3:45 minutes</small>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 mb-4">
                <div class="card">
                    <div class="position-relative">
                        <img src="https://via.placeholder.com/600x300/FFD700/2C3E50?text=Annual+Fest+Video" class="card-img-top" alt="Annual Fest">
                        <div class="position-absolute top-50 start-50 translate-middle">
                            <button class="btn btn-warning btn-lg rounded-circle" data-bs-toggle="modal" data-bs-target="#videoModal3">
                                <i class="fas fa-play"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <h5>Annual Cultural Fest 2024</h5>
                        <p>Highlights from our grand annual cultural festival and competitions.</p>
                        <small class="text-muted">Duration: 8:20 minutes</small>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 mb-4">
                <div class="card">
                    <div class="position-relative">
                        <img src="https://via.placeholder.com/600x300/FFD700/2C3E50?text=Placement+Success+Video" class="card-img-top" alt="Placement Success">
                        <div class="position-absolute top-50 start-50 translate-middle">
                            <button class="btn btn-warning btn-lg rounded-circle" data-bs-toggle="modal" data-bs-target="#videoModal4">
                                <i class="fas fa-play"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <h5>Placement Success Stories</h5>
                        <p>Hear from our successful alumni about their career journey.</p>
                        <small class="text-muted">Duration: 6:15 minutes</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Recent Photos -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-5">
                <h2 class="section-title">Recent Photos</h2>
                <p class="lead">Latest moments captured at our college</p>
            </div>
        </div>

        <div class="row">
            @for($i = 1; $i <= 12; $i++)
            <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                <div class="gallery-item">
                    <img src="https://via.placeholder.com/300x200/FFD700/2C3E50?text=Photo+{{ $i }}" class="img-fluid rounded" alt="Recent Photo {{ $i }}">
                    <div class="gallery-overlay">
                        <button class="btn btn-light" onclick="openLightbox({{ $i }})">
                            <i class="fas fa-expand"></i>
                        </button>
                    </div>
                </div>
            </div>
            @endfor
        </div>

        <div class="text-center mt-4">
            <a href="{{ route('gallery.photos') }}" class="btn btn-primary btn-lg">View All Photos</a>
        </div>
    </div>
</section>

<!-- Photo Modal (Example) -->
<div class="modal fade" id="campusModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Campus Infrastructure</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div id="campusCarousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="https://via.placeholder.com/800x500/FFD700/2C3E50?text=Main+Building" class="d-block w-100" alt="Main Building">
                        </div>
                        <div class="carousel-item">
                            <img src="https://via.placeholder.com/800x500/FFD700/2C3E50?text=Library" class="d-block w-100" alt="Library">
                        </div>
                        <div class="carousel-item">
                            <img src="https://via.placeholder.com/800x500/FFD700/2C3E50?text=Laboratory" class="d-block w-100" alt="Laboratory">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#campusCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#campusCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Video Modal (Example) -->
<div class="modal fade" id="videoModal1" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Virtual Campus Tour</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="ratio ratio-16x9">
                    <iframe src="https://www.youtube.com/embed/dQw4w9WgXcQ" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Lightbox for individual photos -->
<div class="modal fade" id="lightboxModal" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content bg-transparent border-0">
            <div class="modal-body p-0">
                <button type="button" class="btn-close btn-close-white position-absolute top-0 end-0 m-3" data-bs-dismiss="modal" style="z-index: 1051;"></button>
                <img id="lightboxImage" src="" class="img-fluid w-100" alt="Lightbox Image">
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
function openLightbox(imageNumber) {
    const lightboxImage = document.getElementById('lightboxImage');
    lightboxImage.src = `https://via.placeholder.com/800x600/FFD700/2C3E50?text=Photo+${imageNumber}`;

    const lightboxModal = new bootstrap.Modal(document.getElementById('lightboxModal'));
    lightboxModal.show();
}

$(document).ready(function() {
    // Initialize all carousels
    $('.carousel').carousel({
        interval: 3000,
        ride: 'carousel'
    });

    // Pause video when modal is closed
    $('.modal').on('hidden.bs.modal', function () {
        $(this).find('iframe').each(function() {
            $(this).attr('src', $(this).attr('src'));
        });
    });
});
</script>
@endpush
