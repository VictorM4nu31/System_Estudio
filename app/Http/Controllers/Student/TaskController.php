<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student\Task;

class TaskController extends Controller
{
    public function index() {
        return response()->json(Task::all());
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
        return response()->json(['message' => 'Tarea creada', 'task' => $task]);
    }
    public function show($id) {
        return response()->json(Task::findOrFail($id));
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
        return response()->json(['message' => 'Tarea actualizada', 'task' => $task]);
    }
    public function destroy($id) {
        $task = Task::findOrFail($id);
        $task->delete();
        return response()->json(['message' => 'Tarea eliminada']);
    }
}
