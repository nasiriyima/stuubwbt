<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        // Commands\Inspire::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')
        //          ->hourly();
        //Lucene Student Update
        $student_count = (\App\SystemPreference::systemSettings('student_record_count')->value)?
            \App\SystemPreference::systemSettings('student_record_count')->value:0;
        $studentCount = count(\App\User::studentUsers());
        if($studentCount > $student_count || $studentCount < $student_count){
            $schedule->command('search:rebuild')
                ->everyMinute();

            $setting = \App\SystemPreference::systemSettings('student_record_count');
            $setting->value = $studentCount;
            $setting->save();
        }

        $schedule->command('queue:work')
            ->everyMinute();
    }
}
