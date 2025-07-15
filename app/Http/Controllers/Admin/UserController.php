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
        return response()->json($users);
    }
    public function create() {
        return response()->json(['message' => 'Formulario de creación de usuario (users.create)']);
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
        return response()->json(['message' => 'Usuario creado', 'user' => $user]);
    }
    public function edit($id) {
        $user = User::findOrFail($id);
        return response()->json($user);
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
        return response()->json(['message' => 'Usuario actualizado', 'user' => $user]);
    }
    public function destroy($id) {
        $user = User::findOrFail($id);
        $user->delete();
        return response()->json(['message' => 'Usuario eliminado']);
    }
    public function suspend($id) {
        $user = User::findOrFail($id);
        $user->update(['suspended' => true]); // Debes agregar el campo suspended a la tabla users si lo deseas
        return response()->json(['message' => 'Usuario suspendido']);
    }
}
