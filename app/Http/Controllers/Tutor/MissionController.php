<?php

namespace App\Http\Controllers\Tutor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tutor\Mission;

class MissionController extends Controller
{
    public function index() {
        $missions = Mission::all();
        // Vista: tutor/missions/index (listado de misiones)
        return view('tutor.missions.index', compact('missions'));
    }
    public function store(Request $request) {
        $validated = $request->validate([
            'student_id' => 'required|integer',
            'tutor_id' => 'required|integer',
            'title' => 'required|string',
            'description' => 'nullable|string',
            'status' => 'required|string',
            'due_date' => 'nullable|date',
        ]);
        $mission = Mission::create($validated);
        // Vista: tutor/missions/show (detalle de misión creada)
        return view('tutor.missions.show', compact('mission'));
    }
    public function show($id) {
        $mission = Mission::findOrFail($id);
        // Vista: tutor/missions/show (detalle de misión)
        return view('tutor.missions.show', compact('mission'));
    }
    public function update(Request $request, $id) {
        $mission = Mission::findOrFail($id);
        $validated = $request->validate([
            'title' => 'sometimes|required|string',
            'description' => 'nullable|string',
            'status' => 'sometimes|required|string',
            'due_date' => 'nullable|date',
        ]);
        $mission->update($validated);
        // Vista: tutor/missions/show (detalle de misión actualizada)
        return view('tutor.missions.show', compact('mission'));
    }
    public function destroy($id) {
        $mission = Mission::findOrFail($id);
        $mission->delete();
        // Vista: tutor/missions/index (listado tras eliminar)
        $missions = Mission::all();
        return view('tutor.missions.index', compact('missions'));
    }
}
