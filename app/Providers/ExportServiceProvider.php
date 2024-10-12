<?php

namespace App\Providers;

use App\Services\FoodExport\ExportService;
use App\Services\FoodExport\PdfExportService;
use App\Services\FoodExport\XlsxExportService;
use Illuminate\Support\ServiceProvider;

class ExportServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
//        $this->app->singleton(ExportService::class, XlsxExportService::class);
        $this->app->singleton(ExportService::class, PdfExportService::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
