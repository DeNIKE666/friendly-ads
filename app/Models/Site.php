<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Site extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'url',
        'category_id',
        'user_id',
        'short',
        'rating',
        'activated'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected $casts = [
        'rating' => 'decimal:1'
    ];
}
