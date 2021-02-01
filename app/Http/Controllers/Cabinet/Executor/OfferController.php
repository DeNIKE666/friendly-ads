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
        if ($task->subscribe()->YourSubscribe()->count() > 0):
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
     * @param Task $task
     * @return mixed
     */

    public function unSubscribe(Task $task)
    {
        return $task->subscribe()->YourSubscribeCurrent()->delete();
    }

    /**
     * @param Task $task
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */

    public function showTask(Task $task)
    {
        // Проверка подписки

        $isSubscribe = (new TaskRepository())->isSubscribeTask($task);

        // Сайты которые предоставил пользователь

        $myOfferSites =  $isSubscribe ? Str::of($isSubscribe->sites)->explode(',') : '';

        // Увелечение просмотров

        $task->increment('views', 1);

        return view('cabinets.executor.offers.show', [
            'task'         => $task,
            'isSubscribe'  => $isSubscribe,
            'myOfferSites' => $myOfferSites
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
