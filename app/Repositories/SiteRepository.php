<?php


namespace App\Repositories;

use App\Models\Site;

class SiteRepository
{
    public function getAll()
    {
        return Site::with(['user', 'category'])->orderByDesc('created_at')
            ->paginate(100);
    }

    /**
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */

    public function getCurrentUser()
    {
        return Site::with(['category'])->where('user_id', auth()->user()->id)
            ->orderByDesc('created_at')
            ->paginate(10);
    }
}