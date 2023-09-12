<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function loginForm()
    {
        return view('auth.login');
    }
    public function registerForm()
    {
        return view('auth.register');
    }

    public function login()
    {

        $data = $this->request->validate([
            'email' => ['required','exists:users,email'],
            'password' => ['required'],
        ]);

        $user = User::where('email', $data['email'])->orWhere('name', $data['email'])->first();
        if ($user) {
            if (Hash::check($data['password'], $user->password)) {
                Auth::login($user);
                    return redirect()->route('homeRegister');
            }
        }

        return redirect()->back()->with('message', 'error email or password');
    }

    public function register()
    {

        $data = $this->request->validate([
            'email' => ['required','email'],
            'password' => ['required','min:6','confirmed'],
            'name' => ['required','string','min:3','max:255'],
            'type_account'=>['required','in:salesman,trader,admin']
        ]);
        $user = User::where('email', $data['email'])->OrWhere('name',$data['name'])->first();
        if($user){
            return redirect()->back()->with('message', 'error email or password');
        }
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'type_account' => $data['type_account'],
            'password' => Hash::make($data['password']),
        ]);

        Auth::login($user);

        return redirect()->route('homeRegister');

    }



    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }



}
