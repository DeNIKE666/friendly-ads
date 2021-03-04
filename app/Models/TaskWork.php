<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Staudenmeir\EloquentJsonRelations\HasJsonRelationships;

class TaskWork extends Model
{
    use HasFactory, HasJsonRelationships;

    protected $fillable = [
        'task_id',
        'status',
        'options'
    ];

    public $casts = [
        'options' => 'object'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class , 'order_id' , 'id');
    }
}
