<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\AdmissionController;
use App\Http\Controllers\FacultyController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\NoticeController;
use App\Http\Controllers\PlacementController;
use App\Http\Controllers\AlumniController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\DisclosureController;
use App\Http\Controllers\FaqController;

// Home Route
Route::get('/', [HomeController::class, 'index'])->name('home');

// Default login route (redirects to admin login)
Route::get('/login', function() {
    return redirect()->route('admin.login');
})->name('login');

// System information page
Route::get('/system-info', function() {
    return view('system-info');
})->name('system.info');

// About Us Routes
Route::prefix('about')->name('about.')->group(function () {
    Route::get('/', [AboutController::class, 'index'])->name('index');
    Route::get('/principal-message', [AboutController::class, 'principal'])->name('principal');
    Route::get('/accreditation', [AboutController::class, 'accreditation'])->name('accreditation');
});

// Courses Routes
Route::prefix('courses')->name('courses.')->group(function () {
    Route::get('/', [CourseController::class, 'index'])->name('index');
    Route::get('/undergraduate', [CourseController::class, 'undergraduate'])->name('undergraduate');
    Route::get('/postgraduate', [CourseController::class, 'postgraduate'])->name('postgraduate');
    Route::get('/diploma', [CourseController::class, 'diploma'])->name('diploma');
    Route::get('/{course}', [CourseController::class, 'show'])->name('show');
});

// Admission Routes (Only Apply functionality available)
Route::prefix('admission')->name('admission.')->group(function () {
    // Process, eligibility, and fees pages removed
    Route::get('/apply', [AdmissionController::class, 'apply'])->name('apply');
    Route::post('/apply', [AdmissionController::class, 'store'])->name('store');
});

// Faculty Routes
Route::prefix('faculty')->name('faculty.')->group(function () {
    Route::get('/', [FacultyController::class, 'index'])->name('index');
    Route::get('/{department}', [FacultyController::class, 'department'])->name('department');
});

// Student Corner Routes
Route::prefix('student')->name('student.')->group(function () {
    Route::get('/timetable', [StudentController::class, 'timetable'])->name('timetable');
    Route::get('/exams', [StudentController::class, 'exams'])->name('exams');
    Route::get('/results', [StudentController::class, 'results'])->name('results');
    Route::get('/notices', [StudentController::class, 'notices'])->name('notices');
});

// Gallery Routes
Route::prefix('gallery')->name('gallery.')->group(function () {
    Route::get('/', [GalleryController::class, 'index'])->name('index');
    Route::get('/photos', [GalleryController::class, 'photos'])->name('photos');
    Route::get('/videos', [GalleryController::class, 'videos'])->name('videos');
});

// News & Events Routes
Route::prefix('news')->name('news.')->group(function () {
    Route::get('/', [NewsController::class, 'index'])->name('index');
    Route::get('/events', [NewsController::class, 'events'])->name('events');
    Route::get('/{news}', [NewsController::class, 'show'])->name('show');
});

// Placements Routes
Route::prefix('placements')->name('placements.')->group(function () {
    Route::get('/', [PlacementController::class, 'index'])->name('index');
    Route::get('/statistics', [PlacementController::class, 'statistics'])->name('statistics');
    Route::get('/companies', [PlacementController::class, 'companies'])->name('companies');
});

// Alumni Routes
Route::prefix('alumni')->name('alumni.')->group(function () {
    Route::get('/', [AlumniController::class, 'index'])->name('index');
    Route::get('/search', [AlumniController::class, 'search'])->name('search');
    Route::get('/testimonials', [AlumniController::class, 'testimonials'])->name('testimonials');
    Route::get('/{alumni}', [AlumniController::class, 'show'])->name('show');
});

// Contact Routes
Route::prefix('contact')->name('contact.')->group(function () {
    Route::get('/', [ContactController::class, 'index'])->name('index');
    Route::post('/', [ContactController::class, 'store'])->name('store');
});

// FAQ Routes
Route::prefix('faq')->name('faq.')->group(function () {
    Route::get('/', [FaqController::class, 'index'])->name('index');
    Route::get('/search', [FaqController::class, 'search'])->name('search');
    Route::get('/{faq}', [FaqController::class, 'show'])->name('show');
});

// Notices Routes (Public)
Route::prefix('notices')->name('notices.')->group(function () {
    Route::get('/', [NoticeController::class, 'index'])->name('index');
    Route::get('/{notice}', [NoticeController::class, 'show'])->name('show');
});

// Note: Department and Designation public routes removed as they are admin-only features

// Downloads Routes
Route::prefix('downloads')->name('downloads.')->group(function () {
    Route::get('/prospectus', [DownloadController::class, 'prospectus'])->name('prospectus');
    Route::get('/calendar', [DownloadController::class, 'calendar'])->name('calendar');
    Route::get('/forms', [DownloadController::class, 'forms'])->name('forms');
    Route::get('/brochures', [DownloadController::class, 'brochures'])->name('brochures');
});

// Mandatory Disclosure Routes
Route::prefix('disclosure')->name('disclosure.')->group(function () {
    Route::get('/', [DisclosureController::class, 'index'])->name('index');
    Route::get('/rti', [DisclosureController::class, 'rti'])->name('rti');
    Route::get('/anti-ragging', [DisclosureController::class, 'antiRagging'])->name('anti-ragging');
    Route::get('/committees', [DisclosureController::class, 'committees'])->name('committees');
    Route::get('/reports', [DisclosureController::class, 'reports'])->name('reports');
});

// Admin Routes
Route::prefix('admin')->name('admin.')->group(function () {
    // Login routes (no middleware)
    Route::get('/login', [App\Http\Controllers\Admin\AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [App\Http\Controllers\Admin\AuthController::class, 'login']);

    // Authenticated admin routes
    Route::middleware('auth:admin')->group(function () {
        Route::post('/logout', [App\Http\Controllers\Admin\AuthController::class, 'logout'])->name('logout');
        Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');

        // Notice management
        Route::resource('notices', App\Http\Controllers\Admin\NoticeController::class);

        // Faculty management
        Route::resource('faculty', App\Http\Controllers\Admin\FacultyController::class);

        // Gallery management
        Route::resource('gallery', App\Http\Controllers\Admin\GalleryController::class);

        // Course management
        Route::resource('courses', App\Http\Controllers\Admin\CourseController::class);

        // Designation management
        Route::resource('designations', App\Http\Controllers\Admin\DesignationController::class);

        // Department management
        Route::resource('departments', App\Http\Controllers\Admin\DepartmentController::class);

        // Hero Slider management
        Route::resource('hero-sliders', App\Http\Controllers\Admin\HeroSliderController::class);

        // Alumni management
        Route::resource('alumni', App\Http\Controllers\Admin\AlumniController::class);

        // Applications management
        Route::resource('applications', App\Http\Controllers\Admin\ApplicationController::class)->except(['create', 'store', 'edit']);
        Route::post('applications/{application}/status', [App\Http\Controllers\Admin\ApplicationController::class, 'updateStatus'])->name('applications.status');
        Route::post('applications/bulk-action', [App\Http\Controllers\Admin\ApplicationController::class, 'bulkAction'])->name('applications.bulk-action');
        Route::get('applications/export', [App\Http\Controllers\Admin\ApplicationController::class, 'export'])->name('applications.export');
    });
});

// Sitemap Routes
Route::get('/sitemap', [App\Http\Controllers\SitemapController::class, 'html'])->name('sitemap.html');
Route::get('/sitemap.xml', [App\Http\Controllers\SitemapController::class, 'index'])->name('sitemap.index');
Route::get('/sitemap-pages.xml', [App\Http\Controllers\SitemapController::class, 'pages'])->name('sitemap.pages');
Route::get('/sitemap-courses.xml', [App\Http\Controllers\SitemapController::class, 'courses'])->name('sitemap.courses');
Route::get('/sitemap-notices.xml', [App\Http\Controllers\SitemapController::class, 'notices'])->name('sitemap.notices');
Route::get('/sitemap-faculty.xml', [App\Http\Controllers\SitemapController::class, 'faculty'])->name('sitemap.faculty');
Route::get('/sitemap-gallery.xml', [App\Http\Controllers\SitemapController::class, 'gallery'])->name('sitemap.gallery');
Route::get('/robots.txt', [App\Http\Controllers\SitemapController::class, 'robots'])->name('robots');


