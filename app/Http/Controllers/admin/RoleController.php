<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\Permissions;

class RoleController extends Controller
{
    public function list()
    {
        $roles = Role::all();
        return view('admin.role.index', compact('roles'));
    }

    public function create()
    {
        $permissionsParent = Permissions::withDepth()->whereNull("parent_id")->defaultOrder()->get()->toFlatTree();
        return view('admin.role.add', compact('permissionsParent'));
    }

    public function store(Request $request)
    {
        $role = new Role();
        $role->type = $request->type;
        $role->name = $request->name;
        $role->save();
       
        $role->permissions()->attach($request->permission_id);
        return redirect('/admin/role/list');
    }

    public function edit($id)
    {
        $role = Role::findOrFail($id);
        $permissionsParent = Permissions::withDepth()->whereNull("parent_id")->defaultOrder()->get()->toFlatTree();
        $pemissionsChecked = $role->permissions;
        return view('admin.role.edit', compact('role', 'permissionsParent', 'pemissionsChecked'));
    }

    public function update(Request $request, $id)
    {
        $role = Role::findOrFail($id);
        $role->type = $request->type;
        $role->name = $request->name;
        $role->save();
        $role->permissions()->sync($request->permission_id);
        return redirect()->route('role.list');
    }
}
