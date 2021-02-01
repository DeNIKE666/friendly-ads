<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Http\Requests\Admin\Users\createUser;
use App\Http\Requests\Admin\Users\updateUser;

use App\Models\User;
use App\Repositories\UserRepository;

class UsersController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View\
     */

    public function index()
    {
        $users = (new UserRepository())->getUsersAll();

        return view('admin.users.index', compact('users'));
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */

    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * @param createUser $request
     * @return \Illuminate\Http\RedirectResponse
     */

    public function store(createUser $request)
    {
        $request->validated();

        // Создание пользователя

        $user = (new UserRepository())->create();

        $user->notify(
            (new \App\Notifications\Admin\createUser(
                $user,
                $request->input('password')
            ))
        );

        return redirect()->route('admin.users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * @param User $user
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */

    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    /**
     * @param updateUser $request
     * @param User $user
     */

    public function update(updateUser $request, User $user)
    {
        $user->update($request->all());

        return redirect()->route('admin.users.index');
    }

    public function sites(User $user)
    {
        return view('admin.users.sites', [
            'sites' => $user->sites
        ]);
    }

    /**
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('admin.users.index');
    }
}
