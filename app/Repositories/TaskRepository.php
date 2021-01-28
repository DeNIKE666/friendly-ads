<?php


namespace App\Repositories;


use App\Models\Task;

class TaskRepository
{
    /**
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */

    public function getAll()
    {
        return Task::with('subscribe')
            ->orderBy('created_at')
            ->paginate(10);
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

    public function isSubscribeTask(Task $task)
    {
        return $task->subscribe()
            ->where('subscribe_user_id', auth()->user()->id)
            ->first();
    }
}