<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Chat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function index(){
        $user=Auth::user()->id;
        $chats=Chat::where('recipient_user_id',$user)->latest()->get();
        return view('admin.chat.index',compact('chats'));
    }

    public function store(Request $request){


       $request->validate([
        'recipient_user_id' => ['required', 'int', 'exists:users,id'],
        'message' => ['required', 'string'],
    ]);

       $chat=Chat::create([
        'send_user_id'=>Auth::id(),
        'recipient_user_id'=>$request->post('recipient_user_id'),
        'message'=>$request->post('message'),
       ]);

       return redirect()->back()
        ->with('success', "The message has been sent successfully !");

    }


    public function destroy($id)
    {
        $chat=Chat::findOrFail($id);

        $chat->delete();
        return redirect()->back()
        ->with('success', 'Product deleted to cart!');
    }


}
