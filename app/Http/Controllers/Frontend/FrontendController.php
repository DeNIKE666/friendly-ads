<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        return view('frontend.index');
    }

    public function about()
    {
        $page = Page::whereName('about')->first();

        $page->increment('views',1);

        return view('frontend.about', compact('page'));
    }
}
