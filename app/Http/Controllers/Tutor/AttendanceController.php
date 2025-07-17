<?php

namespace App\Http\Controllers\Tutor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tutor\Attendance;

class AttendanceController extends Controller
{
    public function index() {
        return response()->json(Attendance::all());
    }
    public function store(Request $request) {
        $validated = $request->validate([
            'student_id' => 'required|integer',
            'tutor_id' => 'required|integer',
            'date' => 'required|date',
            'present' => 'required|boolean',
        ]);
        $attendance = Attendance::create($validated);
        return response()->json(['message' => 'Asistencia registrada', 'attendance' => $attendance]);
    }
    public function show($id) {
        return response()->json(Attendance::findOrFail($id));
    }
    public function update(Request $request, $id) {
        $attendance = Attendance::findOrFail($id);
        $validated = $request->validate([
            'date' => 'sometimes|required|date',
            'present' => 'sometimes|required|boolean',
        ]);
        $attendance->update($validated);
        return response()->json(['message' => 'Asistencia actualizada', 'attendance' => $attendance]);
    }
    public function destroy($id) {
        $attendance = Attendance::findOrFail($id);
        $attendance->delete();
        return response()->json(['message' => 'Asistencia eliminada']);
    }
}
