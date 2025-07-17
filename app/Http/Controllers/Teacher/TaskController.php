<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Teacher\Task;

class TaskController extends Controller
{
    public function index() {
        $tasks = Task::all();
        // Vista: teacher/tasks/index (listado de tareas)
        return view('teacher.tasks.index', compact('tasks'));
    }
    public function store(Request $request) {
        $validated = $request->validate([
            'title' => 'required|string',
            'description' => 'nullable|string',
            'mission_id' => 'required|integer',
            'teacher_id' => 'required|integer',
            'due_date' => 'nullable|date',
        ]);
        $task = Task::create($validated);
        // Vista: teacher/tasks/show (detalle de tarea creada)
        return view('teacher.tasks.show', compact('task'));
    }
    public function show($id) {
        $task = Task::findOrFail($id);
        // Vista: teacher/tasks/show (detalle de tarea)
        return view('teacher.tasks.show', compact('task'));
    }
    public function update(Request $request, $id) {
        $task = Task::findOrFail($id);
        $validated = $request->validate([
            'title' => 'sometimes|required|string',
            'description' => 'nullable|string',
            'due_date' => 'nullable|date',
        ]);
        $task->update($validated);
        // Vista: teacher/tasks/show (detalle de tarea actualizada)
        return view('teacher.tasks.show', compact('task'));
    }
    public function destroy($id) {
        $task = Task::findOrFail($id);
        $task->delete();
        // Vista: teacher/tasks/index (listado tras eliminar)
        $tasks = Task::all();
        return view('teacher.tasks.index', compact('tasks'));
    }
}
