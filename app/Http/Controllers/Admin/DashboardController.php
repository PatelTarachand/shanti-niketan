<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Notice;
use App\Models\Faculty;
use App\Models\Gallery;
use App\Models\Admin;
use App\Models\Alumni;
use App\Models\Application;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_notices' => Notice::count(),
            'active_notices' => Notice::active()->count(),
            'total_faculty' => Faculty::count(),
            'active_faculty' => Faculty::active()->count(),
            'total_gallery' => Gallery::count(),
            'active_gallery' => Gallery::active()->count(),
            'total_alumni' => Alumni::count(),
            'active_alumni' => Alumni::active()->count(),
            'total_applications' => Application::count(),
            'pending_applications' => Application::pending()->count(),
            'total_admins' => Admin::count(),
            'active_admins' => Admin::where('is_active', true)->count(),
        ];

        $recent_notices = Notice::with('admin')
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        $recent_faculty = Faculty::orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        return view('admin.dashboard', compact('stats', 'recent_notices', 'recent_faculty'));
    }
}
