<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student\Notification;

class NotificationController extends Controller
{
    public function index() {
        return response()->json(Notification::all());
    }
    public function store(Request $request) {
        $validated = $request->validate([
            'student_id' => 'required|integer',
            'tutor_id' => 'required|integer',
            'type' => 'required|string',
            'content' => 'required|string',
            'sent_at' => 'nullable|date',
        ]);
        $notification = Notification::create($validated);
        return response()->json(['message' => 'Notificación enviada', 'notification' => $notification]);
    }
    public function show($id) {
        return response()->json(Notification::findOrFail($id));
    }
    public function update(Request $request, $id) {
        $notification = Notification::findOrFail($id);
        $validated = $request->validate([
            'type' => 'sometimes|required|string',
            'content' => 'sometimes|required|string',
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
