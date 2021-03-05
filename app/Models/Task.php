<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Str;
use Illuminate\Support\Stringable;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'full_description',
        'category_id',
        'user_id',
        'parameters',
        'amount',
        'sum_pay',
        'type_task',
        'type_position',
        'site_count',
        'period',
        'views',
        'isActive',
        'isPay'
    ];

    public $with = ['category' , 'user' , 'subscribe'];

    protected $casts = [
        'isActive' => 'boolean',
        'amount'   => 'decimal:0',
        'sum_pay'  => 'decimal:0'
    ];

    /**
     * @return Stringable
     */

    public function limitDescription()
    {
        return Str::of($this->description)->lower()->words(10 , '...');
    }

    /**
     * @return string
     */

    public function amount()
    {
        return number_format($this->amount , 0 , ',' , ' ');
    }

    /**
     * @return BelongsTo
     */

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * @return BelongsTo
     */

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return HasMany
     * Подписки
     */

    public function subscribe()
    {
        return $this->hasMany(SubscribeTask::class)->orderBy('created_at' , 'desc');
    }

    /**
     * @return HasOne
     * Текущий подписанный таск
     */

    public function yourSubscribe()
    {
        return $this->hasOne(SubscribeTask::class)->yourSubscribeCurrent();
    }

    /**
     * @param Builder $builder
     * Только активные записи
     */

    public function scopeStatusActive(Builder $builder)
    {
        $builder->where('isActive', 1);
    }

    /**
     * @return bool
     * Если набрано нужно кол-во исполнитьелей
     */

    public function scopeIsResponses()
    {
        return $this->subscribe()->count() >= $this->site_count;
    }

    /**
     * @return bool
     * Проверяем набран ли такс исполнителей
     */

    public function IsFull()
    {
        return $this->subscribe()->whereStatus(1)->count() >= $this->site_count;
    }

    /**
     * @return mixed
     */

    public function scopeSubscribeAccepted()
    {
        return $this->subscribe()->whereStatus(1)->get();
    }
}
