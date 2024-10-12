<?php

namespace App\Console;

use App\Services\FakeApi\IntegrationService;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        // $schedule->command('inspire')->hourly();
        $schedule->command('telescope:prune')->daily();

        $schedule->call(function () {
            $get = new IntegrationService();
            $get->getIntoFoodsAvailableProducts();
        })->daily();

        $schedule->call(function () {
            $check = new IntegrationService();
            $check->checkActualityAndAvailability();
        })->dailyAt('12:00');
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
