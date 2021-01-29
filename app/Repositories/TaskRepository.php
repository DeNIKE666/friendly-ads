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
        $tasks = SubscribeTask::whereSubscribeUserId(auth()->user()->id)
            ->pluck('task_id');

        return Task::query()->whereNotIn('id', $tasks)->paginate(30);
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
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */

    public function subsOffers()
    {
       return Task::query()->leftJoin('subscribe_tasks' , 'tasks.id' , '=', 'subscribe_tasks.task_id')
            ->where('subscribe_tasks.subscribe_user_id', '=', auth()->user()->id)
            ->select('tasks.*')
            ->groupBy('tasks.id')->paginate(100);
    }
}