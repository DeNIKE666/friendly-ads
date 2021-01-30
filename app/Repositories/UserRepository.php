<?php


namespace App\Repositories;

use App\Models\User;
use \Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class UserRepository
{

    /**
     * @return LengthAwarePaginator
     */

    public function getUsersAll()
    {
        return User::withCount('sites')->orderBy('sites_count' , 'desc')->paginate(50);
    }


    /**
     * @return Collection
     */

    public function userAllOptions()
    {
        return User::orderBy('created_at' , 'desc')
            ->get();
    }


    /**
     * @return mixed
     */

    public function getAllExecutors()
    {
        return User::ExecutorAccounts()
            ->with('sites')
            ->join('sites', 'users.id', '=', 'sites.user_id')
            ->select(DB::raw('users.*, sum(rating) as rating'))
            ->orderBy('rating', 'desc')
            ->groupBy('user_id')
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
            'type_account' => request()->input('type_account'),
            'balance'      => request()->input('balance'),
            'isBanned'     => request()->input('isBanned'),
            'timeBlocked'  => request()->input('timeBlocked'),
        ]);
    }
}