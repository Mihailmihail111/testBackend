<?php

namespace App\Console\Commands;

use App\Models\SchedulerTasks;
use Illuminate\Console\Command;

class CalculateTasks extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'calculate:tasks';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'calculate tasks done and not done';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $SchedulerTasks = SchedulerTasks::all();
        $this->info('Daily calculation of tasks');
        $this->table(['Id', 'Total', 'Done', 'Not done', 'Day'], $SchedulerTasks->toArray());
    }
}
