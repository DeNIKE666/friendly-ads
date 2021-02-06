<?php


namespace App\Repositories;

use App\Models\Task;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Cookie;

class TaskRepository
{
    /**
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */

    public function getAll()
    {
        $isCategoriesSites = auth()->user()->sites()->pluck('category_id');

        return Task::statusActive()->with(['user', 'category'])->where(function (Builder $query)  {
            $query->doesntHave('YourSubscribe');
        })->whereIn('category_id' , $isCategoriesSites)->orderByDesc('amount')->paginate(50);
    }

    /**
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */

    public function getAllForAdmin()
    {
        return Task::with(['user', 'category'])->paginate(50);
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

    /**
     * @return Builder[]|\Illuminate\Database\Eloquent\Collection
     */

    public function taskFrontend()
    {
        return Task::query()
            ->orderByDesc('amount')
            ->limit(10)
            ->get();
    }

    /**
     * @param null $category
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */

    public function taskFrontendCategory()
    {
        $cookieCategoryId = Cookie::get('category_id');

        if ($cookieCategoryId) :
            return Task::query()
           ->whereCategoryId($cookieCategoryId)
           ->orderByDesc('amount')
           ->paginate(10);
        else :
            return Task::query()
                ->orderByDesc('amount')
                ->paginate(150);
        endif;
    }
}