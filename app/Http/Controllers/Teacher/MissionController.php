<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Teacher\Mission;
use App\Models\Teacher\Guild;

class MissionController extends Controller
{
    public function index() {
        $missions = Mission::all();
        // Vista: teacher/missions/index (listado de misiones)
        return view('teacher.missions.index', compact('missions'));
    }

    public function create() {
        $guilds = Guild::all();
        // Vista: teacher/missions/create (formulario de creación)
        return view('teacher.missions.create', compact('guilds'));
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
        // Vista: teacher/missions/show (detalle de misión creada)
        return view('teacher.missions.show', compact('mission'));
    }

    public function show($id) {
        $mission = Mission::findOrFail($id);
        // Vista: teacher/missions/show (detalle de misión)
        return view('teacher.missions.show', compact('mission'));
    }

    public function edit($id) {
        $mission = Mission::findOrFail($id);
        $guilds = Guild::all();
        // Vista: teacher/missions/edit (formulario de edición)
        return view('teacher.missions.edit', compact('mission', 'guilds'));
    }

    public function update(Request $request, $id) {
        $mission = Mission::findOrFail($id);
        $validated = $request->validate([
            'title' => 'sometimes|required|string',
            'description' => 'nullable|string',
            'due_date' => 'nullable|date',
        ]);
        $mission->update($validated);
        // Vista: teacher/missions/show (detalle de misión actualizada)
        return view('teacher.missions.show', compact('mission'));
    }

    public function destroy($id) {
        $mission = Mission::findOrFail($id);
        $mission->delete();
        // Vista: teacher/missions/index (listado tras eliminar)
        $missions = Mission::all();
        return view('teacher.missions.index', compact('missions'));
    }
}
