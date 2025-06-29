<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alumni;
use App\Models\Course;

class AlumniController extends Controller
{
    public function index(Request $request)
    {
        $query = Alumni::active()->verified();

        // Apply filters
        if ($request->filled('course')) {
            $query->byCourse($request->course);
        }

        if ($request->filled('year')) {
            $query->byYear($request->year);
        }

        if ($request->filled('industry')) {
            $query->byIndustry($request->industry);
        }

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'LIKE', "%{$search}%")
                  ->orWhere('current_company', 'LIKE', "%{$search}%")
                  ->orWhere('current_position', 'LIKE', "%{$search}%")
                  ->orWhere('industry', 'LIKE', "%{$search}%");
            });
        }

        $alumni = $query->ordered()->paginate(12);

        // Get filter options
        $courses = Alumni::active()->distinct()->pluck('course')->sort();
        $years = Alumni::active()->distinct()->pluck('passing_year')->sort()->reverse();
        $industries = Alumni::active()->whereNotNull('industry')->distinct()->pluck('industry')->sort();

        // Get featured alumni
        $featuredAlumni = Alumni::active()->verified()->featured()->ordered()->limit(6)->get();

        // Get statistics
        $stats = [
            'total' => Alumni::active()->verified()->count(),
            'companies' => Alumni::active()->verified()->whereNotNull('current_company')->distinct('current_company')->count(),
            'mentors' => Alumni::active()->verified()->mentors()->count(),
            'recent' => Alumni::active()->verified()->where('passing_year', '>=', now()->year - 5)->count(),
        ];

        return view('alumni.index', compact('alumni', 'courses', 'years', 'industries', 'featuredAlumni', 'stats'));
    }

    public function show(Alumni $alumni)
    {
        // Only show active and verified alumni
        if (!$alumni->is_active || !$alumni->is_verified) {
            abort(404);
        }

        // Get related alumni from same course or industry
        $relatedAlumni = Alumni::active()->verified()
            ->where('id', '!=', $alumni->id)
            ->where(function($query) use ($alumni) {
                $query->where('course', $alumni->course)
                      ->orWhere('industry', $alumni->industry);
            })
            ->ordered()
            ->limit(6)
            ->get();

        return view('alumni.show', compact('alumni', 'relatedAlumni'));
    }



    public function testimonials()
    {
        $testimonials = Alumni::active()->verified()
            ->whereNotNull('testimonial')
            ->where('testimonial', '!=', '')
            ->ordered()
            ->paginate(12);

        return view('alumni.testimonials', compact('testimonials'));
    }



    public function search(Request $request)
    {
        $query = $request->get('q');

        if (empty($query)) {
            return redirect()->route('alumni.index');
        }

        $alumni = Alumni::active()->verified()
            ->where(function($q) use ($query) {
                $q->where('name', 'LIKE', "%{$query}%")
                  ->orWhere('current_company', 'LIKE', "%{$query}%")
                  ->orWhere('current_position', 'LIKE', "%{$query}%")
                  ->orWhere('industry', 'LIKE', "%{$query}%")
                  ->orWhere('course', 'LIKE', "%{$query}%");
            })
            ->ordered()
            ->paginate(12);

        return view('alumni.search', compact('alumni', 'query'));
    }
}
