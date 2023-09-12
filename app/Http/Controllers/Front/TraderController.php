<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Chat;
use App\Models\Order;
use App\Models\User;
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
        return view('front.showTrader', [
            'chats'=>Chat::where('recipient_user_id',$id)->where('send_user_id',Auth::id())->with('user')->get(),
            'user' => User::with('profile')->where('status', 'active')->findOrFail($id),
        ]);
    }

    public function order(){

        $store_id=Auth::user()->store_id;
        return view('admin.order.index', [
            'orders'=>Order::where('store_id',$store_id)->latest()->paginate(15),
        ]);
    }
}
