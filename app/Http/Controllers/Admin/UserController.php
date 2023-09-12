<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequist;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Yoeunes\Toastr\Facades\Toastr;

class UserController extends Controller
{
    //use toastr;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Gate::authorize('user.view');
        $request = Request();
        $users = User::latest()->simplePaginate(15);
        return view('admin.user.index', compact('users'));
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('user.create');
        $user = new User();
        return view('admin.user.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequist $request)
    {
        Gate::authorize('user.create');

        User::create([
            'name' => $request->post('name'),
            'email' => $request->post('email'),
            'password' => Hash::make($request->post('password')),
            'type_account'=>$request->post('type_account'),
            'status'=>$request->post('status'),
        ]);

        return redirect()->route('user.index')->with('success', __("Operation accomplished successfully"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        Gate::authorize('user.update');
        return view('admin.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        Gate::authorize('user.update');

        $request->validate([
            'email' => 'required|email|unique:users,email,'.$id,
        ]);
        $user=User::findOrFail($id);
        $user->update([
            'name' => $request->post('name'),
            'email' => $request->post('email'),
            'password' => Hash::make($request->post('password')),
            'type_account'=>$request->post('type_account'),
            'status'=>$request->post('status'),
        ]);

        return redirect()->route('user.index')->with('success', __("Operation accomplished successfully"));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        Gate::authorize('user.delete');
        $user->delete();
        return redirect()->route('user.index')->with('success', __("Operation accomplished successfully"));

    }
}
