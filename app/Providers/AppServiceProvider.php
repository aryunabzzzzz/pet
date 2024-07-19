<?php

namespace App\Providers;

use App\Services\FoodExport\ExportService;
use App\Services\FoodExport\PdfExportService;
use App\Services\FoodExport\XlsxExportService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        if ($this->app->environment('local')) {
            $this->app->register(\Laravel\Telescope\TelescopeServiceProvider::class);
            $this->app->register(TelescopeServiceProvider::class);
        }

//        $this->app->singleton(ExportService::class, XlsxExportService::class);
        $this->app->singleton(ExportService::class, PdfExportService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
