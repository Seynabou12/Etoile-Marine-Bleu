<?php

namespace App\Console;

use App\Events\ActionLogEvent;
use App\Models\Archive;
use App\Models\Entreprise;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected $commands = [
        'App\Console\Commands\DatabaseBackUp'
    ];

    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();
        // $schedule->command('database:backup')->hourlyAt(39);
        $schedule->call(function(){

            $entreprise_id = Entreprise::$entreprise_id;
            $reponse = Archive::ftpArchivesUpdate($entreprise_id);
            if($reponse){
                $type = 'Cron';
                $commentaire = "Exécution du cron";
                event(new ActionLogEvent($type, null, $commentaire));

            }
            $type = 'Cron';
            $commentaire = "Erreur de récupération des archives";
            event(new ActionLogEvent($type, null, $commentaire));
        })->hourlyAt(49)->environments(['local', 'production']);
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
