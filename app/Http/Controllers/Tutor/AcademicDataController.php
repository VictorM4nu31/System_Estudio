<?php

namespace App\Http\Controllers\Tutor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tutor\AcademicData;

class AcademicDataController extends Controller
{
    public function index() {
        $academicData = AcademicData::all();
        // Vista: tutor/academic_data/index (listado de datos académicos)
        return view('tutor.academic_data.index', compact('academicData'));
    }
    public function store(Request $request) {
        $validated = $request->validate([
            'student_id' => 'required|integer',
            'tutor_id' => 'required|integer',
            'school' => 'required|string',
            'enrollment' => 'required|string',
            'grade' => 'required|string',
        ]);
        $data = AcademicData::create($validated);
        // Vista: tutor/academic_data/show (detalle de datos académicos guardados)
        return view('tutor.academic_data.show', compact('data'));
    }
    public function show($id) {
        $data = AcademicData::findOrFail($id);
        // Vista: tutor/academic_data/show (detalle de datos académicos)
        return view('tutor.academic_data.show', compact('data'));
    }
    public function update(Request $request, $id) {
        $data = AcademicData::findOrFail($id);
        $validated = $request->validate([
            'school' => 'sometimes|required|string',
            'enrollment' => 'sometimes|required|string',
            'grade' => 'sometimes|required|string',
        ]);
        $data->update($validated);
        // Vista: tutor/academic_data/show (detalle de datos académicos actualizados)
        return view('tutor.academic_data.show', compact('data'));
    }
    public function destroy($id) {
        $data = AcademicData::findOrFail($id);
        $data->delete();
        // Vista: tutor/academic_data/index (listado tras eliminar)
        $academicData = AcademicData::all();
        return view('tutor.academic_data.index', compact('academicData'));
    }
}
