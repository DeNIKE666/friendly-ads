<?php

namespace App\Http\Controllers\Cabinet;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CabinetController extends Controller
{
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
}
