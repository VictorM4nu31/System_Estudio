<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student\Profile;

class ProfileController extends Controller
{
    public function index() {
        return response()->json(Profile::all());
    }
    public function store(Request $request) {
        $validated = $request->validate([
            'student_id' => 'required|integer',
            'avatar' => 'nullable|string',
            'level' => 'required|integer',
            'experience' => 'required|integer',
            'title' => 'nullable|string',
            'customization' => 'nullable|json',
        ]);
        $profile = Profile::create($validated);
        return response()->json(['message' => 'Perfil creado', 'profile' => $profile]);
    }
    public function show($id) {
        return response()->json(Profile::findOrFail($id));
    }
    public function update(Request $request, $id) {
        $profile = Profile::findOrFail($id);
        $validated = $request->validate([
            'avatar' => 'nullable|string',
            'level' => 'sometimes|required|integer',
            'experience' => 'sometimes|required|integer',
            'title' => 'nullable|string',
            'customization' => 'nullable|json',
        ]);
        $profile->update($validated);
        return response()->json(['message' => 'Perfil actualizado', 'profile' => $profile]);
    }
    public function destroy($id) {
        $profile = Profile::findOrFail($id);
        $profile->delete();
        return response()->json(['message' => 'Perfil eliminado']);
    }
}
