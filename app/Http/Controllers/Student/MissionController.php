<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student\Mission;

class MissionController extends Controller
{
    public function index() {
        $missions = Mission::all();
        // Vista: student/missions/index (listado de misiones)
        return view('student.missions.index', compact('missions'));
    }
    public function store(Request $request) {
        $validated = $request->validate([
            'title' => 'required|string',
            'description' => 'nullable|string',
            'guild_id' => 'required|integer',
            'student_id' => 'required|integer',
            'status' => 'required|string',
            'due_date' => 'nullable|date',
        ]);
        $mission = Mission::create($validated);
        // Vista: student/missions/show (detalle de misión creada)
        return view('student.missions.show', compact('mission'));
    }
    public function show($id) {
        $mission = Mission::findOrFail($id);
        // Vista: student/missions/show (detalle de misión)
        return view('student.missions.show', compact('mission'));
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
        // Vista: student/missions/show (detalle de misión actualizada)
        return view('student.missions.show', compact('mission'));
    }
    public function destroy($id) {
        $mission = Mission::findOrFail($id);
        $mission->delete();
        // Vista: student/missions/index (listado tras eliminar)
        $missions = Mission::all();
        return view('student.missions.index', compact('missions'));
    }
}
