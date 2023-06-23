<?php

namespace App\Console;

use App\Http\Controllers\CronController;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Log;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        // $schedule->command('schedule:work')
        //     ->withoutOverlapping()
        //     ->timeout(120);
        $schedule->command('schedule:run')->withoutOverlapping()->appendOutputTo(storage_path('logs/schedule.log'))->runInBackground();
        $schedule->call(function () {
            // Call the task
            app(CronController::class)->addData();
        })->everyMinute();
        // $schedule->call(function () {
        //     try {
        //         // Increase the maximum execution time
        //         set_time_limit(120); // Set the limit to 120 seconds (2 minutes)
    
        //         // Call the task
        //         app(CronController::class)->addData();
        //     } catch (\Exception $e) {
        //         // Log the exception for debugging
        //         Log::error('An error occurred during task execution: ' . $e->getMessage());
    
        //         // Return an error response
        //         return response()->json(['error' => 'An error occurred during task execution.'], 500);
        //     }
        // })->everyMinute();
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
