<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubscribeTask extends Model
{
    use HasFactory;

    protected $fillable = [
        'task_id',
        'subscribe_user_id'
    ];

    public function task()
    {
        return $this->belongsTo(Task::class);
    }

}
