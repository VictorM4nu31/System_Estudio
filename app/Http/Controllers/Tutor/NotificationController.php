<?php

namespace App\Http\Controllers\Tutor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tutor\Notification;

class NotificationController extends Controller
{
    public function index() {
        return response()->json(Notification::all());
    }
    public function store(Request $request) {
        $validated = $request->validate([
            'tutor_id' => 'required|integer',
            'student_id' => 'required|integer',
            'type' => 'required|string',
            'content' => 'required|string',
            'read' => 'required|boolean',
            'configured' => 'required|boolean',
            'sent_at' => 'nullable|date',
        ]);
        $notification = Notification::create($validated);
        return response()->json(['message' => 'Notificación creada', 'notification' => $notification]);
    }
    public function show($id) {
        return response()->json(Notification::findOrFail($id));
    }
    public function update(Request $request, $id) {
        $notification = Notification::findOrFail($id);
        $validated = $request->validate([
            'type' => 'sometimes|required|string',
            'content' => 'sometimes|required|string',
            'read' => 'sometimes|required|boolean',
            'configured' => 'sometimes|required|boolean',
            'sent_at' => 'nullable|date',
        ]);
        $notification->update($validated);
        return response()->json(['message' => 'Notificación actualizada', 'notification' => $notification]);
    }
    public function destroy($id) {
        $notification = Notification::findOrFail($id);
        $notification->delete();
        return response()->json(['message' => 'Notificación eliminada']);
    }
}
