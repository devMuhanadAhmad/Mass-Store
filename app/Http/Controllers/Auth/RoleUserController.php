<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\RoleUser;
use App\Models\User;
use Illuminate\Http\Request;

class RoleUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roleuser = RoleUser::with(['user','role'])->get();
        return view('admin.roleuser.index', compact('roleuser'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all();
        $users = User::all();
        $roleuser = new RoleUser();
        return view('admin.roleuser.create', compact('roleuser', 'roles', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id'=>'required|exists:users,id',
            'role_id'=>'required|exists:roles,id'
        ]);
        $user = User::find($request->post('user_id'));
        $user->roleuser()->sync($request->post('role_id'));
        return redirect()->route('roleuser.index')->with('success', 'operation accomplished successfully');

    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $role = Role::all();
        $user = User::all();
        $roleuser = RoleUser::findOrFail($id);
        return view('admin.roleuser.edit', compact('roleuser'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user=User::find($id);
        $user->roleuser()->sync([]);
        return redirect()->route('role.index')->with('success', __("success deleted"));
    }
}
