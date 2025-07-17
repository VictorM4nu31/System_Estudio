<?php

namespace App\Http\Controllers\Tutor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tutor\Student;

class StudentController extends Controller
{
    public function index() {
        $students = Student::all();
        // Vista: tutor/students/index (listado de hijos/estudiantes)
        return view('tutor.students.index', compact('students'));
    }
    public function store(Request $request) {
        $validated = $request->validate([
            'tutor_id' => 'required|integer',
            'name' => 'required|string',
            'email' => 'required|email',
            'relationship' => 'nullable|string',
        ]);
        $student = Student::create($validated);
        // Vista: tutor/students/show (detalle de hijo registrado)
        return view('tutor.students.show', compact('student'));
    }
    public function show($id) {
        $student = Student::findOrFail($id);
        // Vista: tutor/students/show (detalle de hijo)
        return view('tutor.students.show', compact('student'));
    }
    public function update(Request $request, $id) {
        $student = Student::findOrFail($id);
        $validated = $request->validate([
            'name' => 'sometimes|required|string',
            'email' => 'sometimes|required|email',
            'relationship' => 'nullable|string',
        ]);
        $student->update($validated);
        // Vista: tutor/students/show (detalle de hijo actualizado)
        return view('tutor.students.show', compact('student'));
    }
    public function destroy($id) {
        $student = Student::findOrFail($id);
        $student->delete();
        // Vista: tutor/students/index (listado tras eliminar)
        $students = Student::all();
        return view('tutor.students.index', compact('students'));
    }
}
