<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Repositories\CategoryRepository;
use App\Repositories\TaskRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class FrontendController extends Controller
{

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */

    public function index()
    {
        $tasks = (new TaskRepository())->taskFrontend();

        return view('frontend.index', compact('tasks'));
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */

    public function about()
    {
        $page = Page::whereName('about')->first();

        $page->increment('views',1);

        return view('frontend.about', compact('page'));
    }
}
