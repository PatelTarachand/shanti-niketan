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
}
