<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('role-permissions.user.index', ['users'=>$users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $role = Role::pluck('name', 'name')->all();
        return view('role-permissions.user.create', ['role' => $role]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $fields = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'email|required|unique:users,email',
            'password' => 'required|min:8|max:25',
            'roles' => 'required'
        ]);
        $fields['password'] = bcrypt($fields['password']);
        $user = User::create($fields);
        $user->syncRoles($request->roles);
        return redirect('/users')->with('success', 'Roles added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $role = Role::pluck('name', 'name')->all();
        return view('role-permissions.user.edit', ['user' => $user, 'role' => $role]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $fields = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'email|required',
            'roles' => 'required|array'
        ]);
        $user->update($fields);
        $user->roles()->sync($fields['roles']);
        return redirect('/users')->with('success', 'User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
