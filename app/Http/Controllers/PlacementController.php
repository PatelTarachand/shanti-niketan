<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PlacementController extends Controller
{
    public function index()
    {
        return view('placements.index');
    }

    public function statistics()
    {
        return view('placements.statistics');
    }

    public function companies()
    {
        return view('placements.companies');
    }
}
