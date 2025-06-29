<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DisclosureController extends Controller
{
    public function index()
    {
        return view('disclosure.index');
    }

    public function rti()
    {
        return view('disclosure.rti');
    }

    public function antiRagging()
    {
        return view('disclosure.anti-ragging');
    }

    public function committees()
    {
        return view('disclosure.committees');
    }

    public function reports()
    {
        return view('disclosure.reports');
    }
}
