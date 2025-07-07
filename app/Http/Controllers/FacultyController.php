<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Faculty;

class FacultyController extends Controller
{
    public function index()
    {
        $faculty = Faculty::active()
            ->ordered()
            ->get()
            ->groupBy('department');

        $departments = Faculty::active()
            ->distinct()
            ->pluck('department');

        return view('faculty.index', compact('faculty', 'departments'));
    }

    public function department($department)
    {
        $faculty = Faculty::active()
            ->byDepartment($department)
            ->ordered()
            ->get();

        return view('faculty.department', compact('department', 'faculty'));
    }

    public function show($id)
    {
        $faculty = Faculty::active()->findOrFail($id);

        // Get related faculty from same department
        $relatedFaculty = Faculty::active()
            ->where('department', $faculty->department)
            ->where('id', '!=', $faculty->id)
            ->ordered()
            ->limit(6)
            ->get();

        return view('faculty.show', compact('faculty', 'relatedFaculty'));
    }
}
