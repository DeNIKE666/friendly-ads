<?php

namespace App\Http\Controllers\Cabinet\Executor;

use App\Http\Controllers\Controller;
use App\Http\Requests\Cabinets\Executor\addSubscribe;
use App\Models\SubscribeTask;
use App\Models\Task;
use App\Repositories\TaskRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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
     * @param addSubscribe $request
     * @param Task $task
     * @return \Illuminate\Database\Eloquent\Model|\Illuminate\Http\JsonResponse
     */

    public function subscribeTask(addSubscribe $request, Task $task)
    {
        if (auth()->user()->id == $task->user_id) :
            return response()->json([
                'message' => 'Нельзя оставить отклик на своё же задание.'
            ], 422);
        elseif ($task->IsResponses()):
            return response()->json([
                'message' => 'Предложение закрыто, так как уже набрано максимальное количество откликов'
            ], 422);
        elseif($task->YourSubscribe()->count() > 0):
            return response()->json([
                'message' => 'Вы уже подписаны на это задание, подпишитесь на другое.'
            ], 422);
        endif;

        $sites = implode(', ' , $request->input('sites'));

        return $task->subscribe()->create([
            'task_id'           => $request->input('id'),
            'subscribe_user_id' => auth()->user()->id,
            'sites'             => $sites
        ]);
    }

    /**
     * @param SubscribeTask $subscribeTask
     * @return bool|null
     * @throws \Exception
     */

    public function unSubscribe(SubscribeTask $subscribe)
    {
       return $subscribe->delete();
    }

    /**
     * @param Task $task
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */

    public function showTask(Task $task)
    {
        // Увелечение просмотров

        $task->increment('views', 1);

        return view('cabinets.executor.offers.show', [
            'task'         => $task
        ]);
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
