<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Teacher\Message;
use App\Models\Teacher\Guild;

class MessageController extends Controller
{
    public function index() {
        $messages = Message::all();
        // Vista: teacher/messages/index (listado de mensajes)
        return view('teacher.messages.index', compact('messages'));
    }

    public function create() {
        $guilds = Guild::all();
        // Vista: teacher/messages/create (formulario de creación)
        return view('teacher.messages.create', compact('guilds'));
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'content' => 'required|string|max:1000',
            'recipient_id' => 'nullable|integer',
            'guild_id' => 'nullable|integer',
        ]);

        // Agregar el teacher_id del usuario autenticado
        $validated['teacher_id'] = Auth::user()->teacher->id ?? 1;

        // Asegurar que al menos uno de los dos campos esté presente
        if (empty($validated['recipient_id']) && empty($validated['guild_id'])) {
            return back()->withErrors(['recipient_type' => 'Debes seleccionar un gremio o un estudiante específico.'])->withInput();
        }

        $message = Message::create($validated);
        // Vista: teacher/messages/show (detalle de mensaje creado)
        return view('teacher.messages.show', compact('message'));
    }

    public function show($id) {
        $message = Message::findOrFail($id);
        // Vista: teacher/messages/show (detalle de mensaje)
        return view('teacher.messages.show', compact('message'));
    }

    public function edit($id) {
        $message = Message::findOrFail($id);
        $guilds = Guild::all();
        // Vista: teacher/messages/edit (formulario de edición)
        return view('teacher.messages.edit', compact('message', 'guilds'));
    }

    public function update(Request $request, $id) {
        $message = Message::findOrFail($id);
        $validated = $request->validate([
            'content' => 'sometimes|required|string|max:1000',
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
