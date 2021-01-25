<?php


namespace App\Repositories;


use App\Models\Task;

class TasksRepository
{
    /**
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */

    public function getAll()
    {
        return Task::query()
            ->orderBy('created_at')
            ->paginate(10);
    }
}