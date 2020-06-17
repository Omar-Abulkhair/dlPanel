<?php

namespace Dl\Panel\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use DB;

class RoleController extends DlController
{
    public function index()
    {
        $roles = Role::paginate(2);
        return view('Panel::dashboard.pages.roles.index')->withRoles($roles);
    }

    public function create()
    {
        $permissions = Permission::get();
        return view('Panel::dashboard.pages.roles.add', compact('permissions'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        $role=Role::create(['name'=>$request->input('name')]);
        $role->syncPermissions($request->input('permissions'));
        return redirect()->route('dashboard.roles.index')
            ->with('success', 'Role updated successfully');
    }

    public function edit($id)
    {
        $role = Role::find($id);
        $permissions = Permission::get();
        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id", $id)
            ->pluck('role_has_permissions.permission_id', 'role_has_permissions.permission_id')
            ->all();


        return view('Panel::dashboard.pages.roles.edit', compact('role', 'permissions', 'rolePermissions'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'permissions' => 'required|array',
        ]);

        $role = Role::find($id);
        $role->name = $request->input('name');
        $role->save();


        $role->syncPermissions($request->input('permissions'));


        return redirect()->route('dashboard.roles.index')
            ->with('success', 'Role updated successfully');
    }

    public function destroy($id)
    {
        DB::table("roles")->where('id', $id)->delete();
        return redirect()->route('dashboard.roles.index')
            ->with('success', 'Role deleted successfully');
    }
}
