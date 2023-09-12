<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Notifications\RestPasswordNotification;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Throwable;

class ForgetPasswordPhoneNumberController extends Controller
{
    public function index()
    {
        return view('auth.mobile.forgetPassword');

    }
    public function store(Request $request)
    {
        $request->validate([
            'mobile' => 'required|string|min:9',
        ]);

        //delete any star number +0
        $mobile = ltrim($request->post('mobile'),'+0');

        $user = User::where('phone', $mobile)->first();

        if (!$user) {
            throw ValidationException::withMessages([
                'mobile'=>'Mobile number not exisits'
            ]);
        }

        //$code = Str::random(8);
            $code = random_int(
                min: 000_000,
                max: 999_999,
            );


        DB::table('password_resets')->where('email',$mobile)->delete();
        DB::table('password_resets')->insert([
            'email' => $mobile,
            'token' => $code,
            'created_at' => Carbon::now(),
        ]);

       $user->notify(new RestPasswordNotification($code));

        return redirect()->route('mobile.reset.password.get');
    }

    public function showResetPasswordForm($code)
    {
        return view('mobile.reset.password.get', compact('code'));
    }

    public function submitResetPasswordForm(Request $request)
    {
        $request->validate([
            'code' => 'required|string|min:8|max:8',
        ]);

        //email this colum store code in table password_resets
        $code = DB::table('password_resets')
            ->where([
                'email' => $request->mobile,
                'token' => $request->code,
            ])
            ->first();

        if (!$code) {
            return back()->withInput()->with('error', 'Invalid code!');
        }

        $user = User::where('phone', $request->mobile)->first();

        if (!$user) {
            return back()->withInput()->with('error', 'Invalid mobile!');
        }

        $code = DB::table('password_resets')
            ->where([
                'email' => $request->mobile,
                'token' => $request->code,
            ])
            ->delete();

        return redirect()->route('mobile.resetPasswordForm');

    }

    public function resetPasswordForm(Request $request){
        $request->validate([
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',
        ]);
        $id='';

        $user=User::find($id);
        $user->forceFill([
            'password'=>Hash::make($request->post('password'))
        ]);

        return redirect()->route('login');
    }
}
