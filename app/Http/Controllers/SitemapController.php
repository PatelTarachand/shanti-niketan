<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Notice;
use App\Models\Faculty;
use App\Models\Gallery;
use App\Models\Course;
use App\Models\Alumni;
use Carbon\Carbon;

class SitemapController extends Controller
{
    /**
     * Generate the main sitemap index
     */
    public function index()
    {
        $sitemaps = [
            [
                'loc' => route('sitemap.pages'),
                'lastmod' => Carbon::now()->toAtomString(),
            ],
            [
                'loc' => route('sitemap.courses'),
                'lastmod' => Course::latest('updated_at')->first()?->updated_at?->toAtomString() ?? Carbon::now()->toAtomString(),
            ],
            [
                'loc' => route('sitemap.notices'),
                'lastmod' => Notice::latest('updated_at')->first()?->updated_at?->toAtomString() ?? Carbon::now()->toAtomString(),
            ],
            [
                'loc' => route('sitemap.faculty'),
                'lastmod' => Faculty::latest('updated_at')->first()?->updated_at?->toAtomString() ?? Carbon::now()->toAtomString(),
            ],
            [
                'loc' => route('sitemap.gallery'),
                'lastmod' => Gallery::latest('updated_at')->first()?->updated_at?->toAtomString() ?? Carbon::now()->toAtomString(),
            ],
        ];

        return response()->view('sitemap.index', compact('sitemaps'))
            ->header('Content-Type', 'application/xml');
    }

    /**
     * Generate sitemap for static pages
     */
    public function pages()
    {
        $pages = [
            [
                'loc' => route('home'),
                'lastmod' => Carbon::now()->toAtomString(),
                'changefreq' => 'daily',
                'priority' => '1.0',
            ],
            [
                'loc' => route('about.index'),
                'lastmod' => Carbon::now()->toAtomString(),
                'changefreq' => 'monthly',
                'priority' => '0.9',
            ],
            [
                'loc' => route('about.principal'),
                'lastmod' => Carbon::now()->toAtomString(),
                'changefreq' => 'yearly',
                'priority' => '0.8',
            ],
            [
                'loc' => route('about.accreditation'),
                'lastmod' => Carbon::now()->toAtomString(),
                'changefreq' => 'yearly',
                'priority' => '0.8',
            ],
            [
                'loc' => route('courses.index'),
                'lastmod' => Course::latest('updated_at')->first()?->updated_at?->toAtomString() ?? Carbon::now()->toAtomString(),
                'changefreq' => 'weekly',
                'priority' => '0.9',
            ],
            [
                'loc' => route('courses.undergraduate'),
                'lastmod' => Course::latest('updated_at')->first()?->updated_at?->toAtomString() ?? Carbon::now()->toAtomString(),
                'changefreq' => 'weekly',
                'priority' => '0.8',
            ],
            [
                'loc' => route('courses.postgraduate'),
                'lastmod' => Course::latest('updated_at')->first()?->updated_at?->toAtomString() ?? Carbon::now()->toAtomString(),
                'changefreq' => 'weekly',
                'priority' => '0.8',
            ],
            [
                'loc' => route('courses.diploma'),
                'lastmod' => Course::latest('updated_at')->first()?->updated_at?->toAtomString() ?? Carbon::now()->toAtomString(),
                'changefreq' => 'weekly',
                'priority' => '0.8',
            ],
            [
                'loc' => route('faculty.index'),
                'lastmod' => Faculty::latest('updated_at')->first()?->updated_at?->toAtomString() ?? Carbon::now()->toAtomString(),
                'changefreq' => 'weekly',
                'priority' => '0.8',
            ],
            [
                'loc' => route('notices.index'),
                'lastmod' => Notice::latest('updated_at')->first()?->updated_at?->toAtomString() ?? Carbon::now()->toAtomString(),
                'changefreq' => 'daily',
                'priority' => '0.8',
            ],
            [
                'loc' => route('gallery.index'),
                'lastmod' => Gallery::latest('updated_at')->first()?->updated_at?->toAtomString() ?? Carbon::now()->toAtomString(),
                'changefreq' => 'weekly',
                'priority' => '0.7',
            ],
            [
                'loc' => route('alumni.index'),
                'lastmod' => Alumni::latest('updated_at')->first()?->updated_at?->toAtomString() ?? Carbon::now()->toAtomString(),
                'changefreq' => 'weekly',
                'priority' => '0.7',
            ],
            [
                'loc' => route('admission.apply'),
                'lastmod' => Carbon::now()->toAtomString(),
                'changefreq' => 'monthly',
                'priority' => '0.9',
            ],
            [
                'loc' => route('contact'),
                'lastmod' => Carbon::now()->toAtomString(),
                'changefreq' => 'monthly',
                'priority' => '0.8',
            ],
        ];

        return response()->view('sitemap.pages', compact('pages'))
            ->header('Content-Type', 'application/xml');
    }

    /**
     * Generate sitemap for courses
     */
    public function courses()
    {
        $courses = Course::active()
            ->select('id', 'name', 'slug', 'updated_at')
            ->get()
            ->map(function ($course) {
                return [
                    'loc' => route('courses.show', $course->slug ?? $course->id),
                    'lastmod' => $course->updated_at->toAtomString(),
                    'changefreq' => 'monthly',
                    'priority' => '0.7',
                ];
            });

        return response()->view('sitemap.courses', compact('courses'))
            ->header('Content-Type', 'application/xml');
    }

    /**
     * Generate sitemap for notices
     */
    public function notices()
    {
        $notices = Notice::active()
            ->where('publish_date', '<=', Carbon::now())
            ->select('id', 'title', 'slug', 'updated_at')
            ->get()
            ->map(function ($notice) {
                return [
                    'loc' => route('notices.show', $notice->slug ?? $notice->id),
                    'lastmod' => $notice->updated_at->toAtomString(),
                    'changefreq' => 'weekly',
                    'priority' => '0.6',
                ];
            });

        return response()->view('sitemap.notices', compact('notices'))
            ->header('Content-Type', 'application/xml');
    }

    /**
     * Generate sitemap for faculty
     */
    public function faculty()
    {
        $faculty = Faculty::active()
            ->select('id', 'name', 'slug', 'updated_at')
            ->get()
            ->map(function ($member) {
                return [
                    'loc' => route('faculty.show', $member->slug ?? $member->id),
                    'lastmod' => $member->updated_at->toAtomString(),
                    'changefreq' => 'monthly',
                    'priority' => '0.6',
                ];
            });

        return response()->view('sitemap.faculty', compact('faculty'))
            ->header('Content-Type', 'application/xml');
    }

    /**
     * Generate sitemap for gallery
     */
    public function gallery()
    {
        $gallery = Gallery::active()
            ->select('id', 'title', 'slug', 'updated_at')
            ->get()
            ->map(function ($item) {
                return [
                    'loc' => route('gallery.show', $item->slug ?? $item->id),
                    'lastmod' => $item->updated_at->toAtomString(),
                    'changefreq' => 'monthly',
                    'priority' => '0.5',
                ];
            });

        return response()->view('sitemap.gallery', compact('gallery'))
            ->header('Content-Type', 'application/xml');
    }

    /**
     * Generate HTML sitemap for users
     */
    public function html()
    {
        // Get all static pages
        $staticPages = [
            [
                'title' => 'Home',
                'url' => route('home'),
                'description' => 'Welcome to Shantineketan College - Excellence in Education'
            ],
            [
                'title' => 'About Us',
                'url' => route('about.index'),
                'description' => 'Learn about our college history, mission, and vision'
            ],
            [
                'title' => 'Principal\'s Message',
                'url' => route('about.principal'),
                'description' => 'Message from our esteemed Principal'
            ],
            [
                'title' => 'Accreditation',
                'url' => route('about.accreditation'),
                'description' => 'Our college accreditations and certifications'
            ],
            [
                'title' => 'All Courses',
                'url' => route('courses.index'),
                'description' => 'Browse all our academic programs'
            ],
            [
                'title' => 'Undergraduate Programs',
                'url' => route('courses.undergraduate'),
                'description' => 'Bachelor degree programs in various disciplines'
            ],
            [
                'title' => 'Postgraduate Programs',
                'url' => route('courses.postgraduate'),
                'description' => 'Master degree programs for advanced learning'
            ],
            [
                'title' => 'Diploma Programs',
                'url' => route('courses.diploma'),
                'description' => 'Professional diploma courses'
            ],
            [
                'title' => 'Faculty',
                'url' => route('faculty.index'),
                'description' => 'Meet our experienced faculty members'
            ],
            [
                'title' => 'Notices & Announcements',
                'url' => route('notices.index'),
                'description' => 'Latest news and announcements'
            ],
            [
                'title' => 'Gallery',
                'url' => route('gallery.index'),
                'description' => 'Campus photos and event galleries'
            ],
            [
                'title' => 'Alumni',
                'url' => route('alumni.index'),
                'description' => 'Our alumni network and success stories'
            ],
            [
                'title' => 'Apply Now',
                'url' => route('admission.apply'),
                'description' => 'Start your admission process'
            ],
            [
                'title' => 'Contact Us',
                'url' => route('contact'),
                'description' => 'Get in touch with us'
            ],
        ];

        // Get dynamic content
        $courses = Course::active()
            ->select('id', 'name', 'slug', 'description', 'department')
            ->orderBy('department')
            ->orderBy('name')
            ->get()
            ->groupBy('department');

        $notices = Notice::active()
            ->where('publish_date', '<=', Carbon::now())
            ->select('id', 'title', 'slug', 'excerpt', 'publish_date')
            ->orderBy('publish_date', 'desc')
            ->limit(20)
            ->get();

        $faculty = Faculty::active()
            ->select('id', 'name', 'slug', 'designation', 'department')
            ->orderBy('department')
            ->orderBy('name')
            ->get()
            ->groupBy('department');

        $gallery = Gallery::active()
            ->select('id', 'title', 'slug', 'description', 'type')
            ->orderBy('created_at', 'desc')
            ->limit(15)
            ->get();

        $alumni = Alumni::active()
            ->select('id', 'name', 'slug', 'graduation_year', 'course')
            ->orderBy('graduation_year', 'desc')
            ->limit(20)
            ->get();

        return view('sitemap.html', compact(
            'staticPages',
            'courses',
            'notices',
            'faculty',
            'gallery',
            'alumni'
        ));
    }

    /**
     * Generate robots.txt
     */
    public function robots()
    {
        $content = "User-agent: *\n";
        $content .= "Allow: /\n";
        $content .= "Disallow: /admin/\n";
        $content .= "Disallow: /api/\n";
        $content .= "Disallow: /storage/\n";
        $content .= "\n";
        $content .= "Sitemap: " . route('sitemap.index') . "\n";

        return response($content)
            ->header('Content-Type', 'text/plain');
    }
}
