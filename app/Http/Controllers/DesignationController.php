<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Faculty;

class DesignationController extends Controller
{
    public function index()
    {
        // Get all unique designations from faculty
        $designations = Faculty::active()
            ->distinct()
            ->pluck('designation')
            ->filter()
            ->sort()
            ->values();

        // Get designation statistics
        $designationStats = [];
        foreach ($designations as $designation) {
            $facultyCount = Faculty::active()->where('designation', $designation)->count();
            $departments = Faculty::active()
                ->where('designation', $designation)
                ->distinct()
                ->pluck('department')
                ->filter()
                ->sort();

            $avgExperience = Faculty::active()
                ->where('designation', $designation)
                ->avg('experience_years');

            $designationStats[$designation] = [
                'name' => $designation,
                'faculty_count' => $facultyCount,
                'departments' => $departments,
                'avg_experience' => round($avgExperience, 1),
                'description' => $this->getDesignationDescription($designation)
            ];
        }

        return view('designations.index', compact('designationStats'));
    }

    public function show($designationName)
    {
        // Get faculty with this designation
        $faculty = Faculty::active()
            ->where('designation', $designationName)
            ->ordered()
            ->get();

        if ($faculty->isEmpty()) {
            abort(404, 'Designation not found');
        }

        // Group faculty by department
        $facultyByDepartment = $faculty->groupBy('department');

        // Designation statistics
        $stats = [
            'faculty_count' => $faculty->count(),
            'department_count' => $facultyByDepartment->count(),
            'avg_experience' => round($faculty->avg('experience_years'), 1),
            'phd_count' => $faculty->where('qualification', 'LIKE', '%Ph.D%')->count(),
            'max_experience' => $faculty->max('experience_years'),
            'min_experience' => $faculty->min('experience_years'),
        ];

        return view('designations.show', compact('faculty', 'facultyByDepartment', 'designationName', 'stats'));
    }

    private function getDesignationDescription($designation)
    {
        $descriptions = [
            'Professor' => 'Senior academic position with extensive research and teaching experience, leading departmental initiatives.',
            'Associate Professor' => 'Mid-level academic position with significant teaching and research responsibilities.',
            'Assistant Professor' => 'Entry-level academic position focused on teaching excellence and research development.',
            'Professor & Head of Department' => 'Senior leadership position combining academic excellence with administrative responsibilities.',
            'Lecturer' => 'Teaching-focused position dedicated to delivering quality education to students.',
            'Senior Lecturer' => 'Experienced teaching position with additional mentoring and curriculum development responsibilities.',
        ];

        return $descriptions[$designation] ?? 'Academic position dedicated to excellence in education and research.';
    }
}
