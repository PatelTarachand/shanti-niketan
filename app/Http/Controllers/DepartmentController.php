<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Faculty;
use App\Models\Course;

class DepartmentController extends Controller
{
    public function index()
    {
        // Get all unique departments from faculty and courses
        $facultyDepartments = Faculty::active()
            ->distinct()
            ->pluck('department')
            ->filter();

        $courseDepartments = Course::active()
            ->distinct()
            ->pluck('department')
            ->filter();

        // Merge and get unique departments
        $allDepartments = $facultyDepartments->merge($courseDepartments)->unique()->sort()->values();

        // Get department statistics
        $departmentStats = [];
        foreach ($allDepartments as $department) {
            $facultyCount = Faculty::active()->where('department', $department)->count();
            $courseCount = Course::active()->where('department', $department)->count();
            $totalStudents = Course::active()->where('department', $department)->sum('total_seats') -
                           Course::active()->where('department', $department)->sum('available_seats');

            $departmentStats[$department] = [
                'name' => $department,
                'faculty_count' => $facultyCount,
                'course_count' => $courseCount,
                'student_count' => $totalStudents,
                'description' => $this->getDepartmentDescription($department)
            ];
        }

        return view('departments.index', compact('departmentStats'));
    }

    public function show($departmentName)
    {
        // Get faculty from this department
        $faculty = Faculty::active()
            ->where('department', $departmentName)
            ->ordered()
            ->get();

        // Get courses from this department
        $courses = Course::active()
            ->where('department', $departmentName)
            ->get();

        if ($faculty->isEmpty() && $courses->isEmpty()) {
            abort(404, 'Department not found');
        }

        // Department statistics
        $stats = [
            'faculty_count' => $faculty->count(),
            'course_count' => $courses->count(),
            'total_seats' => $courses->sum('total_seats'),
            'available_seats' => $courses->sum('available_seats'),
            'student_count' => $courses->sum('total_seats') - $courses->sum('available_seats'),
            'phd_faculty' => $faculty->where('qualification', 'LIKE', '%Ph.D%')->count(),
            'senior_faculty' => $faculty->where('experience_years', '>=', 10)->count(),
        ];

        return view('departments.show', compact('faculty', 'courses', 'departmentName', 'stats'));
    }

    private function getDepartmentDescription($department)
    {
        $descriptions = [
            'Computer Science' => 'Leading the way in technology education with cutting-edge curriculum in AI, ML, and software development.',
            'Engineering' => 'Comprehensive engineering programs covering mechanical, electrical, and civil engineering disciplines.',
            'Management' => 'Business education focused on leadership, strategy, and modern management practices.',
            'Commerce' => 'Commerce and finance education preparing students for careers in accounting, banking, and business.',
            'Science' => 'Pure and applied sciences with emphasis on research and practical applications.',
            'Arts' => 'Liberal arts education fostering creativity, critical thinking, and cultural understanding.',
        ];

        return $descriptions[$department] ?? 'Excellence in education and research in ' . $department . ' field.';
    }
}
