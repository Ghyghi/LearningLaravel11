<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    
    public function index()
    {
        $permissions = Permission::get();
        return view('role-permissions.permisson.index', ['permissions'=>$permissions]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('role-permissions.permisson.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required',
            'unique:permissions,name',
            'string',]
        ]);
        Permission::create(['name' => $request->name]);
        return redirect('/permissions')->with('success', 'Permission created successfully');
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
    public function edit(Permission $permission)
    {
        return view('role-permissions.permisson.edit', ['permission'=>$permission]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Permission $permission)
    {
        $request->validate([
            'name' => ['required',
            'unique:permissions,name,'.$permission->id,
            'string']
        ]);
        $permission->update(['name' => $request->name]);
        return redirect('/permissions')->with('success', 'Permission updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($permission)
    {
        $permision = Permission::find($permission);
        $permision->delete();
        return redirect('/permissions')->with('success', 'Permission deleted successfully');
    }
}
