<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use App\Models\Application; // Make sure to import the Application model.
use App\Models\Category;
use App\Models\Orphan;
use App\Models\User;
use App\Models\Income;
use App\Models\Expense;
use App\Models\Configuration;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

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
        // View Composer for the sidebar layout
        View::composer('backend.layouts.sidebar', function ($view) {
            $countApplicationRegistration = Application::where('status_pendaftaran', 'Dalam Proses')->count();
            $countApplicationApproval = Application::where('status_permohonan', 'Dalam Proses')->count();
            $configuration = Configuration::first();
            $view->with([
                'countApplicationRegistration' => $countApplicationRegistration,
                'countApplicationApproval' => $countApplicationApproval,
                'configuration' => $configuration,
            ]);
        });

        // View Composer for the navbar layout
        View::composer('backend.layouts.app', function ($view) {
            $configuration = Configuration::first();
            $view->with([
                'configuration' => $configuration,
            ]);
        });

        View::composer('auth.login', function ($view) {
            $configuration = Configuration::first();
            $view->with([
                'configuration' => $configuration,
            ]);
        });

        View::composer('auth.register', function ($view) {
            $configuration = Configuration::first();
            $view->with([
                'configuration' => $configuration,
            ]);
        });
    }
}
