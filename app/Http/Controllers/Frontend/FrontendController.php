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
        $about = Page::whereName('about')->first();

        $about->increment('views',1);

        return view('frontend.about', compact('about'));
    }
}
