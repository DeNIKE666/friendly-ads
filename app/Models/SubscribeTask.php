<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubscribeTask extends Model
{
    use HasFactory;

    protected $fillable = [
        'task_id',
        'subscribe_user_id',
        'sites'
    ];

    public function task()
    {
        return $this->belongsTo(Task::class);
    }

    public function user() {
        return  $this->belongsTo(User::class , 'subscribe_user_id');
    }

    public function scopeYourSubscribe(Builder $builder)
    {
        return $builder->where('subscribe_user_id', '=', auth()->user()->id);
    }
}
