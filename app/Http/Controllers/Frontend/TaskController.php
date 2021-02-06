<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function showTask(Task $task)
    {
        return view('frontend.tasks.show', compact('task'));
    }
}
