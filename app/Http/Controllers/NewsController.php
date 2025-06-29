<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notice;

class NewsController extends Controller
{
    public function index()
    {
        // Redirect to notices page or show notices as news
        $notices = Notice::active()
            ->whereIn('category', ['academic', 'events', 'general'])
            ->orderBy('priority', 'desc')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('news.index', compact('notices'));
    }

    public function events()
    {
        // Show event-related notices
        $events = Notice::active()
            ->where('category', 'events')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('news.events', compact('events'));
    }

    public function show($id)
    {
        $notice = Notice::active()->findOrFail($id);
        return view('news.show', compact('notice'));
    }
}
