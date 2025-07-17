<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student\AcademicData;

class AcademicDataController extends Controller
{
    public function index() {
        return response()->json(AcademicData::all());
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
        return response()->json(['message' => 'Datos académicos guardados', 'academic_data' => $data]);
    }
    public function show($id) {
        return response()->json(AcademicData::findOrFail($id));
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
        return response()->json(['message' => 'Datos académicos actualizados', 'academic_data' => $data]);
    }
    public function destroy($id) {
        $data = AcademicData::findOrFail($id);
        $data->delete();
        return response()->json(['message' => 'Datos académicos eliminados']);
    }
}
