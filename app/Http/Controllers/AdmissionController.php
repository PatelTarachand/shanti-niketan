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
        try {
            $validatedData = $request->validate([
                'first_name' => 'required|string|max:255',
                'middle_name' => 'nullable|string|max:255',
                'last_name' => 'required|string|max:255',
                'email' => 'required|email|max:255|unique:applications,email',
                'phone' => 'required|string|max:20',
                'date_of_birth' => 'nullable|date|before:today',
                'gender' => 'nullable|in:male,female,other',
                'father_name' => 'required|string|max:255',
                'mother_name' => 'required|string|max:255',
                'father_occupation' => 'nullable|string|max:255',
                'guardian_phone' => 'nullable|string|max:20',
                'address' => 'required|string',
                'city' => 'required|string|max:255',
                'state' => 'required|string|max:255',
                'pincode' => 'required|string|max:10',
                'course' => 'required|string|max:255',
                'branch' => 'nullable|string|max:255',
                'category' => 'required|in:general,obc,sc,st,ews',
                'last_exam' => 'required|string|max:255',
                'board_university' => 'required|string|max:255',
                'percentage' => 'required|string|max:20',
                'passing_year' => 'required|integer|min:1990|max:' . (date('Y') + 1),
                'entrance_exam' => 'nullable|string|max:255',
                'declaration' => 'required|accepted',
            ], [
                'first_name.required' => 'First name is required.',
                'last_name.required' => 'Last name is required.',
                'email.required' => 'Email address is required.',
                'email.email' => 'Please enter a valid email address.',
                'email.unique' => 'This email address has already been used for an application.',
                'phone.required' => 'Phone number is required.',
                'father_name.required' => 'Father\'s name is required.',
                'mother_name.required' => 'Mother\'s name is required.',
                'address.required' => 'Address is required.',
                'city.required' => 'City is required.',
                'state.required' => 'State is required.',
                'pincode.required' => 'PIN code is required.',
                'course.required' => 'Please select a course.',
                'category.required' => 'Please select a category.',
                'last_exam.required' => 'Previous qualification is required.',
                'board_university.required' => 'Previous school/college name is required.',
                'percentage.required' => 'Percentage/CGPA is required.',
                'passing_year.required' => 'Year of passing is required.',
                'declaration.required' => 'You must accept the declaration.',
                'declaration.accepted' => 'You must accept the declaration to proceed.',
            ]);

            // Combine name fields
            $validatedData['name'] = trim($validatedData['first_name'] . ' ' .
                                         ($validatedData['middle_name'] ? $validatedData['middle_name'] . ' ' : '') .
                                         $validatedData['last_name']);

            // Create new application
            $application = new Application($validatedData);

            // Generate application number
            $application->application_number = $application->generateApplicationNumber();

            // Set initial status
            $application->status = Application::STATUS_PENDING;
            $application->submitted_at = now();

            // Save the application
            $saved = $application->save();

            // Debug: Log the application details
            \Log::info('Application saved', [
                'saved' => $saved,
                'application_number' => $application->application_number,
                'id' => $application->id,
                'name' => $application->name
            ]);

            if ($saved) {
                return redirect()->route('admission.apply')
                    ->with('success', 'Application submitted successfully! Your application number is: ' . $application->application_number . '. Please save this number for future reference.')
                    ->with('application_number', $application->application_number)
                    ->with('application_id', $application->id);
            } else {
                return redirect()->back()
                    ->withInput()
                    ->with('error', 'Failed to save application. Please try again.');
            }

        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()
                ->withErrors($e->validator)
                ->withInput()
                ->with('error', 'Please correct the errors below and try again.');
        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'An error occurred while submitting your application. Please try again.');
        }
    }
}
