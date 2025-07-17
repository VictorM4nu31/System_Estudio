<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index() {
        $users = User::all();
        // Vista: admin/users/index (listado de usuarios)
        return view('admin.users.index', compact('users'));
    }
    public function create() {
        // Vista: admin/users/create (formulario de creación)
        return view('admin.users.create');
    }
    public function store(Request $request) {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
            'role' => 'required|string',
        ]);
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);
        $user->assignRole($validated['role']);
        // Vista: admin/users/show (detalle de usuario creado)
        return view('admin.users.show', compact('user'));
    }
    public function edit($id) {
        $user = User::findOrFail($id);
        // Vista: admin/users/edit (formulario de edición)
        return view('admin.users.edit', compact('user'));
    }
    public function update(Request $request, $id) {
        $user = User::findOrFail($id);
        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'email' => 'sometimes|required|email|unique:users,email,'.$id,
            'password' => 'nullable|string|min:6',
            'role' => 'sometimes|required|string',
        ]);
        if(isset($validated['name'])) $user->name = $validated['name'];
        if(isset($validated['email'])) $user->email = $validated['email'];
        if(isset($validated['password'])) $user->password = Hash::make($validated['password']);
        $user->save();
        if(isset($validated['role'])) {
            $user->syncRoles([$validated['role']]);
        }
        // Vista: admin/users/show (detalle de usuario actualizado)
        return view('admin.users.show', compact('user'));
    }
    public function destroy($id) {
        $user = User::findOrFail($id);
        $user->delete();
        // Vista: admin/users/index (listado tras eliminar)
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }
    public function suspend($id) {
        $user = User::findOrFail($id);
        $user->update(['suspended' => true]);
        // Vista: admin/users/show (detalle de usuario suspendido)
        return view('admin.users.show', compact('user'));
    }
}
