<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'course' => 'required|string|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:1000',
        ]);

        // Here you would typically save to database and send email
        // For now, we'll just redirect with success message
        
        return redirect()->route('contact.index')->with('success', 'Thank you for your inquiry! We will get back to you soon.');
    }
}
