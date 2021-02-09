<?php

namespace App\Http\Controllers\Cabinet;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function profile()
    {
        return view('cabinets.account.myAccount');
    }

    public function switchAccount(Request $request)
    {
        auth()->user()->update($request->all());

        return response()->json([
            'success' => true,
            'type'    => 'account_change'
        ]);
    }

    public function changeAccount(Request $request)
    {

    }
}
