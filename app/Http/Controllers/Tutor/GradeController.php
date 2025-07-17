<?php

namespace App\Http\Controllers\Tutor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tutor\Grade;

class GradeController extends Controller
{
    public function index() {
        $grades = Grade::all();
        // Vista: tutor/grades/index (listado de calificaciones)
        return view('tutor.grades.index', compact('grades'));
    }
    public function store(Request $request) {
        $validated = $request->validate([
            'student_id' => 'required|integer',
            'tutor_id' => 'required|integer',
            'subject' => 'required|string',
            'grade' => 'required|string',
        ]);
        $grade = Grade::create($validated);
        // Vista: tutor/grades/show (detalle de calificación creada)
        return view('tutor.grades.show', compact('grade'));
    }
    public function show($id) {
        $grade = Grade::findOrFail($id);
        // Vista: tutor/grades/show (detalle de calificación)
        return view('tutor.grades.show', compact('grade'));
    }
    public function update(Request $request, $id) {
        $grade = Grade::findOrFail($id);
        $validated = $request->validate([
            'subject' => 'sometimes|required|string',
            'grade' => 'sometimes|required|string',
        ]);
        $grade->update($validated);
        // Vista: tutor/grades/show (detalle de calificación actualizada)
        return view('tutor.grades.show', compact('grade'));
    }
    public function destroy($id) {
        $grade = Grade::findOrFail($id);
        $grade->delete();
        // Vista: tutor/grades/index (listado tras eliminar)
        $grades = Grade::all();
        return view('tutor.grades.index', compact('grades'));
    }
}
