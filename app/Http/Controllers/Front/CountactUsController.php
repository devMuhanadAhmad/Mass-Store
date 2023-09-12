<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Contactus;
use Illuminate\Http\Request;

class CountactUsController extends Controller
{
    public function index(){
        return view('front.contactUs');
    }
    public function store(Request $request){

        $request->validate([
            'email'=>'required|email',
            'phone'=>'string|required',
            'message'=>'required|string'
        ]);
        Contactus::create($request->all());

        return redirect()->back()->with('success', 'Message Send successfully');

    }


}
