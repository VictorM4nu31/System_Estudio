<?php

namespace App\Http\Controllers\Tutor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tutor\Student;

class StudentController extends Controller
{
    public function index() {
        return response()->json(Student::all());
    }
    public function store(Request $request) {
        $validated = $request->validate([
            'tutor_id' => 'required|integer',
            'name' => 'required|string',
            'email' => 'required|email',
            'relationship' => 'nullable|string',
        ]);
        $student = Student::create($validated);
        return response()->json(['message' => 'Hijo registrado', 'student' => $student]);
    }
    public function show($id) {
        return response()->json(Student::findOrFail($id));
    }
    public function update(Request $request, $id) {
        $student = Student::findOrFail($id);
        $validated = $request->validate([
            'name' => 'sometimes|required|string',
            'email' => 'sometimes|required|email',
            'relationship' => 'nullable|string',
        ]);
        $student->update($validated);
        return response()->json(['message' => 'Hijo actualizado', 'student' => $student]);
    }
    public function destroy($id) {
        $student = Student::findOrFail($id);
        $student->delete();
        return response()->json(['message' => 'Hijo eliminado']);
    }
}
