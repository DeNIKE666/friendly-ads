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
     * @return \Illuminate\Http\JsonResponse
     */

    public function subscribeTask(Request $request)
    {
        $check = SubscribeTask::where('task_id', $request->input('id'))->first();

        if ($check)
            return response()->json([
                'type' => 'error',
                'message' => 'Вы уже подписаны на это задание'
            ], 403);
        else

        $task = SubscribeTask::create([
            'task_id' => $request->input('id'),
            'subscribe_user_id' => auth()->user()->id
        ]);

        return response()->json([
            'type'    => 'success',
            'message' => 'Вы успешно подписались на задание',
            'task'    => $task
        ], 200);
    }

    /**
     * @param Task $task
     * @return \Illuminate\Http\JsonResponse
     */

    public function unSubscribe(Task $task)
    {
       $task->subscribe()->delete();

        return response()->json([
            'type' => 'success',
            'message' => 'Вы отписались от задания'
        ], 200);

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
}
