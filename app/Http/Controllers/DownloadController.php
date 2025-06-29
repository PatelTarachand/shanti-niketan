<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DownloadController extends Controller
{
    public function prospectus()
    {
        return view('downloads.prospectus');
    }

    public function calendar()
    {
        return view('downloads.calendar');
    }

    public function forms()
    {
        return view('downloads.forms');
    }

    public function brochures()
    {
        return view('downloads.brochures');
    }
}
