<?php


namespace App\Repositories;

use App\Models\Site;

class SiteRepository
{
    public function getAll()
    {
        return Site::orderByDesc('created_at')
            ->paginate(10);
    }

    public function getCurrentUser()
    {
        return Site::where('user_id', auth()->user()->id)
            ->orderByDesc('created_at')
            ->paginate(10);
    }
}