<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\categoryCreateAdmin;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */

    public function index()
    {
        $categories = app('rinvex.categories.category')->defaultOrder()->withDepth()->get();

        return view('admin.categories.index', compact('categories'));
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */

    public function create()
    {
        $categories = app('rinvex.categories.category')->defaultOrder()->withDepth()->get();

        return view('admin.categories.create', compact('categories'));
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */

    public function store(categoryCreateAdmin $request)
    {
        $request->validated();

        app('rinvex.categories.category')->create($request->all());

        return redirect()->route('categories.index');
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
     * @param Category $category
     */

    public function edit(Category $category)
    {
        $categories = app('rinvex.categories.category')->defaultOrder()->withDepth()->get();

        return view('admin.categories.edit', compact('category','categories'));
    }

    /**
     * @param Request $request
     * @param Category $category
     * @return \Illuminate\Http\RedirectResponse
     */

    public function update(Request $request, Category $category)
    {
        $category->update($request->all());

        return redirect()->route('categories.index');
    }


    /**
     * @param Category $category
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */

    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('categories.index');

    }


    /**
     * @param Category $category
     * @return \Illuminate\Http\RedirectResponse
     */

    public function first(Category $category)
    {
        if ($first = $category->siblings()->defaultOrder()->first()) {
            $category->insertBeforeNode($first);
        }

        return redirect()->route('categories.index');
    }

    /**
     * @param Category $category
     * @return \Illuminate\Http\RedirectResponse
     */

    public function last(Category $category)
    {
        if ($last = $category->siblings()->defaultOrder('desc')->first()) {
            $category->insertAfterNode($last);
        }

        return redirect()->route('categories.index');
    }

    /**
     * @param Category $category
     * @return \Illuminate\Http\RedirectResponse
     */

    public function up(Category $category)
    {
        $category->up();

        return redirect()->route('categories.index');
    }


    /**
     * @param Category $category
     * @return \Illuminate\Http\RedirectResponse
     */

    public function down(Category $category)
    {
        $category->down();

        return redirect()->route('categories.index');
    }

}
