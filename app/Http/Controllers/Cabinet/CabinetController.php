<?php

namespace App\Http\Controllers\Cabinet;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CabinetController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */

    public function index()
    {
        return view('cabinets.index');
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */

    public function performers()
    {
        $users = (new UserRepository())->getAllExecutors();

        return view('cabinets.customer.performers', compact('users'));
    }

    // поручник ржевский

    public function changeAccount(Request $request)
    {
        auth()->user()->update($request->all());

        return response()->json([
            'success' => true,
            'type'    => 'account_change'
        ]);
    }

    public function showProfile(User $user)
    {
        return view('cabinets.account.profile', compact('user'));
    }
}
