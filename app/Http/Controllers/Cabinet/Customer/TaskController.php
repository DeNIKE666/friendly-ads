<?php

namespace App\Http\Controllers\Cabinet\Customer;

use App\Http\Controllers\Controller;
use App\Http\Requests\Cabinets\Customer\createTask;
use App\Models\SubscribeTask;
use App\Models\Task;
use App\Repositories\CategoryRepository;
use App\Repositories\TaskRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

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
        $amount = $request->amount * $request->site_count['count'] + ($request->period['price'] + $request->type_task['price'] + $request->type_position['price']);

        $parameters = [
            'period' => [
                'day' => $request->period['day'],
                'price' => $request->period['price'],
            ],
            'type_task' => [
                'type' => $request->type_task['type'],
                'price' => $request->type_task['price'],
            ],
            'type_position' => [
                'type' => $request->type_position['type'],
                'price' => $request->type_position['price'],
            ],
        ];

        return Task::create([
            'title'            => $request->title,
            'description'      => $request->description,
            'full_description' => $request->full_description,
            'category_id'      => $request->category_id,
            'user_id'          => auth()->user()->id,
            'amount'           => $request->amount,
            'sum_pay'          => $amount,
            'period'           => $request->period['day'],
            'type_task'        => $request->type_task['type'],
            'type_position'    => $request->type_position['type'],
            'site_count'       => $request->site_count['count'],
            'parameters'       => json_encode($parameters),
        ]);

     //   $request->merge(['user_id' => auth()->user()->id]);

      //  Task::create($request->all());

       // return redirect()->route('customer.tasks.index');
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
        $categories = (new CategoryRepository())->getAll();

        return view('cabinets.customer.task.edit', compact('categories','task'));
    }

    /**
     * @param createTask $request
     * @param Task $task
     * @return \Illuminate\Http\RedirectResponse
     */

    public function update(createTask $request, Task $task)
    {
        $task->update($request->all());

        return redirect()->route('customer.tasks.index');
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
        return $subscribeTask->delete();
    }
}
