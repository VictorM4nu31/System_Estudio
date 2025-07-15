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
        return response()->json(['message' => 'Rol asignado', 'user' => $user]);
    }
    public function permissions($id) {
        $user = User::find($id);
        if($user) {
            return response()->json(['permissions' => $user->getAllPermissions()->pluck('name')]);
        }
        $role = Role::findOrFail($id);
        return response()->json(['permissions' => $role->permissions->pluck('name')]);
    }
}
