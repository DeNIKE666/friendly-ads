<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

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
        'params',
        'action_pay'
    ];


    /**
     * @return BelongsTo
     */

    public function task()
    {
        return $this->belongsTo(Task::class);
    }

    /**
     * @var string[]
     */

    public $casts = [
        'amount' => 'decimal:0',
        'params' => 'json'
    ];


}
