<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'category_id',
        'user_id',
        'parameters',
        'amount',
        'type_task',
        'type_position',
        'site_count',
        'period'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
