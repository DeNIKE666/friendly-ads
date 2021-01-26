<?php


namespace App\Repositories;

use App\Models\User;
use \Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class UserRepository
{

    public function getUsersAll()
    {
        return User::where('type_account' , 3)->withCount('sites')
            ->orderByDesc('sites_count')
            ->having('sites_count', '>=', 0)
            ->paginate(100);
    }

    /**
     * @return User|\Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Query\Builder
     */

    public function getAccount()
    {
        return User::where('type_account', 2)
            ->orderByDesc('created_at');
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
            'name'         => request()->input('name'),
            'username'     => request()->input('username'),
            'email'        => request()->input('email'),
            'telegram_id'  => request()->input('telegram_id'),
            'password'     => bcrypt(request()->input('password')),
            'type_account' => request()->input('type_account')
        ]);
    }
}