<?php

namespace App\Http\Controllers\Cabinet;

use App\Http\Controllers\Controller;
use App\Http\Requests\Cabinets\Account\updateAccount;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */

    public function profile()
    {
        return view('cabinets.account.myAccount');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */

    public function switchAccount(Request $request)
    {
        auth()->user()->update($request->all());

        return response()->json([
            'success' => true,
            'type'    => 'account_change'
        ]);
    }

    /**
     * @param updateAccount $request
     * @return \Illuminate\Http\RedirectResponse
     */

    public function profileUpdate(updateAccount $request)
    {
        auth()->user()->update($request->all());

        return redirect()->route('profile');
    }
}
