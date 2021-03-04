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
        'params',
        'action_pay'
    ];

    public $casts = [
        'amount' => 'decimal:0'
    ];

}