<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Repositories\CategoryRepository;
use App\Repositories\TaskRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class ProjectController extends Controller
{
    /**
     * @param Request $request
     */

    public function projectsSetCategory(Request $request)
    {
        cookie()->queue('category_id' , $request->input('category'));

        return redirect()->route('frontend.projects');
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */

    public function projects()
    {
        $tasks = (new TaskRepository())->taskFrontend();

        return view('frontend.projects.index', compact('tasks'));
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */

    public function resetSetting()
    {
        Cookie::queue(Cookie::forget('category_id'));

        return redirect()->route('frontend.projects');
    }

}
