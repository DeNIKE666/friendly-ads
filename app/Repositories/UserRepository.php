<?php


namespace App\Repositories;

use App\Models\User;
use \Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class UserRepository
{
    /**
     * @return LengthAwarePaginator
     */

    public function getUsersAll()
    {
        return User::orderByDesc('created_at')->paginate(10);
    }

    /**
     * @param $id
     * @return User
     */

    public function getUserId($id) : User
    {
        return User::find($id);
    }

    /**
     * @return User
     */

    public function create() : User
    {
        return User::create([
            'name' => request()->input('name'),
            'username' => request()->input('username'),
            'email' => request()->input('email'),
            'telegram_id' => request()->input('telegram_id'),
            'password' => bcrypt(request()->input('password'))
        ]);
    }
}