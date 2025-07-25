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

    public function create() {
        // Vista: teacher/teams/create (formulario de creación)
        return view('teacher.teams.create');
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'team_type' => 'required|string|in:proyecto,investigacion,competencia,estudio,otro',
            'max_members' => 'required|integer|min:2|max:20',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'status' => 'required|string|in:activo,inactivo,completado,suspendido',
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

    public function edit($id) {
        $team = Team::findOrFail($id);
        // Vista: teacher/teams/edit (formulario de edición)
        return view('teacher.teams.edit', compact('team'));
    }

    public function update(Request $request, $id) {
        $team = Team::findOrFail($id);
        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'description' => 'nullable|string',
            'team_type' => 'sometimes|required|string|in:proyecto,investigacion,competencia,estudio,otro',
            'max_members' => 'sometimes|required|integer|min:2|max:20',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'status' => 'sometimes|required|string|in:activo,inactivo,completado,suspendido',
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
