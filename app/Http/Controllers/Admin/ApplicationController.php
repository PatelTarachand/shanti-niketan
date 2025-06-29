<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Application;
use App\Models\Course;
use Illuminate\Support\Facades\Auth;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Application::query();

        // Apply search filter
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'LIKE', "%{$search}%")
                  ->orWhere('email', 'LIKE', "%{$search}%")
                  ->orWhere('phone', 'LIKE', "%{$search}%")
                  ->orWhere('application_number', 'LIKE', "%{$search}%")
                  ->orWhere('course', 'LIKE', "%{$search}%");
            });
        }

        // Apply status filter
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Apply course filter
        if ($request->filled('course')) {
            $query->where('course', $request->course);
        }

        // Apply date filter
        if ($request->filled('date_from')) {
            $query->whereDate('created_at', '>=', $request->date_from);
        }
        if ($request->filled('date_to')) {
            $query->whereDate('created_at', '<=', $request->date_to);
        }

        $applications = $query->with('reviewer')
            ->orderBy('created_at', 'desc')
            ->paginate(15);
        
        // Get filter options
        $courses = Application::distinct()->pluck('course')->filter()->sort();
        $statuses = Application::getStatuses();
        
        // Get statistics
        $stats = [
            'total' => Application::count(),
            'pending' => Application::pending()->count(),
            'under_review' => Application::underReview()->count(),
            'approved' => Application::approved()->count(),
            'rejected' => Application::rejected()->count(),
            'waitlisted' => Application::waitlisted()->count(),
        ];

        return view('admin.applications.index', compact('applications', 'courses', 'statuses', 'stats'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Application $application)
    {
        $application->load('reviewer');
        return view('admin.applications.show', compact('application'));
    }

    /**
     * Update application status
     */
    public function updateStatus(Request $request, Application $application)
    {
        $request->validate([
            'status' => 'required|in:pending,under_review,approved,rejected,waitlisted',
            'remarks' => 'nullable|string|max:1000'
        ]);

        $adminId = Auth::guard('admin')->id();

        switch ($request->status) {
            case 'under_review':
                $application->markAsUnderReview($adminId);
                break;
            case 'approved':
                $application->approve($adminId, $request->remarks);
                break;
            case 'rejected':
                $application->reject($adminId, $request->remarks);
                break;
            case 'waitlisted':
                $application->waitlist($adminId, $request->remarks);
                break;
            default:
                $application->update([
                    'status' => $request->status,
                    'remarks' => $request->remarks,
                    'reviewed_at' => now(),
                    'reviewed_by' => $adminId
                ]);
        }

        return redirect()->back()->with('success', 'Application status updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Application $application)
    {
        // Delete uploaded documents if any
        if ($application->documents) {
            foreach ($application->documents as $document) {
                if (isset($document['path']) && \Storage::disk('public')->exists($document['path'])) {
                    \Storage::disk('public')->delete($document['path']);
                }
            }
        }

        $application->delete();

        return redirect()->route('admin.applications.index')
            ->with('success', 'Application deleted successfully!');
    }

    /**
     * Bulk actions
     */
    public function bulkAction(Request $request)
    {
        $request->validate([
            'action' => 'required|in:approve,reject,delete,mark_under_review',
            'applications' => 'required|array',
            'applications.*' => 'exists:applications,id',
            'remarks' => 'nullable|string|max:1000'
        ]);

        $applications = Application::whereIn('id', $request->applications)->get();
        $adminId = Auth::guard('admin')->id();
        $count = 0;

        foreach ($applications as $application) {
            switch ($request->action) {
                case 'approve':
                    $application->approve($adminId, $request->remarks);
                    $count++;
                    break;
                case 'reject':
                    $application->reject($adminId, $request->remarks);
                    $count++;
                    break;
                case 'mark_under_review':
                    $application->markAsUnderReview($adminId);
                    $count++;
                    break;
                case 'delete':
                    // Delete documents
                    if ($application->documents) {
                        foreach ($application->documents as $document) {
                            if (isset($document['path']) && \Storage::disk('public')->exists($document['path'])) {
                                \Storage::disk('public')->delete($document['path']);
                            }
                        }
                    }
                    $application->delete();
                    $count++;
                    break;
            }
        }

        $actionText = [
            'approve' => 'approved',
            'reject' => 'rejected',
            'mark_under_review' => 'marked as under review',
            'delete' => 'deleted'
        ];

        return redirect()->back()->with('success', 
            "{$count} applications have been {$actionText[$request->action]} successfully!");
    }

    /**
     * Export applications
     */
    public function export(Request $request)
    {
        $query = Application::query();

        // Apply same filters as index
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }
        if ($request->filled('course')) {
            $query->where('course', $request->course);
        }
        if ($request->filled('date_from')) {
            $query->whereDate('created_at', '>=', $request->date_from);
        }
        if ($request->filled('date_to')) {
            $query->whereDate('created_at', '<=', $request->date_to);
        }

        $applications = $query->orderBy('created_at', 'desc')->get();

        $filename = 'applications_' . date('Y-m-d_H-i-s') . '.csv';
        
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => "attachment; filename=\"{$filename}\"",
        ];

        $callback = function() use ($applications) {
            $file = fopen('php://output', 'w');
            
            // CSV Headers
            fputcsv($file, [
                'Application Number',
                'Name',
                'Email',
                'Phone',
                'Course',
                'Branch',
                'Status',
                'Applied Date',
                'Reviewed Date',
                'Reviewer'
            ]);

            // CSV Data
            foreach ($applications as $application) {
                fputcsv($file, [
                    $application->application_number,
                    $application->name,
                    $application->email,
                    $application->phone,
                    $application->course,
                    $application->branch,
                    $application->status_text,
                    $application->created_at->format('Y-m-d H:i:s'),
                    $application->reviewed_at ? $application->reviewed_at->format('Y-m-d H:i:s') : '',
                    $application->reviewer ? $application->reviewer->name : ''
                ]);
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
}
