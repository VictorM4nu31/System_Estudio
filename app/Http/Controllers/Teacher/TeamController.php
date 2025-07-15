<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Teacher\Team;

class TeamController extends Controller
{
    public function index() {
        return response()->json(Team::all());
    }
    public function store(Request $request) {
        $validated = $request->validate([
            'name' => 'required|string',
            'guild_id' => 'required|integer',
            'teacher_id' => 'required|integer',
            'description' => 'nullable|string',
        ]);
        $team = Team::create($validated);
        return response()->json(['message' => 'Equipo creado', 'team' => $team]);
    }
    public function show($id) {
        return response()->json(Team::findOrFail($id));
    }
    public function update(Request $request, $id) {
        $team = Team::findOrFail($id);
        $validated = $request->validate([
            'name' => 'sometimes|required|string',
            'description' => 'nullable|string',
        ]);
        $team->update($validated);
        return response()->json(['message' => 'Equipo actualizado', 'team' => $team]);
    }
    public function destroy($id) {
        $team = Team::findOrFail($id);
        $team->delete();
        return response()->json(['message' => 'Equipo eliminado']);
    }
}
