<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Repositories\TaskRepository;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $tasks = (new TaskRepository())->taskFrontend();

        return view('frontend.index', compact('tasks'));
    }

    public function about()
    {
        $page = Page::whereName('about')->first();

        $page->increment('views',1);

        return view('frontend.about', compact('page'));
    }
}
