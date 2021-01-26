<?php

namespace App\Http\Controllers\Cabinet;

use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CabinetController extends Controller
{
    /**
     * @return false|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */

    public function index()
    {
        switch (Auth::user()->type_account) {
            case 2:
                return view('cabinets.customer.index');
            case 3:
                return view('cabinets.executor.index');
        }
        return false;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */

    public function performers()
    {
        $users = (new UserRepository())->getUsersAll();

        return view('cabinets.customer.performers', compact('users'));
    }
}
