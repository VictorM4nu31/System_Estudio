<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Teacher\Message;

class MessageController extends Controller
{
    public function index() {
        return response()->json(Message::all());
    }
    public function store(Request $request) {
        $validated = $request->validate([
            'content' => 'required|string',
            'guild_id' => 'required|integer',
            'teacher_id' => 'required|integer',
            'recipient_id' => 'required|integer',
        ]);
        $message = Message::create($validated);
        return response()->json(['message' => 'Mensaje creado', 'message_data' => $message]);
    }
    public function show($id) {
        return response()->json(Message::findOrFail($id));
    }
    public function update(Request $request, $id) {
        $message = Message::findOrFail($id);
        $validated = $request->validate([
            'content' => 'sometimes|required|string',
        ]);
        $message->update($validated);
        return response()->json(['message' => 'Mensaje actualizado', 'message_data' => $message]);
    }
    public function destroy($id) {
        $message = Message::findOrFail($id);
        $message->delete();
        return response()->json(['message' => 'Mensaje eliminado']);
    }
}
