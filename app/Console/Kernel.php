<?php

namespace App\Console;

use App\Jobs\TestSendEmail;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Console\Commands\ScheduleRunner;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
//
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {

    // Purge all In Active Equipment Types every minute
        $schedule->call(function () {
            DB::table('equipment_type')->WHERE('status', '=', 'In-Active')
                ->delete();
        })
                ->everyMinute()
                ->onSuccess(function () {
                    Storage::disk('local')->put('delete_inactive_equipment_types.log', 'Successfully Ran Job');
                })
                ->onFailure(function () {
                    Storage::disk('local')->put('delete_inactive_equipment_types.log', 'Job Failed to Run');
                })
                ->name('delete_inactive_equipment_types')
                ->runInBackground()
                ->evenInMaintenanceMode();

        // Purge all In Active Commodity Codes every minute
        $schedule->call(function () {
            DB::table('commodities')->WHERE('status', '=', 'In-Active')
                ->delete();
        })
            ->everyMinute()
            ->onSuccess(function () {
                Storage::disk('local')->put('delete_inactive_commodities.log', 'Successfully Ran Job');
            })
            ->onFailure(function () {
                Storage::disk('local')->put('delete_inactive_commodities.log', 'Job Failed to Run');
            })
            ->name('delete_inactive_commodities')
            ->runInBackground()
            ->evenInMaintenanceMode();

        // Purge all In Active Order Types every minute
        $schedule->call(function () {
            DB::table('order_types')->WHERE('status', '=', 'In-Active')
                ->delete();
        })
            ->everyMinute()
            ->onSuccess(function () {
                Storage::disk('local')->put('delete_inactive_ordertypes.log', 'Successfully Ran Job');
            })
            ->onFailure(function () {
                Storage::disk('local')->put('delete_inactive_ordertypes.log', 'Job Failed to Run');
            })
            ->name('delete_inactive_ordertypes')
            ->runInBackground()
            ->evenInMaintenanceMode();

        // Purge all In Active Commodity Codes every minute
        $schedule->call(function () {
            DB::table('tractors')->WHERE('status', '=', 'In-Active')
                ->delete();
        })
            ->everyMinute()
            ->onSuccess(function () {
                Storage::disk('local')->put('delete_inactive_tractors.log', 'Successfully Ran Job');
            })
            ->onFailure(function () {
                Storage::disk('local')->put('delete_inactive_tractors.log', 'Job Failed to Run');
            })
            ->name('delete_inactive_tractors')
            ->runInBackground()
            ->evenInMaintenanceMode();
    }


    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
