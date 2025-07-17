<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student\AcademicData;

class AcademicDataController extends Controller
{
    public function index() {
        $academicData = AcademicData::all();
        // Vista: student/academic_data/index (listado de datos académicos)
        return view('student.academic_data.index', compact('academicData'));
    }
    public function store(Request $request) {
        $validated = $request->validate([
            'student_id' => 'required|integer',
            'school' => 'required|string',
            'grade' => 'required|string',
            'enrollment' => 'required|string',
            'updated_at' => 'nullable|date',
        ]);
        $data = AcademicData::create($validated);
        // Vista: student/academic_data/show (detalle de datos académicos guardados)
        return view('student.academic_data.show', compact('data'));
    }
    public function show($id) {
        $data = AcademicData::findOrFail($id);
        // Vista: student/academic_data/show (detalle de datos académicos)
        return view('student.academic_data.show', compact('data'));
    }
    public function update(Request $request, $id) {
        $data = AcademicData::findOrFail($id);
        $validated = $request->validate([
            'school' => 'sometimes|required|string',
            'grade' => 'sometimes|required|string',
            'enrollment' => 'sometimes|required|string',
            'updated_at' => 'nullable|date',
        ]);
        $data->update($validated);
        // Vista: student/academic_data/show (detalle de datos académicos actualizados)
        return view('student.academic_data.show', compact('data'));
    }
    public function destroy($id) {
        $data = AcademicData::findOrFail($id);
        $data->delete();
        // Vista: student/academic_data/index (listado tras eliminar)
        $academicData = AcademicData::all();
        return view('student.academic_data.index', compact('academicData'));
    }
}
