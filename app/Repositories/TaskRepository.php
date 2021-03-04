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

        return Task::statusActive()->where(function (Builder $query)  {
           $query->doesntHave('yourSubscribe');
        })
            ->whereIn('category_id' , $isCategoriesSites)
            ->orderByDesc('amount')->paginate(50);
    }

    /**
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */

    public function getAllForAdmin()
    {
        return Task::paginate(50);
    }

    /**
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */

    public function getCurrentUser()
    {
        return Task::where('user_id', auth()->user()->id)
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
       return Task::leftJoin('subscribe_tasks' , 'tasks.id' , '=', 'subscribe_tasks.task_id')
           ->where('subscribe_tasks.subscribe_user_id', '=', auth()->user()->id)
           ->orderBy('id' , 'desc')
           ->select('tasks.*')
           ->groupBy('subscribe_tasks.id')
           ->paginate(10);
    }


    /**
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */

    public function taskFrontend()
    {
        // Выбранная категория в фильтрах

        $category_id      = request('category_id');

        // Тип задачи из фильтра

        $type_task        = request('type_task');

        // Сортировка по цене из фильтра

        $orderByAmount    = request('amount');

        $tasks = Task::statusActive();

        if ($category_id) {
            $tasks->whereCategoryId($category_id);
        }

        if ($type_task) {
            $tasks->whereTypeTask($type_task);
        }

        switch ($orderByAmount) {
            case 1:
                $tasks->orderBy('amount' , 'desc');
                break;
            case 2:
                $tasks->orderBy('amount' , 'asc');
                break;
        }

        return $tasks->orderBy('amount', 'desc')->paginate(10);
    }
}