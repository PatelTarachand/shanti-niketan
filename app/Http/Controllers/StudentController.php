<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notice;

class StudentController extends Controller
{
    public function timetable()
    {
        return view('student.timetable');
    }

    public function exams()
    {
        return view('student.exams');
    }

    public function results()
    {
        return view('student.results');
    }

    public function notices()
    {
        $notices = Notice::active()
            ->orderBy('priority', 'desc')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        $categories = Notice::active()
            ->distinct()
            ->pluck('category');

        return view('student.notices', compact('notices', 'categories'));
    }
}
