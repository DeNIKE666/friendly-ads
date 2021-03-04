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
        'status'
    ];

    protected $casts = [
        'status' => 'boolean',
        'amount' => 'decimal:0'
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
     * Подписки
     */

    public function subscribe()
    {
        return $this->hasMany(SubscribeTask::class)->orderBy('created_at' , 'desc');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     * Текущий подписанный таск
     */

    public function yourSubscribe()
    {
        return $this->hasOne(SubscribeTask::class)->YourSubscribeCurrent();
    }

    /**
     * @param Builder $builder
     * Только активные записи
     */

    public function scopeStatusActive(Builder $builder)
    {
        $builder->where('status', 1);
    }

    /**
     * @return bool
     * Если набрано нужно кол-во исполнитьелей
     */

    public function scopeIsResponses()
    {
        return $this->subscribe()->count() >= $this->site_count;
    }
}
