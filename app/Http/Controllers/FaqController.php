<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Faq;

class FaqController extends Controller
{
    public function index(Request $request)
    {
        $query = Faq::active();

        // Apply category filter if provided
        if ($request->filled('category')) {
            $query->byCategory($request->category);
        }

        // Apply search if provided
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('question', 'LIKE', "%{$search}%")
                  ->orWhere('answer', 'LIKE', "%{$search}%")
                  ->orWhere('tags', 'LIKE', "%{$search}%");
            });
        }

        $faqs = $query->ordered()->paginate(12);

        // Get categories for filter
        $categories = Faq::active()
            ->distinct()
            ->pluck('category')
            ->sort();

        // Get featured FAQs for sidebar
        $featuredFaqs = Faq::active()
            ->featured()
            ->ordered()
            ->limit(5)
            ->get();

        // Get popular FAQs
        $popularFaqs = Faq::active()
            ->popular()
            ->limit(5)
            ->get();

        return view('faq.index', compact('faqs', 'categories', 'featuredFaqs', 'popularFaqs'));
    }

    public function show(Faq $faq)
    {
        // Only show active FAQs
        if (!$faq->is_active) {
            abort(404);
        }

        // Increment view count
        $faq->incrementViewCount();

        // Get related FAQs from same category
        $relatedFaqs = Faq::active()
            ->byCategory($faq->category)
            ->where('id', '!=', $faq->id)
            ->ordered()
            ->limit(5)
            ->get();

        return view('faq.show', compact('faq', 'relatedFaqs'));
    }

    public function search(Request $request)
    {
        $query = $request->get('q');

        if (empty($query)) {
            return redirect()->route('faq.index');
        }

        $faqs = Faq::active()
            ->where(function($q) use ($query) {
                $q->where('question', 'LIKE', "%{$query}%")
                  ->orWhere('answer', 'LIKE', "%{$query}%")
                  ->orWhere('tags', 'LIKE', "%{$query}%");
            })
            ->ordered()
            ->paginate(12);

        $categories = Faq::active()
            ->distinct()
            ->pluck('category')
            ->sort();

        return view('faq.search', compact('faqs', 'query', 'categories'));
    }
}
