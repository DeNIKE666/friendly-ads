<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskWork extends Model
{
    use HasFactory;

    protected $fillable = [
        'task_id',
        'status',
        'options',
    ];
}
