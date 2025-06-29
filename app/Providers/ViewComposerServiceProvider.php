<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Course;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // Share course counts with navigation
        View::composer('layouts.app', function ($view) {
            $courseCounts = [
                'undergraduate' => Course::active()->where('name', 'LIKE', 'B.%')->count(),
                'postgraduate' => Course::active()->where('name', 'LIKE', 'M.%')->count(),
                'diploma' => Course::active()->where('name', 'LIKE', 'Diploma%')->count(),
                'total' => Course::active()->count(),
            ];

            $view->with('courseCounts', $courseCounts);
        });
    }
}
