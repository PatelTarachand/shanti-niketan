<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;

class GalleryController extends Controller
{
    public function index()
    {
        $gallery = Gallery::active()
            ->ordered()
            ->get()
            ->groupBy('category');

        $categories = Gallery::active()
            ->distinct()
            ->pluck('category');

        return view('gallery.index', compact('gallery', 'categories'));
    }

    public function photos()
    {
        $photos = Gallery::active()
            ->byType('image')
            ->ordered()
            ->get();

        return view('gallery.photos', compact('photos'));
    }

    public function videos()
    {
        $videos = Gallery::active()
            ->byType('video')
            ->ordered()
            ->get();

        return view('gallery.videos', compact('videos'));
    }
}
