<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        if($user)
        {
            if($user->type_account == 'salesman')
            {
                return redirect()->route('home');
            }

            if($user->type_account == 'trader')
            {
                return redirect()->route('dashboard');
            }

            if($user->type_account == 'admin')
            {
                return redirect()->route('dashboard');
            }
        }

        return redirect()->route('home');

    }
}
