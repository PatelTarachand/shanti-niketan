<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Alumni;
use App\Models\Course;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class AlumniController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Alumni::query();

        // Apply search filter
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'LIKE', "%{$search}%")
                  ->orWhere('email', 'LIKE', "%{$search}%")
                  ->orWhere('current_company', 'LIKE', "%{$search}%")
                  ->orWhere('current_position', 'LIKE', "%{$search}%")
                  ->orWhere('course', 'LIKE', "%{$search}%");
            });
        }

        // Apply status filter
        if ($request->filled('status')) {
            if ($request->status === 'active') {
                $query->where('is_active', true);
            } elseif ($request->status === 'inactive') {
                $query->where('is_active', false);
            } elseif ($request->status === 'verified') {
                $query->whereNotNull('verified_at');
            } elseif ($request->status === 'unverified') {
                $query->whereNull('verified_at');
            }
        }

        // Apply course filter
        if ($request->filled('course')) {
            $query->where('course', $request->course);
        }

        $alumni = $query->orderBy('created_at', 'desc')->paginate(15);

        // Get filter options
        $courses = Alumni::distinct()->pluck('course')->filter()->sort();

        // Get statistics
        $stats = [
            'total' => Alumni::count(),
            'active' => Alumni::where('is_active', true)->count(),
            'verified' => Alumni::whereNotNull('verified_at')->count(),
            'featured' => Alumni::where('is_featured', true)->count(),
        ];

        return view('admin.alumni.index', compact('alumni', 'courses', 'stats'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $courses = Course::active()->pluck('name')->unique()->sort();
        return view('admin.alumni.create', compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:alumnis,email',
            'phone' => 'nullable|string|max:20',
            'student_id' => 'nullable|string|max:50',
            'course' => 'required|string|max:255',
            'branch' => 'nullable|string|max:255',
            'passing_year' => 'required|integer|min:1990|max:' . (date('Y') + 1),
            'admission_year' => 'nullable|integer|min:1990|max:' . date('Y'),
            'current_company' => 'nullable|string|max:255',
            'current_position' => 'nullable|string|max:255',
            'current_location' => 'nullable|string|max:255',
            'current_salary' => 'nullable|numeric|min:0',
            'bio' => 'nullable|string|max:1000',
            'testimonial' => 'nullable|string|max:500',
            'linkedin_url' => 'nullable|url',
            'twitter_url' => 'nullable|url',
            'facebook_url' => 'nullable|url',
            'website_url' => 'nullable|url',
            'industry' => 'nullable|string|max:255',
            'experience_years' => 'nullable|integer|min:0|max:50',
            'skills' => 'nullable|string',
            'achievements' => 'nullable|string',
            'is_active' => 'boolean',
            'is_featured' => 'boolean',
            'show_contact' => 'boolean',
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->all();

        // Handle file upload
        if ($request->hasFile('profile_photo')) {
            $data['profile_photo'] = $request->file('profile_photo')->store('alumni', 'public');
        }

        // Convert comma-separated strings to arrays
        if ($request->skills) {
            $data['skills'] = array_map('trim', explode(',', $request->skills));
        }
        if ($request->achievements) {
            $data['achievements'] = array_map('trim', explode(',', $request->achievements));
        }

        // Set verification timestamp if active
        if ($request->is_active) {
            $data['verified_at'] = Carbon::now();
        }

        Alumni::create($data);

        return redirect()->route('admin.alumni.index')->with('success', 'Alumni profile created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Alumni $alumni)
    {
        return view('admin.alumni.show', compact('alumni'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Alumni $alumni)
    {
        $courses = Course::active()->pluck('name')->unique()->sort();
        return view('admin.alumni.edit', compact('alumni', 'courses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Alumni $alumni)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:alumnis,email,' . $alumni->id,
            'phone' => 'nullable|string|max:20',
            'student_id' => 'nullable|string|max:50',
            'course' => 'required|string|max:255',
            'branch' => 'nullable|string|max:255',
            'passing_year' => 'required|integer|min:1990|max:' . (date('Y') + 1),
            'admission_year' => 'nullable|integer|min:1990|max:' . date('Y'),
            'current_company' => 'nullable|string|max:255',
            'current_position' => 'nullable|string|max:255',
            'current_location' => 'nullable|string|max:255',
            'current_salary' => 'nullable|numeric|min:0',
            'bio' => 'nullable|string|max:1000',
            'testimonial' => 'nullable|string|max:500',
            'linkedin_url' => 'nullable|url',
            'twitter_url' => 'nullable|url',
            'facebook_url' => 'nullable|url',
            'website_url' => 'nullable|url',
            'industry' => 'nullable|string|max:255',
            'experience_years' => 'nullable|integer|min:0|max:50',
            'skills' => 'nullable|string',
            'achievements' => 'nullable|string',
            'is_active' => 'boolean',
            'is_featured' => 'boolean',
            'show_contact' => 'boolean',
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->all();

        // Handle file upload
        if ($request->hasFile('profile_photo')) {
            // Delete old photo if exists
            if ($alumni->profile_photo) {
                Storage::disk('public')->delete($alumni->profile_photo);
            }
            $data['profile_photo'] = $request->file('profile_photo')->store('alumni', 'public');
        }

        // Convert comma-separated strings to arrays
        if ($request->skills) {
            $data['skills'] = array_map('trim', explode(',', $request->skills));
        } else {
            $data['skills'] = null;
        }

        if ($request->achievements) {
            $data['achievements'] = array_map('trim', explode(',', $request->achievements));
        } else {
            $data['achievements'] = null;
        }

        // Handle verification status
        if ($request->is_active && !$alumni->verified_at) {
            $data['verified_at'] = Carbon::now();
        } elseif (!$request->is_active) {
            $data['verified_at'] = null;
        }

        $alumni->update($data);

        return redirect()->route('admin.alumni.index')->with('success', 'Alumni profile updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Alumni $alumni)
    {
        // Delete profile photo if exists
        if ($alumni->profile_photo) {
            Storage::disk('public')->delete($alumni->profile_photo);
        }

        $alumni->delete();

        return redirect()->route('admin.alumni.index')->with('success', 'Alumni profile deleted successfully!');
    }
}
