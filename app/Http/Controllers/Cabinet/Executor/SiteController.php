<?php

namespace App\Http\Controllers\Cabinet\Executor;

use App\Http\Controllers\Controller;
use App\Http\Requests\Cabinets\Executor\createSite;
use App\Models\Category;
use App\Models\Site;
use App\Repositories\SiteRepository;
use Illuminate\Http\Request;

class SiteController extends Controller
{

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */

    public function index()
    {
        $sites = (new SiteRepository())->getCurrentUser();

        return view('cabinets.executor.sites.index', compact('sites'));
    }

    public function create()
    {
        $categories = Category::withDepth()->defaultOrder()->get();

        return view('cabinets.executor.sites.create', compact('categories'));
    }

    /**
     * @param createSite $request
     * @return \Illuminate\Http\RedirectResponse
     */

    public function store(createSite $request)
    {
        Site::create([
            'title'       => $request->input('title'),
            'url'         => $request->input('url'),
            'short'       => $request->input('short'),
            'category_id' => $request->input('parent_id'),
            'user_id'     => auth()->user()->id
        ]);

        return redirect()->route('executor.sites.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
