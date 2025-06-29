<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;

class CourseController extends Controller
{
    public function index(Request $request)
    {
        $query = Course::query();

        // Apply filters
        if ($request->filled('department')) {
            $query->where('department', $request->department);
        }

        if ($request->filled('status')) {
            if ($request->status === 'active') {
                $query->where('is_active', true);
            } elseif ($request->status === 'inactive') {
                $query->where('is_active', false);
            }
        }

        $courses = $query->orderBy('department')
            ->orderBy('name')
            ->paginate(10);

        return view('admin.courses.index', compact('courses'));
    }

    public function create()
    {
        return view('admin.courses.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:20|unique:courses',
            'description' => 'nullable|string',
            'department' => 'required|string|max:255',
            'duration_years' => 'required|integer|min:1|max:10',
            'total_semesters' => 'required|integer|min:1|max:20',
            'fees_per_semester' => 'required|numeric|min:0',
            'total_seats' => 'required|integer|min:1',
            'available_seats' => 'required|integer|min:0',
            'eligibility_criteria' => 'nullable|string',
        ]);

        $data = $request->all();

        // Convert eligibility criteria to array
        if ($request->eligibility_criteria) {
            $data['eligibility_criteria'] = array_map('trim', explode(',', $request->eligibility_criteria));
        }

        Course::create($data);

        return redirect()->route('admin.courses.index')
            ->with('success', 'Course created successfully.');
    }

    public function show(Course $course)
    {
        return view('admin.courses.show', compact('course'));
    }

    public function edit(Course $course)
    {
        return view('admin.courses.edit', compact('course'));
    }

    public function update(Request $request, Course $course)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:20|unique:courses,code,' . $course->id,
            'description' => 'nullable|string',
            'department' => 'required|string|max:255',
            'duration_years' => 'required|integer|min:1|max:10',
            'total_semesters' => 'required|integer|min:1|max:20',
            'fees_per_semester' => 'required|numeric|min:0',
            'total_seats' => 'required|integer|min:1',
            'available_seats' => 'required|integer|min:0',
            'eligibility_criteria' => 'nullable|string',
        ]);

        $data = $request->all();

        // Convert eligibility criteria to array
        if ($request->eligibility_criteria) {
            $data['eligibility_criteria'] = array_map('trim', explode(',', $request->eligibility_criteria));
        }

        $course->update($data);

        return redirect()->route('admin.courses.index')
            ->with('success', 'Course updated successfully.');
    }

    public function destroy(Course $course)
    {
        $course->delete();

        return redirect()->route('admin.courses.index')
            ->with('success', 'Course deleted successfully.');
    }
}
