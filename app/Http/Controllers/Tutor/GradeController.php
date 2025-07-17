<?php

namespace App\Http\Controllers\Tutor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tutor\Grade;

class GradeController extends Controller
{
    public function index() {
        return response()->json(Grade::all());
    }
    public function store(Request $request) {
        $validated = $request->validate([
            'student_id' => 'required|integer',
            'tutor_id' => 'required|integer',
            'subject' => 'required|string',
            'grade' => 'required|string',
        ]);
        $grade = Grade::create($validated);
        return response()->json(['message' => 'Calificación creada', 'grade' => $grade]);
    }
    public function show($id) {
        return response()->json(Grade::findOrFail($id));
    }
    public function update(Request $request, $id) {
        $grade = Grade::findOrFail($id);
        $validated = $request->validate([
            'subject' => 'sometimes|required|string',
            'grade' => 'sometimes|required|string',
        ]);
        $grade->update($validated);
        return response()->json(['message' => 'Calificación actualizada', 'grade' => $grade]);
    }
    public function destroy($id) {
        $grade = Grade::findOrFail($id);
        $grade->delete();
        return response()->json(['message' => 'Calificación eliminada']);
    }
}
