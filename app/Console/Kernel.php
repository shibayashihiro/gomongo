<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Http\Requests\ImportAutoTradersData;
use Illuminate\Support\Facades\Storage;
use App\Console\Commands\ImportDealerStock;

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
        // $schedule->command('import:stock')->everySixHours();
        $schedule->call(function () {
            $file = Storage::disk('sftp')->get('PhoenixWay.csv ');    
            Storage::disk('local')->put('exportcsv/PhoenixWay.csv', $file);
            
        })->everyMinute();
	    $schedule->command('import:stock')->everyMinute();
        
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
