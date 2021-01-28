<?php


namespace App\Repositories;


use App\Models\SubscribeTask;
use App\Models\Task;

class TaskRepository
{
    /**
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */

    public function getAll()
    {
        // На которых уже подписан пользователь

        $subs = SubscribeTask::where('subscribe_user_id', auth()->user()->id)->pluck('task_id');

        return Task::query()->whereNotIn('id', $subs)->paginate(10);
    }

    /**
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */

    public function getCurrentUser()
    {
        return Task::query()->where('user_id', auth()->user()->id)
            ->orderBy('created_at')
            ->paginate(10);
    }

    /**
     * @param Task $task
     * @return \Illuminate\Database\Eloquent\Model|\Illuminate\Database\Eloquent\Relations\HasMany|object|null
     */

    public function isSubscribeTask(Task $task)
    {
        return $task->subscribe()
            ->where('subscribe_user_id', auth()->user()->id)
            ->first();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */

    public function subsOffers()
    {
        return SubscribeTask::query()->where('subscribe_user_id', auth()->user()->id)->get();
    }
}