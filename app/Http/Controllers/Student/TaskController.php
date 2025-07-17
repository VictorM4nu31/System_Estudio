<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student\Task;

class TaskController extends Controller
{
    public function index() {
        $tasks = Task::all();
        // Vista: student/tasks/index (listado de tareas)
        return view('student.tasks.index', compact('tasks'));
    }
    public function store(Request $request) {
        $validated = $request->validate([
            'title' => 'required|string',
            'description' => 'nullable|string',
            'mission_id' => 'required|integer',
            'student_id' => 'required|integer',
            'status' => 'required|string',
            'due_date' => 'nullable|date',
        ]);
        $task = Task::create($validated);
        // Vista: student/tasks/show (detalle de tarea creada)
        return view('student.tasks.show', compact('task'));
    }
    public function show($id) {
        $task = Task::findOrFail($id);
        // Vista: student/tasks/show (detalle de tarea)
        return view('student.tasks.show', compact('task'));
    }
    public function update(Request $request, $id) {
        $task = Task::findOrFail($id);
        $validated = $request->validate([
            'title' => 'sometimes|required|string',
            'description' => 'nullable|string',
            'status' => 'sometimes|required|string',
            'due_date' => 'nullable|date',
        ]);
        $task->update($validated);
        // Vista: student/tasks/show (detalle de tarea actualizada)
        return view('student.tasks.show', compact('task'));
    }
    public function destroy($id) {
        $task = Task::findOrFail($id);
        $task->delete();
        // Vista: student/tasks/index (listado tras eliminar)
        $tasks = Task::all();
        return view('student.tasks.index', compact('tasks'));
    }
}
