<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application;
use App\Models\Course;

class AdmissionController extends Controller
{
    public function process()
    {
        return view('admission.process');
    }

    public function eligibility()
    {
        return view('admission.eligibility');
    }

    public function fees()
    {
        return view('admission.fees');
    }

    public function apply()
    {
        $courses = Course::active()->orderBy('name')->get();
        return view('admission.apply', compact('courses'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'date_of_birth' => 'nullable|date',
            'gender' => 'nullable|in:male,female,other',
            'father_name' => 'nullable|string|max:255',
            'mother_name' => 'nullable|string|max:255',
            'guardian_phone' => 'nullable|string|max:20',
            'address' => 'nullable|string',
            'city' => 'nullable|string|max:255',
            'state' => 'nullable|string|max:255',
            'pincode' => 'nullable|string|max:10',
            'course' => 'required|string|max:255',
            'branch' => 'nullable|string|max:255',
            'category' => 'nullable|in:general,obc,sc,st,other',
            'previous_qualification' => 'nullable|string|max:255',
            'previous_marks' => 'nullable|numeric|min:0',
            'previous_percentage' => 'nullable|numeric|min:0|max:100',
            'previous_school_college' => 'nullable|string|max:255',
            'previous_passing_year' => 'nullable|integer|min:1990|max:' . (date('Y') + 1),
        ]);

        // Create new application
        $application = new Application($request->all());

        // Generate application number
        $application->application_number = $application->generateApplicationNumber();

        // Set initial status
        $application->status = Application::STATUS_PENDING;
        $application->submitted_at = now();

        $application->save();

        return redirect()->route('admission.apply')
            ->with('success', 'Application submitted successfully! Your application number is: ' . $application->application_number);
    }
}
