<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Notice;
use App\Models\SiteSetting;

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
        // Fetch data for all views
        View::composer('*', function ($view) {
            // Header Notices
            $headerNotices = Notice::active()
                ->orderBy('priority', 'desc')
                ->orderBy('publish_date', 'desc')
                ->take(10)
                ->get();
            $view->with('headerNotices', $headerNotices);

            // Site Settings
            $siteSettings = SiteSetting::first();
            $view->with('siteSettings', $siteSettings);
        });
    }
}
