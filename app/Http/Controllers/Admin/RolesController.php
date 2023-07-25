<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;

class RolesController extends Controller
{
    public function index()
    {
        $data = Role::withCount('permissions')->where('name','!=','superadmin')->paginate(100);
        return view('admin.roles.list', compact('data'));
    }
    public function storePermission(Request $request)
    {
        $permissionName = $request->input('name');
        if (!Permission::where('name', $permissionName)->exists()) {
            $permission = [
                'name' => $permissionName,
                'display_name' => $request->input('name'),
                'description' => $request->input('name'),
            ];

           Permission::create($permission)->id;
        }

        return redirect()->back()->with('success', 'Permission successfully created.');
    }

    public function updatePermission(Request $request, $id)
    {
        $permission = Permission::findOrFail($id);

        $permission->name = $request->input('name') ?? $permission->name;
        $permission->display_name = $request->input('display_name') ?? $permission->display_name;
        $permission->description = $request->input('description') ?? $permission->description;

        $permission->save();

        return redirect()->back()->with('success', 'Permission successfully updated.');
    }
}
