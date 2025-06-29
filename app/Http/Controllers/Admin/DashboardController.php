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
use App\Models\Course;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        // Basic Statistics
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
            'approved_applications' => Application::approved()->count(),
            'rejected_applications' => Application::rejected()->count(),
            'total_courses' => Course::count(),
            'active_courses' => Course::active()->count(),
            'total_admins' => Admin::count(),
            'active_admins' => Admin::where('is_active', true)->count(),
        ];

        // Recent Activity
        $recent_notices = Notice::with('admin')
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        $recent_faculty = Faculty::orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        $recent_applications = Application::orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        $recent_alumni = Alumni::active()
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        // Analytics Data
        $analytics = $this->getAnalyticsData();

        // Quick Stats for Today
        $today_stats = [
            'new_applications_today' => Application::whereDate('created_at', Carbon::today())->count(),
            'new_notices_today' => Notice::whereDate('created_at', Carbon::today())->count(),
            'new_faculty_today' => Faculty::whereDate('created_at', Carbon::today())->count(),
            'new_alumni_today' => Alumni::whereDate('created_at', Carbon::today())->count(),
        ];

        // System Health
        $system_health = [
            'database_status' => 'healthy',
            'storage_usage' => $this->getStorageUsage(),
            'last_backup' => 'N/A',
            'uptime' => '99.9%'
        ];

        return view('admin.dashboard', compact(
            'stats',
            'recent_notices',
            'recent_faculty',
            'recent_applications',
            'recent_alumni',
            'analytics',
            'today_stats',
            'system_health'
        ));
    }

    private function getAnalyticsData()
    {
        // Applications trend for last 7 days
        $applications_trend = [];
        for ($i = 6; $i >= 0; $i--) {
            $date = Carbon::now()->subDays($i);
            $applications_trend[] = [
                'date' => $date->format('M d'),
                'count' => Application::whereDate('created_at', $date)->count()
            ];
        }

        // Faculty by department
        $faculty_by_department = Faculty::selectRaw('department, COUNT(*) as count')
            ->groupBy('department')
            ->get()
            ->pluck('count', 'department')
            ->toArray();

        // Applications by status
        $applications_by_status = [
            'pending' => Application::pending()->count(),
            'under_review' => Application::where('status', 'under_review')->count(),
            'approved' => Application::approved()->count(),
            'rejected' => Application::rejected()->count(),
            'waitlisted' => Application::where('status', 'waitlisted')->count(),
        ];

        // Monthly registrations (last 6 months)
        $monthly_data = [];
        for ($i = 5; $i >= 0; $i--) {
            $date = Carbon::now()->subMonths($i);
            $monthly_data[] = [
                'month' => $date->format('M Y'),
                'applications' => Application::whereYear('created_at', $date->year)
                    ->whereMonth('created_at', $date->month)
                    ->count(),
                'alumni' => Alumni::whereYear('created_at', $date->year)
                    ->whereMonth('created_at', $date->month)
                    ->count(),
            ];
        }

        return [
            'applications_trend' => $applications_trend,
            'faculty_by_department' => $faculty_by_department,
            'applications_by_status' => $applications_by_status,
            'monthly_data' => $monthly_data,
        ];
    }

    private function getStorageUsage()
    {
        $total_space = disk_total_space(storage_path());
        $free_space = disk_free_space(storage_path());
        $used_space = $total_space - $free_space;
        $usage_percentage = round(($used_space / $total_space) * 100, 2);

        return [
            'used' => $this->formatBytes($used_space),
            'total' => $this->formatBytes($total_space),
            'percentage' => $usage_percentage
        ];
    }

    private function formatBytes($bytes, $precision = 2)
    {
        $units = array('B', 'KB', 'MB', 'GB', 'TB');

        for ($i = 0; $bytes > 1024 && $i < count($units) - 1; $i++) {
            $bytes /= 1024;
        }

        return round($bytes, $precision) . ' ' . $units[$i];
    }
}
