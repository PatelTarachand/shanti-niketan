<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notice;
use App\Models\Faculty;
use App\Models\Gallery;
use App\Models\HeroSlider;
use App\Models\Course;
use App\Models\Department;

class HomeController extends Controller
{
    /**
     * Display the home page.
     */
    public function index()
    {
        // Get active hero sliders
        $heroSliders = HeroSlider::active()
            ->ordered()
            ->get();

        // Get latest notices for ticker
        $notices = Notice::active()
            ->orderBy('priority', 'desc')
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        // Get featured faculty
        $faculty = Faculty::active()
            ->ordered()
            ->limit(12)
            ->get();

        // Get featured gallery items
        $gallery = Gallery::active()
            ->featured()
            ->ordered()
            ->limit(8)
            ->get();

        // Get featured courses grouped by department
        $courses = Course::active()
            ->get()
            ->groupBy('department')
            ->take(3); // Show top 3 departments

        // Get departments for course icons
        $departments = Department::active()
            ->ordered()
            ->get();

        return view('home', compact('heroSliders', 'notices', 'faculty', 'gallery', 'courses', 'departments'));
    }
}
