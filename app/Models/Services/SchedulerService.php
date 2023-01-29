<?php

namespace App\Models\Services;

use App\Models\SchedulerTasks;
use App\Models\Tasks;

class SchedulerService
{
    public static function calculateTotals(): void
    {
        $tasks = Tasks::all();
        $total = count($tasks);
        $done = 0;
        $notDone = 0;
        foreach ($tasks as $task) {
            if ($task->completed) {
                $done++;
            } else {
                $notDone++;
            }
        }
        SchedulerTasks::create([
            'total' => $total,
            'done' => $done,
            'notDone' => $notDone,
            'created_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
