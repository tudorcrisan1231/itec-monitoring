<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use App\Models\Application;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        $applications = Application::all();
        foreach ($applications as $application) {
            $schedule->call(function () use ($application) {
                // Execute your function for each application
                callEndpoints($application->id);
            })->cron(secondsToCronExpression($application->cron_seconds));
        }
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
