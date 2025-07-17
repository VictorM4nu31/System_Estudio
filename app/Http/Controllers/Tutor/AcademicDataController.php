<?php

namespace App\Http\Controllers\Tutor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tutor\AcademicData;

class AcademicDataController extends Controller
{
    public function index() {
        return response()->json(AcademicData::all());
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
        return response()->json(['message' => 'Datos académicos guardados', 'academic_data' => $data]);
    }
    public function show($id) {
        return response()->json(AcademicData::findOrFail($id));
    }
    public function update(Request $request, $id) {
        $data = AcademicData::findOrFail($id);
        $validated = $request->validate([
            'school' => 'sometimes|required|string',
            'enrollment' => 'sometimes|required|string',
            'grade' => 'sometimes|required|string',
        ]);
        $data->update($validated);
        return response()->json(['message' => 'Datos académicos actualizados', 'academic_data' => $data]);
    }
    public function destroy($id) {
        $data = AcademicData::findOrFail($id);
        $data->delete();
        return response()->json(['message' => 'Datos académicos eliminados']);
    }
}
