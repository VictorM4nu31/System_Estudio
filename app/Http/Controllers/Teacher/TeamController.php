<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Teacher\Team;

class TeamController extends Controller
{
    public function index() {
        $teams = Team::all();
        // Vista: teacher/teams/index (listado de equipos)
        return view('teacher.teams.index', compact('teams'));
    }
    public function store(Request $request) {
        $validated = $request->validate([
            'name' => 'required|string',
            'guild_id' => 'required|integer',
            'teacher_id' => 'required|integer',
            'description' => 'nullable|string',
        ]);
        $team = Team::create($validated);
        // Vista: teacher/teams/show (detalle de equipo creado)
        return view('teacher.teams.show', compact('team'));
    }
    public function show($id) {
        $team = Team::findOrFail($id);
        // Vista: teacher/teams/show (detalle de equipo)
        return view('teacher.teams.show', compact('team'));
    }
    public function update(Request $request, $id) {
        $team = Team::findOrFail($id);
        $validated = $request->validate([
            'name' => 'sometimes|required|string',
            'description' => 'nullable|string',
        ]);
        $team->update($validated);
        // Vista: teacher/teams/show (detalle de equipo actualizado)
        return view('teacher.teams.show', compact('team'));
    }
    public function destroy($id) {
        $team = Team::findOrFail($id);
        $team->delete();
        // Vista: teacher/teams/index (listado tras eliminar)
        $teams = Team::all();
        return view('teacher.teams.index', compact('teams'));
    }
}
