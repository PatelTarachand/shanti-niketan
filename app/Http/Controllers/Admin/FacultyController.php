<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Faculty;
use Illuminate\Support\Facades\Storage;

class FacultyController extends Controller
{
    public function index(Request $request)
    {
        $query = Faculty::query();

        // Apply filters
        if ($request->filled('department')) {
            $query->where('department', $request->department);
        }

        if ($request->filled('designation')) {
            $query->where('designation', 'like', '%' . $request->designation . '%');
        }

        if ($request->filled('status')) {
            if ($request->status === 'active') {
                $query->where('is_active', true);
            } elseif ($request->status === 'inactive') {
                $query->where('is_active', false);
            }
        }

        $faculty = $query->orderBy('sort_order')
            ->orderBy('name')
            ->paginate(12);

        return view('admin.faculty.index', compact('faculty'));
    }

    public function create()
    {
        return view('admin.faculty.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'department' => 'required|string|max:255',
            'qualification' => 'nullable|string|max:255',
            'specialization' => 'nullable|string',
            'experience_years' => 'nullable|integer|min:0',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:20',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'bio' => 'nullable|string',
            'research_interests' => 'nullable|string',
            'sort_order' => 'nullable|integer',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('faculty', 'public');
        }

        if ($request->research_interests) {
            $data['research_interests'] = array_map('trim', explode(',', $request->research_interests));
        }

        Faculty::create($data);

        return redirect()->route('admin.faculty.index')
            ->with('success', 'Faculty member added successfully.');
    }

    public function show(Faculty $faculty)
    {
        return view('admin.faculty.show', compact('faculty'));
    }

    public function edit(Faculty $faculty)
    {
        return view('admin.faculty.edit', compact('faculty'));
    }

    public function update(Request $request, Faculty $faculty)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'department' => 'required|string|max:255',
            'qualification' => 'nullable|string|max:255',
            'specialization' => 'nullable|string',
            'experience_years' => 'nullable|integer|min:0',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:20',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'bio' => 'nullable|string',
            'research_interests' => 'nullable|string',
            'sort_order' => 'nullable|integer',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            if ($faculty->image) {
                Storage::disk('public')->delete($faculty->image);
            }
            $data['image'] = $request->file('image')->store('faculty', 'public');
        }

        if ($request->research_interests) {
            $data['research_interests'] = array_map('trim', explode(',', $request->research_interests));
        }

        $faculty->update($data);

        return redirect()->route('admin.faculty.index')
            ->with('success', 'Faculty member updated successfully.');
    }

    public function destroy(Faculty $faculty)
    {
        if ($faculty->image) {
            Storage::disk('public')->delete($faculty->image);
        }

        $faculty->delete();

        return redirect()->route('admin.faculty.index')
            ->with('success', 'Faculty member deleted successfully.');
    }
}
