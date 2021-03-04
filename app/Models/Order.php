<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'order',
        'pay_system',
        'user_id',
        'amount',
        'status',
        'task_id',
        'action_pay'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */

    public function tasks()
    {
        return $this->belongsTo(Task::class);
    }

    /**
     * @var string[]
     */

    public $casts = [
        'amount' => 'decimal:0',
        'params' => 'object'
    ];


}
