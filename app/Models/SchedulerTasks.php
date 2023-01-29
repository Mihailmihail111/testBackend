<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchedulerTasks extends Model
{
    use HasFactory;

    protected $fillable = [
        'total',
        'done',
        'notDone',
        'created_at',
        'updated_at'
    ];
}
