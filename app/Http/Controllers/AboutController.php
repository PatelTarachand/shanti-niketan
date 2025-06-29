<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * Display the about us page.
     */
    public function index()
    {
        return view('about.index');
    }

    /**
     * Display the principal's message page.
     */
    public function principal()
    {
        return view('about.principal');
    }

    /**
     * Display the accreditation page.
     */
    public function accreditation()
    {
        return view('about.accreditation');
    }
}
