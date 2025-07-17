<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Teacher\Message;

class MessageController extends Controller
{
    public function index() {
        $messages = Message::all();
        // Vista: teacher/messages/index (listado de mensajes)
        return view('teacher.messages.index', compact('messages'));
    }
    public function store(Request $request) {
        $validated = $request->validate([
            'content' => 'required|string',
            'guild_id' => 'required|integer',
            'teacher_id' => 'required|integer',
            'recipient_id' => 'required|integer',
        ]);
        $message = Message::create($validated);
        // Vista: teacher/messages/show (detalle de mensaje creado)
        return view('teacher.messages.show', compact('message'));
    }
    public function show($id) {
        $message = Message::findOrFail($id);
        // Vista: teacher/messages/show (detalle de mensaje)
        return view('teacher.messages.show', compact('message'));
    }
    public function update(Request $request, $id) {
        $message = Message::findOrFail($id);
        $validated = $request->validate([
            'content' => 'sometimes|required|string',
        ]);
        $message->update($validated);
        // Vista: teacher/messages/show (detalle de mensaje actualizado)
        return view('teacher.messages.show', compact('message'));
    }
    public function destroy($id) {
        $message = Message::findOrFail($id);
        $message->delete();
        // Vista: teacher/messages/index (listado tras eliminar)
        $messages = Message::all();
        return view('teacher.messages.index', compact('messages'));
    }
}
