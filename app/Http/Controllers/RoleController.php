<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    
    public function index()
    {
        $roles = Role::get();
        return view('role-permissions.role.index', ['roles'=>$roles]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('role-permissions.role.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required',
            'unique:roles,name',
            'string',]
        ]);
        Role::create(['name' => $request->name]);
        return redirect('/roles')->with('success', 'Role created successfully');
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
    public function edit(Role $role)
    {
        return view('role-permissions.role.edit', ['role'=>$role]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => ['required',
            'unique:roles,name,'.$role->id,
            'string']
        ]);
        $role->update(['name' => $request->name]);
        return redirect('/roles')->with('success', 'Role updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($role)
    {
        $roles = Role::findOrFail($role);
        $roles->delete();
        return redirect('/roles')->with('success', 'Role deleted successfully');
    }

    public function givePermission($id){
        $permission = Permission::all();
        $role = Role::findOrFail($id);
        $rolePermission = DB::table('role_has_permissions')
                                ->where('role_has_permissions.role_id',$role->id)
                                ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
                                ->all();
        return view('role-permissions.role.givePermission', [
            'role'=>$role,
            'permission'=>$permission,
            'rolePermission'=>$rolePermission]);
    }

    public function updatePermission(Request $request, $id){
        $request -> validate([
            'permission' => 'required'
        ]);
        $role = Role::findOrFail($id);
        $role->syncPermissions($request->permission);
        return redirect('/roles')->with('success', 'Permission added to role successfully');
    }
}
