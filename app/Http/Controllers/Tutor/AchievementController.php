<?php

namespace App\Http\Controllers\Tutor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tutor\Achievement;

class AchievementController extends Controller
{
    public function index() {
        return response()->json(Achievement::all());
    }
    public function store(Request $request) {
        $validated = $request->validate([
            'student_id' => 'required|integer',
            'tutor_id' => 'required|integer',
            'name' => 'required|string',
            'description' => 'nullable|string',
            'unlocked' => 'required|boolean',
        ]);
        $achievement = Achievement::create($validated);
        return response()->json(['message' => 'Logro creado', 'achievement' => $achievement]);
    }
    public function show($id) {
        return response()->json(Achievement::findOrFail($id));
    }
    public function update(Request $request, $id) {
        $achievement = Achievement::findOrFail($id);
        $validated = $request->validate([
            'name' => 'sometimes|required|string',
            'description' => 'nullable|string',
            'unlocked' => 'sometimes|required|boolean',
        ]);
        $achievement->update($validated);
        return response()->json(['message' => 'Logro actualizado', 'achievement' => $achievement]);
    }
    public function destroy($id) {
        $achievement = Achievement::findOrFail($id);
        $achievement->delete();
        return response()->json(['message' => 'Logro eliminado']);
    }
}
