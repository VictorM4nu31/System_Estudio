<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Teacher\Mission;

class MissionController extends Controller
{
    public function index() {
        return response()->json(Mission::all());
    }
    public function store(Request $request) {
        $validated = $request->validate([
            'title' => 'required|string',
            'description' => 'nullable|string',
            'guild_id' => 'required|integer',
            'teacher_id' => 'required|integer',
            'due_date' => 'nullable|date',
        ]);
        $mission = Mission::create($validated);
        return response()->json(['message' => 'Misión creada', 'mission' => $mission]);
    }
    public function show($id) {
        return response()->json(Mission::findOrFail($id));
    }
    public function update(Request $request, $id) {
        $mission = Mission::findOrFail($id);
        $validated = $request->validate([
            'title' => 'sometimes|required|string',
            'description' => 'nullable|string',
            'due_date' => 'nullable|date',
        ]);
        $mission->update($validated);
        return response()->json(['message' => 'Misión actualizada', 'mission' => $mission]);
    }
    public function destroy($id) {
        $mission = Mission::findOrFail($id);
        $mission->delete();
        return response()->json(['message' => 'Misión eliminada']);
    }
}
