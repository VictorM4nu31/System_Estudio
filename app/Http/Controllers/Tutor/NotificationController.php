<?php

namespace App\Http\Controllers\Tutor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tutor\Notification;

class NotificationController extends Controller
{
    public function index() {
        $notifications = Notification::all();
        // Vista: tutor/notifications/index (listado de notificaciones)
        return view('tutor.notifications.index', compact('notifications'));
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
        // Vista: tutor/notifications/show (detalle de notificación creada)
        return view('tutor.notifications.show', compact('notification'));
    }
    public function show($id) {
        $notification = Notification::findOrFail($id);
        // Vista: tutor/notifications/show (detalle de notificación)
        return view('tutor.notifications.show', compact('notification'));
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
        // Vista: tutor/notifications/show (detalle de notificación actualizada)
        return view('tutor.notifications.show', compact('notification'));
    }
    public function destroy($id) {
        $notification = Notification::findOrFail($id);
        $notification->delete();
        // Vista: tutor/notifications/index (listado tras eliminar)
        $notifications = Notification::all();
        return view('tutor.notifications.index', compact('notifications'));
    }
}
