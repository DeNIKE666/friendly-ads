<?php


namespace App\Repositories;


use App\Models\User;

class UserRepository
{
    /**
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */

    public function getAll()
    {
        return User::orderByDesc('created_at')->paginate(25);
    }
}