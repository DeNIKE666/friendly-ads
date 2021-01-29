<?php

namespace App\Http\Controllers\Cabinet\Executor;

use App\Http\Controllers\Controller;
use App\Models\SubscribeTask;
use App\Models\Task;
use App\Repositories\TaskRepository;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */

    public function index()
    {
        $offers = (new TaskRepository())->getAll();

        return view('cabinets.executor.offers.index', compact('offers'));
    }

    /**
     * @param Request $request
     * @param Task $task
     * @return \Illuminate\Database\Eloquent\Model
     */

    public function subscribeTask(Request $request, Task $task)
    {
        return $task->subscribe()->create([
            'task_id'           => $request->input('id'),
            'subscribe_user_id' => auth()->user()->id
        ]);
    }

    /**
     * @param Task $task
     * @return mixed
     */

    public function unSubscribe(Task $task)
    {
        return $task->subscribe()->delete();
    }

    /**
     * @param Task $task
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */

    public function showTask(Task $task)
    {
        // Проверка подписки

        $isSubscribe = (new TaskRepository())->isSubscribeTask($task);

        // Увелечение просмотров

        $task->increment('views', 1);

        return view('cabinets.executor.offers.show', compact('task' , 'isSubscribe'));
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */

    public function subsTasks()
    {
       $offers = (new TaskRepository())->subsOffers();

       return view('cabinets.executor.offers.subs', compact('offers'));
    }
}
