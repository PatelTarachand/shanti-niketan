<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notice;

class NoticeController extends Controller
{
    public function index(Request $request)
    {
        $query = Notice::active();

        // Apply category filter if provided
        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        // Apply priority filter if provided
        if ($request->filled('priority')) {
            $query->where('priority', $request->priority);
        }

        $notices = $query->orderBy('priority', 'desc')
            ->orderBy('created_at', 'desc')
            ->paginate(12);

        $categories = Notice::active()
            ->distinct()
            ->pluck('category');

        return view('notices.index', compact('notices', 'categories'));
    }

    public function show(Notice $notice)
    {
        // Only show active notices
        if (!$notice->is_active) {
            abort(404);
        }

        // Get related notices from same category
        $relatedNotices = Notice::active()
            ->where('category', $notice->category)
            ->where('id', '!=', $notice->id)
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        return view('notices.show', compact('notice', 'relatedNotices'));
    }
}
