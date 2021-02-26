<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\createSite;
use App\Http\Requests\Admin\updateSite;
use App\Models\Site;
use App\Repositories\CategoryRepository;
use App\Repositories\SiteRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class SiteController extends Controller
{

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */

    public function index()
    {
        $sites = (new SiteRepository())->getAll();

        return view('admin.sites.index', compact('sites'));
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */

    public function create()
    {
        // Категории
        $categories = (new CategoryRepository())->getAll();

        // Пользователи
        $users      = (new UserRepository())->userAllOptions();

        return view('admin.sites.create', compact('categories' , 'users'));
    }

    /**
     * @param createSite $request
     * @return \Illuminate\Http\RedirectResponse
     */

    public function store(createSite $request)
    {
       Site::create($request->all());

       return redirect()->route('admin.sites.index');
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
     * @param Site $site
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */

    public function edit(Site $site)
    {
        // Категории
        $categories = (new CategoryRepository())->getAll();
        // Пользователи
        $users      = (new UserRepository())->userAllOptions();

        return view('admin.sites.edit', compact('site' , 'categories' , 'users'));
    }

    /**
     * @param updateSite $request
     * @param Site $site
     * @return \Illuminate\Http\RedirectResponse
     */

    public function update(updateSite $request, Site $site)
    {
        $site->update($request->all());

        return redirect()->route('admin.sites.index');
    }

    /**
     * @param Site $site
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */

    public function destroy(Site $site)
    {
        $site->delete();

        return redirect()->route('admin.sites.index');
    }
}
