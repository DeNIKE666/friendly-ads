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
        $request->merge(['user_id' => auth()->user()->id]);

        Task::create($request->all());

        return redirect()->route('customer.tasks.index');
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
