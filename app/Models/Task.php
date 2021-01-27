<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

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
        'period',
        'views'
    ];


    /**
     * @return \Illuminate\Support\Stringable
     */

    public function limitDescription()
    {
        return Str::of($this->description)->lower()->limit(100 , '...');
    }

    /**
     * @return \Illuminate\Support\Stringable
     */

    public function fullDescription()
    {
        return Str::of($this->description)->upper();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */

    public function subscribe()
    {
        return $this->hasMany(SubscribeTask::class);
    }

    /**
     * @param $id
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */

    public function yourSubscribe()
    {
        return $this->hasMany(SubscribeTask::class)->where('subscribe_user_id', auth()->user()->id);
    }
}
