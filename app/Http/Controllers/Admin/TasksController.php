<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Tasks\updateTask;
use App\Models\Task;
use App\Repositories\CategoryRepository;
use App\Repositories\TaskRepository;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    public function index()
    {
        $tasks = (new TaskRepository())->getAllForAdmin();

        return view('admin.tasks.index', compact('tasks'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
    }

    public function edit(Task $task)
    {
        $categories = (new CategoryRepository())->getAll();

        return view('admin.tasks.edit', compact('task' , 'categories'));
    }

    public function update(updateTask $request, Task $task)
    {
        $task->update($request->all());

        return redirect()->route('admin.tasks.index');
    }

    public function destroy(Task $task)
    {
        //
    }
}
