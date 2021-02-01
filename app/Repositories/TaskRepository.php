<?php


namespace App\Repositories;

use App\Models\Task;
use Illuminate\Database\Eloquent\Builder;

class TaskRepository
{
    /**
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */

    public function getAll()
    {
        $isCategoriesSites = auth()->user()->sites()->pluck('category_id');

        return Task::query()->with(['user', 'category'])->where(function (Builder $query)  {
            $query->doesntHave('YourSubscribe');
        })->whereIn('category_id' , $isCategoriesSites)->paginate(50);
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
        return $task->subscribe()->YourSubscribeCurrent()->first();
    }

    /**
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */

    public function subsOffers()
    {
       return Task::query()->with(['category' , 'user'])
           ->leftJoin('subscribe_tasks' , 'tasks.id' , '=', 'subscribe_tasks.task_id')
           ->where('subscribe_tasks.subscribe_user_id', '=', auth()->user()->id)
           ->orderBy('id' , 'desc')
           ->select('tasks.*')
           ->groupBy('tasks.id')
           ->paginate(100);
    }
}