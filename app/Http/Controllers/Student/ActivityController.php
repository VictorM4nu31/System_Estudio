<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student\Activity;

class ActivityController extends Controller
{
    public function index() {
        return response()->json(Activity::all());
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
        return response()->json(['message' => 'Actividad creada', 'activity' => $activity]);
    }
    public function show($id) {
        return response()->json(Activity::findOrFail($id));
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
        return response()->json(['message' => 'Actividad actualizada', 'activity' => $activity]);
    }
    public function destroy($id) {
        $activity = Activity::findOrFail($id);
        $activity->delete();
        return response()->json(['message' => 'Actividad eliminada']);
    }
}
