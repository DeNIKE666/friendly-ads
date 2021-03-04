<?php

namespace App\Http\Controllers\Cabinet\Customer;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Tasks\updateTask;
use App\Http\Requests\Cabinets\Customer\createTask;
use App\Models\SubscribeTask;
use App\Models\Task;
use App\Repositories\CategoryRepository;
use App\Repositories\TaskRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class TaskController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */

    public function index()
    {
        $tasks = (new TaskRepository())->getCurrentUser();

        return view('cabinets.customer.task.index', compact('tasks'));
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */

    public function create()
    {
        $categories = (new CategoryRepository())->getAll();

        return view('cabinets.customer.task.create', compact('categories'));
    }

    /**
     * @param createTask $request
     */

    public function store(createTask $request)
    {
        $request->merge([
            'user_id'    => auth()->user()->id,
            'sum_pay'    => $request->input('sum_pay'),
            'parameters' => json_encode(['prices' => $request->input('prices')])
        ]);

        return Task::create($request->all());
    }

    /**
     * @param Task $task
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */

    public function show(Task $task)
    {
        return view('cabinets.customer.task.show', compact('task'));
    }

    /**
     * @param Task $task
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */

    public function edit(Task $task)
    {
        $task = Task::with(['category' , 'user'])->find($task->id);

        $categories = (new CategoryRepository())->getAll();

        return view('cabinets.customer.task.edit', compact('categories','task'));
    }

    /**
     * @param createTask $request
     * @param Task $task
     * @return \Illuminate\Http\RedirectResponse
     */

    public function update(updateTask $request, Task $task)
    {

        $request->merge([
            'sum_pay'    => $request->input('sum_pay'),
            'parameters' => json_encode(['prices' => $request->input('prices')])
        ]);

        $task->update($request->all());

        return $task;
    }

    /**
     * @param Task $task
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */

    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->route('customer.tasks.index');
    }

    /**
     * @param SubscribeTask $subscribeTask
     * Принять отклик исполнителя
     */

    public function accept(SubscribeTask $subscribeTask)
    {
        return $subscribeTask->update(['status' => 1]);
    }

    /**
     * @param SubscribeTask $subscribeTask
     * @throws \Exception
     * Отклонить отклик исполнителя
     */

    public function reject(SubscribeTask $subscribeTask)
    {
        return $subscribeTask->update(['status' => 2]);
    }

    /**
     * @param Task $task
     * Добаляем задание в работу
     */

    public function sendWorkTask(Task $task)
    {
        if ($task->work) :
            return redirect()->back()->with('error' , 'Данное задание уже создано');
        endif;

        $task->work()->create([
            'status' => 0,
            'options' => [
                'orderUnique' => Str::uuid()->toString()
            ]
        ]);

        return redirect()->back();
    }
}
