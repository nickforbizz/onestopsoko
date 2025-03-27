<?php

namespace App\Console;

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

        // Daily at 23:50 (adjust timezone in config/app.php)
        $schedule->command('report:daily')->dailyAt('23:50');

        // Weekly on Sunday at 23:50
        $schedule->command('report:weekly')->weeklyOn(0, '23:50');

        // Monthly on last day at 23:50
        $schedule->command('report:monthly')->lastDayOfMonth('23:50');
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
