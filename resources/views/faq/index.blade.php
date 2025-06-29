@extends('layouts.app')

@section('title', 'Frequently Asked Questions - Shantineketan College')
@section('description', 'Find answers to commonly asked questions about admissions, courses, fees, facilities, and more at Shantineketan College.')

@section('content')
<!-- Breadcrumb -->
<section class="py-3">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active">FAQ</li>
            </ol>
        </nav>
    </div>
</section>

<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h1 class="display-4 fw-bold text-dark mb-4">Frequently Asked Questions</h1>
                <p class="lead">Find quick answers to common questions about our college, programs, and services.</p>
            </div>
            <div class="col-lg-6">
                <img src="{{ asset('snc_college.jpeg') }}" class="img-fluid rounded shadow" alt="FAQ - Shantineketan College">
            </div>
        </div>
    </div>
</section>

<!-- Search Section -->
<section class="py-4 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <form action="{{ route('faq.search') }}" method="GET" class="search-form">
                    <div class="input-group input-group-lg">
                        <input type="text" name="q" class="form-control" placeholder="Search FAQs..." value="{{ request('search') }}">
                        <button class="btn btn-primary" type="submit">
                            <i class="fas fa-search me-2"></i>Search
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- FAQ Categories -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-5">
                <h2 class="section-title">Browse by Category</h2>
                <p class="lead">Select a category to find relevant questions</p>
            </div>
        </div>

        <div class="row mb-5">
            <div class="col-12">
                <div class="category-filters text-center">
                    <a href="{{ route('faq.index') }}" class="btn {{ !request('category') ? 'btn-primary' : 'btn-outline-primary' }} me-2 mb-2">
                        <i class="fas fa-list me-2"></i>All Categories
                    </a>
                    @foreach($categories as $category)
                        <a href="{{ route('faq.index', ['category' => $category]) }}" 
                           class="btn {{ request('category') == $category ? 'btn-primary' : 'btn-outline-primary' }} me-2 mb-2">
                            <i class="fas fa-{{ $category == 'admission' ? 'user-plus' : ($category == 'academic' ? 'graduation-cap' : ($category == 'fees' ? 'rupee-sign' : ($category == 'placement' ? 'briefcase' : ($category == 'facilities' ? 'building' : 'question-circle')))) }} me-2"></i>
                            {{ ucfirst($category) }}
                        </a>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- FAQ Content -->
        <div class="row">
            <div class="col-lg-8">
                @if($faqs->count() > 0)
                    <div class="accordion" id="faqAccordion">
                        @foreach($faqs as $index => $faq)
                            <div class="accordion-item mb-3">
                                <h2 class="accordion-header">
                                    <button class="accordion-button {{ $index > 0 ? 'collapsed' : '' }}" type="button" 
                                            data-bs-toggle="collapse" data-bs-target="#faq{{ $faq->id }}" 
                                            aria-expanded="{{ $index == 0 ? 'true' : 'false' }}">
                                        <div class="d-flex align-items-center w-100">
                                            <i class="fas fa-question-circle text-warning me-3"></i>
                                            <span class="flex-grow-1">{{ $faq->question }}</span>
                                            @if($faq->is_featured)
                                                <span class="badge bg-warning text-dark ms-2">Featured</span>
                                            @endif
                                            @if($faq->view_count > 0)
                                                <small class="text-muted ms-2">{{ $faq->view_count }} views</small>
                                            @endif
                                        </div>
                                    </button>
                                </h2>
                                <div id="faq{{ $faq->id }}" class="accordion-collapse collapse {{ $index == 0 ? 'show' : '' }}" 
                                     data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        <div class="faq-answer">
                                            {{ $faq->answer }}
                                        </div>
                                        
                                        @if($faq->tags)
                                            <div class="faq-tags mt-3">
                                                <small class="text-muted">Tags: </small>
                                                @foreach($faq->tags as $tag)
                                                    <span class="badge bg-light text-dark me-1">{{ $tag }}</span>
                                                @endforeach
                                            </div>
                                        @endif
                                        
                                        <div class="faq-actions mt-3">
                                            <small class="text-muted">Category: </small>
                                            <span class="badge bg-primary">{{ ucfirst($faq->category) }}</span>
                                            <a href="{{ route('faq.show', $faq) }}" class="btn btn-sm btn-outline-primary ms-3">
                                                <i class="fas fa-external-link-alt me-1"></i>View Details
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Pagination -->
                    <div class="d-flex justify-content-center mt-4">
                        {{ $faqs->appends(request()->query())->links() }}
                    </div>
                @else
                    <div class="text-center py-5">
                        <i class="fas fa-question-circle fa-3x text-muted mb-3"></i>
                        <h4>No FAQs Found</h4>
                        <p class="text-muted">
                            @if(request()->hasAny(['category', 'search']))
                                No FAQs match your current filters. <a href="{{ route('faq.index') }}">View all FAQs</a>
                            @else
                                Check back later for frequently asked questions.
                            @endif
                        </p>
                    </div>
                @endif
            </div>

            <!-- Sidebar -->
            <div class="col-lg-4">
                <!-- Featured FAQs -->
                @if($featuredFaqs->count() > 0)
                    <div class="card mb-4">
                        <div class="card-header">
                            <h5 class="mb-0"><i class="fas fa-star text-warning me-2"></i>Featured FAQs</h5>
                        </div>
                        <div class="card-body">
                            @foreach($featuredFaqs as $faq)
                                <div class="mb-3 pb-3 {{ !$loop->last ? 'border-bottom' : '' }}">
                                    <h6><a href="{{ route('faq.show', $faq) }}" class="text-decoration-none">{{ $faq->question }}</a></h6>
                                    <small class="text-muted">
                                        <i class="fas fa-tag me-1"></i>{{ ucfirst($faq->category) }}
                                        @if($faq->view_count > 0)
                                            <i class="fas fa-eye ms-2 me-1"></i>{{ $faq->view_count }}
                                        @endif
                                    </small>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif

                <!-- Popular FAQs -->
                @if($popularFaqs->count() > 0)
                    <div class="card mb-4">
                        <div class="card-header">
                            <h5 class="mb-0"><i class="fas fa-fire text-danger me-2"></i>Popular FAQs</h5>
                        </div>
                        <div class="card-body">
                            @foreach($popularFaqs as $faq)
                                <div class="mb-3 pb-3 {{ !$loop->last ? 'border-bottom' : '' }}">
                                    <h6><a href="{{ route('faq.show', $faq) }}" class="text-decoration-none">{{ $faq->question }}</a></h6>
                                    <small class="text-muted">
                                        <i class="fas fa-tag me-1"></i>{{ ucfirst($faq->category) }}
                                        <i class="fas fa-eye ms-2 me-1"></i>{{ $faq->view_count }} views
                                    </small>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif

                <!-- Contact Card -->
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0"><i class="fas fa-question-circle text-info me-2"></i>Still Have Questions?</h5>
                    </div>
                    <div class="card-body">
                        <p>Can't find what you're looking for? Our team is here to help!</p>
                        <div class="d-grid gap-2">
                            <a href="{{ route('contact.index') }}" class="btn btn-primary">
                                <i class="fas fa-envelope me-2"></i>Contact Us
                            </a>
                            <a href="tel:+919425526891" class="btn btn-outline-primary">
                                <i class="fas fa-phone me-2"></i>Call Us
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Quick Stats -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row text-center">
            <div class="col-md-3 col-6 mb-3">
                <div class="stat-item">
                    <h3 class="text-primary">{{ $faqs->total() }}</h3>
                    <p class="text-muted mb-0">Total FAQs</p>
                </div>
            </div>
            <div class="col-md-3 col-6 mb-3">
                <div class="stat-item">
                    <h3 class="text-success">{{ $categories->count() }}</h3>
                    <p class="text-muted mb-0">Categories</p>
                </div>
            </div>
            <div class="col-md-3 col-6 mb-3">
                <div class="stat-item">
                    <h3 class="text-warning">{{ $featuredFaqs->count() }}</h3>
                    <p class="text-muted mb-0">Featured</p>
                </div>
            </div>
            <div class="col-md-3 col-6 mb-3">
                <div class="stat-item">
                    <h3 class="text-info">{{ $popularFaqs->sum('view_count') }}</h3>
                    <p class="text-muted mb-0">Total Views</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('styles')
<style>
.search-form .input-group {
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    border-radius: 10px;
    overflow: hidden;
}

.category-filters .btn {
    border-radius: 25px;
    transition: all 0.3s ease;
}

.category-filters .btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
}

.accordion-item {
    border: 1px solid #dee2e6;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
}

.accordion-button {
    background-color: #f8f9fa;
    border: none;
    padding: 1.25rem;
}

.accordion-button:not(.collapsed) {
    background-color: var(--primary-yellow);
    color: var(--text-dark);
}

.accordion-button:focus {
    box-shadow: none;
    border-color: var(--primary-yellow);
}

.faq-answer {
    line-height: 1.6;
    color: #495057;
}

.faq-tags .badge {
    font-size: 0.75rem;
}

.stat-item h3 {
    font-size: 2.5rem;
    font-weight: 700;
    margin-bottom: 0.5rem;
}

@media (max-width: 768px) {
    .category-filters .btn {
        font-size: 0.875rem;
        padding: 0.5rem 1rem;
    }
    
    .stat-item h3 {
        font-size: 2rem;
    }
}
</style>
@endpush
