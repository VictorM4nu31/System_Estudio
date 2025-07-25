<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function assign(Request $request) {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'role' => 'required|string|exists:roles,name',
        ]);
        $user = User::findOrFail($validated['user_id']);
        $user->syncRoles([$validated['role']]);
        // Vista: admin/roles/assign (resultado de asignación de rol)
        return view('admin.roles.assign', compact('user'));
    }
    public function permissions($id) {
        $user = User::find($id);
        if($user) {
            // Vista: admin/roles/permissions (permisos de usuario)
            $permissions = $user->getAllPermissions()->pluck('name');
            return view('admin.roles.permissions', compact('permissions', 'user'));
        }
        $role = Role::findOrFail($id);
        // Vista: admin/roles/permissions (permisos de rol)
        $permissions = $role->permissions->pluck('name');
        return view('admin.roles.permissions', compact('permissions', 'role'));
    }

    public function index()
    {
        $roles = \Spatie\Permission\Models\Role::with('permissions')->get();
        $permissions = \Spatie\Permission\Models\Permission::all();
        return view('admin.roles.index', compact('roles', 'permissions'));
    }
}
