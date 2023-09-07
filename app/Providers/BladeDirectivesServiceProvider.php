<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade; 

class BladeDirectivesServiceProvider extends ServiceProvider
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
        // Define the custom Blade directive for formatting dates
        Blade::directive('formatDate', function ($expression) {
            return "<?php echo (new \DateTime($expression))->format('d-m-Y'); ?>";
        });
    }
}
