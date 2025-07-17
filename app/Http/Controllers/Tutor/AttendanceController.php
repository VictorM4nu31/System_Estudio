<?php

namespace App\Http\Controllers\Tutor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tutor\Attendance;

class AttendanceController extends Controller
{
    public function index() {
        $attendances = Attendance::all();
        // Vista: tutor/attendance/index (listado de asistencias)
        return view('tutor.attendance.index', compact('attendances'));
    }
    public function store(Request $request) {
        $validated = $request->validate([
            'student_id' => 'required|integer',
            'tutor_id' => 'required|integer',
            'date' => 'required|date',
            'present' => 'required|boolean',
        ]);
        $attendance = Attendance::create($validated);
        // Vista: tutor/attendance/show (detalle de asistencia registrada)
        return view('tutor.attendance.show', compact('attendance'));
    }
    public function show($id) {
        $attendance = Attendance::findOrFail($id);
        // Vista: tutor/attendance/show (detalle de asistencia)
        return view('tutor.attendance.show', compact('attendance'));
    }
    public function update(Request $request, $id) {
        $attendance = Attendance::findOrFail($id);
        $validated = $request->validate([
            'date' => 'sometimes|required|date',
            'present' => 'sometimes|required|boolean',
        ]);
        $attendance->update($validated);
        // Vista: tutor/attendance/show (detalle de asistencia actualizada)
        return view('tutor.attendance.show', compact('attendance'));
    }
    public function destroy($id) {
        $attendance = Attendance::findOrFail($id);
        $attendance->delete();
        // Vista: tutor/attendance/index (listado tras eliminar)
        $attendances = Attendance::all();
        return view('tutor.attendance.index', compact('attendances'));
    }
}
