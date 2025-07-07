<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Faculty;

class AboutController extends Controller
{
    /**
     * Display the about us page.
     */
    public function index()
    {
        // Get featured faculty members (limit to 6 for the about page)
        $featuredFaculty = Faculty::active()
            ->orderBy('created_at', 'desc')
            ->limit(6)
            ->get();

        // Get faculty count by department
        $facultyByDepartment = Faculty::active()
            ->selectRaw('department, COUNT(*) as count')
            ->whereNotNull('department')
            ->where('department', '!=', '')
            ->groupBy('department')
            ->pluck('count', 'department')
            ->toArray();

             // Get featured faculty
        $faculty = Faculty::active()
            ->ordered()
            ->get();

        return view('about.index', compact('featuredFaculty', 'facultyByDepartment','faculty'));
    }

    /**
     * Display the principal's message page.
     */
    public function principal()
    {
        return view('about.principal');
    }

    /**
     * Display the accreditation page.
     */
    public function accreditation()
    {
        return view('about.accreditation');
    }
}
