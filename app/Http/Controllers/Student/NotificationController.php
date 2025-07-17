<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student\Notification;

class NotificationController extends Controller
{
    public function index() {
        $notifications = Notification::all();
        // Vista: student/notifications/index (listado de notificaciones)
        return view('student.notifications.index', compact('notifications'));
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
        // Vista: student/notifications/show (detalle de notificación creada)
        return view('student.notifications.show', compact('notification'));
    }
    public function show($id) {
        $notification = Notification::findOrFail($id);
        // Vista: student/notifications/show (detalle de notificación)
        return view('student.notifications.show', compact('notification'));
    }
    public function update(Request $request, $id) {
        $notification = Notification::findOrFail($id);
        $validated = $request->validate([
            'type' => 'sometimes|required|string',
            'content' => 'sometimes|required|string',
            'sent_at' => 'nullable|date',
        ]);
        $notification->update($validated);
        // Vista: student/notifications/show (detalle de notificación actualizada)
        return view('student.notifications.show', compact('notification'));
    }
    public function destroy($id) {
        $notification = Notification::findOrFail($id);
        $notification->delete();
        // Vista: student/notifications/index (listado tras eliminar)
        $notifications = Notification::all();
        return view('student.notifications.index', compact('notifications'));
    }
}
