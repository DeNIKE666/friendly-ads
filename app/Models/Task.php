<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
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
        'views',
        'status'
    ];

    protected $casts = [
        'status' => 'boolean'
    ];

    /**
     * @return \Illuminate\Support\Stringable
     */

    public function limitDescription()
    {
        return Str::of(strip_tags($this->description))->lower()->limit(85 , '...');
    }

    public function amount() {
        return number_format($this->amount , 0 , ',' , ' ');
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
        return $this->hasMany(SubscribeTask::class)->orderBy('created_at' , 'desc');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */

    public function yourSubscribe()
    {
        return $this->hasOne(SubscribeTask::class)->where('subscribe_user_id', '=', auth()->user()->id);
    }

    public function scopeStatusActive(Builder $builder)
    {
        $builder->where('status', 1);
    }

}
