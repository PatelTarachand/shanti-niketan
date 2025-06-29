<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class CourseController extends Controller
{
    /**
     * Display all courses.
     */
    public function index()
    {
        $courses = Course::active()
            ->orderBy('department')
            ->orderBy('name')
            ->get()
            ->groupBy('department');

        $departments = Course::active()
            ->distinct()
            ->pluck('department');

        return view('courses.index', compact('courses', 'departments'));
    }

    /**
     * Display undergraduate courses.
     */
    public function undergraduate()
    {
        $courses = Course::active()
            ->where('name', 'LIKE', 'B.%')
            ->orderBy('name')
            ->get();

        return view('courses.undergraduate', compact('courses'));
    }

    /**
     * Display postgraduate courses.
     */
    public function postgraduate()
    {
        $courses = Course::active()
            ->where('name', 'LIKE', 'M.%')
            ->orderBy('name')
            ->get();

        return view('courses.postgraduate', compact('courses'));
    }

    /**
     * Display diploma courses.
     */
    public function diploma()
    {
        $courses = Course::active()
            ->where('name', 'LIKE', 'Diploma%')
            ->orderBy('name')
            ->get();

        return view('courses.diploma', compact('courses'));
    }

    /**
     * Display specific course details.
     */
    public function show($id)
    {
        $course = Course::active()->findOrFail($id);

        // Get related courses from same department
        $relatedCourses = Course::active()
            ->where('department', $course->department)
            ->where('id', '!=', $course->id)
            ->limit(3)
            ->get();

        return view('courses.show', compact('course', 'relatedCourses'));
    }
}
