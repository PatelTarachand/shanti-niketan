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
                                <p class="mb-0" style="color:white">Total Items</p>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="stat-item">
                                <h3 class="text-warning fw-bold">{{ $categories->count() }}</h3>
                                <p class="mb-0" style="color:white">Categories</p>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="stat-item">
                                <h3 class="text-warning fw-bold">{{ $gallery->flatten()->where('type', 'image')->count() }}</h3>
                                <p class="mb-0" style="color:white">Photos</p>
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

<!-- Filter Section -->
<section class="py-3 bg-light">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="filter-buttons">
                    <button class="btn btn-warning active" data-filter="all">
                        <i class="fas fa-th me-1"></i>All Items
                        @if(isset($gallery))
                            ({{ $gallery->flatten()->count() }})
                        @endif
                    </button>
                    @foreach($categories as $category)
                        <button class="btn btn-outline-warning" data-filter="{{ $category }}">
                            <i class="fas fa-tag me-1"></i>{{ ucfirst($category) }}
                            @if(isset($gallery[$category]))
                                ({{ $gallery[$category]->count() }})
                            @endif
                        </button>
                    @endforeach
                </div>
            </div>
            <div class="col-md-6">
                <div class="d-flex justify-content-end align-items-center gap-3">
                    <div class="search-box">
                        <input type="text" class="form-control form-control-sm" id="gallerySearch"
                               placeholder="Search gallery..." style="width: 200px;">
                    </div>
                    <div class="view-toggle">
                        <button class="btn btn-outline-primary btn-sm active" data-view="grid">
                            <i class="fas fa-th"></i> Grid
                        </button>
                        <button class="btn btn-outline-primary btn-sm" data-view="list">
                            <i class="fas fa-list"></i> List
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Dynamic Gallery Content -->
@if($gallery->flatten()->count() > 0)
    @foreach($gallery as $category => $items)
    <section class="py-5 {{ $loop->even ? 'bg-light' : '' }}" data-category="{{ $category }}">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb-5">
                    <h2 class="section-title">{{ ucfirst($category) }}</h2>
                    <p class="lead">{{ $items->count() }} items in this category</p>
                </div>
            </div>

            <div class="row gallery-grid" id="gallery-{{ Str::slug($category) }}">
                @foreach($items as $item)
                <div class="col-lg-4 col-md-6 mb-4 gallery-item" data-category="{{ $category }}">
                    <div class="card h-100 gallery-card">
                        <div class="gallery-image-container position-relative">
                            @if($item->type === 'image')
                                <img src="{{ $item->image_path ? Storage::url($item->image_path) : asset($item->image_path) }}"
                                     class="card-img-top gallery-image"
                                     alt="{{ $item->title }}"
                                     data-bs-toggle="modal"
                                     data-bs-target="#imageModal"
                                     data-image="{{ $item->image_path ? Storage::url($item->image_path) : asset($item->image_path) }}"
                                     data-title="{{ $item->title }}"
                                     data-description="{{ $item->description }}">
                            @else
                                <div class="video-thumbnail position-relative">
                                    <img src="{{ $item->thumbnail ? Storage::url($item->thumbnail) : 'https://via.placeholder.com/400x300/FFD700/2C3E50?text=Video' }}"
                                         class="card-img-top"
                                         alt="{{ $item->title }}">
                                    <div class="video-play-button position-absolute top-50 start-50 translate-middle">
                                        <button class="btn btn-warning btn-lg rounded-circle"
                                                data-bs-toggle="modal"
                                                data-bs-target="#videoModal"
                                                data-video="{{ $item->image_path ? Storage::url($item->image_path) : asset($item->image_path) }}"
                                                data-title="{{ $item->title }}"
                                                data-description="{{ $item->description }}">
                                            <i class="fas fa-play"></i>
                                        </button>
                                    </div>
                                </div>
                            @endif

                            <!-- Overlay -->
                            <div class="gallery-overlay">
                                <div class="overlay-content">
                                    @if($item->type === 'image')
                                        <button class="btn btn-light btn-sm"
                                                data-bs-toggle="modal"
                                                data-bs-target="#imageModal"
                                                data-image="{{ $item->image_path ? Storage::url($item->image_path) : asset($item->image_path) }}"
                                                data-title="{{ $item->title }}"
                                                data-description="{{ $item->description }}">
                                            <i class="fas fa-eye me-1"></i>View
                                        </button>
                                    @else
                                        <button class="btn btn-light btn-sm"
                                                data-bs-toggle="modal"
                                                data-bs-target="#videoModal"
                                                data-video="{{ $item->image_path ? Storage::url($item->image_path) : asset($item->image_path) }}"
                                                data-title="{{ $item->title }}"
                                                data-description="{{ $item->description }}">
                                            <i class="fas fa-play me-1"></i>Play
                                        </button>
                                    @endif
                                </div>
                            </div>

                            <!-- Type Badge -->
                            <div class="position-absolute top-0 end-0 m-2">
                                <span class="badge bg-{{ $item->type === 'image' ? 'success' : 'danger' }}">
                                    <i class="fas fa-{{ $item->type === 'image' ? 'image' : 'video' }} me-1"></i>
                                    {{ ucfirst($item->type) }}
                                </span>
                            </div>
                        </div>

                        <div class="card-body">
                            <h5 class="card-title">{{ $item->title }}</h5>
                            @if($item->description)
                                <p class="card-text text-muted">{{ Str::limit($item->description, 80) }}</p>
                            @endif
                            <div class="d-flex justify-content-between align-items-center">
                                <small class="text-muted">
                                    <i class="fas fa-calendar me-1"></i>
                                    {{ $item->created_at->format('M d, Y') }}
                                </small>
                                @if($item->is_featured)
                                    <span class="badge bg-warning text-dark">Featured</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endforeach
@else
    <!-- No Gallery Items -->
    <section class="py-5">
        <div class="container">
            <div class="text-center py-5">
                <i class="fas fa-camera fa-4x text-muted mb-4"></i>
                <h3>Gallery Coming Soon</h3>
                <p class="text-muted">We're working on adding photos and videos to showcase our campus life.</p>
                <a href="{{ route('contact.index') }}" class="btn btn-primary">
                    <i class="fas fa-phone me-2"></i>Contact Us
                </a>
            </div>
        </div>
    </section>
@endif

<!-- Image Modal -->
<div class="modal fade" id="imageModal" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="imageModalTitle">Image Title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body text-center">
                <img src="" id="imageModalImage" class="img-fluid rounded" alt="">
                <p id="imageModalDescription" class="mt-3 text-muted"></p>
            </div>
        </div>
    </div>
</div>

<!-- Video Modal -->
<div class="modal fade" id="videoModal" tabindex="-1">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="videoModalTitle">Video Title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body text-center">
                <video id="videoModalPlayer" class="w-100" controls style="max-height: 70vh;">
                    <source src="" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
                <p id="videoModalDescription" class="mt-3 text-muted"></p>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
.hero-section {
    background: linear-gradient(135deg, #2C3E50 0%, #34495e 100%);
}

.stat-item h3 {
    color: #FFD700;
    font-size: 2rem;
}

.filter-buttons .btn {
    margin: 0.25rem;
}

.gallery-card {
    transition: all 0.3s ease;
    border: none;
    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
}

.gallery-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 25px rgba(0,0,0,0.15);
}

.gallery-image-container {
    overflow: hidden;
    height: 250px;
}

.gallery-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: all 0.3s ease;
    cursor: pointer;
}

.gallery-image:hover {
    transform: scale(1.05);
}

.gallery-item {
    transition: all 0.3s ease;
    opacity: 1;
    transform: scale(1);
}

.gallery-item:hover {
    transform: translateY(-5px);
}

.gallery-item.filtering {
    transition: opacity 0.3s ease, transform 0.3s ease;
}

.gallery-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0,0,0,0.7);
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transition: all 0.3s ease;
}

.gallery-card:hover .gallery-overlay {
    opacity: 1;
}

.video-thumbnail {
    height: 250px;
}

.video-thumbnail img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.video-play-button {
    opacity: 0.9;
}

.video-play-button:hover {
    opacity: 1;
    transform: translate(-50%, -50%) scale(1.1);
}

.section-title {
    position: relative;
    display: inline-block;
}

.section-title::after {
    content: '';
    position: absolute;
    bottom: -10px;
    left: 50%;
    transform: translateX(-50%);
    width: 60px;
    height: 3px;
    background: #FFD700;
}

@media (max-width: 768px) {
    .hero-section .display-4 {
        font-size: 2.5rem;
    }

    .filter-buttons {
        text-align: center;
        margin-bottom: 1rem;
    }

    .view-toggle {
        text-align: center !important;
    }

    .gallery-image-container {
        height: 200px;
    }
}
</style>
@endpush

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Filter functionality
    const filterButtons = document.querySelectorAll('.filter-buttons .btn');
    const galleryItems = document.querySelectorAll('.gallery-item');
    const gallerySections = document.querySelectorAll('section[data-category]');

    filterButtons.forEach(button => {
        button.addEventListener('click', function() {
            // Update active button
            filterButtons.forEach(btn => {
                btn.classList.remove('active', 'btn-warning');
                btn.classList.add('btn-outline-warning');
            });
            this.classList.remove('btn-outline-warning');
            this.classList.add('active', 'btn-warning');

            const filter = this.getAttribute('data-filter');

            if (filter === 'all') {
                // Show all sections and items with smooth animation
                gallerySections.forEach(section => {
                    section.style.display = 'block';
                    section.style.opacity = '1';
                });
                galleryItems.forEach(item => {
                    item.style.display = 'block';
                    item.style.opacity = '1';
                    item.style.transform = 'scale(1)';
                });
            } else {
                // Hide all sections first
                gallerySections.forEach(section => {
                    const sectionCategory = section.getAttribute('data-category');
                    if (sectionCategory === filter) {
                        section.style.display = 'block';
                        section.style.opacity = '1';
                    } else {
                        section.style.display = 'none';
                        section.style.opacity = '0';
                    }
                });

                // Show/hide individual items with animation
                galleryItems.forEach(item => {
                    const itemCategory = item.getAttribute('data-category');
                    if (itemCategory === filter) {
                        item.style.display = 'block';
                        item.style.opacity = '1';
                        item.style.transform = 'scale(1)';
                    } else {
                        item.style.opacity = '0';
                        item.style.transform = 'scale(0.8)';
                        setTimeout(() => {
                            if (item.style.opacity === '0') {
                                item.style.display = 'none';
                            }
                        }, 300);
                    }
                });
            }
        });
    });

    // Update filter counts
    function updateFilterCounts() {
        const allButton = document.querySelector('[data-filter="all"]');
        const visibleItems = document.querySelectorAll('.gallery-item[style*="display: block"], .gallery-item:not([style*="display: none"])');

        // Update All button count
        const allText = allButton.textContent.replace(/\(\d+\)/, '');
        allButton.innerHTML = `<i class="fas fa-th me-1"></i>${allText.trim()} (${visibleItems.length})`;

        // Update category button counts
        filterButtons.forEach(button => {
            const filter = button.getAttribute('data-filter');
            if (filter !== 'all') {
                const categoryItems = document.querySelectorAll(`[data-category="${filter}"][style*="display: block"], [data-category="${filter}"]:not([style*="display: none"])`);
                const buttonText = button.textContent.replace(/\(\d+\)/, '').trim();
                button.innerHTML = `<i class="fas fa-tag me-1"></i>${buttonText} (${categoryItems.length})`;
            }
        });
    }

    // View toggle functionality
    const viewToggleButtons = document.querySelectorAll('.view-toggle .btn');

    viewToggleButtons.forEach(button => {
        button.addEventListener('click', function() {
            // Update active button
            viewToggleButtons.forEach(btn => btn.classList.remove('active'));
            this.classList.add('active');

            const view = this.getAttribute('data-view');

            if (view === 'list') {
                galleryItems.forEach(item => {
                    item.classList.remove('col-lg-4', 'col-md-6');
                    item.classList.add('col-12');
                    const card = item.querySelector('.gallery-card');
                    if (card) card.classList.add('mb-3');
                });
            } else {
                galleryItems.forEach(item => {
                    item.classList.remove('col-12');
                    item.classList.add('col-lg-4', 'col-md-6');
                    const card = item.querySelector('.gallery-card');
                    if (card) card.classList.remove('mb-3');
                });
            }
        });
    });

    // Search functionality
    const searchInput = document.getElementById('gallerySearch');
    if (searchInput) {
        searchInput.addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase().trim();

            galleryItems.forEach(item => {
                const title = item.querySelector('.card-title')?.textContent.toLowerCase() || '';
                const description = item.querySelector('.card-text')?.textContent.toLowerCase() || '';
                const category = item.getAttribute('data-category')?.toLowerCase() || '';

                const matches = title.includes(searchTerm) ||
                               description.includes(searchTerm) ||
                               category.includes(searchTerm);

                if (searchTerm === '' || matches) {
                    item.style.display = 'block';
                    item.style.opacity = '1';
                    item.style.transform = 'scale(1)';
                } else {
                    item.style.opacity = '0';
                    item.style.transform = 'scale(0.8)';
                    setTimeout(() => {
                        if (item.style.opacity === '0') {
                            item.style.display = 'none';
                        }
                    }, 300);
                }
            });

            // Reset filter buttons when searching
            if (searchTerm !== '') {
                filterButtons.forEach(btn => {
                    btn.classList.remove('active', 'btn-warning');
                    btn.classList.add('btn-outline-warning');
                });
                document.querySelector('[data-filter="all"]').classList.add('active', 'btn-warning');
                document.querySelector('[data-filter="all"]').classList.remove('btn-outline-warning');
            }
        });
    }

    // Image modal functionality
    const imageModalTriggers = document.querySelectorAll('[data-bs-target="#imageModal"]');

    imageModalTriggers.forEach(trigger => {
        trigger.addEventListener('click', function() {
            const image = this.getAttribute('data-image');
            const title = this.getAttribute('data-title');
            const description = this.getAttribute('data-description');

            const modalImage = document.getElementById('imageModalImage');
            const modalTitle = document.getElementById('imageModalTitle');
            const modalDescription = document.getElementById('imageModalDescription');

            if (modalImage) modalImage.src = image;
            if (modalTitle) modalTitle.textContent = title;
            if (modalDescription) modalDescription.textContent = description || '';
        });
    });

    // Video modal functionality
    const videoModalTriggers = document.querySelectorAll('[data-bs-target="#videoModal"]');

    videoModalTriggers.forEach(trigger => {
        trigger.addEventListener('click', function() {
            const video = this.getAttribute('data-video');
            const title = this.getAttribute('data-title');
            const description = this.getAttribute('data-description');

            const videoPlayer = document.getElementById('videoModalPlayer');
            const videoSource = videoPlayer ? videoPlayer.querySelector('source') : null;
            const videoTitle = document.getElementById('videoModalTitle');
            const videoDescription = document.getElementById('videoModalDescription');

            if (videoSource) {
                videoSource.src = video;
                videoPlayer.load();
            }
            if (videoTitle) videoTitle.textContent = title;
            if (videoDescription) videoDescription.textContent = description || '';
        });
    });
});

// Pause video when modal closes
const videoModal = document.getElementById('videoModal');
if (videoModal) {
    videoModal.addEventListener('hidden.bs.modal', function() {
        const videoPlayer = document.getElementById('videoModalPlayer');
        if (videoPlayer) {
            videoPlayer.pause();
        }
    });
}
</script>
@endpush
