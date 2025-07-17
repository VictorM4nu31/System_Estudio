<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student\Activity;

class ActivityController extends Controller
{
    public function index() {
        $activities = Activity::all();
        // Vista: student/activities/index (listado de actividades)
        return view('student.activities.index', compact('activities'));
    }
    public function store(Request $request) {
        $validated = $request->validate([
            'name' => 'required|string',
            'description' => 'nullable|string',
            'guild_id' => 'required|integer',
            'student_id' => 'required|integer',
            'participated' => 'required|boolean',
            'date' => 'nullable|date',
        ]);
        $activity = Activity::create($validated);
        // Vista: student/activities/show (detalle de actividad creada)
        return view('student.activities.show', compact('activity'));
    }
    public function show($id) {
        $activity = Activity::findOrFail($id);
        // Vista: student/activities/show (detalle de actividad)
        return view('student.activities.show', compact('activity'));
    }
    public function update(Request $request, $id) {
        $activity = Activity::findOrFail($id);
        $validated = $request->validate([
            'name' => 'sometimes|required|string',
            'description' => 'nullable|string',
            'participated' => 'sometimes|required|boolean',
            'date' => 'nullable|date',
        ]);
        $activity->update($validated);
        // Vista: student/activities/show (detalle de actividad actualizada)
        return view('student.activities.show', compact('activity'));
    }
    public function destroy($id) {
        $activity = Activity::findOrFail($id);
        $activity->delete();
        // Vista: student/activities/index (listado tras eliminar)
        $activities = Activity::all();
        return view('student.activities.index', compact('activities'));
    }
}
