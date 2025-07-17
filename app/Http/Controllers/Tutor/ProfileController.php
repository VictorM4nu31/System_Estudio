<?php

namespace App\Http\Controllers\Tutor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tutor\Profile;

class ProfileController extends Controller
{
    public function index() {
        return response()->json(Profile::all());
    }
    public function store(Request $request) {
        $validated = $request->validate([
            'student_id' => 'required|integer',
            'tutor_id' => 'required|integer',
            'data' => 'nullable|json',
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
            'data' => 'nullable|json',
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
