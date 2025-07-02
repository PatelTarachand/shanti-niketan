<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Log;

class ContactController extends Controller
{
    /**
     * Display the contact page.
     */
    public function index()
    {
        return view('contact.index');
    }

    /**
     * Store a contact inquiry.
     */
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'phone' => 'required|string|max:20',
                'course' => 'required|string|max:255',
                'subject' => 'required|string|max:255',
                'message' => 'required|string|max:1000',
            ], [
                'name.required' => 'Full name is required.',
                'email.required' => 'Email address is required.',
                'email.email' => 'Please enter a valid email address.',
                'phone.required' => 'Phone number is required.',
                'course.required' => 'Please select a course of interest.',
                'subject.required' => 'Subject is required.',
                'message.required' => 'Message is required.',
                'message.max' => 'Message cannot exceed 1000 characters.',
            ]);

            // Save contact inquiry to database
            $contact = Contact::create($validatedData);

            // Log the contact submission
            Log::info('New contact inquiry submitted', [
                'contact_id' => $contact->id,
                'name' => $contact->name,
                'email' => $contact->email,
                'subject' => $contact->subject
            ]);

            return redirect()->route('contact.index')
                ->with('success', 'Thank you for your inquiry! We have received your message and will get back to you soon. Your inquiry ID is: #' . str_pad($contact->id, 4, '0', STR_PAD_LEFT));

        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()
                ->withErrors($e->validator)
                ->withInput()
                ->with('error', 'Please correct the errors below and try again.');
        } catch (\Exception $e) {
            Log::error('Contact form submission failed', [
                'error' => $e->getMessage(),
                'data' => $request->all()
            ]);

            return redirect()->back()
                ->withInput()
                ->with('error', 'Sorry, there was an error submitting your inquiry. Please try again or contact us directly.');
        }
    }
}
