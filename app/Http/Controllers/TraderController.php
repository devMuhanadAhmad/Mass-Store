<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\User;
use Flasher\Laravel\Http\Request;
use Illuminate\Support\Facades\Auth;

class TraderController extends Controller
{
    public function index()
    {
        $request=Request();
        $filter=$request->query('name');
        return view('front.AllTraders', [
            'users' => User::where('type_account', 'trader')->where('status', 'active')->where('name', 'LIKE', "%{$filter}%")->latest()->paginate(8),
        ]);
    }

    public function show($id)
    {
        $user=Auth::user();
        return view('front.showTrader', [
            'chats'=>Chat::with('user')->where('send_user_id',$user->id)->get(),
            'user' => User::with('profile')->where('status', 'active')->findOrFail($id),
        ]);
    }
}
