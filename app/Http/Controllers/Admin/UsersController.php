<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\createUser;
use App\Mail\Admin\createUserNotify;
use App\Models\User;
use App\Repositories\UserRepository;
use App\Service\TelegramNotify;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class UsersController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View\
     */

    public function index()
    {

        $text = sprintf(config('messages.admin.createUser') , 'test' , '123');

        TelegramNotify::send(269952908, $text);

        $users = User::orderByDesc('created_at')->paginate(10);

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

        // Формируем отправляемый текст в конфиге

        $text = sprintf(config('messages.admin.createUser'),
            $request->input('username') ,
            $request->input('password') ,
        );

        // Создаем пользователя

        $user = User::create($request->merge(['password' => bcrypt($request->input('password'))])->all());

        // Отправляем данные на почту

        Mail::send(new createUserNotify(
                $request->input('email'),
                $text
            )
        );

        // Отправляем данные в телегу пользователю

        if ($user->telegram_id):
            TelegramNotify::send($request->input('telegram_id') ,$text);
        endif;

        return redirect()->route('users.index');
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
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
