<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\User;
use App\Event;
use App\Attendee;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        Commands\SendEmails::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $events = Event::whereMonth('Date', '=', date('m'))->get();
        foreach ($events as $event) {
            $eventID = $event -> id;
            $participants = Attendee::where('EventID', $eventID)->select('CustomerID')->groupby('CustomerID')->get();
            foreach ($participants as $participant) {
                $user = User::find($participant->CustomerID)->name;
                $schedule->command('email:send {{$user}}')
                  ->everyMinute()
                  ->sendOutputTo('storage/logs/email.log');
            }
        }
    }
    /**
     * Register the Closure based commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        require base_path('routes/console.php');
    }
}
